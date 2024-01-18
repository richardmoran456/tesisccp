
<?php

require_once "mainModel.php";

class departamentoModelo extends mainModel
{
    /*--------- Agregar ---------*/
    protected static function agregar_departamento($datos)
    {

        $sql = mainModel::conectar()->prepare("INSERT INTO departamentos(nombre,abreviatura ,created_at) VALUES (:Nombre,:Abre,:Created_at)");
        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":Nombre", $datos['nombre']);
        $sql->bindParam(":Abre", $datos['abreviatura']);
        $sql->bindParam(":Created_at", $createdAt);
        $sql->execute();

        return $sql;
    }

    /*--------- Eliminar ---------*/
    protected static function eliminar_departamento($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM departamentos WHERE departamento_id=:ID");
        $sql->bindParam(":ID", $id);
        $sql->execute();

        return $sql;
    }

    /*--------- Datos ---------*/

    protected static function datos_departamento($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM departamentos WHERE departamento_id=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT departamento_id FROM departamentos WHERE departamento_id!='1'");
        }

        $sql->execute();
        return $sql;
    }


    /*--------- Listar ---------*/
    protected static function listar_departamento()
    {

        $sql = mainModel::conectar()->prepare("SELECT * FROM departamentos ORDER BY departamento_id ASC");
        $sql->execute();

        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $resultados; // Devolvemos el array de resultados
    }



    /*--------- Actualizar ---------*/
    protected static function actualizar_departamento($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE departamentos SET nombre=:Nombre,abreviatura=:ABR WHERE departamento_id=:ID");


        $sql->bindParam(":Nombre", $datos['nombre']);
        $sql->bindParam(":ABR", $datos['abr']);
        $sql->bindParam(":ID", $datos['id']);

        $sql->execute();

        return $sql;
    }
}
