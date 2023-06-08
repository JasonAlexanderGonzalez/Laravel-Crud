<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantsController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BitacorasController;
use App\Http\Controllers\DashboardController;
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'InfoDashboard'])->name('dashboard');   
});

//TENANT CONTROLLER
Route::get('/tenant/edit', 'App\Http\Controllers\TenantsController@edit')->name('tenant.edit');

//CATEGORIAS CONTROLLER
Route::controller(CategoriasController::class)->group(function () {
    //carga de Formulario
    Route::get('/modulo/categorias', 'Categorias')->name('modulos.categorias');
    Route::get('/modulo/categorias/{id}', 'EditarCategoria');
    //llamada de métodos
    Route::post('/guardar/categoria', 'GuardarCategoria')->name('guardar.categoria');
    Route::post('/modificar/categoria', 'ModificarCategoria')->name('modificar.categoria');
    Route::get('/eliminar/categoria/{id}', 'EliminarCategoria')->name('eliminar.categoria');
});

Route::controller(BitacorasController::class)->group(function () {
    //carga de Formulario
    Route::get('/modulo/bitacoras', 'Bitacoras')->name('modulos.bitacoras');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');
    Route::post('/changedata/profile', 'ChangeProfileData')->name('changedata.profile');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});

Route::controller(TenantsController::class)->group(function () {
    Route::post('/modulos/perfil_tienda_paraeditar.blade', 'editarTenant')->name('changedata.tenant');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
