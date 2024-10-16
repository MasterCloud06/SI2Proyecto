<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\EmployerController;

// Ruta de bienvenida (cargar los eventos correctamente desde el controlador)
Route::get('/', [EventController::class, 'welcome'])->name('home');

// Ruta para la página de Home que pasa los eventos al usuario autenticado
Route::get('/', [EventController::class, 'welcome'])->middleware('auth')->name('home');


// Ruta del dashboard (solo accesible para usuarios autenticados y verificados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas para los roles
Route::resource('roles', RoleController::class);

// Rutas para los usuarios
Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::post('/users/{id}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

// Rutas para el perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas para gestionar eventos
// Rutas para gestionar eventos
Route::middleware('auth')->group(function () {
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::patch('/events/{event}', [EventController::class, 'update'])->name('events.update'); // PATCH para actualización
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});


// Rutas para proveedores
Route::middleware('auth')->group(function () {
    Route::resource('suppliers', SupplierController::class);
});

// Rutas para empleadores
Route::middleware('auth')->group(function () {
    Route::resource('employers', EmployerController::class);
});

// Incluye las rutas de autenticación de Laravel (login, registro, etc.)
require __DIR__.'/auth.php';

Auth::routes();
