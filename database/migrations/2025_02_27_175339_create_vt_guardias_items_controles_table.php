<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('
            CREATE VIEW vt_guardias_items_controles AS
            SELECT
                gic.id_guardia_item_control,
                gic.guardia_id,
                gic.guardia_item_id,
                gic.verificacion,
                gic.deleted_at,
                gi.item
            FROM guardias_items_controles gic
            JOIN guardias_items gi ON (gi.id_guardia_item = gic.guardia_item_id);
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vt_guardias_items_controles;');
    }
};
