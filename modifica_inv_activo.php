<<<<<<< HEAD
<?php
include_once('admin/class/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];
$activo = trim($_GET['activo']);

if ($activo==""){$activo=0;}

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_inventario SET activo_fijo='$activo' where id='$id'";
//echo  "UPDATE ua_inventario SET activo='$activo' where id='$id'";
$bd->ejecutar();

$respuesta= "DATOS MODIFICADOS";

echo $respuesta;
=======
<?php
include_once('admin/class/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];
$activo = trim($_GET['activo']);

if ($activo==""){$activo=0;}

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_inventario SET activo_fijo='$activo' where id='$id'";
//echo  "UPDATE ua_inventario SET activo='$activo' where id='$id'";
$bd->ejecutar();

$respuesta= "DATOS MODIFICADOS";

echo $respuesta;
>>>>>>> origin/master
?>