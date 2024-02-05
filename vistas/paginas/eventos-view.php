<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Eventos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Inicio</a></li>
            <li class="breadcrumb-item active">Eventos</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body" id="calendar"></div>
          </div>
        </div>
        <!-- <div class="col-lg-4 ">
          <div class="card t rounded-0 shadow">
            <div class="card-header bg-gradient bg-primary text-light">
              <h5 class="card-title">Crear Evento</h5>
            </div>
            <div class="card-body">
              <div class="container-fluid">
                <form action="save_schedule.php" method="post" id="schedule-form">
                  <input type="hidden" name="id" value="">
                  <div class="form-group mb-2">
                    <label for="title" class="control-label">Nombre</label>
                    <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                  </div>
                  <div class="form-group mb-2">
                    <label for="description" class="control-label">Descripción</label>
                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" required></textarea>
                  </div>
                  <div class="form-group mb-2">
                    <label for="start_datetime" class="control-label">Inicio</label>
                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                  </div>
                  <div class="form-group mb-2">
                    <label for="end_datetime" class="control-label">Fin</label>
                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-center">
                <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Guardar</button>
                <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancelar</button>
              </div>
            </div>
          </div>
        </div> -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>


<script>
  <?php

  require_once "./controladores/eventoControlador.php";
  $ins_controlador = new eventoControlador();
  $sched_res = [];
  $schedules =  $ins_controlador->listar_evento_controlador();

  foreach ($schedules as $row) {
    $row['sdate'] = date("F d, Y h:i A", strtotime($row['inicio_evento']));
    $row['edate'] = date("F d, Y h:i A", strtotime($row['finaliza_evento']));
    $sched_res[$row['evento_id']] = $row;
  }
  ?>
</script>