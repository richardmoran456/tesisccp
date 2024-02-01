<?php

if ($peticionAjax) {
    require_once "../modelos/notificacionModulo.php";
} else {
    require_once "./modelos/notificacionModulo.php";
}

class notificacionControlador extends notificacionModulo
{
    /*--------- Controlador listar modelo ---------*/
    public function listar_notificacion_controlador()
    {


        $datos = notificacionModulo::listar_tarea($_SESSION['privilegio_spm']);

        /** Contar registros */
        $notificaciones_sin_leer = array_filter($datos, function ($notificacion) {
            return $notificacion["leido"] === "no";
        });

        $numero_notificaciones_sin_leer = count($notificaciones_sin_leer);


        $data = [
            "contador" => $numero_notificaciones_sin_leer,
            "datos" => $notificaciones_sin_leer
        ];
        return $data;
    }


    /*--------- Controlador cambiarStatus módulo ---------*/
    public function ver_notificacion_controlador()
    {
        /** Recibiendo ID de la vista */

        $id = mainModel::limpiar_cadena($_POST['notificacion_id']);

        /** Comprobar si tiene los permisos */




        $datos = [
            "id" => $id,
            "leido" => "si"

        ];

        if (notificacionModulo::leer_notificacion($datos)) {

            $alerta = true;
        } else {
            $alerta = false;
        }
        return $alerta;
    }
}
