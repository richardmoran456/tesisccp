<?php
$peticionAjax = true;
require_once "../config/APP.php";



if (isset($_POST['nombre_usuario_reg']) ||  isset($_POST['usuario_id_del']) || isset($_POST['usuario_id_up']) || isset($_FILES['file'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/usuarioControlador.php";
    $instancia_controlador = new usuarioControlador();


    /*--------- Agregar ---------*/
    if (isset($_POST['nombre_usuario_reg'])) {
        echo $instancia_controlador->agregar_usuario_controlador();
    }

    /*--------- Eliminar ---------*/
    if (isset($_POST['usuario_id_del'])) {
        echo $instancia_controlador->eliminar_usuario_controlador();
    }

    /*--------- Actualizar ---------*/
    if (isset($_POST['usuario_id_up'])) {
        echo $instancia_controlador->actualizar_usuario_controlador();
    }

    /*--------- cargar avatar ---------*/
    if (isset($_FILES['file'])) {
        echo $instancia_controlador->actualizar_avatar();
    }
} else {
    echo "aqui";
}
