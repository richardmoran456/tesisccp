<?php

if ($peticionAjax) {
	require_once "../modelos/eventoModelo.php";
} else {
	require_once "./modelos/eventoModelo.php";
}

class eventoControlador extends eventoModelo
{


	/*--------- Controlador agregar modelo ---------*/
	public function agregar_evento_controlador()
	{
		$evento = mainModel::limpiar_cadena($_POST['evento_reg']);

		if ($_SERVER['REQUEST_METHOD'] != 'POST') {
			echo "<script> alert('Error: No hay datos para guardar.'); location.replace('./') </script>";
			$conexion->close();
			exit;
		}

		$allday = isset($allday);

		if (empty($id)) {
			$sql = "INSERT INTO `schedule_list` (`title`,`description`,`start_datetime`,`end_datetime`) VALUES ('$evento','$description','$start_datetime','$end_datetime')";
		} else {
			$sql = "UPDATE `schedule_list` set `title` = '{$evento}', `description` = '{$description}', `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}' where `id` = '{$id}'";
		}
		$save = $conn->query($sql);
		if ($save) {
			echo "<script> alert('Evento Guardado Correctamente.'); location.replace('./') </script>";
		} else {
			echo "<pre>";
			echo "An Error occured.<br>";
			echo "Error: " . $conexion->error . "<br>";
			echo "SQL: " . $sql . "<br>";
			echo "</pre>";
		}
		$conexion->close();

	/* Fin controlador */

	/*--------- Controlador listar modelo da error cuando se elimina ---------*/
	public function listar_evento_controlador()
	{
		$datos = eventoModelo::listar_evento();
		return $datos;
	}

		/** Eliminar */

		$eliminar_registro = alaModelo::eliminar_ala($id);
		if(!isset($_GET['id'])){
			echo "<script> alert('Id. de programa no definido.'); location.replace('../vista_gerencia/') </script>";
			$conexion->close();
			exit;
		}
		
		$delete = $conexion->query("DELETE FROM `schedule_list` where id = '{$_GET['id']}'");
		if($delete){
			echo "<script> alert('El evento se ha eliminado con éxito.'); location.replace('../vista_gerencia/') </script>";
		}else{
			echo "<pre>";
			echo "An Error occured.<br>";
			echo "Error: ".$conexion->error."<br>";
			echo "SQL: ".$sql."<br>";
			echo "</pre>";
		}
		$conexion->close();

	}
	
	// /*--------- Controlador actualizar  ---------*/
	// public function actualizar_ala_controlador()
	// {
	// 	$id = mainModel::decryption($_POST['ala_id_up']);
	// 	$id = mainModel::limpiar_cadena($id);

	// 	$nombre = mainModel::limpiar_cadena($_POST['nombre_ala_up']);


	// 	$datos_ala_up = [
	// 		"nombre" => $nombre,
	// 		"id" => $id
	// 	];

	// 	if (alaModelo::actualizar_ala($datos_ala_up)) {
	// 		$alerta = [
	// 			"Alerta" => "recargar",
	// 			"Titulo" => "Datos actualizados",
	// 			"Texto" => "Los datos han sido actualizados con exito",
	// 			"Tipo" => "success"
	// 		];
	// 	} else {
	// 		$alerta = [
	// 			"Alerta" => "simple",
	// 			"Titulo" => "Ocurrió un error inesperado",
	// 			"Texto" => "No hemos podido actualizar los datos, por favor intente nuevamente",
	// 			"Tipo" => "error"
	// 		];
	// 	}
	// 	echo json_encode($alerta);
	// }
}
