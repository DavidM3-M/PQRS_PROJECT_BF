<form action="/asignarSolicitud" method="GET">
    <div class="modal" tabindex="-1" id="modal-asignar">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="tituloModal"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <select class="form-control" name="areaSeleccionada" id="seleccionarArea" required>
                        <option value="" disabled selected>Seleccione área...</option>
                        <option value="Admisiones">Admisiones</option>
                        <option value="Recepción">Recepción</option>
                        <option value="Posgrados">Posgrados</option>
                        <option value="Registro y Control">Registro y Control</option>
                        <option value="Permanencia">Permanencia</option>
                        <option value="Egresados">Egresados</option>
                        <option value="FADESOP">FADESOP</option>
                        <option value="FAI">FAI</option>
                        <option value="TIME">TIME</option>
                        <option value="Mercadeo">Mercadeo</option>
                        <option value="Financiera">Financiera</option>
                        <option value="Secreataría General">Secreataría General</option>
                        <option value="TIME">TIME</option>
                        <option value="Consultorio Jurídico">Consultorio Jurídico</option>
                        <option value="Rectoría">Rectoría</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Asignar</button>

                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="radicadoModal" id="radicadoModal">
</form>
