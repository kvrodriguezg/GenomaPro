<?php
$directorioActual = __DIR__;
$rutacentro = dirname($directorioActual) . "/Controllers/centrosmedicosController.php";
$rutaacceso = dirname($directorioActual) . "/Controllers/accesoController.php";
require_once $rutacentro;
require_once $rutaacceso;

//require_once('../Controllers/accesoController.php');
//require_once('../Controllers/centrosmedicosController.php');
$perfilesPermitidos = 5;
verificarAcceso($perfilesPermitidos);
if (!isset($_POST['IDCentroMedico'])) {
    $IDCentroMedico = '';
} else {
    $IDCentroMedico = $_POST['IDCentroMedico'];
}
if (!isset($_POST['NombreCentro'])) {
    $NombreCentro = '';
} else {
    $NombreCentro = $_POST['NombreCentro'];
}
if (!isset($_POST['codigo'])) {
    $codigo = '';
} else {
    $codigo = $_POST['codigo'];
}

if (!isset($_POST['op'])) {
    $op = '';
} else {
    $op = $_POST['op'];
}
if ($op == 'EDITAR') {

    header("Location: editarlaboratorio.php?IDCentroMedico=$IDCentroMedico&NombreCentro=$NombreCentro&codigo=$codigo");
    exit();
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
    <link rel="stylesheet" href="../css/registro.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/nav.css">
    <title>Document</title>
</head>


<header class="navbar navbar-light fixed-top" style="background-color: #FFFFFF;">
    <?php
    include("../Views/Shared/nav.php");
    ?>
</header>
<br><br><br><br><br>

<style>
    .table thead th {
        background-color: #115DFC;
        color: white;
    }

    .table-container {
        display: flex;
        justify-content: center;
    }
</style>

<style>
    .center-button {
        text-align: center;
    }
</style>

<body class="text-center" style="background-color: #1E1E1E; font-family: 'Montserrat';">
    <h1 style="padding-top:40px; color:#FFFFFF">Centros Médicos</h1><br>
    <?php
    // require_once("../Controllers/centrosmedicosController.php");
    echo '
    <div class="mx-auto text-center">
                <nav class="nav">
                <ul class="nav">
                    <div >
                    </div>
                </ul>
                <ul class="nav">
                <div >
                    <form method="post" action="crearlaboratorio.php">
                        <input type="hidden" name="crearPerfiles" value="crear">
                        <button class="btn w-100 m-1 btn-primary btn-sm ">CREAR CENTRO</button>
                    </form>
                </div>
            </ul>
            </nav>
            <div>';
    ?>

    <br><br><br>

    <div class="table-container">
        <div class="col-lg-11">
            <table id="tableUsers" class="table table-responsive">
                <style>
                    .tabla {
                        width: 100%;
                    }
                </style>
                <thead>
                    <tr>
                        <th>ID </th>
                        <th>Nombre Laboratorio </th>
                        <th>Código </th>
                        <th>Editar </th>
                        <th>Eliminar </th>
                    </tr>
                </thead>
                <tbody style="background-color: #FFFFFF">
                    <?php
                    foreach ($listCentros as $registro) {
                    ?>
                        <tr>
                            <td>
                                <?php echo $registro['IDCentroMedico']; ?>
                            </td>
                            <td>
                                <?php echo $registro['NombreCentro']; ?>
                            </td>
                            <td>
                                <?php echo $registro['codigo']; ?>
                            </td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="op" value="EDITAR">
                                    <input type="hidden" name="IDCentroMedico" value="<?php echo $registro['IDCentroMedico'] ?>">
                                    <input type="hidden" name="NombreCentro" value="<?php echo $registro['NombreCentro'] ?>">
                                    <input type="hidden" name="codigo" value="<?php echo $registro['codigo'] ?>">
                                    <button type="submit" class="btn w-100 center-block"><img src="../img/pen.png" width="40px" height="40px"></button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form method="POST" action="" id="eliminarCentroForm">
                                    <input type="hidden" name="op" value="">
                                    <input type="hidden" name="IDCentroMedico" value="<?php echo $registro['IDCentroMedico']; ?>">
                                    <button type="button" class="btn w-100 center-block" onclick="confirmarYEliminar(this)"><img src="../img/delete.png" width="40px" height="40px"></button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            </section>



            <script src="https://kit.fontawesome.com/4652dbea50.js" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        </div>
    </div>
</body>

</html>


<script>
    function confirmarYEliminar(button) {
        var confirmacion = confirm("¿Estás seguro de que deseas eliminar este usuario?");
        if (confirmacion) {
            var form = button.closest('form');
            var opField = form.querySelector('[name="op"]');
            opField.value = "ELIMINAR";
            console.log("Valor del campo op:", opField.value);
            form.submit();
        }
    }
</script>