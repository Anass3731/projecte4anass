<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumneAnassController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas públicas: consultar alumnos
Route::get('/alumnos', [AlumneAnassController::class, 'index']);
Route::get('/alumnos/{id}', [AlumneAnassController::class, 'show']);

// Rutas privadas: necesitan token de Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/alumnos', [AlumneAnassController::class, 'store']);
    Route::put('/alumnos/{id}', [AlumneAnassController::class, 'update']);
    Route::delete('/alumnos/{id}', [AlumneAnassController::class, 'destroy']);
});