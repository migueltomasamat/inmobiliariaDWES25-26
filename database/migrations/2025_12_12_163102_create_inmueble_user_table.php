<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inmueble_user', function (Blueprint $table) {
            $table->foreignId('inmueble_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->primary(['inmueble_id','user_id']);
            $table->bigInteger('cantidad');
            $table->date('fecha_caducidad')->default(Carbon::now()->addMonths(3));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inmueble_user');
    }
};
