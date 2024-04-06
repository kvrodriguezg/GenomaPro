<?php
$directorioActual = __DIR__;
$rutacentro = dirname($directorioActual) . "/Controllers/centrosmedicosController.php";


$IDCentroMedico = $_GET['IDCentroMedico'] ?? '';
$NombreCentro = $_GET['NombreCentro'] ?? '';
$codigo = $_GET['codigo'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $IDCentroMedico = $_POST['IDCentroMedico'] ?? '';
    $NombreCentro = $_POST['NombreCentro'] ?? '';
    $codigo = $_POST['codigo'] ?? '';
    $op = $_POST['op'] ?? '';



    if ($op == "Modificar") {
        require_once $rutacentro;
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

    <title>Mantenedor</title>
</head>

<body>
    <header class="navbar navbar-light fixed-top" style="background-color: #9CD0FE;">
        <?php
        include("menuadministrador.php");
        ?>
    </header>
    <br><br>


    <form method="POST" class="form" style="padding: 100px 300px 0 300px;">
        <h2 style="text-align: center;">Editar Centro médico</h2><br>
        <div class="row">
            <div class="col">
            <label for="NombreCentro"> IDCentroMedico</label><br>
            <input type="text" class="form-control" name="IDCentroMedico" value="<?php echo $IDCentroMedico ?>" readonly>
                <label for="NombreCentro"> Nombre Centro</label><br>
                <input type="text" class="form-control" name="NombreCentro" value="<?php echo $NombreCentro ?>">
                <label for="TipoPerfil">Nombre codigo</label><br>
                <input type="text" class="form-control" name="codigo" value="<?php echo $codigo ?>">
                <input type="hidden" name="op" value="Modificar">
            </div>
        </div>
        <br><br><br>
        <input class="btn w-100 m-1 btn-primary btn-sm" name="op" type="submit" value="Modificar" />

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