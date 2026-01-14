<?php

use App\Http\Controllers\PerfilController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\InmuebleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/ciudad', [CiudadController::class,'index']);

/*Route::get('/propietario',[PropietarioController::class,'index']);
Route::get('/propietario/{propietario}',[PropietarioController::class,'show']);
Route::post('/propietario',[PropietarioController::class,'store']);
Route::put('/propietario/{propietario}',[PropietarioController::class,'update']);
Route::patch('/propietario/{propietario}',[PropietarioController::class,'update']);
Route::delete('/propietario/{propietario}',[PropietarioController::class,'destroy']);*/

Route::apiResource('propietario',PropietarioController::class);

Route::apiResource('inmueble',InmuebleController::class);

Route::post('/inmueble/{inmueble}/perfil',[InmuebleController::class,'attachPerfil']);


Route::controller(PerfilController::class)->group(function(){
    Route::get('perfil/{perfil}','show');
});



Route::post('/user/login',[UserController::class,'verify']);
Route::post('/user/logout',[UserController::class,'logout'])->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function(){
        Route::apiResource('user',UserController::class);
});
