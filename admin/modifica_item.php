<?php
include_once('class/Bd.php');
include_once('phpfunc/func.php');

$id= trim($_GET['id']);
$nombre = trim($_GET['nombre']);
$nombre_corto = trim($_GET['nombre_corto']);
$marca = trim($_GET['marca']);
$modelo = trim($_GET['modelo']);

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_items SET nombre='$nombre', nombre_corto='$nombre_corto', marca='$marca', modelo='$modelo' where id='$id'";
//echo  "UPDATE ua_items SET nombre='$nombre', nombre_corto='$nombre_corto', marca='$marca', modelo='$modelo' where id='$id'";
$bd->ejecutar();

$respuesta= "DATOS MODIFICADOS";

echo $respuesta;
?>