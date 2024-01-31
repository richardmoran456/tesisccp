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

	/*--------- Mostrar cantidad de equipos registrados ---------*/
	public function show_total_equipos()
	{
		$datos = estadisticaModelo::cantidad_equipos_registrados();
		return $datos;
	}
	
	/*--------- Mostrar cantidad de equipos registrados dañados ---------*/
	public function show_total_equipos_mal()
	{
		$datos = estadisticaModelo::cantidad_equipos_mal();
		return $datos;
	}

	/*--------- Mostrar cantidad de empleados registrados ---------*/
	public function show_total_empleados()
	{
		$datos = estadisticaModelo::cantidad_empleados_registrados();
		return $datos;
	}

	/*--------- Mostrar cantidad de solicitudes abiertas ---------*/
	public function show_total_solicitudes_abiertas()
	{
		$datos = estadisticaModelo::cantidad_solicitudes_abiertas();
		return $datos;
	}

	/*--------- Mostrar cantidad de solicitudes completadas ---------*/
	public function show_total_solicitudes_completadas()
	{
		$datos = estadisticaModelo::cantidad_solicitudes_completadas();
		return $datos;
	}

	/*--------- Mostrar cantidad de solicitudes cerradas ---------*/
	public function show_total_solicitudes_cerradas()
	{
		$datos = estadisticaModelo::cantidad_solicitudes_cerradas();
		return $datos;
	}

	/*--------- Mostrar cantidad de tareas registrados ---------*/
	public function show_total_tareas()
	{
		$datos = estadisticaModelo::cantidad_tareas_registradas();
		return $datos;
	}

}

