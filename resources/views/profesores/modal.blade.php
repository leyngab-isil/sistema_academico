<div class="modal fade" id="modalProfesor" tabindex="-1" aria-labelledby="modalProfesorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formProfesor">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tituloModal">Nuevo Profesor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id">
                    <div class="mb-3">
                        <label for="nombres" class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Luis" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Torres" required>
                    </div>
                    <div class="mb-3">
                        <label for="especialidad" class="form-label">Especialidad</label>
                        <select class="form-select" id="especialidad" name="especialidad">
                            <option value="" selected disabled>Seleccione una especialidad</option>
                            <option value="Matemáticas">Matemáticas</option>
                            <option value="Comunicación">Comunicación</option>
                            <option value="Ciencias Naturales">Ciencias Naturales</option>
                            <option value="Física">Física</option>
                            <option value="Química">Química</option>
                            <option value="Biología">Biología</option>
                            <option value="Historia">Historia</option>
                            <option value="Geografía">Geografía</option>
                            <option value="Educación Cívica">Educación Cívica</option>
                            <option value="Inglés">Inglés</option>
                            <option value="Arte">Arte</option>
                            <option value="Música">Música</option>
                            <option value="Educación Física">Educación Física</option>
                            <option value="Informática">Informática</option>
                            <option value="Tecnología">Tecnología</option>
                            <option value="Religión">Religión</option>
                            <option value="Psicología">Psicología</option>
                            <option value="Tutoría">Tutoría</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="example@correo.com">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Celular</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="987654321">
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