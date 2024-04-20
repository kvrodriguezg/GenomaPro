<?php
$directorioActual = __DIR__;
$rutaacceso = dirname($directorioActual) . "/Controllers/accesoController.php";
require_once $rutaacceso;

$rutaestado = dirname($directorioActual) . "/Controllers/EstadoController.php";
require_once $rutaestado;

$rutausuario = dirname($directorioActual) . "/Controllers/usuarioscontroller.php";
require_once $rutausuario;

$perfilesPermitidos = 5;
verificarAcceso($perfilesPermitidos);
$IDEstado = '';
$sw = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['IDEstado'])) {
        $IDEstado = '';
    } else {
        $IDEstado = $_POST['IDEstado'];
    }
    if (!isset($_POST['sw'])) {
        $sw = '';
    } else {
        $sw = $_POST['sw'];
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../css/nav.css">
    <title>Document</title>
</head>



<header class="navbar navbar-light fixed-top" style="background-color: #FFFFFF;">
    <?php
    include("../Views/Shared/nav.php");
    ?>
</header>
<br><br><br><br><br><br><br>

<body class="container">

<?php if(isset($_GET['mensaje'])) :  ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong><?php echo  $_GET['mensaje'] ?></strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <?php endif ?>


    <h1 style="padding-top: 20px;">Listado de Estados</h1><br>
    <a href="crearestado.php" class="btn  btn-primary">Crear Estados</a>
    <br><br><br>
        <section style="margin: 10px;">


        <table id="tableUsers" class="tabla table">
            <style>
                .tabla {
                    width: 100%;
                }
            </style>

            <thead>
                <tr>
                    <th>ID Diagn&oacute;stico</th>
                    <th>Estado </th>
                    <th>Perfil </th>
                    <th>Acci&oacute;n </th>
                </tr>
            </thead>

            <?php
            foreach ($DetalleEstados as $fila) {
                ?>
                <tbody>
                    <tr>
                        <td>
                            <?= $fila['IDEstado'] ?>
                        </td>
                        <td>
                            <?= $fila['NombreEstado'] ?>
                        </td>
                        <td>
                            <?php
                            $perfil = $objusuario->buscarPerfilId($fila['IDPerfil']);
                            echo $perfil['TipoPerfil'];
                            ?>
                        </td>
                        <td>
                            <a href="editarestado.php?IDEstado=<?php echo $fila['IDEstado']; ?>"
                                class="btn w-100 m-1 btn-primary">editar</a>

                            <form method="post">
                                <input type="hidden" name="sw" value="eliminar">
                                <input type="hidden" name="IDEstado" value="<?php echo $fila['IDEstado']; ?>">
                                <input class="btn m-1 w-100 btn-danger" type="submit" value="eliminar">
                            </form>
                            <?php

                            if ($sw == "eliminar") {

                               require_once $rutaestado;
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
                <?php
            }
            ?>
        </table>
    </section>



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
        
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" 
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" 
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" 
        crossorigin="anonymous"></script>
</body>

</html>