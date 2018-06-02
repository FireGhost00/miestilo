<?php
session_start();
if(!isset($_SESSION['vsUsuario'])||($_SESSION['vsTipo']!='cliente')){

    header('location:iniciarSecion.html');

}

$id=$_SESSION['vsID'];
$user=$_SESSION['vsUsuario'];
$nom=$_SESSION['vsNom'];
$ape=$_SESSION['vsApe'];
$sexo=$_SESSION['vsSexo'];
$dire=$_SESSION['vsDire'];
$tel=$_SESSION['vsTel'];
$ema=$_SESSION['vsEmail'];
$pass=$_SESSION['vsPass'];

if($sexo=="M"){
    $su="Selected";
}
else{
    $su="";
}
if($sexo=="F"){
    $sa="Selected";
}
else{
    $sa="";
}



?>





<!DOCTYPE html>
<html lang="es">
<head>

	<meta name="description" content="Pagina de actividades DPWEB, actividades dpweb"/>
	<meta name="keywords" content="dpweb, DPWEB, actividades dpweb"/>
	<meta charset="iso-8859-1"/>

	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
	<title>Grupo * - Tienda Mi Estilo</title>
	<link rel="stylesheet" href="css/estilos.css"/>
	<link rel="stylesheet" href="css/font-awesome.css"/>

	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/main.js"></script>

	<!--  *****   TIPOGRAFIAS *****   -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">

</head>


<body>
<header>
    <span id="button-menu" class="fa fa-bars"> Menu Cliente</span>

    <nav class="navegacion">
         <ul class="menu">


            <!-- TITULAR -->
            <li class="title-menu">Bienvenido</li>
            <!-- TITULAR -->

            <li><a href="menuCliente.php"><span class="fa fa-home icon-menu"></span>Inicio</a></li>

            <li class="item-submenu" menu="1">
                <a href="perfil.php"><span class="fa fa-user"></span> Perfil</a>
            </li>

            <li class="item-submenu" menu="2">
                <a href="Productos.php"><span class="fa fa-list"></span>Productos</a>
            </li>
             <li class="item-submenu" menu="2">
                <a href="MisCompras.php"><span class="fa fa-list"></span>Mis Compras</a>
            </li>
            <li class="item-submenu" menu='5'>
                <a href="salir.php"><span class="fa fa-sign-out"></span> Cerrar Sesion</a>
            </li>


        </ul>
    </nav>
</header> 	<section id="caja_P">

          <img src="img/logo.png" alt="">
          <form action="perfil.php" method="POST">
              <table width="100%">
                  <tr>
                      <td> Nombre:</td>
                      <td width="80%"> <input type="text" name="txtnombre"  placeholder="nombre" maxlength="22"  value="<?php echo $nom; ?>" required disabled /></td>
                  </tr>
                  <tr>
                        <td>  Apellido:</td>
                      <td width="100%"><input type="text" name="txtapellido" id="apellido" placeholder="apellido" maxlength="22" value="<?php echo $ape; ?>" required disabled/></td>
                  </tr>
                  <tr>
                      <td>  Usuario:</td>
                      <td> <input type="text" name="txtusu" id="usuario" placeholder="Usuario" maxlength="12" value="<?php echo $user; ?>" disabled="disabled" required disabled/></td>
                  </tr>
                  <tr>
                      <td>   Genero:</td>
                      <td>
                          <select name="Sexo" required="require" disabled>
                              <option value="M" <?php echo $su;?>>Masculino</option>
                              <option value="F" <?php echo $sa;?>>Femenino</option>
                          </select></td>
                  </tr>
                  <tr>
                      <td>Direccion:</td>
                      <td><input name="direccion" id="direccion" placeholder="direccion" value="<?php echo $dire; ?>" disabled required maxlength="100" /></td>
                  </tr>
                  <tr>
                      <td>Teledono:</td>
                      <td>  <input type="tel" name="tele" id="telefono" placeholder="telefono" value="<?php echo $tel; ?>" disabled maxlength="8"  pattern="[0-9]{8}" required /></td>
                  </tr>
                  <tr>
                      <td>Email:</td>
                      <td>  <input type="text" name="txtcorreo" id="correo" placeholder="correo" value="<?php echo $ema; ?>" disabled maxlength="58" disabled="disabled" pattern="^[a-zA-Z0-9.!#$%&?*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"   required /></td>
                  </tr>
                  <tr>
                      <td>  Password:</td>
                      <td><input type="password" name="txtcontra" id="contra" placeholder="contrase&ntilde;a" value="<?php echo $pass; ?>" disabled maxlength="18" required /></td>
                  </tr>

              </table>

          </form>


	</section>

	

	<footer>
		<p>Derechos reservados &#169; Grupo 14 DPWEB seccion 02 - Mi estilo</p>
        <br>
        <a href="#"><img src="img/002-boton-de-logo-del-twitter.png" alt="Twitter logo" class="social-icon"></a>
        <a href="#"><img src="img/005-boton-del-logo-de-facebook.png" alt="Facebook logo" class="social-icon"></a>
	</footer>
</body>
</html>
<?php
if(isset($_POST['aceptar'])){
    $nombre=$_POST['txtnombre'];
    $apellido=$_POST['txtapellido'];

    $sexo=$_POST['Sexo'];
    $direccion=$_POST['direccion'];


    $contra=$_POST['txtcontra'];
    $tele=$_POST['tele'];
    require("conexion.php");





            $sql = "UPDATE `clientes` SET `id`='$id',`nombres`='$nombre',`Apellidos`='$apellido',`Sexo`='$sexo',`direccion`='$direccion',`telefono`='$tele',`email`='$ema',`usuario`='$user',`password`='$contra',`estado`='A',`tipo`='cliente' WHERE id='$id'";


//ejecuto la instruccion sql
            $dato = mysqli_query($misql, $sql);
            if (!$dato) {
                echo "<script>
             alert('No se Actualizaron los datos');
             window.location='perfil.php'
             </script>";
            } else {
//Si solo hay 1 registro $registro=mysqli_fetch_array($consulta);
//Si hay mas de 1 registro debo usar un bucle

//mysqli_free_result($consulta);
                mysqli_close($misql);


                echo "<script>
             alert('Usuario Actualizado correctamente');
             window.location='perfil.php'
             </script>";
            }


}
?>

