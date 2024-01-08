<?php
session_start();

require("../conexion.php");
if (!empty($_GET['id']) && !empty($_GET['accion'])) {
    $id = $_GET['id'];
    $table = $_GET['accion'];
    $id_user = $_SESSION['idUser'];
    $query_delete = mysqli_query($conexion, "UPDATE $table SET estado = 0 WHERE id = $id");
    mysqli_close($conexion);
    header("Location: " . $table . '.php');
}
