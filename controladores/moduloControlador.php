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
		return $modulos;
	}
}
