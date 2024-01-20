
<?php

require_once "mainModel.php";

class solicitudModulo extends mainModel
{
    /*--------- Agregar ---------*/
    protected static function agregar_puesto($datos)
    {

        $sql = mainModel::conectar()->prepare("INSERT INTO puestos(nombre,fk_departamento ,created_at) VALUES (:Nombre,:FKD,:Created_at)");
        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":Nombre", $datos['nombre']);
        $sql->bindParam(":FKD", $datos['fk_departamento']);
        $sql->bindParam(":Created_at", $createdAt);
        $sql->execute();

        return $sql;
    }


    /** Agregar registros y retorna el ID ingresado */
    protected static function agregar_solicitud_with_id($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO solicitudes(
            titulo_solicitud,
            descripcion_solicitud,
            estatus_solicitud,
            fk_departamento_origen,
            fk_departamento_destino,
            fk_creado,
            created_at,
            close_at) VALUES (:Titulo,:Descripcion,:ESS,:FKO,:FKD,:Creado,:Created_at,:Close_at)");
        $createdAt = date('Y-m-d H:i:s');

        $sql->bindParam(":Titulo", $datos['titulo']);
        $sql->bindParam(":Descripcion", $datos['descripcion']);
        $sql->bindParam(":ESS", $datos['estatus_solicitud']);
        $sql->bindParam(":Creado", $datos['fk_creado']);
        $sql->bindParam(":FKO", $datos['fk_departamento_origen']);
        $sql->bindParam(":FKD", $datos['fk_departamento_destino']);
        $sql->bindParam(":Close_at", $createdAt);
        $sql->bindParam(":Created_at", $createdAt);
        $sql->execute();

        // Obtiene el ID del registro recién insertado
        $resultado = mainModel::conectar()->query("SELECT MAX(solicitud_id) as id FROM solicitudes");
        $id = $resultado->fetch()['id'];

        // Retorna el ID
        return $id;

        // Retorna el ID
        return $id;


        return $sql;
    }

    protected static function agregar_historial_solicitud($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO historial_solicitudes(
            descripcion_solicitud,
            fk_usuario,
            fk_solicitud,
            created_at
        ) VALUES (:Descripcion,:FKU,:FKS,:Created_at)");
        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":Descripcion", $datos['descripcion_solicitud']);

        $sql->bindParam(":FKU", $datos['fk_usuario']);
        $sql->bindParam(":FKS", $datos['fk_solicitud']);
        $sql->bindParam(":Created_at", $createdAt);


        $sql->execute();

        return $sql;
    }

    /*--------- Eliminar ---------*/
    protected static function eliminar_puesto($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM puestos WHERE puesto_id=:ID");
        $sql->bindParam(":ID", $id);
        $sql->execute();

        return $sql;
    }

    /*--------- Datos ---------*/

    protected static function datos_puesto($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM puestos WHERE puesto_id=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT puesto_id FROM puestos WHERE puesto_id!='1'");
        }

        $sql->execute();
        return $sql;
    }


    /*--------- Listar ---------*/
    protected static function listar_solicitud()
    {

        $sql = mainModel::conectar()->prepare("SELECT s.estatus_solicitud, s.created_at, s.solicitud_id, s.titulo_solicitud, s.fk_creado, s.fk_departamento_origen, u.nombre_completo AS creador, d.nombre AS nombre_departamento FROM solicitudes AS s INNER JOIN departamentos AS d ON s.fk_departamento_origen = d.departamento_id INNER JOIN usuarios AS u ON u.usuario_id = s.fk_creado ORDER BY solicitud_id ASC");

        // $sql = mainModel::conectar()->prepare("SELECT puestos.puesto_id,puestos.nombre,puestos.created_at,departamentos.departamento_id,departamentos.nombre as departamento
        //  FROM puestos INNER JOIN departamentos ON puestos.fk_departamento = departamentos.departamento_id ORDER BY puesto_id ASC");
        $sql->execute();

        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $resultados; // Devolvemos el array de resultados
    }

    protected static function listar_puesto_combo()
    {

        $sql = mainModel::conectar()->prepare("SELECT p.puesto_id, p.nombre, d.abreviatura, d.nombre AS departamento FROM puestos AS p INNER JOIN departamentos AS d ON d.departamento_id = p.fk_departamento");

        $sql->execute();

        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $resultados; // Devolvemos el array de resultados
    }



    /*--------- Actualizar ---------*/
    protected static function actualizar_puesto($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE puestos SET nombre=:Nombre,fk_departamento=:FKD WHERE puesto_id=:ID");


        $sql->bindParam(":Nombre", $datos['nombre']);
        $sql->bindParam(":FKD", $datos['fk_departamento']);
        $sql->bindParam(":ID", $datos['id']);

        $sql->execute();

        return $sql;
    }


    /*--------- Cancelar solicitud ---------*/
    protected static function cancelar_solicitud($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE solicitudes SET estatus_solicitud=:Statuss,modified_at=:fecha,close_at=:clo WHERE solicitud_id=:ID");

        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":Statuss", $datos['estatus_solicitud']);
        $sql->bindParam(":ID", $datos['id']);
        $sql->bindParam(":fecha", $createdAt);
        $sql->bindParam(":clo", $createdAt);

        $sql->execute();

        return $sql;
    }
}
