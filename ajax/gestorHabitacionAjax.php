<?php
$peticionAjax = true;
require_once "../config/APP.php";



if (isset($_POST['search']) || isset($_POST['fk_huesped_asignado'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../controladores/gestorHabitacionControlador.php";
    $instancia_controlador = new gestorHabitacionControlador();


    /*--------- Busqueda dinamica de huespedes ---------*/
    if (isset($_POST['search'])) {
        echo $instancia_controlador->buscar_huesped_controlador();
    }

    /*--------- Asignar huesped a una habitacion ---------*/
    if (isset($_POST['fk_huesped_asignado'])) {
        echo $instancia_controlador->asignar_huesped();
    }
} else {
    echo "aqui";
}
