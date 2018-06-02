<?php
//capturar datos del formulario

$codigo=$_POST['txtcodigo'];
$nombre=$_POST['txtNombre'];
$idprod=$_POST['pro'];
$telefono=$_POST['txtTel'];
$cant=$_POST['txtCant'];
$idpro_Ori=$_POST['idprod'];
//$tipo=$_POST['txtTipo'];
//cargamos la conexion

if($idprod=="0")
{
    $idprod=$idpro_Ori;
}


require('conexion.php');

$sql="UPDATE `cotizacion` SET `Nombres`='$nombre',Telefono='$telefono',`idProducto`='$idprod',`cantidad`='$cant' WHERE idCotizacion= '$codigo'";
//ejecuto la instruccion
$consulta=mysqli_query($misql,$sql);
////$registro=mysqli_fetch_array($consulta);
//llenar el formulario
if($consulta==true){

    echo "<script>
             alert('cotizacion modificado con exito');
            window.location='ListaCotizaciones.php'
             </script>";
}
else
{
    echo "<script>
             alert('cotizacion no modificado con exito');
            window.location='ListaCotizaciones.php'
             </script>";

}

mysqli_close($misql);


?>