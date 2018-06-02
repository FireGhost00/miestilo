<?php
$Pregun_1=$_POST['seleccion'];
$Pregun_2=$_POST['txtpregun2'];
$Pregun_3=$_POST['pregun3'];
$pregun_4=$_POST['pregun4'];
$preg_5=$_POST['pregun5'];

$pregun_7=$_POST['preg7'];
$pregun_8=$_POST['preg8'];
$pregun_9=$_POST['preg9'];
$pregun_10=$_POST['preg10'];
$pregun_11=$_POST['select5'];
$pregun_12=$_POST['preg12'];
$pregun_13=$_POST['preg13'];
$pregun_14=$_POST['select14'];
$pregun_15=$_POST['comentario'];
$value2="";

require("conexion.php");


if(!empty($_POST['checkbox'])){
    if(is_array($_POST['checkbox'])){
        foreach($_POST['checkbox'] as $value)
        {
          $value2=$value2.$value.", ";
        }
    }
}



$sql = "INSERT INTO `encuesta`(`id_encuesta`, `Repuesta_1`, `Repuesta_2`, `Repuesta_3`, `Repuesta_4`, `Repuesta_5`, `Repuesta_6`, `Repuesta_7`, `Repuesta_8`, `Repuesta_9`, `Repuesta_10`, `Repuesta_11`, `Repuesta_12`, `Repuesta_13`, `Repuesta_14`, `Repuesta_15`) VALUES (null ,'$Pregun_1','$Pregun_2','$Pregun_3','$pregun_4','$preg_5','$value2','$pregun_7','$pregun_8','$pregun_9','$pregun_10','$pregun_11','$pregun_12','$pregun_13','$pregun_14','$pregun_15')";
//ejecuto la instruccion sql
$dato = mysqli_query($misql, $sql);
if (!$dato) {
    echo "<script>
             alert('No se insertaron los datos');
        //     window.location='comentarios.html'
             </script>";
} else {
//Si solo hay 1 registro $registro=mysqli_fetch_array($consulta);
//Si hay mas de 1 registro debo usar un bucle

//mysqli_free_result($consulta);
    mysqli_close($misql);


    echo "<script>
             alert('Encuesta guardada correctamente');
             window.location='Encuesta.html'
             </script>";
}
?>