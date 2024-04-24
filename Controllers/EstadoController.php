<?php
$directorioActual = __DIR__;
$ruta = dirname($directorioActual) . "/Models/estados_model.php";
require_once $ruta;

$rutap = dirname($directorioActual) . "/Models/perfilesModel.php";
require_once $rutap;

echo "LLEGO AQUI 1";
$objetoEstado = new Estados();
echo "LLEGO AQUI 2";
$objetoPerfiles = new perfiles();
echo "LLEGO AQUI 3";
$DetalleEstados = $objetoEstado->MostrarEstados();
echo "LLEGO AQUI 4";
$DetallePerfiles = $objetoPerfiles->verPerfiles();

if  (isset($_POST['NombreEstado'])) {
    $NombreEstado = $_POST['NombreEstado'];
    $IDPerfil = $_POST['IDPerfil'];
    $insertarEstado = $objetoEstado->InsertaEstado($NombreEstado,$IDPerfil);

    $mensaje="Estado Creado Correctamente";

    header("Location: mantenedorestados.php?mensaje=".urlencode($mensaje)); 
    exit();
}



if  (isset($_POST['AgregaNEstado'])) {
    $AgregaNEstado = $_POST['AgregaNEstado'];
    $perfilSelecionado = $_POST['IDPerfil'];
    $IDEstado = $_POST['IDEstado'];
    $EditarEstado = $objetoEstado->ModificarEstado($AgregaNEstado,$perfilSelecionado,$IDEstado);


    $mensaje="Estado Modificado Correctamente";
    
    header("Location: mantenedorestados.php?mensaje=".urlencode($mensaje));
    exit();
}


if  (isset($_POST['IDEstado'])) {
    $AgregaNEstado = $_POST['IDEstado'];
    $EliminaEstado = $objetoEstado->EliminaEstado($AgregaNEstado);

    $mensaje="Estado Eliminado Correctamente";
    
    header("Location: mantenedorestados.php?mensaje=".urlencode($mensaje));
    exit();
}


