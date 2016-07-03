<?php
date_default_timezone_set("America/Santiago");
include_once('class/Bd.php');
include_once('phpfunc/func.php');


$nombre = (trim($_GET['nombre']));
$apellidop = (trim($_GET['apellidop']));
$apellidom = (trim($_GET['apellidom']));
$cargo = (trim($_GET['cargo']));
$tipo = (trim($_GET['tipo']));
$area = (trim($_GET['area']));
$carrera = (trim($_GET['carrera']));
$anexo = (trim($_GET['anexo']));
$ip = (trim($_GET['ip']));

$bd = new Bd();
$bd->sql = "INSERT INTO ua_usuarios (nombre, apellidop, apellidom, cargo, tipo, id_area, id_carrera, anexo, ip) VALUES ('$nombre', '$apellidop', '$apellidom', '$cargo', '$tipo', '$area', '$carrera', '$anexo', '$ip')";
$bd->ejecutar();

$mensaje = "El usuario ha sido ingresado";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
</body>
</html>