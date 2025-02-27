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
                    <th>Fecha Hora: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="fecha_hora"></th>
                    <th>Grupo: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="grupo"></th>
                    <th>Servicio: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="servicio"></th>
                    <th>Móvil: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="movil"></th>
                    <th>A cargo: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="acargo"></th>
                    <th>Revisión: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="revision"></th>
                    <th>Km Inicial: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="km_inicial"></th>
                    <th>Km Final: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="km_final"></th>
                    <th>Carga Combustible: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="carga_combustible"></th>
                    <th></th>
                </tr>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Fecha Hora:</th>
                    <th>Grupo:</th>
                    <th>Servicio:</th>
                    <th>Móvil:</th>
                    <th>A cargo:</th>
                    <th>Revisión:</th>
                    <th>Km Inicial:</th>
                    <th>Km Final:</th>
                    <th>Carga Combustible:</th>
                    <th style="width: 40px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($guardias as $guardia)
                    <tr>
                        <td>#</td>
                        <td> {{ date('d-m-Y h:m', strtotime($guardia->fecha_hora))}} Hs.</td>
                        <td>{{ $guardia->grupo ?? 'N/A' }}</td>
                        <td>{{ $guardia->servicio ?? '' }}</td>
                        <td>{{ $guardia->movil_tipo ?? '' }} {{ '-' }}  {{ $guardia->nro_chapa ?? '' }}</td>
                        <td>{{ $guardia->acargo_cedula ?? 'N/A' }}</td>
                        <td>{{ $guardia->vol_rea_rev_cedula ?? 'N/A' }}</td>
                        <td>{{ $guardia->km_inicial ?? 'N/A' }}</td>
                        <td>{{ $guardia->km_final ?? 'N/A' }}</td>
                        <td>{{ $guardia->carga_combustible ? 'Sí' : 'No' }}</td>
                        <td>
                            <x-dropdown>
                                @if (auth()->user()->can('Guardias Ver'))
                                    <x-slot
                                        name="show">{{ route('guardias.show', $guardia->id_guardia) }}</x-slot>
                                @endif

                                @if (auth()->user()->can('Guardias Editar'))
                                    <x-slot
                                        name="edit">{{ route('guardias.edit', $guardia->id_guardia) }}</x-slot>
                                @endif

                                @if (auth()->user()->can('Guardias Eliminar'))
                                    <x-slot
                                        name="action">{{ route('guardias.destroy', $guardia->id_guardia) }}</x-slot>
                                @endif
                            </x-dropdown>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-center font-italic">Sin Registros coincidentes...</td>
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
