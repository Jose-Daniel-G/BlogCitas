    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')
        <h1>Sistema de reservas de citas medicas</h1>
    @stop

    @section('content')

        <div class="row">
            <h1>Actualizacion pago: {{ $pago->paciente->nombres . ' ' . $pago->paciente->apellidos }}</h1>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.pagos.update', $pago->id) }}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">Paciente</label><b>*</b>
                                        <select name="paciente_id" id="" class="form-control">
                                            @foreach ($pacientes as $paciente)
                                                <option value="{{ $paciente->id }}"
                                                    {{ $paciente->id == $pago->paciente_id ? 'selected' : '' }}>
                                                    {{ $paciente->apellidos . ' ' . $paciente->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('nombre')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">Doctores</label><b>*</b>
                                        <select name="doctor_id" id="" class="form-control">
                                            @foreach ($doctores as $doctor)
                                                <option value="{{ $doctor->id }}"
                                                    {{ $doctor->id == $pago->doctor_id ? 'selected' : '' }}>
                                                    {{ $doctor->apellidos . ' ' . $doctor->nombre }}</option>
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('nombre')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fecha_pago">Fecha de pago </label><b>*</b>
                                        <input type="date" class="form-control" name="fecha_pago"
                                            value="{{ $pago->fecha_pago }}" required>
                                        @error('fecha_pago')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="monto">Monto </label><b>*</b>
                                        <input type="text" class="form-control" name="monto"
                                            value="{{ $pago->monto }}" required>
                                        @error('monto')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion </label><b>*</b>
                                        <input type="text" class="form-control" name="descripcion"
                                            value="{{ $pago->descripcion }}" required>
                                        @error('descripcion')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    </div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <a href="{{ route('admin.pagos.index') }}" class="btn btn-secondary">
                                Cancelar
                                {{-- <i class="fa-solid fa-plus"></i> --}}
                            </a>
                            <button type="submit" class="btn btn-primary">Actualizar pago</button>
                        </div>
                    </div>
                    </form>

                </div>
            </div>

        </div>
        </div>
    @stop

    @section('css')

    @stop

    @section('js')

    @stop
