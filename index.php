<?php

/**La session siempre va en la linea 1 */
session_start();
require_once './models/DBLogin.php';
require_once './librerias/libreriasGenerales.php';

$error = false;

//mostrar error guardado en session
// Mostrar error guardado en sesión
if (isset($_SESSION['login_error'])) {
    $error = true;
    unset($_SESSION['login_error']);
}



if (isset($_POST['ingresar'])) {
    $usuario_input = $_POST['usuario'];
    $password_input = $_POST['password'];


    //creamos la instancia al modelo (DBLogin.php)

    $modelo = new ModeloLogin();

    //El  modelo es el que valida todo internamente
    $usuarioData = $modelo->validarLogin($usuario_input, $password_input);

    if ($usuarioData !== false) {
        //guardamos los datos de la sesion 
        $_SESSION['id_usuario'] = $usuarioData['id_usuario'];
        $_SESSION['usuario'] = $usuarioData['usuario'];
        $_SESSION['nombre'] = $usuarioData['nombre'];
        $_SESSION['rol'] = $usuarioData['rol'];

        header('Location: ./vistas/dashboard.php');
        exit;
    } else {
        $_SESSION['login_error'] = true;
        header("Location: index.php");
        exit;
    }
}
//var_dump($error);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Iconos de botstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5 rounded">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido</h1>
                                    </div>

                                    <!-- Formulario de inicio de sesión -->
                                    <form action="index.php" method="POST" class="user">
                                        <div class="form-group mb-3">
                                            <label for="usuario" class="sr-only">Usuario</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="usuario" name="usuario"
                                                placeholder="Ingrese su usuario..."
                                                aria-describedby="usuarioHelp"
                                                autocomplete="username" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="password" class="sr-only">Contraseña</label>
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password"
                                                placeholder="Ingrese su contraseña"
                                                autocomplete="current-password" required>
                                        </div>

                                        <button type="submit" name="ingresar" class="btn btn-primary btn-user btn-block">
                                            <i class="fas fa-sign-in-alt"></i> Ingresar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- SWEETALERT DE ERROR - Solo se muestra si $error es true -->
    <?php if ($error): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error de inicio de sesión',
                text: 'Usuario o contraseña incorrectos',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Intentar de nuevo'
            });
        </script>
    <?php endif; ?>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>