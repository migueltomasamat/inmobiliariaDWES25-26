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
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id();
            $table->string('num_catastro')->unique();
            $table->string('direccion');
            $table->integer('numero');
            $table->char('bloque',1)->nullable();
            $table->integer('piso')->nullable()->default(1);
            $table->char('puerta')->nullable()->default('A');
            $table->float('longitud')->nullable();
            $table->float('latitud')->nullable();
            $table->integer('cod_postal');

            $table->foreign('cod_postal')->references('cod_postal')->on('ciudads');
            //$table->foreignId('ciudad_id')->constrained();
            /*$table->bigInteger('propietario_id')->nullable();
            $table->foreign('propietario_id')->references('id')->on('propietarios');*/

            $table->foreignId('propietario_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inmuebles');
    }
};
