<<<<<<< HEAD
<?php
include_once('config/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];
$dependencia = trim($_GET['dependencia']);

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_incidentes SET id_dependencia='$dependencia' where id='$id'";
//echo "UPDATE ua_incidentes SET id_dependencia='$dependencia' where id='$id'";
$bd->ejecutar();
//$num_rows = $bd->row_count();
$bd->desconectar();

$respuesta= "DATOS MODIFICADOS";

echo $respuesta;
=======
<?php
include_once('config/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];
$dependencia = trim($_GET['dependencia']);

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_incidentes SET id_dependencia='$dependencia' where id='$id'";
//echo "UPDATE ua_incidentes SET id_dependencia='$dependencia' where id='$id'";
$bd->ejecutar();
//$num_rows = $bd->row_count();
$bd->desconectar();

$respuesta= "DATOS MODIFICADOS";

echo $respuesta;
>>>>>>> origin/master
?>