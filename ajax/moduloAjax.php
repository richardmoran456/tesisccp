<?php
$peticionAjax = true;
require_once "../config/APP.php";



if (isset($_POST['nombre_modulo_form']) || isset($_POST['list_form']) || isset($_POST['modulo_id_del'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/moduloControlador.php";
    $instancia_modulo = new moduloControlador();


    /*--------- Agregar ---------*/
    if (isset($_POST['nombre_modulo_form'])) {
        echo $instancia_modulo->agregar_modelo_controlador();
    }

    /*--------- Eliminar un usuario ---------*/
    if (isset($_POST['modulo_id_del'])) {
        echo $instancia_modulo->eliminar_modulo_controlador();
    }

    /*--------- Actualizar un usuario ---------*/
    if (isset($_POST['modulo_id_up'])) {
        echo $instancia_modulo->actualizar_usuario_controlador();
    }
} else {
    echo "aqui";
}
