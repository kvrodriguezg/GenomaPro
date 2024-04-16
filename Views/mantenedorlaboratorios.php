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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" type="image/svg+xml" href="~/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../css/registro.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<header class="navbar navbar-light fixed-top" style="background-color: #9CD0FE;">
    <?php
    include("menuadministrador.php");
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
    <button type="button" class="btn center-block btn-primary btn-editar-centro" data-bs-toggle="modal" data-cod-id=0 bs-target="#editar_Modal_0">Nuevo Centro Médico</button>
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
                        <th></th>
                        <th></th>
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
                                <div>
                                    <button type='button' class='btn center-block btn-editar-centro' data-bs-toggle='modal' data-cod-id=<?php echo $registro['IDCentroMedico']; ?> bs-target='#editar_Modal_' <?php echo $registro['IDCentroMedico'] ?>> <img src="../img/pen.png" width="40px" height="40px"></button>
                                </div>
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
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        $('.btn-editar-centro').click(function() {
            var id = $(this).data('id');
            $.ajax({
                type: 'POST',
                url: 'modalCentroMedico.php',
                data: {
                    id: id,
                },
                success: function(response) {
                    $('body').append(response);
                    $('#editar_Modal_' + id).modal('show');
                }
            });
        });
    });
</script>

<script>
    function confirmarYEliminar(button) {
        var confirmacion = confirm("¿Estás seguro de que deseas eliminar este centro?");
        if (confirmacion) {
            var form = button.closest('form');
            var opField = form.querySelector('[name="op"]');
            opField.value = "ELIMINAR";
            console.log("Valor del campo op:", opField.value);
            form.submit();
        }
    }
</script>