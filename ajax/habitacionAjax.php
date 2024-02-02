<?php
$peticionAjax = true;
require_once "../config/APP.php";



if (isset($_POST['identificador_habitacion_reg']) ||  isset($_POST['habitacion_id_del']) || isset($_POST['empleado_id_up'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/habitacionControlador.php";
    $instancia_controlador = new habitacionControlador();


    /*--------- Agregar ---------*/
    if (isset($_POST['identificador_habitacion_reg'])) {
        echo $instancia_controlador->agregar_habitacion_controlador();
    }

    /*--------- Eliminar ---------*/
    if (isset($_POST['habitacion_id_del'])) {
        echo $instancia_controlador->eliminar_habitacion_controlador();
    }

    /*--------- Actualizar ---------*/
    if (isset($_POST['habitacion_id_up'])) {
        echo $instancia_controlador->actualizar_habitacion_controlador();
    }
} else {
    echo "aqui";
}
