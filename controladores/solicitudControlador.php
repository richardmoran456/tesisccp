<?php

if ($peticionAjax) {
	require_once "../modelos/solicitudModulo.php";
} else {
	require_once "./modelos/solicitudModulo.php";
}

class solicitudControlador extends solicitudModulo
{
	/*--------- Controlador agregar modelo ---------*/
	/** Las solicitudes las pueden crear todos los usuarios pero solo editan los departamentos que esten relacionados */
	public function agregar_solicitud_controlador()
	{

		$titulo = mainModel::limpiar_cadena($_POST['titulo_solicitud_reg']);
		$descripcion = mainModel::limpiar_cadena($_POST['descripción_solicitud_reg']);

		/*== comprobar campos vacios ==*/
		if ($titulo == "" || $descripcion == "") {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No has llenado todos los campos que son obligatorios",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}
		session_start(['name' => 'SPM']);




		/*== Enviar datos a la BD ==*/

		$data = [
			"titulo" => $titulo,
			"descripcion" => $descripcion,
			'estatus_solicitud' => 'abierto',
			'fk_creado' => $_SESSION['id_spm'],
			'fk_departamento_origen' => $_SESSION['privilegio_spm'],
			'fk_departamento_destino' => 5 // El 5to corresponde al mantenimiento
		];




		$solicitud_id = solicitudModulo::agregar_solicitud_with_id($data);


		$data_historial = [
			'descripcion_solicitud' => $_SESSION['nombre_spm'] . ' ha creado la solicitud',
			'fk_usuario' => $_SESSION['id_spm'],
			'fk_solicitud' => $solicitud_id
		];




		if ($solicitud_id > 0) {

			// Registramos en el historial cuando se crea la solicitud
			$registrar_historial = solicitudModulo::agregar_historial_solicitud($data_historial);

			$alerta = [
				"Alerta" => "limpiar",
				"Titulo" => "Puesto registrado",
				"Texto" => "Los datos del puesto han sido registrados con exito",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No hemos podido registrar el puesto",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}
	/* Fin controlador */

	/*--------- Controlador listar modelo ---------*/
	public function listar_solicitud_controlador()
	{
		$datos = solicitudModulo::listar_solicitud();
		return $datos;
	}

	/*--------- Controlador eliminar módulo ---------*/
	public function eliminar_puesto_controlador()
	{
		/** Recibiendo ID de la vista */
		$id = mainModel::decryption($_POST['puesto_id_del']);
		$id = mainModel::limpiar_cadena($id);

		/** Comprobar si tiene los permisos */



		/** Eliminar */

		$eliminar_registro = puestoModelo::eliminar_puesto($id);

		if ($eliminar_registro->rowCount() == 1) {
			$alerta = [
				"Alerta" => "recargar",
				"Titulo" => "puesto eliminado",
				"Texto" => "El puesto ha sido eliminado del sistema exitosamente",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No hemos podido eliminar el puesto, por favor intente nuevamente",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}

	/*--------- Controlador datos  ---------*/
	public function datos_puesto_controlador($tipo, $id)
	{
		$tipo = mainModel::limpiar_cadena($tipo);
		$id = mainModel::decryption($id);
		$id = mainModel::limpiar_cadena($id);

		return puestoModelo::datos_puesto($tipo, $id);
	}


	/*--------- Controlador carga combo  ---------*/
	public function datos_puesto_combo_controlador()
	{
		$data = puestoModelo::listar_puesto_combo();
		return $data;
	}



	/*--------- Controlador actualizar  ---------*/
	public function actualizar_puesto_controlador()
	{
		$id = mainModel::decryption($_POST['puesto_id_up']);
		$id = mainModel::limpiar_cadena($id);
		$nombre = mainModel::limpiar_cadena($_POST['nombre_puesto_up']);
		$fk_departamento = mainModel::limpiar_cadena($_POST['fk_departamento_up']);

		$datos_puesto_up = [
			"nombre" => $nombre,
			"fk_departamento" => $fk_departamento,
			"id" => $id
		];

		if (puestoModelo::actualizar_puesto($datos_puesto_up)) {
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



	/*--------- Controlador cambiarStatus módulo ---------*/
	public function cambio_status_solicitud_controlador()
	{
		session_start(['name' => 'SPM']);
		/** Recibiendo ID de la vista */
		$id = mainModel::decryption($_POST['solicitud_id_del']);
		$id = mainModel::limpiar_cadena($id);
		$tipo_cambio = mainModel::limpiar_cadena($_POST['tipo_cambio']);

		/** Comprobar si tiene los permisos */




		$datos = [
			"estatus_solicitud" => $tipo_cambio,
			"id" => $id
		];

		if (solicitudModulo::cancelar_solicitud($datos)) {

			// Registramos en el historial cuando se crea la solicitud
			$data_historial = [
				'descripcion_solicitud' => $_SESSION['nombre_spm'] . ' ha ' . $tipo_cambio . ' la solicitud',
				'fk_usuario' => $_SESSION['id_spm'],
				'fk_solicitud' => $id
			];
			$registrar_historial = solicitudModulo::agregar_historial_solicitud($data_historial);
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
