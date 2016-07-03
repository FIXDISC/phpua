<?php
include_once 'class/cAreas.php';
include_once 'phpfunc/func.php';

date_default_timezone_set("America/Santiago");

$id = $_GET['id'];

$oArea = new cAreas;
$consulta = $oArea->eliminar($id);

echo "AREA ELIMINADA";
?>