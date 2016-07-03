<?php
date_default_timezone_set("America/Santiago");
include_once('class/Bd.php');
include_once('phpfunc/func.php');
$campus = "";
$bd = new Bd();
$bd->sql = "SELECT * FROM ua_campus";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $campus = $campus.",".c_en($row['nombre']);  
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMIN</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<link href="css/us.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="332" height="112" style="background-image:url(img/header1.jpg); vertical-align:bottom; cursor:pointer" onclick="cargarContenido('login.php','cont');">&nbsp;</td>
    <td style="background-image:url(img/header2.jpg)">&nbsp;</td>
    <td style="background-image:url(img/header3.jpg)" width="328"><p>&nbsp;</p></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="7" height="25" bgcolor="#393532">&nbsp;</td>
    <td width="1" bgcolor="#676362"></td>
    <td id="bot1" width="100" onmouseover="on_over1('bot1','bot1_d','1')" onmouseout="on_out1('bot1','bot1_d','1')" onclick="cargarContenido('admin/listado_campus.php','contenido');on_click1('bot1','bot1_d','1')" style="cursor:pointer">CAMPUS</td>
    <td width="1" bgcolor="#676362"></td>
    <td id="bot2" width="100" onmouseover="on_over1('bot2','bot2_d','2')" onmouseout="on_out1('bot2','bot2_d','2')" onclick="cargarContenido('admin/listado_dependencias.php','contenido');on_click1('bot2','bot2_d','2')" style="cursor:pointer">DEPENDENCIAS</td>
    <td width="1" bgcolor="#676362"></td>
    <td id="bot3" width="100" onmouseover="on_over1('bot3','bot3_d','3')" onmouseout="on_out1('bot3','bot3_d','3')" onclick="cargarContenido('admin/listado_areas.php','contenido');on_click1('bot3','bot3_d','3')" style="cursor:pointer">AREAS</td>
    <td width="1" bgcolor="#676362"></td>
    <td id="bot4" width="100" onmouseover="on_over1('bot4','bot4_d','4')" onmouseout="on_out1('bot4','bot4_d','4')" onclick="cargarContenido('admin/listado_zonas.php','contenido');on_click1('bot4','bot4_d','4')" style="cursor:pointer">ZONAS</td>
    <td width="1" bgcolor="#676362"></td>
    <td id="bot5" width="100" onmouseover="on_over1('bot5','bot5_d','5')" onmouseout="on_out1('bot5','bot5_d','5')" onclick="cargarContenido('admin/listado_items.php','contenido');on_click1('bot5','bot5_d','5')" style="cursor:pointer">ITEMS</td>
    <td width="1" bgcolor="#676362"></td>    
    <td id="bot6" width="100" onmouseover="on_over1('bot6','bot6_d','6')" onmouseout="on_out1('bot6','bot6_d','6')" onclick="cargarContenido('admin/listado_facultades.php','contenido');on_click1('bot6','bot6_d','6')" style="cursor:pointer">FACULTADES</td>
    <td width="1" bgcolor="#676362"></td>
    <td id="bot7" width="100" onmouseover="on_over1('bot7','bot7_d','7')" onmouseout="on_out1('bot7','bot7_d','7')" onclick="cargarContenido('admin/listado_carreras.php','contenido');on_click1('bot7','bot7_d','7')" style="cursor:pointer">CARRERAS</td>
    <td width="1" bgcolor="#676362"></td>  
    <td id="bot8" width="100" onmouseover="on_over1('bot8','bot8_d','8')" onmouseout="on_out1('bot8','bot8_d','8')" onclick="cargarContenido('admin/listado_usuarios.php','contenido');on_click1('bot8','bot8_d','8')" style="cursor:pointer">USUARIOS</td>
    <td width="1" bgcolor="#676362"></td>
    <td id="bot9" width="100" onmouseover="on_over1('bot9','bot9_d','9')" onmouseout="on_out1('bot9','bot9_d','9')" onclick="cargarContenido('admin/listado_cargos.php','contenido');on_click1('bot9','bot9_d','9')" style="cursor:pointer">CARGOS</td>
    <td width="1" bgcolor="#676362"></td>            
    <td bgcolor="#393532">&nbsp;</td>
  </tr>
  <tr>
    <td height="5" bgcolor="#676362"></td>
    <td height="5" bgcolor="#676362"></td>
    <td height="5" bgcolor="#676362" id="bot1_d"></td>
    <td height="5" bgcolor="#676362"></td>
    <td height="5" bgcolor="#676362" id="bot2_d"></td>
    <td height="5" bgcolor="#676362"></td>
    <td height="5" bgcolor="#676362" id="bot3_d"></td>
    <td height="5" bgcolor="#676362"></td>
    <td height="5" bgcolor="#676362" id="bot4_d"></td>
    <td height="5" bgcolor="#676362"></td>
    <td height="5" bgcolor="#676362" id="bot5_d"></td>
    <td height="5" bgcolor="#676362"></td>
    <td height="5" bgcolor="#676362" id="bot6_d"></td>    
    <td height="5" bgcolor="#676362"></td>
    <td height="5" bgcolor="#676362" id="bot7_d"></td>    
    <td height="5" bgcolor="#676362"></td> 
    <td height="5" bgcolor="#676362" id="bot8_d"></td>    
    <td height="5" bgcolor="#676362"></td>  
    <td height="5" bgcolor="#676362" id="bot9_d"></td>    
    <td height="5" bgcolor="#676362"></td>       
    <td height="5" bgcolor="#676362"></td>
  </tr>
</table>
  <table width="100%" border="0" cellpadding="0" cellspacing="00">
    <tr>
      <td width="15">&nbsp;</td>
      <td><div id="contenido"></div></td>
      <td width="15">&nbsp;</td>
    </tr>
  </table>
</body>
</html>