<?php
$peticionAjax = true;
require_once "../config/APP.php";



if (isset($_POST['nombre_puesto_reg']) ||  isset($_POST['puesto_id_del']) || isset($_POST['puesto_id_up'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/puestoControlador.php";
    $instancia_controlador = new puestoControlador();


    /*--------- Agregar ---------*/
    if (isset($_POST['nombre_puesto_reg'])) {
        echo $instancia_controlador->agregar_puesto_controlador();
    }

    /*--------- Eliminar ---------*/
    if (isset($_POST['puesto_id_del'])) {
        echo $instancia_controlador->eliminar_puesto_controlador();
    }

    /*--------- Actualizar ---------*/
    if (isset($_POST['puesto_id_up'])) {
        echo $instancia_controlador->actualizar_puesto_controlador();
    }
} else {
    echo "aqui";
}
