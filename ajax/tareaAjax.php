<?php
$peticionAjax = true;
require_once "../config/APP.php";



if (isset($_POST['titulo_tarea_reg']) ||  isset($_POST['tarea_id_del']) || isset($_POST['tarea_id_up']) || isset($_POST['historial_reg'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/tareaControlador.php";
    $instancia_controlador = new tareaControlador();


    /*--------- Agregar ---------*/
    if (isset($_POST['titulo_tarea_reg'])) {
        echo $instancia_controlador->agregar_tarea_controlador();
    }



    /*--------- Actualizar estatus ---------*/
    if (isset($_POST['tarea_id_del'])) {
        echo $instancia_controlador->cambio_status_tarea_controlador();
    }

    /*--------- Actualizar ---------*/
    if (isset($_POST['tarea_id_up'])) {
        echo $instancia_controlador->cambio_status_tarea_controlador();
    }

    /*--------- crear historial de la tarea ---------*/
    if (isset($_POST['historial_reg'])) {
        echo $instancia_controlador->agregar_historial_controlador();
    }
} else {
    echo "aqui";
}
