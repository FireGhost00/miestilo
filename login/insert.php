<?php


$nombre=$_POST['txtnombre'];
$apellido=$_POST['txtapellido'];
$usu=$_POST['txtusu'];
$sexo=$_POST['Sexo'];
$direccion=$_POST['direccion'];

$correo=$_POST['txtcorreo'];
$contra=$_POST['txtcontra'];
$tele=$_POST['tele'];
require("conexion.php");
$consulUsu= "SELECT `usuario` FROM `clientes` WHERE `usuario`='$usu'";
$consulCorreo= "SELECT `email` FROM `clientes` WHERE `email`='$correo'";
$consulCo=mysqli_query($misql,$consulCorreo);
$consulU=mysqli_query($misql,$consulUsu);
if(mysqli_num_rows($consulU)>0){
    echo "<script>
             alert('Usuario ya existe');
             window.location='login.html'
             </script>";
}else {
    if(mysqli_num_rows($consulCo)>0){
        echo "<script>
             alert('Correo ya existe');
             window.location='login.html'
             </script>";
    }else {
        $sql = "INSERT INTO `clientes`(`id`, `nombres`, `Apellidos`, `Sexo`, `direccion`, `telefono`, `email`, `usuario`, `password`, `estado`, `tipo`) VALUES (NULL, '$nombre', '$apellido', '$sexo', '$direccion', '$tele', '$correo', '$usu', '$contra', 'A', 'cliente')";


//ejecuto la instruccion sql
        $dato = mysqli_query($misql, $sql);
        if (!$dato) {
            echo "<script>
             alert('No se insertaron los datos');
             window.location='login.html'
             </script>";
        } else {
//Si solo hay 1 registro $registro=mysqli_fetch_array($consulta);
//Si hay mas de 1 registro debo usar un bucle

//mysqli_free_result($consulta);
            mysqli_close($misql);


            echo "<script>
             alert('Usuario agregado correctamente');
             window.location='login.html'
             </script>";
        }
    }
}
?>