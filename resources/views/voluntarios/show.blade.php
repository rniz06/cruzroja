@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Voluntario')
@section('content_header_title', 'Voluntario')
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
            <h3 class="card-title">Detalles del Voluntario</h3>
            <div class="card-tools">
                <a href="{{ route('voluntarios.index') }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i>
                    Volver</a>
                {{-- @can('Voluntarios Agregar Contacto')
                    <!-- Button Modal Contacto -->
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fas fa-plus"></i> Contacto
                    </button>
                @endcan --}}
                @can('Voluntarios Agregar Contacto Emergencia')
                    <!-- Button Modal Contacto Emergencia -->
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#formcontactoemergencia">
                        <i class="fas fa-plus"></i> Emergencia
                    </button>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">

                    <div class="row">
                        <div class="col-6">
                            <label for="">Nombre Completo:</label>
                            <p class="form-control">{{ $voluntario->nombres ?? 'N/A' }}
                                {{ $voluntario->apellido_paterno ?? '' }} {{ $voluntario->apellido_materno ?? '' }}</p>
                        </div>

                        <div class="col-6">
                            <label for="">Cédula:</label>
                            <p class="form-control">{{ $voluntario->cedula ?? 'N/A' }}</p>
                        </div>

                        <div class="col-6">
                            <label for="">Fecha de Nacimiento:</label>
                            <p class="form-control">{{ date('d/m/Y', strtotime($voluntario->fecha_nacimiento)) }}</p>
                        </div>

                        <div class="col-6">
                            <label for="">Edad:</label>
                            <p class="form-control">{{ $voluntario->edad ?? 'N/A' }}</p>
                        </div>

                        <div class="col-6">
                            <label for="">Lugar de Nacimiento:</label>
                            <p class="form-control">{{ $voluntario->lugar_nacimiento ?? 'N/A' }}</p>
                        </div>

                        <div class="col-6">
                            <label for="">Nacionalidad:</label>
                            <p class="form-control">{{ $voluntario->nacionalidad ?? 'N/A' }}</p>
                        </div>

                        <div class="col-6">
                            <label for="">Sexo:</label>
                            <p class="form-control">{{ $voluntario->sexo ?? 'N/A' }}</p>
                        </div>

                        <div class="col-6">
                            <label for="">Estado Civil:</label>
                            <p class="form-control">{{ $voluntario->estado_civil ?? 'N/A' }}</p>
                        </div>

                        <div class="col-6">
                            <label for="">Grupo Sanguineo:</label>
                            <p class="form-control">{{ $voluntario->grupo_sanguineo ?? 'N/A' }}</p>
                        </div>

                        <div class="col-6">
                            <label for="">Grado de Estudio:</label>
                            <p class="form-control">{{ $voluntario->grado_estudio ?? 'N/A' }}</p>
                        </div>

                        <div class="col-6">
                            <label for="">Profesión:</label>
                            <p class="form-control">{{ $voluntario->profesion ?? 'N/A' }}</p>
                        </div>

                        <div class="col-6">
                            <label for="">Estado:</label>
                            <p class="form-control">{{ $voluntario->voluntario_estado ?? 'N/A' }}</p>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h4 class="text-secondary"><i class="fas fa-address-book"></i> Contacto:</h4>
                    <ul class="list-unstyled">
                        <li>
                            <p class="btn-link text-secondary">Dirección : {{ $contacto->direccion ?? 'N/A' }}</p>
                            <p class="btn-link text-secondary">Departamento : {{ $contacto->departamento ?? 'N/A' }}</p>
                            <p class="btn-link text-secondary">Ciudad : {{ $contacto->ciudad ?? 'N/A' }}</p>
                            <p class="btn-link text-secondary">Correo : {{ $contacto->correo_electronico ?? 'N/A' }}</p>
                            <p class="btn-link text-secondary">Tel. Particular : {{ $contacto->tel_particular ?? 'N/A' }}</p>
                            <p class="btn-link text-secondary">Tel. Trábajo : {{ $contacto->tel_trabajo ?? 'N/A' }}</p>
                            <p class="btn-link text-secondary">Celular : {{ $contacto->celular ?? 'N/A' }}</p>
                        </li>
                    </ul>

                    <h4 class="text-secondary"><i class="fas fa-address-book"></i> Contactos de Emergencia:</h4>
                    <ul class="list-unstyled">
                        <li>
                            @forelse ($contactos_emergencias as $contacto_emergencia)
                                <p class="btn-link text-secondary">{{ $contacto_emergencia->parentesco ?? 'N/A' }} : {{ $contacto_emergencia->nombre_completo ?? 'N/A' }} - {{ $contacto_emergencia->telefono ?? 'N/A' }}
                                </p>
                            @empty
                                <p class="btn-link text-secondary">Sin datos...</p>
                            @endforelse
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <!-- Modal add contacto emergencia -->
        @livewire('voluntarios.agregar-contacto-emergencia', ['voluntario_id' => $voluntario->id_voluntario])

    </div>
@stop

{{-- Push extra CSS --}}

@push('css')
    
@endpush

{{-- Push extra scripts --}}

@push('js')
    
@endpush
