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
        Schema::create('perfils', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo',['piso','casa','adosado','local','nave','terreno']);
            $table->boolean('ascensor')->default('false');
            $table->enum('clase_energetica',['A','B','C','D','E','F','G']);
            $table->integer('metros');
            $table->foreignId('inmueble_id')->unique()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfils');
    }
};
