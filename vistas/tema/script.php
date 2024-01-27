<!-- jQuery -->
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/jquery/jquery.min.js"></script>
<!-- Script para el combobox -->

<!-- Bootstrap 4 -->
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo SERVERURL; ?>vistas/assets/dist/js/adminlte.min.js"></script>


<!-- SweetAlert2 -->
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/toastr/toastr.min.js"></script>


<!-- Alertas -->
<script src="<?php echo SERVERURL; ?>vistas/assets/js/alertas.js"></script>


<!-- DataTables  & Plugins -->
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>



<!-- Combobox -->
<script>
  $(document).ready(function() {
    $('#fk_piso_reg').html('<option value="">Selecciona la ala primero</option>');
    $('#fk_ala_reg').on('change', function() {

      // esto signinfica que va a detectar el cambio que ocurra en el atributo del DOM que tenga como ID fk_ala_reg
      var countryID = $(this).val();

      if (countryID) {
        console.log(countryID);
        $.ajax({
          type: 'POST', // Se envia por metodo POST igual que el formulario
          url: '<?php echo SERVERURL; ?>ajax/alaAjax.php', // Se envia a nuestro gestor
          data: 'combo=' + countryID, // Enviamos el id que sufrio el cambio o fue seleccionado en el select
          success: function(html) {
            $('#fk_piso_reg').html(html); // cuando recibimos los datos del controlador lo asignamos a la data del piso
          }
        });
      } else {
        $('#fk_piso_reg').html('<option value="">Selecciona la ala primero</option>');
      }
    });

  });
</script>
<!-- Combobox -->