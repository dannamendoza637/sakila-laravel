<?php

use Illuminate\Support\Facades\Route;

// Controladores principales
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| RUTAS DEL PROYECTO SAKILA
|--------------------------------------------------------------------------
*/

// DASHBOARD
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


// -------------------------------
// MÓDULO FILMS
// -------------------------------
Route::resource('films', App\Http\Controllers\FilmController::class);


// -------------------------------
// MÓDULO CUSTOMERS
// -------------------------------
Route::resource('customers', CustomerController::class);



// -------------------------------
// ACTORES
// -------------------------------
Route::resource('actors', ActorController::class);



// CATEGORÍAS (CRUD COMPLETO)
Route::resource('categories', \App\Http\Controllers\CategoryController::class);


// -------------------------------
// IDIOMAS
// -------------------------------
Route::get('/languages', [LanguageController::class, 'index'])->name('languages.index');


// -------------------------------
// ALQUILERES
// -------------------------------
Route::resource('rentals', App\Http\Controllers\RentalController::class);


// -------------------------------
// PAGOS
// -------------------------------
Route::resource('payments', App\Http\Controllers\PaymentController::class);


// -------------------------------
// TIENDAS
// -------------------------------
Route::resource('stores', App\Http\Controllers\StoreController::class);


// -------------------------------
// STAFF
// -------------------------------
Route::resource('staff', App\Http\Controllers\StaffController::class);


// -------------------------------
// INVENTARIO
// -------------------------------
Route::resource('inventory', App\Http\Controllers\InventoryController::class);

Route::resource('languages', App\Http\Controllers\LanguageController::class);


// -------------------------------
// REPORTES
// -------------------------------
Route::prefix('reports')->group(function () {
    Route::get('/top-customers', [ReportController::class, 'topCustomers'])->name('reports.top-customers');
    Route::get('/top-films', [ReportController::class, 'topFilms'])->name('reports.top-films');
    Route::get('/rentals-per-store', [ReportController::class, 'rentalsPerStore'])->name('reports.rentals-per-store');
});

