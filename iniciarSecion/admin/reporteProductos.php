<?php



require('conexion.php');
$sql="SELECT * FROM `productos` INNER JOIN categorias ON productos.idCategoria = categorias.idCategoria where  productos.estado='A'";
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
	$this->Cell(0,10,'Listado de Clientes',0,1,'C');
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
$pdf->cell(20);
$pdf->cell(8,8,'N',1,0,'C',true);
$pdf->cell(30,8,'Nombres',1,0,'C',true);
$pdf->cell(30,8,'Categorias',1,0,'C',true);
$pdf->cell(40,8,'Descripcion',1,0,'C',true);
$pdf->cell(20,8,'Cantidad',1,0,'C',true);
$pdf->cell(20,8,'Precio',1,0,'C',true);
$pdf->ln(10);
$pdf->setTextcolor(0,0,0);
$pdf->Setfont('Arial','',7);
while($fila2=$consulta->fetch_array())
{
$pdf->cell(20);
  $pdf->cell(8,10,$fila2['idProductos'],0,0,'L');
  $pdf->cell(30,10,$fila2['Nombre'],0,0,'L');
  $pdf->cell(30,10,$fila2['Categorias'],0,0,'L');

  $pdf->cell(40,10,$fila2['Descripcion'],0,0,'L');
  $pdf->cell(20,10,$fila2['Unidades'],0,0,'L');
  $pdf->cell(20,10,$fila2['Precio'],0,0,'L');

	$pdf->ln(10);


}
$pdf->Line(10,245,208,245);
$pdf->Setfont('Arial','B',10);
$pdf->SetTextColor(156,55,95);
$posiciony =(245-$pdf->GetY());
$pdf->ln($posiciony);
$pdf->Cell(100,10,'Total Clientes: '.$consulta->num_rows,0,0,'R');

$pdf->output();
mysqli_free_result($consulta);
mysqli_close($misql);

?>
