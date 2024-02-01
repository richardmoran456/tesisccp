<?php
require_once "mainModel.php";

class eventoModelo extends mainModel
{
    /*--------- Listar ---------*/
    protected static function listar_eventos()
    {

        $sql = mainModel::conectar()->prepare("SELECT * FROM eventos");
        $sql->execute();

        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $resultados; // Devolvemos el array de resultados
    }


    /*--------- Agregar ---------*/
    protected static function agregar_evento($datos)
    {

        $sql = mainModel::conectar()->prepare("INSERT INTO eventos(titulo_evento, descripcion_evento, inicio_evento, finaliza_evento ,created_at) VALUES (:Title,:Descr,:Inicio,:Fin,:Created_at)");
        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":Title", $datos['titulo_evento']);
        $sql->bindParam(":Descr", $datos['descripcion_evento']);
        $sql->bindParam(":Inicio", $datos['inicio_evento']);
        $sql->bindParam(":Fin", $datos['finaliza_evento']);
        $sql->bindParam(":Created_at", $createdAt);

        $sql->execute();

        return $sql;
    }

    /*--------- Datos ---------*/

    protected static function datos_evento($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM eventos WHERE evento_id=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT evento_id FROM eventos WHERE evento_id!='1'");
        }

        $sql->execute();
        return $sql;
    }

    /*--------- Actualizar ---------*/
    protected static function actualizar_evento($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE eventos SET titulo_evento=:Title,descripcion_evento=:Descr,inicio_evento=:Inicio,finaliza_evento=:Fin  WHERE evento_id=:ID");


        $sql->bindParam(":Title", $datos['titulo_evento']);
        $sql->bindParam(":Descr", $datos['descripcion_evento']);
        $sql->bindParam(":Inicio", $datos['inicio_evento']);
        $sql->bindParam(":Fin", $datos['finaliza_evento']);
        $sql->bindParam(":ID", $datos['evento_id']);
        $sql->execute();

        return $sql;
    }
}
