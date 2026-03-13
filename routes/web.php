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
Route::get('inmueble', [InmuebleController::class, 'index'])->name('inmueble.index');
Route::get('/inmueble/create',[InmuebleController::class,'create'])->name('inmueble.create');
Route::get('inmueble/{inmueble}',[InmuebleController::class,'show'])->where('inmueble', '[0-9]+')->name('inmueble.show');
Route::post('/inmueble',[InmuebleController::class,'store'])->name('inmueble.store');
Route::get('/inmueble/{inmueble}/edit',[InmuebleController::class,'edit'])->name('inmueble.edit');
Route::put('/inmueble/{inmueble}',[InmuebleController::class,'update'])->name('inmueble.update');
Route::delete('/inmueble/{inmueble}', [InmuebleController::class, 'destroy'])->name('inmueble.destroy');

require __DIR__.'/settings.php';
