<?php
include_once('class/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];
$nombre = c_en(trim($_GET['nombre']));
$nombre_corto = c_en(trim($_GET['nombre_corto']));
$direccion = c_en(trim($_GET['direccion']));
$campus = c_en(trim($_GET['campus']));

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_dependencias SET nombre='$nombre', nombre_corto = '$nombre_corto', direccion = '$direccion', campus = '$campus' where id='$id'";
echo  "UPDATE ua_dependencias SET nombre='$nombre', nombre_corto = '$nombre_corto', direccion = '$direccion', campus = '$campus' where id='$id'";
$bd->ejecutar();

$respuesta= "DATOS MODIFICADOS";

echo $respuesta;
?>