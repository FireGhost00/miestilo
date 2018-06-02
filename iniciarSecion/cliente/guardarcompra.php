<?php
session_start();
if(!isset($_SESSION['vsUsuario'])||($_SESSION['vsTipo']!='cliente')){

    header('location:iniciarSecion.html');
}

?>

<?php

$carro=$_SESSION['carro'];
$idusaer=$_SESSION['vsID'];
$valorcompra=$_SESSION['ValorPagar'];
$fecha=date("Y-m-d H:i:s");

$nombre=$_POST['nombre'];
$emisor=$_POST['emisor'];
$numero=$_POST['numero'];
$mesv=$_POST['mesv'];
$aniov=$_POST['aniov'];
$tipo=$_POST['Tipo'];
require('conexion.php');
$sql="INSERT INTO `compra`(`id`, `idcliente`, `fecha`, `valorcompra`, `estado`, `tipotc`, `nombretc`, `bancotc`, `numerotc`, `mestc`, `aniotc`) VALUES (null,'$idusaer','$fecha','$valorcompra','0','$tipo','$nombre','$emisor','$numero','$mesv','$aniov')";
mysqli_query($misql,$sql);
$idcompra=mysqli_insert_id($misql);
echo $idcompra;
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
    <link rel="stylesheet" href="../../cotizacion/css/estilos.css"/>
    <link rel="stylesheet" href="../../cotizacion/css/font-awesome.css"/>

    <script src="../../cotizacion/js/jquery-3.2.1.js"></script>
    <script src="../../cotizacion/js/main.js"></script>

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

            <li class="item-submenu" menu='5'>
                <a href="salir.php"><span class="fa fa-sign-out"></span> Cerrar Sesion</a>
            </li>


        </ul>
    </nav>
</header>
<br>
<br>
<br>
<br>
<?php
if($idcompra>0)
{
    foreach($carro as $k => $v)
    {
        $pro=$v['producto'];
        $pre=$v['precio'];
        $can=$v['cantidad'];
        $sqlitem="INSERT INTO `detallecompra`(`id`, `idcompra`, `producto`, `precio`, `cantidad`) VALUES (null,'$idcompra','$pro','$pre','$can')";
        mysqli_query($misql,$sqlitem);
    }
    $carro=false;
    $_SESSION['carro']=$carro;
    echo '<div align="center"><span class="prod">
	compra procesada con exito....</span>';
    echo '<br><a href="Productos.php" style=\'font-size: 20px; text-decoration: none; \'>Volver al catalogo</a></div>';
    echo "<br> <a href='printcarrito2.php?idc=".$idcompra."' style='font-size: 20px; margin-left:5%; text-decoration: none; '>Imprimir Compra</a></div> ";

}
else
{
    echo 'No se pudo insertar...';
    echo '<br><a href="Productos.php">
	Volver al catalogo </a>';
}
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer>
    <p>Derechos reservados &#169; Grupo 14 DPWEB seccion 02 - Mi estilo</p>
    <br>
    <a href="#"><img src="../../cotizacion/img/002-boton-de-logo-del-twitter.png" alt="Twitter logo" class="social-icon"></a>
    <a href="#"><img src="../../cotizacion/img/005-boton-del-logo-de-facebook.png" alt="Facebook logo" class="social-icon"></a>
</footer>
</body>
</html>
