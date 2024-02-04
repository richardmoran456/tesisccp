
<?php

require_once "mainModel.php";

class gestorHabitacionModelo extends mainModel
{
    /*--------- Listar ---------*/
    protected static function buscar_huesped($busqueda)
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM huespedes WHERE nombre_completo LIKE '%$busqueda%'");
        $sql->execute();
        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultados; // Devolvemos el array de resultados
    }


    /*--------- Asignar una habitacion ---------*/
    protected static function registro_asignacion($datos)
    {

        $sql = mainModel::conectar()->prepare("INSERT INTO huesped_habitaciones(fk_huesped,
        fk_habitacion,
        entrada,
        salida,created_at) VALUES (:FKHu,:FKHA,:ENTRADA,:SALIDA,:Created_at)");


        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":FKHu", $datos['fk_huesped']);
        $sql->bindParam(":FKHA", $datos['fk_habitacion']);
        $sql->bindParam(":ENTRADA", $datos['entrada']);
        $sql->bindParam(":SALIDA", $datos['salida']);

        $sql->bindParam(":Created_at", $createdAt);
        $sql->execute();

        return $sql;
    }

    /*--------- finalizar asigacion ---------*/
    protected static function finalizar_asignacion($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE huesped_habitaciones SET salida=:SALIDA WHERE huesped_hab_id=:ID");
        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":ID", $datos['id']);
        $sql->bindParam(":SALIDA", $createdAt);
        $sql->execute();
        return $sql;
    }


    protected static function actualizar_habitacion($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE habitaciones SET estatus_habitacion=:STA WHERE habitacion_id=:ID");


        $sql->bindParam(":ID", $datos['habitacion_id']);
        $sql->bindParam(":STA", $datos['estatus_habitacion']);

        $sql->execute();

        return $sql;
    }




    /*--------- Listar los ultimos huespedes ---------*/
    protected static function obtener_ultimos_huespedes($id)
    {
        $sql = mainModel::conectar()->prepare("SELECT hh.huesped_hab_id,
        hh.fk_huesped,hh.fk_habitacion,hh.entrada,hh.salida,hh.created_at,h.nombre_completo,h.documento        
        
         FROM huesped_habitaciones as hh INNER JOIN huespedes as h ON h.huesped_id=hh.fk_huesped WHERE fk_habitacion=:ID
        ORDER BY huesped_hab_id DESC
        LIMIT 10");
        $sql->bindParam(":ID", $id);
        $sql->execute();
        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultados; // Devolvemos el array de resultados
    }
    /*--------- Registro de huesped y retornar id ---------*/

    protected static function registro_huesped($datos)
    {

        $sql = mainModel::conectar()->prepare("INSERT INTO huespedes(nombre_completo,
        documento,created_at) VALUES (:Nombre,:DNI,:Created_at)");
        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":Nombre", $datos['nombre_completo']);
        $sql->bindParam(":DNI", $datos['documento']);
        $sql->bindParam(":Created_at", $createdAt);
        $sql->execute();

        // Obtiene el ID del registro recién insertado
        $resultado = mainModel::conectar()->query("SELECT MAX(huesped_id) as id FROM huespedes");
        $id = $resultado->fetch()['id'];
        // Retorna el ID
        return $id;
    }


    protected static function agregar_tarea_with_id($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO tareas(
            titulo_tarea,
            descripcion_tarea,
            estatus_tarea,
            fk_departamento_origen,
            fk_departamento_destino,
            fk_creado,
            created_at,
            close_at) VALUES (:Titulo,:Descripcion,:ESS,:FKO,:FKD,:Creado,:Created_at,:Close_at)");
        $createdAt = date('Y-m-d H:i:s');

        $sql->bindParam(":Titulo", $datos['titulo']);
        $sql->bindParam(":Descripcion", $datos['descripcion']);
        $sql->bindParam(":ESS", $datos['estatus_tarea']);
        $sql->bindParam(":Creado", $datos['fk_creado']);
        $sql->bindParam(":FKO", $datos['fk_departamento_origen']);
        $sql->bindParam(":FKD", $datos['fk_departamento_destino']);
        $sql->bindParam(":Close_at", $createdAt);
        $sql->bindParam(":Created_at", $createdAt);
        $sql->execute();

        // Obtiene el ID del registro recién insertado
        $resultado = mainModel::conectar()->query("SELECT MAX(tarea_id) as id FROM tareas");
        $id = $resultado->fetch()['id'];

        // Retorna el ID
        return $id;




        return $sql;
    }

    protected static function agregar_historial_tarea($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO historial_tareas(
            descripcion_tarea,
            fk_usuario,
            fk_tarea,
            created_at
        ) VALUES (:Descripcion,:FKU,:FKS,:Created_at)");
        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":Descripcion", $datos['descripcion_tarea']);

        $sql->bindParam(":FKU", $datos['fk_usuario']);
        $sql->bindParam(":FKS", $datos['fk_tarea']);
        $sql->bindParam(":Created_at", $createdAt);


        $sql->execute();

        return $sql;
    }


    /** crear notificacion */
    protected static function crear_notificacion_tarea($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO notificaciones(fk_departamento,descripcion_notificacion, url_notificacion,created_at) VALUES (:FK,:DESN,:URLN,:Created_at)");
        $createdAt = date('Y-m-d H:i:s');


        $sql->bindParam(":FK", $datos['fk_departamento']);
        $sql->bindParam(":DESN", $datos['descripcion_notificacion']);
        $sql->bindParam(":URLN", $datos['url_notificacion']);
        $sql->bindParam(":Created_at", $createdAt);
        $sql->execute();
        return $sql;
    }
}
