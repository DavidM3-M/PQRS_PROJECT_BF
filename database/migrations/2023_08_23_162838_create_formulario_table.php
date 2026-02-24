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
        Schema::create('formulario', function (Blueprint $table) {
            $table->id();
            $table->string('tipoSolicitante')->nullable();
            $table->string('tipoSolicitud')->nullable();
            $table->string('tipoUsuario');
            $table->string('tipoIdentificacion')->nullable();
            $table->string('numeroIdentificacion')->nullable();
            $table->string('nombres')->nullable();
            $table->string('celular')->nullable();
            $table->string('correo')->nullable();
            $table->string('respuestaFisica')->default('NO');
            $table->string('rutaAdjunto')->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulario');
    }
};
