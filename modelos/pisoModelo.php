
<?php

require_once "mainModel.php"; 

class pisoModelo extends mainModel
{
    /*--------- Agregar ---------*/
    protected static function agregar_piso($datos)
    {

        $sql = mainModel::conectar()->prepare("INSERT INTO pisos(nombre,fk_ala ,created_at) VALUES (:Nombre,:FKD,:Created_at)");
        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":Nombre", $datos['nombre']);
        $sql->bindParam(":FKD", $datos['fk_ala']);
        $sql->bindParam(":Created_at", $createdAt);
        $sql->execute();

        return $sql;
    }

    /*--------- Eliminar ---------*/
    protected static function eliminar_piso($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM pisos WHERE piso_id=:ID");
        $sql->bindParam(":ID", $id);
        $sql->execute();

        return $sql;
    }

    /*--------- Datos ---------*/

    protected static function datos_puesto($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM pisos WHERE piso_id=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT piso_id FROM pisos WHERE piso_id!='1'");
        }

        $sql->execute();
        return $sql;
    }


    /*--------- Listar ---------*/
    protected static function listar_piso()
    {

        $sql = mainModel::conectar()->prepare("SELECT pisos.piso_id,piso.nombre,pisos.created_at,alas.ala_id,alas.nombre as ala
         FROM pisos INNER JOIN alas ON pisos.fk_ala = alas.ala_id ORDER BY piso_id ASC");
        $sql->execute();

        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $resultados; // Devolvemos el array de resultados
    }

    protected static function listar_piso_combo()
    {

        $sql = mainModel::conectar()->prepare("SELECT p.piso_id, p.nombre, d.abreviatura, d.nombre AS ala FROM pisos AS p INNER JOIN alas AS d ON d.ala_id = p.fk_ala");

        $sql->execute();

        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $resultados; // Devolvemos el array de resultados
    }



    /*--------- Actualizar ---------*/
    protected static function actualizar_piso($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE pisos SET nombre=:Nombre,fk_ala=:FKD WHERE piso_id=:ID");


        $sql->bindParam(":Nombre", $datos['nombre']);
        $sql->bindParam(":FKD", $datos['fk_ala']);
        $sql->bindParam(":ID", $datos['id']);

        $sql->execute();

        return $sql;
    }
}
