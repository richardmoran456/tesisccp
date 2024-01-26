<!-- jQuery -->
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/jquery/jquery.min.js"></script>
<!-- Script para el combobox -->
<script>
document.getElementById('fk_ala_reg').addEventListener('change', function() {
  var ala_id = this.value;
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'getPisos.php?ala_id=' + ala_id, true);
  xhr.onload = function() {
    if (this.status == 200) {
      document.getElementById('fk_piso_reg').innerHTML = this.responseText;
    }
  };
  xhr.send();
});
</script>

<?php
if (isset($_GET['ala_id'])) {
  require_once "./controladores/alaControlador.php";
  $controlador = new alaControlador();
  $pisos = $controlador->getPisos($_GET['ala_id']);
  foreach ($pisos as $piso) {
    echo "<option value='{$piso['id']}'>{$piso['ubicacion']}</option>";
  }
}
?>

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