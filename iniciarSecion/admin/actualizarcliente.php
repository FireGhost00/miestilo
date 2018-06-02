<?php
//capturar datos del formulario

$codigo=$_POST['txtcodigo'];
$nombre=$_POST['txtNombre'];
$apellido=$_POST['txtApe'];
$Sexo=$_POST['txtsexo'];
$dire=$_POST['txtDire'];
$telefono=$_POST['txtTel'];
$pass=$_POST{'txtpass'};
//$tipo=$_POST['txtTipo'];
//cargamos la conexion

require('conexion.php');

$sql="UPDATE clientes SET nombres='$nombre',Apellidos='$apellido',Sexo='$Sexo', direccion='$dire',telefono='$telefono', password='$pass' WHERE id='$codigo'";
//ejecuto la instruccion
$consulta=mysqli_query($misql,$sql);
////$registro=mysqli_fetch_array($consulta);
//llenar el formulario
if($consulta==true){

    echo "<script>
             alert('cliente modificado con exito');
             window.location='ListaClientes.php'
             </script>";
}
else
{
    echo "<script>
             alert('cliente No modificado con exito');
             window.location='ListaClientes.php'
             </script>";

}

mysqli_close($misql);


?>