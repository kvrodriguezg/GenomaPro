<?php


$directorioActual = __DIR__;
$rutausuario = dirname($directorioActual) . "/Models/usuarioModel.php";
require_once $rutausuario;

//include("../Models/usuarioModel.php");
$objlogin = new usuario();

if (isset($_POST['op']) && $_POST['op'] == "LOGIN") {

        $loginResult = $objlogin->iniciarSesion($usuario, $clave);

        if ($loginResult) {
            $idperfil = $loginResult['idPerfil'];
            $idcentro = $loginResult['IDCentroMedico'];
            // Almacenar valores en la sesión
            $_SESSION['idPerfil'] = $idperfil;
            $_SESSION['idCentro'] = $idcentro;

                     switch ($idperfil) {
                         case 1:
                             header('Location: ../Views/diagnostico.php');
                             break;
                         case 2:
                            header('Location: ../Views/tincion.php');
                             break;
                        case 3:
                            header('Location: ../Views/recepcion.php');
                             break;
                         case 4:
                             header('Location: ../Views/Registro.php');
                            break;
                        case 5:
                             header('Location: ../Views/mantenedorusuarios.php');
                            break;
                        case 6:
                            header('Location: ../Views/centro_medico.php');
                            break;
                         default:
                            header('Location: ../Views/login.php');
                            break;
                     }
                 } else {
                    // Autenticación fallida
                    session_start();
                    $_SESSION['error'] = 'Usuario no existe o clave inválida';
                     header('Location: ../Views/login.php');
                    exit();
                }
            }else {
               
                session_start();
                $_SESSION['error'] = 'Usuario o contraseña incorrectos.';
                header('Location: ../Views/login.php');
                exit();
}
?>