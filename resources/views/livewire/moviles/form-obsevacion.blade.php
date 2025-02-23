{{-- Modal Agregar Contacto --}}
<div class="modal fade" id="formModalObservacion" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar Observación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit="save">
                    <div class="form-group
                        @error('observacion') is-invalid @enderror">
                        <label for="observacion">Observación</label>
                        <textarea wire:model="observacion" class="form-control" id="observacion" rows="3" required
                            placeholder="Ingrese la observación"></textarea>
                        @error('observacion')
                            <div class="invalid-feedback">{{ $message }}</div>
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
