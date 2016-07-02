<<<<<<< HEAD
<?php
date_default_timezone_set("America/Santiago");
include_once('config/Bd.php');
include_once('phpfunc/func.php');

$val = $_GET['val'];
$_SESSION['AUT'] = $val;

$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: UAUTONOMA ::</title>
<link href="css/us.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="js1/jquery.ui/1.10.3/themes/smoothness/jquery-ui.css" />    
</head>
<body onload="MM_preloadImages('img/bot_admin.png','img/bot_incidentes.png','img/bot_anexos.png','img/bot_redes.png')">
<div id='contenedor'>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="332" height="126" style="background-image:url(img/header1.jpg); vertical-align:bottom">
        <div style="border:0; width:332px; visibility:visible; position:absolute; float:left; margin-top:18px; z-index:100; -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=90);filter: alpha(opacity=90);-moz-opacity: 0.9;-khtml-opacity:0.9;opacity:0.9;" onmouseout="oculta_menu()">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="109"><img id='menu_logo' src="img/ico_incidentes.png" alt="" width="109" height="45" /></td>
            <td style="font-size: 18px; color: #CCC;"><strong><div id="menu_texto">INCIDENTES</div></strong></td>
          </tr>
        </table>
        </div>
        <div id='menu' style="border:0; width:198px; visibility:hidden; position:absolute; float:left; margin-top:18px; z-index:100; -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=90);filter: alpha(opacity=90);-moz-opacity: 0.9;-khtml-opacity:0.9;opacity:0.9;" onmouseout="oculta_menu()">
          <table width="100" border="0" cellspacing="0" cellpadding="0" style="border-color:#000" onmouseover="muestra_menu()">
              <tr>
                <td>
                  <table width="100" border="0" cellspacing="0" cellpadding="0" style=" border-style:none; border-color:#333">
                    <tr>
                      <td><img src="img/bot_admin0.png" alt="" name="bot_admin" width="332" height="30" id="bot_admin" style="cursor:pointer; border:none" onclick="oculta_menu(); cargarContenido('admin/index.php','cont');" onmouseover="MM_swapImage('bot_admin','','img/bot_admin.png',1)" onmouseout="MM_swapImgRestore()"/></td>
                    </tr>
                    <tr>
                      <td><img src="img/bot_invent0.png" alt="" name="bot_inv" width="332" height="30" id="bot_inv" style="cursor:pointer; border:none" onclick="oculta_menu(); cargarContenido('tit_inventario.html','cont_up'); cargarContenido('blanc.html','contenido'); cambia_menu('INVENTARIO')" onmouseover="MM_swapImage('bot_inv','','img/bot_invent.png',1)" onmouseout="MM_swapImgRestore()"/></td>
                    </tr>                    
                    <tr>
                      <td><img src="img/bot_incidentes0.png" alt="" name="bot_inc" width="332" height="30" id="bot_inc" style="cursor:pointer; border:none" onclick="oculta_menu(); cargarContenido('tit_incidentes.html','cont_up'); cargarContenido('blanc.html','contenido'); cambia_menu('INCIDENTES')" onmouseover="MM_swapImage('bot_inc','','img/bot_incidentes.png',1)" onmouseout="MM_swapImgRestore()"/></td>
                      </tr>
                    <?php if ($tu==0){?>
                    <tr>
                      <td><img src="img/bot_anexos0.png" alt="" name="bot_ane" width="332" height="30" id="bot_ane" style="cursor:pointer; border:none" onclick="oculta_menu(); cargarContenido('tit_anexos.html','cont_up'); cargarContenido('blanc.html','contenido'); cambia_menu('ANEXOS')" onmouseover="MM_swapImage('bot_ane','','img/bot_anexos.png',1)" onmouseout="MM_swapImgRestore()"/></td>
                    </tr>
                    <tr>
                      <td><img src="img/bot_redes0.png" alt="" name="bot_red" width="332" height="30" id="bot_red" style="cursor:pointer; border:none" onclick="oculta_menu();  cargarContenido('tit_redes.html','cont_up'); cargarContenido('blanc.html','contenido'); cambia_menu('REDES')" onmouseover="MM_swapImage('bot_red','','img/bot_redes.png',1)" onmouseout="MM_swapImgRestore()"/><br /></td>
                    </tr>
                    <tr>
                      <td><img src="img/bot_manual0.jpg" alt="" name="bot_man" width="332" height="30" id="bot_man" style="cursor:pointer; border:none" onclick="oculta_menu();  cargarContenido('tit_manuales.html','cont_up'); cargarContenido('blanc.html','contenido'); cambia_menu('MANUALES')" onmouseover="MM_swapImage('bot_man','','img/bot_manual.jpg',1)" onmouseout="MM_swapImgRestore()"/><br /></td>
                    </tr>                    
                    <?php } ?>                    
                    <tr>
                      <td height="20" bgcolor="#232323" style="cursor:pointer; text-align:center" onmousedown="oculta_menu()"><img src="img/arrow_up.jpg" width="16" height="10" /></td>
                    </tr>
                    </table></td>
                </tr>
              </table>
          </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><strong>
              <div id="nom_menu" style="color:#D18756">&nbsp;&nbsp;INCIDENTES</div>
            </strong></td>
            <td width="224" onclick="muestra_menu()" style="cursor:pointer">&nbsp;</td>
          </tr>
        </table>
        </td>
        <td style="background-image:url(img/header2.jpg)">&nbsp;</td>
        <td width="328"><img src="img/header3.jpg" alt="" width="328" height="126" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="20" bgcolor="#252324"></td>
        <td colspan="3" bgcolor="#393532"></td>
      </tr>
      <tr>
        <td height="10" bgcolor="#252324">&nbsp;</td>
        <td width="300" bgcolor="#393532" style="text-align: left; font-size: 12px; color: #CCCCCC;">&nbsp;</td>
        <td bgcolor="#393532" style="text-align:left; font-size:18px;">&nbsp;</td>
        <td bgcolor="#393532" style="text-align:left; font-size:18px;">&nbsp;</td>
      </tr>
      <tr>
        <td height="10" colspan="4" bgcolor="#252324"></td>
      </tr>
      <tr>
        <td width="109" bgcolor="#252324">&nbsp;</td>
        <td colspan="3" bgcolor="#393532">&nbsp;</td>
      </tr>
    </table>   
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="40" bgcolor="#252324">&nbsp;</td>
          <td bgcolor="#393532">
          <div id='cont_up'>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="291" height="94" onmouseover="activa_map();" onmouseout="apaga_map();" >
                  <div id="map" style="float:left; position:absolute; width:50px; height:40px; margin-left:252px; margin-top:53px; -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=60);filter: alpha(opacity=60);-moz-opacity: 0.6;-khtml-opacity:0.6;opacity:0.6; cursor:pointer"><img src="img/mapa1.png" width="21" height="35" onclick="window.open('PV_resp.php','VISTA','directories=0,titlebar=0,toolbar=0,location=0,status=0,menubar=0,scrollbars=0,resizable=0,width=810,height=600')"/></div><img src="img/campus_prov.jpg" alt="" width="291" height="94" onclick="cargarContenido('incidentes.php?val=1','contenido');" style="cursor:pointer" /></td>
                <td width="20">&nbsp;</td>
                <td width="200"><iframe id="grafico" style="height:94px; width: 300px; color:#FFFFFF; border:none" frameborder="0" src="grafico.php"></iframe></td>
                <td width="20">&nbsp;</td>
                <td bgcolor="#393532" style="vertical-align:top">
                <iframe id='tabla' src="tabla.php" style="height:94px; width: 100%; color:#FFFFFF; border:none" frameborder="0"></iframe></td>
                <td width="20" style="vertical-align:top">&nbsp;</td>
                <td style="vertical-align:top"><iframe id='alertas' src="alertas.php" style="height:94px; width: 150px; color:#FFFFFF; border:none" frameborder="0"></iframe></td>
                <td width="42">&nbsp;</td>
              </tr>
          </table>
          </div>
          </td>
        </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="11" bgcolor="#393532"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="109" height="11" bgcolor="#252324" style="background-image:url(img/left1.jpg)"></td>
              <td height="11" bgcolor="#393532" style="background-image:url(img/center.jpg)"><img src="img/center.jpg" width="38" height="11" /></td>
            </tr>
          </table></td>
        </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="2" bgcolor="#191919"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="42" bgcolor="#252324"></td>
              <td><div id='contenido'>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="42" height="1" bgcolor="#5F5F5F"></td>
                    <td width="16" height="1" colspan="2" bgcolor="#5f5f5f"></td>
                  </tr>
                </table>
              </div></td>
            </tr>
          </table></td>
          </tr>
        <tr>
          <td width="109" bgcolor="#393532" style="vertical-align:bottom; background-image:url(img/fon_izq.jpg)">
          <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
            <tr onclick="cierra_det('contenido')" style="cursor:pointer">
              <td width="42" bgcolor="#252324">&nbsp;</td>
              <td bgcolor="#191919">&nbsp;</td>
              <td width="16" height="12" bgcolor="#191919"><img src="img/linea.jpg" alt="" width="16" height="8" /></td>
            </tr>
            <tr>
              <td height="1" bgcolor="#252324"></td>
              <td height="1" colspan="2" bgcolor="#5f5f5f"></td>
              </tr>
          </table></td>
          <td bgcolor="#191919"><table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
            <tr onclick="cierra_det('contenido')" style="cursor:pointer">
              <td height="12" bgcolor="#191919">&nbsp;</td>
              </tr>
            <tr>
              <td height="1" bgcolor="#5f5f5f"></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td bgcolor="#252324">&nbsp;</td>
          <td bgcolor="#252324">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#0E0E0E">&nbsp;</td>
          <td bgcolor="#0E0E0E">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
</body>
=======
<?php
date_default_timezone_set("America/Santiago");
include_once('config/Bd.php');
include_once('phpfunc/func.php');

$val = $_GET['val'];
$_SESSION['AUT'] = $val;

$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: UAUTONOMA ::</title>
<link href="css/us.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="js1/jquery.ui/1.10.3/themes/smoothness/jquery-ui.css" />    
</head>
<body onload="MM_preloadImages('img/bot_admin.png','img/bot_incidentes.png','img/bot_anexos.png','img/bot_redes.png')">
<div id='contenedor'>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="332" height="126" style="background-image:url(img/header1.jpg); vertical-align:bottom">
        <div style="border:0; width:332px; visibility:visible; position:absolute; float:left; margin-top:18px; z-index:100; -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=90);filter: alpha(opacity=90);-moz-opacity: 0.9;-khtml-opacity:0.9;opacity:0.9;" onmouseout="oculta_menu()">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="109"><img id='menu_logo' src="img/ico_incidentes.png" alt="" width="109" height="45" /></td>
            <td style="font-size: 18px; color: #CCC;"><strong><div id="menu_texto">INCIDENTES</div></strong></td>
          </tr>
        </table>
        </div>
        <div id='menu' style="border:0; width:198px; visibility:hidden; position:absolute; float:left; margin-top:18px; z-index:100; -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=90);filter: alpha(opacity=90);-moz-opacity: 0.9;-khtml-opacity:0.9;opacity:0.9;" onmouseout="oculta_menu()">
          <table width="100" border="0" cellspacing="0" cellpadding="0" style="border-color:#000" onmouseover="muestra_menu()">
              <tr>
                <td>
                  <table width="100" border="0" cellspacing="0" cellpadding="0" style=" border-style:none; border-color:#333">
                    <tr>
                      <td><img src="img/bot_admin0.png" alt="" name="bot_admin" width="332" height="30" id="bot_admin" style="cursor:pointer; border:none" onclick="oculta_menu(); cargarContenido('admin/index.php','cont');" onmouseover="MM_swapImage('bot_admin','','img/bot_admin.png',1)" onmouseout="MM_swapImgRestore()"/></td>
                    </tr>
                    <tr>
                      <td><img src="img/bot_invent0.png" alt="" name="bot_inv" width="332" height="30" id="bot_inv" style="cursor:pointer; border:none" onclick="oculta_menu(); cargarContenido('tit_inventario.html','cont_up'); cargarContenido('blanc.html','contenido'); cambia_menu('INVENTARIO')" onmouseover="MM_swapImage('bot_inv','','img/bot_invent.png',1)" onmouseout="MM_swapImgRestore()"/></td>
                    </tr>                    
                    <tr>
                      <td><img src="img/bot_incidentes0.png" alt="" name="bot_inc" width="332" height="30" id="bot_inc" style="cursor:pointer; border:none" onclick="oculta_menu(); cargarContenido('tit_incidentes.html','cont_up'); cargarContenido('blanc.html','contenido'); cambia_menu('INCIDENTES')" onmouseover="MM_swapImage('bot_inc','','img/bot_incidentes.png',1)" onmouseout="MM_swapImgRestore()"/></td>
                      </tr>
                    <?php if ($tu==0){?>
                    <tr>
                      <td><img src="img/bot_anexos0.png" alt="" name="bot_ane" width="332" height="30" id="bot_ane" style="cursor:pointer; border:none" onclick="oculta_menu(); cargarContenido('tit_anexos.html','cont_up'); cargarContenido('blanc.html','contenido'); cambia_menu('ANEXOS')" onmouseover="MM_swapImage('bot_ane','','img/bot_anexos.png',1)" onmouseout="MM_swapImgRestore()"/></td>
                    </tr>
                    <tr>
                      <td><img src="img/bot_redes0.png" alt="" name="bot_red" width="332" height="30" id="bot_red" style="cursor:pointer; border:none" onclick="oculta_menu();  cargarContenido('tit_redes.html','cont_up'); cargarContenido('blanc.html','contenido'); cambia_menu('REDES')" onmouseover="MM_swapImage('bot_red','','img/bot_redes.png',1)" onmouseout="MM_swapImgRestore()"/><br /></td>
                    </tr>
                    <tr>
                      <td><img src="img/bot_manual0.jpg" alt="" name="bot_man" width="332" height="30" id="bot_man" style="cursor:pointer; border:none" onclick="oculta_menu();  cargarContenido('tit_manuales.html','cont_up'); cargarContenido('blanc.html','contenido'); cambia_menu('MANUALES')" onmouseover="MM_swapImage('bot_man','','img/bot_manual.jpg',1)" onmouseout="MM_swapImgRestore()"/><br /></td>
                    </tr>                    
                    <?php } ?>                    
                    <tr>
                      <td height="20" bgcolor="#232323" style="cursor:pointer; text-align:center" onmousedown="oculta_menu()"><img src="img/arrow_up.jpg" width="16" height="10" /></td>
                    </tr>
                    </table></td>
                </tr>
              </table>
          </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><strong>
              <div id="nom_menu" style="color:#D18756">&nbsp;&nbsp;INCIDENTES</div>
            </strong></td>
            <td width="224" onclick="muestra_menu()" style="cursor:pointer">&nbsp;</td>
          </tr>
        </table>
        </td>
        <td style="background-image:url(img/header2.jpg)">&nbsp;</td>
        <td width="328"><img src="img/header3.jpg" alt="" width="328" height="126" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="20" bgcolor="#252324"></td>
        <td colspan="3" bgcolor="#393532"></td>
      </tr>
      <tr>
        <td height="10" bgcolor="#252324">&nbsp;</td>
        <td width="300" bgcolor="#393532" style="text-align: left; font-size: 12px; color: #CCCCCC;">&nbsp;</td>
        <td bgcolor="#393532" style="text-align:left; font-size:18px;">&nbsp;</td>
        <td bgcolor="#393532" style="text-align:left; font-size:18px;">&nbsp;</td>
      </tr>
      <tr>
        <td height="10" colspan="4" bgcolor="#252324"></td>
      </tr>
      <tr>
        <td width="109" bgcolor="#252324">&nbsp;</td>
        <td colspan="3" bgcolor="#393532">&nbsp;</td>
      </tr>
    </table>   
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="40" bgcolor="#252324">&nbsp;</td>
          <td bgcolor="#393532">
          <div id='cont_up'>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="291" height="94" onmouseover="activa_map();" onmouseout="apaga_map();" >
                  <div id="map" style="float:left; position:absolute; width:50px; height:40px; margin-left:252px; margin-top:53px; -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=60);filter: alpha(opacity=60);-moz-opacity: 0.6;-khtml-opacity:0.6;opacity:0.6; cursor:pointer"><img src="img/mapa1.png" width="21" height="35" onclick="window.open('PV_resp.php','VISTA','directories=0,titlebar=0,toolbar=0,location=0,status=0,menubar=0,scrollbars=0,resizable=0,width=810,height=600')"/></div><img src="img/campus_prov.jpg" alt="" width="291" height="94" onclick="cargarContenido('incidentes.php?val=1','contenido');" style="cursor:pointer" /></td>
                <td width="20">&nbsp;</td>
                <td width="200"><iframe id="grafico" style="height:94px; width: 300px; color:#FFFFFF; border:none" frameborder="0" src="grafico.php"></iframe></td>
                <td width="20">&nbsp;</td>
                <td bgcolor="#393532" style="vertical-align:top">
                <iframe id='tabla' src="tabla.php" style="height:94px; width: 100%; color:#FFFFFF; border:none" frameborder="0"></iframe></td>
                <td width="20" style="vertical-align:top">&nbsp;</td>
                <td style="vertical-align:top"><iframe id='alertas' src="alertas.php" style="height:94px; width: 150px; color:#FFFFFF; border:none" frameborder="0"></iframe></td>
                <td width="42">&nbsp;</td>
              </tr>
          </table>
          </div>
          </td>
        </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="11" bgcolor="#393532"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="109" height="11" bgcolor="#252324" style="background-image:url(img/left1.jpg)"></td>
              <td height="11" bgcolor="#393532" style="background-image:url(img/center.jpg)"><img src="img/center.jpg" width="38" height="11" /></td>
            </tr>
          </table></td>
        </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="2" bgcolor="#191919"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="42" bgcolor="#252324"></td>
              <td><div id='contenido'>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="42" height="1" bgcolor="#5F5F5F"></td>
                    <td width="16" height="1" colspan="2" bgcolor="#5f5f5f"></td>
                  </tr>
                </table>
              </div></td>
            </tr>
          </table></td>
          </tr>
        <tr>
          <td width="109" bgcolor="#393532" style="vertical-align:bottom; background-image:url(img/fon_izq.jpg)">
          <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
            <tr onclick="cierra_det('contenido')" style="cursor:pointer">
              <td width="42" bgcolor="#252324">&nbsp;</td>
              <td bgcolor="#191919">&nbsp;</td>
              <td width="16" height="12" bgcolor="#191919"><img src="img/linea.jpg" alt="" width="16" height="8" /></td>
            </tr>
            <tr>
              <td height="1" bgcolor="#252324"></td>
              <td height="1" colspan="2" bgcolor="#5f5f5f"></td>
              </tr>
          </table></td>
          <td bgcolor="#191919"><table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
            <tr onclick="cierra_det('contenido')" style="cursor:pointer">
              <td height="12" bgcolor="#191919">&nbsp;</td>
              </tr>
            <tr>
              <td height="1" bgcolor="#5f5f5f"></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td bgcolor="#252324">&nbsp;</td>
          <td bgcolor="#252324">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#0E0E0E">&nbsp;</td>
          <td bgcolor="#0E0E0E">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
</body>
>>>>>>> origin/master
</html>