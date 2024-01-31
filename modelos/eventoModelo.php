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
}
