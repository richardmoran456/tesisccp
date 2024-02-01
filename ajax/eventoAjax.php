<?php
$peticionAjax = true;
require_once "../config/APP.php";



if (isset($_POST['titulo_reg']) ||  isset($_POST['evento_id_up'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/eventoControlador.php";
    $instancia_controlador = new eventoControlador();


    /*--------- Agregar ---------*/
    if (isset($_POST['titulo_reg'])) {
        echo $instancia_controlador->agregar_evento_controlador();
    }

    /*--------- Editar ---------*/
    if (isset($_POST['evento_id_up'])) {
        echo $instancia_controlador->actualizar_evento_controlador();
    }
} else {
    echo "aqui";
}
