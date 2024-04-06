<?php
//$directorioActual = __DIR__;
//$ruta = dirname($directorioActual) . "/Models/conexion.php";
//require_once $ruta;
        require_once("conexion.php");
class diagnosticos{

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

    public function verdiagnosticos(){
        $query = "SELECT * FROM Diagnosticos";
        $diagnosticos = mysqli_query($this->db, $query);
        return $diagnosticos;
    } 


}