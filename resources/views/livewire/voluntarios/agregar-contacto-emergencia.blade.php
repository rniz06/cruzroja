{{-- Modal Agregar Contacto --}}
<div class="modal fade" id="formcontactoemergencia" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar Contacto de Emergencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit="save">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre Completo:</label>
                        <input type="text" class="form-control" placeholder="Nombre Completo..."
                            wire:model="nombre_completo" required maxlength="50">
                        @error('nombre_completo')
                            <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Parentesco:</label>
                        <select class="form-control" wire:model="parentesco_id">
                            <option>Seleccionar...</option>
                            @foreach ($parentescos as $parentesco)
                                <option value="{{ $parentesco->id_voluntario_parentesco }}">
                                    {{ $parentesco->parentesco ?? 'N/A' }}</option>
                            @endforeach
                        </select>
                        @error('parentesco_id')
                            <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Teléfono:</label>
                        <input type="text" class="form-control" placeholder="Teléfono..." wire:model="telefono"
                            required maxlength="15">
                        @error('telefono')
                            <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i
                                class="fas fa-arrow-left"></i>
                            Cerrar</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>
                            Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
