<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ReporteController;

// use App\Http\Controllers\UsuarioController;
// use App\Http\Controllers\ClaseController;
// use App\Http\Controllers\CursoController;

Route::get("/", [HomeController::class, "index"])->name("admin.home")->middleware('can:admin.home');
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');
Route::resource('tags', TagController::class)->except('show')->names('admin.tags');
Route::resource('posts', PostController::class)->names('admin.posts');

// Route::resource('cursos', CursoController::class)->names('admin.cursos');
// Route::resource('clases', ClaseController::class)->names('admin.clases');

//RUTAS ADMIN
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/admin/ver_reservas/{id}', [AdminController::class, 'ver_reservas'])->name('admin.ver_reservas')->middleware('auth','can:admin.ver_reservas');

//RUTAS USUARIOS ADMIN
// Route::resource('/admin/usuarios', UsuarioController::class)->names('admin.usuarios')->middleware('auth', 'can:admin.usuarios');

//RUTAS CONFIGURACIONES ADMIN
Route::resource('/admin/config', ConfigController::class)->names('admin.config')->middleware('auth', 'can:admin.config');

//RUTAS SECRETARIAS ADMIN
Route::resource('/admin/secretarias', SecretariaController::class)->names('admin.secretarias')->middleware('auth', 'can:admin.secretarias');

//RUTAS PACIENTES ADMIN
Route::resource('/admin/pacientes', PacienteController::class)->names('admin.pacientes')->middleware('auth', 'can:admin.pacientes');

//RUTAS CONSULTORIOS ADMIN
Route::resource('/admin/consultorios', ConsultorioController::class)->names('admin.consultorios')->middleware('auth', 'can:admin.consultorios');

//RUTAS DOCTORES ADMIN
Route::resource('/admin/doctores', DoctorController::class)->names('admin.doctores')->parameters(['doctores' => 'doctor'])->middleware('auth', 'can:admin.doctores');
Route::resource('/admin/doctores/reportes', DoctorController::class)->names('admin.reportes')->middleware('auth', 'can:admin.reportes');
