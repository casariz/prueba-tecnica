<?php

use App\Http\Controllers\Api\CiudadController;
use App\Http\Controllers\Api\MonedaController;
use App\Http\Controllers\HistorialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rutas para el controlador CiudadController
Route::controller(CiudadController::class)->group(function () {
    Route::get('ciudades', 'index');
    Route::get('clima/{ciudad_id}', 'obtenerClima');
});

// Rutas para el controlador MonedaController
Route::controller(MonedaController::class)->group(function () {
    Route::get('monedas', 'index');
    Route::get('monedas/{ciudad_id}', 'obtenerCambio');
});

// Rutas para el controlador HistorialController
Route::controller(HistorialController::class)->group(function () {
    Route::get('historial', 'index');
    Route::post('historial', 'store');
    Route::get('historial/{historial_id}', 'show');
});