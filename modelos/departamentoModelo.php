
<?php

require_once "mainModel.php";

class departamentoModelo extends mainModel
{
    /*--------- Modelo agregar departamento ---------*/
    protected static function agregar_departamento($datos)
    {
        $sql = mainModel::conectar()->prepare(
            "INSERT INTRO departamentos(departamento_id,nombre,abreviatura,created_at) VALUES(:Nombre,:Abreviatura,:Created_at)"
        );
        $sql->bindParam(":Nombre", $datos['DNI']);
        $sql->bindParam(":Abreviatura", $datos['DNI']);
        $sql->bindParam(":Created_at", $datos['DNI']);
        $sql->execute();

        return $sql;
    }
    /*--------- Modelo eliminar departamento ---------*/
    protected static function eliminar_departamento_modelo($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM departamentos WHERE departamento_id=:ID");

        $sql->bindParam(":ID", $id);
        $sql->execute();

        return $sql;
    }

    /*--------- Modelo datos departametos ---------*/
    protected static function datos_departametos_modelo($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM departamentos WHERE departamentos_id=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT departamento_id FROM departamentos WHERE departamento_id!='1'");
        }

        $sql->execute();
        return $sql;
    }



    /*--------- Modelo actualizar usuario ---------*/
    protected static function actualizar_departameno_modelo($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE departamentos SET nombre=:DNI,abreviatura=:DNI,modified_at:DNI WHERE departamento_id=:DNI");


        $sql->bindParam(":Nombre", $datos['DNI']);
        $sql->bindParam(":Abreviatura", $datos['DNI']);
        $sql->bindParam(":Modified_at", $datos['DNI']);
        $sql->execute();

        return $sql;
    }
}
