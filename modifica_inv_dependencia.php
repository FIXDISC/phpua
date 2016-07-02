<<<<<<< HEAD
<?php
include_once('admin/class/Bd.php');
include_once('phpfunc/func.php');

date_default_timezone_set("America/Santiago");
$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);
 $fecha = $fecha_act." ".$hora_act;

$id = $_GET['id'];
$anterior = $_GET['anterior'];
$dependencia = $_GET['dependencia'];

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_inventario SET dependencia='$dependencia' where id='$id'";
//echo  "UPDATE ua_inventario SET dependencia='$dependencia' where id='$id'";
$bd->ejecutar();

		$bd1 = new Bd();
		$bd1->sql = "INSERT INTO ua_log_items (fecha,id_item,id_usuario,accion,anterior,nuevo) values ('$fecha','".$id."','$id_usuario','CAMBIO DEPENDENCIA','$anterior','$dependencia')";
		//echo "INSERT INTO ua_log_items (fecha,id_item,id_usuario,accion) values ('$fecha','".$id."','$id_usuario','CAMBIO DEPENDENCIA')";
		$bd1->ejecutar();
		
$respuesta= "DATOS MODIFICADOS";

echo $respuesta;
=======
<?php
include_once('admin/class/Bd.php');
include_once('phpfunc/func.php');

date_default_timezone_set("America/Santiago");
$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);
 $fecha = $fecha_act." ".$hora_act;

$id = $_GET['id'];
$anterior = $_GET['anterior'];
$dependencia = $_GET['dependencia'];

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_inventario SET dependencia='$dependencia' where id='$id'";
//echo  "UPDATE ua_inventario SET dependencia='$dependencia' where id='$id'";
$bd->ejecutar();

		$bd1 = new Bd();
		$bd1->sql = "INSERT INTO ua_log_items (fecha,id_item,id_usuario,accion,anterior,nuevo) values ('$fecha','".$id."','$id_usuario','CAMBIO DEPENDENCIA','$anterior','$dependencia')";
		//echo "INSERT INTO ua_log_items (fecha,id_item,id_usuario,accion) values ('$fecha','".$id."','$id_usuario','CAMBIO DEPENDENCIA')";
		$bd1->ejecutar();
		
$respuesta= "DATOS MODIFICADOS";

echo $respuesta;
>>>>>>> origin/master
?>