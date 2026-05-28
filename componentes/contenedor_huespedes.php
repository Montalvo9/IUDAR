<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <!-- Barra Superior (Topbar) -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <?php include __DIR__ . '/info_usuario.php'; ?>
        </nav>

        <!-- Contenido de la pagina -->
        <div class="container-fluid">
            <div class="card-shadow mb-4">
                <!-- Cabecera con Botón de Ver Registros -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Registrar Asistentes</h6>
                    <a href="lista_asistentes" class="btn btn-sm btn-info shadow-sm">
                        <i class="fas fa-list fa-sm text-white-50"></i> Ver Registros
                    </a>
                </div>

                <!-- Formulario para llenar los datos de los asistentes o huespedes) -->
                <div class="card-body">
                    <form id="frmRegistrarAsistentes">
                        <form id="frmRegistrarPersona">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="small font-weight-bold">Nombre Completo *</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" maxlength="150" placeholder="Ej: Luis Alberto Lezama Montalvo" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="small font-weight-bold">Sexo *</label>
                                        <select class="form-control" name="sexo" id="sexo" required>
                                            <option value="">Seleccione...</option>
                                            <option value="Hombre">Hombre</option>
                                            <option value="Mujer">Mujer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="small font-weight-bold">Edad *</label>
                                        <input type="number" class="form-control" name="edad" id="edad" min="0" max="120" placeholder="Ej: 26" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="small font-weight-bold">Teléfono</label>
                                        <input type="tel" class="form-control" name="telefono" id="telefono" maxlength="20" placeholder="Ej: 2382052035">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="small font-weight-bold">Iglesia *</label>
                                        <select class="form-control" name="id_iglesia" id="id_iglesia" required>
                                            <option value="">Seleccione la iglesia...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label class="small font-weight-bold">Observaciones</label>
                                <textarea class="form-control" name="observaciones" id="observaciones" rows="3" placeholder="Detalles adicionales (Ej: Llega el viernes)"></textarea>
                            </div>

                            <hr>

                            <div class="text-right">
                                <button type="button" class="btn btn-danger shadow-sm" onclick="limpiarForm()">
                                    <i class="fas fa-eraser fa-sm text-white-50 mr-1"></i> Limpiar
                                </button>
                                <button type="button" class="btn btn-success shadow-sm" onclick="registrarAsistente()">
                                    <i class="fas fa-save fa-sm text-white-50 mr-1"></i> Guardar Registro
                                </button>
                            </div>
                        </form>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>