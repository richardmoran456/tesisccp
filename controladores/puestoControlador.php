<?php

if ($peticionAjax) {
	require_once "../modelos/puestoModelo.php";
} else {
	require_once "./modelos/puestoModelo.php";
}

class puestoControlador extends puestoModelo
{
	/*--------- Controlador agregar modelo ---------*/
	public function agregar_puesto_controlador()
	{

		$nombre = mainModel::limpiar_cadena($_POST['nombre_puesto_reg']);
		$fk_departamento = mainModel::limpiar_cadena($_POST['fk_departamento_reg']);

		/*== comprobar campos vacios ==*/
		if ($nombre == "" || $fk_departamento == "") {
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
			"fk_departamento" => $fk_departamento
		];



		$agregar_puesto = puestoModelo::agregar_puesto($data);

		if ($agregar_puesto->rowCount() == 1) {
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
	public function listar_puesto_controlador()
	{
		$datos = puestoModelo::listar_puesto();
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
}
