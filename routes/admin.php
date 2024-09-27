<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PagoController;



//RUTAS ADMIN
Route::get("/", [HomeController::class, "index"])->name("admin.home")->middleware('can:admin.home');
Route::get('/admin', [HomeController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/admin/ver_reservas/{id}', [HomeController::class, 'ver_reservas'])->name('admin.ver_reservas');
// ->middleware('auth','can:ver_reservas');

//RUTAS USUARIOS ADMIN
// Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');
Route::resource('users', UserController::class)->names('admin.users');

//RUTAS CONFIGURACIONES ADMIN
Route::resource('/config', ConfigController::class)->names('admin.config')->middleware('auth', 'can:admin.config');

//RUTAS SECRETARIAS ADMIN
Route::resource('/secretarias', SecretariaController::class)->names('admin.secretarias')->middleware('auth', 'can:admin.secretarias');

//RUTAS PACIENTES ADMIN
Route::resource('/pacientes', PacienteController::class)->names('admin.pacientes')->middleware('auth', 'can:admin.pacientes');

//RUTAS CONSULTORIOS ADMIN
Route::resource('/consultorios', ConsultorioController::class)->names('admin.consultorios')->middleware('auth', 'can:admin.consultorios');

//RUTAS REPORTES DOCTORES ADMIN
Route::get('/doctores/reportes', [DoctorController::class, 'reportes'])->name('admin.doctores.reportes')->middleware('auth', 'can:admin.doctores.reportes');
Route::get('/doctores/pdf', [DoctorController::class, 'pdf'])->name('admin.doctores.pdf')->middleware('auth', 'can:admin.doctores.pdf');
Route::resource('/doctores', DoctorController::class)->names('admin.doctores')->parameters(['doctores' => 'doctor'])->middleware('auth', 'can:admin.doctores');

//RUTAS HORARIOS ADMIN
Route::resource('/admin/horarios', HorarioController::class)->names('admin.horarios')->middleware('auth', 'can:admin.horarios');

//RUTAS PARA LOS EVENTOS
Route::resource('/eventos', EventController::class)->names('admin.eventos');

//RUTAS para las reservas
Route::get('/reservas/reportes', [EventController::class, 'reportes'])->name('admin.reservas.reportes')->middleware('auth', 'can:admin.reservas.reportes');
Route::get('/reservas/pdf', [EventController::class, 'pdf'])->name('admin.reservas.pdf')->middleware('auth', 'can:admin.reservas.pdf');
Route::get('/reservas/pdf_fechas', [EventController::class, 'pdf_fechas'])->name('admin.reservas.pdf_fechas')->middleware('auth', 'can:admin.event.pdf_fechas');

//RUTAS para el historial clinico
Route::get('/historial/pdf',[HistorialController::class,'pdf'])->name('admin.historial.pdf')->middleware('auth', 'can:admin.historial');
Route::resource('/historial', HistorialController::class)->names('admin.historial')->middleware('auth', 'can:admin.historial');

//RUTAS para pagos
Route::get('/pagos/pdf/{id}',[PagoController::class,'pdf'])->name('admin.pagos.pdf');
// ->middleware('auth', 'can:admin.pagos')
Route::resource('/pagos', PagoController::class)->names('admin.pagos')->middleware('auth', 'can:admin.pagos');

Route::get('/admin/horarios/consultorio/{id}', [HorarioController::class, 'cargar_datos_consultorios'])->name('admin.horarios.cargar_datos_consultorios')->middleware('auth');

// // use App\Http\Controllers\UsuarioController;
// // use App\Http\Controllers\ClaseController;
// // use App\Http\Controllers\CursoController;

//RUTAS USUARIOS ADMIN
// Route::resource('/usuarios', UsuarioController::class)->names('admin.users')->middleware('auth', 'can:admin.users');

// Route::resource('cursos', CursoController::class)->names('admin.cursos');
// Route::resource('clases', ClaseController::class)->names('admin.clases');
// Route::post('/eventos/create', [EventController::class, 'store'])->name('admin.eventos.store');
// Route::delete('/eventos/delete/{evento}', [EventController::class, 'destroy'])->name('admin.eventos.destroy');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');
Route::resource('tags', TagController::class)->except('show')->names('admin.tags');
Route::resource('posts', PostController::class)->names('admin.posts');