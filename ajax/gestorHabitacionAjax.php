<?php
$peticionAjax = true;
require_once "../config/APP.php";

// var_dump($_POST);

if (
    isset($_POST['search']) || isset($_POST['fk_huesped_asignado']) || isset($_POST['nombre_completo_reg']) || isset($_POST['fk_mantenimiento']) || isset($_POST['habitacion_to_disponible']) || isset($_POST['habitacion_to_salir'])


) {
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

    /*--------- Crear huesped y asignar a una habitacion ---------*/
    if (isset($_POST['nombre_completo_reg'])) {

        echo $instancia_controlador->crear_asignar_huesped();
    }

    /*--------- Poner en mantenimiento ---------*/
    if (isset($_POST['fk_mantenimiento'])) {

        echo $instancia_controlador->crear_mantenimiento();
    }
    /*--------- Quitar mantenimiento ---------*/
    if (isset($_POST['habitacion_to_disponible'])) {

        echo $instancia_controlador->quitar_mantenimiento();
    }


    /*--------- cancelar hospedaje ---------*/
    if (isset($_POST['habitacion_to_salir'])) {
        echo $instancia_controlador->cancelar_hospedaje();
    }
} else {
    echo "aqui";
}
