<?php
include_once 'class/cCarreras.php';
include_once 'phpfunc/func.php';

date_default_timezone_set("America/Santiago");

$id = $_GET['id'];

$oCarrera = new cCarreras;
$consulta = $oCarrera->eliminar($id);

echo "CARRERA ELIMINADA";
?>