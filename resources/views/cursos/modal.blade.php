<div class="modal fade" id="modalCurso" tabindex="-1" aria-labelledby="modalCursoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formCurso">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tituloModal">Nuevo Curso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id">
                    <div class="mb-3">
                        <label for="nombre_curso" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre_curso" name="nombre_curso" placeholder="Matemática" maxlength="50" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea type="text" class="form-control" id="descripcion" name="descripcion" row="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="creditos" class="form-label">Créditos</label>
                        <input type="number" class="form-control" id="creditos" name="creditos" min="1" max="6" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar <i class="fa-solid fa-floppy-disk"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>