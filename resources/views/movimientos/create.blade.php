@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Movimientos')
@section('content_header_title', 'Movimientos')
@section('content_header_subtitle', 'Registrar')

{{-- Content body: main page content --}}

@section('content_body')

    <div class="card card-info">
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('movimientos.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="card-body">                

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Conductor:</label>
                    <div class="col-sm-10">
                        <select name="conductor_id" id="conductor_id" class="form-control" required>
                            <option>Seleccionar...</option>
                            @foreach ($conductores as $conductor)
                                <option value="{{ $conductor->id_conductor }}">
                                    {{ $conductor->nombre_completo ?? 'N/A' }} {{ '-' }} {{ $conductor->cedula ?? 'N/A' }}                                    
                                </option>
                            @endforeach
                        </select>
                        @error('conductor_id')
                            <div class="text-danger">{{ $message }}</div>                            
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Móvil:</label>
                    <div class="col-sm-10">
                        <select name="movil_id" id="movil_id" class="form-control" required>
                            <option>Seleccionar...</option>
                            @foreach ($moviles as $movil)
                                <option value="{{ $movil->id_movil }}">
                                    {{ $movil->movil_tipo ?? 'N/A' }} {{ '-' }} {{ $movil->nro_chapa ?? 'N/A' }}                                    
                                </option>
                            @endforeach
                        </select>
                        @error('movil_id')
                            <div class="text-danger">{{ $message }}</div>                            
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Ciudad:</label>
                    <div class="col-sm-10">
                        <select name="ciudad_id" id="ciudad_id" class="form-control" required>
                            <option>Seleccionar...</option>
                            @foreach ($ciudades as $ciudad)
                                <option value="{{ $ciudad->id_ciudad }}">
                                    {{ $ciudad->ciudad ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                        @error('ciudad_id')
                            <div class="text-danger">{{ $message }}</div>                            
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Servicio:</label>
                    <div class="col-sm-10">
                        <select name="servicio_id" class="form-control" id="inputEmail3" required>
                            <option>Seleccionar...</option>
                            @foreach ($servicios as $servicio)
                                <option value="{{ $servicio->id_servicio }}">
                                    {{ $servicio->servicio ?? 'N/A' }}
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Destino:</label>
                    <div class="col-sm-10">
                        <input type="text" name="destino" class="form-control" id="inputEmail3" placeholder="Destino..." value="{{ old('destino') }}" required>
                        @error('destino')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha Hora Sálida:</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" name="fecha_hora_salida" class="form-control" id="inputEmail3" required>
                        @error('fecha_hora_salida')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Km Inicial:</label>
                    <div class="col-sm-10">
                        <input type="number" name="km_inicial" class="form-control" id="inputEmail3" value="{{ old('km_inicial') }}" placeholder="km inicial..." required>
                        @error('km_inicial')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">A cargo:</label>
                    <div class="col-sm-10">
                        <select name="a_cargo" class="form-control" id="acargo" required>
                            <option>Seleccionar...</option>
                            @foreach ($voluntarios as $voluntario)
                                <option value="{{ $voluntario->id_voluntario }}">
                                    {{ $voluntario->nombre_completo ?? 'N/A' }} {{ '-' }} {{ $voluntario->cedula ?? 'N/A' }}
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha Hora llegada:</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" name="fecha_hora_llegada" class="form-control" required>
                        @error('fecha_hora_llegada')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Km Final:</label>
                    <div class="col-sm-10">
                        <input type="number" name="km_final" class="form-control" id="inputEmail3" value="{{ old('km_final') }}" placeholder="km inicial..." required>
                        @error('km_final')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Cant. Tripulantes:</label>
                    <div class="col-sm-10">
                        <input type="number" name="can_tripulantes" class="form-control" value="{{ old('can_tripulantes') }}" placeholder="Cantidad..." required>
                        @error('can_tripulantes')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Observaciones:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="observaciones" rows="3" placeholder="Observaciones ...">{{ old('observaciones') }}</textarea>
                        @error('observaciones')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar</button>
                <a href="{{ route('movimientos.index') }}" class="btn btn-secondary float-right"><i
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
            $('#conductor_id').select2({
                placeholder: 'Seleccionar...',
                language: "es",

            });
        });

        $(document).ready(function() {
            $('#movil_id').select2({
                placeholder: 'Seleccionar...',
                language: "es",

            });
        });

        $(document).ready(function() {
            $('#ciudad_id').select2({
                placeholder: 'Seleccionar...',
                language: "es",

            });
        });

        $(document).ready(function() {
            $('#acargo').select2({
                placeholder: 'Seleccionar...',
                language: "es",

            });
        });
    </script>
@endpush
