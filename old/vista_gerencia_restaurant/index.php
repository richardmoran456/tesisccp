<?php
session_start();
include_once "includes/header.php";
?>
<div class="card">
    <div class="card-header text-center">
        <h1>Niveles del Hotel</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <?php
            include "../conexion.php";
            $query = mysqli_query($conexion, "SELECT * FROM salas WHERE estado = 1");
            $result = mysqli_num_rows($query);
            if ($result > 0) {
                while ($data = mysqli_fetch_assoc($query)) { ?>
                    <div class="col-md-3 shadow-lg">
                        <div class="col-12">
                            <img src="../assets/img/salas.jpg" class="product-image" alt="Product Image">
                        </div>
                        <h6 class="my-3 text-center"><span class="badge badge-info"><?php echo $data['nombre']; ?></span></h6>

                        <div class="mt-4">
                            <button type="button" class="btn btn-primary btn-block btn-flat" data-toggle="modal" data-target="#exampleModal<?php echo $data['id']; ?>">
                                <i class="far fa-eye mr-2"></i>
                                Ver
                            </button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Seleccione una opción</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body ">
                                    <a class="btn btn-primary" href="mesas.php?id_sala=<?php echo $data['id']; ?>&mesas=<?php echo $data['mesas']; ?>&area=Norte">
                                        Ala Norte
                                    </a>
                                    <a class="btn btn-primary" href="mesas.php?id_sala=<?php echo $data['id']; ?>&mesas=<?php echo $data['mesas']; ?>&area=Sur">
                                        Ala Sur
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>
<?php  include_once "includes/footer.php";

?>