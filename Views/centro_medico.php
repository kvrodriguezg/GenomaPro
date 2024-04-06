<?php
$directorioActual = __DIR__;
$rutacentro = dirname($directorioActual) . "/Controllers/centroController.php";
require_once $rutacentro;
//require_once("../Controllers/centroController.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />
    <title>Centro Médico</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="../css/prueba.css">
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css" />
    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet" type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <!--font awesome con CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>
    <header class="navbar navbar-light fixed-top" style="background-color: #9CD0FE;">
        <?php
        include("menu.php");
        ?>
    </header>


    <div style="height: 50px;">
        <div class="container">
            <h2 class="titulo">
                <br><br><?php echo " Centro M&eacute;dico $nombreCentro"; ?>
            </h2><br><br>
            <div class="row">
                <div class="col-lg-12">
                    <table id="pruebas" class="table table-striped table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Rut</th>
                                <th>Fecha de Toma</th>
                                <th>Fecha de orden</th>
                                <th>Nombre de Ex&aacute;men</th>
                                <th>Estado</th>
                                <th>Ver Diagn&oacute;stico</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listExamenes as $list) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $list['NombrePaciente']; ?>
                                    </td>
                                    <td>
                                        <?php echo $list['NombreExamen']; ?>
                                    </td>
                                    <td>
                                        <?php echo $list['RutPaciente']; ?>
                                    </td>
                                    <td>
                                        <?php echo $list['FechaTomaMuestra']; ?>
                                    </td>
                                    <td>
                                        <?php echo $list['FechaRecepcion']; ?>
                                    </td>
                                    <td>
                                        <?php echo $list['NombreEstado']; ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <button type="button" class="btn btn-outline-danger" 
                                <?php if($list['IDEstado']==4) {?>                               
                                        onclick="window.open('generar_pdf.php?id=<?php echo $list['IDExamen']; ?>', '_blank');">
                                        <img src="../img/pdf.png" alt="Icono PDF">
                                        <?php } else {?>
                                        ><img src="../img/pdf.png" alt="Icono PDF">
                                        <?php
                                        }
                                        ?>
                                        </button>
                                    </td>

                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../jquery/jquery-3.3.1.min.js"></script>
    <script src="../popper/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <!-- datatables JS -->
    <script type="text/javascript" src="../datatables/datatables.min.js"></script>

    <!-- para usar botones en datatables JS -->
    <script src="../datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="../datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="../datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="../datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="../datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

    <!-- código JS propìo-->
    <script type="text/javascript" src="../js/data.js"></script>

</body>

</html>