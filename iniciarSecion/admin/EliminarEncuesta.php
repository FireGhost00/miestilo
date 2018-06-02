<?php
require('conexion.php');
//capturar los parametros

$cod=$_GET['codigo'];


$sql="UPDATE encuesta SET estado='I' WHERE id_encuesta='$cod'";

$resultado=mysqli_query($misql,$sql);

if ($resultado==true) {
    echo "<script>
             alert('Encuesta eliminado con exito');
             window.location='ListaEncuesta.php'
             </script>";
}
else
{
    echo "<script>
             alert('No se pudo eliminar la Encuesta');
             window.location='ListaEncuesta.php'
             </script>";
}