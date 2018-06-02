<?php

require ('../conexion.php');

$idCate = $_POST['idCate'];

$queryP="SELECT * FROM `productos` WHERE `idCategoria`='$idCate' ORDER by Nombre ASC ";
$consultap=$misql ->query($queryP);

$html ="<option value='0'>Seleccionar</option>";
While($row = $consultap->fetch_assoc())
{
    $html.= "<option value='".$row['idProductos']."'>".$row['Nombre']."</option>";


}

echo $html;
?>
