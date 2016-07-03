<?php
include_once('class/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];
$cid = $_GET['campus'];
$did = $_GET['dependencia'];
$tid = $_GET['tid'];
$nombre = trim($_GET['nombre']);
$nombre_corto = trim($_GET['nombre_corto']);

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_areas SET nombre='$nombre', nombre_corto='$nombre_corto', tipo='$tid', id_campus='$cid', id_dependencia='$did' where id='$id'";
//echo  "UPDATE ua_areas SET nombre='$nombre', nombre_corto='$nombre_corto', id_campus='$cid', id_dependencia='$did' where id='$id'";
$bd->ejecutar();

$respuesta= "DATOS MODIFICADOS";

echo $respuesta;
?>