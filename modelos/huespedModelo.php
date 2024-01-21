
<?php

require_once "mainModel.php";

class huespedModelo extends mainModel
{
    /*--------- Agregar ---------*/
    protected static function agregar_huesped($datos)
    {

        $sql = mainModel::conectar()->prepare("INSERT INTO huespedes(nombre_completo,
        documento,created_at) VALUES (:Nombre,:DNI,:Created_at)");
        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":Nombre", $datos['nombre_completo']);
        $sql->bindParam(":DNI", $datos['documento']);
        $sql->bindParam(":Created_at", $createdAt);
        $sql->execute();

        return $sql;
    }

    /*--------- Eliminar ---------*/
    protected static function eliminar_huesped($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM huespedes WHERE huesped_id=:ID");
        $sql->bindParam(":ID", $id);
        $sql->execute();

        return $sql;
    }

    /*--------- Datos ---------*/

    protected static function datos_huesped($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM huespedes WHERE huesped_id=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT huesped_id FROM huespedes WHERE huesped_id!='1'");
        }

        $sql->execute();
        return $sql;
    }


    /*--------- Listar ---------*/
    protected static function listar_huesped()
    {

       /*--------- $sql = mainModel::conectar()->prepare("SELECT e.created_at, e.huesped_id, e.nombre_completo, e.documento, p.nombre AS puesto, d.nombre AS departamento FROM empleados AS e INNER JOIN puestos AS p ON p.puesto_id = e.fk_puesto INNER JOIN departamentos AS d ON d.departamento_id = p.fk_departamento ORDER BY empleado_id ASC");
        $sql->execute();---------*/

        $sql = mainModel::conectar()->prepare("SELECT * FROM huespedes ORDER BY huesped_id ASC");
        $sql->execute();

        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $resultados; // Devolvemos el array de resultados
    }



    /*--------- Actualizar ---------*/
    protected static function actualizar_huesped($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE huespedes SET nombre_completo=:Nombre,documento=:DNI WHERE huesped_id=:ID");
        $sql->bindParam(":Nombre", $datos['nombre']);
        $sql->bindParam(":DNI", $datos['documento']);
        $sql->bindParam(":ID", $datos['id']);
        $sql->execute();

        return $sql;
    }
}
