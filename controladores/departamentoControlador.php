<?php

if ($peticionAjax) {
	require_once "../modelos/departamentoModelo.php";
} else {
	require_once "./modelos/departamentoModelo.php";
}

class departamentoControlador extends departamentoModelo
{
	/*--------- Controlador agregar modelo ---------*/
	public function agregar_departamento_controlador()
	{

		$nombre = mainModel::limpiar_cadena($_POST['nombre_departamento_reg']);
		$abreviatura = mainModel::limpiar_cadena($_POST['abreviatura_departamento_reg']);

		/*== comprobar campos vacios ==*/
		if ($nombre == "" || $abreviatura == "") {
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

		if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,10}", $abreviatura)) {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "La ABREVIATURA no coincide con el formato solicitado",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}


		/*== Enviar datos a la BD ==*/

		$agregar_departamento_reg = [
			"nombre" => $nombre,
			"abreviatura" => $abreviatura
		];



		$agregar_departamento = departamentoModelo::agregar_departamento($agregar_departamento_reg);

		if ($agregar_departamento->rowCount() == 1) {
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
	public function listar_departamento_controlador()
	{
		$datos = departamentoModelo::listar_departamento();
		return $datos;
	}

	/*--------- Controlador eliminar módulo ---------*/
	public function eliminar_departamento_controlador()
	{
		/** Recibiendo ID de la vista */
		$id = mainModel::decryption($_POST['departamento_id_del']);
		$id = mainModel::limpiar_cadena($id);

		/** Comprobar si tiene los permisos */



		/** Eliminar */

		$eliminar_registro = departamentoModelo::eliminar_departamento($id);

		if ($eliminar_registro->rowCount() == 1) {
			$alerta = [
				"Alerta" => "recargar",
				"Titulo" => "Departamento eliminado",
				"Texto" => "El departamento ha sido eliminado del sistema exitosamente",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No hemos podido eliminar el departamento, por favor intente nuevamente",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}

	/*--------- Controlador datos  ---------*/
	public function datos_departamento_controlador($tipo, $id)
	{
		$tipo = mainModel::limpiar_cadena($tipo);

		$id = mainModel::decryption($id);
		$id = mainModel::limpiar_cadena($id);

		return departamentoModelo::datos_departamento($tipo, $id);
	}

	/*--------- Controlador actualizar  ---------*/
	public function actualizar_departamento_controlador()
	{
		$id = mainModel::decryption($_POST['departamento_id_up']);
		$id = mainModel::limpiar_cadena($id);
		$nombre = mainModel::limpiar_cadena($_POST['nombre_departamento_up']);
		$abr = mainModel::limpiar_cadena($_POST['abreviatura_departamento_up']);

		$datos_departamento_up = [
			"nombre" => $nombre,
			"abr" => $abr,
			"id" => $id
		];

		if (departamentoModelo::actualizar_departamento($datos_departamento_up)) {
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
