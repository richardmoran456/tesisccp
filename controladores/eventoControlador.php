<?php

if ($peticionAjax) {
    require_once "../modelos/eventoModelo.php";
} else {
    require_once "./modelos/eventoModelo.php";
}

class eventoControlador extends eventoModelo
{
    /*--------- Controlador listar modelo ---------*/
    public function listar_evento_controlador()
    {
        $datos = eventoModelo::listar_eventos();
        return $datos;
    }
}
