@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Voluntarios')
@section('content_header_title', 'Voluntarios')
@section('content_header_subtitle', 'Registrar')

{{-- Content body: main page content --}}

@section('content_body')

    <div class="card card-info">
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('voluntarios.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombres:</label>
                    <div class="col-sm-10">
                        <input type="text" name="nombres" value="{{ old('nombres') }}" class="form-control"
                            id="inputEmail3" placeholder="Nombres..." required maxlength="50">
                        @error('nombres')
                            <p class="text-danger">*{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Apellido Paterno:</label>
                    <div class="col-sm-10">
                        <input type="text" name="apellido_paterno" value="{{ old('apellido_paterno') }}" class="form-control"
                            id="inputEmail3" placeholder="Apellido Paterno..." required maxlength="20">
                        @error('apellido_paterno')
                            <p class="text-danger">*{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Apellido Materno:</label>
                    <div class="col-sm-10">
                        <input type="text" name="apellido_materno" value="{{ old('apellido_materno') }}" class="form-control"
                            id="inputEmail3" placeholder="Apellido Materno..." required maxlength="20">
                        @error('apellido_materno')
                            <p class="text-danger">*{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Cédula:</label>
                    <div class="col-sm-10">
                        <input type="text" name="cedula" value="{{ old('cedula') }}" class="form-control"
                            id="inputEmail3" placeholder="Cédula..." required minlength="6" maxlength="15">
                        @error('cedula')
                            <p class="text-danger">*{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha Nacimiento:</label>
                    <div class="col-sm-10">
                        <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="form-control"
                            id="inputEmail3" required>
                        @error('fecha_nacimiento')
                            <p class="text-danger">*{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Edad:</label>
                    <div class="col-sm-10">
                        <input type="text" name="edad" value="{{ old('edad') }}" class="form-control"
                            id="inputEmail3" placeholder="Edad..." required>
                        @error('edad')
                            <p class="text-danger">*{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Lugar Nacimiento:</label>
                    <div class="col-sm-10">
                        <select name="lugar_nacimiento_id" id="lugar_nacimiento_id" class="form-control" id="inputEmail3" required>
                            <option>Seleccionar...</option>
                            @foreach ($ciudades as $ciudad)
                                <option value="{{ $ciudad->id_ciudad }}">
                                    {{ $ciudad->ciudad ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nacionalidad:</label>
                    <div class="col-sm-10">
                        <select name="nacionalidad_id" id="nacionalidad_id" class="form-control" id="inputEmail3" required>
                            <option>Seleccionar...</option>
                            @foreach ($paises as $pais)
                                <option value="{{ $pais->id_pais }}">
                                    {{ $pais->pais ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Sexo:</label>
                    <div class="col-sm-10">
                        <select name="sexo_id" class="form-control" id="inputEmail3" required>
                            <option>Seleccionar...</option>
                            @foreach ($sexos as $sexo)
                                <option value="{{ $sexo->id_voluntario_sexo }}">
                                    {{ $sexo->sexo ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Estado Civil:</label>
                    <div class="col-sm-10">
                        <select name="estado_civil_id" class="form-control" id="inputEmail3" required>
                            <option>Seleccionar...</option>
                            @foreach ($estadoCivil as $registro)
                                <option value="{{ $registro->idvoluntario_estado_civil }}">
                                    {{ $registro->estado_civil ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Grupo Sanguineo:</label>
                    <div class="col-sm-10">
                        <select name="grupo_sanguineo_id" class="form-control" id="inputEmail3" required>
                            <option>Seleccionar...</option>
                            @foreach ($grupoSanguineos as $registro)
                                <option value="{{ $registro->idvoluntario_grupo_sanguineo }}">
                                    {{ $registro->grupo_sanguineo ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Grado De Estudio:</label>
                    <div class="col-sm-10">
                        <select name="grado_estudio_id" class="form-control" id="inputEmail3" required>
                            <option>Seleccionar...</option>
                            @foreach ($grados_estudios as $grado_estudio)
                                <option value="{{ $grado_estudio->idvoluntario_grado_estudio }}">
                                    {{ $grado_estudio->grado_estudio ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Profesión:</label>
                    <div class="col-sm-10">
                        <select name="profesion_id" id="profesion_id" class="form-control" required>
                            <option>Seleccionar...</option>
                            @foreach ($profesiones as $profesion)
                                <option value="{{ $profesion->id_voluntario_profesion }}">
                                    {{ $profesion->profesion ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar</button>
                <a href="{{ route('voluntarios.index') }}" class="btn btn-secondary float-right"><i
                        class="fas fa-arrow-left"></i>
                    Volver</a>
            </div>
            <!-- /.card-footer -->
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
            $('#lugar_nacimiento_id').select2({
                placeholder: 'Seleccionar...',
                language: "es",

            });
        });

        $(document).ready(function() {
            $('#nacionalidad_id').select2({
                placeholder: 'Seleccionar...',
                language: "es",

            });
        });

        $(document).ready(function() {
            $('#profesion_id').select2({
                placeholder: 'Seleccionar...',
                language: "es",

            });
        });
    </script>
@endpush
