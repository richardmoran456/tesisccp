<?php

if ($peticionAjax) {
	require_once "../modelos/estadisticaModelo.php";
} else {
	require_once "./modelos/estadisticaModelo.php";
}

class estadisticasControlador extends estadisticaModelo
{


	/*--------- Mostrar cantidad de usuarios registrados ---------*/
	public function show_total_usuarios()
	{
		$datos = estadisticaModelo::cantidad_usuarios_registrados();
		return $datos;
	}

	/*--------- Mostrar cantidad de departamentos registrados ---------*/
	public function show_total_departamentos()
	{
		$datos = estadisticaModelo::cantidad_departamentos_registrados();
		return $datos;
	}
}

