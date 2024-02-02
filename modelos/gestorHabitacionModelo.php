
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
}
