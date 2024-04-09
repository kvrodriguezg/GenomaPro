<?php
//$directorioActual = __DIR__;
//$ruta = dirname($directorioActual) . "/Controllers/loginController.php";
//require_once $ruta;
$op = "";
session_start();
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']); // Limpiar el mensaje de error para que no persista en futuras solicitudes

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'] ?? '';
    $clave = $_POST['clave'] ?? '';
    $op = $_POST['op'] ?? '';

    if ($op == "LOGIN") {
        require_once("../Controllers/loginController.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" type="image/svg+xml" href="~/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title>Iniciar Sesión</title>
</head>

<body style="background-color: #1E1E1E; font-family: 'Montserrat';">

    <header class="navbar navbar-light fixed-top mb-5" style="background-color: #9CD0FE;">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="../img/logo_labmuest.png" alt="" width="110" height="35">
            </a>
        </div>
    </header>

    <div class="container rounded-3" style="margin-top: 150px;"> <!-- Ajusta este valor según la altura de tu header -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="login.php" class="form">

                            <img class="img-login mx-auto d-block" src="../img/1.png" alt="" width="250">
                            <h1 style="text-align: center;">Iniciar Sesión</h1><br>
                            <?php
                            if (!empty($error)) {
                                echo "<script>alert('$error')</script>";
                            }
                            ?>

                            <div class="pl-6 px-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <img src="../img/user2.png" width="20" height="20">
                                    </span>
                                    <input type="text" class="form-control" name="usuario" placeholder="Ingrese su usuario">
                                </div>
                                <br>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <img src="../img/padlock.png" width="20" height="20">
                                    </span>
                                    <input type="password" class="form-control" name="clave" placeholder="Ingrese su clave">
                                </div>
                                <input type="hidden" name="op" value="LOGIN"><br>
                                <input type="submit" class="btn btn-primary mx-auto d-block" name="btnlogin" value="Ingresar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</html>>