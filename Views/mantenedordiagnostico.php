<?php 
//$directorioActual = __DIR__;
//$ruta = dirname($directorioActual) . "/Models/conex.php";
//require_once $ruta;
//
//$rutaacceso = dirname($directorioActual) . "/Controllers/accesoController.php";
//require_once $rutaacceso;


include("../Controllers/diagnosticoController.php");
require_once('../Controllers/accesoController.php');
$perfilesPermitidos = 5;
verificarAcceso($perfilesPermitidos);?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" type="image/svg+xml" href="~/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

    <title>Diagnosticos</title>
</head>

<header class="navbar navbar-light fixed-top" style="background-color: #9CD0FE;">
    <?php
    include("menuadministrador.php");
    ?>
</header>



<body class="container">
    <br><br><br><br><br><br>
    <?php if (!isset($mensaje)) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 15px;">
            <strong><?php echo $_GET['mensaje'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <h1 style="padding-top: 20px;">Listado de Diagnósticos</h1><br>
    <a href="creardiagnostico.php" class="btn  btn-primary">Crear Diagnóstico</a>
    <br><br><br>
    <div class="seccion_mantenedor">
        <style>
            .tablas_mantenedor {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .seccion_mantenedor {
                padding-left: 270px;
            }
        </style>
        <section class="tablas_mantenedor">
            <table id="tableUsers" class="tabla table">

                <thead>
                    <tr>
                        <th>Código </th>
                        <th>Descripción </th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_assoc($diagnosticos)) : ?>

                        <tr class="table ">
                            <td><?php echo $fila['Codigo'] ?></td>
                            <td><?php echo $fila['descripcion'] ?>

                            <td>
                                <a href="editardiagnostico.php?Codigo=<?php echo $fila['Codigo']; ?>" class="btn w-30 m-1 btn-primary">editar</a>
                                <a href="borrardiagnostico.php?Codigo=<?php echo $fila['Codigo']; ?>" class="btn w-30 m-1 btn-danger">borrar</a>
                            </td>
                        </tr>

                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </div>



    <script src="https://kit.fontawesome.com/4652dbea50.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>