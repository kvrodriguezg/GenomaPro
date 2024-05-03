<?php
$directorioActual = __DIR__;
$rutausuario = dirname($directorioActual) . "/Models/usuarioModel.php";
$rutaModel = dirname($directorioActual) . "/Models/perfilesModel.php";
require_once $rutausuario;
require_once $rutaModel;
$objusuario = new usuario();
$objPerfil = new Perfiles();

$listusuarios = $objusuario->verUsuarios();
$listperfiles = $objPerfil->vertipoPerfiles();
$listcentros = $objusuario->verCentrosarray();

if (isset($_POST['op']) && $_POST['op'] == "GUARDAR" && isset($_POST['nombre']) && isset($_POST['rut']) && isset($_POST['usuario']) && isset($_POST['clave']) && isset($_POST['correo']) && isset($_POST['perfil']) && isset($_POST['centro'])) {

    $nombre = $_POST['nombre'] ?? '';
    $rut = $_POST['rut'] ?? '';
    $usuario = $_POST['usuario'] ?? '';
    $clave = $_POST['clave'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $perfil = $_POST['perfil'] ?? '';
    $centro = $_POST['centro'] ?? '';
    $op = $_POST['op'] ?? '';
    $insertar = $objusuario->insertarUsuario($usuario, $nombre, $correo, $rut, $clave, $perfil, $centro);
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
if (isset($_POST['op']) && $_POST['op'] == "eliminar" && isset($_POST['IDUsuarioEliminar'])) {
    $IDUsuario = $_POST['IDUsuarioEliminar'];
    $borrarusuario = $objusuario->eliminarUsuario($IDUsuario);
    if ($borrarusuario) {
        echo '<script>alert("Usuario eliminado con éxito.");</script>';
    } else {
        echo '<script>alert("No se pudo eliminar el usuario.");</script>';
    }

    echo '<script>
            setTimeout(function() {
                window.location.href = "mantenedorusuarios.php";
            }, 100);
          </script>';
    exit();
}


if (isset($_POST['op']) && $_POST['op'] == "Modificar" && isset($_POST['IDUsuario']) && isset($_POST['nombre']) && isset($_POST['rut']) && isset($_POST['usuario']) && isset($_POST['clave']) && isset($_POST['correo']) && isset($_POST['perfil']) && isset($_POST['centro'])) {
    $IDUsuario = $_POST['IDUsuario'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $rut = $_POST['rut'] ?? '';
    $usuario = $_POST['usuario'] ?? '';
    $clave = $_POST['clave'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $perfil = $_POST['perfil'] ?? '';
    $centro = $_POST['centro'] ?? '';
    $op = $_POST['op'] ?? '';
    $insertar = $objusuario->modificarPerfil($IDUsuario, $usuario, $nombre, $correo, $rut, $clave, $perfil, $centro);
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