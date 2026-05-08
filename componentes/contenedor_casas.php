<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">

        <!-- Barra Superior (Topbar) -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Barra de Búsqueda -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <?php include __DIR__ . '/info_usuario.php'; ?>


        </nav>

        <!-- Contenido de la Página -->
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <!-- Cabecera con Botón de Ver Registros -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Registrar Nueva Casa</h6>
                    <a href="lista_casas.php" class="btn btn-sm btn-info shadow-sm">
                        <i class="fas fa-list fa-sm text-white-50"></i> Ver Registros
                    </a>
                </div>

                <!-- Cuerpo del Formulario -->
                <div class="card-body">
                    <form id="frmRegistrarCasa">

                        <!-- Fila 1: Nombre y Propietario -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small font-weight-bold">Nombre de la Casa *</label>
                                    <input type="text" class="form-control" name="nombre_casa" id="nombre_casa" maxlength="100" placeholder="Ej: Casa Los Pinos" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small font-weight-bold">Propietario o Encargado *</label>
                                    <input type="text" class="form-control" name="propietario" id="propietario" maxlength="150" placeholder="Nombre completo" required>
                                </div>
                            </div>
                        </div>

                        <!-- Fila 2: Teléfono y Ubicación -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small font-weight-bold">Teléfono</label>
                                    <input type="tel" class="form-control" name="telefono" id="telefono" maxlength="20" placeholder="Ej: 222 123 4567">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="small font-weight-bold">Ubicación / Dirección</label>
                                    <input type="text" class="form-control" name="ubicacion" id="ubicacion" maxlength="255" placeholder="Dirección completa">
                                </div>
                            </div>
                        </div>

                        <!-- Fila 3: Capacidad, Colchonetas, Preferencia y Transporte -->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small font-weight-bold">Capacidad (Personas) *</label>
                                    <input type="number" class="form-control" name="capacidad" id="capacidad" min="1" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small font-weight-bold">Colchonetas Extras</label>
                                    <input type="number" class="form-control" name="colchonetas" id="colchonetas" min="0" value="0">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small font-weight-bold">Preferencia</label>
                                    <!-- Este select idealmente se llena desde la BD (tabla preferencias) -->
                                    <select class="form-control" name="id_preferencia" id="id_preferencia">
                                        <option value="">Preferencias</option>
                                    
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small font-weight-bold">Transporte</label>
                                    <select class="form-control" name="transporte" id="transporte">
                                        <option value="0">No requiere / No tiene</option>
                                        <option value="1">Sí (Aplica)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Fila 4: Observaciones -->
                        <div class="form-group mt-2">
                            <label class="small font-weight-bold">Observaciones</label>
                            <textarea class="form-control" name="observaciones" id="observaciones" rows="3" placeholder="Detalles adicionales, condiciones de la casa, etc."></textarea>
                        </div>

                        <hr>

                        <!-- Botones de Acción -->
                        <div class="text-right">
                            <button type="button" class="btn btn-danger shadow-sm" onclick="limpiarForm()">
                                <i class="fas fa-eraser fa-sm text-white-50 mr-1"></i> Limpiar
                            </button>
                            <button type="button" class="btn btn-success shadow-sm" onclick="registrarCasa()">
                                <i class="fas fa-save fa-sm text-white-50 mr-1"></i> Guardar Registro
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- Fin Container Fluid -->
    </div> <!-- Fin Main Content -->
</div>