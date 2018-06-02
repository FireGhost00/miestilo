<?php
require ('conexion.php');
$nombre=$_POST['txtnombre'];
$correo=$_POST['txtcorreo'];
$tel=$_POST['tele'];
$idpro=$_POST['pro'];
$cant=$_POST['txtUnidad'];

$sql="INSERT INTO `cotizacion`(`idCotizacion`, `Nombres`, `Correo`, `Telefono`, `idProducto`, `cantidad`) VALUES (null,'$nombre','$correo','$tel','$idpro','$cant')";
$dato = mysqli_query($misql, $sql);
if (!$dato) {
    echo "<script>
             alert('No se insertaron los datos');
       // window.location='Cotizacion.php'
             </script>";
} else {
//Si solo hay 1 registro $registro=mysqli_fetch_array($consulta);
//Si hay mas de 1 registro debo usar un bucle

//mysqli_free_result($consulta);
    mysqli_close($misql);


    echo "<script>
             alert('Producto guardada correctamente');
       window.location='Cotizacion.php'
             </script>";
}
?>