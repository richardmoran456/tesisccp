<?php

if ($peticionAjax) {
	require_once "../modelos/tareaModulo.php";
} else {
	require_once "./modelos/tareaModulo.php";
}

class tareaControlador extends tareaModulo
{
	/*--------- Controlador agregar modelo ---------*/
	/** Las solicitudes las pueden crear todos los usuarios pero solo editan los departamentos que esten relacionados */
	public function agregar_tarea_controlador()
	{

		$titulo = mainModel::limpiar_cadena($_POST['titulo_tarea_reg']);
		$descripcion = mainModel::limpiar_cadena($_POST['descripción_tarea_reg']);
		$fk_departamento_reg = mainModel::limpiar_cadena($_POST['fk_departamento_reg']);

		/*== comprobar campos vacios ==*/
		session_start(['name' => 'SPM']);
		// var_dump($_SESSION['privilegio_spm']);
		/** Solo si es recepcion o gerencia puede crearlas */
		if ($_SESSION['privilegio_spm'] != 2 and $_SESSION['privilegio_spm'] != 4) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Acción no permitida",
				"Texto" => "Tu nivel de acceso no permite crear una tarea",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}


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





		/*== Enviar datos a la BD ==*/

		$data = [
			"titulo" => $titulo,
			"descripcion" => $descripcion,
			'estatus_tarea' => 'abierto',
			'fk_creado' => $_SESSION['id_spm'],
			'fk_departamento_origen' => $_SESSION['privilegio_spm'], // El 2do corresponde a recepcion
			'fk_departamento_destino' => $fk_departamento_reg // El 5to corresponde al mantenimiento
		];




		$tarea_id = tareaModulo::agregar_tarea_with_id($data);


		$data_historial = [
			'descripcion_tarea' =>  'Se ha creado la tarea',
			'fk_usuario' => $_SESSION['id_spm'],
			'fk_tarea' => $tarea_id
		];




		if ($tarea_id > 0) {

			// Registramos en el historial cuando se crea la solicitud
			$registrar_historial = tareaModulo::agregar_historial_tarea($data_historial);

			$alerta = [
				"Alerta" => "limpiar",
				"Titulo" => "Tarea registrada",
				"Texto" => "Los datos de la tarea han sido registrados con exito",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No hemos podido registrar la tarea",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}
	/* Fin controlador */

	public function agregar_historial_controlador()
	{
		$historial_reg = mainModel::limpiar_cadena($_POST['historial_reg']);
		$tarea_id = mainModel::limpiar_cadena($_POST['fk_tarea']);


		if ($historial_reg == "") {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No has enviado nada",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		session_start(['name' => 'SPM']);

		$data_historial = [
			'descripcion_tarea' => $historial_reg,
			'fk_usuario' => $_SESSION['id_spm'],
			'fk_tarea' => $tarea_id
		];

		$registrar_historial = tareaModulo::agregar_historial_tarea($data_historial);

		if ($registrar_historial->rowCount() == 1) {
			$alerta = [
				"Alerta" => "recargar",
				"Titulo" => "Mensaje registrado",
				"Texto" => "Los datos han sido registrados con exito",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No hemos podido registrar el mensaje",
				"Tipo" => "error"
			];
		}

		echo json_encode($alerta);
	}

	/*--------- Controlador listar modelo ---------*/
	public function listar_tarea_controlador()
	{
		$datos = tareaModulo::listar_tarea();
		return $datos;
	}

	/*--------- Controlador datos  ---------*/
	public function datos_tarea_controlador($tipo, $id)
	{
		$tipo = mainModel::limpiar_cadena($tipo);
		$id = mainModel::decryption($id);
		$id = mainModel::limpiar_cadena($id);

		return tareaModulo::datos_tarea($tipo, $id);
	}

	public function historial_tarea_controlador($id)
	{
		$data = tareaModulo::datos_historial($id);
		return $data;
	}

	/*--------- Controlador cambiarStatus módulo ---------*/
	public function cambio_status_tarea_controlador()
	{
		session_start(['name' => 'SPM']);
		/** Recibiendo ID de la vista */
		$id = mainModel::decryption($_POST['tarea_id_del']);
		$id = mainModel::limpiar_cadena($id);
		$tipo_cambio = mainModel::limpiar_cadena($_POST['tipo_cambio']);

		/** Comprobar si tiene los permisos */




		$datos = [
			"estatus_tarea" => $tipo_cambio,
			"id" => $id
		];

		if (tareaModulo::cancelar_tarea($datos)) {

			// Registramos en el historial cuando se crea la solicitud
			$data_historial = [
				'descripcion_tarea' => 'Se ha ' . $tipo_cambio . ' la tarea',
				'fk_usuario' => $_SESSION['id_spm'],
				'fk_tarea' => $id
			];
			$registrar_historial = tareaModulo::agregar_historial_tarea($data_historial);
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
