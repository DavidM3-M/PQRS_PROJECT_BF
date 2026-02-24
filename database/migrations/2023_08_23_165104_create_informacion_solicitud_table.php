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
        Schema::create('informacion_solicitud', function (Blueprint $table) {
            $table->id();
            $table->integer('radicado')->nullable();
            $table->string('estado')->default('SIN RESPUESTA');
            $table->date('fechaVencimiento')->nullable();
            $table->string('area')->nullable();
            $table->date('fechaAsignacion')->nullable();
            $table->text('respuesta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion_solicitud');
    }
};
