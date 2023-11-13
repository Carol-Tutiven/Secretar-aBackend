<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unidad_p_s', function (Blueprint $table) {
            $table->id();
            $table->string('seccion');
            $table->string('subseccion');
            $table->string('serie');
            $table->string('subserie');
            $table->string('descripcion_serie');
            $table->string('codigo');
            $table->string('soporte_origen_documentacion');
            $table->string('condicion_acceso');
            $table->string('plazo_conservacion_documental');
            $table->string('base_legal');
            $table->string('disposicion_final');
            $table->string('tecnica_seleccion');
            $table->string('observacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidad_p_s');
    }
};
