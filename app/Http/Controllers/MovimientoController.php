<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movil\StoreMovilRequest;
use App\Http\Requests\Movimiento\StoreMovimientoRequest;
use App\Models\Ciudad;
use App\Models\Movimiento;
use App\Models\Servicio;
use App\Models\Vistas\VtConductor;
use App\Models\Vistas\VtMovil;
use App\Models\Vistas\VtMovimiento;
use App\Models\Vistas\VtVoluntario;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Registro Movimientos Listar|Registro Movimientos Crear|Registros Movimiento Editar|Registros Movimiento Eliminar', ['only' => ['index', 'show']]);
        $this->middleware('permission:Registro Movimientos Crear', ['only' => ['create', 'store']]);
        $this->middleware('permission:Registro Movimientos Editar', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Registro Movimientos Eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('movimientos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $conductores = VtConductor::select('id_conductor', 'nombre_completo', 'cedula', 'licencia')->where('estado_id', 1)->get();
        $moviles = VtMovil::select('id_movil', 'movil_tipo', 'nro_chapa', 'km_actual')->where('estado_id', 1)->get();
        $ciudades = Ciudad::select('id_ciudad', 'ciudad')->get();
        $servicios = Servicio::select('id_servicio', 'servicio')->get();
        $voluntarios = VtVoluntario::select('id_voluntario', 'nombre_completo', 'cedula')->where('estado_id', 1)->get();
        return view('movimientos.create', compact('conductores', 'moviles', 'ciudades', 'servicios', 'voluntarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovimientoRequest $request)
    {
        $movimiento = Movimiento::create([
            'conductor_id' => $request->conductor_id,
            'movil_id' => $request->movil_id,
            'ciudad_id' => $request->ciudad_id,
            'servicio_id' => $request->servicio_id,
            'destino' => $request->destino,
            'fecha_hora_salida' => $request->fecha_hora_salida,
            'km_inicial' => $request->km_inicial,
            'a_cargo' => $request->a_cargo,
            'fecha_hora_llegada' => $request->fecha_hora_llegada,
            'km_final' => $request->km_final,
            'km_recorridos' => $request->km_final - $request->km_inicial,
            'can_tripulantes' => $request->can_tripulantes,
            'observaciones' => $request->observaciones,
        ]);
        return redirect()->route('movimientos.index')->with('info', 'Movimiento creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(VtMovimiento $movimiento)
    {
        return view('movimientos.show', compact('movimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movimiento $movimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movimiento $movimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movimiento $movimiento)
    {
        //
    }
}
