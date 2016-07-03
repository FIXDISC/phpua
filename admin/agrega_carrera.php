<?php
date_default_timezone_set("America/Santiago");
include_once('class/Bd.php');
include_once('phpfunc/func.php');

$nombre = (trim($_GET['nombre']));
$nombre_corto = (trim($_GET['nombre_corto']));
$facultad = (trim($_GET['facultad']));

$bd = new Bd();
$bd->sql = "INSERT INTO ua_carreras (nombre, nombre_corto, id_facultad) VALUES ('$nombre','$nombre_corto','$facultad')";
$bd->ejecutar();

$mensaje = "La facultad ha sido ingresado";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
</body>
</html>