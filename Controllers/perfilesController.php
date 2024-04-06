<?php
$directorioActual = __DIR__;
$rutaperfiles = dirname($directorioActual) . "/Models/perfilesModel.php";
//require_once $rutaperfiles;
include("../Models/perfilesModel.php");
$objPerfil = new Perfiles();

// Creación de perfiles si no existe
if (isset($_POST['crearPerfiles'])) {
    $objPerfil->crearperfiles();
    header("Location: mantenedorPerfiles.php"); 
    exit();
} 

// Insertar perfil 
if (isset($_POST['op']) && $_POST['op'] == "GUARDAR" && isset($_POST['tipoPerfil'])) {
    $tipoPerfil = $_POST['tipoPerfil'];
    $insertarperfil = $objPerfil->insertarPerfil($tipoPerfil);
    if($insertarperfil){
        echo '<div class="alert alert-success" role="alert"> Perfil creado con éxito.</div>';
    }else{
        echo '<div class="alert alert-danger" role="alert"> El perfil no puede ser eliminado, ya que se encuentra anclado a un usuario existente. </div>';
    }
    header("Location: mantenedorPerfiles.php"); 
    exit();
}

// Ver perfiles
$listperfiles = $objPerfil->verPerfiles();

// Eliminar perfil 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['op']) && $_POST['op'] == "eliminar" && isset($_POST['IDPerfil'])) {
    $IDPerfil = $_POST['IDPerfil'];
    $borrarPerfil = $objPerfil->eliminarPerfil($IDPerfil);
    if($borrarPerfil){
        echo '<div class="alert alert-success" role="alert"> Perfil creado con éxito.</div>';
    }else{
        echo '<div class="alert alert-danger" role="alert"> El perfil no puede ser eliminado, ya que se encuentra anclado a un usuario existente. </div>';
    }
    echo '<script>
            setTimeout(function() {
                window.location.href = "mantenedorPerfiles.php";
            }, 100);
          </script>';
    exit();
}

//EDITAR PERFILES
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['op']) && $_POST['op'] == "Modificar" && isset($_POST['IDPerfil']) && isset($_POST['TipoPerfil'])) {
    $IDPerfil = $_POST['IDPerfil'];
    $TipoPerfil = $_POST['TipoPerfil'];
    $editarPerfil = $objPerfil->modificarPerfil($IDPerfil, $TipoPerfil);
    header("Location: mantenedorPerfiles.php");
}


//require_once '../Views/mantenedorPerfiles.php';
?>
