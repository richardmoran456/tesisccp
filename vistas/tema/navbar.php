<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <?php
        require_once "./controladores/notificacionControlador.php";
        $ins_controlador = new notificacionControlador();

        $lista_notificacion =  $ins_controlador->listar_notificacion_controlador();
        $tabla = "";
        $contador = 0;


        ?>

        <?php if ($lista_notificacion['contador'] > 0) { ?>
          <span class="badge badge-warning navbar-badge"><?php echo $lista_notificacion['contador']; ?></span>
        <?php } ?>

      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">


        <span class="dropdown-header"><?php echo $lista_notificacion['contador']; ?> Notificaciones</span>
        <div class="dropdown-divider"></div>
        <?php
        foreach ($lista_notificacion['datos'] as $notify) {

        ?>


          <a href="#" class="dropdown-item notificacionccp" id="<?php echo $notify["notificacion_id"]; ?>" data-urls="<?php echo SERVERURL . $notify["url_notificacion"]; ?>">
            <p class="text-sm  <?php echo ($notify["leido"] === "si") ? "font-weight-light" : "font-weight-bold"; ?> "> <?php echo $notify["descripcion_notificacion"] ?></p>

          </a>
        <?php  } ?>

        <div class="dropdown-divider"></div>
        <!-- <a href="<?php echo SERVERURL . "notificaciones" ?>" class="dropdown-item dropdown-footer">Ver todo</a> -->
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li> -->

    <li class="nav-item">
      <a class="nav-link btn-exit-system" href="#" role="button">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </li>
  </ul>
</nav>