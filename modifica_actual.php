<<<<<<< HEAD
<?php
include_once('config/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];
$enc = $_GET['enc'];
$qsql = "";

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_incidentes SET actual=0 where encargado='$enc'";
//echo "UPDATE ua_incidentes SET actual=0 where encargado='$enc'<br>";
$bd->ejecutar();

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_incidentes SET actual=1 where id='$id'";
//echo "UPDATE ua_incidentes SET estado='$estado1' where id='$id'<br>";
$bd->ejecutar();

//echo $respuesta;
=======
<?php
include_once('config/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];
$enc = $_GET['enc'];
$qsql = "";

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_incidentes SET actual=0 where encargado='$enc'";
//echo "UPDATE ua_incidentes SET actual=0 where encargado='$enc'<br>";
$bd->ejecutar();

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_incidentes SET actual=1 where id='$id'";
//echo "UPDATE ua_incidentes SET estado='$estado1' where id='$id'<br>";
$bd->ejecutar();

//echo $respuesta;
>>>>>>> origin/master
?>