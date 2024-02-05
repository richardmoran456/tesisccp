<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Crear Tarea</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "tareas" ?>">Tareas</a></li>
                        <li class="breadcrumb-item active">Crear Tarea</li>
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
                <div class="col-lg-6">


                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h5 class="card-title">Formulario de creación Tarea</h5>

                            <p class="card-text">
                            </p>



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/tareaAjax.php" method="POST" data-form="save" autocomplete="off">
                                <div class="form-group">
                                    <label for="titulo_tarea_reg">Titulo de tarea</label>
                                    <input type="text" class="form-control" id="titulo_tarea_reg" placeholder="Ingresa el titulo" maxlength="35" required="" name="titulo_tarea_reg">
                                </div>

                                <div class="form-group">
                                    <label for="descripción_tarea_reg">Descripción tarea <small>max 500 caracteres</small></label>
                                    <textarea id="descripción_tarea_reg" class="form-control" rows="4" name="descripción_tarea_reg"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="fk_departamento_reg">Departamento destino</label>
                                    <select class="custom-select " id="fk_departamento_reg" name="fk_departamento_reg">
                                        <?php
                                        require_once "./controladores/departamentoControlador.php";
                                        $ins_controlador = new departamentoControlador();
                                        $lista =  $ins_controlador->listar_departamento_controlador();
                                        $opc = "";
                                        foreach ($lista as $fila) {
                                            if ($fila['departamento_id'] != $_SESSION['privilegio_spm']) {
                                                $opc .= "<option value='$fila[departamento_id]'>$fila[nombre]</option>";
                                            }
                                        }

                                        echo $opc;
                                        ?>




                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Registrar Tarea</button>
                            </form>

                            <div class="mt-4">
                                <a href="<?php echo SERVERURL . "tareas" ?>">Volver a tareas</a>
                            </div>

                        </div>
                    </div><!-- /.card -->
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>