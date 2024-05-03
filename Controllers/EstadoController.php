<?php
$directorioActual = __DIR__;
$ruta = dirname($directorioActual) . "/Models/estados_model.php";
require_once $ruta;

$rutap = dirname($directorioActual) . "/Models/perfilesModel.php";
require_once $rutap;
$objetoEstado = new Estados();
$objetoPerfiles = new perfiles();
$DetalleEstados = $objetoEstado->MostrarEstados();
$DetallePerfiles = $objetoPerfiles->verPerfiles();

/* if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']))
{
    $boton = "Enviar";
    $id = $_POST['estadoID'];
    if ($id>0){
        $idEstados= $id;
        $esta = $objetoEstado->buscarEstadoPorID($id);
        $codigo = $bjetoPerfiles->;
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
//nuevo
if (isset($_POST['op']) && $_POST['op'] == "GUARDAR" && isset($_POST['NombreEstado']) && isset($_POST['Perfil']) && isset($_POST['usuario']) && isset($_POST['clave']) ) {

    $nombre = $_POST['nombre'] ?? '';
    $rut = $_POST['rut'] ?? '';
    $usuario = $_POST['usuario'] ?? '';
    $clave = $_POST['clave'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $perfil = $_POST['perfil'] ?? '';
    $centro = $_POST['centro'] ?? '';
    $op = $_POST['op'] ?? '';
    $insertar = $objetoEstado->InsertaEstado($nuevoEstado,$nuevoPerfil);
    if ($insertar) {
        echo '<script>alert("Usuario creado con éxito.");</script>';
    } else {
        echo '<script>alert("Ocurrio un error al crear el usuario.");</script>';
    }

    echo '<script>
            setTimeout(function() {
                window.location.href = "mantenedorusuarios.php";
            }, 100);
          </script>';
    exit();
}


// Eliminar perfil 
if (isset($_POST['op']) && $_POST['op'] == "eliminar" && isset($_POST['IDEstado'])) {
    $IDEstado = $_POST['IDEstado'];
    $borrarestado = $objetoEstado->EliminaEstado($IDEstado);
    if ($borrarestado) {
        echo '<script>alert("Usuario eliminado con éxito.");</script>';
    } else {
        echo '<script>alert("No se pudo eliminar el usuario.");</script>';
    }

    echo '<script>
            setTimeout(function() {
                window.location.href = "mantenedoestado.php";
            }, 100);
          </script>';
    exit();
}



if (isset($_POST['op']) && $_POST['op'] == "Modificar" && isset($_POST['IDEstado']) && isset($_POST['NombreEstado'])&& isset($_POST['IdPerfil'])) {
    $IDEstado= $_POST['IDEstado'] ?? '';
    $NombreEstado = $_POST['NombreEstado'] ?? '';
    $IdPerfil=$_POST['Perfil']??'';
    $op = $_POST['op'] ?? '';
    $insertar = $objetoEstado-> ModificarEstado( $nuevoEstado,$nuevoPerfil,$idEstados);
    if ($insertar) {
        echo '<script>alert("Usuario editado con éxito.");</script>';
    } else {
        echo '<script>alert("Ocurrio un error al editar el usuario.");</script>';
    }

    echo '<script>
            setTimeout(function() {
                window.location.href = "mantenedorusuarios.php";
            }, 100);
          </script>';
    exit();
}