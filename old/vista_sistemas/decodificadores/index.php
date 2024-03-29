<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CCP Suites | Empleados</title>

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
          <img src="../../plantilla/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Dept. De Sistemas</a>
        </div>
      </div>

      <?php include("../sidesist.php"); ?>

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
            <h1 class="m-0">Pagina de Decodificadores</h1>
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
    <!-- /.content-header Data tables aca -->
    <!-- Main content -->


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data de los Equipos</h3>
                <br/>
                <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Equipo</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">

                  <thead>
                    <tr>
                      <th>Modelo</th>
                      <th>Ubicacion</th>
                      <th>Estado</th>
                      <th>Serial</th>
                      <th>Plan</th>
                      <th>Fecha de registro</th>
                      <th>Acciones</th>

                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td>T05 Movistar </td>
                      <td>PN5 02</td>
                      <td><span class="badge badge-success">Funcionando</span></td>
                      <td>Mj024533658</td>
                      <td>MEGA HD</td>
                      <td>05/10/2023</td>
                      <td> 
                        
                        <a name="" id="" class="btn btn-primary" href="#" role="button">Editar</a> 
                        <a name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a>
                        <a name="" id="" class="btn btn-success" href="#" role="button">Ver</a>
                      </td>
                    </tr>
                  
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>Modelo</th>
                      <th>Ubicacion</th>
                      <th>Estado</th>
                      <th>Serial</th>
                      <th>Plan</th>
                      <th>Fecha de registro</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["excel", "pdf", "print",]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>