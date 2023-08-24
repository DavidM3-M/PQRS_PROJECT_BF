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
        // Schema::create('formulario', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        // Schema::create('formulario', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nombres');
        //     $table->string('apellidos');
        //     $table->enum('estado', ['Petición', 'Queja', 'Reclamo', 'Solicitud', 'Felicitación']);
        //     $table->enum('anonimo', ['SI', 'NO']);
        //     $table->enum('medio_respuesta', ['Correo', 'Celular', 'Físico']);
        //     $table->string('direccion');
        //     $table->string('correo');
        //     $table->bigInteger('celular');
        //     $table->text('descripcion');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulario');
    }
};
