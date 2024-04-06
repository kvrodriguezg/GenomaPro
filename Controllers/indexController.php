<?php
$directorioActual = __DIR__;
$usuarioModel = dirname($directorioActual) . "/Models/existetablaModel.php";
require_once $usuarioModel;
$existe = new ExisteTabla();
$tablas = ["Perfiles", "Usuarios", "Estados", "CentrosMedicos", "Examenes", "Diagnosticos", "Pacientes"];
$validacionExistencia = true;

foreach ($tablas as $tabla) {
    $query = $existe->comprobarTabla($tabla);
    if (!$query) {
        $validacionExistencia = false;
    }
}

//Creacion de tablas si no existen.
if (isset($_POST['crearTabla'])) {
    $existe->crearTablas();
    $existe->crearCentros();
    $existe->crearDiagnosticos();
    $existe->crearPerfiles();
    $existe->crearEstados();
    if (!$existe->comprobarAdmin()) {
        $existe->crearUsuarioAdmin();
    }
    $validacionExistencia = true;
    echo '<div class="alert alert-success d-flex aling-items-center" role="alert">Base de Dato Creada Exitosamente!!</div>';
    return ("../index.php");
}

if ($existe->comprobarTabla("Usuarios")) {
    if (!$existe->comprobarAdmin()) {
        $validacionExistencia = false;
    }
}