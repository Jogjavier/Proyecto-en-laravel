<?php
use App\Http\Controllers\PruebaController; 
use App\Http\Controllers\CatalogController; 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrainerController; 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mi_primer_ruta', function () {
    return 'hola Javier';
});

Route::get('/name{name}', function ($name) {
    return 'hola soy'.$name;
});

Route::get('/name{name}/lastname/apellido', function ($name,$apellido) {
    return 'hola soy'.$name. " ".$apellido;
});

Route::get('/name{name}/lastname/apellido', function ($name,$apellido=null) {
    return 'hola soy'.$name. " ".$apellido;
});

Route::get('/name{name}/lastname/apellido', function ($name,$apellido="apellido") {
    return 'hola soy'.$name. " ".$apellido;
});

Route::get('/1er{num}/2do{num2}', function ($num, $num2) {
    $resultado= $num + $num2;
    return 'La suma es'.$resultado;
});

Route::get('/', function () {
    return 'Pagina principal';
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    return 'logout usuario';
});

Route::get('/catalog', function () {
    return 'listado de peliculas';
});

Route::get('/catalog/show{id}', function () {
    return 'vista detallada pelicula {id}';
});

Route::get('/catalog/areate', function () {
    return 'añadir pelicula';
});

Route::get('/catalog/edit{id}', function () {
    return 'Modificar pelicula {id}';
});

//Route::get('rutaprueba','Pruebacontroller@prueba2');
Route::get('/rutaprueba',[PruebaController::class,'prueba2']);

Route::get('/', [HomeController::class, 'index']);


Route::get('/catalog',[CatalogController::class, 'index']);

Route::get('/catalog/show{id}',[CatalogController::class, 'index']);

Route::get('/catalog/create',[CatalogController::class, 'index']);

Route::get('/catalog/edit{id}',[CatalogController::class, 'index']);

Route::resource('trainers','App\Http\Controllers\TrainerController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/trainers', [TrainerController::class, 'index'])->name('trainers.index');
Route::get('/trainers/create', [TrainerController::class, 'create'])->name('trainers.create');
Route::post('/trainers', [TrainerController::class, 'store'])->name('trainers.store');

//Route::get('/trainers',[TrainerController::class, 'destroy']->id('trainers.delete'));
Route::resource('trainers', TrainerController::class);
Route::get('delete/{id}', [TrainerController::class, 'destroy']);