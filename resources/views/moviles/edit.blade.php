@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Móviles')
@section('content_header_title', 'Móviles')
@section('content_header_subtitle', 'Móvil Editar')

{{-- Content body: main page content --}}

@section('content_body')

    <div class="card card-info">
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('moviles.update', $movil->id_movil) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Combustible:</label>
                    <div class="col-sm-10">
                        <select name="combustible_id" class="form-control" required>
                            <option>Seleccionar...</option>
                            @foreach ($combustibles as $combustible)
                                <option value="{{ $combustible->id_movil_combustible }}" @if ($movil->combustible_id == $combustible->id_movil_combustible) selected @endif>
                                    {{ $combustible->tipo_combustible ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                        @error('combustible_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tipo de Móvil:</label>
                    <div class="col-sm-10">
                        <select name="tipo_id" class="form-control" required>
                            <option>Seleccionar...</option>
                            @foreach ($tipos as $tipo)
                                <option value="{{ $tipo->id_movil_tipo }}" @if ($movil->tipo_id == $tipo->id_movil_tipo) selected @endif>
                                    {{ $tipo->movil_tipo ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                        @error('tipo_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Chapa:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nro_chapa" placeholder="Chapa..." minlength="3" maxlength="7" required 
                        value="{{ old('nro_chapa', $movil->nro_chapa) }}">
                        @error('nro_chapa')
                            <span class="text-danger">{{ $message }}</span>                            
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Chasis:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nro_chasis" placeholder="Chasis..." minlength="3" maxlength="30" required 
                        value="{{ old('nro_chasis', $movil->nro_chasis) }}">
                        @error('nro_chasis')
                            <span class="text-danger">{{ $message }}</span>                            
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kilometraje actual:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="km_actual" placeholder="Kilometraje actual..." maxlength="10" required 
                        value="{{ old('km_actual', $movil->km_actual) }}">
                        @error('km_actual')
                            <span class="text-danger">{{ $message }}</span>                            
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Estado:</label>
                    <div class="col-sm-10">
                        <select name="estado_id" class="form-control" required>
                            <option>Seleccionar...</option>
                            @foreach ($estados as $estado)
                                <option value="{{ $estado->id_movil_estado }}" @if ($movil->estado_id == $estado->id_movil_estado) selected @endif>
                                    {{ $estado->movil_estado ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                        @error('estado_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Actualizar</button>
                <a href="{{ route('moviles.index') }}" class="btn btn-secondary float-right"><i
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

@endpush

{{-- Push extra scripts --}}

@push('js')

@endpush
