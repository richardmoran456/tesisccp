<?php
$peticionAjax = true;
require_once "../config/APP.php";



if (isset($_POST['notificacion_id'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/notificacionControlador.php";
    $instancia_controlador = new notificacionControlador();


    /*--------- Agregar ---------*/
    if (isset($_POST['notificacion_id'])) {
        echo $instancia_controlador->ver_notificacion_controlador();
    }
} else {
    echo "aqui";
}
