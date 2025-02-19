<?php

namespace App\Http\Controllers;

use App\Exports\PersonalExport;
use App\Http\Requests\Personal\StoreAgregarContactoRequest;
use App\Http\Requests\Personal\StorePersonalRequest;
use App\Http\Requests\Personal\UpdatePersonalRequest;
use App\Models\Ciudad;
use App\Models\Personal;
use App\Models\Personal\Categoria;
use App\Models\Personal\Contacto;
use App\Models\Personal\ContactoEmergencia;
use App\Models\Personal\Estado;
use App\Models\Personal\EstadoActualizar;
use App\Models\Personal\GrupoSanguineo;
use App\Models\Personal\Pais;
use App\Models\Personal\Parentesco;
use App\Models\Personal\Sexo;
use App\Models\Personal\TipoContacto;
use App\Models\User;
use App\Models\Vistas\VtCompania;
use App\Models\Vistas\VtPersonalContacto;
use App\Models\Vistas\VtPersonalContactoEmergencia;
use App\Models\Vistas\VtPersonales;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class PersonalController extends Controller
{
    /**
     * Establece los middleware necesarios para gestionar permisos
     * Se utilizan permisos específicos para cada acción del controlador.
     */
    function __construct()
    {
        $this->middleware('permission:Personal Listar|Personal Crear|Personal Editar|Personal Eliminar', ['only' => ['index', 'show']]);
        $this->middleware('permission:Personal Crear', ['only' => ['create', 'store']]);
        $this->middleware('permission:Personal Editar', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Personal Eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('personal.index');
    }

    /**
     * Genera y descarga un PDF con la ficha de un personal.
     */
    public function fichapdf($id)
    {
        $usuario = Auth::user();
        // Cargar todas las relaciones en una sola consulta
        $personal = Personal::with([
            'categoria',
            'estado',
            'sexo',
            'pais',
            'estadoActualizar',
            'grupoSanguineo',
            'contactos.tipoContacto',
            'contactosEmergencias.tipoContacto',
            'contactosEmergencias.parentesco',
            'contactosEmergencias.ciudad',
            'vtcompania'
        ])
            ->findOrFail($id);

        $pdf = Pdf::loadView('personal.fichapdf', [
            'personal' => $personal,
            'usuario' => $usuario,
            'contactos' => $personal->contactos,
            'contactosEmergencias' => $personal->contactosEmergencias
        ]);

        return $pdf->download('CBVP Ficha  de personal ' . $personal->codigo . '.pdf');
    }

    /**
     * Metodo para exportar datos en formato excel 
     * @return \Illuminate\Support\Collection
     */
    public function exportar()
    {
        return Excel::download(new PersonalExport, 'personal.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::select('idpersonal_categorias', 'categoria')->get();
        $estados = Estado::select('idpersonal_estados', 'estado')->get();
        $sexos = Sexo::select('idpersonal_sexo', 'sexo')->get();
        $paises = Pais::select('idpaises', 'pais')->get();
        $grupo_sanguineo = GrupoSanguineo::select('idpersonal_grupo_sanguineo', 'grupo_sanguineo')->get();
        $companias = VtCompania::select('idcompanias', 'compania', 'departamento', 'ciudad')->orderBy('orden', 'asc')->get();
        return view('personal.create', compact('categorias', 'estados', 'sexos', 'paises', 'grupo_sanguineo', 'companias'));
    }

    /**
     * Almacena un nuevo registro de personal y usuario en la base de datos.
     * Si alguna de las transacciones falla, no se crean los registros
     */
    public function store(StorePersonalRequest $request)
    {
        DB::transaction(function () use ($request) {
            $personal = Personal::create([
                'nombrecompleto' => $request->nombrecompleto,
                'codigo' => $request->codigo,
                'categoria_id' => $request->categoria_id,
                'compania_id' => $request->compania_id,
                'fecha_juramento' => $request->fecha_juramento,
                'estado_id' => $request->estado_id,
                'documento' => $request->documento,
                'sexo_id' => $request->sexo_id,
                'nacionalidad_id' => $request->nacionalidad_id,
                'ultima_actualizacion' => now(),
                'estado_actualizar_id' => 2,
                'grupo_sanguineo_id' => $request->grupo_sanguineo_id,
            ]);

            User::create([
                'personal_id' => $personal->idpersonal,
                'codigo' => $personal->codigo,
                'password' => Hash::make($personal->codigo),
                // Otros campos del usuario aquí
            ]);
        });

        return redirect()->route('personal.index')
            ->with('success', 'Personal Registrado Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(VtPersonales $personal)
    {
        $contactos = VtPersonalContacto::select('personal_id', 'tipo_contacto', 'contacto')->where('personal_id', $personal->idpersonal)->get();
        $contactos_emergencias = VtPersonalContactoEmergencia::select('personal_id', 'tipo_contacto', 'parentesco', 'nombre_contacto', 'contacto')->where('personal_id', $personal->idpersonal)->get();
        $tipo_contactos = TipoContacto::select('id_tipo_contacto', 'tipo_contacto')->get();
        $parentescos = Parentesco::select('id_parentesco', 'parentesco')->get();
        $ciudades = Ciudad::select('idciudades', 'ciudad')->get();
        return view('personal.show', compact('personal', 'contactos', 'contactos_emergencias', 'tipo_contactos', 'parentescos', 'ciudades'));
    }

    /**
     * Almacena un nuevo registro de personal_contactos en la base de datos.
     */
    public function agregarcontacto(StoreAgregarContactoRequest $request)
    {
        Contacto::create([
            'personal_id' => $request->personal_id,
            'tipo_contacto_id' => $request->tipo_contacto_id,
            'contacto' => $request->contacto,
        ]);

        return redirect()->route('personal.show', $request->personal_id)
            ->with('success', 'Contacto Registrado Correctamente');
    }

    /**
     * Almacena un nuevo registro de personal_contactos en la base de datos.
     */
    public function agregarcontactoemergencia(StoreAgregarContactoRequest $request)
    {
        ContactoEmergencia::create([
            'personal_id' => $request->personal_id,
            'tipo_contacto_id' => $request->tipo_contacto_id,
            'parentesco_id' => $request->parentesco_id,
            'ciudad_id' => $request->ciudad_id,
            'nombre_completo' => $request->nombre_completo,
            'direccion' => $request->direccion,
            'contacto' => $request->contacto,
        ]);

        return redirect()->route('personal.show', $request->personal_id)
            ->with('success', 'Contacto de Emergencia Registrado Correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VtPersonales $personal)
    {
        $categorias = Categoria::select('idpersonal_categorias', 'categoria')->get();
        $estados = Estado::select('idpersonal_estados', 'estado')->get();
        $sexos = Sexo::select('idpersonal_sexo', 'sexo')->get();
        $paises = Pais::select('idpaises', 'pais')->get();
        $grupo_sanguineo = GrupoSanguineo::select('idpersonal_grupo_sanguineo', 'grupo_sanguineo')->get();
        $companias = VtCompania::select('idcompanias', 'compania', 'departamento', 'ciudad')->orderBy('orden', 'asc')->get();
        $estado_actualizar = EstadoActualizar::select('idpersonal_estado_actualizar', 'estado')->get();
        return view('personal.edit',compact('personal', 'categorias', 'estados', 'sexos', 'paises', 'grupo_sanguineo', 'companias', 'estado_actualizar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonalRequest $request, Personal $personal)
    {
        $personal->update([
            'nombrecompleto' => $request->nombrecompleto,
            'categoria_id' => $request->categoria_id,
            'compania_id' => $request->compania_id,
            'fecha_juramento' => $request->fecha_juramento,
            'estado_id' => $request->estado_id,
            'documento' => $request->documento,
            'sexo_id' => $request->sexo_id,
            'nacionalidad_id' => $request->nacionalidad_id,
            'ultima_actualizacion' => now(),
            'estado_actualizar_id' => $request->estado_actualizar_id,
            'grupo_sanguineo_id' => $request->grupo_sanguineo_id,
        ]);

        return redirect()->route('personal.show', $personal->idpersonal)
            ->with('success', 'Ficha Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
