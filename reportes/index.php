<?php
$peticionAjax = true;
require_once "../config/APP.php";


$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
/** Instanciar el controlador empleado */
require_once "../controladores/empleadoControlador.php";
$ins_controlador = new empleadoControlador();
$empleado = $ins_controlador->datos_empleado_controlador("Unico", $id);

if ($empleado->rowCount() == 1) {
    $empleado = $empleado->fetch();

    require "./fpdf.php";
    $fpdf = new FPDF();
    $fpdf->SetMargins(17, 17, 17);
    $fpdf->AddPage("PORTRAIT", "letter");
    $fpdf->SetFont("Arial", "", "12");

    class pdf extends FPDF
    {

        public function header()
        {

            $this->SetFont("Arial", "", "12");
            $this->Write(15, "Operadora Casa Grande C. A");
            $this->Image("img/logoccp2.png", 10, 20, 60, 30, "png");
        }

        public function footer()
        {
        }
    }
    $fpdf = new pdf();
    $fpdf->AddPage("portrait", "letter");
    $fpdf->SetFont("Arial", "B", "14");
    $fpdf->SetY(30);
    $fpdf->Cell(0, 10, "Gran Hotel CCP Suites", 5, 5, "C");



    $fpdf->SetFont("Arial", "", "12");

    $fpdf->Write(70, "A quien pueda interesar.");
    $fpdf->SetY(30);
    $fpdf->SetX(30);


    $fpdf->SetFont("Arial", "", "12");
    $fpdf->Ln(10);
    $fpdf->Ln(10);
    $fpdf->Ln(10);
    $fpdf->Ln(10);
    $fpdf->Ln(10);
    $fpdf->Ln(10);

    //  primer parrafo de la carta
    $texto = "Por medio de la presente, el equipo de Operadora Casa Grande C.A, hace " . mb_convert_encoding('recomendación', 'ISO-8859-1', 'UTF-8') . " al ciudadano " . mb_convert_encoding('"' . $empleado['nombre_completo'] . '"', 'ISO-8859-1', 'UTF-8') . " titular de la cedula de identidad " . mb_convert_encoding('"' . $empleado['documento'] . '"', 'ISO-8859-1', 'UTF-8') . ", perteneciente al gran equipo del Gran Hotel CCP Suites,  quien a lo largo de su " . mb_convert_encoding('estadía', 'ISO-8859-1', 'UTF-8') . " en nuestro equipo, mostro valores dignos de destacar, ocupando el puesto de  " . mb_convert_encoding('"Puesto"', 'ISO-8859-1', 'UTF-8') . " en el departamento de " . mb_convert_encoding('"Departamento"', 'ISO-8859-1', 'UTF-8') . ", mostrando una un comportamiento y actitud intachable, " . mb_convert_encoding('además', 'ISO-8859-1', 'UTF-8') . " de una gran responsabilidad y compromiso con su trabajo y su equipo.";
    $fpdf->MultiCell(0, 10, $texto, 0, 'J');
    $fpdf->Ln(10);


    $texto = "Por tal motivo Yo Maria Milagros Lunar, jefa del departamento de recursos humanos, en la empresa, Operadora Casa Grande, hago constar mediante la presente el gran trabajo realizado por el ciudadano " . mb_convert_encoding('"Nombre del empleado"', 'ISO-8859-1', 'UTF-8') . ", ya que conozco sus virtudes y nos encontramos totalmente seguros de que, tal y como lo hizo con nosotros, " . mb_convert_encoding('hará', 'ISO-8859-1', 'UTF-8') . " un gran trabajo en sus instalaciones.";
    $fpdf->MultiCell(0, 10, $texto, 0, 'J');
    $fpdf->Ln(10);

    // final de la carta
    $fpdf->Cell(0, 10,  'Sin ' . mb_convert_encoding('más', 'ISO-8859-1', 'UTF-8') . ' que agregar.', 0, 0, 'J');
    $fpdf->Ln(20);

    // firma 
    $fpdf->SetX(20); // 150 mm del margen izquierdo
    $fpdf->Cell(0, 10, 'Maria Milagros Lunar', 0, 0, 'C');
    $fpdf->Ln(5);
    $fpdf->SetX(20); //  150 mm del margen izquierdo
    $fpdf->Cell(0, 10, 'Jefa de Recursos Humanos', 0, 0, 'C');
    $fpdf->Ln(5);
    $fpdf->SetX(20); // 150 mm del margen izquierdo
    $fpdf->Cell(0, 10, 'Operadora Casa Grande C.A', 0, 0, 'C');






    $fpdf->Output();
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= COMPANY; ?></title>
        <?php include "../vistas/tema/link.php"; ?>
    </head>

    <body>

        <section class="content">
            <div class="error-page">
                <h2 class="headline text-warning"> Ocurrio un error</h2>

                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> No hemos encontrado al empleado seleccionado</h3>

                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
        <?php include "../vistas/tema/script.php" ?>
    </body>

    </html>
<?php
}
