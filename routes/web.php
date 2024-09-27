<?php

// use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HorarioController;

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class,'index'])->name('posts.index');
Route::get('posts/{post}', [PostController::class,'show'])->name('posts.show');
Route::get('categories/{category}', [PostController::class,'category'])->name('posts.category');
Route::get('tag/{tag}',[PostController::class, 'tag'])->name('posts.tag');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
// ->group(function () {Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.home');});
->group(function () {Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');});




// Route::get('/', [WebController::class, 'index'])->name('index');
//RUTAS HORARIOS ADMIN
Route::resource('/admin/horarios', HorarioController::class)->names('admin.horarios')->middleware('auth', 'can:admin.horarios');

//AJAX
Route::get('/consultorio/{id}', [WebController::class, 'cargar_datos_consultorios'])->name('cargar_datos_consultorios')->middleware('auth','can:cargar_datos_consultorios');
Route::get('/cargar_reserva_doctores/{id}', [WebController::class, 'cargar_reserva_doctores'])->name('cargar_reserva_doctores')->middleware('auth','can:cargar_reserva_doctores');
Route::get('/admin/ver_reservas/{id}', [AdminController::class, 'ver_reservas'])->name('ver_reservas')->middleware('auth','can:ver_reservas');
Route::get('/admin/horarios/consultorio/{id}', [HorarioController::class, 'cargar_datos_consultorios'])->name('admin.horarios.cargar_datos_consultorios')->middleware('auth');
// Route::get('/admin/doctores/reportes', [DoctorController::class, 'reportes'])->name('admin.doctores.reportes');
