<?php
$directorioActual = __DIR__;
$rutausuarios = dirname($directorioActual) . "/Controllers/usuarioscontroller.php";
require_once $rutausuarios;
$IDUsuario = $_POST['userId'];
$row = $objusuario->buscarUsuarioporID($IDUsuario)
?>

<div class="modal fade" id="editar_Modal_<?php echo $row['IDUsuario']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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