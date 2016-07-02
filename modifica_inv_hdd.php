<<<<<<< HEAD
<?php
include_once('admin/class/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];
$hdd = trim($_GET['hdd']);

if ($hdd==""){$hdd=0;}

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_inventario SET hdd='$hdd' where id='$id'";
//echo  "UPDATE ua_inventario SET hdd='$hdd' where id='$id'";
$bd->ejecutar();

$respuesta= "DATOS MODIFICADOS";

echo $respuesta;
=======
<?php
include_once('admin/class/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];
$hdd = trim($_GET['hdd']);

if ($hdd==""){$hdd=0;}

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_inventario SET hdd='$hdd' where id='$id'";
//echo  "UPDATE ua_inventario SET hdd='$hdd' where id='$id'";
$bd->ejecutar();

$respuesta= "DATOS MODIFICADOS";

echo $respuesta;
>>>>>>> origin/master
?>