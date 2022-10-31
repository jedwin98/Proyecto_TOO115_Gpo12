<?php

use App\Http\Controllers\DatosBiometricosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\AsociadosController;
use App\Http\Controllers\SolicitudesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwoFAController;

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

//Rutas para verificacion en dos pasos
Route::get('2fa', [TwoFAController::class, 'index'])->name('2fa.index');
Route::get('2far', [TwoFAController::class, 'indexR'])->name('2fa.indexR');
Route::post('2fa', [TwoFAController::class, 'store'])->name('2fa.post');
Route::get('2fa/reset', [TwoFAController::class, 'resend'])->name('2fa.resend');
//fin

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::match(['get','post'],'/', function () {
    return view('form');
})->middleware('auth','2fa');

Route::get('/biometricos',[DatosBiometricosController::class,'index'])->name('biometricos.index');
Route::post('/biometricos',[DatosBiometricosController::class,'store'])->name('biometricos.store');

Route::get('/solicitudes', [SolicitudesController::class, 'index'])->middleware('auth','2fa')->name('solicitudes.index');
Route::get('/solicitudes/{solicitud}', [SolicitudesController::class, 'show'])->middleware('auth','2fa')->name('solicitudes.show');
Route::get('/solicitud/{idUsuario}', [SolicitudesController::class, 'showUser'])->middleware('auth','2fa')->name('solicitud.showUser');
Route::get('/solicitudes/{solicitud}/edit', [SolicitudesController::class, 'edit'])->middleware('auth','2fa')->name('solicitudes.edit');
Route::put('/solicitudes/{solicitud}', [SolicitudesController::class, 'update'])->middleware('auth','2fa')->name('solicitudes.update');
Route::post('/solicitudes', [SolicitudesController::class, 'store'])->middleware('auth','2fa')->name('solicitudes.store');

Route::get('/roles', [UsuariosController::class, 'roles'])->name('roles');

// Rutas de Gestion de Usuarios
Route::get('/usuarios',[UsuariosController::class,'index'])->middleware('auth','2fa')->name('index');
Route::get('/usuarios_data',[UsuariosController::class,'usuarios_data'])->middleware('auth','2fa')->name('usuarios_data');
Route::get('/consultarusuariosajax',[UsuariosController::class,'consultarUsuarios'])->middleware('auth','2fa')->name('consultarusuariosajax');
Route::post('/editar_usuario',[UsuariosController::class,'update'])->middleware('auth','2fa')->name('editar_usuario');
Route::post('/crear_usuario',[UsuariosController::class,'create'])->middleware('auth','2fa')->name('crear_usuario');
Route::post('/eliminar_usuario',[UsuariosController::class,'destroy'])->middleware('auth','2fa')->name('eliminar_usuario');
//Fin

// Rutas de Gestion de Asociados
Route::get('/asociados',[AsociadosController::class,'index'])->middleware('auth','2fa');
Route::get('/asociados_data',[AsociadosController::class,'asociados_data'])->middleware('auth','2fa')->name('asociados_data');
Route::get('/paisesconsultarajax',[AsociadosController::class,'paisesconsultarajax'])->middleware('auth','2fa')->name('paisesconsultarajax');
Route::get('/ciudadesconsultarajax',[AsociadosController::class,'ciudadesconsultarajax'])->middleware('auth','2fa')->name('ciudadesconsultarajax');
Route::post('/datos_residencia_editar',[AsociadosController::class,'datosResidenciaUpdate'])->middleware('auth','2fa')->name('datos_residencia_editar');
//fin