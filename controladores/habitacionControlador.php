<?php

if ($peticionAjax) {
	require_once "../modelos/habitacionModelo.php";
} else {
	require_once "./modelos/habitacionModelo.php";
}


class habitacionControlador extends habitacionModelo
{
	/*--------- Controlador agregar modelo ---------*/
	public function agregar_habitacion_controlador()
	{

		$identificador_habitacion = mainModel::limpiar_cadena($_POST['identificador_habitacion_reg']);
		$tipo_habitacion = mainModel::limpiar_cadena($_POST['tipo_habitacion_reg']);
		$fk_piso  = mainModel::limpiar_cadena($_POST['fk_piso_reg']);



		/*== comprobar campos vacios ==*/
		if ($identificador_habitacion == "" || $tipo_habitacion == "" || $fk_piso == "") {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No has llenado todos los campos que son obligatorios",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}


		/*== Enviar datos a la BD ==*/

		$datos = [
			"identificador_habitacion" => $identificador_habitacion,
			"tipo_habitacion" => $tipo_habitacion,
			"fk_piso" => $fk_piso
		];

		// var_dump($datos);



		$agregar_habitacion = habitacionModelo::agregar_habitacion($datos);

		if ($agregar_habitacion->rowCount() == 1) {
			$alerta = [
				"Alerta" => "limpiar",
				"Titulo" => "Módulo registrado",
				"Texto" => "Los datos del módulo han sido registrados con exito",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No hemos podido registrar el módulo",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}
	/* Fin controlador */

	/*--------- Controlador listar modelo ---------*/
	public function listar_habitacion_controlador()
	{
		$datos = habitacionModelo::listar_habitacion();
		return $datos;
	}


	/*--------- Controlador listar modelo ---------*/
	public function listar_habitacion_recepcion_controlador()
	{
		$datos = habitacionModelo::listar_habitacion_recepcion();
		return $datos;
	}

	/*--------- Controlador eliminar módulo ---------*/
	public function eliminar_habitacion_controlador()
	{
		/** Recibiendo ID de la vista */
		$id = mainModel::decryption($_POST['habitacion_id_del']);
		$id = mainModel::limpiar_cadena($id);

		/** Comprobar si tiene los permisos */



		/** Eliminar */

		$eliminar_registro = habitacionModelo::eliminar_habitacion($id);

		if ($eliminar_registro->rowCount() == 1) {
			$alerta = [
				"Alerta" => "recargar",
				"Titulo" => "habitacion eliminada",
				"Texto" => " La habitacion ha sido eliminado del sistema exitosamente",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No hemos podido eliminar la habitacion, por favor intente nuevamente",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}

	/*--------- Controlador datos  ---------*/
	public function datos_habitacion_controlador($tipo, $id)
	{
		$tipo = mainModel::limpiar_cadena($tipo);

		$id = mainModel::decryption($id);
		$id = mainModel::limpiar_cadena($id);

		return habitacionModelo::datos_habitacion($tipo, $id);
	}

	/*--------- Controlador actualizar  ---------*/
	public function actualizar_habitacion_controlador()
	{
		$id = mainModel::decryption($_POST['habitacion_id_up']);
		$id = mainModel::limpiar_cadena($id);
		$nombre = mainModel::limpiar_cadena($_POST['habitacion_up']);
		$abr = mainModel::limpiar_cadena($_POST['identificador_habitacion_up']);

		$datos_habitacion_up = [
			"nombre" => $nombre,
			"abr" => $abr,
			"id" => $id
		];

		if (habitacionModelo::actualizar_habitacion($datos_habitacion_up)) {
			$alerta = [
				"Alerta" => "recargar",
				"Titulo" => "Datos actualizados",
				"Texto" => "Los datos han sido actualizados con exito",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No hemos podido actualizar los datos, por favor intente nuevamente",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}
}
