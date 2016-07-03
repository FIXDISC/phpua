<?php
include_once 'class/cZonas.php';
include_once 'phpfunc/func.php';

date_default_timezone_set("America/Santiago");

$id = $_GET['id'];

$oZona = new cZonas;
$consulta = $oZona->eliminar($id);

echo "ZONA ELIMINADA";
?>