<?php
$directorioActual = __DIR__;
$rutadiagnostico = dirname($directorioActual) . "/Controllers/diagnosticocontroller.php";
require_once $rutadiagnostico;
?>

<div class="modal fade" id="editar_Modal_<?php echo $codigo ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="mantenedordiagnostico.php">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="codigo" style="text-align: center;">Código</label>
                            <input type="text" required class="form-control" name="codigo" value='<?php echo $valorcodigo ?>' <?php echo $readonly ?>>
                        </div>
                    </div>
                    <br>
                    <br>
                    <input type="hidden" name="operacion" value='<?php echo $operacion ?>'>
                    <div class="row">
                        <div class="col">
                            <label for="descripcion" style="text-align: center;">Descripción</label>
                            <input type="text" required class="form-control" name="descripcion" value="<?php echo $descripcion ?>">
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="submit" name="modificar" class="btn btn-primary"><?php echo $boton ?></button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>