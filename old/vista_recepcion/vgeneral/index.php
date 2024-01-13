<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCP Suites | Ala</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
        <a href="#" class="brand-link">
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
                    <a href="#" class="d-block">Dpto. Recepcion</a>
                </div>
            </div>

            <?php include("../siderec.php"); ?>

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
                        <h1 class="m-0">Vista General</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pagina de inicio</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header Data tables aca -->
        <!-- Main content -->


        <section class="content">

            <div class="card-body">
                <div class="row">
                <div class="col-md-3 shadow-lg">
                        <div class="col-12">
                            <img src="../../img/ala.jpg" class="product-image" alt="Product Image">
                        </div>
                        <h6 class="my-3 text-center"><span class="badge badge-info">Planta baja</span></h6>

                        <div class="mt-4">
                            <a class="btn btn-primary btn-block btn-flat" href="#">
                                <i class="far fa-eye mr-2"></i>
                                Ver
                            </a>
                        </div>
                    </div>
                <div class="col-md-3 shadow-lg">
                        <div class="col-12">
                            <img src="../../img/ala.jpg" class="product-image" alt="Product Image">
                        </div>
                        <h6 class="my-3 text-center"><span class="badge badge-info">Mezanine</span></h6>

                        <div class="mt-4">
                            <a class="btn btn-primary btn-block btn-flat" href="#">
                                <i class="far fa-eye mr-2"></i>
                                Ver
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 shadow-lg">
                        <div class="col-12">
                            <img src="../../img/ala.jpg" class="product-image" alt="Product Image">
                        </div>
                        <h6 class="my-3 text-center"><span class="badge badge-info">Piso 1</span></h6>

                        <div class="mt-4">
                            <a class="btn btn-primary btn-block btn-flat" href="#">
                                <i class="far fa-eye mr-2"></i>
                                Ver
                            </a>
                        </div>

                    </div>
                    <div class="col-md-3 shadow-lg">
                        <div class="col-12">
                            <img src="../../img/ala.jpg" class="product-image" alt="Product Image">
                        </div>
                        <h6 class="my-3 text-center"><span class="badge badge-info">Piso 2</span></h6>

                        <div class="mt-4">
                            <a class="btn btn-primary btn-block btn-flat" href="#">
                                <i class="far fa-eye mr-2"></i>
                                Ver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
          

            <!-- /.container-fluid -->
        </section>
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