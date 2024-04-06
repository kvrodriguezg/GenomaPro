<?php
//$directorioActual = __DIR__;
//$rutaexamenes = dirname($directorioActual) . "/Models/creacionexamenModel.php";
//require_once $rutaexamenes;

include "../Models/creacionexamenModel.php";

$examen = new ExamenModel();  
$centrosmedicos=$examen->obtenerCentrosmedicos();


if (!empty($_POST["ingreso"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["domicilio"]) && !empty($_POST["rut"]) && !empty($_POST["nombreexamen"]) && !empty($_POST["fechamuestra"])){
        $nombre = $_POST["nombre"];
        $domicilio = $_POST["domicilio"];
        
        $nombreexamen = $_POST["nombreexamen"];
        $fechamuestra = $_POST["fechamuestra"];
        $fecharecepcion = $_POST["fecharecepcion"];
        $idcentrosoli = $_POST["idcentrosoli"];
        
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
            if ($existePaciente==false) {
                $examen->insertarPaciente($nombre, $domicilio, $rut);
                $examen->insertarExamen($nombreexamen, $rut, $idcentrosoli, $fechamuestra, $fecharecepcion);
                echo '<script>alert("Paciente registrado correctamente");</script>';
                header("Location: recepcion.php"); 
            } else{
                $examen->insertarExamen($nombreexamen, $rut, $idcentrosoli, $fechamuestra, $fecharecepcion);
                echo '<script>alert("Paciente ya existe. Se ha registrado el examen.");</script>';
                header("Location: recepcion.php"); 
            }
        }
    } else {
        echo '<script>alert("Algunos campos están vacíos");</script>';
    }
}

?>
