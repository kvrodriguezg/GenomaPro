<?php

require_once("../Models/diagnosticoModel.php");
$objdiagnostico = new diagnosticos();

$codigo = "";
$descripcion = "";
if (isset($_POST['codigo'])) {
    if ($_POST['codigo'] != 0) {
        $codigo = $_POST['codigo'];
        $valorcodigo = $_POST['codigo'];
        $descripcion = $objdiagnostico->obtenerDescripcion($codigo);
        $operacion = "modificar";
        $readonly = "readonly";
        $boton = "Modificar";
        $titulo = "Editar:";
    } else if ($_POST['codigo'] == 0) {
        $codigo = 0;
        $valorcodigo = "";
        $descripcion = "";
        $operacion = "insertar";
        $boton = "Ingresar";
        $readonly = "";
        $titulo = "Nuevo Diagnóstico:";
    }
}

if (isset($_POST['operacion'])) {
    $operacion = $_POST['operacion'];
    $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";

    if ($operacion == "insertar")
    {
        $objdiagnostico->insertarDiagnostico($codigo,$descripcion);
    }
    else if ($operacion == "modificar")
    {
        $objdiagnostico->editarDiagnostico($codigo,$descripcion);
    }
    else if ($operacion == "eliminar")
    {
        //$codigoEliminar = isset($_POST['codigoEliminar']) ? $_POST['codigoEliminar'] : "";
        $objdiagnostico->eliminarDiagnostico($codigo);
    }
}

$diagnosticos = $objdiagnostico->verdiagnosticos();
