<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::with('user')->get(); // viene con la relacion del paciente
        return view('admin.pacientes.index', compact(('pacientes')));
    }

    public function create()
    {
        return view('admin.pacientes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'cc' => 'required',
            'nro_seguro' => 'required',
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'celular' => 'required',
            'correo' => 'required|email|max:250|unique:pacientes',
            'direccion' => 'required',
            'grupo_sanguineo' => 'required',
            'alergias' => 'required',
            'contacto_emergencia' => 'required',
            'password' => 'nullable|max:255|confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->correo;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        // Crear un nuevo doctor
        $data = $request->all();
        $data['user_id'] = auth()->id();
        // Crear un nuevo paciente
        Paciente::create($data); // Asignación masiva
        $usuario->assignRole('paciente');

        return redirect()->route('admin.pacientes.index')
            ->with('info', 'Se registro al paciente de forma correcta')
            ->with('icono', 'success');
    }

    public function show(Paciente $paciente)
    {
        return view('admin.pacientes.show', compact('paciente'));
    }

    public function edit(Paciente $paciente)
    {
        $historial = Historial::all();
        $pacientes = Paciente::orderBy('apellidos', 'asc')->get();
        return view('admin.pacientes.edit', compact('historial', 'pacientes'));
    }

    public function update(Request $request, Paciente $paciente)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'cc' => 'required|unique:pacientes,cc,' . $paciente->id,
            'nro_seguro' => 'required|unique:pacientes,nro_seguro,' . $paciente->id,
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'celular' => 'required',
            'correo' => 'required|email|max:250|unique:pacientes,correo,' . $paciente->id,
            'direccion' => 'required',
            'alergias' => 'required',
            'contacto_emergencia' => 'required',
        ]);

        // Actualizar los datos del paciente existente
        $paciente->fill($validatedData); // Asignación masiva
        $paciente->save(); // Guardar los cambios

        return redirect()->route('admin.pacientes.index')
            ->with('info', 'Paciente actualizado correctamente.')
            ->with('icono', 'success');
    }


    public function destroy(Paciente $paciente)
    {
        // Verificar si el paciente tiene un usuario asociado
        if ($paciente->user) {
            // Si existe un usuario asociado, eliminarlo
            $paciente->user->delete();
        }

        // Eliminar el paciente
        $paciente->delete();

        return redirect()->route('admin.pacientes.index')
            ->with('info', 'El paciente se eliminó con éxito')
            ->with('icono', 'success');
    }
}
