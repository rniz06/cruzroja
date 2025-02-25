@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Movimientos Detalles')
@section('content_header_title', 'Movimientos')
@section('content_header_subtitle', 'Detalles')

{{-- Content body: main page content --}}

@section('content_body')
    {{-- Mostrar un alert en caso de haber algun mensaje --}}
    @if ($message = Session::get('success'))
        <div class="callout callout-success">
            <h5><i class="fas fa-check-circle mr-2" style="color: #28a745"></i>{{ $message }}</h5>
        </div>
    @endif
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detalles</h3>
                <div class="card-tools">
                    <a href="{{ route('movimientos.index') }}" class="btn btn-sm btn-secondary"><i
                            class="fas fa-arrow-left"></i>
                        Volver</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Km Recorrido:</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{ $movimiento->km_recorridos ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Can. Tripulantes</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{ $movimiento->can_tripulantes ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4>Datos del Conductor:</h4>
                                <div class="post">
                                    <dl class="row">
                                        <dt class="col-sm-4">Nombre Completo:</dt>
                                        <dd class="col-sm-8">{{ $movimiento->cond_nombre_completo ?? 'N/A' }}</dd>
                                        <dt class="col-sm-4">Cédula</dt>
                                        <dd class="col-sm-8">{{ number_format($movimiento->cond_cedula, 0, '', '.') }}</dd>
                                        <dt class="col-sm-4">Licencia:</dt>
                                        <dd class="col-sm-8">{{ $movimiento->cond_licencia ?? 'N/A' }}</dd>
                                        <dt class="col-sm-4">Edad:</dt>
                                        <dd class="col-sm-8">{{ $movimiento->cond_edad ?? 'N/A' }}
                                        </dd>
                                    </dl>
                                </div>

                                <h4>Datos del A cargo:</h4>
                                <div class="post">
                                    <dl class="row">
                                        <dt class="col-sm-4">Nombre Completo:</dt>
                                        <dd class="col-sm-8">{{ $movimiento->acargo_nombre_completo ?? 'N/A' }}</dd>
                                        <dt class="col-sm-4">Cédula</dt>
                                        <dd class="col-sm-8">
                                            {{ number_format($movimiento->acargo_cedula, 0, '', '.') ?? 'N/A' }}</dd>
                                        <dt class="col-sm-4">Edad:</dt>
                                        <dd class="col-sm-8">{{ $movimiento->acargo_edad ?? 'N/A' }}</dd>
                                        <dt class="col-sm-4">Sexo:</dt>
                                        <dd class="col-sm-8">{{ $movimiento->acargo_sexo ?? 'N/A' }}
                                        <dt class="col-sm-4">Grupo Sanguineo:</dt>
                                        <dd class="col-sm-8">{{ $movimiento->acargo_grupo_sanguineo ?? 'N/A' }}
                                        </dd>
                                    </dl>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-dark"><i class="fas fa-clipboard"></i> Detalles del Movimiento:</h3>
                        <dl class="row">
                            <dt class="col-sm-4">Móvil:</dt>
                            <dd class="col-sm-8">{{ $movimiento->movil_tipo ?? 'N/A' }}</dd>
                            <dt class="col-sm-4">Tipo Combustible:</dt>
                            <dd class="col-sm-8">{{ $movimiento->tipo_combustible ?? 'N/A' }}</dd>
                            <dt class="col-sm-4">Nro. Chapa:</dt>
                            <dd class="col-sm-8">{{ $movimiento->movil_nro_chapa ?? 'N/A' }}</dd>
                            <dt class="col-sm-4">Nro. Chasis:</dt>
                            <dd class="col-sm-8">{{ $movimiento->movil_nro_chasis ?? 'N/A' }}
                            <dt class="col-sm-4">Ciudad:</dt>
                            <dd class="col-sm-8">{{ $movimiento->ciudad ?? 'N/A' }}</dd>
                            <dt class="col-sm-4">Servicio:</dt>
                            <dd class="col-sm-8">{{ $movimiento->servicio ?? 'N/A' }}</dd>
                        </dl>

                        <h4>Observación:</h4>
                        <dl class="row">
                            <dd class="col-sm-8">{{ $movimiento->observaciones ?? 'Sin Observaciones...' }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@stop


{{-- Push extra CSS --}}

@push('css')
@endpush

{{-- Push extra scripts --}}

@push('js')
@endpush
