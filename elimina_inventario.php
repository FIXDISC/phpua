<<<<<<< HEAD
<?php
include_once('admin/class/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];

$bd = new Bd();
$bd->conectar();
$bd->sql = "DELETE FROM ua_inventario WHERE id='$id'";
//echo  "DELETE FROM ua_inventario WHERE id='$id'";
$bd->ejecutar();

$respuesta= "DATOS ELIMINADOS";

echo $respuesta;
=======
<?php
include_once('admin/class/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];

$bd = new Bd();
$bd->conectar();
$bd->sql = "DELETE FROM ua_inventario WHERE id='$id'";
//echo  "DELETE FROM ua_inventario WHERE id='$id'";
$bd->ejecutar();

$respuesta= "DATOS ELIMINADOS";

echo $respuesta;
>>>>>>> origin/master
?>