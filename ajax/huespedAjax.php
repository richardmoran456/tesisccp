<?php
$peticionAjax = true;
require_once "../config/APP.php";



if (isset($_POST['nombre_huesped_reg']) ||  isset($_POST['huesped_id_del']) || isset($_POST['huesped_id_up'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/huespedControlador.php";
    $instancia_controlador = new huespedControlador();


    /*--------- Agregar ---------*/
    if (isset($_POST['nombre_huesped_reg'])) {
        echo $instancia_controlador->agregar_huesped_controlador();
    }

    /*--------- Eliminar ---------*/
    if (isset($_POST['huesped_id_del'])) {
        echo $instancia_controlador->eliminar_huesped_controlador();
    }

    /*--------- Actualizar ---------*/
    if (isset($_POST['huesped_id_up'])) {
        echo $instancia_controlador->actualizar_huesped_controlador();
    }
} else {
    echo "aqui";
}
