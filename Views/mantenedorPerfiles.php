<?php
$directorioActual = __DIR__;
$rutaperfiles = dirname($directorioActual) . "/Controllers/perfilesController.php";
require_once $rutaperfiles;

$op = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inicializar variables para evitar advertencias de 'undefined'
    $IDPerfil = $TipoPerfil = '';

    // Asignar valores si están definidos
    $IDPerfil = isset($_POST['IDPerfil']) ? $_POST['IDPerfil'] : '';
    $TipoPerfil = isset($_POST['TipoPerfil']) ? $_POST['TipoPerfil'] : '';
    $op = isset($_POST['op']) ? $_POST['op'] : '';

    if ($op == 'EDITAR') {
        // Redirigir a la página de edición con parámetros
        header("Location: editarperfil.php?IDPerfil=$IDPerfil&TipoPerfil=$TipoPerfil");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/prueba.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" type="image/svg+xml" href="/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="../css/nav.css">
    <title>Document</title>
</head>

<header class="navbar navbar-light fixed-top" style="background-color: #FFFFFF;">
    <?php
    include("../Views/Shared/nav.php");
    ?>
</header>
<br><br><br><br><br>

<body class="text-center" style="background-color: #E7E7E7; font-family: 'Montserrat';">
    <div style="width:100%; display:flex; justify-content:center;">
        <div style="width: 80px; height: 80px; border-radius: 100%; background-color: #023E73; display: flex; justify-content: center; align-items: center; position: relative;" class="text-center">
            <div style="position: absolute; z-index: 10;">
                <div style="position: absolute; z-index: 10;">
                    <button type='button' style="color: #000000; position: absolute; left: 4px; top: 0;" class='btn center-block text-center btn-editar-perfil' data-bs-toggle='modal' data-perfil-id=0 data-bs-target='#editar_Modal_0'>
                        <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                    </button>
                </div>
            </div>
            <i class="fa-solid fa-users fa-2xl" style="color: #FFFFFF;"></i>
        </div>
    </div>
    <br><br><br>

    <style>
        .table thead th {
            background-color: #023E73;
            color: white;
            text-decoration: none;
            font-weight: lighter;
            text-align: center;
        }

        .table-container {
            display: flex;
            justify-content: center;
        }
    </style>
    <div class="table-container">
        <div class="col-lg-11">
            <table id="tableUsers" class="table table-responsive">
                <thead>
                    <tr>
                        <th>ID Perfil</th>
                        <th>Tipo Perfil</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody style="text-align:center; background-color: #FFFFFF">
                    <?php
                    foreach ($listperfiles as $registro) {
                    ?>
                        <tr>
                            <td><?php echo $registro['IDPerfil']; ?></td>
                            <td><?php echo $registro['TipoPerfil']; ?></td>
                            <td>
                                <button style="margin-top: 10px" type='button' style="color: #000000" class='btn center-block text-center btn-editar-perfil' data-bs-toggle='modal' data-perfil-id=<?php echo $registro['IDPerfil'] ?> data-bs-target='#editar_Modal_<?php echo $registro['IDPerfil'] ?>'>
                                    <i class="fa-solid fa-2xl fa-pen-to-square" style="color: #023059;"></i>
                                </button>
                            </td>
                            <td>
                                <form method="post" action="" class="eliminarForm">
                                    <input type="hidden" name="op" id="op" value="eliminar">
                                    <input type="hidden" name="IDPerfil" value=<?php echo $registro['IDPerfil'] ?>>
                                    <button style="margin-top: 10px" type="submit" class="btn"><i class="fa-solid fa-2xl fa-trash" style="color: #023059;"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            </section>
            <script src="https://kit.fontawesome.com/4652dbea50.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <script>
                $(document).ready(function() {
                    $('.btn-editar-perfil').click(function() {
                        var PerfilId = $(this).data('perfil-id');
                        $.ajax({
                            type: 'POST',
                            url: 'modalperfil.php',
                            data: {
                                PerfilId: PerfilId
                            },
                            success: function(response) {
                                $('body').append(response);
                                $('#editar_Modal_' + PerfilId).modal('show'); // Abre el modal con el ID único
                            }
                        });
                    });
                });
            </script>
            <script>
                $('.eliminarform').submit(function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: "¿Está seguro que desea eliminarlo?",
                        showDenyButton: true,
                        confirmButtonText: "SI",
                        denyButtonText: "NO",
                        confirmButtonColor: '#023059'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Si el usuario hace clic en "Si"
                            this.submit();
                        } else if (result.isDenied) {
                            // Si el usuario hace clic en "No"
                            Swal.fire({
                                title: "No se eliminará.",
                                icon: "info",
                                confirmButtonColor: '#023059'
                            });
                        }
                    });
                })
            </script>
            <script src="https://kit.fontawesome.com/4652dbea50.js" crossorigin="anonymous"></script>
</body>

</html>
</body>

</html>