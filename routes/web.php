<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReactivoController;

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

Auth::routes(); // Lo siguiente va adentro de routes()      ['register' => false]


Route::group(['middleware' => ['auth']], function ()
{



Route::get('/', [App\Http\Controllers\PracticaController::class, 'index']); 
Route::post('/practica/mostrar', [App\Http\Controllers\PracticaController::class, 'show']);
Route::post('/practica/mostrarcitas/{id}', [App\Http\Controllers\PracticaController::class, 'showcitaid']); 

Route::post('/practica/agregar', [App\Http\Controllers\PracticaController::class, 'store']); 
Route::post('/practica/editar/{id}', [App\Http\Controllers\PracticaController::class, 'edit']); 
Route::post('/practica/actualizar/{practica}', [App\Http\Controllers\PracticaController::class, 'update']);

Route::post('/practica/borrar/{id}', [App\Http\Controllers\PracticaController::class, 'destroy']); 


Route::resource('proveedores', App\Http\Controllers\ProveedorController::class)->names('proveedores');

Route::resource('equipos', App\Http\Controllers\EquipoController::class)->names('equipos');

Route::resource('instrumentos', App\Http\Controllers\InstrumentoController::class)->names('instrumentos');

Route::resource('mobiliarios', App\Http\Controllers\MobiliarioController::class)->names('mobiliarios');

Route::resource('materiales', App\Http\Controllers\MaterialeController::class)->names('materiales');

Route::resource('reactivos', App\Http\Controllers\ReactivoController::class)->names('reactivos');

Route::resource('prestamos', App\Http\Controllers\PrestamoController::class)->names('prestamos');

Route::resource('materialeps', App\Http\Controllers\MaterialepController::class)->names('materialeps');

Route::resource('procedimientos', App\Http\Controllers\ProcedimientoController::class)->names('procedimientos');

Route::resource('reglamentos', App\Http\Controllers\ReglamentoController::class)->names('reglamentos');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('visitas', App\Http\Controllers\VisitaController::class)->names('visitas');

Route::resource('reportes', App\Http\Controllers\ReporteController::class)->names('reportes');


});

//Ruta PDF Proveedores
Route::get('/pdfproveedors', 'App\Http\Controllers\PDFController@PDFProveedors')->name('descargarPDFProveedors');
Route::get('/pdfprestamos', 'App\Http\Controllers\PDFPrestamosController@PDFPrestamos')->name('descargarPDFPrestamos');

Route::get('/pdfpracticas', 'App\Http\Controllers\PDFPracticasController@PDFPracticas')->name('descargarPDFPracticas');
Route::get('/pdfvisitas', 'App\Http\Controllers\PDFVisitasController@PDFVisitas')->name('descargarPDFVisitas');

//Ruta PDF Equipos
Route::get('/pdfequipos', 'App\Http\Controllers\PDFEquiposController@PDFEquipos')->name('descargarPDFEquipos');

//Ruta PDF Mobiliario
Route::get('/pdfmobiliarios', 'App\Http\Controllers\PDFMobiliariosController@PDFMobiliarios')->name('descargarPDFMobiliarios');

//Ruta PDF Materiales
Route::get('/pdfmateriales', 'App\Http\Controllers\PDFMaterialesController@PDFMateriales')->name('descargarPDFMateriales');

//Ruta PDF Materialesp
Route::get('/pdfmaterialeps', 'App\Http\Controllers\PDFMaterialepsController@PDFMaterialeps')->name('descargarPDFMaterialeps');

//Ruta PDF Instrumentos
Route::get('/pdfinstrumentos', 'App\Http\Controllers\PDFInstrumentosController@PDFInstrumentos')->name('descargarPDFInstrumentos');

//Ruta PDF Reactivos
Route::get('/pdfreactivos', 'App\Http\Controllers\PDFReactivosController@PDFReactivos')->name('descargarPDFReactivos');

//Ruta PDF Reportes de Incidencias
Route::get('/pdfreportes', 'App\Http\Controllers\PDFReportesController@PDFReportes')->name('descargarPDFReportes');

//Route::resource('visitas', App\Http\Controllers\VisitaController::class)->names('visitas');
Route::get('visitas/create', [App\Http\Controllers\VisitaController::class,'create'])->name('visitas.create');
Route::post('visitas', [App\Http\Controllers\VisitaController::class,'store'])->name('visitas.store');



