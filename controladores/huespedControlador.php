<?php

if ($peticionAjax) {
	require_once "../modelos/huespedModelo.php";
} else {
	require_once "./modelos/huespedModelo.php";
}

class huespedControlador extends huespedModelo
{
	/*--------- Controlador agregar modelo ---------*/
	public function agregar_huesped_controlador()
	{

		$nombre = mainModel::limpiar_cadena($_POST['nombre_huesped_reg']);
		$documento = mainModel::limpiar_cadena($_POST['documento_huesped_reg']);



		/*== comprobar campos vacios ==*/
		if ($nombre == "" || $documento == "" ) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No has llenado todos los campos que son obligatorios",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}
		/*== Verificando integridad de los datos ==*/
		if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $nombre)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El NOMBRE no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}



		/*== Enviar datos a la BD ==*/

		$data = [
			"nombre_completo" => $nombre,
			"documento" => $documento,
		];



		$agregar_huesped = huespedModelo::agregar_huesped($data);

		if ($agregar_huesped->rowCount() == 1) {
			$alerta = [
				"Alerta" => "limpiar",
				"Titulo" => "empleado registrado",
				"Texto" => "Los datos del huesped han sido registrados con exito",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No hemos podido registrar el huesped",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}
	/* Fin controlador */

	/*--------- Controlador listar modelo ---------*/
	public function listar_huesped_controlador()
	{
		$datos = huespedModelo::listar_huesped();
		return $datos;
	}

	/*--------- Controlador eliminar módulo ---------*/
	public function eliminar_huesped_controlador()
	{
		/** Recibiendo ID de la vista */
		$id = mainModel::decryption($_POST['huesped_id_del']);
		$id = mainModel::limpiar_cadena($id);

		/** Comprobar si tiene los permisos */



		/** Eliminar */

		$eliminar_registro = huespedModelo::eliminar_huesped($id);

		if ($eliminar_registro->rowCount() == 1) {
			$alerta = [
				"Alerta" => "recargar",
				"Titulo" => "Huesped eliminado",
				"Texto" => "El huesped ha sido eliminado del sistema exitosamente",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No hemos podido eliminar el huesped, por favor intente nuevamente",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}

	/*--------- Controlador datos  ---------*/
	public function datos_huesped_controlador($tipo, $id)
	{
		$tipo = mainModel::limpiar_cadena($tipo);

		$id = mainModel::decryption($id);
		$id = mainModel::limpiar_cadena($id);

		return huespedModelo::datos_huesped($tipo, $id);
	}

	/*--------- Controlador actualizar  ---------*/
	public function actualizar_huesped_controlador()
	{
		$id = mainModel::decryption($_POST['huesped_id_up']);
		$id = mainModel::limpiar_cadena($id);
		$nombre = mainModel::limpiar_cadena($_POST['nombre_huesped_up']);
		$documento = mainModel::limpiar_cadena($_POST['documento_huesped_up']);


		$datos_huesped_up = [
			"nombre" => $nombre,
			"documento" => $documento,
			"id" => $id
		];

		if (huespedModelo::actualizar_huesped($datos_huesped_up)) {
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
