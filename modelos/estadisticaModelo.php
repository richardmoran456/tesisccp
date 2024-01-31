
<?php

require_once "mainModel.php";

class estadisticaModelo extends mainModel
{


    /*--------- Listar ---------*/
    /**
     * Las consultas a la base de datos se realizan de esta manera
     * https://lineadecodigo.com/sql/contar-el-numero-de-registros-en-sql/
     */
    protected static function cantidad_usuarios_registrados()
    {

        $sql = mainModel::conectar()->prepare("SELECT count(*) FROM usuarios");
        $sql->execute();

        // Fetch the count using fetchColumn():
        $cantidad_usuarios = $sql->fetchColumn();

        // Return the count (not the PDOStatement object):
        return $cantidad_usuarios;
    }
}
