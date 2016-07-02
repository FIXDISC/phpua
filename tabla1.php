<<<<<<< HEAD
<?php
date_default_timezone_set("America/Santiago");
include_once('config/Bd.php');
include_once('phpfunc/func.php');

$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);

$hh = "8";
while($hh<20){
	$fecha = $fecha_act." ".$hh.":00:00";
	$fecha1 = $fecha_act." ".($hh+1).":00:00";
	$bd = new Bd();
	$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'";
	//echo "SELECT count FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'<br>";
	$bd->ejecutar();
	$row = $bd->fetch_row();	
	$h[$hh] = $row['CONT'];
	$h_incidentes_hoy = $h_incidentes_hoy.$row['CONT'];
	if ($hh<19){$h_incidentes_hoy = $h_incidentes_hoy.",";}

	$bd->sql = "SELECT count(*) CONT FROM ua_log_estados where fecha>='$fecha' and fecha<='$fecha1' and accion='ESTADO TERMINADA'";
	//echo "SELECT count FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'<br>";
	$bd->ejecutar();
	$row = $bd->fetch_row();
	$h[$hh] = $row['CONT'];
	$h_terminadas_hoy = $h_terminadas_hoy.$row['CONT'].",";

	$bd->sql = "SELECT count(*) CONT FROM ua_log_estados where fecha>='$fecha' and fecha<='$fecha1' and accion='ESTADO PENDIENTE'";
	//echo "SELECT count(*) CONT FROM ua_log_estados where fecha>='$fecha' and fecha<='$fecha1' and accion='ESTADO PENDIENTE'<br>";
	$bd->ejecutar();
	$row = $bd->fetch_row();
	$h[$hh] = $row['CONT'];
	$h_pendientes_hoy = $h_pendientes_hoy.$row['CONT'].",";
	//echo "$h[$hh]<br>";
	$hh = $hh+1;
}

$fecha_1 = strtotime('+1 day',strtotime($fecha_act));
$fecha_11 = date("Y-m-d",$fecha_1);
$bd = new Bd();
$bd->conectar();
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha_act' and fecha<'$fecha_11'";
$bd->ejecutar();
$row = $bd->fetch_row();
$tot_hoy = $row['CONT'];
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes";
$bd->ejecutar();
$row = $bd->fetch_row();
$tot = $row['CONT'];

$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha_act' and fecha<'$fecha_11' and estado=1";
$bd->ejecutar();
$row = $bd->fetch_row();
$pen_hoy = $row['CONT'];
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where estado=1";
$bd->ejecutar();
$row = $bd->fetch_row();
$pen = $row['CONT'];


$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha_act' and fecha<'$fecha_11' and estado=2";
$bd->ejecutar();
$row = $bd->fetch_row();
$cur_hoy = $row['CONT'];
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where estado=2";
$bd->ejecutar();
$row = $bd->fetch_row();
$cur = $row['CONT'];

$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha_act' and fecha<'$fecha_11' and estado=3";
$bd->ejecutar();
$row = $bd->fetch_row();
$fin_hoy = $row['CONT'];
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where estado=3";
$bd->ejecutar();
$row = $bd->fetch_row();
$fin = $row['CONT'];

?>
<html>
<head>
<link href="css/us.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/libreriaAjax.js"></script>
<script type="text/javascript" src="js/valida_form.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<html>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-color:#000">
  <tr class="tit_tabla">
    <td bgcolor="#252324">&nbsp;</td>
    <td bgcolor="#252324" style="font-size:10px">INCIDENTES</td>
    <td bgcolor="#252324" style="font-size:10px">FINALIZADOS</td>
    <td bgcolor="#252324" style="font-size:10px">PENDIENTES</td>
    <td bgcolor="#252324" style="font-size:10px">EN CURSO</td>
  </tr>
  <tr>
    <td bgcolor="#454344" style="font-size:10px">ACTUAL</td>
    <td bgcolor="#2B586F" style="font-size:18px"><?php echo $tot_hoy; ?></td>
    <td bgcolor="#597014"><?php echo $fin_hoy; ?></td>
    <td bgcolor="#B74915"><?php echo $pen_hoy; ?></td>
    <td bgcolor="#D58000"><?php echo $cur_hoy; ?></td>
  </tr>
  <tr>
    <td bgcolor="#454344" style="font-size:10px">HISTORICO</td>
    <td bgcolor="#122530" style="font-size:18px; cursor:pointer;" onClick="parent.cargarContenido('incidentes_filtro.php?filtro=0','contenido');"><?php echo $tot; ?></td>
    <td bgcolor="#232C07" style="cursor:pointer;" onClick="parent.cargarContenido('incidentes_filtro.php?filtro=3','contenido');"><?php echo $fin; ?></td>
    <td bgcolor="#62270B" style="cursor:pointer;" onClick="parent.cargarContenido('incidentes_filtro.php?filtro=1','contenido');"><?php echo $pen; ?></td>
    <td bgcolor="#714400" style="cursor:pointer;" onClick="parent.cargarContenido('incidentes_filtro.php?filtro=2','contenido');"><?php echo $cur; ?></td>
  </tr>
</table>
</body>
=======
<?php
date_default_timezone_set("America/Santiago");
include_once('config/Bd.php');
include_once('phpfunc/func.php');

$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);

$hh = "8";
while($hh<20){
	$fecha = $fecha_act." ".$hh.":00:00";
	$fecha1 = $fecha_act." ".($hh+1).":00:00";
	$bd = new Bd();
	$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'";
	//echo "SELECT count FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'<br>";
	$bd->ejecutar();
	$row = $bd->fetch_row();	
	$h[$hh] = $row['CONT'];
	$h_incidentes_hoy = $h_incidentes_hoy.$row['CONT'];
	if ($hh<19){$h_incidentes_hoy = $h_incidentes_hoy.",";}

	$bd->sql = "SELECT count(*) CONT FROM ua_log_estados where fecha>='$fecha' and fecha<='$fecha1' and accion='ESTADO TERMINADA'";
	//echo "SELECT count FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'<br>";
	$bd->ejecutar();
	$row = $bd->fetch_row();
	$h[$hh] = $row['CONT'];
	$h_terminadas_hoy = $h_terminadas_hoy.$row['CONT'].",";

	$bd->sql = "SELECT count(*) CONT FROM ua_log_estados where fecha>='$fecha' and fecha<='$fecha1' and accion='ESTADO PENDIENTE'";
	//echo "SELECT count(*) CONT FROM ua_log_estados where fecha>='$fecha' and fecha<='$fecha1' and accion='ESTADO PENDIENTE'<br>";
	$bd->ejecutar();
	$row = $bd->fetch_row();
	$h[$hh] = $row['CONT'];
	$h_pendientes_hoy = $h_pendientes_hoy.$row['CONT'].",";
	//echo "$h[$hh]<br>";
	$hh = $hh+1;
}

$fecha_1 = strtotime('+1 day',strtotime($fecha_act));
$fecha_11 = date("Y-m-d",$fecha_1);
$bd = new Bd();
$bd->conectar();
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha_act' and fecha<'$fecha_11'";
$bd->ejecutar();
$row = $bd->fetch_row();
$tot_hoy = $row['CONT'];
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes";
$bd->ejecutar();
$row = $bd->fetch_row();
$tot = $row['CONT'];

$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha_act' and fecha<'$fecha_11' and estado=1";
$bd->ejecutar();
$row = $bd->fetch_row();
$pen_hoy = $row['CONT'];
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where estado=1";
$bd->ejecutar();
$row = $bd->fetch_row();
$pen = $row['CONT'];


$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha_act' and fecha<'$fecha_11' and estado=2";
$bd->ejecutar();
$row = $bd->fetch_row();
$cur_hoy = $row['CONT'];
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where estado=2";
$bd->ejecutar();
$row = $bd->fetch_row();
$cur = $row['CONT'];

$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha_act' and fecha<'$fecha_11' and estado=3";
$bd->ejecutar();
$row = $bd->fetch_row();
$fin_hoy = $row['CONT'];
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where estado=3";
$bd->ejecutar();
$row = $bd->fetch_row();
$fin = $row['CONT'];

?>
<html>
<head>
<link href="css/us.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/libreriaAjax.js"></script>
<script type="text/javascript" src="js/valida_form.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<html>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-color:#000">
  <tr class="tit_tabla">
    <td bgcolor="#252324">&nbsp;</td>
    <td bgcolor="#252324" style="font-size:10px">INCIDENTES</td>
    <td bgcolor="#252324" style="font-size:10px">FINALIZADOS</td>
    <td bgcolor="#252324" style="font-size:10px">PENDIENTES</td>
    <td bgcolor="#252324" style="font-size:10px">EN CURSO</td>
  </tr>
  <tr>
    <td bgcolor="#454344" style="font-size:10px">ACTUAL</td>
    <td bgcolor="#2B586F" style="font-size:18px"><?php echo $tot_hoy; ?></td>
    <td bgcolor="#597014"><?php echo $fin_hoy; ?></td>
    <td bgcolor="#B74915"><?php echo $pen_hoy; ?></td>
    <td bgcolor="#D58000"><?php echo $cur_hoy; ?></td>
  </tr>
  <tr>
    <td bgcolor="#454344" style="font-size:10px">HISTORICO</td>
    <td bgcolor="#122530" style="font-size:18px; cursor:pointer;" onClick="parent.cargarContenido('incidentes_filtro.php?filtro=0','contenido');"><?php echo $tot; ?></td>
    <td bgcolor="#232C07" style="cursor:pointer;" onClick="parent.cargarContenido('incidentes_filtro.php?filtro=3','contenido');"><?php echo $fin; ?></td>
    <td bgcolor="#62270B" style="cursor:pointer;" onClick="parent.cargarContenido('incidentes_filtro.php?filtro=1','contenido');"><?php echo $pen; ?></td>
    <td bgcolor="#714400" style="cursor:pointer;" onClick="parent.cargarContenido('incidentes_filtro.php?filtro=2','contenido');"><?php echo $cur; ?></td>
  </tr>
</table>
</body>
>>>>>>> origin/master
</html>