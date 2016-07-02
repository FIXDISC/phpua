<<<<<<< HEAD
<?php
include_once('config/Bd.php');
include_once('phpfunc/func.php');

$id = $_GET['id'];
$encargado = trim($_GET['encargado']);

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_incidentes SET encargado='$encargado' where id='$id'";
//echo "UPDATE MSL_CONTRATOS SET cod_contrato='$contrato', id_empresa='$empresa',fecha='$fecha', inicio='$inicio', fin='$fin', metros='$metros' where id='$id'";
$bd->ejecutar();
//$num_rows = $bd->row_count();
$bd->desconectar();

$bd = new Bd();
$bd->conectar();
$bd->sql = "INSERT INTO ua_log_estados (fecha,id_incidente,accion) values ('$fecha','$id','ASIGNA ENCARGADO')";
//echo "UPDATE MSL_CONTRATOS SET cod_contrato='$contrato', id_empresa='$empresa',fecha='$fecha', inicio='$inicio', fin='$fin', metros='$metros' where id='$id'";
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

$id = $_GET['id'];
$encargado = trim($_GET['encargado']);

$bd = new Bd();
$bd->conectar();
$bd->sql = "UPDATE ua_incidentes SET encargado='$encargado' where id='$id'";
//echo "UPDATE MSL_CONTRATOS SET cod_contrato='$contrato', id_empresa='$empresa',fecha='$fecha', inicio='$inicio', fin='$fin', metros='$metros' where id='$id'";
$bd->ejecutar();
//$num_rows = $bd->row_count();
$bd->desconectar();

$bd = new Bd();
$bd->conectar();
$bd->sql = "INSERT INTO ua_log_estados (fecha,id_incidente,accion) values ('$fecha','$id','ASIGNA ENCARGADO')";
//echo "UPDATE MSL_CONTRATOS SET cod_contrato='$contrato', id_empresa='$empresa',fecha='$fecha', inicio='$inicio', fin='$fin', metros='$metros' where id='$id'";
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