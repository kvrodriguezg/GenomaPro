<?php
$directorioActual = __DIR__;
$rutausuarios = dirname($directorioActual) . "/Controllers/usuarioscontroller.php";
require_once $rutausuarios;

$IDUsuario = $_GET['IDUsuario'] ?? '';

//require_once("../Controllers/usuariosController.php");

$resultUsuario = $objusuario->buscarUsuario($IDUsuario);
foreach ($resultUsuario as $res) {
    $buscaridperfil = $res['IDPerfil'];
    $buscaridcentro = $res['IDCentroMedico'];
}


$resultPerfil = $objusuario->buscarPerfilId($buscaridperfil);
$resultCentro = $objusuario->buscarcentroID($buscaridcentro);
$nombrePerfil = $resultPerfil['TipoPerfil'] ?? '';;
$nombreCentro = $resultCentro['NombreCentro'] ?? '';;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $resultPerfil = '';
    $resultCentro = '';
    $nombrePerfil = '';
    $nombreCentro = '';

    $IDUsuario = $_POST['IDUsuario'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $rut = $_POST['rut'] ?? '';
    $usuario = $_POST['usuario'] ?? '';
    $clave = $_POST['clave'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $perfil = $_POST['perfil'] ?? '';
    $centro = $_POST['centro'] ?? '';
    $op = $_POST['modificar'] ?? '';
    $nombreCentro = '';
    $nombrePerfil = '';

    if ($op == "Modificar") {
       // require_once("../Controllers/usuariosController.php");
        exit();
    }

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

    <title>Mantenedor usuarios</title>
</head>

<body>
    <header class="navbar navbar-light fixed-top" style="background-color: #9CD0FE;">
        <?php
        include("menuadministrador.php");
        foreach ($resultUsuario as $registro) {
            ?>
        </header>
        <br><br>


        <form method="POST" class="form" style="padding: 100px 300px 0 300px;">
            <h2 style="text-align: center;">Editar Usuario</h2><br>
            <input type="hidden" class="form-control" name="IDUsuario" value="<?php echo $registro['IDUsuario']; ?>">

            <div class="row">
                <div class="col">
                    <label for="rut">Ingrese Nombre Completo</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $registro['Nombre']; ?>">
                </div>
                <div class="col">
                    <label for="nombre">Ingrese Rut</label>
                    <input type="text" class="form-control" name="rut" value="<?php echo $registro['Rut']; ?>">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="nombre">Usuario Ingreso</label>
                    <input type="text" class="form-control" name="usuario" value="<?php echo $registro['usuario']; ?>">
                </div>
                <div class="col">
                    <label for="materno">Clave Ingreso</label>
                    <input type="text" class="form-control" name="clave" value="<?php echo $registro['Clave']; ?>">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="nombre">Correo</label>
                    <input type="text" class="form-control" name="correo" value="<?php echo $registro['Correo']; ?>">
                </div>

            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="rut">Perfil</label>
                    <select class="form-select" style="width: 100%" aria-label="Default select example" id="perfil"
                        name="perfil">
                        <option <?php echo ($nombrePerfil == 'Seleccionar') ? 'selected' : ''; ?>>Seleccionar</option>
                        <option <?php echo ($nombrePerfil == 'Administrador') ? 'selected' : ''; ?>>Administrador</option>
                        <option <?php echo ($nombrePerfil == 'Recepcionista') ? 'selected' : ''; ?>>Recepcionista</option>
                        <option <?php echo ($nombrePerfil == 'Tecnico Diagnóstico') ? 'selected' : ''; ?>>Tecnico Diagnóstico
                        </option>
                        <option <?php echo ($nombrePerfil == 'Centro Médico') ? 'selected' : ''; ?>>Centro Médico</option>
                    </select>
                </div>

                <div class="col">
                    <label for="rut">Centro Médico</label>
                    <select class="form-select" style="width: 100%" aria-label="Default select example" id="centro"
                        name="centro">
                        <option>Seleccionar</option>
                                                <option <?php echo ($nombreCentro == 'N/A') ? 'selected' : ''; ?>>N/A</option>
                        <option <?php echo ($nombreCentro == 'Ultraman') ? 'selected' : ''; ?>>Ultraman</option>
                        <option <?php echo ($nombreCentro == 'Megaman') ? 'selected' : ''; ?>>Megaman</option>
                        <option <?php echo ($nombreCentro == 'ultramegaman') ? 'selected' : ''; ?>>ultramegaman</option>
                    </select>
                </div>
            </div>

            <br><br><br>

            <input type="hidden" name="op" value="Modificar">
            <input class="btn w-100 m-1 btn-primary" name="modificar" type="submit" value="Modificar" />
        </form>
        <?php
        }
        ?>


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