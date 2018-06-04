<?php
require('conexion.php');
$id=$_GET['idc'];
if(!$id=="")
{
$sql="SELECT compra.id, clientes.nombres, compra.fecha, compra.valorcompra, compra.tipotc,compra.nombretc,compra.bancotc,compra.numerotc,compra.mestc,compra.aniotc   FROM `compra` INNER JOIN clientes on compra.idcliente = clientes.id where compra.estado=0 and clientes.nombres LIKE '%$id%'";
//ejecuto la instruccion sql
$consulta=mysqli_query($misql,$sql);
}
require('../../fpdf/fpdf.php');
class miPDF extends FPDF
{
	function Header()
	{
	$this->SetFont('Times','B',14);
	$this->Image('img/logo.png',80,5,50,30);
	$this->ln(35);
	$this->SetfontSize(25);
	$this->Cell(0,10,'Listado Compras',0,1,'C');
	}
function Footer()
{
	$this->SetY(-15);

	$this->cell(0,10,'Pagina # '.$this->PageNo(),0,0,'C');
}
}
$pdf=new miPDF('P','mm','LETTER');
$pdf->AddPage('P');
$pdf->ln(20);

$pdf->SetfontSize(8);
$pdf->setTextcolor(255,255,255);
$pdf->SetFillColor(0,102,255);
if(!$id==""){
$pdf->Cell(10);
$pdf->cell(8,8,'N',1,0,'C',true);
$pdf->cell(30,8,'Fecha',1,0,'C',true);
$pdf->cell(30,8,'Nombre Tarjeta',1,0,'C',true);
$pdf->cell(20,8,'Valor',1,0,'C',true);
$pdf->cell(17,8,'Tipo Pago',1,0,'C',true);
$pdf->cell(20,8,'Banco',1,0,'C',true);
$pdf->cell(20,8,'Numero Tarjeta',1,0,'C',true);
$pdf->cell(10,8,'Mes',1,0,'C',true);
$pdf->cell(10,8,utf8_decode('Año'),1,0,'C',true);

$pdf->ln(10);
$pdf->setTextcolor(0,0,0);
$pdf->Setfont('Arial','',8);
$pdf->SetFillColor(255,255,255);
while($fila2=$consulta->fetch_array())
{
$pdf->Cell(10);
  $pdf->cell(8,10,$fila2['id'],0,0,'L');
  $pdf->cell(30,10,$fila2['fecha'],0,0,'L');
  $pdf->cell(30,10,$fila2['nombretc'],0,0,'L');
  $pdf->cell(20,10,$fila2['valorcompra'],0,0,'L');
  $pdf->cell(17,10,$fila2['tipotc'],0,0,'L');
  $pdf->cell(20,10,$fila2['bancotc'],0,0,'L');
  $pdf->cell(20,10,$fila2['numerotc'],0,0,'L');
  $pdf->cell(10,10,$fila2['mestc'],0,0,'L');
  $pdf->cell(9,10,$fila2['aniotc'],0,0,'L');
	$pdf->ln(5);

}

$pdf->Line(10,245,208,245);
$pdf->Setfont('Arial','B',10);
$pdf->SetTextColor(156,55,95);
$posiciony =(245-$pdf->GetY());
$pdf->ln($posiciony);
$pdf->Cell(100,10,'Total Contactenos: '.$consulta->num_rows,0,0,'R');
}
$pdf->output();
mysqli_free_result($consulta);
mysqli_close($misql);

?>
