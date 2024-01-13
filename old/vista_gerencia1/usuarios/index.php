<?php
session_start();
if ($_SESSION['tipo_usuario'] != 1) {
    header('Location: index.php');
    exit;
}
include "../../conexion.php";
if (!empty($_POST)) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $alert = "";
    if (empty($nombre) || empty($correo) || empty($tipo_usuario)) {
        $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Todo los campos son obligatorio
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    } else {
        if (empty($id)) {
            $pass = $_POST['pass'];
            if (empty($pass)) {
                $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    La contraseña es requerido
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            } else {
                $pass = md5($_POST['pass']);
                $query = mysqli_query($conexion, "SELECT * FROM usuarios where correo = '$correo' AND estado = 1");
                $result = mysqli_fetch_array($query);
                if ($result > 0) {
                    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    El correo ya existe
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                } else {
                    $query_insert = mysqli_query($conexion, "INSERT INTO usuarios (nombre,correo,tipo_usuario,pass) values ('$nombre', '$correo', '$rol', '$pass')");
                    if ($query_insert) {
                        $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Usuario Registrado
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                    } else {
                        $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Error al registrar
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                    }
                }
            }
        } else {
            $sql_update = mysqli_query($conexion, "UPDATE usuarios SET nombre = '$nombre', correo = '$correo' , tipo_usuario = '$tipo_usuario' WHERE idusuario = $id");
            if ($sql_update) {
                $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Usuario Modificado
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            } else {
                $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Error al modificar
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCP Suites | usuarios</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../plantilla/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plantilla/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plantilla/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plantilla/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../plantilla/dist/css/adminlte.min.css">
</head>

<body>
    <?php include("../../templates/header.php"); ?>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="../../img/logoccp.png" alt="AdminLTE Logo" class="brand-image  elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">CCP Suites</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../../plantilla/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Dpto. De Gerencia</a>
                </div>
            </div>

            <?php include("../sideger.php"); ?>

        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Contenido de cabecera (Page header) -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pagina de usuarios</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">usuarios</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header Data tables aca -->
        <!-- Main content -->
        <div class="card">
            <div class="card-body">
                <form action="" method="post" autocomplete="off" id="formulario">
                    <?php echo isset($alert) ? $alert : ''; ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" placeholder="Ingrese Nombre" name="nombre"
                                    id="nombre">
                                <input type="hidden" id="id" name="id">
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="correo" class="form-control" placeholder="Ingrese correo Electrónico"
                                    name="correo" id="correo">
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rol">Rol</label>
                                <select id="rol" class="form-control" name="rol">
                                    <option>Seleccionar</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Cocinero</option>
                                    <option value="3">Mozo</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pass">Contraseña</label>
                                <input type="password" class="form-control" placeholder="Ingrese Contraseña" name="pass"
                                    id="pass">
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Registrar" class="btn btn-primary" id="btnAccion">
                    <input type="button" value="Nuevo" class="btn btn-success" id="btnNuevo" onclick="limpiar()">
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered mt-2" id="tbl">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE estado = 1");
                    $result = mysqli_num_rows($query);
                    if ($result > 0) {
                        while ($data = mysqli_fetch_assoc($query)) {
                            if ($data['rol'] == 1) {
                                $rol = '<span class="badge badge-success">Administrador</span>';
                            } else if ($data['rol'] == 2) {
                                $rol = '<span class="badge badge-info">Cocinero</span>';
                            } else {
                                $rol = '<span class="badge badge-warning">Mozo</span>';
                            }
                            ?>
                            <tr>
                                <td>
                                    <?php echo $data['id']; ?>
                                </td>
                                <td>
                                    <?php echo $data['nombre']; ?>
                                </td>
                                <td>
                                    <?php echo $data['correo']; ?>
                                </td>
                                <td>
                                    <?php echo $rol; ?>
                                </td>
                                <td>
                                    <a href="#" onclick="editarUsuario(<?php echo $data['id']; ?>)" class="btn btn-success"><i
                                            class='fas fa-edit'></i></a>
                                    <form action="eliminar.php?id=<?php echo $data['id']; ?>&accion=usuarios" method="post"
                                        class="confirmar d-inline">
                                        <button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> </button>
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    } ?>
                </tbody>
            </table>
        </div>


        <!-- /.content -->
    </div>

    <?php include("../../templates/footer.php"); ?>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../plantilla/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plantilla/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plantilla/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plantilla/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plantilla/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plantilla/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plantilla/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plantilla/plugins/jszip/jszip.min.js"></script>
    <script src="../../plantilla/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plantilla/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plantilla/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plantilla/plugins/datatables-buttons/js/buttons.print.min.js"></script>

    <!-- AdminLTE App -->
    <script src="../../plantilla/dist/js/adminlte.min.js"></script>
    <!-- Page specific script -->

</body>

</html>