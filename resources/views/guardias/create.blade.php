@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Guardias')
@section('content_header_title', 'Guardias')
@section('content_header_subtitle', 'Registrar')

{{-- Content body: main page content --}}

@section('content_body')

    <div class="card card-info">
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('guardias.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="card-body">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha y Hora:</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" name="fecha_hora" class="form-control" value="{{ old('fecha_hora') }}"
                            required>
                        @error('destino')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Grupo:</label>
                    <div class="col-sm-10">
                        <input type="text" name="grupo" class="form-control" value="{{ old('grupo') }}" required
                            maxlength="30">
                        @error('destino')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Servicio:</label>
                    <div class="col-sm-10">
                        <select name="servicio_id" class="form-control" required>
                            <option>Seleccionar...</option>
                            @foreach ($servicios as $servicio)
                                <option value="{{ $servicio->id_servicio }}">
                                    {{ $servicio->servicio ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                        @error('servicio_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Móvil:</label>
                    <div class="col-sm-10">
                        <select name="movil_id" id="movil_id" class="form-control" required>
                            <option value="">Seleccionar...</option>
                            @foreach ($moviles as $movil)
                                <option value="{{ $movil->id_movil }}" data-km="{{ $movil->km_actual }}">
                                    {{ $movil->movil_tipo ?? 'N/A' }} - {{ $movil->nro_chapa ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                        @error('movil_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">A Cargo:</label>
                    <div class="col-sm-10">
                        <select name="acargo_id" id="acargo_id" class="form-control" required>
                            <option>Seleccionar...</option>
                            @foreach ($voluntarios as $voluntario)
                                <option value="{{ $voluntario->id_voluntario }}">
                                    {{ $voluntario->nombre_completo ?? 'N/A' }} {{ '-' }}
                                    {{ $voluntario->cedula ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                        @error('acargo_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Quien realizo la revisión:</label>
                    <div class="col-sm-10">
                        <select name="vol_rea_rev_id" id="vol_rea_rev_id" class="form-control" required>
                            <option>Seleccionar...</option>
                            @foreach ($voluntarios as $voluntario)
                                <option value="{{ $voluntario->id_voluntario }}">
                                    {{ $voluntario->nombre_completo ?? 'N/A' }} {{ '-' }}
                                    {{ $voluntario->cedula ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                        @error('vol_rea_rev_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Km Inicial:</label>
                    <div class="col-sm-10">
                        <input type="number" name="km_inicial" class="form-control" id="km_inicial"
                            placeholder="km inicial..." style="pointer-events: none; background-color: #e9ecef;" required>
                        @error('km_inicial')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Km Final:</label>
                    <div class="col-sm-10">
                        <input type="number" name="km_final" class="form-control" value="{{ old('km_final') }}" required
                            maxlength="7">
                        @error('km_final')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Carga Combustible:</label>
                    <div class="col-sm-10">
                        <select name="carga_combustible" id="carga_combustible" class="form-control">
                            <option value="0" selected>No</option>
                            <option value="1">Si</option>
                        </select>
                        @error('carga_combustible')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Monto:</label>
                    <div class="col-sm-10">
                        <input type="number" name="monto" class="form-control" value="{{ old('monto') }}"
                            maxlength="15">
                        @error('monto')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Observaciones:</label>
                    <div class="col-sm-10">
                        <textarea name="observaciones" class="form-control" cols="3" rows="3">Sin Observaciones...{{ old('observaciones') }}</textarea>
                        @error('observaciones')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>
                <h4>Verificación de Ítems</h4>

                <div class="row">
                    @foreach ($items as $item)
                        <div class="col-3 form-group">
                            <label for="item_{{ $item->id_guardia_item }}" class="col-form-label">{{ $item->item ?? 'N/A' }}</label>
                            <select name="items[{{ $item->id_guardia_item }}]" id="item_{{ $item->id_guardia_item }}" class="form-control">
                                <option value="Si" selected>Si</option>
                                <option value="No">No</option>
                                <option value="Bajo">Bajo</option>
                                <option value="Normal">Normal</option>
                                <option value="Falta">Falta</option>
                                <option value="Dañado">Dañado</option>
                                <option value="En Llanta">En Llanta</option>
                            </select>
                        </div>
                    @endforeach
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar</button>
                <a href="{{ route('guardias.index') }}" class="btn btn-secondary float-right"><i
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
            $('#acargo_id').select2({
                placeholder: 'Seleccionar...',
                language: "es",

            });
        });

        $(document).ready(function() {
            $('#movil_id').select2({
                placeholder: 'Seleccionar...',
                language: "es"
            });

            $('#movil_id').on('change', function() {
                let kmActual = $(this).find(':selected').data('km');
                $('#km_inicial').val(kmActual);
            });
        });

        $(document).ready(function() {
            $('#vol_rea_rev_id').select2({
                placeholder: 'Seleccionar...',
                language: "es",

            });
        });
    </script>
@endpush
