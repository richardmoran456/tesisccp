<?php
if ($peticionAjax) {
    require_once "../modelos/usuarioModelo.php";
} else {
    require_once "./modelos/usuarioModelo.php";
}

class usuarioControlador extends usuarioModelo
{
    /*--------- Controlador paginar usuario ---------*/
    public function paginador_usuario_controlador($pagina, $registros, $privilegio, $id, $url, $busqueda)
    {
    }
}
