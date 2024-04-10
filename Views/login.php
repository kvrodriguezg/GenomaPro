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
}//hola!!!!!!
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
    <link rel="stylesheet" href="../css/prueba.css">
    <title>Iniciar Sesión</title>
</head>

<body>

    <header class="navbar navbar-light fixed-top" style="background-color: #9CD0FE;">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="../img/logo_labmuest.png" alt="" width="110" height="35">
            </a>

        </div>
    </header>


    <section class="login">

        <style>
            .img-login {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .form-login {
                padding: 0 100px 0 100px;
            }
        </style>
        <form method="POST" action="login.php" class="form" style="padding: 100px 300px 0 300px;">
            <div class="m-0 row justify-content-center align-items-center">
                <div class="col-auto p-5 text-center">
                    <img class="img-login" src="../img/logo_labmuest.png" alt="" width="300">
                </div>
            </div>
            <h2 style="text-align: center;">Iniciar Sesión</h2><br>
            <?php
            if (!empty($error)) {
                echo "<script>alert('$error')</script>";
            }
            ?>
            <div class="container loginn">
                <style>
                    .loginn {
                        padding: 0 300px;
                    }
                </style>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="rut" style="text-align: center;">Usuario:</label>
                        <input type="text" class="form-control" name="usuario" placeholder="Ingrese su usuario"><br>
                        <label style="text-align: center;">Clave:</label>
                        <input type="password" class="form-control" name="clave" placeholder="Ingrese su clave">
                        <input type="hidden" name="op" value="LOGIN"><br>
                        <input type="submit" class="btn btn-primary w-100 center-block" name="btnlogin" value="Ingresar">
                    </div>
                </div>

            </div>
        </form>

        </div>
        </div>
    </section>


    <script src="https://kit.fontawesome.com/4652dbea50.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>>