<?php
date_default_timezone_set("America/Santiago");
include_once('class/Bd.php');
include_once('phpfunc/func.php');

$nombre = c_en(trim($_GET['nombre']));
$nombre_corto = c_en(trim($_GET['nombre_corto']));
$direccion = c_en(trim($_GET['direccion']));
$campus = trim($_GET['campus']);

$bd = new Bd();
$bd->sql = "INSERT INTO ua_dependencias (nombre, nombre_corto, direccion, campus) VALUES ('$nombre','$nombre_corto','$direccion','$campus')";
$bd->ejecutar();

$mensaje = "La dependencia ha sido ingresado";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
</body>
</html>