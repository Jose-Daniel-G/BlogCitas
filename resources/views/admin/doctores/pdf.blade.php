<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado del Personal Médico</title>
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
    <div class="header-info">
        <strong>{{ $config->nombre }}</strong><br>
        {{ $config->direccion }}<br>
        {{ $config->telefono }}<br>
        {{ $config->correo }}<br>
        <img src="{{ url('storage/' . $config->logo) }}" alt="logo">
    </div>
    <h2>Listado del Personal Médico</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Apellidos y Nombres</th>
                <th>Teléfono</th>
                <th>Licencia Médica</th>
                <th>Especialidad</th>
            </tr>
        </thead>
        <tbody>
            <?php $contador = 1; ?>
            @foreach ($doctores as $doctor)
                <tr>
                    <td style="text-align: center">{{ $contador++ }}</td>
                    <td>{{ $doctor->apellidos . ' ' . $doctor->nombres }}</td>
                    <td style="text-align: center">{{ $doctor->telefono }}</td>
                    <td>{{ $doctor->licencia_medica }}</td>
                    <td>{{ $doctor->especialidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
