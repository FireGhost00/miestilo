<?php
session_start();
if(!isset($_SESSION['vsUsuario'])||($_SESSION['vsTipo']!='admin')){

    header('location:iniciarSecion.html');

}

?>
<?php
require ('conexion.php');
$id=$_POST['txtbuscar'];
if(!$id=="")
{
$sql="SELECT compra.id, clientes.nombres, compra.fecha, compra.valorcompra, compra.tipotc,compra.nombretc,compra.bancotc,compra.numerotc,compra.mestc,compra.aniotc   FROM `compra` INNER JOIN clientes on compra.idcliente = clientes.id where compra.estado=0 and clientes.nombres LIKE '%$id%'";
//ejecuto la instruccion sql
$consulta=mysqli_query($misql,$sql);
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
    <span id="button-menu" class="fa fa-bars"> Menu Admin</span>

    <nav class="navegacion">
        <ul class="menu">


            <!-- TITULAR -->
            <li class="title-menu">Bienvenido</li>
            <!-- TITULAR -->

            <li><a href="menuAdmin.php"><span class="fa fa-home icon-menu"></span>Inicio</a></li>
            <li class="item-submenu" menu="1">
                <a href="#"><span class="fa fa-folder icon-menu"></span>Listados</a>
                <ul class="submenu">
                    <li class="title-menu"><span class="fa fa-folder-open icon-menu"></span>Listados</li>
                    <li class="go-back">Atras</li>

                    <a href="ListaClientes.php"><span class="fa fa-user"></span> Lista de Clientes</a>
                    <a href="ListaProductos.php"><span class="fa fa-list"></span> Lista de Productos</a>
                    <a href="ListaEncuesta.php"><span class="fa fa-list"></span> Lista de Encuesta</a>
                    <a href="ListaContacto.php"><span class="fa fa-envelope-open"></span> Lista de  Contacto</a>
                    <a href="ListaCotizaciones.php"><span class="fa fa-list"></span> Lista de Cotizaciones</a>
                    <a href="ListaCompras.php"><span class="fa fa-list"></span> Lista Compras</a>
                </ul>
            </li>



            <li class="item-submenu" menu='4'>
                <a href="AgregarProducto.php"><span class="fa fa-archive"></span> Agregar Productos</a>
            </li>

            <li class="item-submenu" menu='5'>
                <a href="Salir.php"><span class="fa fa-sign-out"></span> Cerrar Sesion</a>
            </li>


        </ul>
    </nav>
</header>
<br>
<br>
<br>
<br>
 <h2 style="font-size: 50px; text-align: center;">Listado de Compras</h2>
  <div id="modificar">
        <form  method="POST" >
       
              <input type="text" name="txtbuscar" placeholder="Buscar por Clientes" required="">
        
             <input type="submit" name="btnBuscar" id="aceptar" value="Buscar" >    
       
        
        </form>
        </div>
<section id="caja_p">
    <center>
        <?php
            if(!$id==""){
        ?>
        <table  width="90%" style="border: 1px " >
            <tr bgcolor=" #21618c" style="color: white; font-size: larger; ">
                <td>N°</td>
                <td>Nombres</td>
                <td>Fecha</td>
                <td>Valor Compra</td>
                <td>Tipo pago</td>
                <td>Nombre Tarjeta</td>
                <td>Banco</td>
                <td>Numero Tarjeta</td>
                <td>Mes</td>
                <td>Años</td>
                <td>Eliminar</td>
                <td>Modificar</td>
            </tr>
            <tr style="color: white; font-size: larger; " >
                <?php
            
                while($registro=mysqli_fetch_array($consulta))
                {
                    echo "<tr>";
                    echo "<td>".$registro['id']."</td>";
                    echo "<td>".$registro['nombres']."</td>";
                    echo "<td>".$registro['fecha']."</td>";
                    echo "<td>".$registro['valorcompra']."</td>";
                    echo "<td>".$registro['tipotc']."</td>";
                    echo "<td>".$registro['nombretc']."</td>";
                    echo "<td>".$registro['bancotc']."</td>";
                    echo "<td>".$registro['numerotc']."</td>";
                    echo "<td>".$registro['mestc']."</td>";
                    echo "<td>".$registro['aniotc']."</td>";
                    echo "<td>"."<a class='mantenimiento' href='EliminarCompras.php?codigo=".$registro['id']."'> Eliminar</a>"."</td>";
                    echo "<td>"."<a class='mantenimiento' href='modificarCompras.php?codigo=".$registro['id']."'>Modificar</a>"."</td>";
                    echo "</tr>";
                }
                mysqli_free_result($consulta);
            }
                mysqli_close($misql);
                ?>

            </tr>
        </table>
    </center>


</section>
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
    <a href="#"><img src="img/002-boton-de-logo-del-twitter.png" alt="Twitter logo" class="social-icon"></a>
    <a href="#"><img src="img/005-boton-del-logo-de-facebook.png" alt="Facebook logo" class="social-icon"></a>
</footer>
</body>
</html>
