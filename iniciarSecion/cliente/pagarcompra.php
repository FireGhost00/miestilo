<?php

session_start();

if(!isset($_SESSION['vsUsuario'])||($_SESSION['vsTipo']!='cliente')){

    header('location:iniciarSecion.html');
}

?>

<?php
session_start();
$carro=$_SESSION['carro'];

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
    <script lang="Javascript" type="text/javascript">
        //Para validar tarjeta de credito
        function ValidarTJ(numero_tarjeta) {
            var cadena = numero_tarjeta.toString();
            var longitud = cadena.length;
            var cifra = null;
            var cifra_cad=null;
            var suma=0;
            if (isEmpty(cadena)){
                alert("El número de la tarjeta no es válido");
                document.forms[0].numero.focus();
                return false;
            }
            for (var i=0; i < longitud; i+=2){
                cifra = parseInt(cadena.charAt(i))*2;
                if (cifra > 9){
                    cifra_cad = cifra.toString();
                    cifra = parseInt(cifra_cad.charAt(0)) + parseInt(cifra_cad.charAt(1));
                }
                suma+=cifra;
            }
            for (var i=1; i < longitud; i+=2){
                suma += parseInt(cadena.charAt(i));
            }
//if ((suma % 10) == 0 || !isEmpty(cadena)){
            if ((suma % 10) == 0){
                return true
            } else {
                alert("El número de la tarjeta no es válido");
                document.forms[0].numero.focus();
                return false;
            }}
        function VenceTJ(mes,anio) {
            var vmes = parseInt(mes);
            var vanio = parseInt(anio);
            var ahora = new Date();
            if ((vmes <= ahora.getMonth()+1) && (vanio<=ahora.getFullYear())){
                alert("El vencimiento de la tarjeta no es válido");
                document.forms[0].mesv.focus();
                return false;
            } else {
//ValidarTJ(document.forms[0].numero.value);
                return true;
            }}
        //-->
    </SCRIPT>
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
<div >
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td width="26%">
            </td>
            <td width="74%">
                <form name="frmAutorizar" action="guardarcompra.php" method="post" onsubmit="return
validenviar(this);" >
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <div align="center">
                                    <table width="242" height="154">
                                        <tr>
                                            <td align="center">
                                                <font color="#0255A4" size="3"><b> Valor a Pagar </font>
                                                <font color="#0255A4" size="4">$<?php echo $_SESSION['ValorPagar'];
                                                    ?></b></font>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <table style="width: 140%">
                                    <tr>
                                        <td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" width="26%" align="right">
                                            <span class="no-style-override-12a"><b>Nombre según tarjeta: </b></span>
                                        </td>
                                        <td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" width="73%">
                                            <input type=text name="nombre" size="40" maxlength="50">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" width="26%" align="right">
                                            <span class="no-style-override-12a"><b>Banco Emisor : </b></span>
                                        </td>
                                        <td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" width="73%">
                                            <input type=text name="emisor" size="40" maxlength="35"></td>
                                    </tr>
                                    <tr>
                                        <td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" width="26%" align="right">
                                            <span class="no-style-override-12a"><b>Numero : </b></span>
                                        </td>
                                        <td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" width="73%">
                                            <input type="text" name="numero" id="numero" size="20" maxlength="16"
                                                   autocomplete="off" onblur="ValidarTJ(document.frmAutorizar.numero.value);"></td>
                                    </tr>
                                    <tr>
                                        <td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" width="26%" align="right">
                                            <span class="no-style-override-12a"><b>Tipo : </b></span>
                                        </td>
                                        <td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" width="73%">
                                            <select size="1" name="Tipo"
                                                    onblur="ValidarTJ(document.frmAutorizar.numero.value);">
                                                <option selected>Visa</option>
                                                <option>Mastercard</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" width="26%" align="right">
                                            <span class="no-style-override-12a"><b>Fecha Vencimiento : </b></span>
                                        </td>
                                        <td bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" width="73%">
                                            <select size="1" name="mesv">
                                                <option>01</option>
                                                <option>02</option>
                                                <option>03</option>
                                                <option>04</option>
                                                <option>05</option>
                                                <option>06</option>
                                                <option>07</option>
                                                <option>08</option>
                                                <option>09</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                            </select>/
                                            <select size="1" name="aniov"
                                                    onblur="VenceTJ(document.frmAutorizar.mesv.value,document.frmAutorizar.aniov.value);">
                                                <option><?php echo date('Y');?></option>
                                                <?php
                                                for ($j=1;$j<=10;$j++)
                                                {
                                                    $anio=date('Y')+$j;
                                                    echo '<option>'.$anio.'</option>';
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan=2 bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF">
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan=2 bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF">
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan=2 bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF">
                                            <p class="basic-paragraph basic-paragraph-override-2">
                                                <span class="no-style-override-12">Valores reflejados no incluyen IVA.</span></p>
                                            <input type="hidden" name="idcliente" value='<?php echo
                                            $_SESSION['tmpUsuario'];?>'>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" align="right">
                                <table>
                                    <tr>
                                        <td align="right">
                                            <input type="submit" name="btnComprar" Value="Ejecutar Compra" />
                                        </td>
                                        <td>
                                            &nbsp;
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </td>
        </tr>
    </table>
    <!-- InstanceEndEditable --></td>
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
<script languaje="JavaScript">
    function validenviar(theform)
    {
        if(ValidarTJ(theform.numero.value)&&VenceTJ(theform.mesv.value,theform.aniov.value))
        {
//theform.submit();
            return(true);
        }
        else {
            theform.numero.focus();
            return(false);
        }}
    //-->
</script>