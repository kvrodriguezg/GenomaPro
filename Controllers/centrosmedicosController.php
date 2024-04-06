<?php
$directorioActual = __DIR__;
$ruta = dirname($directorioActual) . "/Models/centromedicoModel.php";
require_once $ruta;
//include("../Models/centromedicoModel.php");
$objCentros = new centromedico();

// Creación de CENTRO si no existe
if (isset($_POST['crearcentros'])) {
    $objCentros->crearCentros();
} 

$listCentros = $objCentros->verCentros();

if (isset($_POST['op']) && $_POST['op'] == "GUARDAR" && isset($_POST['nombreCentro']) && isset($_POST['CodigoCentro'])) {
    $nombreCentro = $_POST['nombreCentro'];
    $CodigoCentro = $_POST['CodigoCentro'];
    $insertarCentro = $objCentros->insertarCentro($nombreCentro,$CodigoCentro);
    if ($insertarCentro) {
        echo '<script>alert("Centro creado con éxito.");</script>';
    } else {
        echo '<script>alert("No se pudo crear el centro.");</script>';
    }
   echo '<script>
           setTimeout(function() {
               window.location.href = "mantenedorlaboratorios.php";
           }, 100);
         </script>';
   exit();
}


//EDITAR CENTRO
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['op']) && $_POST['op'] == "Modificar" && isset($_POST['IDCentroMedico']) && isset($_POST['NombreCentro']) && isset($_POST['codigo'])) {
    $nombreCentro = $_POST['NombreCentro'];
    $CodigoCentro = $_POST['codigo'];
    $IDCentroMedico = $_POST['IDCentroMedico'];
    $editarCentro = $objCentros->modificarCentro($IDCentroMedico,$nombreCentro,$CodigoCentro);
    if ($editarCentro) {
        echo '<script>alert("Centro editado con éxito.");</script>';
    } else {
        echo '<script>alert("No se pudo editar el Centro.");</script>';
    }
   echo '<script>
           setTimeout(function() {
               window.location.href = "mantenedorlaboratorios.php";
           }, 100);
         </script>';
   exit();
}



// Eliminar IDCentroMedico 
if (isset($_POST['op']) && $_POST['op'] == "ELIMINAR" && isset($_POST['IDCentroMedico'])) {
    $IDCentroMedico = $_POST['IDCentroMedico'];
    $borrarCentro = $objCentros->eliminarCentro($IDCentroMedico);
    if ($borrarCentro) {
        echo '<script>alert("Centro médico eliminado con éxito.");</script>';
    } else {
        echo '<script>alert("No se pudo eliminar el Centro médico.");</script>';
    }
   echo '<script>
           setTimeout(function() {
               window.location.href = "mantenedorlaboratorios.php";
           }, 100);
         </script>';
   exit();
}