<?php
include_once('class/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];
$nombre = (trim($_GET['nombre']));
$apellidop = (trim($_GET['apellidop']));
$apellidom = (trim($_GET['apellidom']));
$cargo = (trim($_GET['cargo']));
$tipo = (trim($_GET['tipo']));
$area = (trim($_GET['area']));
$carrera = (trim($_GET['carrera']));
$ubicacion = (trim($_GET['ubicacion']));
$anexo = (trim($_GET['anexo']));
$ip = (trim($_GET['ip']));

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_usuarios SET nombre='$nombre', apellidop='$apellidop', apellidom='$apellidom', cargo='$cargo', tipo='$tipo', id_area='$area', id_carrera='$carrera', anexo='$anexo', ip='$ip' where id='$id'";
//echo  "UPDATE ua_usuarios SET nombre='$nombre', apellidop='$apellidop', apellidom='$apellidom', cargo='$cargo', tipo='$tipo', id_area='$ubicacion', anexo='$anexo', ip='$ip' where id='$id'";
$bd->ejecutar();

$respuesta= "DATOS MODIFICADOS";

echo $respuesta;
?>