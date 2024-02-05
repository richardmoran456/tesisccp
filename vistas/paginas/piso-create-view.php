<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Crear un nuevo piso</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "home" ?>">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SERVERURL . "pisos" ?>">Pisos</a></li>
                        <li class="breadcrumb-item active">Crear piso</li>
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
                            <h5 class="card-title">Formulario de creación de pisos</h5>

                            <p class="card-text">
                                Formulario para la creacion de un piso, Recuerde que debe seleccionar el aña en la que se encuentra.
                            </p>



                            <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/pisoAjax.php" method="POST" data-form="save" autocomplete="off">
                                <div class="form-group">
                                    <label for="nombre_piso_reg">Nombre del piso</label>
                                    <input type="text"  class="form-control" id="nombre_piso_reg" placeholder="Ingresa el nombre del piso" maxlength="35" required="" name="nombre_piso_reg">
                                </div>
                                <div class="form-group">
                                    <label for="fk_ala_reg">Ala </label>
                                    <select class="custom-select " id="fk_ala_reg" name="fk_ala_reg">
                                        <?php
                                        require_once "./controladores/alaControlador.php";
                                        $ins_controlador = new alaControlador();
                                        $lista =  $ins_controlador->listar_ala_controlador();
                                        $opc = "";
                                        foreach ($lista as $fila) {
                                            $opc .= "<option value='$fila[ala_id]'>$fila[nombre]</option>";
                                        }
                                        
                                        echo $opc;
                                        ?>




                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Registrar piso</button>
                            </form>

                            <div class="mt-4">
                                <a href="<?php echo SERVERURL . "pisos" ?>">Volver a pisos</a>
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