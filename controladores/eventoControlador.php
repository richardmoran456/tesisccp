<?php

if ($peticionAjax) {
    require_once "../modelos/eventoModelo.php";
} else {
    require_once "./modelos/eventoModelo.php";
}

class eventoControlador extends eventoModelo
{
}
