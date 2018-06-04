<?php
require('conexion.php');
$sql="SELECT idCotizacion, Nombres, Correo, Telefono, cantidad,Categorias,idProductos, Nombre FROM `cotizacion` INNER JOIN productos on cotizacion.idProducto = productos.idProductos INNER JOIN categorias on productos.idCategoria = categorias.idCategoria where cotizacion.estado='A'";
//ejecuto la instruccion sql
$consulta=mysqli_query($misql,$sql);
require('../../fpdf/fpdf.php');
class miPDF extends FPDF
{
	function Header()
	{
	$this->SetFont('Times','B',14);
	$this->Image('img/logo.png',80,5,50,30);
	$this->ln(35);
	$this->SetfontSize(25);
	$this->Cell(0,10,'Listado Cotizaciones',0,1,'C');
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

$pdf->cell(8,8,'N',1,0,'C',true);
$pdf->cell(30,8,'Nombres',1,0,'C',true);
$pdf->cell(50,8,'Email',1,0,'C',true);
$pdf->cell(20,8,'Telefono',1,0,'C',true);
$pdf->cell(20,8,'Cantidad',1,0,'C',true);
$pdf->cell(20,8,'Categoria',1,0,'C',true);
$pdf->cell(20,8,'ID Productos',1,0,'C',true);
$pdf->cell(30,8,'Productos',1,0,'C',true);

$pdf->ln(10);
$pdf->setTextcolor(0,0,0);
$pdf->Setfont('Arial','',8);
$pdf->SetFillColor(255,255,255);
while($fila2=$consulta->fetch_array())
{

  $pdf->cell(8,10,$fila2['idCotizacion'],0,0,'L');
  $pdf->cell(30,10,$fila2['Nombres'],0,0,'L');
  $pdf->cell(50,10,$fila2['Correo'],0,0,'L');
  $pdf->cell(20,10,$fila2['Telefono'],0,0,'L');
  $pdf->cell(20,10,$fila2['cantidad'],0,0,'L');
  $pdf->cell(20,10,$fila2['Categorias'],0,0,'L');
  $pdf->cell(20,10,$fila2['idProductos'],0,0,'L');
  $pdf->cell(20,10,$fila2['Nombre'],0,0,'L');
	$pdf->ln(5);


}
$pdf->Line(10,245,208,245);
$pdf->Setfont('Arial','B',10);
$pdf->SetTextColor(156,55,95);
$posiciony =(245-$pdf->GetY());
$pdf->ln($posiciony);
$pdf->Cell(100,10,'Total Contactenos: '.$consulta->num_rows,0,0,'R');

$pdf->output();
mysqli_free_result($consulta);
mysqli_close($misql);

?>
