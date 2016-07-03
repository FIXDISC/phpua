<?php
include_once 'class/cUsuarios.php';
include_once 'phpfunc/func.php';

date_default_timezone_set("America/Santiago");

$id = $_GET['id'];

$oUsuario = new cUsuario;
$consulta = $oUsuario->eliminar($id);

echo "USUARIO ELIMINADO";
?>