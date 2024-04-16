<?php
//$directorioActual = __DIR__;
//$ruta = dirname($directorioActual) . "/Models/conexion.php";
//require_once $ruta;
require_once("conexion.php");
class diagnosticos
{

    private $db;
    private $Codigo;
    private $descripcion;

    private $diagnosticos;
    public function __construct()
    {
        $this->db = Conectarse();
        $this->diagnosticos = array();
        $this->Codigo = "";
        $this->descripcion = "";
    }

    public function verdiagnosticos()
    {
        $query = "SELECT * FROM Diagnosticos";
        $diagnosticos = mysqli_query($this->db, $query);
        return $diagnosticos;
    }

    public function obtenerDescripcion($codigo)
    {
        $query = "SELECT descripcion FROM Diagnosticos where Codigo='$codigo'";
        $resultado = mysqli_query($this->db, $query);
        if (mysqli_num_rows($resultado) > 0) {

            $fila = mysqli_fetch_assoc($resultado);

            $descripcion = $fila['descripcion'];

            return $descripcion;
        } else {

            return null;
        }
    }

    public function insertarDiagnostico($codigo, $descripcion)
    {
        // Verificar si el código ya existe
        $query = "SELECT * FROM diagnosticos WHERE Codigo = '$codigo'";
        $resultado = mysqli_query($this->db, $query);
        if (mysqli_num_rows($resultado) != 0) {
            echo "<script> alert('Código ya existe.') </script>";
            return "existe"; // Retorna 'existe' si el código ya está en la base de datos
        } else {
            // El código no existe, entonces procedemos con la inserción
            $query = "INSERT INTO Diagnosticos (Codigo, descripcion) VALUES (?, ?)";
            $statement = mysqli_prepare($this->db, $query);
            mysqli_stmt_bind_param($statement, "ss", $codigo, $descripcion);
            $resultado = mysqli_stmt_execute($statement);
            if ($resultado) {
                echo "<script> alert('Diagnóstico Ingresado.') </script>";
                return true; // Retorna true si la inserción es exitosa
            } else {
                echo "<script> alert('Error.') </script>";
                return false; // Retorna false si hay un error en la inserción
            }
        }
    }


    public function editardiagnostico($codigo, $descripcion)
    {

        $query = "UPDATE diagnosticos SET Descripcion='$descripcion' WHERE Codigo='$codigo'";

        if (!mysqli_query($this->db, $query)) {
            echo "<script> alert('Error.') </script>";
            return false;
        } else {
            echo "<script> alert('Diagnóstico Modificado.') </script>";
            return true;
        }
    }

    public function eliminarDiagnostico($codigo)
    {
        $query = "DELETE FROM diagnosticos WHERE Codigo='$codigo'";
        $resultado = mysqli_query($this->db,$query);
        if ($resultado) {
            echo "<script> alert('Diagnóstico Eliminado.') </script>";
            return true; 
        } else {
            echo "<script> alert('Error al eliminar el diagnóstico.') </script>";
            return false; 
        }
    }
}
