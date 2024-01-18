<div class="login-page">
  <div class="login-box ">
    <div class="login-logo">
      <a href="../../index2.html"><?php echo COMPANY; ?></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body ">
        <p class="login-box-msg">Inicie sesión</p>

        <form action="" method="post" class="mb-4" autocomplete="off">
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="UserName" name="usuario_log" maxlength="35" required="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="UserPassword" name="clave_log" maxlength="100" required="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
            </div>

          </div>
        </form>


      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
</div>

<?php
if (isset($_POST['usuario_log']) && isset($_POST['clave_log'])) {
  require_once "./controladores/loginControlador.php";

  $ins_login = new loginControlador();

  echo $ins_login->iniciar_sesion_controlador();
}
?>