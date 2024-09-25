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
use App\Http\Controllers\EventController;

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
Route::get('/ver_reservas/{id}', [AdminController::class, 'ver_reservas'])->name('admin.ver_reservas')->middleware('auth','can:admin.ver_reservas');

//RUTAS USUARIOS ADMIN
// Route::resource('/usuarios', UsuarioController::class)->names('admin.usuarios')->middleware('auth', 'can:admin.usuarios');

//RUTAS CONFIGURACIONES ADMIN
Route::resource('/config', ConfigController::class)->names('admin.config')->middleware('auth', 'can:admin.config');

//RUTAS SECRETARIAS ADMIN
Route::resource('/secretarias', SecretariaController::class)->names('admin.secretarias')->middleware('auth', 'can:admin.secretarias');

//RUTAS PACIENTES ADMIN
Route::resource('/pacientes', PacienteController::class)->names('admin.pacientes')->middleware('auth', 'can:admin.pacientes');

//RUTAS CONSULTORIOS ADMIN
Route::resource('/consultorios', ConsultorioController::class)->names('admin.consultorios')->middleware('auth', 'can:admin.consultorios');

//RUTAS REPORTES DOCTORES ADMIN
Route::get('/doctores/pdf', [DoctorController::class, 'reportes'])->name('admin.doctores.pdf')->middleware('auth', 'can:admin.doctores.pdf');
Route::get('/doctores/reportes', [DoctorController::class, 'reportes'])->name('admin.doctores.reportes')->middleware('auth', 'can:admin.doctores.reportes');
Route::resource('/doctores', DoctorController::class)->names('admin.doctores')->parameters(['doctores' => 'doctor'])->middleware('auth', 'can:admin.doctores');


Route::resource('/eventos/create', EventController::class)->names('admin.eventos');

// Route::post('/eventos/create', [EventController::class, 'store'])->name('admin.eventos.store');
// Route::delete('/eventos/delete/{evento}', [EventController::class, 'destroy'])->name('admin.eventos.destroy');

//RUTAS para las reservas
Route::get('/reservas/reportes', [EventController::class, 'reportes'])->name('admin.reservas.reportes')->middleware('auth', 'can:admin.reservas.reportes');
Route::get('/reservas/pdf', [EventController::class, 'pdf'])->name('admin.reservas.pdf')->middleware('auth', 'can:admin.reservas.pdf');
Route::get('/reservas/pdf_fechas', [EventController::class, 'pdf_fechas'])->name('admin.reservas.pdf_fechas')->middleware('auth', 'can:admin.event.pdf_fechas');


