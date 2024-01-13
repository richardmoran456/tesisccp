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
  <link rel="stylesheet" href="../../plantilla/plugins/fontawesome-free/css/all.min.css">

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
            <h1 class="m-0">Decodificadores </h1>
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
    <!-- /.content-header data tables -->

    <!-- Main content -->
    <!-- Se crea la section class "content" con col-12 para que abarque 12 columnas 
    yy se mentenga en un marco con bordes-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-10">
            <div class="card">
              <div class="card-header">
                Registro de Decodificadores
              </div>
              <div class="card-body">
                <!--El enctype "multipart es parta que se puedan adjuntar archivos"-->
                <form action="" method="post" enctype="multipart/form-data">

                  <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" class="form-control" name="modelo" id="modelo"
                      aria-describedby="helpId" placeholder="modelo">
                  </div>
                  <div class="mb-3">
                    <label for="ubicacion" class="form-label">Ubicacion</label>
                    <input type="text" class="form-control" name="ubicacion" id="ubicacion"
                      aria-describedby="helpId" placeholder="ubicacion">
                  </div>

                  <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <input type="text" class="form-control" name="estado" id="estado"
                      aria-describedby="helpId" placeholder="estado">
                  </div>

                  <div class="mb-3">
                    <label for="serial" class="form-label">Serial</label>
                    <input type="text" class="form-control" name="serial" id="serial"
                      aria-describedby="helpId" placeholder="serial">
                  </div>


                  <div class="mb-3">
                    <label for="idplan" class="form-label">Plan</label>
                    <select class="form-select form-select-lg" name="idPlan" id="idplan">
                      <option selected>Basico</option>
                      <option value="">HD</option>
                      <option value="">Mega HD</option>
                      <option value="">HD+ </option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="fechaderecarga" class="form-label">Fecha de Recarga</label>
                    <input type="date" class="form-control" name="fechaderecarga" id="fechaderecarga"
                      aria-describedby="emailHelpId" placeholder="Fecha de Recarga">
                  </div>

                  <button type="submit" class="btn btn-success">Agregar Registro</button>
                  <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

                </form>

              </div>

            </div>
    </section>


    <!-- /.content -->
  </div>

  <?php include("../../templates/footer.php"); ?>

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../../plantilla/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../plantilla/dist/js/adminlte.min.js"></script>
</body>

</html>