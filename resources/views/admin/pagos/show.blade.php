@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sistema de reservas de citas medicas</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h3>Detalle pago del paciente: {{ $pago->paciente->apellidos . ' ' . $pago->paciente->nombre }}</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        {{-- <h3 class="card-title">Llene los Datos</h3> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Paciente</label>
                                    <p>{{ $pago->paciente->apellidos . ' ' . $pago->paciente->nombre }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Doctores</label>
                                    <p>{{ $pago->doctor->apellidos . ' ' . $pago->doctor->nombre . ' - ' . $pago->doctor->especialidad }}</p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fecha_pago">Fecha de pago </label>
                                        <p>{{ $pago->fecha_pago }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="monto">Monto </label>
                                        <p>{{ $pago->monto }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion </label>
                                        <p>{{ $pago->descripcion }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <a href="{{ route('admin.pagos.index') }}" class="btn btn-secondary">Regresar
                            <i class="fas fa-fw fa-share fa-flip-horizontal fa-flip-vertical"></i>
                            
                        </a>
                    </div>
                </div>
            </div>

        </div>

    @stop

    @section('css')

    @stop

    @section('js')

    @stop
