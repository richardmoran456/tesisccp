<?php
include("conexion.php");
session_start();

// Comprobar si el usuario ya tiene una sesión iniciada
if (isset($_SESSION['usuario'])) {
    // El usuario ya tiene una sesión iniciada
    // Redirigir al usuario a la vista correspondiente a su tipo de usuario
    redirigirUsuario($_SESSION['tipo_usuario']);
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // El usuario ha enviado el POST desde el formulario
    // Recuperar datos del formulario de inicio de sesión
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // // Conexión a la base de datos
    // $conexion = new mysqli('localhost', 'username', 'password', 'app');

    // if ($conexion->connect_error) {
    //     die("Conexión fallida: " . $conexion->connect_error);
    // }

    // Consulta a la base de datos
    $sql = "SELECT * FROM usuario WHERE usuario = ? AND password = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $usuario, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // El usuario y la contraseña son correctos
        $row = $result->fetch_assoc();
        $tipo_usuario = $row['tipo_usuario'];

        // Guardar los datos del usuario en la sesión
        $_SESSION['usuario'] = $usuario;
        $_SESSION['tipo_usuario'] = $tipo_usuario;

        // Redirigir al usuario a la vista correspondiente a su tipo de usuario
        redirigirUsuario($tipo_usuario);
    } else {
        // El usuario o la contraseña son incorrectos
        echo "Usuario o contraseña incorrectos";
    }

    $conexion->close();
} else {
    // El usuario no ha enviado el POST desde el formulario ni tiene una sesión iniciada
    // Redirigir al usuario a la página de inicio de sesión
    header("Location: login.php");
    
}

function redirigirUsuario($tipo_usuario) {
    switch ($tipo_usuario) {
        case 'rrhh':
            header("Location: vista_rrhh/");
            break;
        case 'sistemas':
            header("Location: vista_sistemas/");
            break;
        case 'gerencia':
            header("Location: vista_gerencia/");
            break;
        case 'mantenimiento':
            header("Location: vista_mantenimiento/");
            break;
        default:
            echo "Tipo de usuario no reconocido";
            break;
    }
}
?>