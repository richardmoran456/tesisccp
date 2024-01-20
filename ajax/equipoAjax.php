<?php
$peticionAjax = true;
require_once "../config/APP.php";

var_dump($_POST);

if (isset($_POST['modelo_equipo_reg']) ||  isset($_POST['equipo_id_del']) || isset($_POST['equipo_id_up'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/equipoControlador.php";
    $instancia_controlador = new equipoControlador();


    /*--------- Agregar ---------*/
    if (isset($_POST['modelo_equipo_reg'])) {
        echo $instancia_controlador->agregar_equipo_controlador();
    }

    /*--------- Eliminar un equipo ---------*/
    if (isset($_POST['equipo_id_del'])) {
        echo $instancia_controlador->eliminar_equipo_controlador();
    }

    /*--------- Actualizar un equipo ---------*/
    if (isset($_POST['equipo_id_up'])) {
        echo $instancia_controlador->actualizar_equipo_controlador();
    }
} else {
    echo "aqui";
}
