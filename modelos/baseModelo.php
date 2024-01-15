
<?php

require_once "mainModel.php";

class baseModelo extends mainModel
{
    /*--------- Agregar ---------*/
    protected static function agregar_modulo($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTRO tabla(valor1,valor2) VALUES (:Valor1,:Valor2)");
        $sql->bindParam(":Valor1", $datos['VALOR_FORMULARIO']);
        $sql->execute();

        return $sql;
    }

    /*--------- Eliminar ---------*/
    protected static function eliminar_modulo($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM tabla WHERE valor_id=:ID");
        $sql->bindParam(":ID", $id);
        $sql->execute();

        return $sql;
    }

    /*--------- Datos ---------*/

    protected static function datos_modelo($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM tabla WHERE valor_id=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT valor_id FROM tabla WHERE valor_id!='1'");
        }

        $sql->execute();
        return $sql;
    }

    /*--------- Actualizar ---------*/
    protected static function actualizar_departameno_modelo($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE tabla SET valor=:DNI WHERE valor_id=:DNI");


        $sql->bindParam(":DNI", $datos['DNI']);
        $sql->execute();

        return $sql;
    }
}
