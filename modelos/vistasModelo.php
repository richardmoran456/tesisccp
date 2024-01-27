<?php

class vistasModelo
{

    /*--------- Modelo obtener vistas ---------*/
    protected static function obtener_vistas_modelo($vistas)
    {


        $listaBlanca = ["home", "usuarios", "usuario-create", "usuario-update", "solicitudes", "solicitud-create", "solicitud", "solicitud-update", "tareas", "tarea", "tarea-create", "huespedes", "huesped-create", "huesped-update", "pisos", "piso-create", "piso-update", "habitaciones", "habitacion-create", "habitacion-update", "notificaciones", "perfil", "departamentos", "departamento-create", "departamento-update", "puestos", "puesto-create", "puesto-update", "eventos", "empleados", "empleado-create", "empleado-update", "alas", "ala-create", "ala-update", "equipos", "equipo-create", "equipo-update", "modulos", "modulo-update", "recepcion"];


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
