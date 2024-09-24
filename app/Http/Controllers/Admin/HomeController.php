<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Event as CalendarEvent;  // Usa un alias para el modelo Event
use App\Models\Horario;
use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $total_usuarios = User::count();
        $total_secretarias = Secretaria::count();
        $total_pacientes = Paciente::count();
        $total_consultorios = Consultorio::count();
        $total_doctores = Doctor::count();
        $total_horarios = Horario::count();
        $total_eventos = CalendarEvent::count();
        $total_configuraciones = Config::count();
        
        $consultorios = Consultorio::all();
        $doctores =Doctor::all();
        $eventos = CalendarEvent::all();
        return view('admin.index', compact('total_usuarios', 'total_secretarias', 'total_pacientes', 'total_consultorios', 'total_doctores', 'total_horarios','total_eventos','consultorios', 'doctores', 'eventos','total_configuraciones'));
    }
}
