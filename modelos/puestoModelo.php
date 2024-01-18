
<?php

require_once "mainModel.php";

class puestoModelo extends mainModel
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
    protected static function listar_puesto()
    {

        $sql = mainModel::conectar()->prepare("SELECT puestos.puesto_id,puestos.nombre,puestos.created_at,departamentos.departamento_id,departamentos.nombre as departamento
         FROM puestos INNER JOIN departamentos ON puestos.fk_departamento = departamentos.departamento_id ORDER BY puesto_id ASC");
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
}
