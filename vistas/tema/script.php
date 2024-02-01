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
<!-- bs-custom-file-input -->
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="<?php echo SERVERURL; ?>vistas/assets/plugins/fullcalendar/main.js"></script>

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


    $('.notificacionccp').click(function() {
      var notificacionSeleccionada = $(this).attr('id');
      var urls = $(this).attr('data-urls');
      // Enviar el ID a través de AJAX o a otra función
      console.log(urls);

      if (notificacionSeleccionada) {
        $.ajax({
          type: "POST",
          url: '<?php echo SERVERURL; ?>ajax/notificacionAjax.php',
          data: 'notificacion_id=' + notificacionSeleccionada,
          success: function(res) {

            if (res) {
              console.log("actualizados");
              window.location.href = urls;
            } else {
              console.log("no actualizado")
            }
          }
        })
      }
    });


  });
</script>
<!-- Combobox -->


<script>
  $(function() {
    bsCustomFileInput.init();
  });
</script>
<?php
/** Esta parte es visible solo en la vista de eventos. */

if ($pagina[0] === 'eventos') { ?>

  <script src="<?php echo SERVERURL; ?>vistas/assets/plugins/fullcalendar/es.js"></script>

  <!-- <script src="<?php echo SERVERURL; ?>vistas/assets/plugins/fullcalendar/script.js"></script> -->
  <script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>');


    var events = [];
    if (!!scheds) {
      Object.keys(scheds).map((k) => {
        var row = scheds[k];

        events.push({
          id: row.evento_id,
          descript: row.descripcion_evento,
          title: row.titulo_evento,
          start: row.inicio_evento,
          end: row.finaliza_evento,
        });
      });
    }



    var date = new Date();
    var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();



    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es', //Idioma Español FullCalendar
        height: 650,
        headerToolbar: {
          left: "prev,next today",
          right: "dayGridMonth,dayGridWeek,list",
          center: "title",
        },
        selectable: true,

        events: events,
        eventClick: function(info) {

          Swal.fire({
            title: info.event.title,
            text: info.event.extendedProps.descript,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ver",
            cancelButtonText: "Cancelar",
          }).then((result) => {
            if (result.value) {
              return window.location.href = '<?php echo SERVERURL; ?>' + 'evento-info/' +
                info.event.id;
            }
          });
        },
        select: function() {
          Swal.fire({
            title: "Estas seguro?",
            text: "Quieres crear un nuevo evento?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Crear",
            cancelButtonText: "Cancelar",
          }).then((result) => {
            if (result.value) {
              return window.location.href = '<?php echo SERVERURL; ?>' + 'evento-create';
            }
          });
        },
      });

      calendar.render();
    });
  </script>
<?php } ?>