<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movil\StoreMovilRequest;
use App\Http\Requests\Movil\UpdateMovilRequest;
use App\Models\Movil;
use App\Models\Movil\Combustible;
use App\Models\Movil\Estado;
use App\Models\Movil\Observacion;
use App\Models\Movil\Tipo;
use App\Models\Vistas\VtMovil;
use App\Models\Vistas\VtMovilObservacion;
use Illuminate\Http\Request;

class MovilController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Movil Listar|Movil Crear|Movil Editar|Movil Eliminar', ['only' => ['index', 'show']]);
        $this->middleware('permission:Movil Crear', ['only' => ['create', 'store']]);
        $this->middleware('permission:Movil Editar', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Movil Eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('moviles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $combustibles = Combustible::select('id_movil_combustible', 'tipo_combustible')->get();
        $tipos = Tipo::select('id_movil_tipo', 'movil_tipo')->get();
        return view('moviles.create', compact('combustibles', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovilRequest $request)
    {
        $movil = Movil::create([
            'combustible_id' => $request->combustible_id,
            'tipo_id' => $request->tipo_id,
            'estado_id' => $request->estado_id,
            'km_actual' => $request->km_actual,
            'nro_chapa' => $request->nro_chapa,
            'nro_chasis' => $request->nro_chasis,
            'estado_id' => 1,
        ]);
        return redirect()->route('moviles.index')->with('success', 'Móvil creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(VtMovil $movil)
    {
        $observaciones = VtMovilObservacion::where('movil_id', $movil->id_movil)->get();
        return view('moviles.show', compact('movil', 'observaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VtMovil $movil)
    {
        $combustibles = Combustible::select('id_movil_combustible', 'tipo_combustible')->get();
        $tipos = Tipo::select('id_movil_tipo', 'movil_tipo')->get();
        $estados = Estado::select('id_movil_estado', 'movil_estado')->get();
        return view('moviles.edit', compact('movil', 'combustibles', 'tipos', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovilRequest $request, Movil $movil)
    {
        $movil->update([
            'combustible_id' => $request->combustible_id,
            'tipo_id' => $request->tipo_id,
            'estado_id' => $request->estado_id,
            'km_actual' => $request->km_actual,
            'nro_chapa' => $request->nro_chapa,
            'nro_chasis' => $request->nro_chasis,
        ]);
        return redirect()->route('moviles.index')->with('success', 'Móvil actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movil $movil)
    {
        $movil->delete();
        return redirect()->route('moviles.index')->with('success', 'Móvil eliminado correctamente');
    }
}
