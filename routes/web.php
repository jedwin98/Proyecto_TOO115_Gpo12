<?php

use App\Http\Controllers\DatosBiometricosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::match(['get','post'],'/', function () {
    return view('form');
})->middleware('auth');

Route::get('/biometricos',[DatosBiometricosController::class,'index'])->name('biometricos.index');
Route::post('/biometricos',[DatosBiometricosController::class,'store'])->name('biometricos.store');


Route::get('/roles', [UsuariosController::class, 'roles'])->name('roles');

// Rutas de Gestion de Usuarios
Route::get('/usuarios',[UsuariosController::class,'index'])->middleware('auth')->name('index');
Route::get('/usuarios_data',[UsuariosController::class,'usuarios_data'])->middleware('auth')->name('usuarios_data');
Route::get('/consultarusuariosajax',[UsuariosController::class,'consultarUsuarios'])->middleware('auth')->name('consultarusuariosajax');
Route::post('/editar_usuario',[UsuariosController::class,'update'])->middleware('auth')->name('editar_usuario');
Route::post('/crear_usuario',[UsuariosController::class,'create'])->middleware('auth')->name('crear_usuario');
Route::post('/eliminar_usuario',[UsuariosController::class,'destroy'])->middleware('auth')->name('eliminar_usuario');
//Fin
