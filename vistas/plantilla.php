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

    ?>
<div class="wrapper">

  <!-- Navbar -->
  <?php include "tema/navbar.php";?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php include "tema/aside.php";?>

  <!-- Content Wrapper. Contains page content -->
<?php include $vistas;?>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
 <?php include "tema/control-sidebar.php";?>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

</div>
<?php
}
?>
<?php include "tema/script.php"?>
</body>

</html>
