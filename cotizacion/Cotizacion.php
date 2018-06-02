
<?php
require ('conexion.php');
$sql2="SELECT * FROM `categorias`";
$consulta2=mysqli_query($misql,$sql2);


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

	<script language="JavaScript" src="js/jquery-3.3.1.min.js"></script>
	<script src="js/main.js"></script>
    <script src="js/index.js"></script>

	<!--  *****   TIPOGRAFIAS *****   -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">

    <script language="JavaScript">
        $(document).ready(function () {
            $("#cate").change(function () {



                $("#cate option:selected").each(function () {
                    idCate =$(this).val();
                    $.post("includes/getproductos.php",{ idCate: idCate}, function (data) {
                        $("#pro").html(data);
                    });
                });
            })
        });
    </script>

</head>


<body>
<header>
    <span id="button-menu" class="fa fa-bars"> Menu Principal </span>

    <nav class="navegacion">
        <ul class="menu">


            <!-- TITULAR -->
            <li class="title-menu">Bienvenido</li>
            <!-- TITULAR -->

            <li><a href="../index.html"><span class="fa fa-home icon-menu"></span>Inicio</a></li>

            <li class="item-submenu" menu="1">
                <a href="../login/login.html"><span class="fa fa-user"></span> Registrarse</a>
            </li>

            <li class="item-submenu" menu="2">
                <a href="../iniciarSecion/iniciarSecion.html"><span class="fa fa-sign-in"></span> Iniciar sesion</a>
            </li>

            <li class="item-submenu" menu='3'>
                <a href="../cotizacion/Cotizacion.php"><span class="fa fa-list"></span> Cotizacion</a>
            </li>


            <li class="item-submenu" menu='4'>
                <a href="../comentarios/comentarios.html"><span class="fa fa-envelope-open"></span> Contacto</a>
            </li>
            <li class="item-submenu" menu='3'>
                <a href="../Encuesta/Encuesta.html"><span class="fa fa-list"></span> Encuesta</a>
            </li>
            <li class="item-submenu" menu='4'>
                <a href="../AcercaDe.html"><span class="fa fa-envelope-open"></span>Acerca De</a>
            </li>

        </ul>
    </nav>
</header>
<img src="img/logo.png" alt="logo" width="250" height="150" style="float: right; margin-right: 25px; margin-top: -50px">
	<section id="caja_P">
	    <h2>Cotizacion</h2>
        <form action="enviarCotiza.php" method="POST" enctype="multipart/form-data">
            <table width="100%">
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="txtnombre" id="txtnombre" placeholder="nombre" maxlength="30" required /></td>
                </tr>
                <tr>
                    <td>Correo:</td>
                    <td><input type="mail" name="txtcorreo" id="correo" placeholder="correo" maxlength="58" pattern="^[a-zA-Z0-9.!#$%&?*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required />
                    </td>
                </tr>
                <tr>
                    <td>Telefono:</td>
                    <td><input type="tel" name="tele" id="telefono" placeholder="telefono" maxlength="8" pattern="[0-9]{8}" required />
                    </td>
                </tr>
                <tr>
                    <td>Categoria:</td>
                    <td>
                        <select name="cate" id="cate"  required>
                            <option value="0">Seleccione</option>
                            <?php while($row=$consulta2->fetch_assoc()){?>
                            <option value="<?php echo $row['idCategoria'] ?>"><?php echo $row['Categorias'] ?></option>
                            <?php } ?>
                        </select></td>
                </tr>

                <tr>


                    <td> Productos:</td>
                    <td>

                    <select name="pro" id="pro" required>


                    </select></td>
                </tr>
                <tr>
                    <td>Cantidad: </td>
                    <td>  <input type="text" name="txtUnidad" id="unidad" placeholder="Cantidad"  maxlength="5" pattern="[0-9]*" required /></td>
                </tr>

            </table>
            <input type="submit" name="aceptar" id="aceptar" value="Enviar Cotizacion"/>
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
<script>
    function	Limpiar(){
        document.getElementById("txtnombre").value="";
        document.getElementById("correo").value="";
        document.getElementById("telefono").value="";
        document.getElementById("unidad").value="";
    }
</script>
