<!DOCTYPE html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$directorioActual = __DIR__;
$rutaacceso = $directorioActual . "/Controllers/indexController.php";
require_once $rutaacceso;
 //require_once("Controllers/indexController.php");
            
            ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" type="image/svg+xml" href="~/favicon.ico" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css/style.css">
    <title>Pagina De Inicio</title>
</head>

<body>
    <!-- SECCION DEL NAVEGADOR NAVBAR -->
    <section class="navbar fixed-top" style="background-color: #0cb9f23c;">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="./img/logo_labmuest.png" alt="" width="190" height="50">
            </a>
            <nav class="nav">
                <ul class="nav">
                    <div class="m-1">
                        <a href="Views/login.php" class="btn w-100 m-1 btn-primary btn-sm ">Inicio de Sesión</a>
                    </div>
                </ul>
            </nav>
            <?php

            if (!$validacionExistencia) {
                echo '
                <nav class="nav">
                <ul class="nav">
                    <div class="m-1">
                        <form method="post" action="index.php">
                            <input type="hidden" name="crearTabla" value="crear">
                            <button class="btn w-100 m-1 btn-primary btn-sm ">Crear Tabla</button>
                        </form>
                    </div>
                </ul>
            </nav>';
            } ?>
        </div>
        <style>
            .icono {
                color: #f1683a;
            }
        </style>
    </section>
    <!-- SECCION DE SLIDER O CARRUSEL DE JAVASCRIPT -->
    <section>
        <div class="carousel">
            <!-- list item -->
            <div class="list">
                <div class="item">
                    <img src="./img/lab1.jpg">
                    <div class="content">
                        <div class="author">LABMUEST</div>
                        <div class="title">LABORATORIO</div>
                        <div class="topic">CLÍNICO</div>
                    </div>
                </div>
                <div class="item">
                    <img src="./img/lab2.jpg">
                    <div class="content">
                        <div class="author">LABMUEST</div>
                        <div class="title">UNIDAD DE</div>
                        <div class="topic">MUESTRAS</div>
                    </div>
                </div>
                <div class="item">
                    <img src="./img/lab3.jpg">
                    <div class="content">
                        <div class="author">LABMUEST</div>
                        <div class="title">RESULTADO DE</div>
                        <div class="topic">EXÁMENES</div>
                    </div>
                </div>
                <div class="item">
                    <img src="./img/lab4.jpg">
                    <div class="content">
                        <div class="author">LABMUEST</div>
                        <div class="title">PREPARACIÓN DE</div>
                        <div class="topic">EXÁMENES</div>
                    </div>
                </div>
            </div>
            <!-- list thumnail -->
            <div class="thumbnail">
                <div class="item">
                    <img src="./img/lab1.jpg">
                    <div class="content">
                        <div class="title">
                            LABORATORIO
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="./img/lab2.jpg">
                    <div class="content">
                        <div class="title">
                            MUESTRAS
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="./img/lab3.jpg">
                    <div class="content">
                        <div class="title">
                            RESULTADO
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="./img/lab4.jpg">
                    <div class="content">
                        <div class="title">
                            PREPARACIÓN
                        </div>
                    </div>
                </div>

            </div>
            <!-- next prev -->

            <div class="arrows">
                <button id="prev">
                    < </button>
                        <button id="next">></button>
            </div>
            <!-- time running -->
            <div class="time"></div>
        </div>
    </section>
    <!-- SECCION DEL AREA DE OPINION DE CLIENTES -->
    <section class="clientes contenedor">
        <h2 class="titulo">¿Qué dicen nuestros clientes?</h2>
        <div class="cards">
            <div class="card">
                <img src="./img/profe1.jpeg" alt="">
                <div class="contenido-texto-card">
                    <h4>Luis Yañez</h4>
                    <p>Maravilloso trabajo, muy profesionales en sus servicios de laboratorios.</p>
                </div>
            </div>
            <div class="card">
                <img src="./img/profe2.jpeg" alt="">
                <div class="contenido-texto-card">
                    <h4>Ramon Vasquez</h4>
                    <p>Responsables y compromiso en sus labores, muy atentos con sus clientes.</p>
                </div>
            </div>
        </div>
    </section>
    <!--SECCION DE SLIDER 2 CON IMAGENES CREADAS PARA EL PROYECTO-->
    <section>
        <div class="carruseles1">
            <div class="carruseles2">
                <div>
                    <div class="iconos">
                        <div>
                            <a href="">
                                <img src="img/icon.1.png" alt="">
                            </a>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque minima ipsa nulla ad assumenda molestiae obcaecati ex voluptatum qui consequatur.</p>
                        </div>
                        <div>
                            <a href="">
                                <img src="img/icon6.png" alt="">
                            </a>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error adipisci nostrum neque labore reprehenderit veniam dolor praesentium eveniet ex ducimus!</p>
                        </div>
                    </div>
                </div>

                <div class="container-carousel">
                    <div class="carruseles" id="slider">
                        <section class="slider-section">
                            <img src="img/slider1.PNG">
                        </section>
                        <section class="slider-section">
                            <img src="img/slider2.PNG">
                        </section>
                        <section class="slider-section">
                            <img src="img/slider3.PNG">
                        </section>
                        <section class="slider-section">
                            <img src="img/slider4.PNG">
                        </section>
                        <section class="slider-section">
                            <img src="img/slider5.PNG">
                        </section>
                        <section class="slider-section">
                            <img src="img/slider6.PNG">
                        </section>
                    </div>
                    <div class="btn-left"><i class='bx bx-chevron-left'></i></div>
                    <div class="btn-right"><i class='bx bx-chevron-right'></i></div>
                </div>

                <div>
                    <div class="iconos">
                        <div>
                            <a href="">
                                <img src="img/icon4.png" alt="">
                            </a>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque minima ipsa nulla ad assumenda molestiae obcaecati ex voluptatum qui consequatur.</p>
                        </div>
                        <div>
                            <a href="">
                                <img src="img/icon5.png" alt="">
                            </a>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error adipisci nostrum neque labore reprehenderit veniam dolor praesentium eveniet ex ducimus!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- SECCION DE UBICACION DEL MAPA -->
    <section>
        <div>
            <h2 class="titulo_mapa">Nuestra Ubicación</h2>
            <div>
                <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1979.4449496667082!2d-70.64978391201363!3d-33.4488812168826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c50bb33cf719%3A0x5b3aea7806cdf0b8!2sInstituto%20Profesional%20Los%20Leones!5e0!3m2!1sen!2scl!4v1706039742982!5m2!1sen!2scl" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!-- SECCION DEL FOOTER O PIE DE PAGINA -->
    <section class="footer">
        <footer class="pie-pagina">
            <div class="grupo-1">
                <div class="box">
                    <figure>
                        <a href="#">
                            <img src="./img/logo_labmuest.png" alt="Logo de SLee Dw">
                        </a>
                    </figure>
                </div>
                <div class="box">
                    <h2>Contacto</h2>
                    <p><i class="fa-solid fa-location-dot"></i> Dirección: arturo prat #269</p>
                    <p><i class="fa-regular fa-envelope"></i> Correo: lyañez@profesor.ipleones.cl</p>
                    <p><i class="fa-solid fa-phone"></i> Teléfono: +569 3236 91 13</p>
                </div>
                <!--DIANDRA NO BORRAR ES PARA MAS ADELANTE SI QUEREMOS PONER ALGO MAS
        YA QUE ESTA DIVIDIDO EN 3 SECCIONES Y SOLO ESTAMOS OCUPANDO 2-->
                <!--<div class="box">
                <h2>SIGUENOS</h2>
                <div class="red-social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-youtube"></a>
                    AQUI HICE UN COMENTARIO
                </div>
            </div>-->
            </div>
            <div class="grupo-2">
                <small>&copy; 2024 <b>LABMUEST</b> - Todos los Derechos Reservados.</small>
            </div>
        </footer>
    </section>

    <script src="./js/carrusel.js"></script>
    <script src="./js/app.js"></script>
    <script src="./js/slider.js"></script>
    <script src="https://kit.fontawesome.com/4652dbea50.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>