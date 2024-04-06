<?php
$directorioActual = __DIR__;
$ruta = dirname($directorioActual) . "/Models/conexion.php";
require_once $ruta;

class Estados
{
    private $db;
    private $Estados;
    public function __construct()
    {
        $this->db = Conectarse();
        $this->Estados = array();
    }

    public function InsertaEstado($nuevoEstado,$nuevoPerfil)
    {
        $consulta="insert into Estados (NombreEstado, IDPerfil) values (?,?)";
        if ($stmt = mysqli_prepare($this->db, $consulta)) {
            mysqli_stmt_bind_param($stmt, "ss", $nuevoEstado,$nuevoPerfil);
            if (mysqli_stmt_execute($stmt)) {
                 return true;
            } else {
                return false;
            }
        }

    }

    public function MostrarEstados()
    {
        $consulta=mysqli_query($this->db,"select * from Estados");
        while ($filas = mysqli_fetch_assoc($consulta)) {
            $this->Estados[] = $filas;
        }
        return $this->Estados;
    }

 

    public function ModificarEstado($nuevoEstado,$nuevoPerfil,$idEstados)
    {
        
        $consulta="update Estados set NombreEstado=?, IDPerfil=? where IDEstado=?";
        if ($stmt = mysqli_prepare($this->db, $consulta)) {
            mysqli_stmt_bind_param($stmt, "ssi", $nuevoEstado,$nuevoPerfil,$idEstados);
            if (mysqli_stmt_execute($stmt)) {
                return true;
            } else {
                return false;
            }

        }

    }

    public function EliminaEstado($idEstado)
    {
        $ordenEliminar="delete from Estados where IDEstado=?;";
        if ($stmt = mysqli_prepare($this->db, $ordenEliminar)) {
            mysqli_stmt_bind_param($stmt, "s", $idEstado);
            if (mysqli_stmt_execute($stmt)) {
                return true;
            } else {
                return false;
            }

        }
    }
}
