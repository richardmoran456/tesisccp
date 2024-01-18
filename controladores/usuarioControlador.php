<?php

if ($peticionAjax) {
	require_once "../modelos/usuarioModelo.php";
} else {
	require_once "./modelos/usuarioModelo.php";
}

class usuarioControlador extends usuarioModelo
{
	/*--------- Controlador agregar modelo ---------*/
	public function agregar_usuario_controlador()
	{

		$nombre = mainModel::limpiar_cadena($_POST['nombre_usuario_reg']);
		$username = mainModel::limpiar_cadena($_POST['username_usuario_reg']);
		$clave = mainModel::limpiar_cadena($_POST['password_usuario_reg']);
		$fk_departamento = mainModel::limpiar_cadena($_POST['fk_departamento_reg']);

		/*== comprobar campos vacios ==*/
		if ($nombre == "" || $fk_departamento == "" || $username == "" || $clave == "") {
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
			"username" => $username,
			"clave" => mainModel::encryption($clave),
			"fk_departamento" => $fk_departamento
		];



		$agregar_usuario = usuarioModelo::agregar_usuario($data);

		if ($agregar_usuario->rowCount() == 1) {
			$alerta = [
				"Alerta" => "limpiar",
				"Titulo" => "Usuario registrado",
				"Texto" => "Los datos del usuario han sido registrados con exito",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No hemos podido registrar el usuario",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}
	/* Fin controlador */

	/*--------- Controlador listar modelo ---------*/
	public function listar_usuario_controlador()
	{
		$datos = usuarioModelo::listar_usuario();
		return $datos;
	}

	/*--------- Controlador eliminar módulo ---------*/
	public function eliminar_usuario_controlador()
	{
		/** Recibiendo ID de la vista */
		$id = mainModel::decryption($_POST['usuario_id_del']);
		$id = mainModel::limpiar_cadena($id);

		/** Comprobar si tiene los permisos */



		/** Eliminar */

		$eliminar_registro = usuarioModelo::eliminar_usuario($id);

		if ($eliminar_registro->rowCount() == 1) {
			$alerta = [
				"Alerta" => "recargar",
				"Titulo" => "usuario eliminado",
				"Texto" => "El usuario ha sido eliminado del sistema exitosamente",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No hemos podido eliminar el usuario, por favor intente nuevamente",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}

	/*--------- Controlador datos  ---------*/
	public function datos_usuario_controlador($tipo, $id)
	{
		$tipo = mainModel::limpiar_cadena($tipo);

		$id = mainModel::decryption($id);
		$id = mainModel::limpiar_cadena($id);


		return usuarioModelo::datos_usuario($tipo, $id);
	}

	/*--------- Controlador actualizar  ---------*/
	public function actualizar_usuario_controlador()
	{
		$id = mainModel::decryption($_POST['usuario_id_up']);
		$id = mainModel::limpiar_cadena($id);
		$nombre = mainModel::limpiar_cadena($_POST['nombre_usuario_up']);
		$username = mainModel::limpiar_cadena($_POST['username_usuario_up']);
		$fk_departamento = mainModel::limpiar_cadena($_POST['fk_departamento_up']);

		$datos_usuario_up = [
			"nombre" => $nombre,
			"username" => $username,
			"fk_departamento" => $fk_departamento,
			"id" => $id
		];

		if (usuarioModelo::actualizar_usuario($datos_usuario_up)) {
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
