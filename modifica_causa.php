<<<<<<< HEAD
<?php
include_once('config/Bd.php');
include_once('phpfunc/func.php');

date_default_timezone_set("America/Santiago");

$id = $_GET['id'];
$id_usuario = 0;
$causa = $_GET['causa'];
$qsql = "";

$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);
$fecha = $fecha_act." ".$hora_act;

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_incidentes SET causa='$causa' where id='$id'";
//echo "UPDATE ua_incidentes SET causa='$causa' where id='$id'<br>";
$bd->ejecutar();
$num_rows = $bd->row_count();
$bd->desconectar();

$bd = new Bd();
$bd->conectar();
$bd->sql = "INSERT INTO ua_log_estados (fecha,id_incidente,id_usuario,accion) values ('$fecha','$id','$id_usuario','INGRESA CAUSA')";
//echo "INSERT INTO ua_log_estados (fecha,id_incidente,id_usuario,accion) values ('$fecha','$id','$id_usuario','INGRESA CAUSA')<br>";
$bd->ejecutar();
$num_rows = $bd->row_count();
$bd->desconectar();

	if ($num_rows=='1'){
		$respuesta= "DATOS MODIFICADOS";
		$bcol = "#66CC00";
	}else{
		$respuesta = "DATOS NO MODIFICADOS.";
		$bcol = "#BC4D31";
	}

echo $respuesta;
=======
<?php
include_once('config/Bd.php');
include_once('phpfunc/func.php');

date_default_timezone_set("America/Santiago");

$id = $_GET['id'];
$id_usuario = 0;
$causa = $_GET['causa'];
$qsql = "";

$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);
$fecha = $fecha_act." ".$hora_act;

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_incidentes SET causa='$causa' where id='$id'";
//echo "UPDATE ua_incidentes SET causa='$causa' where id='$id'<br>";
$bd->ejecutar();
$num_rows = $bd->row_count();
$bd->desconectar();

$bd = new Bd();
$bd->conectar();
$bd->sql = "INSERT INTO ua_log_estados (fecha,id_incidente,id_usuario,accion) values ('$fecha','$id','$id_usuario','INGRESA CAUSA')";
//echo "INSERT INTO ua_log_estados (fecha,id_incidente,id_usuario,accion) values ('$fecha','$id','$id_usuario','INGRESA CAUSA')<br>";
$bd->ejecutar();
$num_rows = $bd->row_count();
$bd->desconectar();

	if ($num_rows=='1'){
		$respuesta= "DATOS MODIFICADOS";
		$bcol = "#66CC00";
	}else{
		$respuesta = "DATOS NO MODIFICADOS.";
		$bcol = "#BC4D31";
	}

echo $respuesta;
>>>>>>> origin/master
?>