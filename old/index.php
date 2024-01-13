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
    //header("Location: login.php");
    
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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CCP Suites| Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="plantilla/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><Suites>CCP Suites</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Introduzca sus datos </p>

      <form  method="POST" action="<?php echo $_SERVER ['PHP_SELF']; ?>">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="usuario" placeholder="usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recuerdame
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="text-center mt-2 mb-3  ">
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesion</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plantilla/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="plantilla/dist/js/adminlte.min.js"></script>
</body>
</html>


