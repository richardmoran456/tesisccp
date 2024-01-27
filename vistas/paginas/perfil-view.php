<?php
require_once "./controladores/usuarioControlador.php";
$instancia_controlador = new usuarioControlador();
$mainModel = new mainModel();
$id = $mainModel::encryption(intval($_SESSION['id_spm']));

$datos_modulo = $instancia_controlador->datos_usuario_controlador("Unico", $id);

if ($datos_modulo->rowCount() == 1) {
  $campos = $datos_modulo->fetch();
}
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mi perfil</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Mi perfil</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="<?php echo  $_SESSION['avatar_default']; ?>" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center"><?php echo $_SESSION['nombre_spm']; ?></h3>

              <p class="text-muted text-center">Departamento</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Cambiar Foto de Perfil</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form class="FormularioAjax " action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" method="POST" data-form="update" autocomplete="off" enctype="multipart/form-data">




                <div class="custom-file mb-2">
                  <input type="file" class="custom-file-input" id="customFile" name="file">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <input type="submit" class="btn btn-block bg-gradient-primary btn-sm" value="Cambiar">
              </form>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Actividad</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Configurar perfil</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">

                <!-- /.tab-pane -->
                <div class="tab-pane active" id="timeline">
                  <!-- The timeline -->
                  <div class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-danger">
                        10 Feb. 2014
                      </span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-envelope bg-primary"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 12:05</span>

                        <h3 class="timeline-header"><a href="#">Modulo</a> que hizo</h3>

                        <div class="timeline-body">
                          Describir la actividad realizada.
                        </div>
                        <!-- <div class="timeline-footer">
                          <a href="#" class="btn btn-primary btn-sm">Read more</a>
                          <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </div> -->
                      </div>
                    </div>
                    <!-- END timeline item -->




                  </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" placeholder="Name" value="<?php echo $campos['nombre_completo']; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $campos['username']; ?>">
                      </div>
                    </div>




                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Actualizar</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>