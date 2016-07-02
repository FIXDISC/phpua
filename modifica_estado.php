<<<<<<< HEAD
<?php
include_once('config/Bd.php');
include_once('phpfunc/func.php');

date_default_timezone_set("America/Santiago");

$id = $_GET['id'];
$id_usuario = 0;
$estado = $_GET['estado'];
$qsql = "";

$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);
$fecha = $fecha_act." ".$hora_act;

if ($estado==0){$estado1=1;$nom_estado="PENDIENTE";} //PENDIENTE
if ($estado==1){$estado1=2;$nom_estado="EN CURSO";$qsql=", inicio_accion='$fecha'";} //EN CURSO
if ($estado==2){$estado1=3;$nom_estado="TERMINADA";$qsql=", fin_accion='$fecha'";} //TERMINADA
if ($estado==3){$estado1=4;$nom_estado="CANCELADA";} //CANCELADA
if ($estado==4){$estado1=1;$nom_estado="PENDIENTE";} //PENDIENTE

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_incidentes SET estado='$estado1'".$qsql." where id='$id'";
//echo "UPDATE ua_incidentes SET estado='$estado1' where id='$id'<br>";
$bd->ejecutar();

$bd = new Bd();
$bd->conectar();
$bd->sql = "INSERT INTO ua_log_estados (fecha,id_incidente,id_usuario,accion) values ('$fecha','$id','$id_usuario','ESTADO $nom_estado')";
//echo "INSERT INTO ua_log_estados (fecha,id_incidente,id_usuario,accion) values ('$fecha','$id','$id_usuario','ESTADO $nom_estado')<br>";
$bd->ejecutar();

	if ($num_rows=='1'){
		$respuesta= "DATOS MODIFICADOS";
		$bcol = "#66CC00";
	}else{
		$respuesta = "DATOS NO MODIFICADOS.";
		$bcol = "#BC4D31";
	}

//echo $respuesta;
=======
<?php
include_once('config/Bd.php');
include_once('phpfunc/func.php');

date_default_timezone_set("America/Santiago");

$id = $_GET['id'];
$id_usuario = 0;
$estado = $_GET['estado'];
$qsql = "";

$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);
$fecha = $fecha_act." ".$hora_act;

if ($estado==0){$estado1=1;$nom_estado="PENDIENTE";} //PENDIENTE
if ($estado==1){$estado1=2;$nom_estado="EN CURSO";$qsql=", inicio_accion='$fecha'";} //EN CURSO
if ($estado==2){$estado1=3;$nom_estado="TERMINADA";$qsql=", fin_accion='$fecha'";} //TERMINADA
if ($estado==3){$estado1=4;$nom_estado="CANCELADA";} //CANCELADA
if ($estado==4){$estado1=1;$nom_estado="PENDIENTE";} //PENDIENTE

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_incidentes SET estado='$estado1'".$qsql." where id='$id'";
//echo "UPDATE ua_incidentes SET estado='$estado1' where id='$id'<br>";
$bd->ejecutar();

$bd = new Bd();
$bd->conectar();
$bd->sql = "INSERT INTO ua_log_estados (fecha,id_incidente,id_usuario,accion) values ('$fecha','$id','$id_usuario','ESTADO $nom_estado')";
//echo "INSERT INTO ua_log_estados (fecha,id_incidente,id_usuario,accion) values ('$fecha','$id','$id_usuario','ESTADO $nom_estado')<br>";
$bd->ejecutar();

	if ($num_rows=='1'){
		$respuesta= "DATOS MODIFICADOS";
		$bcol = "#66CC00";
	}else{
		$respuesta = "DATOS NO MODIFICADOS.";
		$bcol = "#BC4D31";
	}

//echo $respuesta;
>>>>>>> origin/master
?>