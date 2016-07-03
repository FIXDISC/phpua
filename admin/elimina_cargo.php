<?php
include_once 'class/cCargos.php';
include_once 'phpfunc/func.php';

date_default_timezone_set("America/Santiago");

$id = $_GET['id'];

$oCargo = new cCargo;
$consulta = $oCargo->eliminar($id);

echo "CARGO ELIMINADO";
?>