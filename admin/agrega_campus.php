<?php
date_default_timezone_set("America/Santiago");
include_once('class/Bd.php');
include_once('phpfunc/func.php');

$nombre = c_en(trim($_GET['nombre']));
$direccion = c_en(trim($_GET['direccion']));

$bd = new Bd();
$bd->sql = "INSERT INTO ua_campus (nombre, direccion) VALUES ('$nombre', '$direccion')";
$bd->ejecutar();

$mensaje = "El campus ha sido ingresado";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
</body>
</html>