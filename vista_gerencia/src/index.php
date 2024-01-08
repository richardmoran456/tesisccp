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
                        <h1 class="m-0">Pagina de Pisos</h1>
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

        <!-- Main content -->
        <div class="card">
            <div class="card-header text-center">
                Pisos registrados
            </div>
            <div class="card-body">
                <div class="row">
                    <?php
                    include "../../conexion.php";
                    $query = mysqli_query($conexion, "SELECT * FROM pisos WHERE estado = 1");
                    $result = mysqli_num_rows($query);
                    if ($result > 0) {
                        while ($data = mysqli_fetch_assoc($query)) { ?>
                            <div class="col-md-3 shadow-lg">
                                <div class="col-12">
                                    <img src="../assets/img/salas.jpg" class="product-image" alt="Product Image">
                                </div>
                                <h6 class="my-3 text-center"><span class="badge badge-info">
                                        <?php echo $data['nombre']; ?>
                                    </span></h6>

                                <div class="mt-4">
                                    <button type="button" class="btn btn-primary btn-block btn-flat" data-toggle="modal"
                                        data-target="#exampleModal<?php echo $data['id']; ?>">
                                        <i class="far fa-eye mr-2"></i>
                                        Mesas
                                    </button>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?php echo $data['id']; ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Seleccione una opción</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body ">
                                            <a class="btn btn-primary"
                                                href="pisos.php?id_piso=<?php echo $data['id']; ?>&habitaciones=<?php echo $data['habitaciones']; ?>&area=Norte">
                                                Ala Norte
                                            </a>
                                            <a class="btn btn-primary"
                                                href="pisos.php?id_piso=<?php echo $data['id']; ?>&habitaciones=<?php echo $data['habitaciones']; ?>&area=Sur">
                                                Ala Sur
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>


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