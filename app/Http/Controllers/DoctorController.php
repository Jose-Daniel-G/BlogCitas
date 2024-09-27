<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index()
    {
        $doctores = Doctor::with('user')->get(); // viene con la relacion del doctor
        return view('admin.doctores.index', compact(('doctores')));
    }

    public function create()
    {
        return view('admin.doctores.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'licencia_medica' => 'required',
            'especialidad' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'nullable|max:255|confirmed',
        ]);
        
        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }
        // Crear un nuevo doctor
        $data = $request->all();
        $data['user_id'] = auth()->id();

        // Crea el nuevo doctor
        Doctor::create($data);
        $usuario->assignRole('doctor');


        return redirect()->route('admin.doctores.index')
            ->with('info', 'Se registro el doctor de forma correcta')
            ->with('icono', 'success');
    }

    public function show(Doctor $doctor)
    {
        return view('admin.doctores.show', compact('doctor'));
    }

    public function edit(Doctor $doctor)
    {
        return view('admin.doctores.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'licencia_medica' => 'required',
            'especialidad' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'nullable|max:255|confirmed',
        ]);
        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }
        // acrualiza un nuevo doctor
        $data = $request->all();
        $data['user_id'] = auth()->id();

        // Crea el nuevo doctor
        $doctor->update($data);


        return redirect()->route('admin.doctores.index')
            ->with('info', 'Doctor actualizado correctamente.')
            ->with('icono', 'success');
    }


    public function destroy(Doctor $doctor)
    {
        // dd($doctor);
        if ($doctor->user) {
            $doctor->user->delete(); // Si el doctor tiene un usuario asociado, eliminarlo
        }

        // Eliminar el doctor
        $doctor->delete();

        return redirect()->route('admin.doctores.index')
            ->with('info', 'El doctor se eliminó con éxito')
            ->with('icono', 'success');
    }
    public function reportes()
    {
        return view('admin.doctores.reportes');
    }
    public function pdf()
    {
        $config = Config::latest()->first();
        $doctores = Doctor::all();
        // dd($config);
        $pdf = PDF::loadView('admin.doctores.pdf', compact('config', 'doctores'));

        // Incluir la numeración de páginas y el pie de página
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20, 800, "Impreso por: " . Auth::user()->email, null, 10, array(0, 0, 0));
        $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        $canvas->page_text(450, 800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y') . " - " . \Carbon\Carbon::now()->format('H:i:s'), null, 10, array(0, 0, 0));

        return $pdf->stream();
    }
}
