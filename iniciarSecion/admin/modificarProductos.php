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
$sql="SELECT * FROM `productos` INNER JOIN categorias ON productos.idCategoria = categorias.idCategoria where productos.idProductos='$cod' and productos.estado='A'";
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
    <form  action="actualizarproducto.php" method="POST" enctype="multipart/form-data">
        <table width="50%">
            <tr>
                <td>Codigo:</td>
                <td><?php echo $registro['idProductos']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td> <input type="hidden" name="txtcodigo" value="<?php echo $registro['idProductos']; ?>" required></td>
            </tr>
            <tr>
                <td> Nombre:</td>
                <td> <input type="text" name="txtNombre" value="<?php echo $registro['Nombre']; ?>" required></td>
            </tr>

            <tr>
                <td> Categoria:</td>
                <td> <select name="txtcat" required>
                        <option <?php if($registro['idCategoria']=='1'){echo "selected";} ?>>Caballeros</option>
                        <option <?php if($registro['idCategoria']=='2'){echo "selected";}?>>Damas</option>
                        <option <?php if($registro['idCategoria']=='3'){echo "selected";}?>>Niños</option>
                    </select></td>
            </tr>
            <tr>
                <td>Descripcion:</td>
                <td><input type="text" name="txtDesc" value="<?php echo $registro['Descripcion'];?>" required></td>
            </tr>
            <tr>
                <td>Cantidad:</td>
                <td><input type="text" name="txtCant" value="<?php echo $registro['Unidades'];?>" required></td>
            </tr>
            <tr>
                <td>Precio:</td>
                <td><input type="text" name="txtPre" value="<?php echo $registro['Precio'];?>" required></td>
            </tr>
            <tr>
                <td>  Imagen:</td>
                <td><input type="file" name="flsImg"  value="<?php echo $registro['imagen'];?>" /></td>
                <td> <input type="hidden" name="txtimagen" value="<?php echo $registro['imagen']; ?>" required></td>
            </tr>

        </table>
        <input type="submit" name="btnModificar" id="aceptar" value="Modificar" >
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



































