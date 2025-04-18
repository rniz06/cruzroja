@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Usuarios')
@section('content_header_title', 'Usuarios')
@section('content_header_subtitle', 'Editar Usuario')

{{-- Content body: main page content --}}

@section('content_body')

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Añadir Usuario</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="POST">
            @csrf
            @method('put')
            <div class="card-body row">
                <div class="form-group col-4">
                    <label for="exampleInputEmail1">Nombre Completo:</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{old('name', $usuario->name)}}" placeholder="Nombre Completo...">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>                        
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="exampleInputEmail1">Email:</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" value="{{old('email', $usuario->email)}}" placeholder="Email...">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>                        
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="exampleInputEmail1">Nickname:</label>
                    <input type="text" name="nickname" class="form-control" id="exampleInputEmail1" value="{{old('nickname', $usuario->nickname)}}" placeholder="Nickname...">
                    @error('nickname')
                        <span class="text-danger">{{ $message }}</span>                        
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="exampleInputEmail1">Contraseña:</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Contraseña..." minlength="8">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>                        
                    @enderror
                </div>
                <div class="col-4">
                    <label for="">Rol:</label>
                    <select class="form-control" name="roles[]" id="roles" multiple="multiple" required
                        style="width: 100%;">
                        @foreach ($roles as $value => $label)
                            <option value="{{ $value }}" {{ isset($userRole[$value]) ? 'selected' : ''}}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Actualizar</button>
                <a href="{{route('usuarios.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Guardar</a>
            </div>
        </form>
    </div>

@stop

@section('plugins.Select2', true)

{{-- Push extra CSS --}}

@push('css')
    <style>
        /* Corrige estilos del select2 */
        .selection span {
            height: 38px !important;
        }
    </style>
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script>
        $(document).ready(function() {
            $('#roles').select2({
                placeholder: 'Seleccionar...',
                language: "es",
            });
        });
    </script>
@endpush
