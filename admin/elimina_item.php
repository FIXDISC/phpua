<?php
include_once 'class/cItems.php';
include_once 'phpfunc/func.php';

date_default_timezone_set("America/Santiago");

$id = $_GET['id'];

$oItem = new cItems;
$consulta = $oItem->eliminar($id);

echo "ITEM ELIMINADO";
?>