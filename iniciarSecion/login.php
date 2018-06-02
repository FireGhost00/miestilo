<?php

session_start();
require ("conexion.php");

if(isset($_POST['usuario'])){
    $user=$_POST['usuario'];
    $pass=$_POST['txtpass'];

    $sql="select * from clientes where usuario='$user' and password='$pass'";


    $consulta=mysqli_query($misql,$sql);
    $numfilas=mysqli_num_rows($consulta);

    if($numfilas>0){
        $login=mysqli_fetch_array($consulta);
        $_SESSION['vsID']=$login['id'];
        $_SESSION['vsUsuario']=$login['usuario'];
        $_SESSION['vsTipo']=$login['tipo'];
        $_SESSION['vsNom']=$login['nombres'];
        $_SESSION['vsApe']=$login['Apellidos'];
        $_SESSION['vsSexo']=$login['Sexo'];
        $_SESSION['vsDire']=$login['direccion'];
        $_SESSION['vsTel']=$login['telefono'];
        $_SESSION['vsEmail']=$login['email'];
        $_SESSION['vsPass']=$login['password'];


        if($login['tipo']=='admin'){
            header('location:admin/menuAdmin.php');

        }else{
            header('location:cliente/menuCliente.php');
        }
    }
    else{




      echo "<script>
             alert('Usuario o contraseña incorrecta');
             window.location='iniciarSecion.html'
             </script>";

        //  header('location:iniciarSecion.html');
    }
}

?>