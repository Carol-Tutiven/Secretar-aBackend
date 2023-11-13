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
        Schema::create('formulario_g_s', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_ingreso');
            $table->date('fecha_documento');
            $table->string('seccion');
            $table->string('subseccion');
            $table->string('oficios');
            $table->string('serie_descripcion');
            $table->integer('numero_documento_actas');
            $table->integer('numero_folios');
            $table->string('soporte');
            $table->string('tipo_informacion');
            $table->string('estado_conservacion');
            $table->string('anexo');
            $table->string('unidad_almacenamiento');
            $table->integer('numero');
            $table->integer('expediente');
            $table->string('observacion');
            $table->string('vinculacion_documento_digitales');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulario_g_s');
    }
};
