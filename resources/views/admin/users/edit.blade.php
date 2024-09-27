@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sistema de reservas de citas medicas</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1>Modificar usuario: {{ $user->name }}</h1>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Datos a llenar</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Nombre del user </label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $user->name }}" required>
                                        @error('nombre')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $user->email }}" required>
                                    </div>
                                    @error('email')
                                        <small class="bg-danger text-white p-1">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">Contrasena</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    @error('password')
                                        <small class="bg-danger text-white p-1">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password_confirmation">Verificacion de contrasena</label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                    @error('password_confirmation')
                                        <small class="bg-danger text-white p-1">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @foreach ($roles as $role)
                                            <label>
                                                <input type="checkbox" name="roles[]" value="{{ $role->id }}" 
                                                       {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                                                {{ $role->name }}
                                            </label>
                                    @endforeach
                                    </div>
                                    @error('password_confirmation')
                                        <small class="bg-danger text-white p-1">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-success">Actualizar usuarios</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
