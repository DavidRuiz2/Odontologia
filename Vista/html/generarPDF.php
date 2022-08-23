<?php
//Incluimos el fichero de conexion
//require("../Modelo/Conexion.php");

//Incluimos la libreria PDF
require('Vista/fpdf/fpdf.php');

class PDF extends FPDF {
    // Page header
    function Header() {
        // Add logo to page
        //$this->Image('Vista/img/3.png',15,7.5,15);

        // Set font family to Arial bold 
        $this->SetFont('Arial','B',18);

        // Move to the right
        $this->Cell(80);

        // Header
        $this->Cell(95,10,'Comprobante de cita',1,0,'C');

        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer() {

        // Position at 1.5 cm from bottom
        $this->SetY(-15);

        // Arial italic 8
        $this->SetFont('Arial','I',8);

        // Page number
        $this->Cell(0,10,'Pag. ' . 
            $this->PageNo() . '/{nb}',0,0,'C');
    }
}

// Instantiation of FPDF class
$pdf = new PDF('L','mm','A4');

// Define alias for number of pages
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',14);
////////////////////////////////////////////////////////////////////////////////

// Mostrar contenido Tabla
foreach($result as $row) {
    $pdf->Cell($w[10],50,$row['pacidentificacion'],1,0);
    $pdf->Ln();
    $pdf->Cell($w[10],12,$row['pacnombres'],1,0);
    $pdf->Ln();
    $pdf->Cell($w[0],12,$row['pacapellidos'],1,0);
    $pdf->Ln();
    $pdf->Cell($w[0],12,$row['citnumero'],1,0);
    $pdf->Ln();
    $pdf->Cell($w[1],12,$row['citfecha'],1,0);
    $pdf->Ln();
    $pdf->Cell($w[0],12,$row['connumero'],1,0);
    $pdf->Ln();
    $pdf->Cell($w[0],12,$row['mednombres'],1,0);
    $pdf->Ln();
    $pdf->Cell($w[0],12,$row['medapellidos'],1,0);
    $pdf->Ln();
    $pdf->Cell($w[2],12,$row['cithora'],1,0);
    $pdf->Ln();
    $pdf->Cell($w[3],12,$row['citpaciente'],1,0);
    $pdf->Ln();
    $pdf->Cell($w[4],12,$row['citmedico'],1,0);
    $pdf->Ln();
    $pdf->Cell($w[5],12,$row['citconsultorio'],1,0);
    $pdf->Cell($w[6],12,$row['citestado'],1,0);
    $pdf->Ln();
    }

//$pdf -> output();
?>