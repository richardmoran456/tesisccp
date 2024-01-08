<?php
session_start();
if ($_SESSION['rol'] != 1) {
    header('Location: permisos.php');
    exit;
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCP Suites | Inicio</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../plantilla/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../plantilla/dist/css/adminlte.min.css">
</head>

<?php
include "../../conexion.php"; ?>
<?php include_once "../../templates/header.php"; ?>
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
                <img src="../../plantilla/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Gerencia</a>
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
                    <h1 class="m-0">Pagina de Puestos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <?php
    if (!empty($_POST)) {
        $alert = "";
        if (empty($_POST['nombre']) || empty($_POST['ala']) || empty($_POST['habitaciones'])) {
            $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Todo los campos son obligatorio
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        } else {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $ala = $_POST['ala'];
            $habitaciones = $_POST['habitaciones'];
            $result = 0;
            if (empty($id)) {
                $query = mysqli_query($conexion, "SELECT * FROM piso WHERE nombre = '$nombre' AND estado = 1");
                $result = mysqli_fetch_array($query);
                if ($result > 0) {
                    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        La sala ya existe
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                } else {
                    $query_insert = mysqli_query($conexion, "INSERT INTO piso (nombre,ala,habitaciones) values ('$nombre', '$ala' , '$habitaciones' )");
                    if ($query_insert) {
                        $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Piso registrado
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
            } else {
                $sql_update = mysqli_query($conexion, "UPDATE piso SET nombre = '$nombre' , ala = '$ala' , habitaciones = '$habitaciones'  WHERE id = $id");
                if ($sql_update) {
                    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Sala Modificado
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
        mysqli_close($conexion);
    }
    // aca iba el header
    ?>
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <?php echo (isset($alert)) ? $alert : ''; ?>
                    <form action="" method="post" autocomplete="off" id="formulario">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="nombre" class="text-dark font-weight-bold">Nombre</label>
                                    <input type="text" placeholder="Ingrese Nombre" name="nombre" id="nombre"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="ala" class="text-dark font-weight-bold">Ala</label>
                                    <input type="text" placeholder="Ala" name="ala" id="ala" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="habitaciones" class="text-dark font-weight-bold">Habitaciones</label>
                                    <input type="number" placeholder="Habitaciones" name="habitaciones" id="habitaciones"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5 text-center">
                                <label for="">Acciones</label> <br>
                                <input type="submit" value="Registrar" class="btn btn-primary" id="btnAccion">
                                <input type="button" value="Nuevo" class="btn btn-success" id="btnNuevo"
                                    onclick="limpiar()">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="tbl">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Ala</th>
                                    <th>Habitaciones</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "../../conexion.php";

                                $query = mysqli_query($conexion, "SELECT * FROM piso WHERE estado = 1");
                                $result = mysqli_num_rows($query);
                                if ($result > 0) {
                                    while ($data = mysqli_fetch_assoc($query)) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $data['id']; ?>
                                            </td>
                                            <td>
                                                <?php echo $data['nombre']; ?>
                                            </td>
                                            <td>
                                                <?php echo $data['ala']; ?>
                                            </td>
                                            <td>
                                                <?php echo $data['habitaciones']; ?>
                                            </td>
                                            <td>
                                                <a href="#" onclick="editarCliente(<?php echo $data['id']; ?>)"
                                                    class="btn btn-primary"><i class='fas fa-edit'></i></a>
                                                <form action="eliminar.php?id=<?php echo $data['id']; ?>&accion=piso"
                                                    method="post" class="confirmar d-inline">
                                                    <button class="btn btn-danger" type="submit"><i
                                                            class='fas fa-trash-alt'></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php }
                                } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "../../templates//footer.php"; ?>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../plantilla/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../plantilla/dist/js/adminlte.min.js"></script>
    </body>

</html>