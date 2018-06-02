<?php
require ('cone.php');
function getListas(){
$misql = getConn();
$id=$_POST['cat'];
    $sql2="SELECT * FROM `productos` WHERE `idCategoria`=$id";

    $consulta = $misql->query($sql2);
    $listas = '<option value="0">Selecione </option>';
    while($row =$consulta->fetch_array(MYSQLI_ASSOCQLI)){
        $listas .= "<option value='$row[idProductos]'>'$row[Nombre]'</option>";
    }
    return $listas;
}
   echo getListas();


