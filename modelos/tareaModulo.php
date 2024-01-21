
<?php

require_once "mainModel.php";

class tareaModulo extends mainModel
{



    /** Agregar registros y retorna el ID ingresado */
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


    /*--------- Datos ---------*/
    protected static function datos_historial($id)
    {
        $sql = mainModel::conectar()->prepare("SELECT
        h.historial_tarea_id,
        h.descripcion_tarea,
        h.fk_usuario,
        h.fk_tarea,
        h.created_at,
        u.nombre_completo AS creador,
        d.nombre AS departamento
    FROM
        historial_tareas AS h
    INNER JOIN usuarios AS u
    ON
        u.usuario_id = h.fk_usuario
    INNER JOIN departamentos AS d
    ON
        u.fk_departamento = d.departamento_id
    WHERE
        h.fk_tarea = :ID ORDER BY h.historial_tarea_id DESC");
        $sql->bindParam(":ID", $id);

        $sql->execute();
        return $sql;
    }

    protected static function datos_tarea($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT t.descripcion_tarea, t.estatus_tarea, t.created_at, t.tarea_id, t.titulo_tarea, t.fk_creado, t.fk_departamento_destino, u.nombre_completo AS creador, d.nombre AS nombre_departamento FROM tareas AS t INNER JOIN departamentos AS d ON t.fk_departamento_origen = d.departamento_id INNER JOIN usuarios AS u ON u.usuario_id = t.fk_creado WHERE tarea_id=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT tarea_id FROM tareas WHERE tarea_id!='1'");
        }

        $sql->execute();
        return $sql;
    }


    /*--------- Listar ---------*/
    protected static function listar_tarea()
    {

        $sql = mainModel::conectar()->prepare("SELECT t.estatus_tarea, t.created_at, t.tarea_id, t.titulo_tarea, t.fk_creado, t.fk_departamento_destino, u.nombre_completo AS creador, d.nombre AS nombre_departamento FROM tareas AS t INNER JOIN departamentos AS d ON t.fk_departamento_destino = d.departamento_id INNER JOIN usuarios AS u ON u.usuario_id = t.fk_creado ORDER BY tarea_id ASC");

        // $sql = mainModel::conectar()->prepare("SELECT puestos.puesto_id,puestos.nombre,puestos.created_at,departamentos.departamento_id,departamentos.nombre as departamento
        //  FROM puestos INNER JOIN departamentos ON puestos.fk_departamento = departamentos.departamento_id ORDER BY puesto_id ASC");
        $sql->execute();

        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $resultados; // Devolvemos el array de resultados
    }

    /*--------- Cancelar tarea ---------*/
    protected static function cancelar_tarea($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE tareas SET estatus_tarea=:Statuss,modified_at=:fecha,close_at=:clo WHERE tarea_id=:ID");

        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":Statuss", $datos['estatus_tarea']);
        $sql->bindParam(":ID", $datos['id']);
        $sql->bindParam(":fecha", $createdAt);
        $sql->bindParam(":clo", $createdAt);

        $sql->execute();

        return $sql;
    }
}
