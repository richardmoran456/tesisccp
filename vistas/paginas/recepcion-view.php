<style>
  .card {
    background: #FFFFFF;
    /* width: 300px; */
    border-radius: 4px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    margin: 0 auto;
    overflow: hidden;
  }

  .card-header {
    position: relative;
    background: #FFFFFF;
    height: 200px;
    text-align: center;
    overflow: hidden;
  }



  .card-header__follow {
    position: absolute;
    top: 20px;
    right: 20px;
    background: #4075FF;
    border-radius: 2px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    padding: 6px 10px;
    color: #FFCC49;
    font-size: 10px;
    font-weight: 600;
    line-height: normal;
    text-decoration: none;
    text-transform: uppercase;
  }

  .card-content {
    text-align: center;
    padding: 20px 20px;
  }

  .card-content__username {
    margin: 0 0 10px;
    color: #333333;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
  }

  .card-content__username .badge {
    display: inline-block;
    background: #FCD000;
    border-radius: 2px;
    margin: 0 10px 0;
    padding: 4px;
    color: #333333;
    font-size: 10px;
    font-weight: 600;
    vertical-align: middle;
  }

  .card-content__bio {
    color: #666666;
    font-size: 12px;
  }

  .card-footer {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: space-between;
    background: #4075FF;
    padding: 15px 40px;
    color: #333333;
    font-size: 14px;
    font-weight: 600;
    text-align: center;
  }

  .card-footer .label {
    display: block;
    margin: 4px 0 0;
    color: #666666;
    font-size: 10px;
    font-weight: 400;
  }

  .code {
    background: rgba(0, 0, 0, 0.1);
    max-width: 600px;
    border-radius: 2px;
    margin: 40px auto 100px;
    font-family: monospace;
    overflow: hidden;
    overflow-x: auto;
  }

  .code:before {
    content: "HTML Code";
    display: block;
    padding: 20px 20px 0;
    color: #333333;
    font-weight: 600;
  }
</style>

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
      <div class="row">
        <div class="col-12">
          Buscador
        </div>

      </div>
      <!-- /.row -->
      <div class="row">

        <?php
        for ($i = 0; $i < 12; $i++) {
          # code...
        ?>

          <div class="col-3 mb-3">
            <div class="card">
              <!-- Header -->
              <div class="card-header">
                <img src="<?php echo SERVERURL; ?>vistas/assets/images/hab.jpg" alt="Imagen de habitacion"></i><a class="card-header__follow" href="#">Ver</a>
              </div>
              <!-- Content-->
              <div class="card-content">
                <div class="card-content__username">Numero habitacion</div>
                <div class="card-content__bio">Tipo de habitacion</div>
              </div>
              <!-- Footer-->
              <div class="card-footer">
                <div class="card-footer__pens"> <span>Gran Hotel CCP Suites</span>
                </div>
              </div>
            </div>
          </div>
        <?php  } ?>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>