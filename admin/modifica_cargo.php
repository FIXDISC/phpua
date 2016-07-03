<?php
include_once('class/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];
$nombre = trim($_GET['nombre']);
$nombre_largo = trim($_GET['nombre_largo']);

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_cargos SET nombre='$nombre', nombre_largo='$nombre_largo' where id='$id'";
//echo  "UPDATE ua_cargos SET nombre='$nombre', nombre_largo='$nombre_largo' where id='$id'";
$bd->ejecutar();

$respuesta= "DATOS MODIFICADOS";

echo $respuesta;
?>