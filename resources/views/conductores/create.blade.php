@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Conductores')
@section('content_header_title', 'Conductores')
@section('content_header_subtitle', 'Registrar')

{{-- Content body: main page content --}}

@section('content_body')

    <div class="card card-info">
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('conductores.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="card-body">                

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Voluntarios:</label>
                    <div class="col-sm-10">
                        <select name="voluntario_id" id="voluntario_id" class="form-control" id="inputEmail3" required>
                            <option>Seleccionar...</option>
                            @foreach ($voluntarios as $voluntario)
                                <option value="{{ $voluntario->id_voluntario }}">
                                    {{ $voluntario->nombres ?? 'N/A' }} {{ $voluntario->apellido_paterno ?? 'N/A' }}
                                    {{ $voluntario->apellido_materno ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Licencia:</label>
                    <div class="col-sm-10">
                        <select name="licencia_id" class="form-control" id="inputEmail3" required>
                            <option>Seleccionar...</option>
                            @foreach ($licencias as $licencia)
                                <option value="{{ $licencia->id_conductor_licencia }}">
                                    {{ $licencia->licencia ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Es TEM:</label>
                    <div class="col-sm-10">
                        <select name="es_tem" class="form-control" required>
                            <option value="0">No</option>
                            <option value="1">Sí</option>
                        </select>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar</button>
                <a href="{{ route('conductores.index') }}" class="btn btn-secondary float-right"><i
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
            $('#voluntario_id').select2({
                placeholder: 'Seleccionar...',
                language: "es",

            });
        });
    </script>
@endpush
