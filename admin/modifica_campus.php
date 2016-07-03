<?php
include_once('class/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];
$nombre = trim($_GET['nombre']);
$direccion = trim($_GET['direccion']);

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_campus SET nombre='$nombre', direccion='$direccion' where id='$id'";
//echo  "UPDATE ua_campus SET nombre='$nombre', direccion='$direccion' where id='$id'";
$bd->ejecutar();

$respuesta= "DATOS MODIFICADOS";

echo $respuesta;
?>