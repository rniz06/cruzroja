@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Usuarios')
@section('content_header_title', 'Usuarios')
@section('content_header_subtitle', 'Asignar Roles')

{{-- Content body: main page content --}}

@section('content_body')

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Asignar Roles a usuario</h3>
        </div>

        <!-- form start -->
        <form action="{{ route('usuarios.asignarrole', $usuario->id_user) }}" method="POST">
            @method('post')
            @csrf
            <div class="card-body row">
                <div class="col-3">
                    <label for="">Nombre Completo:</label>
                    <p class="form-control">{{ $usuario->nombrecompleto ?? 'N/A' }}</p>
                </div>
                <div class="col-3">
                    <label for="">Codigo:</label>
                    <p class="form-control">{{ $usuario->codigo ?? 'N/A' }}</p>
                </div>
                <div class="col-3">
                    <label for="">Documento:</label>
                    <p class="form-control">{{ $usuario->documento ?? 'N/A' }}</p>
                </div>
                <div class="col-3">
                    <label for="">Compañia:</label>
                    <p class="form-control">{{ $usuario->compania ?? 'N/A' }}</p>
                </div>

                <div class="col-12">
                    <label for="">Roles:</label>
                    <select name="roles[]" class="form-control" multiple="multiple">
                        @foreach ($roles as $value => $label)
                            <option value="{{ $value }}">
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                    Volver</a>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
            </div>
        </form>
    </div>

@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    {{-- <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script> --}}
@endpush
