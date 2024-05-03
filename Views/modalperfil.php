<?php
$directorioActual = __DIR__;
$rutaperfil = dirname($directorioActual) . "/Controllers/perfilesController.php";
require_once $rutaperfil;
$IDPerfil = $_POST['PerfilId'];
$tipoPerfil =$_POST['TipoPerfil'];
$ooperacion = $_POST['operacion'];

$row = $objPerfil->buscarPerfil($IDPerfil);

$perfiles = array();
$centros = array();
?>


<div class="modal fade" id="editar_Modal_<?php echo $IDPerfil ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hola</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="mantenedorPerfiles.php">
                <div class="modal-body text-center">
                    <div class="row">
                        <input type="hidden" name="operacion" value='<?php echo $ooperacion ?>'>
                        <div class="col-9 mx-auto">
                            <input type="hidden" class="form-control" name="IDPerfil" value=<?php echo $IDPerfil ?> readonly>
                            <label for="nombreCentro"> Nombre Perfil</label>
                            <input required type="text" class="form-control" name="nombrePerfil" value="<?php echo $tipoPerfil?>">
                        </div>
                    </div>
                    <br>
                   
                    <div class="row">
                    
                        <div class="col">
                            <div class="modal-footer">
                                <input type="hidden" name="op" value="GUARDAR">
                                <button type="submit" name="GUARDAR"  value="GUARDAR" class="btn btn-primary">Guardar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>