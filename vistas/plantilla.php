<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo COMPANY; ?></title>
  <?php include "./vistas/tema/link.php";

  ?>


</head>

<body class="hold-transition  sidebar-mini " id="cuerpoid">
  <?php
  $peticionAjax = false;
  require_once "./controladores/vistasControlador.php";
  $IV = new vistasControlador();

  $vistas = $IV->obtener_vistas_controlador();

  if ($vistas == "login" || $vistas == "404") {

    require_once "./vistas/paginas/" . $vistas . "-view.php";
  } else {

    session_start(['name' => 'SPM']);


    $pagina = explode("/", $_GET['views']);
    $_SESSION['page_active'] =  $pagina[0];
    require_once "./controladores/loginControlador.php";
    $lc = new loginControlador();

    if (!isset($_SESSION['token_spm']) || !isset($_SESSION['usuario_spm']) || !isset($_SESSION['id_spm'])) {
      echo $lc->forzar_cierre_sesion_controlador();
      exit();
    }
  ?>

    <div class="wrapper">

      <!-- Navbar -->
      <?php include "tema/navbar.php"; ?>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <?php include "tema/aside.php"; ?>

      <!-- Content Wrapper. Contains page content -->

      <?php include $vistas; ?>

      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <?php include "tema/control-sidebar.php"; ?>
      <!-- /.control-sidebar -->

      <!-- Main Footer -->
      <footer class="main-footer" style="background-color: #424446;">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
          <?php

          echo $_SESSION['page_active']; ?>
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2023-2024 <a href="https://adminlte.io">CCP Suites</a>.</strong> Todos los Derechos Reservados.
      </footer>

    </div>
  <?php

    include "tema/logout.php";
  }
  ?>
  <?php include "tema/script.php" ?>

</body>


</html>