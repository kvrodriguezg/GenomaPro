<?php 
//directorioActual = __DIR__;
//rutaacceso = dirname($directorioActual) . "/Controllers/accesoController.php";
//equire_once $rutaacceso;
//
//directorioActual = __DIR__;
//rutaexamenes = dirname($directorioActual) . "/Controllers/examenesController.php";
//equire_once $rutaexamenes;

require_once("../Controllers/examenesController.php"); 
 include "../Views/Shared/head.php" ;
require_once('../Controllers/accesoController.php');

$perfilesPermitidos = 1;
verificarAcceso($perfilesPermitidos);

$seleccionados = $_POST['seleccionados'] ?? "";
$idEstado = $_POST['estado'] ?? "";
$diagnostico = $_POST['diagnostico'] ?? "";
?>

<?php include "menudiagnostico.php" ?>

<body>
    <div style="height: 70px"></div><br><br>
    <h1>Cambio de Estado Masivo</h1><br>  
    <br>
    <br>
    <section>
    <form method="post" action="cambiarestadodiagnostico.php">
            <select class="form-select" style="width: 150px" name="estado" required>
                <?php
                $resultadoEstados = $examen->obtenerEstados('diagnostico');
                while ($row1 = mysqli_fetch_array($resultadoEstados)) {
                    echo '<option value="' . $row1['IDEstado'] . '">' . $row1['NombreEstado'] . '</option>';
                }
                ?>
            </select>
            <select class="form-select" style="width: 150px" name="diagnostico" required>
                                    <?php
                                    $diagnosticos = $examen->obtenerListaDiagnosticos();

                                    while ($row1 = mysqli_fetch_array($diagnosticos)) {
                                        echo '<option value="' . $row1['Codigo'] . '">' . $row1['descripcion'] . '</option>';
                                    }
                                    ?>
                                </select>
            <button type="submit" class="btn btn-primary" name="cambiarEstadodiagnostico">Cambiar Estado Masivo</button>
            <br><br>
            <div class="row">
                <div class="col-m-12">

                    <table id="pruebas4" class="tabla-recepcion">
                        <thead>
                            <tr>
                                <th>Seleccionar</th>
                                <th>ID Examen</th>
                                <th>Nombre Paciente</th>
                                <th>Domicilio</th>
                                <th>Laboratorio</th>
                                <th>Examen</th>
                                <th>F. Toma de Muestra</th>
                                <th>F. de Tinción</th>
                                <th>F. Diagnóstico</th>
                                <th>Diagnóstico</th>
                                <th>Cod. Diagnóstico</th>
                                <th>Estado Actual</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($examenesDiagnostico)) { ?>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox" name="seleccionados[]"
                                            value="<?php echo $row['IDExamen']; ?>" id="flexCheckIndeterminate">
                                    </td>
                                    <td>
                                        <?php echo $row['IDExamen'] ?>
                                    </td>
                                    <td>
                                        <?php echo $examen->obtenerNombrePaciente($row['RutPaciente']) ?>
                                    </td>
                                    <td>
                                        <?php echo $examen->obtenerDomicilioPaciente($row['RutPaciente']) ?>
                                    </td>
                                    <td>
                                        <?php echo $examen->obtenerCentroMedico($row['IDCentroSolicitante']) ?>
                                    </td>
                                    <td>
                                        <?php echo $row['NombreExamen'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['FechaTomaMuestra'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Fechatincion'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Fechadiagnostico'] ?>
                                    </td>
                                    <td>
                                        <?php echo $examen->obtenerDiagnostico($row['CodigoDiagnosticos']); ?>
                                    </td>
                                    <td>
                                        <?php echo $row['CodigoDiagnosticos']; ?>
                                    </td>
                                    <td>
                                        <?php echo $examen->obtenerEstadoActual($row['IDEstado']); ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br><br>
                </div>
            </div>
        </form>
    </section>
</body>
<?php include "../views/Shared/scripts.php" ?>

</html>