<?php
include_once 'class/cFacultades.php';
include_once 'phpfunc/func.php';

date_default_timezone_set("America/Santiago");

$id = $_GET['id'];

$oFacultad = new cFacultades;
$consulta = $oFacultad->eliminar($id);

echo "FACULTAD ELIMINADA";
?>