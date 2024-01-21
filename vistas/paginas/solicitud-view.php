<?php
require_once "./controladores/solicitudControlador.php";
$ins_controlador = new solicitudControlador();

$datos_modulo = $ins_controlador->datos_solicitud_controlador("Unico", $pagina[1]);

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
                    <h1 class="m-0">Solicitud</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "solicitudes" ?>">Solicitudes</a></li>
                        <li class="breadcrumb-item active">Solicitud</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Titulo Solicitud</label>
                            <input type="text" id="inputName" class="form-control" value="<?php echo $campos['titulo_solicitud'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Project Description</label>
                            <textarea id="inputDescription" class="form-control" rows="4" readonly><?php echo $campos['titulo_solicitud'] ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="creado_por_up">Creado por:</label>
                            <input type="text" id="creado_por_up" class="form-control" value="<?php echo $campos['creador'] ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="fecha_creacion_up">Fecha creación:</label>
                            <input type="text" id="fecha_creacion_up" class="form-control" value="<?php


                                                                                                    echo $fecha_formateada = date("d M, Y H:i A", strtotime($campos['created_at'])); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="departamento_origen_up">Departamento Destino</label>
                            <input type="text" id="departamento_origen_up" class="form-control" value="<?php echo $campos['nombre_departamento'] ?>" readonly>
                        </div>
                        <div>
                            <?php if ($campos['estatus_solicitud'] ===  'abierto') { ?>
                                <form class="FormularioAjax btn-group" action="<?php echo SERVERURL . 'ajax/solicitudAjax.php'; ?>" method="POST" data-form="update" autocomplete="off">
                                    <input type="hidden" name="solicitud_id_del" value="<?php echo mainModel::encryption($campos['solicitud_id']) ?>">
                                    <input type="hidden" name="tipo_cambio" value="cerrado">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Cancelar solicitud
                                    </button>
                                </form>
                                <form class="FormularioAjax btn-group" action="<?php echo SERVERURL . 'ajax/solicitudAjax.php'; ?>" method="POST" data-form="update" autocomplete="off">
                                    <input type="hidden" name="solicitud_id_del" value="<?php echo mainModel::encryption($campos['solicitud_id']) ?>">
                                    <input type="hidden" name="tipo_cambio" value="completado">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Completar solicitud
                                    </button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Historial</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body ">

                        <?php
                        if ($campos['estatus_solicitud'] === 'abierto') {
                        ?>
                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/solicitudAjax.php" method="POST" data-form="save" autocomplete="off">
                                <div class="input-group input-group-md mb-4 p-2">
                                    <input type="text" class="form-control" name="historial_reg">
                                    <input type="hidden" class="form-control" name="fk_solicitud" value="<?php echo $campos['solicitud_id'] ?>">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-info btn-flat"><i class="fas fa-paper-plane"></i></button>
                                    </span>
                                </div>
                            </form>
                        <?php } ?>
                        <div class="timeline">
                            <?php

                            $lista =  $ins_controlador->historial_solicitud_controlador($campos['solicitud_id']);
                            $opc = "";
                            $solicitud_id_bd = $campos['solicitud_id'];

                            foreach ($lista as $fila) {
                                $opc .= '
                            <div class="timeline timeline-inverse">

                            <div class="time-label">
                                <span class="bg-light">
                                    ' .  date("d M, Y", strtotime($fila['created_at'])) . '
                                </span>
                            </div>

                            <div>
                            <i class="fas fa-at bg-primary"></i>
                                

                                <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> ' . date(" H:i A", strtotime($fila['created_at'])) . '</span>

                                    <h3 class="timeline-header"><a href="#">' . $fila['creador'] . '</a>, asignado al departamento de ' . $fila['departamento'] . '</h3>

                                    <div class="timeline-body">
                                       ' . $fila['descripcion_solicitud'] . '
                                    </div>

                                </div>
                            </div>
                            <!-- END timeline item -->




                        </div>
                            
                            ';
                            }

                            echo $opc;
                            ?>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>