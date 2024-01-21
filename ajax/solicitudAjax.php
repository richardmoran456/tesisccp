<?php
$peticionAjax = true;
require_once "../config/APP.php";



if (isset($_POST['titulo_solicitud_reg']) ||  isset($_POST['solicitud_id_del']) || isset($_POST['solicitud_id_up']) || isset($_POST['historial_reg'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/solicitudControlador.php";
    $instancia_controlador = new solicitudControlador();


    /*--------- Agregar ---------*/
    if (isset($_POST['titulo_solicitud_reg'])) {
        echo $instancia_controlador->agregar_solicitud_controlador();
    }

    /*--------- Eliminar ---------*/
    if (isset($_POST['solicitud_id_del1'])) {
        echo $instancia_controlador->cambio_status_solicitud_controlador();
    }

    /*--------- Actualizar estatus ---------*/
    if (isset($_POST['solicitud_id_del'])) {
        echo $instancia_controlador->cambio_status_solicitud_controlador();
    }

    /*--------- Actualizar ---------*/
    if (isset($_POST['solicitud_id_up'])) {
        echo $instancia_controlador->cambio_status_solicitud_controlador();
    }

    /*--------- crear historial de la solicitud ---------*/
    if (isset($_POST['historial_reg'])) {
        echo $instancia_controlador->agregar_historial_controlador();
    }
} else {
    echo "aqui";
}
