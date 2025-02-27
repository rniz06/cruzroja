<div class="card">
    <div class="card-header">
        <h3 class="card-title mr-2">Listado de Guardias
            @can('Guardias Crear')
                <a href="{{ route('guardias.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Registrar
                    Guardia</a>
            @endcan
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px"></th>
                    <th>Nombre Completo: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="nombre_completo"></th>
                    <th>Cédula: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="cedula"></th>
                    <th>Edad: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="edad"></th>
                    <th>Licencia: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="licencia"></th>
                    <th>Estado: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="conductor_estado"></th>
                    <th></th>
                </tr>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre Completo:</th>
                    <th>Cédula:</th>
                    <th>Edad:</th>
                    <th>Licencia:</th>
                    <th>Estado:</th>
                    <th style="width: 40px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($guardias as $guardia)
                    {{-- <tr>
                        <td>{{ $conductor->id_conductor ?? null }}</td>
                        <td>{{ $conductor->nombres ?? '' }} {{ $conductor->apellido_paterno ?? '' }}
                            {{ $conductor->apellido_materno ?? '' }}</td>
                        <td>{{ $conductor->cedula ?? 'N/A' }}</td>
                        <td>{{ $conductor->edad ?? 'N/A' }}</td>
                        <td>{{ $conductor->licencia ?? 'N/A' }}</td>
                        <td>{{ $conductor->conductor_estado ?? 'N/A' }}</td>
                        <td>
                            <x-dropdown>
                                @if (auth()->user()->can('Conductores Editar'))
                                    <x-slot
                                        name="edit">{{ route('conductores.edit', $conductor->id_conductor) }}</x-slot>
                                @endif

                                @if (auth()->user()->can('Conductores Eliminar'))
                                    <x-slot
                                        name="action">{{ route('conductores.destroy', $conductor->id_conductor) }}</x-slot>
                                @endif
                            </x-dropdown>
                        </td>
                    </tr> --}}
                @empty
                    <tr>
                        <td colspan="7" class="text-center font-italic">Sin Registros coincidentes...</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix col-12">
        <center><select class="col-1 form-control form-contro-sm" wire:model.live="paginado">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
            </select></center>
        {{ $guardias->links() }}
    </div>
</div>
