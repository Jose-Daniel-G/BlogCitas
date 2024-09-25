@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sistema de reservas de citas medicas</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1>Registro de un nuevo pago</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Llene los Datos</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.pagos.store') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">Paciente</label><b>*</b>
                                        <select name="paciente_id" id="" class="form-control">
                                            @foreach ($pacientes as $paciente)
                                                <option value="{{ $paciente->id }}">{{ $paciente->apellidos . ' ' . $paciente->nombre }}</option>
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
                                                <option value="{{ $doctor->id }}">{{ $doctor->apellidos . ' ' . $doctor->nombre. ' - ' . $doctor->especialidad }}</option>
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
                                            value="<?php echo date('Y-m-d'); ?>" required>
                                        @error('fecha_pago')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="monto">Monto </label><b>*</b>
                                        <input type="text" class="form-control" name="monto"
                                            value="{{ old('monto') }}" required>
                                        @error('monto')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion </label><b>*</b>
                                        <input type="text" class="form-control" name="descripcion"
                                            value="{{ old('descripcion') }}" required>
                                        @error('descripcion')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
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
                    <button type="submit" class="btn btn-primary">Registrar consultorio</button>
                </div>
            </div>
        </div>
        </form>
    </div>

@stop

@section('css')

@stop

@section('js')

@stop
