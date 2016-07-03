<?php
include_once 'class/cDependencias.php';
include_once 'phpfunc/func.php';

date_default_timezone_set("America/Santiago");

$id = $_GET['id'];

$oDependencias = new cDependencias;
$consulta = $oDependencias->eliminar($id);

echo "DEPENDENCIA ELIMINADA";
?>