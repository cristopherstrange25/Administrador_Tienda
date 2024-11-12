<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\LoginController;

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
Route::get('/welcome', function () {
    return view('welcome');
});
Route::view('/cover','/cover/index');
Route::view('/product','/product/index');
Route::view('/pricing','/pricing/index');
Route::view('/sticky','/sticky-footer-navbar/index');
Route::view('/admin/plantilla','/admin/plantilla/layout');
Route::view('/admin/inicio','/admin/plantilla/inicio');



//Route::view('/admin/categorias','/admin/categorias/list');
//Route::view('/admin/categorias/crear','/admin/categorias/create');


/*
Route::view('/admin/administradores','/admin/administradores/list');
Route::view('/admin/cliente','/admin/cliente/list');
Route::view('/admin/pedidos','/admin/pedidos/list');
Route::view('/admin/productos','/admin/productos/list');
Route::view('/admin/proveedores','/admin/proveedores/list');




Route::view('/admin/administradores/crear','/admin/administradores/create');

Route::view('/admin/cliente/crear','/admin/cliente/create');

Route::view('/admin/pedidos/crear','/admin/pedidos/create');

Route::view('/admin/productos/crear','/admin/productos/create');

Route::view('/admin/proveedores/crear','/admin/proveedores/create');*/
Route::get('/login', [LoginController::class, 'inicio'])->name('login');
Route::post('/login2', [LoginController::class, 'login']);

Route::get('/register', [LoginController::class, 'registro'])->name('registro'); // Ruta para mostrar el formulario
Route::post('/validar-registro', [LoginController::class, 'register']);


Route::get('/categorias',[CategoryController::class,'indice']);
Route::get('/categorias/crear',[CategoryController::class,'crear']);
Route::post('/categorias',[CategoryController::class,'guardar']);
Route::get('/categorias/editar/{id}',[CategoryController::class,'editar']);
Route::put('/categorias/{id}',[CategoryController::class,'actualizar']);
Route::get('/categorias/mostrar/{id}',[CategoryController::class,'mostrar']);
Route::delete('/categorias/{id}',[CategoryController::class,'borrar']);

Route::get('/cliente',[CustomerController::class,'indice']);
Route::get('/cliente/crear',[CustomerController::class,'crear']);
Route::post('/cliente',[CustomerController::class,'guardar']);
Route::get('/cliente/editar/{id}',[CustomerController::class,'editar']);
Route::put('/cliente/{id}',[CustomerController::class,'actualizar']);
Route::get('/cliente/mostrar/{id}',[CustomerController::class,'mostrar']);
Route::delete('/cliente/{id}',[CustomerController::class,'borrar']);

Route::get('/empleados', [EmployeeController::class, 'indice'])->name('admin.empleados.list');
Route::get('/empleados/crear', [EmployeeController::class, 'crear'])->name('empleados.crear');
Route::post('/empleados', [EmployeeController::class, 'guardar'])->name('empleados.guardar');
Route::get('/empleados/editar/{id}', [EmployeeController::class, 'editar'])->name('empleados.editar');
Route::put('/empleados/{id}', [EmployeeController::class, 'actualizar'])->name('empleados.actualizar');
Route::get('/empleados/mostrar/{id}', [EmployeeController::class, 'mostrar'])->name('empleados.mostrar');
Route::delete('/empleados/{id}', [EmployeeController::class, 'borrar'])->name('empleados.borrar');

Route::get('/pedidos',[OrderController::class,'indice']);
Route::get('/pedidos/crear',[OrderController::class,'crear']);
Route::post('/pedidos',[OrderController::class,'guardar']);
Route::get('/pedidos/editar/{id}',[OrderController::class,'editar']);
Route::put('/pedidos/{id}',[OrderController::class,'actualizar']);
Route::get('/pedidos/mostrar/{id}',[OrderController::class,'mostrar']);
Route::delete('/pedidos/{id}',[OrderController::class,'borrar']);

Route::get('/productos',[ProductController::class,'indice']);
Route::get('/productos/crear',[ProductController::class,'crear']);
Route::post('/productos',[ProductController::class,'guardar']);
Route::get('/productos/editar/{id}',[ProductController::class,'editar']);
Route::put('/productos/{id}',[ProductController::class,'actualizar']);
Route::get('/productos/mostrar/{id}',[ProductController::class,'mostrar']);
Route::delete('/productos/{id}',[ProductController::class,'borrar']);

Route::get('/proveedores',[SupplierController::class,'indice']);
Route::get('/proveedores/crear',[SupplierController::class,'crear']);
Route::post('/proveedores',[SupplierController::class,'guardar']);
Route::get('/proveedores/editar/{id}',[SupplierController::class,'editar']);
Route::put('/proveedores/{id}',[SupplierController::class,'actualizar']);
Route::get('/proveedores/mostrar/{id}',[SupplierController::class,'mostrar']);
Route::delete('/proveedores/{id}',[SupplierController::class,'borrar']);