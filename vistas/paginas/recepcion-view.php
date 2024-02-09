<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Recepción</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Inicio</a></li>
            <li class="breadcrumb-item active">Recepción</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <!-- /.row -->
      <div class="row">

        <?php
        require_once "./controladores/habitacionControlador.php";
        $ins_habitacion = new habitacionControlador();
        $mainModel = new mainModel();

        $lista =  $ins_habitacion->listar_habitacion_recepcion_controlador();
        foreach ($lista as $fila) {

        ?>
          <div class="col-3 col-sm-6 col-md-6 col-lg-3">
            <?php
            $bg_hab = '';

            $icon_hab = '';
            if ($fila['estatus_habitacion'] === 'disponible') {
              $bg_hab = 'bg-success';
              $icon_hab = 'fas fa-key';
            } else if ($fila['estatus_habitacion'] === 'ocupada') {
              $bg_hab = 'bg-danger';
              $icon_hab = 'fas fa-bed';
            } else if ($fila['estatus_habitacion'] === 'mantenimiento') {
              $bg_hab = 'bg-info';
              $icon_hab = 'fas fa-hand-sparkles ';
            }

            ?>
            <div class="small-box <?= $bg_hab; ?>">
              <div class="inner">
                <h3><?= $fila['identificador']; ?></h3>

                <p><?= $fila['tipo']; ?> - <?= $fila['ubicacion']; ?> - <i><?= $fila['estatus_habitacion']; ?></i></p>
              </div>
              <div class="icon">
                <i class="<?= $icon_hab; ?>"></i>
              </div>
              <a href="<?php echo SERVERURL . 'recepcion-habitacion/' . mainModel::encryption($fila['habitacion_id']); ?>" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        <?php  } ?>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>