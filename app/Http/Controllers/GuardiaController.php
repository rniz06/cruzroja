<?php

namespace App\Http\Controllers;

use App\Http\Requests\Guardia\StoreGuardiaRequest;
use App\Http\Requests\Guardia\UpdateGuardiaRequest;
use App\Models\Guardia;
use App\Models\Guardia\Item;
use App\Models\Guardia\ItemControl;
use App\Models\Movil;
use App\Models\Servicio;
use App\Models\Vistas\VtMovil;
use App\Models\Vistas\VtVoluntario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuardiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('guardias.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servicios = Servicio::select('id_servicio', 'servicio')->get();
        $moviles = VtMovil::select('id_movil', 'movil_tipo', 'nro_chapa', 'km_actual')->get();
        $voluntarios = VtVoluntario::select('id_voluntario', 'nombre_completo', 'cedula')->get();
        $items = Item::select('id_guardia_item', 'item')->get();
        return view('guardias.create', compact('servicios', 'moviles', 'voluntarios', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuardiaRequest $request)
    {
        $guardia = Guardia::create([
            'id_usuario' => Auth::id(),
            'fecha_hora' => $request->fecha_hora,
            'grupo' => $request->grupo,
            'servicio_id' => $request->servicio_id,
            'movil_id' => $request->movil_id,
            'acargo_id' => $request->acargo_id,
            'vol_rea_rev_id' => $request->vol_rea_rev_id,
            'km_inicial' => $request->km_inicial,
            'km_final' => $request->km_final,
            'carga_combustible' => $request->carga_combustible,
            'monto' => $request->monto,
            'observaciones' => $request->observaciones
        ]);

        // Guardar los ítems seleccionados
        foreach ($request->items as $guardiaItemId => $verificacion) {
            ItemControl::create([
                'guardia_id' => $guardia->id_guardia,
                'guardia_item_id' => $guardiaItemId,
                'verificacion' => $verificacion,
            ]);
        }

        return redirect()->route('guardias.index')->with('success', 'Guardia registrada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guardia $guardia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guardia $guardia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuardiaRequest $request, Guardia $guardia)
    {
        $guardia->update([
            'id_usuario' => Auth::id(),
            'fecha_hora' => $request->fecha_hora,
            'grupo' => $request->grupo,
            'servicio_id' => $request->servicio_id,
            'movil_id' => $request->movil_id,
            'acargo_id' => $request->acargo_id,
            'vol_rea_rev_id' => $request->vol_rea_rev_id,
            'km_inicial' => $request->km_inicial,
            'km_final' => $request->km_final,
            'carga_combustible' => $request->carga_combustible,
            'monto' => $request->monto,
            'observaciones' => $request->observaciones
        ]);

        // Eliminar los registros anteriores de los ítems de esta guardia
        ItemControl::where('guardia_id', $guardia->id_guardia)->delete();

        // Insertar los nuevos ítems seleccionados
        foreach ($request->items as $guardiaItemId => $verificacion) {
            ItemControl::create([
                'guardia_id' => $guardia->id_guardia,
                'guardia_item_id' => $guardiaItemId,
                'verificacion' => $verificacion,
            ]);
        }

        return redirect()->route('guardias.index')->with('success', 'Guardia actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guardia $guardia)
    {
        //
    }
}
