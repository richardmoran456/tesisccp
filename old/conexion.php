<?php
  $host = "localhost";
  $user = "root";
  $clave = "";
  $bd = "tesisccp";
  $conexion = mysqli_connect($host,$user,$clave,$bd);

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

?>
    

