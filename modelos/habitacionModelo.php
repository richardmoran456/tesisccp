
<?php

require_once "mainModel.php";

class habitacionModelo extends mainModel
{
    /*--------- Agregar ---------*/
    protected static function agregar_habitacion($datos)
    {

        $sql = mainModel::conectar()->prepare("INSERT INTO habitaciones(identificador_habitacion,tipo_habitacion,fk_piso,created_at) VALUES (:IDEN,:TH,:FK,:Created_at)");
        $createdAt = date('Y-m-d H:i:s');

        $sql->bindParam(":IDEN", $datos['identificador_habitacion']);
        $sql->bindParam(":TH", $datos['tipo_habitacion']);
        $sql->bindParam(":FK", $datos['fk_piso']);
        $sql->bindParam(":Created_at", $createdAt);
        $sql->execute();

        return $sql;
    }

    /*--------- Eliminar ---------*/
    protected static function eliminar_habitacion($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM habitaciones WHERE habitacion_id=:ID");
        $sql->bindParam(":ID", $id);
        $sql->execute();

        return $sql;
    }

    /*--------- Datos ---------*/

    protected static function datos_habitacion($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM habitaciones WHERE habitacion_id=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT habitacion_id FROM habitaciones WHERE habitacion_id!='1'");
        }

        $sql->execute();
        return $sql;
    }


    /*--------- Listar ---------*/
    protected static function listar_habitacion()
    {

        $sql = mainModel::conectar()->prepare("SELECT h.identificador_habitacion as identificador, h.tipo_habitacion as tipo, h.habitacion_id ,h.created_at, concat(a.nombre ,' ',p.nombre) as ubicacion FROM habitaciones as h INNER JOIN pisos as p ON p.piso_id=h.fk_piso INNER JOIN alas as a ON a.ala_id=p.fk_ala ORDER BY habitacion_id ASC");
        $sql->execute();

        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $resultados; // Devolvemos el array de resultados
    }



    /*--------- Actualizar ---------*/
    protected static function actualizar_habitacion($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE habitaciones SET nombre=:Nombre,abreviatura=:ABR WHERE departamento_id=:ID");


        $sql->bindParam(":Nombre", $datos['nombre']);
        $sql->bindParam(":ABR", $datos['abr']);
        $sql->bindParam(":ID", $datos['id']);

        $sql->execute();

        return $sql;
    }
}
