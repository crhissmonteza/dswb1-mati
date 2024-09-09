<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProyectoController;


// Rutas de autenticación
Route::prefix('auth')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

// Rutas para la gestión de roles
Route::prefix('roles')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
});

Route::resource('users', UserController::class);

// Rutas CRUD para proyectos accesibles sin el prefijo "api"
Route::resource('proyectos', ProyectoController::class);
