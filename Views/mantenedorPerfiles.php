<?php
// Obtener la ruta del archivo actual
$directorioActual = __DIR__;
// Obtener la ruta del controlador de perfiles
$rutaperfiles = dirname($directorioActual) . "/Controllers/perfilesController.php";
require_once $rutaperfiles;

$op = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inicializar variables para evitar advertencias de 'undefined'
    $IDPerfil = $TipoPerfil = '';

    // Asignar valores si están definidos
    $IDPerfil = isset($_POST['IDPerfil']) ? $_POST['IDPerfil'] : '';
    $TipoPerfil = isset($_POST['TipoPerfil']) ? $_POST['TipoPerfil'] : '';
    $op = isset($_POST['op']) ? $_POST['op'] : '';

    if ($op == 'EDITAR') {
        // Redirigir a la página de edición con parámetros
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
    <link rel="stylesheet" href="../css/prueba.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" type="image/svg+xml" href="/favicon.ico" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="../css/nav.css"> 
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Document</title>
</head>
  
  <header class="navbar navbar-light fixed-top" style="background-color: #FFFFFF;">
    <?php
    include("../Views/Shared/nav.php");
    ?>
</header>
<br><br><br><br><br>

<body style="background-color: #E7E7E7; font-family: 'Montserrat';" class="text-center">
    <h1 style="padding-top:30px; color:#FFFFFF">Listados de Perfiles</h1><br>

    <a type='button' class='btn btn-primary text-center btn-editar-estado ' data-bs-toggle='modal' data-estados-id='0'
        data-bs-target='#editar_Modal_'>Crear Perfil</a>
        <br><br><br><br><br>

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
                        <th>ID Perfil</th>
                        <th>Tipo Perfil</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                   </tr>
                </thead>
                <tbody style="background-color: #FFFFFF">
                    <?php
                    foreach ($listperfiles as $registro) {
                        ?>
                        <tr>
                            <td><?php echo $registro['IDPerfil']; ?></td>
                            <td><?php echo $registro['TipoPerfil']; ?></td>
                            <td>
                                <form method="POST" action="editarperfil.php">
                                    <input type="hidden" name="op" value="EDITAR">
                                    <input type="hidden" name="IDPerfil" value="<?php echo $registro['IDPerfil'] ?>">
                                    <input type="hidden" name="TipoPerfil" value="<?php echo $registro['TipoPerfil'] ?>">
                                    <button type='button' class='btn w-100 center-block btn-editar-estado'
                                        data-bs-toggle='modal' data-bs-target='#editar_Modal'> <img src="../img/pen.png"
                                            width="40px" height="40px"></button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="mantenedorPerfiles.php">
                                    <input type="hidden" name="op">
                                    <input type="hidden" name="IDPerfil" value="<?php echo $registro['IDPerfil'] ?>">
                                    <button type="submit" class="btn"><img src="../img/delete.png" width="40px"
                                            height="40px"></button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            </section>
            <script>
                $(document).ready(function () {
                    $('.btn-editar-es').click(function () {
                        var estadoID = $(this).data('IDEstado');
                        $.ajax({
                            type: 'POST',
                            url: 'modalestado.php',
                            data: {
                                userId: userId
                            },
                            success: function (response) {
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
            <script src="https://kit.fontawesome.com/4652dbea50.js" crossorigin="anonymous"></script>
</body>
</html>
</body>
</html>