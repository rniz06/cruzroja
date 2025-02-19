<?php

namespace App\Http\Controllers;

use App\Http\Requests\Voluntario\StoreVoluntarioRequest;
use App\Http\Requests\Voluntario\UpdateVoluntarioRequest;
use App\Models\Ciudad;
use App\Models\Pais;
use App\Models\Vistas\VtVoluntario;
use App\Models\Voluntario;
use App\Models\Voluntario\Estado;
use App\Models\Voluntario\EstadoCivil;
use App\Models\Voluntario\GrupoSanguineo;
use App\Models\Voluntario\Sexo;
use Illuminate\Http\Request;

class VoluntarioController extends Controller
{
    /**
     * Establece los middleware necesarios para gestionar permisos
     * Se utilizan permisos específicos para cada acción del controlador.
     */
    function __construct()
    {
        $this->middleware('permission:Voluntarios Listar|Voluntarios Crear|Voluntarios Editar|Voluntarios Eliminar', ['only' => ['index', 'show']]);
        $this->middleware('permission:Voluntarios Crear', ['only' => ['create', 'store']]);
        $this->middleware('permission:Voluntarios Editar', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Voluntarios Eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('voluntarios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ciudades = Ciudad::select('id_ciudad', 'ciudad')->get();
        $paises = Pais::select('id_pais', 'pais')->get();
        $sexos = Sexo::select('id_voluntario_sexo', 'sexo')->get();
        $estadoCivil = EstadoCivil::select('idvoluntario_estado_civil', 'estado_civil')->get();
        $grupoSanguineos = GrupoSanguineo::select('idvoluntario_grupo_sanguineo', 'grupo_sanguineo')->get();
        return view('voluntarios.create', compact('ciudades', 'paises', 'sexos', 'estadoCivil', 'grupoSanguineos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVoluntarioRequest $request)
    {
        $voluntario = Voluntario::create([
            'nombres' => $request->nombres,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'cedula' => $request->cedula,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'edad' => $request->edad,
            'lugar_nacimiento_id' => $request->lugar_nacimiento_id,
            'nacionalidad_id' => $request->nacionalidad_id,
            'sexo_id' => $request->sexo_id,
            'estado_civil_id' => $request->estado_civil_id,
            'grupo_sanguineo_id' => $request->grupo_sanguineo_id,
            'estado_id' => 1, // ACTIVO POR DEFECTO
        ]);

        return redirect()->route('voluntarios.index')
            ->with('success', 'Voluntario Creado Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Voluntario $voluntario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VtVoluntario $voluntario)
    {
        $ciudades = Ciudad::select('id_ciudad', 'ciudad')->get();
        $paises = Pais::select('id_pais', 'pais')->get();
        $sexos = Sexo::select('id_voluntario_sexo', 'sexo')->get();
        $estadoCivil = EstadoCivil::select('idvoluntario_estado_civil', 'estado_civil')->get();
        $grupoSanguineos = GrupoSanguineo::select('idvoluntario_grupo_sanguineo', 'grupo_sanguineo')->get();
        $estados = Estado::select('id_voluntario_estado', 'voluntario_estado')->get();
        return view('voluntarios.edit', compact('voluntario','ciudades', 'paises', 'sexos', 'estadoCivil', 'grupoSanguineos', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVoluntarioRequest $request, Voluntario $voluntario)
    {
        $voluntario->update([
            'nombres' => $request->nombres,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'edad' => $request->edad,
            'lugar_nacimiento_id' => $request->lugar_nacimiento_id,
            'nacionalidad_id' => $request->nacionalidad_id,
            'sexo_id' => $request->sexo_id,
            'estado_civil_id' => $request->estado_civil_id,
            'grupo_sanguineo_id' => $request->grupo_sanguineo_id,
            'estado_id' => $request->estado_id,
        ]);

        return redirect()->route('voluntarios.index')
            ->with('success', 'Voluntario Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voluntario $voluntario)
    {
        $voluntario->delete();
        return redirect()->route('voluntarios.index')
            ->with('success', 'Voluntario Eliminado Correctamente');
    }
}
