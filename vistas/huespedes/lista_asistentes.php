<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistentes</title>

     <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/ROSARIO/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Iconos de boostrap -->
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <?php include '../../librerias/libreriasGenerales.php' ?>

</head>
<body>
    <div id="wrapper">
         <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Barra Superior (Topbar) -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <?php include __DIR__ . '../../../componentes/info_usuario.php'; ?>
                </nav>

                <!-- Contenido de la Página -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <!-- Cabecera con Botón de Ver Registros -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h5 class="m-0 font-weight-bold text-primary">Listado de asistentes</h5>
                            <a href="huespedes.php" class="btn btn-sm btn-info shadow-sm">
                                <i class="fas fa-list fa-sm text-white-50"></i> Registrar asistentes
                            </a>
                        </div>

                        <!-- Cuerpo del Formulario -->
                        <div class="card-body">
                            <!-- Tabla de casas -->
                            <div class="row">
                                <div class="col-12">
                                    <?php include __DIR__ . '../../../componentes/tablas/tablaAsistentes.php'; ?>
                                </div>

                            </div>

                            <!-- Fin de la tabla de casas -->
                        </div>
                    </div>
                </div> <!-- Fin Container Fluid -->
            </div> <!-- Fin Main Content -->
        </div>
        <!-- Fin Content Wraper -->



    </div>
    <!-- End of Page Wrapper -->

    <script src="../../js/huespedes.js"></script>
    </div>
    
</body>
</html>