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
  <link rel="stylesheet" href="../../../plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="../../../plantilla/plugins/fullcalendar/main.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../plantilla/dist/css/adminlte.min.css">

</head>

<body>
  <!-- Preloader -->

  <?php include("../../../templates/header.php"); ?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../img/logoccp.png" alt="AdminLTE Logo" class="brand-image  elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CCP Suites</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../plantilla/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Dpto. Recepcion</a>
        </div>
      </div>

      <?php include("siderec.php"); ?>
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contenido page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Calendar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  <?php include("../templates/footer.php"); ?>

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="../plantilla/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery UI -->
  <script src="../plantilla/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../plantilla/dist/js/adminlte.min.js"></script>
  <!-- fullCalendar 2.2.5 -->
  <script src="../plantilla/plugins/moment/moment.min.js"></script>
  <script src="../plantilla/plugins/fullcalendar/main.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../plantilla/dist/js/demo.js"></script>
  <!-- Page specific script -->






</body>

</html>