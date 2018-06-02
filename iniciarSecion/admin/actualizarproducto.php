<?php
//capturar datos del formulario

if(isset($_POST['btnModificar'])){
    $archivo=$_FILES['flsImg']['tmp_name'];
    $destino = "img/". $_FILES['flsImg']['name'];
    move_uploaded_file($archivo,$destino);
}

$codigo=$_POST['txtcodigo'];
$nombre=$_POST['txtNombre'];
$img_original=$_POST['txtimagen'];
$cate=$_POST['txtcat'];
$desc=$_POST['txtDesc'];
$cant=$_POST['txtCant'];
$prec=$_POST{'txtPre'};
//$tipo=$_POST['txtTipo'];
//cargamos la conexion
if($destino=="img/")
{
    $destino=$img_original;
}

if($cate=="Caballeros"){
    $cate=1;
}else if($cate=="Damas")
{
    $cate=2;
}else
{
    $cate=3;
}
echo $cate;
require('conexion.php');

$sql="UPDATE `productos` SET `Nombre`='$nombre',idCategoria='$cate',`Descripcion`='$desc',`Precio`='$prec',`imagen`='$destino',`Unidades`='$cant' WHERE idProductos='$codigo'";
//ejecuto la instruccion
$consulta=mysqli_query($misql,$sql);
////$registro=mysqli_fetch_array($consulta);
//llenar el formulario
if($consulta==true){

    echo "<script>
             alert('productos modificado con exito');
            window.location='ListaProductos.php'
             </script>";
}
else
{
    echo "<script>
             alert('Productos No modificado con exito');
         window.location='ListaProductos.php'
             </script>";

}

mysqli_close($misql);


?>