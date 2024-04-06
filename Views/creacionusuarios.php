<?php
$directorioActual = __DIR__;
$rutausuarios = dirname($directorioActual) . "/Controllers/usuarioscontroller.php";
require_once $rutausuarios;
$op = "";

//require_once("../Controllers/usuariosController.php");
//require_once("../Controllers/perfilesController.php");
//require_once("../Controllers/centrosmedicosController.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? '';
    $rut = $_POST['rut'] ?? '';
    $usuario = $_POST['usuario'] ?? '';
    $clave = $_POST['clave'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $perfil = $_POST['perfil'] ?? '';
    $centro = $_POST['centro'] ?? '';
    $op = $_POST['op'] ?? '';



}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" type="image/svg+xml" href="~/favicon.ico" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

    <title></title>
</head>

<body>
    <header class="navbar navbar-light fixed-top" style="background-color: #9CD0FE;">
        <?php
        include("menuadministrador.php");
        ?>
    </header>
    <br><br>


    <form method="POST" class="form" style="padding: 100px 300px 0 300px;">
        <h2 style="text-align: center;">Crear usuario</h2><br>
        <div class="row">
            <div class="col">
                <label for="nombre"> Nombre Completo</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="col">
                <label for="rut"> Rut</label>
                <input type="text" class="form-control" name="rut" required>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col">
                <label for="nombre">Usuario Ingreso</label>
                <input type="text" class="form-control" name="usuario" required>
            </div>
            <div class="col">
                <label for="materno">Clave </label>
                <input type="text" class="form-control" name="clave" required>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col">
                <label for="nombre">Correo</label>
                <input type="text" class="form-control" name="correo" required>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col">
                <label for="rut">Perfil</label>
                <td>
                    <select class="form-select" style="width: 100%" aria-label="Default select example" id="perfil"
                        name="perfil" value="seleccionar">
                        <?php
                        foreach ($listperfiles as $perfil) {
                            echo "<option value=\"" . $perfil['TipoPerfil'] . "\">" . $perfil['TipoPerfil'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </div>
            <div class="col">
                <label for="rut">Centro Médico</label>
                <td>
                    <select class="form-select" style="width: 100%" aria-label="Default select example" id="centro"
                        name="centro" value="seleccionar">
                        <?php
                        foreach ($listcentros as $centro) {
                            echo "<option value=\"" . $centro['NombreCentro'] . "\">" . $centro['NombreCentro'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </div>
        </div>
        <input type="hidden" name="op" value="GUARDAR">
        <br><br><br>

        <button type="submit" class="btn btn-primary w-100 center-block" name="crearRegistro">Registrar</button>
    </form>


    <script src="https://kit.fontawesome.com/4652dbea50.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</body>

</html>