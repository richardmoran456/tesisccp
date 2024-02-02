
<?php

require_once "mainModel.php";

class gestorHabitacionModelo extends mainModel
{
    /*--------- Listar ---------*/
    protected static function buscar_huesped($busqueda)
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM huespedes WHERE nombre_completo LIKE '%$busqueda%'");
        $sql->execute();
        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultados; // Devolvemos el array de resultados
    }


    /*--------- Asignar una habitacion ---------*/
    protected static function registro_asignacion($datos)
    {

        $sql = mainModel::conectar()->prepare("INSERT INTO huesped_habitaciones(fk_huesped,
        fk_habitacion,
        entrada,
        salida,created_at) VALUES (:FKHu,:FKHA,:ENTRADA,:SALIDA,:Created_at)");


        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":FKHu", $datos['fk_huesped']);
        $sql->bindParam(":FKHA", $datos['fk_habitacion']);
        $sql->bindParam(":ENTRADA", $datos['entrada']);
        $sql->bindParam(":SALIDA", $datos['salida']);

        $sql->bindParam(":Created_at", $createdAt);
        $sql->execute();

        return $sql;
    }


    protected static function actualizar_habitacion($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE habitaciones SET estatus_habitacion=:STA WHERE habitacion_id=:ID");


        $sql->bindParam(":ID", $datos['habitacion_id']);
        $sql->bindParam(":STA", $datos['estatus_habitacion']);

        $sql->execute();

        return $sql;
    }
}
