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
$sql="select * from compra where  id='$cod'";
//ejecuto la instruccion
$consulta=mysqli_query($misql,$sql);
//convertir el resultado en un arreglo para manipularlo
$registro=mysqli_fetch_array($consulta);
//llenar el formulario


mysqli_free_result($consulta);
mysqli_close($misql);

?>
<?php
 $mes=$registro['mestc'];
         $m1="";
         $m2="";
         $m3="";
         $m4="";
         $m5="";
         $m6="";
         $m7="";
         $m8="";
         $m9="";
         $m10="";
         $m11="";
         $m12="";
 switch ($mes) {
     case '01':
         $m1="Selected";
         break;
     case '02':
     $m2="Selected";
        break;
     case '03':
     $m3="Selected";
            break;
     case '04':
     $m4="Selected";
          break;
     case '05':
     $m5="Selected";
            break;
     case '06':
     $m6="Selected";
         break;
     case '07':
     $m7="Selected";
        break;
     case '08':
     $m8="Selected";
            break;
     case '09':
     $m9="Selected";
          break;
     case '10':
     $m10="Selected";
            break;
    case '11':
     $m11="Selected";
            break;
    case '12':
     $m12="Selected";
            break;
     default:
         $m1="";
         $m2="";
         $m3="";
         $m4="";
         $m5="";
         $m6="";
         $m7="";
         $m8="";
         $m9="";
         $m10="";
         $m11="";
         $m12="";
         break;
 }
?>
<?php
 $getanio=$registro['aniotc'];

                                               

?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta name="description" content="Pagina de actividades DPWEB, actividades dpweb"/>
    <meta name="keywords" content="dpweb, DPWEB, actividades dpweb"/>
    <meta charset="iso-8859-1"/>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <title>Grupo 14 - Tienda Mi Estilo</title>
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
    <form  action="actualizarCompras.php" method="POST">


        <table width="100%" >
            <tr>
                <td>Codigo:</td>
                <td><?php echo $registro['id']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td> <input type="hidden" name="txtcodigo" value="<?php echo $registro['id']; ?>" required></td>
            </tr>
             <tr>
                <td>Nombre según tarjeta:</td>
                <td> <input type="text" name="txtnombretc" value="<?php echo $registro['nombretc']; ?>" required></td>
            </tr>
          
       <tr>
             
           <td>Banco Emisor:</td>
           <td><input type="text" name="txtbantc" value="<?php echo $registro['bancotc'];?>" required></td>
       </tr>
        <tr>
            <td>Numero:</td>
            <td><input type="text" name="txtNumerotc" value="<?php echo $registro['numerotc'];?>" required></td>
        </tr>
            <tr>
                <td> Tipo:</td>
                  <td> <select name="txtipo" required>
                        <option <?php if($registro['tipotc']=='Visa'){echo "selected";} ?>>Visa</option>
                        <option <?php if($registro['tipotc']=='Mastercard'){echo "selected";}?>>Mastercard</option>
                    </select></td>
            </tr>
           
            <tr>
                <td>Fecha de Vencimiento:</td>
                 <td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" width="73%">
                                            <select size="1" name="mesv">
                                                <option <?php echo $m1;?>>01</option>
                                                <option <?php echo $m2;?>>02</option>
                                                <option <?php echo $m3;?>>03</option>
                                                <option <?php echo $m4;?>>04</option>
                                                <option <?php echo $m5;?>>05</option>
                                                <option <?php echo $m6;?>>06</option>
                                                <option <?php echo $m7;?>>07</option>
                                                <option <?php echo $m8;?>>08</option>
                                                <option <?php echo $m9;?>>09</option>
                                                <option <?php echo $m10;?>>10</option>
                                                <option <?php echo $m11;?>>11</option>
                                                <option <?php echo $m12;?>>12</option>
                                            </select>/
                                           <select size="1" name="aniov"
                                                    onblur="VenceTJ(document.frmAutorizar.mesv.value,document.frmAutorizar.aniov.value);">
                                                <option><?php echo date('Y');?></option>
                                                <?php
                                                for ($j=1;$j<=10;$j++)
                                                {
                                                    $anio=date('Y')+$j;
                                                    if($getanio==$anio){
                                                        echo '<option Selected>'.$anio.'</option>';
                                                    }
                                                    else{
                                                    echo '<option>'.$anio.'</option>';
                                                }
                                            }
                                                ?>
                                            </select>
                                        </td>
            </tr>


        <tr>

        </tr>


   </table>
        <input type="submit" name="btnModificar" id= "aceptar" value="Modificar">
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
