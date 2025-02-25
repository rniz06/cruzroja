<div class="card">
    <div class="card-header">
        <h3 class="card-title mr-2">Listado de Movimientos
            @can('Moviles Crear')
                <a href="{{ route('movimientos.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Registrar Movimiento</a>
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
                            wire:model.live="movil"></th>
                    <th>Conductor: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="conductor"></th>
                    <th>Ciudad:<br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="ciudad"></th>
                    <th>Servicio: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="servicio"></th>
                    <th>Sálida: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="salida"></th>
                    <th>A cargo: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="acargo"></th>
                    <th>Recorrido: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="recorrido"></th>
                    <th>Tripulantes: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="tripulantes"></th>
                    <th></th>
                </tr>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Movil:</th>
                    <th>Conductor:</th>
                    <th>Ciudad:</th>
                    <th>Servicio:</th>
                    <th>Sálida:</th>
                    <th>A cargo:</th>
                    <th>Recorrido:</th>
                    <th>Tripulantes:</th>
                    <th style="width: 40px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($movimientos as $movimiento)
                    <tr>
                        <td>{{ $moviemiento->id_movimiento ?? '' }}</td>
                        <td>{{ $movimiento->movil_tipo ?? 'N/A' }} {{ '-' }} {{ $movimiento->movil_nro_chapa ?? 'N/A' }}</td>
                        <td>{{ $movimiento->cond_cedula ?? 'N/A' }}</td>
                        <td>{{ $movimiento->ciudad ?? 'N/A' }}</td>
                        <td>{{ $movimiento->servicio ?? 'N/A' }}</td>
                        <td>{{ date('d/m/Y h:m', strtotime($movimiento->fecha_hora_salida)) }} Hs</td>
                        <td>{{ $movimiento->acargo_cedula ?? 'N/A' }}</td>
                        <td>{{ $movimiento->km_recorridos ?? 'N/A' }} Km</td>
                        <td>{{ $movimiento->can_tripulantes ?? 'N/A' }}</td>
                        <td>
                            <x-dropdown>
                                @if (auth()->user()->can('Movimientos Ver'))
                                    <x-slot name="show">{{ route('movimientos.show', $movimiento->id_movimiento) }}</x-slot>
                                @endif

                                @if (auth()->user()->can('Movimientos Editar'))
                                    <x-slot name="edit">{{ route('movimientos.edit', $movimiento->id_movimiento) }}</x-slot>
                                @endif

                                @if (auth()->user()->can('Movimientos Eliminar'))
                                    <x-slot name="action">{{ route('movimientos.destroy', $movimiento->id_movimiento) }}</x-slot>
                                @endif
                            </x-dropdown>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center font-italic">Sin Registros coincidentes...</td>
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
        {{ $movimientos->links() }}
    </div>
</div>
