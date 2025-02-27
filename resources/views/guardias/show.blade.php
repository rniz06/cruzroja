@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Guardia Detalles')
@section('content_header_title', 'Guardia')
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
            <div class="card-header">Detalles de la guardia</h3>

                <div class="card-tools">
                    @can('Guardias Listar')
                        <a href="{{ route('guardias.edit', $guardia->id_guardia) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>
                            Actualizar</a>
                    @endcan
                    @can('Guardias Listar')
                        <a href="{{ route('guardias.index') }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i>
                            Volver</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Sección de Items -->
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row g-3"> <!-- Añadir un row para manejar las columnas internas -->
                            @foreach ($items as $item)
                                <div class="col-6 col-md-4 col-lg-3">
                                    <label class="fw-bold">{{ $item->item }}</label>
                                    <div class="form-control bg-light">{{ $item->verificacion }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Sección de Detalles -->
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h3 class="text-dark mb-3">
                                    <i class="fas fa-clipboard-list"></i> Detalles
                                </h3>
                                <p class="text-muted"><strong>Observación:</strong>
                                    {{ $guardia->observaciones ?? 'Sin observaciones...' }}</p>

                                <div class="text-muted">
                                    <p class="text-sm"><strong>Fecha Hora:</strong>
                                        <b class="d-block">{{ date('d-m-Y h:m', strtotime($guardia->fecha_hora)) }} Hs.</b>
                                    </p>
                                    <p class="text-sm"><strong>Grupo:</strong>
                                        <b class="d-block">{{ $guardia->grupo ?? 'N/A' }}</b>
                                    </p>
                                    <p class="text-sm"><strong>Servicio:</strong>
                                        <b class="d-block">{{ $guardia->servicio ?? 'N/A' }}</b>
                                    </p>
                                    <p class="text-sm"><strong>Móvil:</strong>
                                        <b class="d-block">{{ $guardia->movil_tipo ?? 'N/A' }} -
                                            {{ $guardia->nro_chapa ?? 'N/A' }}</b>
                                    </p>
                                    <p class="text-sm"><strong>A cargo:</strong>
                                        <b class="d-block">{{ $guardia->acargo_nombre_completo ?? 'N/A' }} -
                                            {{ $guardia->acargo_cedula ?? 'N/A' }}</b>
                                    </p>
                                    <p class="text-sm"><strong>Revisión:</strong>
                                        <b class="d-block">{{ $guardia->vol_rea_rev_nombre_completo ?? 'N/A' }} -
                                            {{ $guardia->vol_rea_rev_cedula ?? 'N/A' }}</b>
                                    </p>
                                    <p class="text-sm"><strong>Km Inicial:</strong>
                                        <b class="d-block">{{ $guardia->km_inicial ?? 'N/A' }}</b>
                                    </p>
                                    <p class="text-sm"><strong>Km Final:</strong>
                                        <b class="d-block">{{ $guardia->km_final ?? 'N/A' }}</b>
                                    </p>
                                    <p class="text-sm"><strong>Carga Combustible:</strong>
                                        <b class="d-block">{{ $guardia->carga_combustible ? 'Sí' : 'No' }}</b>
                                    </p>
                                    @if ($guardia->carga_combustible)
                                        <p class="text-sm"><strong>Monto:</strong>
                                            <b class="d-block">{{ $guardia->monto ?? 'N/A' }}</b>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
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
