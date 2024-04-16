<?php
$directorioActual = __DIR__;
$ruta = dirname($directorioActual) . "../Models/centromedicoModel.php";
require_once $ruta;
//include("../Models/centromedicoModel.php");
$objCentros = new CentroMedico();

// Creación de CENTRO si no existe
if (isset($_POST['crearcentros'])) {
    $objCentros->crearCentros();
} 



if (isset($_POST['operacion']) && $_POST['operacion'] == "Guardar" && isset($_POST['nombreCentro']) && isset($_POST['codigo'])) {
    $nombreCentro = $_POST['nombreCentro'];
    $codigoCentro = $_POST['codigo'];
    $insertarCentro = $objCentros->insertarCentro($nombreCentro,$codigoCentro);
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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['operacion']) && $_POST['operacion'] == "Modificar" && isset($_POST['IDCentroMedico']) && isset($_POST['nombreCentro']) && isset($_POST['codigo'])) {
    $nombreCentro = $_POST['nombreCentro'];
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']))
{
    $boton = "Enviar";
    $id = $_POST['id'];
    if ($id>0){
        $IDCentroMedico = $id;
        $centros = $objCentros->buscarCentroPorID($id);
        $codigo = $centros['codigo'];
        $nombreCentro = $centros['NombreCentro'];
        $operacion = "Modificar";
        $titulo = "Editar:";
    }
    else if ($id==0)
    {
        $IDCentroMedico = 0;
        $codigo = "";
        $nombreCentro = "";
        $operacion = "Guardar";
        $titulo = "Nuevo Centro Médico:";
    }
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

$listCentros = $objCentros->verCentros();