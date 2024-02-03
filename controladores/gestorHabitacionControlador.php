<?php

if ($peticionAjax) {
  require_once "../modelos/gestorHabitacionModelo.php";
} else {
  require_once "./modelos/gestorHabitacionModelo.php";
}


class gestorHabitacionControlador extends gestorHabitacionModelo
{
  public function buscar_huesped_controlador()
  {
    $busqueda = mainModel::limpiar_cadena($_POST['search']);
    $fk_habitacion = mainModel::limpiar_cadena($_POST['fk_habitacion']);

    $datos = gestorHabitacionModelo::buscar_huesped($busqueda);

    // var_dump($datos);
    $con = 0;
    $opc = "";
    if ($datos) {
      foreach ($datos as $fila) {
        $con = $con + 1;
        $opc .= '
        <div class="list-group-item">
          <div class="row">
            <div class="col px-2">
              <div>
                <div class="float-right">' . $fila['documento'] . '</div>
                  <h5>' . $fila['nombre_completo'] . '</h5>
                  <form id="prueba' . $con . '" autocomplete="off">
                    <input type="hidden" name="fk_huesped_asignado" value="' . $fila['huesped_id'] . '">
                    <input type="hidden" name="fk_habitacion" value="' . $fk_habitacion . '">
                    
                    <div class="row">
                      <div class="form-group  col-6">
                        <label for="entrada_asignada">Entrada</label>
                        <input type="datetime-local" class="form-control " name="entrada_asignada" id="entrada_asignada" required  >
                      </div>

                      <div class="form-group col-6 ">
                        <label for="salida_asignada">Salida</label>
                        <input type="datetime-local" class="form-control " name="salida_asignada" id="salida_asignada" required>
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-block btn-default btn-sm">Asignar habitación</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          
          <script>
            $("#prueba' . $con . '").on("submit", function(e) {
              e.preventDefault();
              var formData = $(this).serialize();
              const paresClaveValor = formData.split("&");
              const inputs = {};
              
              for (const parClaveValor of paresClaveValor) {
                const [clave, valor] = parClaveValor.split("=");
                inputs[clave] = valor;
              }
              

              $.ajax({
                type: "POST",
                url:"' . SERVERURL . 'ajax/gestorHabitacionAjax.php",
                data:inputs,
                success: function(res){
                  location.reload();
                }
              })
            });
          </script>
          ';
      }
    } else {
      $opc .= '
      <form id="formcreatehuesped">
      <input type="hidden" name="fk_habitacion" value="' . $fk_habitacion . '">
        <div class="row">
          <div class="form-group  col-6">
            <label for="nombre_completo_reg">Nombre huésped</label>
            <input type="text" class="form-control" id="nombre_completo_reg" placeholder="jochdev" required value="' . $busqueda . '" name="nombre_completo_reg">
          </div>
    
    
          <div class="form-group  col-6">
            <label for="documento_reg">Documento de identidad</label>
            <input type="text" class="form-control" id="documento_reg" placeholder="V20890738" required name="documento_reg">
          </div>
        </div>
        
        <div class="row">
          <div class="form-group  col-6">
            <label for="entrada_asignada_reg">Entrada</label>
            <input type="datetime-local" class="form-control " name="entrada_asignada_reg" id="entrada_asignada_reg" required>
          </div>
          
          <div class="form-group col-6 ">
            <label for="salida_asignada_reg">Salida</label>
            <input type="datetime-local" class="form-control " name="salida_asignada_reg" id="salida_asignada_reg" required>
          </div>
        </div>
        
        <button type="submit" class="btn btn-block btn-primary btn-sm">Registrar huésped y asignar habitación</button>
      </form>


      <script>
        $("#formcreatehuesped").on("submit", function(e) {
          e.preventDefault();
          var formData = $(this).serialize();
          const paresClaveValor = formData.split("&");
          const inputs = {};
          for (const parClaveValor of paresClaveValor) {
            const [clave, valor] = parClaveValor.split("=");
            inputs[clave] = valor;
          }
          
          $.ajax({
            type: "POST",
            url:"' . SERVERURL . 'ajax/gestorHabitacionAjax.php",
            data:inputs,
            success: function(res){
              location.reload();
            }
          })
        });
      </script>
      
      ';
    }


    return $opc;
  }

  public function asignar_huesped()
  {
    // Recibimos los datos del formulario
    $fk_huesped = mainModel::limpiar_cadena($_POST['fk_huesped_asignado']);
    $fk_habitacion = mainModel::limpiar_cadena($_POST['fk_habitacion']);



    $entrada = $_POST['entrada_asignada'];
    $entrada = str_replace('%3A', ':', $entrada);
    $entrada = new DateTime($entrada);
    $entrada = $entrada->format('Y-m-d H:i');
    $salida = $_POST['salida_asignada'];
    $salida = str_replace('%3A', ':', $salida);
    $salida = new DateTime($salida);
    $salida = $salida->format('Y-m-d H:i');

    $datos = [
      "fk_huesped" => $fk_huesped,
      "fk_habitacion" => $fk_habitacion,
      "entrada" => $entrada,
      "salida" => $salida
    ];

    $asignacion = gestorHabitacionModelo::registro_asignacion($datos);

    if ($asignacion->rowCount() == 1) {
      $alerta = [
        "Alerta" => "recargar",
        "Titulo" => "Habitación asignada",
        "Texto" => "La asignación se ha realizado con exito",
        "Tipo" => "success"
      ];

      // Actualizar el estatus de la habitación

      $datos_update = [
        "habitacion_id" => $fk_habitacion,
        "estatus_habitacion" => "ocupada"
      ];

      $actualizacion = gestorHabitacionModelo::actualizar_habitacion($datos_update);
    } else {
      $alerta = [
        "Alerta" => "simple",
        "Titulo" => "Ocurrió un error inesperado",
        "Texto" => "No hemos podido registrar la asignación",
        "Tipo" => "error"
      ];
    }
    echo json_encode($alerta);
  }



  public function listar_ultimos_huespedes($id)
  {
    $datos = gestorHabitacionModelo::obtener_ultimos_huespedes($id);
    return $datos;
  }

  public function crear_asignar_huesped()
  {
    /** Se recibe los datos del formulario  */
    $nombre_completo_huesped = mainModel::limpiar_cadena($_POST['nombre_completo_reg']);
    $documento_huesped = mainModel::limpiar_cadena($_POST['documento_reg']);
    $fk_habitacion = mainModel::limpiar_cadena($_POST['fk_habitacion']);


    $entrada = $_POST['entrada_asignada_reg'];
    $entrada = str_replace('%3A', ':', $entrada);
    $entrada = new DateTime($entrada);
    $entrada = $entrada->format('Y-m-d H:i');
    $salida = $_POST['salida_asignada_reg'];
    $salida = str_replace('%3A', ':', $salida);
    $salida = new DateTime($salida);
    $salida = $salida->format('Y-m-d H:i');


    /** Registrar al huesped y obtener el nombre */

    $datos_huesped = [
      "nombre_completo" => $nombre_completo_huesped,
      "documento" => $documento_huesped
    ];

    $huesped_id = gestorHabitacionModelo::registro_huesped($datos_huesped);

    /** Registrar asignacion a partir del id */
    if ($huesped_id > 0) {
      $datos_asignacion = [
        "fk_huesped" => $huesped_id,
        "fk_habitacion" => $fk_habitacion,
        "entrada" => $entrada,
        "salida" => $salida
      ];

      $asignacion = gestorHabitacionModelo::registro_asignacion($datos_asignacion);

      if ($asignacion->rowCount() == 1) {
        $alerta = [
          "Alerta" => "recargar",
          "Titulo" => "Habitación asignada",
          "Texto" => "La asignación se ha realizado con exito",
          "Tipo" => "success"
        ];

        // Actualizar el estatus de la habitación

        $datos_update = [
          "habitacion_id" => $fk_habitacion,
          "estatus_habitacion" => "ocupada"
        ];

        $actualizacion = gestorHabitacionModelo::actualizar_habitacion($datos_update);
      } else {
        $alerta = [
          "Alerta" => "simple",
          "Titulo" => "Ocurrió un error inesperado",
          "Texto" => "No hemos podido registrar la asignación",
          "Tipo" => "error"
        ];
      }
      echo json_encode($alerta);
    }
  }
}
