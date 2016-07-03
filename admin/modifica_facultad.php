<?php
include_once('class/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];
$nombre = trim($_GET['nombre']);
$nombre_corto = trim($_GET['nombre_corto']);

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_facultades SET nombre='$nombre', nombre_corto='$nombre_corto' where id='$id'";
//echo  "UPDATE ua_facultades SET nombre='$nombre', nombre_corto='$nombre_corto' where id='$id'";
$bd->ejecutar();

$respuesta= "DATOS MODIFICADOS";

echo $respuesta;
?>