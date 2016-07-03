<?php
date_default_timezone_set("America/Santiago");
include_once('config/Bd.php');
include_once('phpfunc/func.php');

$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);

$fecha_1 = strtotime('+1 day',strtotime($fecha_act));
$fecha_11 = date("Y-m-d",$fecha_1);
$bd = new Bd();
$bd->conectar();
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha_act' and fecha<'$fecha_11'";
$bd->ejecutar();
$row = $bd->fetch_row();
$tot_hoy = $row['CONT'];
?>
<html>
<link href="css/us.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #333;
}
</style>
<script type="text/javascript" src="js/libreriaAjax.js"></script>
<script type="text/javascript" src="js/valida_form.js"></script>        
<html>
<table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-color:#000">
  <tr class="tit_tabla">
    <td bgcolor="#252324">&nbsp;</td>
    <td bgcolor="#252324">ALERTAS</td>
  </tr>
  <tr>
    <td bgcolor="#454344" style="font-size:10px">1</td>
    <td bgcolor="#B74915" style="font-size:12px; text-align:left">&nbsp;4 SLA NO CUMPLIDO</td>
  </tr>
  <tr>
    <td bgcolor="#454344" style="font-size:10px">2</td>
    <td bgcolor="#D58000" style="font-size:12px; text-align:left">&nbsp;3 AL LIMITE</td>
  </tr>
  <tr>
    <td bgcolor="#454344" style="font-size:10px">3</td>
    <td bgcolor="#454344" style="font-size:12px; text-align:left">2 SIN ENCARGADO</td>
  </tr>
</table>
=======
<?php
date_default_timezone_set("America/Santiago");
include_once('config/Bd.php');
include_once('phpfunc/func.php');

$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);

$fecha_1 = strtotime('+1 day',strtotime($fecha_act));
$fecha_11 = date("Y-m-d",$fecha_1);
$bd = new Bd();
$bd->conectar();
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha_act' and fecha<'$fecha_11'";
$bd->ejecutar();
$row = $bd->fetch_row();
$tot_hoy = $row['CONT'];
?>
<html>
<link href="css/us.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #333;
}
</style>
<script type="text/javascript" src="js/libreriaAjax.js"></script>
<script type="text/javascript" src="js/valida_form.js"></script>        
<html>
<table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-color:#000">
  <tr class="tit_tabla">
    <td bgcolor="#252324">&nbsp;</td>
    <td bgcolor="#252324">ALERTAS</td>
  </tr>
  <tr>
    <td bgcolor="#454344" style="font-size:10px">1</td>
    <td bgcolor="#B74915" style="font-size:12px; text-align:left">&nbsp;4 SLA NO CUMPLIDO</td>
  </tr>
  <tr>
    <td bgcolor="#454344" style="font-size:10px">2</td>
    <td bgcolor="#D58000" style="font-size:12px; text-align:left">&nbsp;3 AL LIMITE</td>
  </tr>
  <tr>
    <td bgcolor="#454344" style="font-size:10px">3</td>
    <td bgcolor="#454344" style="font-size:12px; text-align:left">2 SIN ENCARGADO</td>
  </tr>
</table>
</html>