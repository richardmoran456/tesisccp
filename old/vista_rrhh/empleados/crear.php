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
          <img src="../../img/userhu.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Recursos Humanos</a>
        </div>
      </div>

      <?php include("../sidebar.php"); ?>

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
            <h1 class="m-0">Crear Empleados</h1>
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
                Registro de Empleados
              </div>
              <div class="card-body">
                <!--El enctype "multipart es parta que se puedan adjuntar archivos"-->
                <form action="" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="identidad" class="form-label">Documento de identidad</label>
                    <input type="text" class="form-control" name="identidad" id="identidad"
                      aria-describedby="helpId" placeholder="Documento de identidad">
                  </div>

                  <div class="mb-3">
                    <label for="primernombre" class="form-label">Primer Nombre</label>
                    <input type="text" class="form-control" name="primernombre" id="primernombre"
                      aria-describedby="helpId" placeholder="Primer Nombre">
                  </div>
                  <div class="mb-3">
                    <label for="segundonombre" class="form-label">Segundo Nombre</label>
                    <input type="text" class="form-control" name="segundonombre" id="segundonombre"
                      aria-describedby="helpId" placeholder="Segundo Nombre">
                  </div>

                  <div class="mb-3">
                    <label for="primerapellido" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" name="primerapellido" id="primerapellido"
                      aria-describedby="helpId" placeholder="Primer Apellido">
                  </div>

                  <div class="mb-3">
                    <label for="segundoapellido" class="form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" name="segundoapellido" id="segundoapellido"
                      aria-describedby="helpId" placeholder="Segundo Apellido">
                  </div>

                  <div class="mb-3">
                    <label for="foto" class="form-label">Foto:</label>
                    <input type="file" class="form-control" name="" id="foto" aria-describedby="helpId"
                      placeholder="Foto">
                  </div>

                  <div class="mb-3">
                    <label for="curriculum" class="form-label">Curriculum (pdf):</label>
                    <input type="file" class="form-control" name="" id="curriculum" aria-describedby="helpId"
                      placeholder="curriculum">
                  </div>

                  <div class="mb-3">
                    <label for="idpuesto" class="form-label">Puesto</label>
                    <select class="form-select form-select-lg" name="idpuesto" id="idpuesto">
                      <option selected>Jefe Recursos Humanos</option>
                      <option value="">Jefe Recepcion</option>
                      <option value="">Analista Recursos Humanos </option>
                      <option value="">Jefa de Almacen</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="fechadeingreso" class="form-label">Fecha de Ingreso</label>
                    <input type="date" class="form-control" name="fechadeingreso" id="fechadeingreso"
                      aria-describedby="emailHelpId" placeholder="Fecha de Ingreso">
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