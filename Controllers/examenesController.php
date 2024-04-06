<?php
$directorioActual = __DIR__;
$ruta = dirname($directorioActual) . "/Models/examenesModel.php";
require_once $ruta;
//include("../Models/examenesModel.php");
$examen = new examenesModel();
$examenes = $examen->obtenerDatosExamenes();
$examenesTincion = $examen->obtenerExamenesTincion();
$examenesDiagnostico = $examen->obtenerExamenesDiagnosticos();
$examenesRegistro = $examen->obtenerExamenesRegistro();

if (isset($_POST['actualizarEstado'])) {
    $idExamen=$_POST['idExamen'];
    $idEstado=$_POST['estado'];
    $examen->cambiarEstado($idEstado,$idExamen);
    echo "llego aqui";
    header("Location: recepcion.php");
    exit;
}

if (isset($_POST['actualizarEstadoDiagnostico'])) {
    $idExamen=$_POST['idExamen'];
    $idEstado=$_POST['estado'];
    $diagnostico=$_POST['diagnostico'];
    $examen->cambiarEstado($idEstado,$idExamen);
    $examen->actualizarDiagnostico($idExamen,$diagnostico);
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['actualizarEstadoTincion'])) {
    $idExamen=$_POST['idExamen'];
    $idEstado=$_POST['estado'];
    $examen->actualizarTincion($idExamen,$idEstado);
    header("Location: " . $_SERVER['HTTP_REFERER']);
}


if (isset($_POST['eliminarRegistro'])) {
    $idExamen = $_POST['idExamen'];
    $examen->eliminarRegistro($idExamen);
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

  if (isset($_POST['cambiarEstadoMasivo'])) {
      $seleccionados = $_POST['seleccionados'];
      $idEstado = $_POST['estado'];
  
      foreach($seleccionados as $idExamen) {
        $examen->cambiarEstado($idEstado,$idExamen);
       }
  
      header("Location: recepcion.php");
      exit;
  }
 
  if (isset($_POST['cambiarEstadotincion'])) {
    $seleccionados = $_POST['seleccionados'];
    $idEstado = $_POST['estado'];

    foreach($seleccionados as $idExamen) {
      $examen->cambiarEstado($idEstado,$idExamen);
     }

    header("Location: tincion.php");
    exit;
}


if (isset($_POST['cambiarEstadodiagnostico'])) {
    $seleccionados = $_POST['seleccionados'];
    $idEstado=$_POST['estado'];
    $diagnostico=$_POST['diagnostico'];
    foreach($seleccionados as $idExamen) {
    $examen->cambiarEstado($idEstado,$idExamen);
    $examen->actualizarDiagnostico($idExamen,$diagnostico);
    }
    header("Location: diagnostico.php");
    exit;
}

if (isset($_POST['Filtrar'])) {
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];

    header("Location: descargarexcel.php?fechaInicio=$fechaInicio&fechaFin=$fechaFin");

}


