<?php 
//$directorioActual = __DIR__;
//$rutaacceso = dirname($directorioActual) . "/Controllers/accesoController.php";
//require_once $rutaacceso;
//
//$directorioActual = __DIR__;
//$rutaexamenes = dirname($directorioActual) . "/Controllers/examenesController.php";
//require_once $rutaexamenes;
////
//$directorioActual = __DIR__;
//$rutahead = $directorioActual . "/Shared/head.php";
//require_once $rutahead;
require_once("../Controllers/examenesController.php");
 include "../Views/Shared/head.php" ;
require_once('../Controllers/accesoController.php');

$perfilesPermitidos = 1;
verificarAcceso($perfilesPermitidos);
?>
<script src="../../js/diagnostico.js"></script>
<link rel="stylesheet" href="../css/prueba.css">
<?php include "menudiagnostico.php" ?>


<body>
    <div style="height: 70px"></div><br><br>
    <div>
        <h2 class="titulo">Diagnóstico</h2>
    </div>
    <section>
        <table id="tableUsers" class="tabla table">
            <thead>
                <tr>
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
                    <th>Estado</th>
                    <th>Cambiar Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($examenesDiagnostico)) { ?>
                    <tr class="table table-striped">
                        <form method="post" action="diagnostico.php">
                            <td><?php echo $row['IDExamen'] ?></td>
                            <td><?php echo $examen->obtenerNombrePaciente($row['RutPaciente']) ?></td>
                            <td><?php echo $examen->obtenerDomicilioPaciente($row['RutPaciente']) ?></td>
                            <td><?php echo $examen->obtenerCentroMedico($row['IDCentroSolicitante']) ?></td>
                            <td><?php echo $row['NombreExamen'] ?></td>
                            <td><?php echo $row['FechaTomaMuestra'] ?></td>
                            <td><?php echo $row['Fechatincion'] ?></td>
                            <td><?php echo $row['Fechadiagnostico'] ?></td>
                            <td><?php echo $examen->obtenerDiagnostico($row['CodigoDiagnosticos']); ?></td>
                            <td>
                                <select class="form-select" style="width: 150px" name="diagnostico" required>
                                    <?php
                                    $diagnosticos = $examen->obtenerListaDiagnosticos();

                                    while ($row1 = mysqli_fetch_array($diagnosticos)) {
                                        echo '<option value="' . $row1['Codigo'] . '">' . $row1['descripcion'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            <td><?php echo $examen->obtenerEstadoActual($row['IDEstado']); ?></td>

                            <td>
                                <select class="form-select" style="width: 150px" name="estado" required>
                                    <?php
                                    $resultadoEstados = $examen->obtenerEstados('diagnostico');

                                    while ($row1 = mysqli_fetch_array($resultadoEstados)) {
                                        echo '<option value="' . $row1['IDEstado'] . '">' . $row1['NombreEstado'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <!-- <a href="generar_pdf.php" class="btn w-100 m-1 btn-danger" >Ver PDF</a>  -->
                                <input type="hidden" name="idExamen" value=<?php echo $row['IDExamen'] ?>>
                                <input name="actualizarEstadoDiagnostico" type="submit" class="btn w-100 m-1 btn-success"></input>
                            </td>
                        </form>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</body>
<?php include "../views/Shared/scripts.php" ?>

</html>