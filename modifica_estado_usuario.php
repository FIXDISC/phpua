<<<<<<< HEAD
<?php
include_once('config/Bd.php');
include_once('phpfunc/func.php');

date_default_timezone_set("America/Santiago");

$id = $_GET['id'];

$estado = $_GET['estado'];
$qsql = "";

if ($estado==0){$estado1=1;$nom_estado="ACTIVO";} //ACTIVO
if ($estado==1){$estado1=0;$nom_estado="INACTIVO";} //INACTIVO

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_usuarios SET estado='$estado1'".$qsql." where id='$id'";
//echo "UPDATE ua_usuarios SET estado='$estado1'".$qsql." where id='$id'<br>";
$bd->ejecutar();

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

$estado = $_GET['estado'];
$qsql = "";

if ($estado==0){$estado1=1;$nom_estado="ACTIVO";} //ACTIVO
if ($estado==1){$estado1=0;$nom_estado="INACTIVO";} //INACTIVO

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_usuarios SET estado='$estado1'".$qsql." where id='$id'";
//echo "UPDATE ua_usuarios SET estado='$estado1'".$qsql." where id='$id'<br>";
$bd->ejecutar();

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