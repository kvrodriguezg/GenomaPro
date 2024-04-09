<?php
$directorioActual = __DIR__;
$rutausuarios = dirname($directorioActual) . "/Controllers/usuarioscontroller.php";
require_once $rutausuarios;
$rutaaccesso = dirname($directorioActual) . "/Controllers/accesoController.php";
require_once $rutaaccesso;

//require_once("../Controllers/usuariosController.php");
//require_once('../Controllers/accesoController.php');
$perfilesPermitidos = 5;
verificarAcceso($perfilesPermitidos);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST['IDUsuario'])) {
        $IDUsuario = '';
    } else {
        $IDUsuario = $_POST['IDUsuario'];
    }
    if (!isset($_POST['op'])) {
        $op = '';
    } else {
        $op = $_POST['op'];
    }

    /*if ($op == 'EDITAR') {
        header("Location: editarusuario.php?IDUsuario=$IDUsuario");
        exit();
    }*/
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
    <link rel="icon" type="image/svg+xml" href="~/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="..//css/prueba.css">
    <title>Document</title>
</head>

<header class="navbar navbar-light fixed-top" style="background-color: #9CD0FE;">
    <?php
    include("menuadministrador.php");
    ?>
</header>
<br><br><br><br><br><br>

<body style="background-color: #1E1E1E; font-family: 'Montserrat';" class="text-center">
    <h1 style="padding-top:20px; color:#FFFFFF">Usuarios</h1><br>

    <br>

    <div class="buscador-usuario text-center">
        <?php
        echo '
            <nav class="nav text-center">
            <ul class="nav">
            <div class="text-center">
                <form method="post" action="creacionusuarios.php">
                    <input class="form-control" type="hidden" name="crearPerfiles" value="crear">
                    <button class="btn w-100 btn-primary btn-sm ">Nuevo Usuario</button>
                </form>
            </div>
            </ul>
            </nav>';
        ?>
        <?php /*<div>
            <input type="text" class="form-control" placeholder="Usuario" id="filtroUsuario">
        </div>
        <div>
            <input type="text" id="filtroCentro" class="form-control" placeholder="Centro Médico">
        </div>*/ ?>
    </div>

    <br><br><br>
    <div class="row mantenedorDiagnostico">
        <div class="col-lg-12">
            <table id="tableUsers" class="table table-responsive" style="padding: left 20px, right 20px;">
                <thead style="background-color: #115DFC; color: white;">
                    <?php /*  <script>
                       $(document).ready(function() {
                            // Función para realizar el filtrado
                            function filtrar() {
                                var inputFiltroUsuario = $('#filtroUsuario').val().toLowerCase();
                                var inputFiltroCentro = $('#filtroCentro').val().toLowerCase();

                                // Mostrar todas las filas de la tabla al principio
                                $('#tableUsers tbody tr').show();

                                // Filtrar las filas que coinciden con el criterio de búsqueda por usuario
                                if (inputFiltroUsuario) {
                                    $('#tableUsers tbody tr').filter(function() {
                                        var textoFila = $(this).find('td:eq(2)').text().toLowerCase();
                                        return textoFila.indexOf(inputFiltroUsuario) === -1;
                                    }).hide();
                                }

                                // Filtrar las filas que coinciden con el criterio de búsqueda por centro
                                if (inputFiltroCentro) {
                                    $('#tableUsers tbody tr').filter(function() {
                                        var textoFila = $(this).find('td:eq(7)').text().toLowerCase();
                                        return textoFila.indexOf(inputFiltroCentro) === -1;
                                    }).hide();
                                }
                            }

                            // Llamar a la función de filtrado al cargar la página
                            filtrar();

                            // Agregar eventos de cambio a los inputs de filtrado
                            $('#filtroUsuario, #filtroCentro').on('input', filtrar);
                        });
                    </script>*/ ?>
                    <tr>
                        <th>IDUsuario</th>
                        <th>Usuario </th>
                        <th>Nombre Completo</th>
                        <th>Correo </th>
                        <th>Rut </th>
                        <th class="th-usuario">Clave </th>
                        <th>Perfil</th>
                        <th>Centro Medico</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody style="background-color: #FFFFFF">
                    <?php
                    $tempUsuarios = array();
                    foreach ($listusuarios as $usu) {
                        echo $usu['IDUsuario'];
                        $tempUsuarios[] = $usu; 
                    ?>
                        <tr>
                            <td>
                                <?php echo $usu['IDUsuario']; ?>
                            </td>
                            <td>
                                <?php echo $usu['usuario']; ?>
                            </td>
                            <td>
                                <?php echo $usu['Nombre']; ?>
                            </td>
                            <td>
                                <?php echo $usu['Correo']; ?>
                            </td>
                            <td>
                                <?php echo $usu['Rut']; ?>
                            </td>
                            <td class="th-usuario">
                                <?php echo $usu['Clave']; ?>
                            </td>
                            <td>
                                <?php
                                $perfil = $objusuario->buscarPerfilId($usu['IDPerfil']);
                                echo $perfil['TipoPerfil'];
                                ?>
                            </td>
                            <td>
                                <?php $centro = $objusuario->buscarcentroID($usu['IDCentroMedico']);
                                echo $centro['NombreCentro'] ?? '';
                                ?>
                            </td>
                            <td>
                            <button type='button' class='btn w-100 center-block' data-bs-toggle='modal' data-bs-target='#editar_<?php echo $usu['IDUsuario']; ?>_Modal'><img src="../img/pen.png" width="40px" height="40px"></button>

                            </td>
                            <td class="text-center">
                                <form method="POST" action="" id="eliminarForm">
                                    <input type="hidden" name="op" id="op" value="">
                                    <input type="hidden" name="IDUsuario" value="<?php echo $usu['IDUsuario']; ?>">
                                    <button type="button" class="btn" onclick="confirmarYEliminar('<?php echo $usu['IDUsuario']; ?>')"><img src="../img/delete.png" width="40px" height="40px"></button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php


foreach ($tempUsuarios as $row) {
    echo $row['IDUsuario'];}
    if (!empty($tempUsuarios)) {
        foreach ($tempUsuarios as $row) {
            echo $row['IDUsuario']
    ?>
            <!-- Modal -->
            <!-- Modal -->


            <div class="modal fade" id="editar_<?php echo $row['IDUsuario']; ?>_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar:</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="mantenedorusuarios.php">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <label for="nombre">Nombre Completo:</label>
                                        <input type="text" class="form-control" name="nombre" value="<?php echo $row['Nombre']; ?>">
                                    </div>
                                    <div class="col">
                                        <label for="rut">Rut:</label>
                                        <input type="text" class="form-control" name="rut" value="<?php echo $row['Rut']; ?>">
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col">
                                        <label for="usuario">Usuario:</label>
                                        <input type="text" class="form-control" name="usuario" value="<?php echo $row['usuario']; ?>">
                                    </div>
                                    <div class="col">
                                        <label for="clave">Clave:</label>
                                        <input type="text" class="form-control" name="clave" value="<?php echo $row['Clave']; ?>">
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col">
                                        <label for="correo">Correo:</label>
                                        <input type="text" class="form-control" name="correo" value="<?php echo $row['Correo']; ?>">
                                    </div>

                                </div>

                                <br>
                                <?php

                                $perfilUsuario = $objusuario->buscarPerfilId($row['IDPerfil']);
                                $centroUsuario = $objusuario->buscarcentroID($row['IDCentroMedico']);
                                $perfiles = $objusuario->buscarPerfiles();
                                $centros = $objusuario->buscarCentros() ?>

                                <div class="row">
                                    <div class="col">
                                        <label for="perfil">Perfil:</label>
                                        <select class="form-select" style="width: 100%" aria-label="Default select example" id="perfil" name="perfil" required>
                                            <?php
                                            foreach ($perfiles as $row1) {
                                                $selected = ($perfilUsuario[0] == $row1['TipoPerfil']) ? 'selected' : '';
                                                echo '<option value="' . $row1['TipoPerfil'] . '" ' . $selected . '>' . $row1['TipoPerfil'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="perfil">Centro Médico:</label>
                                        <select class="form-select" style="width: 100%" aria-label="Default select example" id="centro" name="centro" required>
                                            <?php
                                            foreach ($centros as $row2) {
                                                $selected = ($centroUsuario[0] == $row2['NombreCentro']) ? 'selected' : '';
                                                echo '<option value="' . $row2['NombreCentro'] . '" ' . $selected . '>' . $row2['NombreCentro'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="IDUsuario" value="<?php echo $row['IDUsuario']; ?>">
                                    <input type="hidden" name="op" value="Modificar">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="modificar" class="btn btn-primary" value="Modificar">Modificar</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    <?php }
    } ?>

    <script src="https://kit.fontawesome.com/4652dbea50.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>

<script>
    function confirmarYEliminar(IDUsuario) {
        var confirmacion = confirm("¿Estás seguro de que deseas eliminar este usuario?");
        if (confirmacion) {
            var opField = document.getElementById('op');
            opField.value = "eliminar";
            console.log("Valor del campo op:", opField.value);
            document.getElementById('eliminarForm').submit();
        }
    }
</script>