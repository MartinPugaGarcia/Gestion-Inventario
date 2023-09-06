<?php

use Illuminate\Support\Facades\Route;

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
    return view('practica.index');
})->middleware("auth");

Auth::routes();


Route::group(['middleware' => ['auth']], function ()
{


Route::get('/', [App\Http\Controllers\PracticaController::class, 'index']); 
Route::post('/practica/mostrar', [App\Http\Controllers\PracticaController::class, 'show']);
Route::post('/practica/mostrarcitas/{id}', [App\Http\Controllers\PracticaController::class, 'showcitaid']); 

Route::post('/practica/agregar', [App\Http\Controllers\PracticaController::class, 'store']); 
Route::post('/practica/editar/{id}', [App\Http\Controllers\PracticaController::class, 'edit']); 
Route::post('/practica/actualizar/{practica}', [App\Http\Controllers\PracticaController::class, 'update']);

Route::post('/practica/borrar/{id}', [App\Http\Controllers\PracticaController::class, 'destroy']); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});