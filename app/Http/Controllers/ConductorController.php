<?php

namespace App\Http\Controllers;

use App\Http\Requests\Conductor\StoreConductorRequest;
use App\Http\Requests\Conductor\UpdateConductorRequest;
use App\Models\Conductor;
use App\Models\Conductor\Licencia;
use App\Models\Vistas\VtConductor;
use App\Models\Vistas\VtVoluntario;
use Illuminate\Http\Request;

class ConductorController extends Controller
{
    /**
     * Establece los middleware necesarios para gestionar permisos
     * Se utilizan permisos específicos para cada acción del controlador.
     */
    function __construct()
    {
        $this->middleware('permission:Conductores Listar|Conductores Crear|Conductores Editar|Conductores Eliminar', ['only' => ['index', 'show']]);
        $this->middleware('permission:Conductores Crear', ['only' => ['create', 'store']]);
        $this->middleware('permission:Conductores Editar', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Conductores Eliminar', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('conductores.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $voluntarios = VtVoluntario::select('id_voluntario', 'nombres', 'apellido_paterno', 'apellido_materno')->get();
        $licencias = Licencia::select('id_conductor_licencia', 'licencia')->get();
        return view('conductores.create', compact('voluntarios', 'licencias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConductorRequest $request)
    {
        Conductor::create([
            'voluntario_id' => $request->voluntario_id,
            'licencia_id' => $request->licencia_id,
            'estado_id' => 1, // Activo
            'es_tem' => $request->es_tem, // Boolean
        ]);

        return redirect()->route('conductores.index')
            ->with('success', 'Conductor Registrado Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Conductor $conductor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VtConductor $conductor)
    {
        $voluntarios = VtVoluntario::select('id_voluntario', 'nombres', 'apellido_paterno', 'apellido_materno')->get();
        $licencias = Licencia::select('id_conductor_licencia', 'licencia')->get();
        return view('conductores.edit', compact('conductor', 'voluntarios', 'licencias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConductorRequest $request, Conductor $conductor)
    {
        $conductor->update([
            'voluntario_id' => $request->voluntario_id,
            'licencia_id' => $request->licencia_id,
            'es_tem' => $request->es_tem, // Boolean
        ]);

        return redirect()->route('conductores.index')
            ->with('success', 'Conductor Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conductor $conductor)
    {
        $conductor->delete();
        return redirect()->route('conductores.index')
            ->with('success', 'Conductor Eliminado Correctamente');
    }
}
