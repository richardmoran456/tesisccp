
<?php

require_once "mainModel.php";

class equipoModelo extends mainModel
{
    /*--------- Agregar ---------*/
    protected static function agregar_equipo($datos)
    {

        $sql = mainModel::conectar()->prepare("INSERT INTO equipos(
            modelo,
            nserial,
            estado,
            descripcion_equipo,
            tipo_equipo,
            created_at) 
            VALUES (
                :Modelo,
            :Nserial,
            :Estado,
            :Descripcion_equipo,
            :Tipo_equipo,
            :Created_at)");
        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":Modelo", $datos['modelo']);
        $sql->bindParam(":Nserial", $datos['nserial']);
        $sql->bindParam(":Estado", $datos['estado_equipo']);
        $sql->bindParam(":Descripcion_equipo", $datos['descripcion_equipo']);
        $sql->bindParam(":Tipo_equipo", $datos['tipo_equipo']);
        $sql->bindParam(":Created_at", $createdAt);
        $sql->execute();

        return $sql;
    }

    /*--------- Eliminar ---------*/
    protected static function eliminar_equipo($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM equipos WHERE equipo_id=:ID");
        $sql->bindParam(":ID", $id);
        $sql->execute();

        return $sql;
    }

    /*--------- Datos ---------*/

    protected static function datos_equipo($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM equipos WHERE equipo_id=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT equipo_id FROM equipos WHERE equipo_id!='1'");
        }

        $sql->execute();
        return $sql;
    }


    /*--------- Listar ---------*/
    protected static function listar_equipo()
    {

        $sql = mainModel::conectar()->prepare("SELECT * FROM equipos ORDER BY equipo_id ASC");
        $sql->execute();

        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $resultados; // Devolvemos el array de resultados
    }



    /*--------- Actualizar ---------*/
    protected static function actualizar_equipo($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE equipos SET modelo=:Modelo,nserial=:nserial,estado=:Estado,descripcion_equipo=:Descripcion_equipo,tipo_equipo=:Tipo_equipo WHERE equipo_id=:ID");


        $sql->bindParam(":Modelo", $datos['modelo']);
        $sql->bindParam(":nserial", $datos['nserial']);
        $sql->bindParam(":Estado", $datos['estado']);
        $sql->bindParam(":Descripcion_equipo", $datos['descripcion_equipo']);
        $sql->bindParam(":Tipo_equipo", $datos['tipo_equipo']);
        $sql->bindParam(":ID", $datos['id']);
        $sql->execute();

        return $sql;
    }
}
