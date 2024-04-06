<?php
$directorioActual = __DIR__;
$ruta = dirname($directorioActual) . "/Models/conexion.php";
require_once $ruta;
class examenesModel
{
    private $db;
    public function __construct()
    {
        //require_once("conexion.php");
        $this->db = Conectarse();
    }

    public function obtenerDatosExamenes()
    {
        $query = "SELECT * FROM Examenes;";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            return $result;
        }
    }

    public function obtenerExamenesDiagnosticos()
    {
        $query = "SELECT * FROM Examenes WHERE IDEstado = (SELECT IDEstado FROM Estados WHERE NombreEstado = 'Listo para Diagnostico')";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            return $result;
        }
    }

    public function obtenerExamenesRegistro()
    {
        $query = "SELECT * FROM Examenes WHERE IDEstado = (SELECT IDEstado FROM Estados WHERE NombreEstado = 'Realizado')";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            return $result;
        }
    }

    public function obtenerExamenesTincion()
    {
        $query = "SELECT * FROM Examenes WHERE IDEstado = (SELECT IDEstado FROM Estados WHERE NombreEstado = 'Listo para Tincion')";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            return $result;
        }
    }

    public function obtenerDomicilioPaciente($rut)
    {
        $query = "SELECT DomicilioPaciente FROM Pacientes WHERE RutPaciente='$rut';";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            $row = mysqli_fetch_array($result);
            return $row['DomicilioPaciente'];
        } else {
            echo "error" . mysqli_error($this->db);
        }
    }

    public function obtenerNombrePaciente($rut)
    {
        $query = "SELECT NombrePaciente FROM Pacientes WHERE RutPaciente='$rut';";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            $row = mysqli_fetch_array($result);
            return $row['NombrePaciente'];
        }
    }

    public function obtenerCentroMedico($idCentroMedico)
    {
        $query = "SELECT NombreCentro FROM CentrosMedicos WHERE IDCentroMedico =$idCentroMedico;";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            $row = mysqli_fetch_array($result);
            return $row['NombreCentro'];
        }
    }

    public function obtenerDiagnostico($codDiagnostico)
    {
        if ($codDiagnostico != null) {
            $query = "SELECT descripcion FROM Diagnosticos WHERE codigo ='$codDiagnostico';";
            $result = mysqli_query($this->db, $query);
            if ($result) {
                $row = mysqli_fetch_array($result);
                return $row['descripcion'];
            } else {
                return "error" . mysqli_query($this->db, $query);
            }
        } else {
            return " ";
        }
    }

    public function obtenerEstados($perfil)
    {
        $query = "SELECT * FROM Estados WHERE IDPerfil = (SELECT IDPerfil FROM Perfiles WHERE TipoPerfil= '$perfil')";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            return $result;
        }
    }

    public function obtenerEstadoActual($idEstado)
    {
        $query = "SELECT NombreEstado FROM Estados WHERE IDEstado = $idEstado;";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            $row = mysqli_fetch_array($result);
            return $row['NombreEstado'];
        }
    }

    public function cambiarEstado($idEstado, $idExamen)
    {
        $query = "UPDATE Examenes SET IDEstado = ? WHERE IDExamen = ?";

        $stmt = mysqli_prepare($this->db, $query);

        mysqli_stmt_bind_param($stmt, "ii", $idEstado, $idExamen);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            return true;
        } else {
            echo "Error: " . mysqli_error($this->db);
            return false;
        }
    }

    public function actualizarTincion($idExamen, $idEstado)
    {
        $fechaTincion = date("Y-m-d H:i:s");
        $query = "UPDATE Examenes SET IDEstado = $idEstado, Fechatincion = '$fechaTincion' WHERE IDExamen = $idExamen;";
        $result = mysqli_query($this->db, $query);
    
        if ($result) {
            return true;
        } else {
            echo "Error: " . mysqli_error($this->db);
            return false;
        }
    }


    public function obtenerListaDiagnosticos()
    {
        $query = "SELECT * FROM Diagnosticos;";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            return $result;
        }
    }
    public function actualizarDiagnostico($idExamen, $diagnostico)
    {
        $fechaDiagnostico = date("Y-m-d H:i:s");
        $query = "UPDATE Examenes SET CodigoDiagnosticos = '$diagnostico', Fechadiagnostico = '$fechaDiagnostico' WHERE IDExamen = $idExamen;";
        $result = mysqli_query($this->db, $query);

        if ($result) {
            return true;
        } else {
            echo "Error: " . mysqli_error($this->db);
            return false;
        }
    }

    public function eliminarRegistro($idExamen)
    {
        $query = "DELETE FROM Examenes WHERE IDExamen = ?";

        $stmt = mysqli_prepare($this->db, $query);

        mysqli_stmt_bind_param($stmt, "i", $idExamen);

        $result = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        if ($result) {
            return true;
        } else {
            echo "Error: " . mysqli_error($this->db);
            return false;
        }
    }
    

}
