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

	/*--------- Controlador cargar avatar  ---------*/

	public function  actualizar_avatar()
	{
		// File upload directory 
		session_start(['name' => 'SPM']);
		$targetDir = "../vistas/assets/images/users/";

		if (!empty($_FILES["file"]["name"])) {
			// Get file info 
			$fileName = basename($_FILES["file"]["name"]);
			$fileType = pathinfo($fileName, PATHINFO_EXTENSION);
			$newFileName = "user-" . $_SESSION['id_spm'] . uniqid() . '.' . $fileType;

			$targetFilePath = $targetDir . $newFileName;
			// $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


			// Allow certain file formats 
			$allowTypes = array('jpg', 'png', 'jpeg', 'gif');
			if (in_array($fileType, $allowTypes)) {

				// Upload file to server 
				if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {

					$datos = [
						"id" => $_SESSION['id_spm'],
						"avatar" => $newFileName
					];

					if (usuarioModelo::actualizar_usuario_avatar($datos)) {
						$alerta = [
							"Alerta" => "recargar",
							"Titulo" => "Datos actualizados",
							"Texto" => "El archivo " . $newFileName . " se ha cargado correctamente.",
							"Tipo" => "success"
						];
						$_SESSION['avatar_default']  = "vistas/assets/images/users/" . $newFileName;
					} else {
						$alerta = [
							"Alerta" => "simple",
							"Titulo" => "Ocurrió un error inesperado",
							"Texto" => "Error al cargar el archivo, por favor intente nuevamente",
							"Tipo" => "error"
						];
					}
					echo json_encode($alerta);
				} else {
					$alerta = [
						"Alerta" => "simple",
						"Titulo" => "Error",
						"Texto" => "Lo sentimos, se ha producido un error al cargar el archivo.",
						"Tipo" => "error"
					];
				}
			} else {

				$alerta = [
					"Alerta" => "simple",
					"Titulo" => "Lo sentimos.",
					"Texto" => "Solo permitimos cargar archivos JPG, JPEG, PNG, Y GIF ",
					"Tipo" => "error"
				];
				echo json_encode($alerta);
			}
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Por favor",
				"Texto" => "Selecciona al menos un archivo",
				"Tipo" => "error"
			];
			echo json_encode($alerta);
		}



		// Display status message 

	}
}
