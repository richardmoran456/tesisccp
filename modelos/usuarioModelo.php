
<?php

require_once "mainModel.php";

class usuarioModelo extends mainModel
{
    /*--------- Agregar ---------*/
    protected static function agregar_usuario($datos)
    {

        $sql = mainModel::conectar()->prepare("INSERT INTO usuarios(nombre_completo,username,passwd,fk_departamento ,created_at) VALUES (:Nombre,:USERNAME,:CLAVE,:FKD,:Created_at)");
        $createdAt = date('Y-m-d H:i:s');
        $sql->bindParam(":Nombre", $datos['nombre']);
        $sql->bindParam(":USERNAME", $datos['username']);
        $sql->bindParam(":CLAVE", $datos['clave']);
        $sql->bindParam(":FKD", $datos['fk_departamento']);
        $sql->bindParam(":Created_at", $createdAt);
        $sql->execute();

        return $sql;
    }

    /*--------- Eliminar ---------*/
    protected static function eliminar_usuario($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM usuarios WHERE usuario_id=:ID");
        $sql->bindParam(":ID", $id);
        $sql->execute();

        return $sql;
    }

    /*--------- Datos ---------*/

    protected static function datos_usuario($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM usuarios WHERE usuario_id=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT usuario_id FROM usuarios WHERE usuario_id!='1'");
        }

        $sql->execute();
        return $sql;
    }


    /*--------- Listar ---------*/
    protected static function listar_usuario()
    {

        $sql = mainModel::conectar()->prepare("SELECT usuarios.usuario_id,usuarios.nombre_completo,usuarios.username,usuarios.created_at,departamentos.departamento_id,departamentos.nombre as departamento
         FROM usuarios INNER JOIN departamentos ON usuarios.fk_departamento = departamentos.departamento_id ORDER BY usuario_id ASC");
        $sql->execute();

        // Fetcheamos los resultados como un array asociativo
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $resultados; // Devolvemos el array de resultados
    }



    /*--------- Actualizar ---------*/
    protected static function actualizar_usuario($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE usuarios SET nombre_completo=:Nombre,username=:USERNAME,fk_departamento=:FKD WHERE usuario_id=:ID");


        $sql->bindParam(":Nombre", $datos['nombre']);
        $sql->bindParam(":USERNAME", $datos['username']);
        $sql->bindParam(":FKD", $datos['fk_departamento']);
        $sql->bindParam(":ID", $datos['id']);

        $sql->execute();

        return $sql;
    }

    /*--------- Actualizar Avatar---------*/
    protected static function actualizar_usuario_avatar($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE usuarios SET avatar=:AVATAR  WHERE usuario_id=:ID");


        $sql->bindParam(":AVATAR", $datos['avatar']);
        $sql->bindParam(":ID", $datos['id']);

        $sql->execute();

        return $sql;
    }
}
