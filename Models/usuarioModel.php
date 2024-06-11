<?php
$directorioActual = __DIR__;
$ruta = dirname($directorioActual) . "/Models/conexion.php";
require_once $ruta;

class usuario
{
    private $db;
    private $usuario;
    private $user;
    private $userLogin;
    private $centrosarray;

    public function __construct()
    {
        $this->db = Conectarse();
        $this->usuario = array();
        $this->user = array();
        $this->userLogin = array();
        $this->centrosarray = array();
    }

    public function verUsuarios()
    {
        $consulta = mysqli_query($this->db, "SELECT * FROM Usuarios");
        while ($filas = mysqli_fetch_array($consulta)) {
            $this->usuario[] = $filas;
        }
        return $this->usuario;
    }

    public function buscarPerfil($nombrePerfil)
    {
        $consulta = mysqli_query($this->db, "SELECT IDPerfil FROM Perfiles WHERE TipoPerfil = '$nombrePerfil'");
        $idperfil = mysqli_fetch_array($consulta);
        return $idperfil;
    }

    public function buscarPerfiles()
    {
        $perfiles = array();
        $consulta = mysqli_query($this->db, "SELECT * FROM Perfiles");
        while ($perfil = mysqli_fetch_array($consulta)) {
            $perfiles[] = $perfil;
        }
        return $perfiles;
    }

    public function buscarCentros()
    {
        $centros = array();
        $consulta = mysqli_query($this->db, "SELECT * FROM CentrosMedicos");
        while ($centro = mysqli_fetch_array($consulta)) {
            $centros[] = $centro;
        }
        return $centros;
    }

    public function buscarcentro($nombreCentro)
    {
        $consulta = mysqli_query($this->db, "SELECT IDCentroMedico FROM CentrosMedicos WHERE NombreCentro = '$nombreCentro'");
        $idcentro = mysqli_fetch_array($consulta);
        return $idcentro;
    }

    public function verCentrosarray()
    {
        $consulta = mysqli_query($this->db, "select NombreCentro from CentrosMedicos;");
        while ($filas = mysqli_fetch_array($consulta)) {
            $this->centrosarray[] = $filas;
        }
        return $this->centrosarray;
    }

    public function insertarUsuario($usuario, $nombre, $correo, $rut, $clave, $perfil, $centro)
    {
        $idperfil = $this->buscarPerfil($perfil);
        $idcentro = $this->buscarcentro($centro);

        // Verificar si ya existe un usuario con la misma llave foránea
        $existingUser = $this->buscarUsuarioPorLlaveForanea($rut);
        if ($existingUser) {
            return false;
        } else {
            $query = "INSERT INTO Usuarios (usuario, Nombre, Correo, Rut, Clave, IDPerfil, IDCentroMedico) VALUES ('$usuario', '$nombre', '$correo', '$rut', '$clave', {$idperfil['IDPerfil']}, {$idcentro['IDCentroMedico']})";

            if (mysqli_query($this->db, $query)) {
                return true;
            } else {
                return false;
            }
        }
    }

    private function buscarUsuarioPorLlaveForanea($rut)
    {
        $query = "SELECT * FROM Usuarios WHERE Rut = '$rut'";
        $result = mysqli_query($this->db, $query);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarUsuario($IDUsuario)
    {
        $query = "DELETE FROM Usuarios WHERE IDUsuario=$IDUsuario";
        if (mysqli_query($this->db, $query)) {
            return true;
        } else {
            return false;
        }
    }

    public function buscarUsuario($IDUsuario)
    {
        $consulta = mysqli_query($this->db, "SELECT * FROM Usuarios where IDUsuario=$IDUsuario");
        while ($filas = mysqli_fetch_array($consulta)) {
            $this->user[] = $filas;
        }
        return $this->user;
    }

    public function buscarUsuarioporID($IDUsuario)
    {
        $consulta = mysqli_query($this->db, "SELECT * FROM Usuarios where IDUsuario=$IDUsuario");
        $Usuario = mysqli_fetch_array($consulta);
        return $Usuario;
    }

    public function buscarPerfilId($IDPerfil)
    {
        $consulta = mysqli_query($this->db, "SELECT TipoPerfil FROM Perfiles WHERE IDPerfil = $IDPerfil");
        $TipoPerfil = mysqli_fetch_array($consulta);
        return $TipoPerfil;
    }

    public function buscarcentroID($IDCentroMedico)
    {
        $consulta = mysqli_query($this->db, "SELECT NombreCentro FROM CentrosMedicos WHERE  IDCentroMedico = '$IDCentroMedico'");
        $NombreCentro = mysqli_fetch_array($consulta);
        return $NombreCentro;
    }

    public function modificarPerfil($IDUsuario, $usuario, $nombre, $correo, $rut, $clave, $perfil, $centro)
    {
        $idperfil = $this->buscarPerfil($perfil);
        $idcentro = $this->buscarcentro($centro);

        $query = "UPDATE Usuarios SET usuario = '$usuario',Nombre = '$nombre', Correo = '$correo', Rut = '$rut', Clave = '$clave', IDPerfil = {$idperfil['IDPerfil']}, IDCentroMedico = {$idcentro['IDCentroMedico']} WHERE IDUsuario = $IDUsuario";
        if (mysqli_query($this->db, $query)) {
            return true;
        } else {
            return false;
        }
    }

    function iniciarSesion($usuario, $clave)
    {
        $link = Conectarse();

        $query = mysqli_prepare($link, "SELECT usuario, Clave, Correo, idPerfil, IDCentroMedico FROM Usuarios WHERE usuario = ?");

        if ($query) {
            mysqli_stmt_bind_param($query, "s", $usuario);
            mysqli_stmt_execute($query);
            mysqli_stmt_bind_result($query, $resultadoUsuario, $resultadoClave, $correo, $idPerfil, $IDCentroMedico);
            mysqli_stmt_fetch($query);
            mysqli_stmt_close($query);

            if ($resultadoUsuario === $usuario && password_verify($clave, $resultadoClave)) {
                return array('idPerfil' => $idPerfil, 'IDCentroMedico' => $IDCentroMedico, 'correo' => $correo);
            }
        } else {
            return false;
        }
    }
}
?>
