<?php
$directorioActual = __DIR__;
$ruta = dirname($directorioActual) . "/Models/conex.php";
require_once $ruta;

//include '../Models/conex.php';
if (isset($_POST['crearRegistro'])) {
    $codigo = mysqli_real_escape_string($conexion, $_POST['codigo']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!isset($codigo) || $codigo == '' || !isset($descripcion) || $descripcion == '') {
        $error = "Algunos Campos Estan Vacios";
    } else {
        $query = "INSERT INTO Diagnosticos(Codigo, descripcion)VALUES('$codigo', '$descripcion')";
        if (!mysqli_query($conexion, $query)) {
            die('Error: ' . mysqli_error($conexion));
            $error = "No se Pudo Crear el Registro";
        } else {
            $mensaje = "Registro Creardo Exitosamente";
            //header('Location:../Views/mantenedordiagnostico.php?mensaje=' . urldecode($mensaje));
            exit();
        }
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

    <title>Crear usuarios</title>
</head>

<body>
    <header class="navbar navbar-light fixed-top" style="background-color: #9CD0FE;">
        <?php
        include("menuadministrador.php");
        ?>
    </header>
    <br><br>



    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" class="form" style="padding: 100px 300px 0 300px;">
        <?php if (isset($error)) : ?>
            <h4 class="alert alert-danger" role="alert" style="font-size: 15px;"><?php echo $error; ?></h4>
        <?php endif ?>
        <div>
            <h2 style="text-align: center;">Crear Diagnóstico</h2><br>
        </div>
        <div class="row">

            <div class="col">
                <label for="rut" style="text-align: center;" readonly>Código</label>
                <input type="text" class="form-control" name="codigo">
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col">
                <label for="materno" style="text-align: center;">Descripción</label>
                <input type="text" class="form-control" name="descripcion">
            </div>
        </div>

        <br>

        <button type="submit" class="btn btn-primary w-100 center-block" name="crearRegistro">Guardar</button>
    </form>


    <script src="https://kit.fontawesome.com/4652dbea50.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>