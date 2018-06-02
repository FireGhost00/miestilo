<?php


if(isset($_POST['aceptar'])){
    $archivo=$_FILES['flsImg']['tmp_name'];
    $destino = "img/". $_FILES['flsImg']['name'];
    move_uploaded_file($archivo,"../".$destino);
}

$nombre=$_POST['txtnombre'];
$precio=$_POST['txtPrecio'];
$desc=$_POST['txtDescrip'];
$uni=$_POST['txtUnidad'];

$cat=$_POST['cat'];

require ('conexion.php');

$sql = "INSERT INTO `productos`(`idProductos`, `Nombre`, `idCategoria`, `Descripcion`, `Precio`, `imagen`, `Unidades`, `estado`) VALUES (null,'$nombre','$cat','$desc','$precio','$destino','$uni','A')";

$dato = mysqli_query($misql, $sql);
if (!$dato) {
    echo "<script>
             alert('No se insertaron los datos');
             window.location='AgregarProducto.php'
             </script>";

} else {
//Si solo hay 1 registro $registro=mysqli_fetch_array($consulta);
//Si hay mas de 1 registro debo usar un bucle

//mysqli_free_result($consulta);
    mysqli_close($misql);


    echo "<script>
             alert('Producto guardada correctamente');
            window.location='AgregarProducto.php'
             </script>";
}
?>