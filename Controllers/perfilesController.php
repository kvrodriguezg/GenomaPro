<?php
$directorioActual = __DIR__;
$rutaperfiles = dirname($directorioActual) . "/Models/perfilesModel.php";
require_once $rutaperfiles;


$objPerfil = new Perfiles();


// Creación de perfiles si no existe
if (isset($_POST['crearPerfiles'])) {
    $objPerfil->crearperfiles();
    header("Location: mantenedorPerfiles.php"); 
    exit();
} 

if (isset($_POST['op']) && $_POST['op'] == "GUARDAR" && isset($_POST['tipoPerfil']) ) {

    $tipoPerfil = $_POST['tipoPerfil'];
    $insertarperfil = $objPerfil->insertarPerfil($tipoPerfil);
    if ($insertarperfi) {
        echo '<script>alert("Perfil creado con éxito.");</script>';
    } else {
        echo '<script>alert("Ocurrio un error al crear el perfil.");</script>';
    }

    echo '<script>
            setTimeout(function() {
                window.location.href = "mantenedorPerfiles.php";
            }, 100);
          </script>';
    exit();
}


/* if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['estadoID']))
{
    $boton = "Enviar";
    $id = $_POST['estadoID'];
    if ($id>0){
        $IDEstado= $id;
       $IDPerfil= $obj->buscarCentroPorID($id);
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
} */

// Ver perfiles
$listperfiles = $objPerfil->verPerfiles();

if (isset($_POST['op']) && $_POST['op'] == "ELIMINAR" && isset($_POST['IDPerfil'])) {
    $IDPerfil = $_POST['IDPerfil'];
    $borrarPerfil = $objPerfil->eliminarPerfil($IDPerfil);
    if ($borrarPerfil) {
        echo '<script>alert("Perfil eliminado con éxito.");</script>';
    } else {
        echo '<script>alert("No se pudo eliminar el Perfil.");</script>';
    }

    echo '<script>
            setTimeout(function() {
                window.location.href = "mantenedorPerfiles.php";
            }, 100);
          </script>';
    exit();
}

if (isset($_POST['op']) && $_POST['op'] == "Modificar" && isset($_POST['IDPerfil']) && isset($_POST['TipoPerfil']) ) {
    $IDPerfil = $_POST['IDPerfil'] ?? '';;
    $TipoPerfil = $_POST['TipoPerfil'] ?? '';;
    $editarPerfil = $objPerfil->modificarPerfil($IDPerfil, $TipoPerfil);
   
    if ($editarPerfil) {
        echo '<script>alert("Perfil editado con éxito.");</script>';
    } else {
        echo '<script>alert("Ocurrio un error al editar el Perfil.");</script>';
    }

    echo '<script>
            setTimeout(function() {
                window.location.href = "mantenedorPerfiles.php";
            }, 100);
          </script>';
    exit();

        }