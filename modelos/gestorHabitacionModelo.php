
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




    /*--------- Listar los ultimos huespedes ---------*/
    protected static function obtener_ultimos_huespedes($id)
    {
        $sql = mainModel::conectar()->prepare("SELECT 
        hh.fk_huesped,hh.fk_habitacion,hh.entrada,hh.salida,hh.created_at,h.nombre_completo,h.documento        
        
         FROM huesped_habitaciones as hh INNER JOIN huespedes as h ON h.huesped_id=hh.fk_huesped WHERE fk_habitacion=:ID
        ORDER BY huesped_hab_id ASC
        LIMIT 10");
        $sql->bindParam(":ID", $id);
        $sql->execute();
        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultados; // Devolvemos el array de resultados
    }
    /*--------- Registro de huesped y retornar id ---------*/

    protected static function registro_huesped($datos)
    {

        $sql = mainModel::conectar()->prepare("INSERT INTO huespedes(nombre_completo,
        documento,created_at) VALUES (:Nombre,:DNI,:Created_at)");
        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":Nombre", $datos['nombre_completo']);
        $sql->bindParam(":DNI", $datos['documento']);
        $sql->bindParam(":Created_at", $createdAt);
        $sql->execute();

        // Obtiene el ID del registro recién insertado
        $resultado = mainModel::conectar()->query("SELECT MAX(huesped_id) as id FROM huespedes");
        $id = $resultado->fetch()['id'];
        // Retorna el ID
        return $id;
    }
}
