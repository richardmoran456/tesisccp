<?php
$peticionAjax = true;
require_once "../config/APP.php";



if (isset($_POST['search'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/gestorHabitacionControlador.php";
    $instancia_controlador = new gestorHabitacionControlador();


    /*--------- Busqueda dinamica de huespedes ---------*/
    if (isset($_POST['search'])) {
        echo $instancia_controlador->buscar_huesped_controlador();
    }
} else {
    echo "aqui";
}
