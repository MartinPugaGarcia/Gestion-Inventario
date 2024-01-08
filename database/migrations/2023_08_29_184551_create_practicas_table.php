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
        Schema::create('practicas', function (Blueprint $table) {
            $table->string('idusuario');
            $table->id();
            $table->string("title",255);
            $table->text("descripcion"); 
            $table->string("aula",255);
            $table->string("cantidadal",255);
            $table->string("grupo",255);
            $table->string("docente",255);
            $table->date("start");
            $table->time("horainicio");
            $table->time("horaterminacion");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practicas');
    }
};
