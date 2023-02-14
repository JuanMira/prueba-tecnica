<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClienteServicioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObersvacionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceClientController;
use App\Http\Controllers\ServicioController;
use App\Models\Obersvacion;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', HomeController::class)->only(['index']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
/**
 * * Agregando permisos del controlador y middlewares de autenticacion
 */


Route::resource('cliente', ClienteController::class)
    ->only(['index', 'create', 'store', 'show','edit','update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('servicio', ServicioController::class)
    ->only(['index', 'create', 'store','edit', 'destroy', 'update'])
    ->middleware(['auth', 'verified']);

Route::resource('serviceClient', ServiceClientController::class)
    ->only(['store'])
    ->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';