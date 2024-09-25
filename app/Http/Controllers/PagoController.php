<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Pago;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Config;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Auth;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::all();
        $total_monto = Pago::sum('monto');
        return view('admin.pagos.index', compact('pagos', 'total_monto'));
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
    public function pdf($id)
    {   //echo $id;
        $config = Config::latest()->first();
        // Obtener el pago específico según el ID
        $pago = Pago::with('paciente', 'doctor')->findOrFail($id);

        $data = "Codigo de serguridad del comprobante de pago del paciente "
            . $pago->paciente->apellido . " " . $pago->paciente->nombres . " en fecha "
            . $pago->fecha_pago . " con el monto de " . $pago->monto;

        //GENEREAR EL CODIGOQR    
        $qrCode = new QrCode($data);
        $writer = new PngWriter($data);
        $result = $writer->write($qrCode);
        $qrCodeBase64 = base64_encode($result->getString());
            
        // dd($doctores);
        $pdf = Pdf::loadView('admin.pagos.pdf', compact('config', 'pago','qrCodeBase64'));

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
