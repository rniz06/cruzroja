@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Móviles')
@section('content_header_title', 'Móviles')
@section('content_header_subtitle', 'Registrar')

{{-- Content body: main page content --}}

@section('content_body')

    <div class="card card-info">
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('moviles.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="card-body">                

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Combustible:</label>
                    <div class="col-sm-10">
                        <select name="combustible_id" class="form-control" required>
                            <option>Seleccionar...</option>
                            @foreach ($combustibles as $combustible)
                                <option value="{{ $combustible->id_movil_combustible }}">
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
                                <option value="{{ $tipo->id_movil_tipo }}">
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
                        value="{{ old('nro_chapa') }}">
                        @error('nro_chapa')
                            <span class="text-danger">{{ $message }}</span>                            
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Chasis:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nro_chasis" placeholder="Chasis..." minlength="3" maxlength="30" required 
                        value="{{ old('nro_chasis') }}">
                        @error('nro_chasis')
                            <span class="text-danger">{{ $message }}</span>                            
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kilometraje actual:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="km_actual" placeholder="Kilometraje actual..." maxlength="10" required 
                        value="{{ old('km_actual') }}">
                        @error('km_actual')
                            <span class="text-danger">{{ $message }}</span>                            
                        @enderror
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar</button>
                <a href="{{ route('moviles.index') }}" class="btn btn-secondary float-right"><i
                        class="fas fa-arrow-left"></i>
                    Volver</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>

@stop

{{-- Push extra CSS --}}

@push('css')

@endpush

{{-- Push extra scripts --}}

@push('js')

@endpush
