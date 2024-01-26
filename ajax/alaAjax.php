<?php
$peticionAjax = true;
require_once "../config/APP.php";



if (isset($_POST['nombre_ala_reg']) ||  isset($_POST['ala_id_del']) || isset($_POST['ala_id_up']) || isset($_POST['ala_id'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/alaControlador.php";
    $instancia_controlador = new alaControlador();


    /*--------- Agregar ---------*/
    if (isset($_POST['nombre_ala_reg'])) {
        echo $instancia_controlador->agregar_ala_controlador();
    }

    /*--------- Eliminar un usuario ---------*/
    if (isset($_POST['ala_id_del'])) {
        echo $instancia_controlador->eliminar_ala_controlador();
    }

    /*--------- Actualizar un usuario ---------*/
    if (isset($_POST['ala_id_up'])) {
        echo $instancia_controlador->actualizar_ala_controlador();
    }

    /*--------- Esto es del combobox ---------*/
    if (isset($_POST['ala_id'])) {
        // echo $instancia_controlador->actualizar_ala_controlador();
        echo 'hola';
    }
} else {
    echo "aqui";
}
