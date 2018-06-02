<?php
require('conexion.php');
//capturar los parametros

$cod=$_GET['codigo'];


$sql="UPDATE contactos SET Estado='I' WHERE id='$cod'";

$resultado=mysqli_query($misql,$sql);

if ($resultado==true) {
    echo "<script>
             alert('Contacto eliminado con exito');
             window.location='ListaContacto.php'
             </script>";
}
else
{
    echo "<script>
             alert('No se pudo eliminar el Contacto');
             window.location='ListaContacto.php'
             </script>";
}