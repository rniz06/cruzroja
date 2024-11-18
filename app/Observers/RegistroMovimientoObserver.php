<?php

namespace App\Observers;

use App\Models\Movil;
use App\Models\RegistroMovimiento;

class RegistroMovimientoObserver
{
    /**
     * Handle the RegistroMovimiento "created" event.
     */
    public function created(RegistroMovimiento $registroMovimiento): void
    {
        Movil::where('id_movil', $registroMovimiento->movil_id)
               ->increment('km_actual', $registroMovimiento->km_recorrido);
        // $km_recorrido = $registroMovimiento->km_recorrido;

        // $movil = Movil::findOrFail($registroMovimiento->movil_id);

        // $movil->km_actual = $movil->km_actual + $km_recorrido;
        // $movil->save();
    }

    /**
     * Handle the RegistroMovimiento "updated" event.
     */
    public function updated(RegistroMovimiento $registroMovimiento): void
    {
        if ($registroMovimiento->wasChanged('km_recorrido')) {
            $km_anterior = $registroMovimiento->getOriginal('km_recorrido');
            $km_nuevo = $registroMovimiento->km_recorrido;

            // Calcular la diferencia neta en kilómetros
            $diferencia_km = $km_nuevo - $km_anterior;

            // Actualizar el kilometraje en una sola operación
            Movil::where('id_movil', $registroMovimiento->movil_id)
                ->increment('km_actual', $diferencia_km);
        }
    }

    /**
     * Handle the RegistroMovimiento "deleted" event.
     */
    public function deleted(RegistroMovimiento $registroMovimiento): void
    {
        //
    }

    /**
     * Handle the RegistroMovimiento "restored" event.
     */
    public function restored(RegistroMovimiento $registroMovimiento): void
    {
        //
    }

    /**
     * Handle the RegistroMovimiento "force deleted" event.
     */
    public function forceDeleted(RegistroMovimiento $registroMovimiento): void
    {
        //
    }
}
