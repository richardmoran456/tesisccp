<?php

if ($peticionAjax) {
	require_once "../modelos/equipoModelo.php";
} else {
	require_once "./modelos/equipoModelo.php";
}

class equipoControlador extends equipoModelo
{
	/*--------- Controlador agregar modelo ---------*/
	public function agregar_equipo_controlador()
	{

		$modelo = mainModel::limpiar_cadena($_POST['modelo_equipo_reg']);
		$nserial = mainModel::limpiar_cadena($_POST['nserial_equipo_reg']);
		$estado = mainModel::limpiar_cadena($_POST['estado_equipo_reg']);
		$tipo_equipo = mainModel::limpiar_cadena($_POST['tipo_equipo_reg']);
		$descripcion_equipo = mainModel::limpiar_cadena($_POST['descripcion_equipo_reg']);


		/*== comprobar campos vacios ==*/
		if ($modelo == "" || $nserial == "" || $estado == "" || $tipo_equipo == "" || $descripcion_equipo == "") {
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
		if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}", $modelo)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El MODELO no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,10}", $nserial)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "El Numero del Serial no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}


		/*== Enviar datos a la BD ==*/

		$agregar_equipo_reg = [
			"modelo" => $modelo,
			"nserial" => $nserial,
			"estado_equipo" => $estado,
			"descripcion_equipo" => $descripcion_equipo,
			"tipo_equipo" => $tipo_equipo
		];



		$agregar_equipo = equipoModelo::agregar_equipo($agregar_equipo_reg);

		if ($agregar_equipo->rowCount() == 1) {
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
	public function listar_equipo_controlador()
	{
		$datos = equipoModelo::listar_equipo();
		return $datos;
	}

	/*--------- Controlador eliminar módulo ---------*/
	public function eliminar_equipo_controlador()
	{
		/** Recibiendo ID de la vista */
		$id = mainModel::decryption($_POST['equipo_id_del']);
		$id = mainModel::limpiar_cadena($id);

		/** Comprobar si tiene los permisos */



		/** Eliminar */

		$eliminar_registro = equipoModelo::eliminar_equipo($id);

		if ($eliminar_registro->rowCount() == 1) {
			$alerta = [
				"Alerta" => "recargar",
				"Titulo" => "equipo eliminado",
				"Texto" => "El equipo ha sido eliminado del sistema exitosamente",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No hemos podido eliminar el equipo, por favor intente nuevamente",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}

	/*--------- Controlador datos  ---------*/
	public function datos_equipo_controlador($tipo, $id)
	{
		$tipo = mainModel::limpiar_cadena($tipo);

		$id = mainModel::decryption($id);
		$id = mainModel::limpiar_cadena($id);

		return equipoModelo::datos_equipo($tipo, $id);
	}

	/*--------- Controlador actualizar  ---------*/
	public function actualizar_equipo_controlador()
	{
		$id = mainModel::decryption($_POST['equipo_id_up']);
		$id = mainModel::limpiar_cadena($id);
		$modelo = mainModel::limpiar_cadena($_POST['modelo_equipo_up']);
		$nserial = mainModel::limpiar_cadena($_POST['nserial_equipo_reg']);
		$estado = mainModel::limpiar_cadena($_POST['estado_equipo_reg']);
		$tipo_equipo = mainModel::limpiar_cadena($_POST['tipo_equipo_reg']);
		$descripcion_equipo = mainModel::limpiar_cadena($_POST['descripcion_equipo_reg']);

		$datos_equipo_up = [
			"modelo" => $modelo,
			"nserial" => $nserial,
			"estado" => $estado,
			"tipo_equipo" => $tipo_equipo,
			"descripcion_equipo" => $descripcion_equipo,
			"id" => $id
		];

		if (equipoModelo::actualizar_equipo($datos_equipo_up)) {
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
