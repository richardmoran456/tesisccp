<?php
require_once "./controladores/tareaControlador.php";
$ins_controlador = new tareaControlador();

$datos_modulo = $ins_controlador->datos_tarea_controlador("Unico", $pagina[1]);

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
                    <h1 class="m-0">Tarea</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "tareas" ?>">Tareas</a></li>
                        <li class="breadcrumb-item active">Tarea</li>
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
                            <label for="inputName">Titulo Tarea</label>
                            <input type="text" id="inputName" class="form-control" value="<?php echo $campos['titulo_tarea'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Descripción tareas</label>
                            <textarea id="inputDescription" class="form-control" rows="4" readonly><?php echo $campos['descripcion_tarea'] ?></textarea>
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

                            <?php
                            if ($_SESSION['privilegio_spm'] === 2 or  $_SESSION['privilegio_spm'] === 4) {



                                if ($campos['estatus_tarea'] ===  'abierto') { ?>
                                    <form class="FormularioAjax btn-group" action="<?php echo SERVERURL . 'ajax/tareaAjax.php'; ?>" method="POST" data-form="update" autocomplete="off">
                                        <input type="hidden" name="tarea_id_del" value="<?php echo mainModel::encryption($campos['tarea_id']) ?>">
                                        <input type="hidden" name="titulo_tarea" value="<?php echo $campos['titulo_tarea'] ?>">
                                        <input type="hidden" name="departamento_origen" value="<?php echo $campos['fk_departamento_origen'] ?>">
                                        <input type="hidden" name="departamento_destino" value="<?php echo $campos['fk_departamento_destino'] ?>">

                                        <input type="hidden" name="tipo_cambio" value="cerrado">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Cancelar Tarea
                                        </button>
                                    </form>
                                    <form class="FormularioAjax btn-group" action="<?php echo SERVERURL . 'ajax/tareaAjax.php'; ?>" method="POST" data-form="update" autocomplete="off">
                                        <input type="hidden" name="tarea_id_del" value="<?php echo mainModel::encryption($campos['tarea_id']) ?>">
                                        <input type="hidden" name="tipo_cambio" value="completado">
                                        <input type="hidden" name="titulo_tarea" value="<?php echo $campos['titulo_tarea'] ?>">
                                        <input type="hidden" name="departamento_origen" value="<?php echo $campos['fk_departamento_origen'] ?>">
                                        <input type="hidden" name="departamento_destino" value="<?php echo $campos['fk_departamento_destino'] ?>">
                                        <button type="submit" class="btn btn-success btn-sm">
                                            Completar Tarea
                                        </button>
                                    </form>
                            <?php }
                            } ?>
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

                        /** Permite agregar comentarios a la tarea si es es recepcion2,gerencia4 o si el nivel de privilegio es el mismo que tiene el usuario */
                        if ($_SESSION['privilegio_spm'] === 2 or  $_SESSION['privilegio_spm'] === 4 or $_SESSION['privilegio_spm'] === $campos['fk_departamento_destino']) {
                            if ($campos['estatus_tarea'] === 'abierto') {
                        ?>
                                <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/tareaAjax.php" method="POST" data-form="save" autocomplete="off">
                                    <div class="input-group input-group-md mb-4 p-2">
                                        <input type="text" class="form-control" name="historial_reg">
                                        <input type="hidden" class="form-control" name="fk_tarea" value="<?php echo $campos['tarea_id'] ?>">

                                        <input type="hidden" name="departamento_origen_2" value="<?php echo $campos['fk_departamento_origen'] ?>">
                                        <input type="hidden" name="fk_departamento_destino_2" value="<?php echo $campos['fk_departamento_destino'] ?>">
                                        <input type="hidden" name="titulo_tarea_2" value="<?php echo $campos['titulo_tarea'] ?>">
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-info btn-flat"><i class="fas fa-paper-plane"></i></button>
                                        </span>
                                    </div>
                                </form>
                        <?php }
                        } ?>
                        <div class="timeline">
                            <?php

                            $lista =  $ins_controlador->historial_tarea_controlador($campos['tarea_id']);
                            $opc = "";
                            $tarea_id_bd = $campos['tarea_id'];

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
                                       ' . $fila['descripcion_tarea'] . '
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