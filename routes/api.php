<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;

// Rutas para la API de proyectos
Route::post('/proyectos', [ProyectoController::class, 'store']);
Route::get('/proyectos', [ProyectoController::class, 'index']);
Route::get('/proyectos/{id}', [ProyectoController::class, 'show']);
Route::put('/proyectos/{id}', [ProyectoController::class, 'update']);
Route::patch('/proyectos/{id}', [ProyectoController::class, 'update']);
Route::delete('/proyectos/{id}', [ProyectoController::class, 'destroy']);


