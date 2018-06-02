<?php
require('conexion.php');
//capturar los parametros

$cod=$_GET['codigo'];


$sql="UPDATE productos SET estado='I' WHERE idProductos='$cod'";

$resultado=mysqli_query($misql,$sql);

if ($resultado==true) {
    echo "<script>
             alert('Producto eliminado con exito');
             window.location='ListaProductos.php'
             </script>";
}
else
{
    echo "<script>
             alert('No se pudo eliminar el Producto');
             window.location='ListaProductos.php'
             </script>";
}