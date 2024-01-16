<?php

if ($peticionAjax) {
	require_once "../modelos/moduloModelo.php";
} else {
	require_once "./modelos/moduloModelo.php";
}

class moduloControlador extends moduloModelo
{
	/*--------- Controlador agregar modelo ---------*/
	public function agregar_modelo_controlador()
	{

		$nombre = mainModel::limpiar_cadena($_POST['nombre_modulo_form']);

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

		$agregar_modulo_reg = [
			"nombre" => $nombre
		];



		$agregar_modulo = moduloModelo::agregar_modulo($agregar_modulo_reg);

		if ($agregar_modulo->rowCount() == 1) {
			$alerta = [
				"Alerta" => "recargar",
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
	public function listar_modulo_controlador()
	{
		$modulos = moduloModelo::listar_modulo();

		$tabla = "";

		$tabla .= '
		
		  <tbody>';
		foreach ($modulos as $fila) {
			$fecha_formateada = date("d M, Y H:i A", strtotime($fila['created_at']));

			$tabla .= '<tr>
			<td>' . $fila['nombre'] . '</td> 
			<td>' . $fecha_formateada . '</td> 
			<td>
				<a href="' . SERVERURL . 'modulo-update/' . mainModel::encryption($fila['modulo_id']) . '">
					<i class="fas fa-sync-alt"></i>
				</a>
			</td>
			<td>
				<form class="FormularioAjax" action="' . SERVERURL . 'ajax/moduloAjax.php" method="POST" data-form="delete" autocomplete="off">
					<input type="hidden" name="modulo_id_del" value="' . mainModel::encryption($fila['modulo_id']) . '">
					<button type="submit" class="btn btn-warning">
					<i class="far fa-trash-alt"></i>
					</button>
				</form>
			</td>
			 </tr>';
		}

		$tabla .= ' </tbody>';
		return $modulos;
	}

	/*--------- Controlador eliminar módulo ---------*/
	public function eliminar_modulo_controlador()
	{
		/** Recibiendo ID de la vista */
		$id = mainModel::decryption($_POST['modulo_id_del']);
		$id = mainModel::limpiar_cadena($id);

		/** Comprobar si tiene los permisos */



		/** Eliminar */

		$eliminar_modulo = moduloModelo::eliminar_modulo($id);

		if ($eliminar_modulo->rowCount() == 1) {
			$alerta = [
				"Alerta" => "recargar",
				"Titulo" => "Módelo eliminado",
				"Texto" => "El módelo ha sido eliminado del sistema exitosamente",
				"Tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado",
				"Texto" => "No hemos podido eliminar el módulo, por favor intente nuevamente",
				"Tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}
}
