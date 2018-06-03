<?php
session_start();


require('conexion.php');
$carro=$_SESSION['carro'];
$idcompra=$_GET['idc'];
$total=0;
$sql1="select * from compra where id='$idcompra'";
$sql2="select * from detallecompra where idcompra='$idcompra'";
$encabezado=mysqli_query($misql,$sql1);
$fila=mysqli_fetch_array($encabezado);
$detalle=mysqli_query($misql,$sql2);
require('../../fpdf/fpdf.php');
class miPDF extends FPDF
{
	function Header()
	{
	$this->SetFont('Times','B',14);
	$this->Image('img/logo.png',80,5,50,30);
	$this->ln(35);
	$this->SetfontSize(30);
	$this->Cell(0,10,'Reporte de la Compra',0,1,'C');
	}
function Footer()
{
	$this->SetY(-15);
	
	$this->cell(0,10,'Pagina # '.$this->PageNo(),0,0,'C');
}
}
$pdf=new miPDF('P','mm','LETTER');
$pdf->AddPage('P');

$pdf->SetFont('Arial','B',14);
$pdf->ln(20);
$pdf->cell(30);
$pdf->cell(60,10,'Cliente: ',0,0,'L');
$pdf->cell(20,10,$fila['idcliente'],0,0,'L');
$pdf->ln(10);
$pdf->cell(30);
$pdf->cell(20,10,$idcompra,0,0,'L');
$pdf->ln(10);
$pdf->cell(30);
$pdf->cell(60,10,'Fecha Compra: ',0,0,'L');
$pdf->cell(20,10,$fila['fecha'],0,0,'L');
$pdf->ln(10);
$pdf->cell(30);
$pdf->cell(60,10,'Valor Compra: ',0,0,'L');
$pdf->cell(20,10,$fila['valorcompra'],0,0,'L');
$pdf->ln(10);
$pdf->ln(20);
$pdf->SetfontSize(10);
$pdf->cell(30);
$pdf->setTextcolor(255,255,255);
$pdf->SetFillColor(0,102,255);
$pdf->cell(60,10,'Producto',1,0,'C',true);
$pdf->cell(20,10,'Precio',1,0,'C',true);
$pdf->cell(20,10,'Cantidad',1,0,'C',true);
$pdf->cell(30,10,'Total',1,0,'C',true);
$pdf->ln(10);

$pdf->setTextcolor(0,0,0);
$pdf->Setfont('Arial','',12);
 while ($fila2=$detalle->fetch_array())
        {
           $pdf->cell(30);
           $pdf->cell(60,10,$fila2['producto'],0,0,'L');
           $pdf->cell(20,10,$fila2['precio'],0,0,'C');
           $pdf->cell(20,10,$fila2['cantidad'],0,0,'C');   
           $pdf->cell(30,10,$fila2['precio'],0,0,'C'); 
           $subtotal=$fila2['precio']*$fila2['cantidad'];
            $total=$total+$subtotal;
       	   $pdf->ln(10);
       

        }
$pdf->cell(110);
$pdf->cell(20,10,'total: $',0,0,'C');  
$pdf->setTextcolor(40,164,40);
$pdf->cell(30,10,$total,0,0,'C');   
$pdf->Line(10,245,208,245);
$pdf->Setfont('Arial','B',16);
$pdf->SetTextColor(156,55,95);
$posiciony =(245-$pdf->GetY());
$pdf->ln($posiciony);
$pdf->output();
?>