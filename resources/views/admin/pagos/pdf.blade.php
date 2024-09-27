<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">
                    {{ $config->nombre }} <br>
                    {{ $config->direccion }} <br>
                    {{ $config->telefono }} <br>
                    {{ $config->correo }} <br>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row"> <img src="{{ asset('storage/' . $config->logo) }}" alt="logo" width="80px"></td>
            </tr>
        </tbody>
    </table>
    <br>
    <h1 style="text-align: center;">COMPROBANTE DE PAGO - ORIGINAL</h1>
    <br>
    <table border="0" cellpadding="5px" cellspacing="5px">
        <tr>
            <td width="120px"><b>Sr(es):</b></td>
            <td>{{ $pago->paciente->apellidos . ' ' . $pago->paciente->nombres }}</td>
            <td width="150px" rowspan="4"></td>
            <td rowspan="4">
                <div><img src="data:image/png;base64, {{ $qrCodeBase64 }}" alt="Codigo QR" width="150px"></div>
            </td>
        </tr>
        <tr>
            <td><b>Fecha:</b></td>
            <td>{{ $pago->fecha_pago }}</td>

        </tr>
        <tr>
            <td><b>Consultorio:</b></td>
            <td>{{ $pago->doctor->especialidad }}</td>

        </tr>
        <tr>
            <td><b>Monto:</b></td>
            <td>{{ $pago->monto }}</td>

        </tr>
    </table>
    <br><br>
    <table class="table" border="0" style="font-size: 9pt;">
        <tr>
            <td width="210px">
                <p style="text-align: center;">
                    _________________________<br>
                    <b>Secretaria</b>
                    {{ Auth::user()->secretarias->apellidos . ' ' . Auth::user()->secretarias->nombres }}
                </p>
            </td>
    
            <td width="210px"></td>
    
            <td width="210px">
                <p style="text-align: center;">
                    _________________________<br>
                    <b>Recibi conforme</b>
                </p>
            </td>
        </tr>
    </table>
    
    <P>--------------------------------------------------------------------------------------------------------------------
    </P>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">
                    {{ $config->nombre }} <br>
                    {{ $config->direccion }} <br>
                    {{ $config->telefono }} <br>
                    {{ $config->correo }} <br>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row"> <img src="{{ asset('storage/' . $config->logo) }}" alt="logo" width="80px"></td>
            </tr>
        </tbody>
    </table>
    <br>
    <h1 style="text-align: center;">COMPROBANTE DE PAGO - COPIA</h1>
    <br>
    <table border="0" cellpadding="5px" cellspacing="5px">
        <tr>
            <td width="120px"><b>Sr(es):</b></td>
            <td>{{ $pago->paciente->apellidos . ' ' . $pago->paciente->nombres }}</td>
            <td width="150px" rowspan="4"></td>
            <td rowspan="4">
                <div><img src="data:image/png;base64, {{ $qrCodeBase64 }}" alt="Codigo QR" width="150px"></div>
            </td>
        </tr>
        <tr>
            <td><b>Fecha:</b></td>
            <td>{{ $pago->fecha_pago }}</td>

        </tr>
        <tr>
            <td><b>Consultorio:</b></td>
            <td>{{ $pago->doctor->especialidad }}</td>

        </tr>
        <tr>
            <td><b>Monto:</b></td>
            <td>{{ $pago->monto }}</td>

        </tr>
    </table>
    <br><br>
    <table class="table" border="0" style="font-size: 9pt;">
        <tr>
            <td width="210px">
                <p style="text-align: center;">
                    _________________________<br>
                    <b>Secretaria</b>
                    {{ Auth::user()->secretarias->apellidos . ' ' . Auth::user()->secretarias->nombres }}
                </p>
            </td>
    
            <td width="210px"></td>
    
            <td width="210px">
                <p style="text-align: center;">
                    _________________________<br>
                    <b>Recibi conforme</b>
                </p>
            </td>
        </tr>
    </table>
</body>

</html>
