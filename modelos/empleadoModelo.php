
<?php

require_once "mainModel.php";

class empleadoModelo extends mainModel
{
    /*--------- Agregar ---------*/
    protected static function agregar_empleado($datos)
    {

        $sql = mainModel::conectar()->prepare("INSERT INTO empleados(nombre_completo,url_imagen,
        url_resumen,documento,fk_puesto,created_at) VALUES (:Nombre,:AV,:CV,:DNI,:FKD,:Created_at)");
        $createdAt = date('Y-m-d H:i:s');
        $campo_vacio = "SIN DATO";
        $sql->bindParam(":Nombre", $datos['nombre']);
        $sql->bindParam(":AV",   $campo_vacio);
        $sql->bindParam(":CV",   $campo_vacio);
        $sql->bindParam(":DNI", $datos['documento']);
        $sql->bindParam(":FKD", $datos['fk_puesto']);
        $sql->bindParam(":Created_at", $createdAt);
        $sql->execute();

        return $sql;
    }

    /*--------- Eliminar ---------*/
    protected static function eliminar_empleado($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM empleados WHERE empleado_id=:ID");
        $sql->bindParam(":ID", $id);
        $sql->execute();

        return $sql;
    }

    /*--------- Datos ---------*/

    protected static function datos_empleado($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM empleados WHERE empleado_id=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT empleado_id FROM empleados WHERE empleado_id!='1'");
        }

        $sql->execute();
        return $sql;
    }


    /*--------- Listar ---------*/
    protected static function listar_empleado()
    {

        $sql = mainModel::conectar()->prepare("SELECT e.created_at, e.empleado_id, e.nombre_completo, e.documento, p.nombre AS puesto, d.nombre AS departamento FROM empleados AS e INNER JOIN puestos AS p ON p.puesto_id = e.fk_puesto INNER JOIN departamentos AS d ON d.departamento_id = p.fk_departamento ORDER BY empleado_id ASC");
        $sql->execute();

        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $resultados; // Devolvemos el array de resultados
    }



    /*--------- Actualizar ---------*/
    protected static function actualizar_empleado($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE empleados SET nombre_completo=:Nombre,documento=:DNI,fk_puesto=:FKD WHERE empleado_id=:ID");


        $sql->bindParam(":Nombre", $datos['nombre']);
        $sql->bindParam(":DNI", $datos['documento']);
        $sql->bindParam(":FKD", $datos['fk_puesto']);
        $sql->bindParam(":ID", $datos['id']);

        $sql->execute();

        return $sql;
    }

    /*--------- Actualizar imagen---------*/
    protected static function actualizar_empleado_imagen($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE empleados SET url_imagen=:IMAGEN  WHERE empleado_id=:ID");


        $sql->bindParam(":IMAGEN", $datos['url_imagen']);
        $sql->bindParam(":ID", $datos['id']);

        $sql->execute();

        return $sql;
    }

    /*--------- Actualizar resumen---------*/
    protected static function actualizar_empleado_resumen($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE empleados SET url_resumen=:RESUMEN  WHERE empleado_id=:ID");


        $sql->bindParam(":RESUMEN", $datos['url_resumen']);
        $sql->bindParam(":ID", $datos['id']);

        $sql->execute();

        return $sql;
    }
}
