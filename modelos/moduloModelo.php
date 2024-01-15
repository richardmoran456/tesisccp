
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
        $sql = mainModel::conectar()->prepare("DELETE FROM modelos WHERE modelo_id=:ID");
        $sql->bindParam(":ID", $id);
        $sql->execute();

        return $sql;
    }

    /*--------- Datos ---------*/

    protected static function datos_modelo($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM modelos WHERE modelo_id=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT modelo_id FROM modelos WHERE modelo_id!='1'");
        }

        $sql->execute();
        return $sql;
    }

    /*--------- Actualizar ---------*/
    protected static function actualizar_departameno_modelo($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE modelos SET nombre=:Nombre WHERE modelo_id=:DNI");


        $sql->bindParam(":Nombre", $datos['DNI']);
        $sql->execute();

        return $sql;
    }
}
