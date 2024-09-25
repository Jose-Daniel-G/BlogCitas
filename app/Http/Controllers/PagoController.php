<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::all();
        return view('admin.pagos.index', compact('pagos'));
    }

    public function create()
    {
        $pacientes = Paciente::orderBy('apellidos', 'asc')->get();
        $doctores = Doctor::orderBy('apellidos', 'asc')->get();
        return view('admin.pagos.create', compact('pacientes', 'doctores'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'paciente_id' => 'required',
            'doctor_id' => 'required',
            'fecha_pago' => 'required',
            'monto' => 'required',
            'descripcion' => 'required',
        ]);
        Pago::create($validatedData); // Asignación masiva

        return redirect()->route('admin.pagos.index')
            ->with('info', 'Se registro el pago de forma correcta')
            ->with('icono', 'success');
    }

    public function show(Pago $pago)
    {
        return view('admin.pagos.show', compact('pago'));
    }

    public function edit(Pago $pago)
    {
        $pacientes = Paciente::all();
        $doctores = Doctor::all();

        return view('admin.pagos.edit', compact('pago', 'pacientes', 'doctores'));
    }

    public function update(Request $request, Pago $pago)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'paciente_id' => 'required',
            'doctor_id' => 'required',
            'fecha_pago' => 'required',
            'monto' => 'required',
            'descripcion' => 'required',
        ]);
        // Actualizar el pago con los datos validados
        $pago->update($validatedData); // Asignación masiva

        return redirect()->route('admin.pagos.index')
            ->with('info', 'El pago se actualizo de forma correcta')
            ->with('icono', 'success');
    }

    public function destroy(Pago $pago)
    {
        // dd($doctor);
            $pago->paciente->delete();

        return redirect()->route('admin.pagos.index')
            ->with('info', 'El pago se eliminó con éxito')
            ->with('icono', 'success');
    }
}
