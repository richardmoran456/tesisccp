<?php
$peticionAjax = true;
require_once "../config/APP.php";



if (isset($_POST['nombre_piso_reg']) ||  isset($_POST['piso_id_del']) || isset($_POST['piso_id_up'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/pisoControlador.php";
    $instancia_controlador = new pisoControlador();


    /*--------- Agregar ---------*/
    if (isset($_POST['nombre_piso_reg'])) {
        echo $instancia_controlador->agregar_piso_controlador();
    }

    /*--------- Eliminar ---------*/
    if (isset($_POST['piso_id_del'])) {
        echo $instancia_controlador->eliminar_piso_controlador();
    }

    /*--------- Actualizar ---------*/
    if (isset($_POST['piso_id_up'])) {
        echo $instancia_controlador->actualizar_piso_controlador();
    }
} else {
    echo "aqui";
}
