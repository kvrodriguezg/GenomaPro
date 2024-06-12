<?php
session_start();
function verificarAcceso($perfilesPermitidos) {
    if (!isset($_SESSION['idPerfil'])) {
        header('Location: login.php');
        exit();
    }
}
