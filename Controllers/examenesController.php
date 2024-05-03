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
$centrosmedicos = $examen->obtenerCentrosmedicos();

if (isset($_POST['actualizarEstado'])) {
    $idExamen = $_POST['idExamen'];
    $idEstado = $_POST['estado'];
    $examen->cambiarEstado($idEstado, $idExamen);
    echo "llego aqui";
    header("Location: recepcion.php");
    exit;
}

if (isset($_POST['actualizarEstadoDiagnostico'])) {
    $idExamen = $_POST['idExamen'];
    $idEstado = $_POST['estado'];
    $diagnostico = $_POST['diagnostico'];
    $examen->cambiarEstado($idEstado, $idExamen);
    $examen->actualizarDiagnostico($idExamen, $diagnostico);
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['actualizarEstadoTincion'])) {
    $idExamen = $_POST['idExamen'];
    $idEstado = $_POST['estado'];
    $examen->actualizarTincion($idExamen, $idEstado);
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

    foreach ($seleccionados as $idExamen) {
        $examen->cambiarEstado($idEstado, $idExamen);
    }

    header("Location: recepcion.php");
    exit;
}

if (isset($_POST['cambiarEstadotincion'])) {
    $seleccionados = $_POST['seleccionados'];
    $idEstado = $_POST['estado'];

    foreach ($seleccionados as $idExamen) {
        $examen->cambiarEstado($idEstado, $idExamen);
    }

    header("Location: tincion.php");
    exit;
}


if (isset($_POST['cambiarEstadodiagnostico'])) {
    $seleccionados = $_POST['seleccionados'];
    $idEstado = $_POST['estado'];
    $diagnostico = $_POST['diagnostico'];
    foreach ($seleccionados as $idExamen) {
        $examen->cambiarEstado($idEstado, $idExamen);
        $examen->actualizarDiagnostico($idExamen, $diagnostico);
    }
    header("Location: diagnostico.php");
    exit;
}

if (isset($_POST['Filtrar'])) {
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];

    header("Location: descargarexcel.php?fechaInicio=$fechaInicio&fechaFin=$fechaFin");
}


if (!empty($_POST["ingreso"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["domicilio"]) && !empty($_POST["rut"]) && !empty($_POST["nombreexamen"]) && !empty($_POST["fechamuestra"])) {
        $nombre = $_POST["nombre"];
        $domicilio = $_POST["domicilio"];
        $nombreexamen = $_POST["nombreexamen"];
        $fechamuestra = $_POST["fechamuestra"];
        $fecharecepcion = $_POST["fecharecepcion"];
        $idcentro = $_POST["idcentro"];

        $existePaciente = $examen->validarPaciente($rut);

        $rut = $_POST["rut"];

        $estado = $examen->validarut($rut);

        if ($estado === "MAL") {
            echo '<script>alert("Rut Incorrecto");</script>';
        } else {
            echo '<script>alert("Rut Correcto");</script>';
            if ($existePaciente) {
                $domicilioActual = $examen->obtenerDomicilioPaciente($rut);
                if ($domicilioActual != $domicilio) {
                    $examen->actualizarDomicilioPaciente($rut, $domicilio);
                    echo '<script>alert("Domicilio actualizado correctamente");</script>';
                }
            }
            if ($existePaciente == false) {
                $examen->insertarPaciente($nombre, $domicilio, $rut);
                $examen->insertarExamen($nombreexamen, $rut, $idcentro, $fechamuestra, $fecharecepcion);
                echo '<script>alert("Paciente registrado correctamente");</script>';
                header("Location: recepcion.php");
                exit;
            } else {
                $examen->insertarExamen($nombreexamen, $rut, $idcentro, $fechamuestra, $fecharecepcion);
                echo '<script>alert("Paciente ya existe. Se ha registrado el examen.");</script>';
                header("Location: recepcion.php");
            }
        }
    } else {
        echo '<script>alert("Algunos campos están vacíos");</script>';
    }
}
