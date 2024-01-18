<?php
$peticionAjax = true;
require_once "../config/APP.php";



if (isset($_POST['nombre_departamento_reg']) ||  isset($_POST['departamento_id_del']) || isset($_POST['departamento_id_up'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/departamentoControlador.php";
    $instancia_controlador = new departamentoControlador();


    /*--------- Agregar ---------*/
    if (isset($_POST['nombre_departamento_reg'])) {
        echo $instancia_controlador->agregar_departamento_controlador();
    }

    /*--------- Eliminar un usuario ---------*/
    if (isset($_POST['departamento_id_del'])) {
        echo $instancia_controlador->eliminar_departamento_controlador();
    }

    /*--------- Actualizar un usuario ---------*/
    if (isset($_POST['departamento_id_up'])) {
        echo $instancia_controlador->actualizar_departamento_controlador();
    }
} else {
    echo "aqui";
}
