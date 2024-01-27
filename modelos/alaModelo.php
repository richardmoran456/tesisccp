
<?php

require_once "mainModel.php";

class alaModelo extends mainModel
{
    /*--------- Agregar ---------*/
    protected static function agregar_ala($datos)
    {

        $sql = mainModel::conectar()->prepare("INSERT INTO alas(nombre ,created_at) VALUES (:Nombre,:Created_at)");


        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":Nombre", $datos['nombre']);
        $sql->bindParam(":Created_at", $createdAt);
        $sql->execute();

        return $sql;
    }

    /*--------- Eliminar ---------*/
    protected static function eliminar_ala($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM alas WHERE ala_id=:ID");

        $sql->bindParam(":ID", $id);
        $sql->execute();

        return $sql;
    }

    /*--------- combobox ---------*/
    public function get_alas()
    {
        // Realiza la consulta a la base de datos para obtener las alas
    }
    /*--------- Datos ---------*/

    protected static function datos_ala($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM alas WHERE ala_id=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT ala_id FROM alas WHERE ala_id!='1'");
        }

        $sql->execute();
        return $sql;
    }


    /*--------- Listar ---------*/
    protected static function listar_ala()
    {

        $sql = mainModel::conectar()->prepare("SELECT * FROM alas ORDER BY ala_id ASC");
        $sql->execute();

        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $resultados; // Devolvemos el array de resultados
    }



    /*--------- Actualizar ---------*/
    protected static function actualizar_ala($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE alas SET nombre=:Nombre WHERE ala_id=:ID");


        $sql->bindParam(":Nombre", $datos['nombre']);
        $sql->bindParam(":ID", $datos['id']);

        $sql->execute();

        return $sql;
    }

    /*--------- Listar pisos si pasamos ID ala ---------*/

    protected static function obtener_pisos_alas($id)
    {
        // Seleccionamos todos los pisos donde su fk_ala sea igual a la que estamos pasando
        $sql = mainModel::conectar()->prepare("SELECT * FROM pisos WHERE fk_ala=:ID");
        $sql->bindParam(":ID", $id);

        $sql->execute();

        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $resultados; // Devolvemos el array de resultados
    }
}
