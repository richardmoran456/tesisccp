<?php

if ($peticionAjax) {
	require_once "../modelos/empleadoModelo.php";
} else {
	require_once "./modelos/empleadoModelo.php";
}

class empleadoControlador extends empleadoModelo
{
	/*--------- Controlador agregar modelo ---------*/
	public function agregar_empleado_controlador()
	{

		$nombre = mainModel::limpiar_cadena($_POST['nombre_empleado_reg']);
		$documento = mainModel::limpiar_cadena($_POST['documento_empleado_reg']);
		$fk_puesto = mainModel::limpiar_cadena($_POST['fk_puesto_reg']);

		/*== comprobar campos vacios ==*/
		if ($nombre == "" || $documento == "" || $fk_puesto == "") {
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
			"nombre" => $nombre,
			"documento" => $documento,
			"fk_puesto" => $fk_puesto
		];



		$agregar_empleado = empleadoModelo::agregar_empleado($data);

		if ($agregar_empleado->rowCount() == 1) {
			$alerta = [
				"Alerta" => "limpiar",
				"Titulo" => "empleado registrado",
				"Texto" => "Los datos del empleado han sido registrados con exito",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No hemos podido registrar el empleado",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}
	/* Fin controlador */

	/*--------- Controlador listar modelo ---------*/
	public function listar_empleado_controlador()
	{
		$datos = empleadoModelo::listar_empleado();
		return $datos;
	}

	/*--------- Controlador eliminar módulo ---------*/
	public function eliminar_empleado_controlador()
	{
		/** Recibiendo ID de la vista */
		$id = mainModel::decryption($_POST['empleado_id_del']);
		$id = mainModel::limpiar_cadena($id);

		/** Comprobar si tiene los permisos */



		/** Eliminar */

		$eliminar_registro = empleadoModelo::eliminar_empleado($id);

		if ($eliminar_registro->rowCount() == 1) {
			$alerta = [
				"Alerta" => "recargar",
				"Titulo" => "Empleado eliminado",
				"Texto" => "El empleado ha sido eliminado del sistema exitosamente",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No hemos podido eliminar el empleado, por favor intente nuevamente",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}

	/*--------- Controlador datos  ---------*/
	public function datos_empleado_controlador($tipo, $id)
	{
		$tipo = mainModel::limpiar_cadena($tipo);

		$id = mainModel::decryption($id);
		$id = mainModel::limpiar_cadena($id);

		return empleadoModelo::datos_empleado($tipo, $id);
	}

	/*--------- Controlador actualizar  ---------*/
	public function actualizar_empleado_controlador()
	{
		$id = mainModel::decryption($_POST['empleado_id_up']);
		$id = mainModel::limpiar_cadena($id);
		$nombre = mainModel::limpiar_cadena($_POST['nombre_empleado_up']);
		$documento = mainModel::limpiar_cadena($_POST['documento_empleado_up']);
		$fk_puesto = mainModel::limpiar_cadena($_POST['fk_puesto_up']);

		$datos_empleado_up = [
			"nombre" => $nombre,
			"documento" => $documento,
			"fk_puesto" => $fk_puesto,
			"id" => $id
		];

		if (empleadoModelo::actualizar_empleado($datos_empleado_up)) {
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
