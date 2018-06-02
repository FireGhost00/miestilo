<?php

session_start();

if(!isset($_SESSION['vsUsuario'])||($_SESSION['vsTipo']!='cliente')){

    header('location:iniciarSecion.html');
}

?>

<?php

$carro=$_SESSION['carro'];

require('conexion.php');



?>
<?php

$idcompra=$_GET['idc'];
$sql1="select * from compra where id='$idcompra'";
$sql2="select * from detallecompra where idcompra='$idcompra'";

$encabezado=mysqli_query($misql,$sql1);
$fila=mysqli_fetch_array($encabezado);
?>
<!DOCTYPE html>
<html lang="es">
<head>

    <meta name="description" content="Pagina de actividades DPWEB, actividades dpweb"/>
    <meta name="keywords" content="dpweb, DPWEB, actividades dpweb"/>
    <meta charset="iso-8859-1"/>
    <meta charset="UTF-8"/>
    <style>
        @media print {
            .noImprimir{ visibility: hidden};
        }
    </style>

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
<div align="center" >
    <a href="#" onclick="window.print();" class="noImprimir" style='font-size: 20px;  text-decoration: none; '>Imprimir</a>
    <br>
    <h1>Orden de Compra</h1>
    <table width="600">
        <tr>
            <td>Cliente:</td>
            <td><?php echo $fila['idcliente'];?></td>
        </tr>
        <tr>
            <td>Numero Compra:</td>
            <td><?php echo $idcompra;?></td>
        </tr>
        <tr>
            <td>Fecha Compra</td>
            <td><?php echo $fila['fecha'];?></td>

        </tr>
        <tr>
            <td>Valor Compra:</td>
            <td><?php echo $fila['valorcompra'];?></td>
        </tr>
    </table>
    <br>
    <table width="600">
        <tr bgcolor="#ef3c3c">
            <td>producto</td>
            <td>Precio</td>
            <td>Cantidad</td>

        </tr>
        <?php
        $total=0;
        $detalle=mysqli_query($misql,$sql2);
        while ($fila2=mysqli_fetch_array($detalle))
        {
            echo '<tr>';
            echo '<td>'.$fila2['producto'].'</td>';
            echo '<td>'.$fila2['precio'].'</td>';
            echo '<td>'.$fila2['cantidad'].'</td>';
            echo '<td>'.$fila2['precio']*$fila2['cantidad'].'</td>';
            echo '</tr>';
            $subtotal=$fila2['precio']*$fila2['cantidad'];
            $total=$total+$subtotal;

        }
        ?>
        <tr>
            <td colspan='3' align="right">Total:</td>
            <td>$<?php echo $total;?></td>
        </tr>
    </table>

</div>
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