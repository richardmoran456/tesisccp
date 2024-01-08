<?php
session_start();

?>

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
                    <a href="#" class="d-block">Dept. de Gerencia</a>
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
                        <h1 class="m-0">Dashboard</h1>
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
        <!-- /.content-header -->
        <div class="card">
    <div class="card-header text-center">
        Mesas
    </div>
    <div class="card-body">
        <div class="row">
            <?php
            include "../../conexion.php";
            if(isset($_GET['id_piso']) && isset($_GET['habitacion'])){
                $id = $_GET['id_piso'];
                $habitacion = $_GET['habitacion'];
                $stmt= $conexion->prepare("SELECT * FROM piso WHERE id = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $data = $result->fetch_assoc();
                    if ($data['habitacion'] == $habitacion) {
                        $item = 1;
                        for ($i = 0; $i < $habitacion; $i++) {
                            $consulta = $conexion->prepare("SELECT * FROM huespedes WHERE id_piso = ? AND num_habitacion = ? AND estado = 'PENDIENTE'");
                            $consulta->bind_param("ii", $id, $item);
                            $consulta->execute();
                            $resultPedido = $consulta->get_result()->fetch_assoc();
                            ?>
                            <div class="col-md-3">
                                <div class="card card-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div
                                        class="widget-user-header bg-<?php echo empty($resultPedido) ? 'success' : 'danger'; ?>">
                                        <h3 class="widget-user-username">Habitacion</h3>
                                        <h5 class="widget-user-desc">
                                            <?php echo $item; ?>
                                        </h5>
                                    </div>
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="../assets/img/mesa.jpg" alt="User Avatar">
                                    </div>
                                    <div class="card-footer">
                                        <div class="description-block">
                                            <?php if (empty($resultPedido)) {
                                                echo '<a class="btn btn-outline-info" href="pedido.php?id_piso=' . $id . '&habitacion=' . $item . '">Atender</a>';
                                            } else {
                                                echo '<a class="btn btn-outline-success" href="finalizar.php?id_piso=' . $id . '&habitacion=' . $item . '">Finalizar</a>';
                                            } ?>

                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>
                            </div>

                            <?php $item++;
                        }
                    }
                }
            } else {
                echo "No se proporcionaron los parámetros necesarios.";
            }
            ?>
        </div>
    </div>
</div>

<!-- Main content -->


<!-- /.content -->
</div>


    <?php include("../../templates/footer.php"); ?>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../plantilla/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../plantilla/dist/js/adminlte.min.js"></script>
</body>

</html>