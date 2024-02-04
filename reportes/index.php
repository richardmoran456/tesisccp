<?php

require("fpdf.php");

$fpdf = new FPDF();
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
$texto = "Por medio de la presente, el equipo de Operadora Casa Grande C.A, hace recomendación al ciudadano “Nombre del empleado” titular de la cedula de identidad “Cedula”, perteneciente al gran equipo del Gran Hotel CCP Suites,  quien a lo largo de su estadía en nuestro equipo, mostro valores dignos de destacar, ocupando el puesto de  “Puesto” en el departamento de “Departamento”, mostrando una un comportamiento y actitud intachable, además de una gran responsabilidad y compromiso con su trabajo y su equipo.";
$fpdf->MultiCell(0, 10, $texto, 0, 'J');
$fpdf->Ln(10); 


$texto = "Por tal motivo Yo Maria Milagros Lunar, jefa del departamento de recursos humanos, en la empresa, Operadora Casa Grande, hago constar mediante la presente el gran trabajo realizado por el ciudadano “nombre del empleado”, ya que conozco sus virtudes y nos encontramos totalmente seguros de que, tal y como lo hizo con nosotros, hará un gran trabajo en sus instalaciones.";
$fpdf->MultiCell(0, 10, $texto, 0, 'J');
$fpdf->Ln(10); 

// final de la carta
$fpdf->Cell(0, 10, 'Sin más que agregar.', 0, 0, 'J');
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