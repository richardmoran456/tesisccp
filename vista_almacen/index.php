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
  <link rel="stylesheet" href="../plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="../plantilla/plugins/fullcalendar/main.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../plantilla/dist/css/adminlte.min.css">



  <link rel="stylesheet" href="../calendario/fullcalendar/lib/main.min.css">
  <script src="../calendario/js/jquery-3.6.0.min.js"></script>
  <script src="../calendario/js/bootstrap.min.js"></script>

</head>

<body>
  <!-- Preloader -->

  <?php include("../templates/header.php"); ?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
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
          <a href="#" class="d-block">Dpto. Almacen</a>
        </div>
      </div>

      <?php include("sideal.php"); ?>
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
            <h1>CALENDARIO DE EVENTOS</h1>
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
    <div class="container py-5" id="page-container">
      <div class="row">
        <div class="col-md-9">
          <div id="calendar"></div>
        </div>
        <div class="col-md-3">
          <div class="cardt rounded-0 shadow">
            <div class="card-header bg-gradient bg-primary text-light">
              <h5 class="card-title">Crear Evento</h5>
            </div>
            <div class="card-body">
              <div class="container-fluid">
                <form action="../calendario/save_schedule.php" method="post" id="schedule-form">
                  <input type="hidden" name="id" value="">
                  <div class="form-group mb-2">
                    <label for="title" class="control-label">Nombre</label>
                    <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                  </div>
                  <div class="form-group mb-2">
                    <label for="description" class="control-label">Descripción</label>
                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="description"
                      id="description" required></textarea>
                  </div>
                  <div class="form-group mb-2">
                    <label for="start_datetime" class="control-label">Inicio</label>
                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime"
                      id="start_datetime" required>
                  </div>
                  <div class="form-group mb-2">
                    <label for="end_datetime" class="control-label">Fin</label>
                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime"
                      id="end_datetime" required>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-center">
                <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i
                    class="fa fa-save"></i> Guardar</button>
                <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i
                    class="fa fa-reset"></i> Cancelar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <p class="fw-bold">*El sistema calcular la fecha y hora límite para permitir realizar un registro dentro de un
        rango de 15 minutos. </p>
    </div>
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
          <div class="modal-header rounded-0">
            <h5 class="modal-title">Detalles de evento</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body rounded-0">
            <div class="container-fluid">
              <dl>
                <dt class="text-muted">Nombre</dt>
                <dd id="title" class="fw-bold fs-4"></dd>
                <dt class="text-muted">Descripción</dt>
                <dd id="description" class=""></dd>
                <dt class="text-muted">Inicio</dt>
                <dd id="start" class=""></dd>
                <dt class="text-muted">Fin</dt>
                <dd id="end" class=""></dd>
              </dl>
            </div>
          </div>
          <div class="modal-footer rounded-0">
            <div class="text-end">
              <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Editar</button>
              <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Eliminar</button>
              <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Event Details Modal -->

    <?php
    $schedules = $conn->query("SELECT * FROM `schedule_list`");
    $sched_res = [];
    foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
      $row['sdate'] = date("F d, Y h:i A", strtotime($row['start_datetime']));
      $row['edate'] = date("F d, Y h:i A", strtotime($row['end_datetime']));
      $sched_res[$row['id']] = $row;
    }
    ?>
    <?php
    if (isset($conn))
      $conn->close();
    ?>

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
  <script src="../calendario/js/es.js"></script> <!--Idioma español Fullcalendar-->
  <script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
  </script>
  <script src="../calendario/js/script.js"></script>




</body>

</html>