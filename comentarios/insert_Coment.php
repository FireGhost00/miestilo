<?php

$nomnre =$_POST['txtnombre'];
$Email=$_POST['txtEmail'];
$Comen=$_POST['txtComentario'];
$tel=$_POST['tele'];

require ("conexion.php");

$sql = "INSERT INTO `contactos`(`id`, `Nombre`, `Email`, `Telefono`, `comentario`, `Estado`) VALUES (null,'$nomnre','$Email','$tel','$Comen','A')";

//ejecuto la instruccion sql
$dato = mysqli_query($misql, $sql);
if (!$dato) {
    echo "<script>
             alert('No se insertaron los datos');
             window.location='comentarios.html'
             </script>";
} else {
//Si solo hay 1 registro $registro=mysqli_fetch_array($consulta);
//Si hay mas de 1 registro debo usar un bucle

//mysqli_free_result($consulta);
    mysqli_close($misql);


    echo "<script>
             alert('Comentario Enviado correctamente');
             window.location='comentarios.html'
             </script>";
}

?>
