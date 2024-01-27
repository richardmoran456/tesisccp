<?php

if ($peticionAjax) {
	require_once "../modelos/alaModelo.php";
} else {
	require_once "./modelos/alaModelo.php";
}

class alaControlador extends alaModelo
{
	/*--------- Controlador agregar modelo ---------*/
	public function agregar_ala_controlador()
	{

		$nombre = mainModel::limpiar_cadena($_POST['nombre_ala_reg']);


		/*== comprobar campos vacios ==*/
		if ($nombre == "") {
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

		$agregar_ala_reg = [
			"nombre" => $nombre
		];



		$agregar_ala = alaModelo::agregar_ala($agregar_ala_reg);

		if ($agregar_ala->rowCount() == 1) {
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
	public function listar_ala_controlador()
	{
		$datos = alaModelo::listar_ala();
		return $datos;
	}

	/*--------- Controlador eliminar módulo ---------*/
	public function eliminar_ala_controlador()
	{
		/** Recibiendo ID de la vista */
		$id = mainModel::decryption($_POST['ala_id_del']);
		$id = mainModel::limpiar_cadena($id);

		/** Comprobar si tiene los permisos */



		/** Eliminar */

		$eliminar_registro = alaModelo::eliminar_ala($id);

		if ($eliminar_registro->rowCount() == 1) {
			$alerta = [
				"Alerta" => "recargar",
				"Titulo" => "ala eliminado",
				"Texto" => "El ala ha sido eliminado del sistema exitosamente",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No hemos podido eliminar el ala, por favor intente nuevamente",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}
	/*--------- Combobox  ---------*/
	// aqui recibimos el id de la ala a la que vamos a tomar como referencia para cargar sus pisos
	public function obtener_combobox($id)
	{
		// toda operacion a la base de datos se debe limpiar si o si
		$id = mainModel::limpiar_cadena($id);
		$listado = alaModelo::obtener_pisos_alas($id);
		$con = 0;
		$opc = "";

		foreach ($listado as $fila) {
			$con = $con + 1;
			if ($con > 0) {

				$opc .=  "<option value='" . $fila['piso_id'] . "'>" . $fila['nombre'] . "</option>";
			} else {
				$opc .= '<option value="">Pisos no disponibles</option>';
			}
		}
		return $opc;
	}


	/*--------- Controlador datos  ---------*/
	public function datos_ala_controlador($tipo, $id)
	{
		$tipo = mainModel::limpiar_cadena($tipo);

		$id = mainModel::decryption($id);
		$id = mainModel::limpiar_cadena($id);

		return alaModelo::datos_ala($tipo, $id);
	}

	/*--------- Controlador actualizar  ---------*/
	public function actualizar_ala_controlador()
	{
		$id = mainModel::decryption($_POST['ala_id_up']);
		$id = mainModel::limpiar_cadena($id);

		$nombre = mainModel::limpiar_cadena($_POST['nombre_ala_up']);


		$datos_ala_up = [
			"nombre" => $nombre,
			"id" => $id
		];

		if (alaModelo::actualizar_ala($datos_ala_up)) {
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
