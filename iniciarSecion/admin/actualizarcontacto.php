<?php
//capturar datos del formulario

$codigo=$_POST['txtcodigo'];
$nombre=$_POST['txtNombre'];
$Email=$_POST['txtEmail'];

$telefono=$_POST['txtTel'];
$comen=$_POST['txtcomen'];
//$tipo=$_POST['txtTipo'];
//cargamos la conexion

require('conexion.php');

$sql="UPDATE `contactos` SET `Nombre`='$nombre',`Email`='$Email',`Telefono`='$telefono',`comentario`='$comen' WHERE  id='$codigo'";
//ejecuto la instruccion
$consulta=mysqli_query($misql,$sql);
////$registro=mysqli_fetch_array($consulta);
//llenar el formulario
if($consulta==true){

    echo "<script>
             alert('Contacto modificado con exito');
             window.location='ListaContacto.php'
             </script>";
}
else
{
    echo "<script>
             alert('Contacto No modificado con exito');
             window.location='ListaContacto.php'
             </script>";

}

mysqli_close($misql);


?>