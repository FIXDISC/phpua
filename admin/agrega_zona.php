<?php
date_default_timezone_set("America/Santiago");
include_once('class/Bd.php');
include_once('phpfunc/func.php');

$nombre = (trim($_GET['nombre']));
$nombre_corto = (trim($_GET['nombre_corto']));
$aid = $_GET['aid'];
$bd = new Bd();
$bd->sql = "INSERT INTO ua_zonas (nombre, nombre_corto, id_area) VALUES ('$nombre','$nombre_corto','$aid')";
$bd->ejecutar();

$mensaje = "La zona ha sido ingresado";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
</body>
</html>