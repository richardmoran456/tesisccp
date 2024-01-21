<?php

class vistasModelo
{

    /*--------- Modelo obtener vistas ---------*/
    protected static function obtener_vistas_modelo($vistas)
    {
        $listaBlanca = ["home", "usuarios", "usuario-create", "usuario-update", "solicitudes", "solicitud-create", "solicitud", "solicitud-update", "tareas", "tarea", "tarea-create", "huespedes", "pisos", "habitaciones", "notificaciones", "perfil", "departamentos", "departamento-create", "departamento-update", "puestos", "puesto-create", "puesto-update", "eventos", "empleados", "empleado-create", "empleado-update", "alas", "ala-create", "ala-update", "equipos", "modulos", "modulo-update"];
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
