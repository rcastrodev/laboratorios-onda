<div class="modal fade" id="modal-update-element">
    <form action="{{ route('client.content.generic-section.update') }}" method="post" id="form-update-slider" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Slider</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id">
                <div class="form-group">
                    <input type="text" name="order" class="form-control" placeholder="Ingrese el orden AA BB CC">
                </div>
                <div class="form-group">
                    <input type="text" name="content_1" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Imagen <small>la imagen debe ser al menos 185x85px</small></label>
                    <input type="file" name="image" class="form-control-file">
                </div>    
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </form>
    <!-- /.modal-dialog -->
</div>