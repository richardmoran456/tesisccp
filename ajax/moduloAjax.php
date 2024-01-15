<?php
$peticionAjax = true;
require_once "../config/APP.php";



if (isset($_POST['nombre_modulo_form'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/moduloControlador.php";
    $instancia_modulo = new moduloControlador();


    /*--------- Agregar ---------*/
    if (isset($_POST['nombre_modulo_form'])) {
        echo $instancia_modulo->agregar_modelo_controlador();
    }
} else {
    echo "aqui";
}
