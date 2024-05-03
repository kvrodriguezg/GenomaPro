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
    <link rel="stylesheet" href="../css/prueba.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" type="image/svg+xml" href="/favicon.ico" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="../css/nav.css">
    <title>Document</title>
</head>
<header class="navbar navbar-light fixed-top" style="background-color: #FFFFFF;">
    <?php
    include ("../Views/Shared/nav.php");
    ?>
</header>
<br><br><br><br><br><br>


<body class="text-center" style="background-color: #E7E7E7; font-family: 'Montserrat';">
    <div style="width:100%; display:flex; justify-content:center;">
        <div style="width: 80px; height: 80px; border-radius: 100%; background-color: #023E73; display: flex; justify-content: center; align-items: center; position: relative;"
            class="text-center">
            <div style="position: absolute; z-index: 10;">
                <button type='button' style="color: #000000; position: absolute; left: 4px; top: 0;"
                    class='btn center-block text-center btn-editar-estado' data-bs-toggle='modal' data-estado=0
                    bs-target='#editar_Modal_0'>
                    <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                </button>
            </div>
            <i class="fa-regular fa-user fa-2xl" style="color: #FFFFFF;"></i>
        </div>
    </div>

    <!-- <h1 style="padding-top:20px; color:#000000">Usuarios</h1><br> -->


    <br><br><br>
    <style>
        .table thead th {
            background-color: #023E73;
            color: white;
            text-decoration: none;
            font-weight: lighter;
        }

        .table-container {
            display: flex;
            justify-content: center;
        }
    </style>
    <div>
        <div class="table-container">
            <div class="col-lg-11">
                <table id="tableUsers" class="table table-responsive">
                    <thead>
                        <tr>
                            <th>ID Diagn&oacute;stico</th>
                            <th>Estado</th>
                            <th>Perfil</th>
                            <th>Acci&oacute;n</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #FFFFFF">
                        <?php
                        $tempEstados = array();
                        foreach ($DetalleEstados as $fila) {
                            $tempEstados[] = $fila;

                            ?>
                            <tr>
                                <td><?php echo $fila['IDEstado'] ?></td>
                                <td><?php echo $fila['NombreEstado'] ?></td>
                                <td> <?php
                                $perfil = $objusuario->buscarPerfilId($fila['IDPerfil']);
                                echo $perfil['TipoPerfil'];
                                ?>
                                <td>
                                    <button type='button' class='btn center-block btn-editar-estado'
                                        data-estado="<?php echo $fila['IDEstado']; ?>" data-bs-toggle='modal'
                                        data-bs-target='#editar_Modal_<?php echo $fila['IDEstado']; ?>'>
                                        <i class="fa-solid fa-2xl fa-pen-to-square" style="color: #023059;"></i>
                                    </button>

                                </td>
                                <td class="text-center">
                                    <form method="POST" action="" id="eliminarForm">
                                        <input type="hidden" name="op" id="op" value="eliminar">
                                        <input type="hidden" name="IDEstado" value="<?php echo $fila['IDEstado']; ?>">
                                        <button type="button" class="btn"
                                            onclick="confirmarYEliminar('<?php echo $fila['IDEstado']; ?>')"><i
                                                class="fa-solid fa-2xl fa-trash" style="color: #023059;"></i></button>
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
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
                    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                    crossorigin="anonymous"></script>
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                    crossorigin="anonymous"></script>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $('.btn-editar-estado').click(function () {
                    var estadoID = $(this).data('estado');
                    $.ajax({
                        type: 'POST',
                        url: 'modalestado.php',
                        data: {
                            estadoID: estadoID,
                        },
                        success: function (response) {
                            $('#modal-container').html(response);
                            $('#editar_Modal' + estadoID).modal('show');
                        }
                    });
                });
            });

        </script>
        <script>
            function confirmarYEliminar(IDEstado) {
                var confirmacion = confirm("¿Estás seguro de que deseas eliminar este estado");
                if (confirmacion) {
                    var opField = document.getElementById('op');
                    opField.value = "eliminar";
                    console.log("Valor del campo op:", opField.value);
                    document.getElementById('eliminarForm').submit();
                }
            }
        </script>
</body>
<div id="modal-container"></div>

</html>