<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {font-family: Arial, sans-serif;font-size: 8pt;margin: 0;padding: 20px; }
        table {width: 100%;border-collapse: collapse;margin-bottom: 20px; }
        th, td {border: 1px solid #ddd;padding: 8px;text-align: left; }
        th {background-color: #e7e7e7;color: #333; }
        h2 {text-align: center;margin: 20px 0; }
        .header-info {text-align: center;margin-bottom: 20px; }
        .header-info img {width: 80px;display: block;margin: 0 auto; }
    </style>
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
                {{-- <td scope="row"> <img src="{{ asset('storage/' . $config->logo) }}" alt="logo" width="80px"></td> --}}
            </tr>
        </tbody>
    </table>
    <h2>Listado de todas las reservas: medicas</h2>
    <table class="table">
        <thead class="bg-secondary text-white p-3">
            <tr>
                <th>Nro</th>
                <th>Doctor</th>
                <th>Epecialidad</th>
                <th>Fecha de reserva</th>
                <th>Hora de reserva</th>
            </tr>
        </thead>
        <tbody>
            <?php $contador = 1;?>
            @foreach ($eventos as $evento)
                <tr>
                    <td class="text-center">{{ $contador++ }}</td>
                    <td>{{ $evento->doctor->nombres }}</td>
                    <td class="text-center">{{ $evento->doctor->especialidad }}</td>
                    <td>{{ \Carbon\Carbon::parse($evento->start)->format('Y-m-d') }}</td>
                    <td>{{ \Carbon\Carbon::parse($evento->end)->format('H:i') }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>
