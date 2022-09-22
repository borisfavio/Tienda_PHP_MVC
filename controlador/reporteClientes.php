<?php
require('rep/fpdf.php');
include('../modelo/clienteClase.php');
$cli = new Cliente("", "", "", "");
$res = $cli->listarCliente();



class PDF extends FPDF
{
    //cabecera
    function Header()
    {
        $this->SetFont('Arial','B',15);
        $this->Cell(60);
        $this->Cell(70,10, 'Reporte de Clientes',1,0,'C');
        $this->Ln(20);
    }
    function Footer()
    {
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    // Print centered page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->Cell(20,10,'ID',1,0,'C',0);
$pdf->Cell(80,10,'NIT/CI',1,0,'C',0);
$pdf->Cell(80,10,'Razon Social',1,1,'C',0);

while ($row = mysqli_fetch_array($res)) {
    $pdf->Cell(20,10,$row[0],1,0,'C',0);
    $pdf->Cell(80,10,$row[1],1,0,'C',0);
    $pdf->Cell(80,10,$row[2],1,1,'C',0);
}
$pdf->Output();
?>
