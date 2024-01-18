<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Crear Puesto</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "puestos" ?>">Puestos</a></li>
                        <li class="breadcrumb-item active">Crear Puesto</li>
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
                            <h5 class="card-title">Formulario de creación Puesto</h5>

                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nihil praesentium quod pariatur accusamus temporibus, illum blanditiis id dignissimos commodi ullam perspiciatis! Voluptatum sunt provident vel ratione nesciunt? Dolorum, inventore?
                            </p>



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/puestoAjax.php" method="POST" data-form="save" autocomplete="off">
                                <div class="form-group">
                                    <label for="nombre_puesto_reg">Nombre puesto</label>
                                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" id="nombre_puesto_reg" placeholder="Ingresa el nombre" maxlength="35" required="" name="nombre_puesto_reg">
                                </div>
                                <div class="form-group">
                                    <label for="fk_departamento_reg">Departamento </label>
                                    <select class="custom-select " id="fk_departamento_reg" name="fk_departamento_reg">
                                        <?php
                                        require_once "./controladores/departamentoControlador.php";
                                        $ins_controlador = new departamentoControlador();
                                        $lista =  $ins_controlador->listar_departamento_controlador();
                                        $opc = "";
                                        foreach ($lista as $fila) {
                                            $opc .= "<option value='$fila[departamento_id]'>$fila[nombre]</option>";
                                        }

                                        echo $opc;
                                        ?>




                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Registrar puesto</button>
                            </form>

                            <div class="mt-4">
                                <a href="<?php echo SERVERURL . "puestos" ?>">Volver a puestos</a>
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