<?php
include_once 'class/cCampus.php';
include_once 'phpfunc/func.php';

date_default_timezone_set("America/Santiago");

$id = $_GET['id'];

$oCampus = new cCampus;
$consulta = $oCampus->eliminar($id);

echo "CAMPUS ELIMINADO";
?>