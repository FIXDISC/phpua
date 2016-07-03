<?php 
include_once('Bd.php');
$bd = new Bd();
$bd->conectar();
$bd->sql = "SELECT consulta,tipo FROM Graficos WHERE codigo='3'";
$bd->ejecutar();
$datos[] = array();
while($bd->fetch_row())
{
	$SQL = $bd->resultado(1);
	$TIP_GRAF= $bd->resultado(2);
}
$bd->desconectar();
define("CONSULTA", $SQL);
define("TIPO_GRAF",$TIP_GRAF);
?>