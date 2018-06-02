<?php
require('conexion.php');
//capturar los parametros

$cod=$_GET['codigo'];


$sql="UPDATE cotizacion SET estado='I' WHERE idCotizacion='$cod'";

$resultado=mysqli_query($misql,$sql);

if ($resultado==true) {
    echo "<script>
             alert('Cotizacion eliminado con exito');
             window.location='ListaCotizaciones.php'
             </script>";
}
else
{
    echo "<script>
             alert('No se pudo eliminar la cotizacion');
             window.location='ListaCotizaciones.php'
             </script>";
}