<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegionalUnitController;

// Rutas para usuarios invitados
Route::middleware('guest')->group(function () {
    Route::view('/', 'public.index')->name('public.index'); // Página pública
    Route::view('/login', 'auth.login')->name('login'); // Página de login
    Route::post('/login', [AuthController::class, 'login'])->name('login.post'); // Maneja el POST del login
});

// Rutas protegidas para usuarios autenticados
Route::middleware('auth')->group(function () {
    // Dashboard para operadores
    Route::get('/operator/dashboard', [DashboardController::class, 'operatorDashboard'])
        ->name('operator.dashboard')
        ->middleware('checkRole:operator'); // Middleware para verificar el rol

    // Dashboard para coordinadores y supervisores
    Route::get('/management/dashboard', [DashboardController::class, 'managementDashboard'])
        ->name('management.dashboard')
        ->middleware('checkRole:coordinator,supervisor'); // Middleware para verificar los roles

    // Rutas adicionales protegidas para coordinadores y supervisores
    Route::middleware('checkRole:coordinator,supervisor')->group(function () {
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/operators', [UserController::class, 'listOperatorsByGroup'])
            ->name('users.operators');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        // Route::get('/users/manage', [UserController::class, 'manage'])->name('users.manage');

        //Regional Unit Routes
        Route::get('/regional_units', [RegionalUnitController::class, 'index'])->name('regional_units.index');
        Route::get('/regional_units/create', [RegionalUnitController::class, 'create'])->name('regional_units.create');
        Route::post('/regional_units', [RegionalUnitController::class, 'store'])->name('regional_units.store');
        Route::get('/regional_units/{id}/edit', [RegionalUnitController::class, 'edit'])->name('regional_units.edit');
        Route::put('/regional_units/{id}', [RegionalUnitController::class, 'update'])->name('regional_units.update');
        Route::delete('/regional_units/{id}', [RegionalUnitController::class, 'destroy'])->name('regional_units.destroy');

        //Center Routes
        Route::get('/centers', [CenterController::class, 'index'])->name('centers.index');
        Route::get('/centers/{id}/edit', [CenterController::class, 'edit'])->name('centers.edit');
        Route::put('/centers/{id}', [CenterController::class, 'update'])->name('centers.update');
        Route::get('/centers/create', [CenterController::class, 'create'])->name('centers.create');
        Route::post('/centers', [CenterController::class, 'store'])->name('centers.store');
        Route::delete('/centers/{id}', [CenterController::class, 'destroy'])->name('centers.destroy');

        //Grupos y unidades Regionales por Centros
        Route::get('/centers/{id}/groups', [CenterController::class, 'showGroups'])->name('centers.groups');
        Route::get('/centers/{id}/regional-units', [CenterController::class, 'showRegionalUnits'])->name('centers.regionalUnits');

        //Usuarios por grupo
        Route::get('/group/{id}/users', [GroupController::class, 'showMembers'])->name('group.users');
        Route::put('/group/{id}/edit', [GroupController::class, 'edit'])->name('group.edit');
        Route::delete('/group/{id}', [GroupController::class, 'destroy'])->name('group.destroy');

        // Logout
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
