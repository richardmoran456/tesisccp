<?php

if ($peticionAjax) { 
	require_once "../modelos/pisoModelo.php";
} else {
	require_once "./modelos/pisoModelo.php";
}

class pisoControlador extends pisoModelo
{
	/*--------- Controlador agregar modelo ---------*/
	public function agregar_piso_controlador()
	{

		$nombre = mainModel::limpiar_cadena($_POST['nombre_piso_reg']);
		$fk_ala = mainModel::limpiar_cadena($_POST['fk_departamento_reg']);

		/*== comprobar campos vacios ==*/
		if ($nombre == "" || $fk_ala == "") {
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
			"fk_ala" => $fk_ala
		];



		$agregar_piso = pisoModelo::agregar_piso($data);

		if ($agregar_piso->rowCount() == 1) {
			$alerta = [
				"Alerta" => "limpiar",
				"Titulo" => "Puesto registrado",
				"Texto" => "Los datos del piso han sido registrados con exito",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No hemos podido registrar el piso",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}
	/* Fin controlador */

	/*--------- Controlador listar modelo ---------*/
	public function listar_piso_controlador()
	{
		$datos = pisoModelo::listar_piso();
		return $datos;
	}

	/*--------- Controlador eliminar módulo ---------*/
	public function eliminar_piso_controlador()
	{
		/** Recibiendo ID de la vista */
		$id = mainModel::decryption($_POST['piso_id_del']);
		$id = mainModel::limpiar_cadena($id);

		/** Comprobar si tiene los permisos */



		/** Eliminar */

		$eliminar_registro = pisoModelo::eliminar_piso($id);

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
	public function datos_piso_controlador($tipo, $id)
	{
		$tipo = mainModel::limpiar_cadena($tipo);
		$id = mainModel::decryption($id);
		$id = mainModel::limpiar_cadena($id);

		return puestoModelo::datos_piso($tipo, $id);
	}


	/*--------- Controlador carga combo  ---------*/
	public function datos_piso_combo_controlador()
	{
		$data = pisoModelo::listar_piso_combo();
		return $data;
	}



	/*--------- Controlador actualizar  ---------*/
	public function actualizar_piso_controlador()
	{
		$id = mainModel::decryption($_POST['piso_id_up']);
		$id = mainModel::limpiar_cadena($id);
		$nombre = mainModel::limpiar_cadena($_POST['nombre_piso_up']);
		$fk_ala = mainModel::limpiar_cadena($_POST['fk_ala_up']);

		$datos_puesto_up = [
			"nombre" => $nombre,
			"fk_ala" => $fk_ala,
			"id" => $id
		];

		if (pisoModelo::actualizar_piso($datos_piso_up)) {
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
