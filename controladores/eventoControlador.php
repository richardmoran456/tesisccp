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


    /*--------- Crear evento ---------*/
    public function agregar_evento_controlador()
    {
        $titulo_evento = mainModel::limpiar_cadena($_POST['titulo_reg']);
        $descripcion_evento = mainModel::limpiar_cadena($_POST['descripcion_reg']);
        $inicio_evento = mainModel::limpiar_cadena($_POST['inicio_reg']);
        $finaliza_evento = mainModel::limpiar_cadena($_POST['final_reg']);


        $datos = [
            "titulo_evento" => $titulo_evento,
            "descripcion_evento" => $descripcion_evento,
            "inicio_evento" => $inicio_evento,
            "finaliza_evento" => $finaliza_evento
        ];


        // var_dump($datos);
        $agregar_evento = eventoModelo::agregar_evento($datos);

        if ($agregar_evento->rowCount() == 1) {
            $alerta = [
                "Alerta" => "limpiar",
                "Titulo" => "Evento registrado",
                "Texto" => "Los datos del evento han sido registrados con exito",
                "Tipo" => "success"
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "No hemos podido registrar el evento",
                "Tipo" => "error"
            ];
        }

        echo json_encode($alerta);
    }

    /*--------- Mostrar evento ---------*/
    public function datos_evento_controlador($tipo, $id)
    {
        $tipo = mainModel::limpiar_cadena($tipo);
        $id = mainModel::limpiar_cadena($id);
        return eventoModelo::datos_evento($tipo, $id);
    }


    /*--------- Crear evento ---------*/
    public function actualizar_evento_controlador()
    {
        $evento_id = mainModel::limpiar_cadena($_POST['evento_id_up']);
        $titulo_evento = mainModel::limpiar_cadena($_POST['titulo_up']);
        $descripcion_evento = mainModel::limpiar_cadena($_POST['descripcion_up']);
        $inicio_evento = mainModel::limpiar_cadena($_POST['inicio_up']);
        $finaliza_evento = mainModel::limpiar_cadena($_POST['final_up']);


        $datos = [
            "evento_id" => $evento_id,
            "titulo_evento" => $titulo_evento,
            "descripcion_evento" => $descripcion_evento,
            "inicio_evento" => $inicio_evento,
            "finaliza_evento" => $finaliza_evento
        ];


        if (eventoModelo::actualizar_evento($datos)) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Datos actualizados",
                "Texto" => "Los datos han sido actualizados con exito",
                "Tipo" => "success"
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "No hemos podido actualizar los datos, por favor intente nuevamente",
                "Tipo" => "error"
            ];
        }
        echo json_encode($alerta);
    }
}
