@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Móviles')
@section('content_header_title', 'Móviles')
@section('content_header_subtitle', 'Detalles')

{{-- Content body: main page content --}}

@section('content_body')

    {{-- Mostrar un alert en caso de haber algun mensaje --}}
    @if ($message = Session::get('success'))
        <div class="callout callout-success">
            <h5><i class="fas fa-check-circle mr-2" style="color: #28a745"></i>{{ $message }}</h5>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles del Móvil</h3>
            <div class="card-tools">
                <a href="{{ route('moviles.index') }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i>
                    Volver</a>
                @can('Moviles Observaciones')
                    <!-- Button Modal Agregar Observaciones -->
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#formModalObservacion">
                        <i class="fas fa-plus"></i> Observación
                    </button>                    
                @endcan
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    
                    <div class="row">
                        <div class="col-12">
                            <h4>Observaciones:</h4>
                            @foreach ($observaciones as $observacion)
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="{{ asset('img/cruz-roja-logo.webp') }}"
                                        alt="Cruz Roja image">
                                    <span class="username">
                                        <a class="text-dark">{{ $observacion->usuario_nombre ?? 'N/A' }}</a>
                                    </span>
                                    <span class="description">{{ date('d-m-Y h:m', strtotime($observacion->created_at)) }} Hs.</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    {{ $observacion->observacion ?? 'N/A' }}
                                </p>
                                {{-- <p>
                                    <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File
                                        1 v2</a>
                                </p> --}}
                            </div>
                            @endforeach                            
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-dark"><i class="fas fa-car-side"></i> Móvil</h3>
                    <br>
                    <div class="text-muted">
                        <p class="text-sm">Móvil:
                            <b class="d-block">{{ $movil->movil_tipo ?? 'N/A' }}</b>
                        </p>
                        <p class="text-sm">Chapa:
                            <b class="d-block">{{ $movil->nro_chapa ?? 'N/A' }}</b>
                        </p>
                        <p class="text-sm">Chasis:
                            <b class="d-block">{{ $movil->nro_chasis ?? 'N/A' }}</b>
                        </p>
                        <p class="text-sm">Combustrible:
                            <b class="d-block">{{ $movil->tipo_combustible ?? 'N/A' }}</b>
                        </p>
                        <p class="text-sm">Kilometraje actual:
                            <b class="d-block">{{ $movil->km_actual ?? 'N/A' }}</b>
                        </p>
                        <p class="text-sm">Estado:
                            <b class="d-block">{{ $movil->movil_estado ?? 'N/A' }}</b>
                        </p>
                    </div>
                    {{-- <div class="text-center mt-5 mb-3">
                        <a href="#" class="btn btn-sm btn-primary">Add files</a>
                        <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        @livewire('moviles.form-obsevacion', ['movil_id' => $movil->id_movil])

    </div>
@stop


{{-- Push extra CSS --}}

@push('css')
@endpush

{{-- Push extra scripts --}}

@push('js')
@endpush
