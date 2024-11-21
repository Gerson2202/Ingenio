<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\ProveedoresController;
use App\Models\Equipo;
use App\Models\Modelo;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])
->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/admin',[HomeController::class,'index'])->name('home');
    
    // RUTAS  DE EQUIPOS
    Route::get('/equipos',[EquiposController::class,'index'])->name('equiposIndex');
    Route::get('/equipos/create',[EquiposController::class,'create'])->name('equipoCreate');
    Route::post('/equipos',[EquiposController::class,'store'])->name('equipoStore');
    Route::get('/equipo/{id}', [EquiposController::class,'destroy'])->name('equipoDelet');
    Route::get('/equipo/edit/{id}', [EquiposController::class,'edit'])->name('equipoEdit');
    Route::put('equipo/update/{id}', [EquiposController::class, 'update'])->name('equipoUpdate');

    // RUTAS  DE MODELOS
    Route::post('/modelo',[ModeloController::class,'store'])->name('modeloStore');
    Route::get('/modelos/index',[ModeloController::class,'index'])->name('modelosIndex');
    Route::get('/modelo/{id}', [ModeloController::class,'destroy'])->name('modeloDelet');
    Route::get('/modelo/show/{id}', [ModeloController::class,'edit'])->name('modeloEdit');
    Route::put('modelo/update/{id}', [ModeloController::class, 'update'])->name('modeloUpdate');

    
    // RUTAS  DE Categoras
    Route::get('/categorias',[CategoriaController::class,'index'])->name('categoriasIndex');
    Route::post('/categorias/store',[CategoriaController::class,'store'])->name('categoriaStore');
    Route::get('/categorias/show/{id}', [CategoriaController::class,'edit'])->name('categoriashow');
    Route::get('/categoria/{id}', [CategoriaController::class,'destroy'])->name('categoriaDelet');
    Route::put('categoria/update/{id}', [CategoriaController::class, 'update'])->name('categoriaUpdate');

    // RUTAS  DE Proveedores
     Route::get('/proveedores',[ProveedoresController::class,'index'])->name('proveedoresIndex');
     Route::post('/proveedores',[ProveedoresController::class,'store'])->name('proveedorStore');
     Route::get('/proveedor/{id}', [ProveedoresController::class,'destroy'])->name('proveedorDelet');
     Route::get('/proveedor/show/{id}', [ProveedoresController::class,'show'])->name('proveedorShow');
     Route::put('proveedor/update/{id}', [ProveedoresController::class, 'update'])->name('proveedorUpdate');
});

 Route::get('/prueba', function () {
    $modelo= Modelo::find(1);
    return $modelo->equipos;
 });