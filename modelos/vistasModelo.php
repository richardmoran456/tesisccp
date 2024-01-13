<?php

class vistasModelo
{

    /*--------- Modelo obtener vistas ---------*/
    protected static function obtener_vistas_modelo($vistas)
    {
        $listaBlanca = ["home", "usuarios", "solicitudes", "tareas", "huespedes", "pisos", "habitaciones", "notificaciones", "perfil"];
        if (in_array($vistas, $listaBlanca)) {
            if (is_file("./vistas/paginas/" . $vistas . "-view.php")) {
                $contenido = "./vistas/paginas/" . $vistas . "-view.php";
            } else {
                $contenido = "404";
            }
        } elseif ($vistas == "login" || $vistas == "index") {
            $contenido = "login";
        } else {
            $contenido = "404";
        }
        return $contenido;
    }
}
