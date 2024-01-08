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
        Schema::create('materialeps', function (Blueprint $table) {
            $table->id();
            $table->string("id_producto",255);
            $table->string("alumno",255);
            $table->string("nombre",255);
            $table->integer("cantidad");
            $table->string("docente",255);
            $table->text("descripcion"); 
            $table->date("fecha",255);
            $table->time("hora");
            $table->string("estado");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materialeps');
    }
};
