<?php
$peticionAjax = true;
require_once "../config/APP.php";



if (isset($_POST['nombre_empleado_reg']) ||  isset($_POST['empleado_id_del']) || isset($_POST['empleado_id_up'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/empleadoControlador.php";
    $instancia_controlador = new empleadoControlador();


    /*--------- Agregar ---------*/
    if (isset($_POST['nombre_empleado_reg'])) {
        echo $instancia_controlador->agregar_empleado_controlador();
    }

    /*--------- Eliminar ---------*/
    if (isset($_POST['empleado_id_del'])) {
        echo $instancia_controlador->eliminar_empleado_controlador();
    }

    /*--------- Actualizar ---------*/
    if (isset($_POST['empleado_id_up'])) {
        echo $instancia_controlador->actualizar_empleado_controlador();
    }
} else {
    echo "aqui";
}
