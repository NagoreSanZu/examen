<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManzanasController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});





Route::get('/index', function () {
    return view('index');
});

/*RUTA PARA EDITAR*/
Route::get('/modificar', function () {
    return view('modificar');
})->name('modificar');
Route::get('/index{manzanas}/modificar', [ManzanasController::class, 'edit'])->name('manzanas.editar');
Route::put('/index{manzanas}', [ManzanasController::class, 'update'])->name('manzanas.actualizar');


//RUTA PARA ELIMINAR
Route::delete('/index{manzanas}', [ManzanasController::class, 'destroy'])->name('manzanas.eliminar');


//RUTA PARA INSERTAR
Route::post('/manzanas', [ManzanasController::class, 'insertarManzana'])->name('ManzanasController.insertarManzana');
Route::get('/formulario', function () {
    return view('formulario');
})->name('formulario');


//RUTA PARA VER EL CONTENIDO DE LA TABLA 
Route::get('/index', [ManzanasController::class, 'index'])->name('index');



//RUTAS CON RELACION CON EL INICIO DE SESION
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

