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
                              <button type="button" class="btn btn-block btn-default btn-sm">Asignar habitación</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    ';
            }
        } else {
            $opc .= '
            <div class="row">

            <div class="form-group  col-6">
              <label for="identificador_habitacion">Nombre huesped</label>
              <input type="text" class="form-control" id="identificador_habitacion" placeholder="José Gregorio Heredia Bracho" required="" value="' . $busqueda . '" >
            </div>



            <div class="form-group  col-6">
              <label for="identificador_habitacion">Documento de identidad</label>
              <input type="text" class="form-control" id="identificador_habitacion" placeholder="V20890738" required="" value="" >
            </div>


            <div class="form-group  col-6">
              <label for="identificador_habitacion">Entrada</label>
              <input type="datetime-local" class="form-control " name="final_reg" id="final_reg" required>
            </div>

            <div class="form-group col-6 ">
              <label for="identificador_habitacion">Salida</label>
              <input type="datetime-local" class="form-control " name="final_reg" id="final_reg" required>
            </div>

          </div>
                ';
        }


        return $opc;
    }
}
