<?php
session_start();
require('codigo.php');

if (empty($_SESSION['administrador'])) {
    header('Location: ingreso_administrador.php');
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>CelSystem</title>
        <link rel="stylesheet" href="css/estilos.css"/>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-30858985-1']);
            _gaq.push(['_trackPageview']);
            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' === document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        </script>
    </head>
    <body>
        <?php include("header.php"); ?>
        <nav class = "navbar navbar-default navbar-static-top">
            <div class = "container">
                <div class = "navbar-header">
                    <button type = "button" data-target = "#menu-principal" data-toggle = "collapse" class = "navbar-toggle">
                        <span class = "sr-only">Este boton despliega la barra de navegacion</span>
                        <span class = "icon-bar"></span>
                        <span class = "icon-bar"></span>
                        <span class = "icon-bar"></span>
                    </button>
                </div>
                <div id = "menu-principal">
                    <ul class = "nav nav-pills nav-justified">
                        <li><a href="clientes_historial.php">Clientes</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Equipos<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="equipos_historial.php">Historial</a></li>
                                <li><a href="buscar.php">Buscar</a></li>
                                <li><a href="reparados.php">Reparados</a></li>
                                <li><a href="modificado.php">Modificar</a></li>
                            </ul>
                        </li>
                        <li><a href="cerrar_sesion.php">Cerrar Sesi&oacute;n</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <h3><span class="label label-danger"><?php echo "Bienvenido ". $_SESSION['administrador']; ?></span></h3>

        <div class="row">
            <div class="col-md-2">
                <!--VACIO-->
            </div>
            <div class="col-md-6">
                <center>
                    <?php
                    $archivo = fopen('reparar.dat', 'r') or die("Error");
                    while (!feof($archivo)) {

                        $linea = fgets($archivo);
                        $datos = explode("|", $linea);


                        $codd = $datos[0];
                        $nombre = $datos[1];
                        $dni = $datos[2];
                        $direccion = $datos[3];
                        $telefono = $datos[4];
                        // $email = $datos[5];



                        echo "EQUIPO<table border=1>";
                        echo "<th>Codigo</th>";
                        echo "<th>Equipo</th>";
                        echo "<th>Marca</th>";
                        echo "<th>Modelo</th>";
                        echo "<th>Detalle</th>";
                        //echo "<th>Estado</th>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>" . $codd . "</td>";
                        echo "<td>" . $nombre . "</td>";
                        echo "<td>" . $dni . "</td>";
                        echo "<td>" . $direccion . "</td>";
                        echo "<td>" . $telefono . "</td>";
                        //echo "<td>" . $email . "</td>";
                        echo "</tr>";
                        echo "</table>";
                        echo "<br>";
                    }
                    fclose($archivo);
                    ?>
                    <h2><span class="label label-info"><a href="equipos_pdf.php">Generar pdf</a></span></h2>
                    <br/>
                </center>

            </div>

            <div class="col-md-2">
                <td><a href="https://www.instagram.com/" target="_blank"><img src="imagenes/insta.jpg"></a></td><br><br><br>
                <td><a href="https://twitter.com/?lang=es" target="_blank"><img src="imagenes/twitter.jpg"></a></td><br><br><br>
                <td><a href="https://www.facebook.com/" target="_blank"><img src="imagenes/face.jpg"></a></td><br><br><br>
            </div>
        </div>
        <br>

        <?php include("footer.php"); ?>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>


    </body>
</html>