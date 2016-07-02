<<<<<<< HEAD
<?php
include_once('admin/class/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];
$usuario = $_GET['usuario'];

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_inventario SET usuario='$usuario' where id='$id'";
//echo  "UPDATE ua_inventario SET usuario='$usuario' where id='$id'";
$bd->ejecutar();

$respuesta= "DATOS MODIFICADOS";

echo $respuesta;
=======
<?php
include_once('admin/class/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];
$usuario = $_GET['usuario'];

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_inventario SET usuario='$usuario' where id='$id'";
//echo  "UPDATE ua_inventario SET usuario='$usuario' where id='$id'";
$bd->ejecutar();

$respuesta= "DATOS MODIFICADOS";

echo $respuesta;
>>>>>>> origin/master
?>