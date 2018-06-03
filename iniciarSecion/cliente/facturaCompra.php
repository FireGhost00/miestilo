<?php
require('conexion.php');
require('../../fpdf/fpdf.php');
$pdf=new FPDF('P','mm','LETTER');
$pdf->AddPage('P');
$pdf->Image('img/logo.png',5,5,50,30);
$pdf->SetFont('Arial','B',14);
$pdf->cell(0,60,'Reporte de la Compra',0,1,'C');
$pdf->output();
?>