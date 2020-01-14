<?php
require_once "../conexion.php";
$c=$_POST['casa'];
$u=$_POST['usuario'];
$t=$_POST['coment'];
$f=$_POST['fecha'];

$sql="insert into comentarios(idCasa,idUsuarios,comentario,fecha)
      values ('$c','$u','$t','$f')";
 $sentencia=$pdo->prepare($sql);     
 echo $sentencia->execute();
?>