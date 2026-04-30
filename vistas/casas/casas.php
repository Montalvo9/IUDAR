<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casas</title>

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
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Menu lateral -->
        <?php include '../../componentes/menu.php'; ?>

        <!-- Content Wrapper -->

       <?php  include $_SERVER['DOCUMENT_ROOT'] . '/rosario/componentes/contenedor_casas.php'; ?>
        <!-- Fin Content Wraper -->


    </div>
    <!-- End of Page Wrapper -->

    <script src="../../js/casas.js"></script>
    </body>

</html>