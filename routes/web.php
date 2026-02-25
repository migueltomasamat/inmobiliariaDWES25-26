<?php

use App\Http\Controllers\InmuebleController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});
Route::get('inmuebles', [InmuebleController::class, 'index'])->name('inmueble.index');
Route::get('/inmueble/create',[InmuebleController::class,'create'])->name('inmueble.create');

Route::delete('/inmueble/{inmueble}', [InmuebleController::class, 'destroy'])->name('inmueble.destroy');

//Route::get('/propietario/create',[])

require __DIR__.'/settings.php';
