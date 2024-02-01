
<?php

require_once "mainModel.php";

class notificacionModulo extends mainModel
{

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



    /*--------- Listar ---------*/
    protected static function listar_tarea($id)
    {

        $sql = mainModel::conectar()->prepare("SELECT * FROM notificaciones WHERE fk_departamento=:ID ORDER BY notificacion_id ASC");
        $sql->bindParam(":ID", $id);

        // $sql = mainModel::conectar()->prepare("SELECT puestos.puesto_id,puestos.nombre,puestos.created_at,departamentos.departamento_id,departamentos.nombre as departamento
        //  FROM puestos INNER JOIN departamentos ON puestos.fk_departamento = departamentos.departamento_id ORDER BY puesto_id ASC");
        $sql->execute();

        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $resultados; // Devolvemos el array de resultados
    }


    /*--------- Cancelar tarea ---------*/
    protected static function leer_notificacion($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE notificaciones SET leido=:LEIDO,modified_at=:fecha WHERE notificacion_id=:ID");

        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":LEIDO", $datos['leido']);
        $sql->bindParam(":ID", $datos['id']);
        $sql->bindParam(":fecha", $createdAt);

        $sql->execute();

        return $sql;
    }
}
