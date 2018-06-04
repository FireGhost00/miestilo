<?php
ob_start("ob_gzhandler");
session_start();

if(!isset($_SESSION['vsUsuario'])||($_SESSION['vsTipo']!='cliente')){

    header('location:iniciarSecion.html');
}
if(isset($_SESSION['carro']))
    $carro=$_SESSION['carro'];else $carro=false;
?>
<?php

require('conexion.php');
$sql="SELECT * FROM `productos` WHERE idCategoria = '1'";
$consultaH=mysqli_query($misql,$sql);
$sql2="SELECT * FROM `productos` WHERE idCategoria = '2'";
$consultaM=mysqli_query($misql,$sql2);
$sql3="SELECT * FROM `productos` WHERE idCategoria = '3'";
$consultaN=mysqli_query($misql,$sql3);

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

<section id="seccion">
    <div style="width: 20%; float: right;">
    <a href="vercarrito.php?<?php echo SID ?>" title="Ver el
contenido del carrito"><img src="img/vercarrito.png" width="100px" height="100px" border="0"></a>
    </div>
    <br>
    <br>
    <br>
    <br>
    
	    <article id="caballeros">
            <h2>Caballeros</h2>



           <?php
            while($row=mysqli_fetch_assoc($consultaH)) {
                $id = $row['idProductos'];
                $nom = $row['Nombre'];
                $idcat = $row['idCategoria'];
                $Desc = $row['Descripcion'];
                $pre = $row['Precio'];
                $img = $row['imagen'];
                $Cant = $row['Unidades'];


                ?>

                <div class="caja">
                    <br>
                    <p><?php echo $nom; ?></p>
                    <p><img src="<?php echo "../".$img; ?>" width="100%" height="100%"></p>
                    <p>$<?php echo $pre; ?></p>
                    <p><?php echo $Desc; ?></p>
                    <br>
                    <?php
                    if(!$carro || !isset($carro[md5($row['idProductos'])]['identificador']) ||
                        $carro[md5($row['idProductos'])]['identificador']!=md5($row['idProductos'])){
                        ?>
                        <a href="agregacar.php?<?php echo SID ?>&id=<?php echo $row['idProductos']; ?>">
                          <img src="img/verificado.png" width="50px" height="50px"  class="agregado"> </a><br><?php }else
                    {?><a href="borracar.php?<?php echo SID ?>&id=<?php echo $row['idProductos']; ?>">
                          <img src="img/comprobado.png" width="50px" height="50px"  class="agregado"></a><?php } ?>

                </div>
            <?php } ?>
        </article>



    </section>
<section id="seccion">
        <article id="damas">

            <h2>Damas</h2>
            <?php
            while($row=mysqli_fetch_assoc($consultaM)) {
                $id = $row['idProductos'];
                $nom = $row['Nombre'];
                $idcat = $row['idCategoria'];
                $Desc = $row['Descripcion'];
                $pre = $row['Precio'];
                $img = $row['imagen'];
                $Cant = $row['Unidades'];


                ?>

                <div class="caja">
                    <br>
                    <p><?php echo $nom; ?></p>
                    <p><img src="<?php echo "../".$img; ?>" width="100%" height="100%"></p>
                    <p>$<?php echo $pre; ?></p>
                    <p><?php echo $Desc; ?></p>

                    <?php
                    if(!$carro || !isset($carro[md5($row['idProductos'])]['identificador']) ||
                        $carro[md5($row['idProductos'])]['identificador']!=md5($row['idProductos'])){
                        ?>
                        <a href="agregacar.php?<?php echo SID ?>&id=<?php echo $row['idProductos']; ?>">
                            <img src="img/verificado.png" width="50px" height="50px"  class="agregado"> </a><br><?php }else
                    {?><a href="borracar.php?<?php echo SID ?>&id=<?php echo $row['idProductos']; ?>">
                            <img src="img/comprobado.png" width="50px" height="50px"  class="agregado"></a><?php } ?>

                </div>
            <?php } ?>
        </article>
    </section>
    <section id="seccion">

        <article id="damas">

            <h2>Niños</h2>
            <?php
            while($row=mysqli_fetch_array($consultaN)) {
                $id = $row['idProductos'];
                $nom = $row['Nombre'];
                $idcat = $row['idCategoria'];
                $Desc = $row['Descripcion'];
                $pre = $row['Precio'];
                $img = $row['imagen'];
                $Cant = $row['Unidades'];


                ?>

                <div class="caja">
                    <br>
                    <p><?php echo $nom; ?></p>
                    <p><img src="<?php echo "../".$img; ?>" width="100%" height="100%"></p>
                    <p>$<?php echo $pre; ?></p>
                    <p><?php echo $Desc; ?></p>
                    <br>

                    <?php
                    if(!$carro || !isset($carro[md5($row['idProductos'])]['identificador']) ||
                        $carro[md5($row['idProductos'])]['identificador']!=md5($row['idProductos'])){
                        ?>
                        <a href="agregacar.php?<?php echo SID ?>&id=<?php echo $row['idProductos']; ?>">
                                <img src="img/verificado.png" width="50px" height="50px"  class="agregado"></a><br><?php }else
                    {?><a href="borracar.php?<?php echo SID ?>&id=<?php echo $row['idProductos']; ?>">
                            <img src="img/comprobado.png" width="50px" height="50px"  class="agregado"> </a><?php } ?>

                </div>
            <?php } ?>
        </article>
    </section>
	<footer>
		<p>Derechos reservados &#169; Grupo 14 DPWEB seccion 02 - Mi estilo</p>
        <br>
        <a href="#"><img src="../../cotizacion/img/002-boton-de-logo-del-twitter.png" alt="Twitter logo" class="social-icon"></a>
        <a href="#"><img src="../../cotizacion/img/005-boton-del-logo-de-facebook.png" alt="Facebook logo" class="social-icon"></a>
	</footer>
</body>
</html>
<?php
ob_end_flush();
?>
