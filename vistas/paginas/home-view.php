<?php
//  FIXME Repasar como se estructura una consulta SLQ para obtener el numero de filas de una tabla 
// https://lineadecodigo.com/sql/contar-el-numero-de-registros-en-sql/

/**
 * Tenemos un controlador y modelo para las estadisticas
 * por eso realizamos solamente una instancia del mismo y lo que cambiara son las funciones 
 * que llamaremos 
 *  
 * Hice una de ejemplo, donde mostramos la cantidad de usuarios en el sistema.
 * 
 * QUE HACER PRIMERO?
 * 1. Identificar la card en la que trabajaras. 
 *  En mi ejemplo ubique la card de usuarios registrados.
 * 2. En el controlador cree una funcion llamada show_total_usuarios()
 *  En esa funcion del controlador estoy invocando una funcion del modelo 
 * 3. La funcion del modelo es la que tiene la conexion a la base de datos
 *  En esta funcion cree una sentencia SQL que me da la cantidad de filas que tiene esa tabla.
 *  Si no manejas esos conceptos aqui esta lo basico https://lineadecodigo.com/sql/contar-el-numero-de-registros-en-sql/
 *  En la funcion del modelo solo vas a cambiar el nombre de la tabla.
 * en caso de que se vaya a necesitar comparar un atributo de la tabla usa el WHERE en la sentencia SQL
 * 
 * 
 * EL FLUJO ES VISTA-CONTROLADOR-MODELO ESO QUIERE DECIR QUE DEBES SEGUIR LOS PASOS DESCRITOS ACA.
 */


require_once "./controladores/estadisticasControlador.php";
$ins_controlador = new estadisticasControlador();

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Inicio</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Inicio</a></li>
            <li class="breadcrumb-item active">Pagina de Inicio</li>
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

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Usuarios registrados</span>
              <span class="info-box-number"><?php echo  $ins_controlador->show_total_usuarios(); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!-- <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-bed"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Habitaciones Disponibles</span>
              <span class="info-box-number">
                15
              </span>
            </div>
             /.info-box-content -->
          <!-- </div> -->
          <!-- /.info-box -->
        <!-- </div> -->
        <!-- /.col -->
        <!-- <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-bed"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ocupadas</span>
              <span class="info-box-number">10</span>
            </div> -->
            <!-- /.info-box-content -->
          <!-- </div> -->
          <!-- /.info-box -->
        <!-- </div>  -->
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <!-- <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Eventos al mes</span>
              <span class="info-box-number">5</span>
            </div>
             /.info-box-content -->
          <!-- </div> -->
          <!-- /.info-box -->
        <!-- </div> -->
        <!-- /.col -->

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>



  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-address-card"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Empleados</span>
              <span class="info-box-number"><?php echo  $ins_controlador->show_total_empleados(); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tasks"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tareas asignadas</span>
              <span class="info-box-number"><?php echo  $ins_controlador->show_total_tareas(); ?></span>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-wrench"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Equipos registrados</span>
              <span class="info-box-number"><?php echo  $ins_controlador->show_total_equipos(); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-wrench"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Equipos dañados</span>
              <span class="info-box-number"><?php echo  $ins_controlador->show_total_equipos_mal(); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>



  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-thumbs-up"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Solicitudes Completadas</span>
              <span class="info-box-number"><?php echo  $ins_controlador->show_total_solicitudes_completadas(); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-business-time"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">solicitudes en espera</span>
              <span class="info-box-number"><?php echo  $ins_controlador->show_total_solicitudes_abiertas(); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-down"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Solicitudes rechazadas</span>
              <span class="info-box-number"><?php echo  $ins_controlador->show_total_solicitudes_cerradas(); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-sitemap"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total departamentos</span>
              <span class="info-box-number"><?php echo  $ins_controlador->show_total_departamentos(); ?></span>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>