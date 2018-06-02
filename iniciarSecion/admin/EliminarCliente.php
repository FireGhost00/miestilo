<?php
require('conexion.php');
//capturar los parametros

$cod=$_GET['codigo'];


$sql="UPDATE clientes SET estado='I' WHERE id='$cod'";

$resultado=mysqli_query($misql,$sql);

if ($resultado==true) {
    echo "<script>
             alert('Cliente eliminado con exito');
             window.location='ListaClientes.php'
             </script>";
}
else
{
    echo "<script>
             alert('No se pudo eliminar el cliente');
             window.location='ListaClientes.php'
             </script>";
}