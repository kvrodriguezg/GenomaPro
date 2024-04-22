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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" type="image/svg+xml" href="/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Document</title>
</head>

<body style="background-color: #E7E7E7; font-family: 'Montserrat';" class="text-center">
    <header class="navbar navbar-light fixed-top" style="background-color: #9CD0FE;">
        <?php
        include("menuadministrador.php");
        ?>
    </header>
    <br><br><br><br><br><br><br>

    <h1 style="padding-top:20px; color:#FFFFF">Estados</h1><br>

    <a type='button' class='btn btn-primary text-center btn-editar-estado ' data-bs-toggle='modal'
        data-estados-id='0' data-bs-target='#editar_Modal_'>Crear Estado</a>
    <br><br><br>
    <br><br><br>
    <style>
        .table thead th {
            background-color: #115DFC;
            color: white;
        }

        .col-clave {
            max-width: 100px;
            overflow: hidden;
            /* Oculta el texto que excede el ancho máximo */
            text-overflow: ellipsis;
            /* Agrega puntos suspensivos (...) al final del texto truncado */
            white-space: nowrap;
            /* Evita que el texto se divida en varias líneas */
        }

        .table-container {
            display: flex;
            justify-content: center;
        }
    </style>
    <div class="table-container">
        <div class="col-lg-11">
            <table id="tableUsers" class="table table-responsive">
                <thead>
                    <tr>
                        <th>ID Diagn&oacute;stico</th>
                        <th>Estado</th>
                        <th>Perfil</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <tbody style="background-color: #FFFFFF">
                    <?php
                    foreach ($DetalleEstados as $fila) {
                        ?>
                        <tr>
                            <td><?= $fila['IDEstado'] ?></td>
                            <td><?= $fila['NombreEstado'] ?></td>
                            <td>
                                <?php
                                $perfil = $objusuario->buscarPerfilId($fila['IDPerfil']);
                                echo $perfil['TipoPerfil'];
                                ?>
                            </td>
                            <td>
                                <button type='button' class='btn w-100 center-block btn-editar-estado' data-bs-toggle='modal'
                                    data-estados-id='<?php echo $fila['IDEstado']; ?>' data-bs-target='#editar_Modal'> <img src="../img/pen.png" width="40px" height="40px"></button>
                                <form method="post">
                                    <input type="hidden" name="sw" value="eliminar">
                                    <input type="hidden" name="IDEstado" value="<?php echo $fila['IDEstado']; ?>">
                                    <button type="submit" class="btn"><img src="../img/delete.png" width="40px" height="40px"></button>
                                </form>
                                <?php
                                if ($sw == "eliminar") {
                                    require_once $rutaestado;
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.btn-editar-es').click(function() {
                var estadoID = $(this).data('IDEstado');
                $.ajax({
                    type: 'POST',
                    url: 'modalestado.php',
                    data: {
                        userId: userId
                    },
                    success: function(response) {
                        $('body').append(response);
                        $('#editar_Modal_' + userId).modal('show'); // Abre el modal con el ID único
                    }
                });
            });
        });
    </script>
    <script>
        function confirmarYEliminar(IDEstado) {
            var confirmacion = confirm("¿Estás seguro de que deseas eliminar este usuario?");
            if (confirmacion) {
                var opField = document.getElementById('op');
                opField.value = "eliminar";
                console.log("Valor del campo op:", opField.value);
                document.getElementById('eliminarForm').submit();
            }
        }
    </script>
</body>

</html>
<?php include 'modalestado.php'; ?>
