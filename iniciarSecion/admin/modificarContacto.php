<?php
session_start();
if(!isset($_SESSION['vsUsuario'])||($_SESSION['vsTipo']!='admin')){

    header('location:iniciarSecion.html');

}

?>
<?php
//capturar el codigo a modificar

$cod=$_GET['codigo'];
//cargar la conexion

require('conexion.php');

//buscar los datos del cliente
$sql="select * from contactos where  id='$cod'";
//ejecuto la instruccion
$consulta=mysqli_query($misql,$sql);
//convertir el resultado en un arreglo para manipularlo
$registro=mysqli_fetch_array($consulta);
//llenar el formulario


mysqli_free_result($consulta);
mysqli_close($misql);

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
<div id="modificar">
<section id="caja_p">
    <form name="frmCliente" action="actualizarcontacto.php" method="POST">
        <table width="50%">
            <tr>
                <td>Codigo:</td>
                <td><?php echo $registro['id']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td> <input type="hidden" name="txtcodigo" value="<?php echo $registro['id']; ?>" required></td>
            </tr>
            <tr>
                <td> Nombre:</td>
                <td> <input type="text" name="txtNombre" value="<?php echo $registro['Nombre']; ?>" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td> <input type="text" name="txtEmail" value="<?php echo $registro['Email']; ?>" required></td>
            </tr>
            <tr>
                <td>Telefono:</td>
                <td><input type="text" name="txtTel" value="<?php echo $registro['Telefono'];?>" required></td>
            </tr>
            <tr>
                <td>comentario:</td>
                <td><input type="text" name="txtcomen" value="<?php echo $registro['comentario'];?>" required></td>
            </tr>



        </table>
        <input type="submit" name="btnModificar" id="aceptar" value="Modificar">
    </form>


</section>
</div>


<footer>
    <p>Derechos reservados &#169; Grupo 14 DPWEB seccion 02 - Mi estilo</p>
    <br>
    <a href="#"><img src="img/002-boton-de-logo-del-twitter.png" alt="Twitter logo" class="social-icon"></a>
    <a href="#"><img src="img/005-boton-del-logo-de-facebook.png" alt="Facebook logo" class="social-icon"></a>
</footer>
</body>
</html>









