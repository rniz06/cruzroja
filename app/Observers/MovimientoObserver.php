<?php

namespace App\Observers;

use App\Models\Movil;
use App\Models\Movimiento;

class MovimientoObserver
{
    /**
     * Handle the Movimiento "created" event.
     */
    public function created(Movimiento $movimiento): void
    {
        Movil::where('id_movil', $movimiento->movil_id)
               ->increment('km_actual', $movimiento->km_recorridos);
    }

    /**
     * Handle the Movimiento "updated" event.
     */
    public function updated(Movimiento $movimiento): void
    {
        if ($movimiento->wasChanged('km_recorrido')) {
            $km_anterior = $movimiento->getOriginal('km_recorridos');
            $km_nuevo = $movimiento->km_recorridos;

            // Calcular la diferencia neta en kilómetros
            $diferencia_km = $km_nuevo - $km_anterior;

            // Actualizar el kilometraje en una sola operación
            Movil::where('id_movil', $movimiento->movil_id)
                ->increment('km_actual', $diferencia_km);
        }
    }

    /**
     * Handle the Movimiento "deleted" event.
     */
    public function deleted(Movimiento $movimiento): void
    {
        //
    }

    /**
     * Handle the Movimiento "restored" event.
     */
    public function restored(Movimiento $movimiento): void
    {
        //
    }

    /**
     * Handle the Movimiento "force deleted" event.
     */
    public function forceDeleted(Movimiento $movimiento): void
    {
        //
    }
}
