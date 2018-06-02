<?php
session_start();
extract($_REQUEST);
require('conexion.php');
if(!isset($cantidad)){$cantidad=1;}
$qry=mysqli_query($misql,"select * from productos where idProductos='".$id."'");
$row=mysqli_fetch_array($qry);
if(isset($_SESSION['carro']))
    $carro=$_SESSION['carro'];
$carro[md5($id)]=array('identificador'=>md5($id),
    'cantidad'=>$cantidad,'producto'=>$row['Nombre'],
    'precio'=>$row['Precio'],'id'=>$id);
$_SESSION['carro']=$carro;
header("Location:Productos.php?".SID);
?>