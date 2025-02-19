<div class="card">
    <div class="card-header">
        <h3 class="card-title">Listado de Voluntarios <a href="{{ route('voluntarios.create') }}"
                class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Añadir</a></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px"></th>
                    <th>Nombre Completo: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="nombres"></th>
                    <th>Cédula: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="cedula"></th>
                    <th>Fecha Nacimieto: <br> <input class="form-control form-control-sm" type="date" placeholder=""
                            wire:model.live="fecha_nacimiento"></th>
                    <th>Edad: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="edad"></th>
                    <th>Lugar Nacimiento: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="lugar_nacimiento"></th>
                    <th>Nacionalidad: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="nacionalidad"></th>
                    <th>Sexo: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="sexo"></th>
                    <th>Est. Civil: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="estado_civil"></th>
                    <th>G. Sanguineo: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="grupo_sanguineo"></th>
                    <th>Estado: <br> <input class="form-control form-control-sm" type="text" placeholder=""
                            wire:model.live="voluntario_estado"></th>
                    <th></th>
                </tr>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre Completo:</th>
                    <th>Cédula:</th>
                    <th>Fecha Nacimieto:</th>
                    <th>Edad:</th>
                    <th>Lugar Nacimiento:</th>
                    <th>Nacionalidad:</th>
                    <th>Sexo:</th>
                    <th>Est. Civil:</th>
                    <th>G. Sanguineo:</th>
                    <th>Estado:</th>                    
                    <th style="width: 40px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($voluntarios as $voluntario)
                    <tr>
                        <td>{{ $voluntario->id_usuario ?? null }}</td>
                        <td>{{ $voluntario->nombres ?? 'N/A' }} {{ $voluntario->apellido_paterno ?? 'N/A' }} {{ $voluntario->apellido_materno ?? 'N/A' }}</td>
                        <td>{{ $voluntario->cedula ?? 'N/A' }}</td>
                        <td> {{ date('d/m/Y', strtotime($voluntario->fecha_nacimiento ?? 'N/A')) }} </td>
                        <td>{{ $voluntario->edad ?? 'N/A' }}</td>
                        <td>{{ $voluntario->lugar_nacimiento ?? 'N/A' }}</td>
                        <td>{{ $voluntario->nacionalidad ?? 'N/A' }}</td>
                        <td>{{ $voluntario->sexo ?? 'N/A' }}</td>
                        <td>{{ $voluntario->estado_civil ?? 'N/A' }}</td>
                        <td>{{ $voluntario->grupo_sanguineo ?? 'N/A' }}</td>
                        <td>{{ $voluntario->voluntario_estado ?? 'N/A' }}</td>
                        <td>
                            <x-dropdown>
                                @if (auth()->user()->can('Voluntarios Editar'))
                                    <x-slot name="edit">{{ route('voluntarios.edit', $voluntario->id_voluntario) }}</x-slot>
                                @endif

                                @if (auth()->user()->can('Voluntarios Eliminar'))
                                    <x-slot
                                        name="action">{{ route('voluntarios.destroy', $voluntario->id_voluntario) }}</x-slot>
                                @endif
                            </x-dropdown>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center font-italic">Sin Registros coincidentes...</td>
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
        {{ $voluntarios->links() }}
    </div>
</div>
