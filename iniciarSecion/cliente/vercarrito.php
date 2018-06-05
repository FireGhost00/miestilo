<?php

session_start();

if(!isset($_SESSION['vsUsuario'])||($_SESSION['vsTipo']!='cliente')){

    header('location:iniciarSecion.html');
}
if(isset($_SESSION['carro']))
    $carro=$_SESSION['carro'];else $carro=false;
?>
<?php

require('conexion.php');



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
               <li class="item-submenu" menu="2">
                  <a href="MisCompras.php"><span class="fa fa-list"></span>Mis Compras</a>
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
    <div >

        <h1 align="center">Carrito de Compras</h1>
        <br>
        <?php
        if($carro){
            ?>
            <table width="720" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-left: 25%;">
                <tr bgcolor="#333333" class="tit" style="color: white">
                    <td width="105">Producto</td>
                    <td width="207">Precio</td>
                    <td colspan="2" align="center">Cantidad de Unidades</td>
                    <td width="100" align="center">Borrar</td>
                    <td width="159" align="center">Actualizar</td>
                </tr>
                <?php
                $color=array("#ffffff","#F0F0F0");
                $contador=0;
                $suma=0;
                foreach($carro as $k => $v){
                    $subto=$v['cantidad']*$v['precio'];
                    $suma=$suma+$subto;
                    $contador++;
//Creo una variable de sesion y le asigno el total a pagar
                    $_SESSION['ValorPagar']=$suma;
                    ?>
                    <form name="a<?php echo $v['identificador'] ?>" method="post" action="agregacar.php?<?php
                    echo SID ?>" id="a<?php echo $v['identificador'] ?>">
                        <tr bgcolor="<?php echo $color[$contador%2]; ?>" class='prod'>
                            <td><?php echo $v['producto'] ?></td>
                            <td><?php echo $v['precio'] ?></td>
                            <td width="43" align="center"><?php echo $v['cantidad'] ?></td>
                            <td width="136" align="center">
                                <input name="cantidad" type="text" id="cantidad" value="<?php echo $v['cantidad'] ?>"
                                       size="8">
                                <input name="id" type="hidden" id="id" value="<?php echo $v['id'] ?>"> </td>
                            <td align="center"><a href="borracar.php?<?php echo SID ?>&id=<?php echo $v['id']
                                ?>"><img src="img/trash.png" width="12" height="14" border="0"></a></td>
                            <td align="center">
                                <input name="imageField" type="image" src="img/actualizar.png" width="20" height="20"
                                       border="0"></td>
                        </tr></form>
                    <?php
                }
                ?>
            </table>
            <div align="center"><span class="prod">Total de Articulos: <?php echo count($carro);
                    ?></span>
            </div><br>
            <div align="center"><span class="prod">Total: $<?php echo number_format($suma,2);
                    ?></span>
            </div><br>
            <div align="center"><span class="prod">Continuar la seleccion de productos</span>
                <a href="Productos.php?<?php echo SID;?>">
                    <img src="img/continuar.png" width="13" height="13" border="0"></a>
            </div>
            <br>
            <div align="center">
                <a href="pagarcompra.php?<?php echo SID;?>">
                    <img src="img/comprar.png" border="0"></a>
            </div>
        <?php }else{ ?>
        <p align="center"> <span class="prod">No hay productos seleccionados</span>
            <a href="Productos.php?<?php echo SID;?>">
                <img src="img/continuar.png" width="13" height="13" border="0"></a>
            <?php }?>
        </p>
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
