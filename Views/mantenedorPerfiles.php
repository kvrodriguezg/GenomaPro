<?php
$directorioActual = __DIR__;
$rutaperfiles = dirname($directorioActual) . "/Controllers/perfilesController.php";
require_once $rutaperfiles;

$op = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST['IDPerfil'])) { $IDPerfil = '';} else {$IDPerfil = $_POST['IDPerfil'];}
    if (!isset($_POST['TipoPerfil'])) {$TipoPerfil = '';} else {$TipoPerfil = $_POST['TipoPerfil'];}
    if (!isset($_POST['op'])) { $op = '';} else {$op = $_POST['op'];}
    
if ($op == 'EDITAR') {
        header("Location: editarperfil.php?IDPerfil=$IDPerfil&TipoPerfil=$TipoPerfil");
        exit();
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
   <link rel="stylesheet" href="../css/nav.css"> 
   <title>Document</title>
</head>


<header class="navbar navbar-light fixed-top" style="background-color: #FFFFFF;">
    <?php
    include("../Views/Shared/nav.php");
    ?>
</header>
<br><br><br><br><br>

<body class="container">
    <h1 style="padding-top: 30px;">Listado de Perfiles</h1><br>
    <?php
    //require_once("../Controllers/perfilesController.php");

        echo '
                <nav class="nav">
                <ul class="nav">
                    <div class="m-1">

                    </div>
                </ul>
                <ul class="nav">
                <div class="m-1">
                    <form method="post" action="crearperfil.php">
                        <input type="hidden" name="crearPerfiles" value="crear">
                        <button class="btn w-100 m-1 btn-primary btn-sm ">CREAR PERFIL</button>
                    </form>
                </div>
            </ul>
            </nav>';
 ?>
    <section style="margin: 10px;">
        <table id="tableUsers" class="tabla table">
            <style>
                .tabla {
                    width: 100%;
                }
            </style>
            <thead>
                <tr>
                    <th>ID Perfil</th>
                    <th>Tipo Perfil</th>
                    <th>Editar</th>
                    <th>Eliminar</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listperfiles as $registro) {
                    ?>
                    <tr >
                        <td>
                            <?php echo $registro['IDPerfil']; ?>
                        </td>
                        <td>
                            <?php echo $registro['TipoPerfil']; ?>
                        </td>
                        <td>

                            <form method="POST">
                                <input type="hidden" name="op" value="EDITAR">
                                <input type="hidden" name="IDPerfil" value="<?php echo $registro['IDPerfil'] ?>">
                                <input type="hidden" name="TipoPerfil" value="<?php echo $registro['TipoPerfil'] ?>">
                                <button type="submit" class="btn w-100 center-block btn-primary">EDITAR</button>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="mantenedorPerfiles.php">
                                <input type="hidden" name="op" value="eliminar">
                                <input type="hidden" name="IDPerfil" value="<?php echo $registro['IDPerfil'] ?>">
                                <input class="btn btn-danger" type="submit" value="ELIMINAR">
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                if ($op == "ELIMINAR") {
                    //require_once("../Controllers/perfilesController.php");
                }

                ?>
            </tbody>
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

</body>

</html>