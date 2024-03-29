
<?php

require_once "mainModel.php";

class moduloModelo extends mainModel
{
    /*--------- Agregar ---------*/
    protected static function agregar_modulo($datos)
    {

        $sql = mainModel::conectar()->prepare("INSERT INTO modulos(nombre,created_at) VALUES (:Nombre,:Created_at)");
        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":Nombre", $datos['nombre']);
        $sql->bindParam(":Created_at", $createdAt);
        $sql->execute();

        return $sql;
    }

    /*--------- Eliminar ---------*/
    protected static function eliminar_modulo($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM modulos WHERE modulo_id=:ID");
        $sql->bindParam(":ID", $id);
        $sql->execute();

        return $sql;
    }

    /*--------- Datos ---------*/

    protected static function datos_modulo($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM modulos WHERE modulo_id=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT modelo_id FROM modelo WHERE modelo_id!='1'");
        }

        $sql->execute();
        return $sql;
    }


    /*--------- Listar ---------*/
    protected static function listar_modulo()
    {

        $sql = mainModel::conectar()->prepare("SELECT * FROM modulos ORDER BY modulo_id ASC");
        $sql->execute();

        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $resultados; // Devolvemos el array de resultados
    }



    /*--------- Actualizar ---------*/
    protected static function actualizar_modulo($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE modulos SET nombre=:Nombre WHERE modulo_id=:ID");


        $sql->bindParam(":Nombre", $datos['nombre']);
        $sql->bindParam(":ID", $datos['id']);
        $sql->execute();

        return $sql;
    }
}
