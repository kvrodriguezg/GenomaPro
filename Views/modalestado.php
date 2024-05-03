<?php
$directorioActual = __DIR__;
$rutaestado = dirname($directorioActual) . "/Controllers/EstadoController.php";
require_once $rutaestado;
$IDEstado = $_POST['estadoID'];
$row = $objetoEstado->MostrarEstados();


$estados = array();?>

<div class="modal fade" id="editar_Modal_<?php echo $IDEstado?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">hola </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="mantenedorestados.php">
                <div class="modal-body text-center">
                    <div class="row">
                        <input type="hidden" name="operacion" value='Guardar'>
                        <div class="col-9 mx-auto">
                            <input type="hidden" class="form-control" name="IDEstado" value=<?php echo $IDEstado ?> readonly>
                            <label for="nombreCentro"> Estado</label>
                            <input required type="text" class="form-control" name="nombreEstado" value="Perfil">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-9 mx-auto">
                            <label for="codigo">Código</label><br>
                            <input required type="text" class="form-control" name="codigo" value=1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="modal-footer">
                                <button type="submit" name="enviar" class="btn btn-primary">enviar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>