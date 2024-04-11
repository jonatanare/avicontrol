<?php

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

use App\Http\Controllers\EggController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FlockController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    // Rutas home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Rutas flocks
    // Ruta para listar todos los flocks (index)
    Route::get('/flocks', [FlockController::class, 'index'])->name('flocks.index');

    // Ruta para mostrar el formulario de creación de un nuevo flock (create)
    Route::get('/flocks/create', [FlockController::class, 'create'])->name('flocks.create');

    // Ruta para almacenar un nuevo flock (store)
    Route::post('/flocks', [FlockController::class, 'store'])->name('flocks.store');

    // Ruta para mostrar un flock específico por ID (show)
    Route::get('/flocks/{id}', [FlockController::class, 'show'])->name('flocks.show');

    // Ruta para mostrar el formulario de edición de un flock específico por ID (edit)
    Route::get('/flocks/{id}/edit', [FlockController::class, 'edit'])->name('flocks.edit');

    // Ruta para actualizar un flock específico por ID (update)
    Route::put('/flocks/{id}', [FlockController::class, 'update'])->name('flocks.update');
    Route::patch('/flocks/{id}', [FlockController::class, 'update'])->name('flocks.update'); // Maneja PATCH

    // Ruta para eliminar un flock específico por ID (destroy)
    Route::delete('/flocks/{id}', [FlockController::class, 'destroy'])->name('flocks.destroy');

    // Rutas eggs
    // Ruta para listar todos los registros de eggs (index)
    Route::get('/eggs', [EggController::class, 'index'])->name('eggs.index');

    // Ruta para mostrar el formulario de creación de un nuevo registro de eggs (create)
    Route::get('/eggs/create', [EggController::class, 'create'])->name('eggs.create');

    // Ruta para almacenar un nuevo registro de eggs (store)
    Route::post('/eggs', [EggController::class, 'store'])->name('eggs.store');

    // Ruta para mostrar un registro de eggs específico por ID (show)
    Route::get('/eggs/{id}', [EggController::class, 'show'])->name('eggs.show');

    // Ruta para mostrar el formulario de edición de un registro de eggs específico por ID (edit)
    Route::get('/eggs/{id}/edit', [EggController::class, 'edit'])->name('eggs.edit');

    // Ruta para actualizar un registro de eggs específico por ID (update)
    Route::put('/eggs/{id}', [EggController::class, 'update'])->name('eggs.update');
    Route::patch('/eggs/{id}', [EggController::class, 'update'])->name('eggs.update'); // Manejo de PATCH

    // Ruta para eliminar un registro de eggs específico por ID (destroy)
    Route::delete('/eggs/{id}', [EggController::class, 'destroy'])->name('eggs.destroy');

    // Rutas Feeds
    Route::post('/feeds/adjust/{id}', [FeedController::class, 'adjustQuantity'])->name('feeds.adjust');
    Route::get('/feeds/adjust', [FeedController::class, 'showAdjustForm'])->name('feeds.adjust');


    // Ruta para listar todos los feeds (index)
    Route::get('/feeds', [FeedController::class, 'index'])->name('feeds.index');

    // Ruta para mostrar el formulario de creación de un nuevo feed (create)
    Route::get('/feeds/create', [FeedController::class, 'create'])->name('feeds.create');

    // Ruta para almacenar un nuevo feed (store)
    Route::post('/feeds', [FeedController::class, 'store'])->name('feeds.store');

    // Ruta para mostrar un feed específico por ID (show)
    Route::get('/feeds/{id}', [FeedController::class, 'show'])->name('feeds.show');

    // Ruta para mostrar el formulario de edición de un feed específico por ID (edit)
    Route::get('/feeds/{id}/edit', [FeedController::class, 'edit'])->name('feeds.edit');

    // Ruta para actualizar un feed específico por ID (update)
    Route::put('/feeds/{id}', [FeedController::class, 'update'])->name('feeds.update');
    Route::patch('/feeds/{id}', [FeedController::class, 'update'])->name('feeds.update'); // Para manejar PATCH

    // Ruta para eliminar un feed específico por ID (destroy)
    Route::delete('/feeds/{id}', [FeedController::class, 'destroy'])->name('feeds.destroy');
});
