<?php
//capturar datos del formulario

$codigo=$_POST['txtcodigo'];
$nombretc=$_POST['txtnombretc'];
$nombreban=$_POST['txtbantc'];
$numerotc=$_POST['txtNumerotc'];
$tipotc=$_POST['txtipo'];
$mesv=$_POST['mesv'];
$aniov=$_POST{'aniov'};
//$tipo=$_POST['txtTipo'];
//cargamos la conexion

require('conexion.php');

$sql="UPDATE `compra` SET `tipotc`='$tipotc',`nombretc`='$nombretc',`bancotc`='$nombreban',`numerotc`='$numerotc',`mestc`='$mesv',`aniotc`='$aniov' WHERE id='$codigo'";
//ejecuto la instruccion
$consulta=mysqli_query($misql,$sql);
////$registro=mysqli_fetch_array($consulta);
//llenar el formulario
if($consulta==true){

    echo "<script>
             alert('compras modificado con exito');
             window.location='ListaCompras.php'
             </script>";
}
else
{
    echo "<script>
             alert('Compras No modificado con exito');
             window.location='ListaCompras.php'
             </script>";

}

mysqli_close($misql);


?>