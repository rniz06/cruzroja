<div class="card">
    <div class="card-header">
        <h3 class="card-title mr-2">Listado de Moviles
            @can('Moviles Crear')
                <a href="{{ route('moviles.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Añadir
                    Móvil</a>
            @endcan
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px"></th>
                    <th>Movil: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="movil_tipo"></th>
                    <th>Chapa: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="nro_chapa"></th>
                    <th>Chasis:<br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="nro_chasis"></th>
                    <th>Km Actual: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="km_actual"></th>
                    <th>Combustible: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="tipo_combustible"></th>
                    <th>Estado: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="movil_estado"></th>
                    <th></th>
                </tr>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Movil:</th>
                    <th>Chapa:</th>
                    <th>Chasis:</th>
                    <th>Km Actual:</th>
                    <th>Combustible:</th>
                    <th>Estado:</th>
                    <th style="width: 40px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($moviles as $movil)
                    <tr>
                        <td>{{ $movil->id_movil ?? null }}</td>
                        <td>{{ $movil->movil_tipo ?? 'N/A' }}</td>
                        <td>{{ $movil->nro_chapa ?? 'N/A' }}</td>
                        <td>{{ $movil->nro_chasis ?? 'N/A' }}</td>
                        <td>{{ $movil->km_actual ?? 'N/A' }}</td>
                        <td>{{ $movil->tipo_combustible ?? 'N/A' }}</td>
                        <td>{{ $movil->movil_estado ?? 'N/A' }}</td>
                        <td>
                            <x-dropdown>
                                @if (auth()->user()->can('Moviles Ver'))
                                    <x-slot name="show">{{ route('moviles.show', $movil->id_movil) }}</x-slot>
                                @endif

                                @if (auth()->user()->can('Moviles Editar'))
                                    <x-slot name="edit">{{ route('moviles.edit', $movil->id_movil) }}</x-slot>
                                @endif

                                @if (auth()->user()->can('Moviles Eliminar'))
                                    <x-slot name="action">{{ route('moviles.destroy', $movil->id_movil) }}</x-slot>
                                @endif
                            </x-dropdown>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center font-italic">Sin Registros coincidentes...</td>
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
        {{ $moviles->links() }}
    </div>
</div>
