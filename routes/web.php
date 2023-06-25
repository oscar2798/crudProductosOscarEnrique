<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix("admin")->group(function(){
    Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
    Route::get('/productos/create', [ProductosController::class, 'create'])->name('productos.create'); // ->middleware('auth');
    Route::post('/producto/create', [ProductosController::class, 'store'])->name('producto.store');
    
    Route::get('/producto/{producto}/detalle', [ProductosController::class, 'show'])->name('producto.detalle');
    
    Route::get('/producto/{producto}/edit', [ProductosController::class, 'edit'])->name('producto.edit');
    Route::put('/producto/{producto}', [ProductosController::class, 'update'])->name('producto.update');
    
    Route::get('/producto/{producto}/delete', [ProductosController::class, 'destroy'])->name('producto.destroy');

    Route::get('/producto/{producto}/inactivarActivarProducto', [ProductosController::class,'inactivarActivarProducto'])->name('inactivarActivar');

});





