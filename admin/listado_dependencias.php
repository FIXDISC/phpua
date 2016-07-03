<?php
include_once 'class/cCampus.php';
include_once 'class/cDependencias.php';
include_once 'phpfunc/func.php';
//header("Content-type: text/html; charset=latin1");
$dire = "asc";
$col = $_GET['col'];
$ord = $_GET['ord'];
$dire = $_GET['dire'];

$oDependencia = new cDependencias;
$consulta = $oDependencia->consultar($ord,$dire);

$oCampus = new cCampus;
$consulta1 = $oCampus->consultar($ord,$dire);

if ($dire=="asc"){$dire="desc";$flecha="flecha_down.png";}else{$dire="asc";$flecha="flecha_up.png";}	
if ($ord=='rut'){$flecha1=$flecha;}else{$flecha1="";}
if ($ord=='nombre'){$flecha2=$flecha;}else{$flecha2="";}
if ($ord=='apellidop'){$flecha3=$flecha;}else{$flecha3="";}
if ($ord=='apellidom'){$flecha4=$flecha;}else{$flecha4="";}
if ($ord=='clave'){$flecha5=$flecha;}else{$flecha5="";}
if ($ord=='mail'){$flecha6=$flecha;}else{$flecha6="";}
if ($ord=='tipo'){$flecha7=$flecha;}else{$flecha7="";}


$num_rows = @mysql_num_rows($consulta);	

if ($num_rows!=0){ ?>
	<form name='form1' id='form1' method='post'>
      <div id='ta_agregar'><table cellpadding='0' cellspacing='0' width='100%'>
	     <tr>
	       <td height="10" colspan="2" >&nbsp;</td>
         </tr>
	     <tr>
	       <td width="87" height="30" bgcolor="#678916" style="text-align:center; cursor:pointer" onclick="javascript:muestra_a_dependencia();cargarContenido('admin/carga_sel_campus.php','con_campus');">AGREGAR</td>
	       <td bgcolor="#333333">&nbsp;</td>
         </tr>
	     <tr>
	     <td height='5' colspan="2" bgcolor="#333333">
         </td>
	   </tr></table>
	   </div>
		<table width="100%" border="0" cellpadding='0' cellspacing='0'>
	          <tr class="tit_tabla">
	            <td width="35" style="text-align:center;border:solid #000 1px;" onclick="javascript:cargarPag('listado_campus.php','datos1','<?php echo $col ?>','rut','<?php echo $dire ?>');">&nbsp;ID<img src='img/<?php echo $flecha1 ?>' name='flecha1' id='flecha1' width='8' height='8'></td>
	            <td width="200" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_campus.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;NOMBRE </span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' name='flecha2' id='flecha2' width='8' height='8'></span></td>
	            <td width="150" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_campus.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class="span_fact" style="float:left;">&nbsp;NOMBRE CORTO</span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha7' /></span></td>
	            <td width="200" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_campus.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;DIRECCIÓN </span><span style="float:right;margin:4px;"><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha8' /></span></td>
	            <td style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_campus.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;CAMPUS </span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha3' /></span></td>
	            <td width="44" style="text-align:center;border:solid #000 1px;" onclick="javascript:cargarPag('listado_campus.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" >VISTA</td>
	            <td width='80'><div class='span_fact1'>&nbsp;MODIFICAR</div></td>			
	            <td width='80'><div class='span_fact1'>&nbsp;ELIMINAR</div></td>				
          </tr>
           <div id='agregar'>
			   <tr height='0'>
				  <td bgcolor="#666"><div id='con_id' style='background-color:#666;'></div></td>
				  <td bgcolor="#666" style="text-align:left"><div id='con_nombre' style='background-color:#666;'></div></td>
				  <td bgcolor="#666" style="text-align:left"><div id='con_nombre_corto' style='background-color:#666;'></div></td>
				  <td bgcolor="#666" style="text-align:left"><div id='con_direc'></div></td>
				  <td bgcolor="#666" style="text-align:left"><div id='con_campus'></div></td>
				  <td bgcolor="#666" style="text-align:left"></td>
			     <td colspan='2' bgcolor="#333333"><div id='con_guardar' style='background-color:#333; text-align:left'></div></td>
			   </tr>	
          </div>
<?php	while($row = mysql_fetch_array($consulta)){	 ?>
		          <tr id='line<?php echo $row['id'] ?>' onMouseOver="on_ove('line<?php echo $row['id'] ?>')" onMouseOut="on_out('line<?php echo $row['id'] ?>')" class="cont_tabla">
		            <td style="text-align:right;border:solid #000 1px;"><div id='con_id<?php echo $row['id'] ?>'>&nbsp;<?php echo $row['id'] ?>&nbsp;</div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_nombre<?php echo $row['id'] ?>'>&nbsp;<?php echo c_sp($row['nombre']) ?></div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_nombre_corto<?php echo $row['id'] ?>'>&nbsp;<?php echo c_sp($row['nombre_corto']) ?></div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_direc<?php echo $row['id'] ?>'>&nbsp;<?php echo c_sp($row['d1']) ?></div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_campus<?php echo $row['id'] ?>'>&nbsp;<?php echo c_sp($row['cnombre']) ?><input type="hidden" id="cid<?php echo $row['id'] ?>" value="<?php echo $row['cid'] ?>" /></div></td>
		            <td style="text-align:left;border:solid #000 1px;"><img src="img/icon_view.jpg" width="44" height="23" /></td>
		            <td width='80' bgcolor="#333333" id='td_modificar<?php echo $row['id'] ?>' style="text-align:left;border:solid #000 1px;"><div class='con_modificar<?php echo $row['id'] ?>' id='con_modificar<?php echo $row['id'] ?>' align='center'><a href='javascript:;'><img src='admin/img/modifica.png' name='bot_modif' border='0' id='bot_modif' width='23' height='23' onclick="javascript:EditaFila_dependencia('<?php echo $row['id'] ?>');"></a></div></td>				
		            <td width='80' bgcolor="#333333" id='td_eliminar<?php echo $row['id'] ?>' style="text-align:left;border:solid #000 1px;"><div class='con_eliminar<?php echo $row['id'] ?>' id='con_eliminar<?php echo $row['id'] ?>' align='center' ><a href='javascript:;'><img src='admin/img/borra.png' name='bot_eliminar' border='0' id='bot_eliminar' width='23' height='23' onclick="javascript:cargarContenido('admin/elimina_dependencia.php?id=<?php echo $row['id'] ?>','ta_agregar'); cargarContenido('admin/listado_dependencias.php','contenido');"></a></div></td>						
		          </tr>
<?php				  } ?>
		          <tr class="cont_tabla">
		            <td colspan="8" bgcolor="#666666" style="text-align:right;border:solid #000 1px;">&nbsp;</td>
	            </tr>
      </table>
	</form><br>		

<?php }else{ ?>
	<form name='form1' id='form1' method='post'>
	   <div id='ta_agregar'><table cellpadding='0' cellspacing='0' width='100%'>
	     <tr>
	       <td colspan="2" style="text-align:center; cursor:pointer" onclick='javascript:muestra_a_campus();'>&nbsp;</td>
         </tr>
	     <tr>
	       <td width="87" height="30" bgcolor="#678916" style="text-align:center; cursor:pointer" onclick="javascript:muestra_a_dependencia();cargarContenido('admin/carga_sel_campus.php','con_campus');">AGERGAR</td>
	       <td bgcolor="#333333">&nbsp;</td>
         </tr>
	     <tr><td height='5' colspan="2" bgcolor="#333333"></td></tr></table>
	   </div>
		<table width="100%" border="0" cellpadding='0' cellspacing='0'>
              <tr class="tit_tabla">
	             <td style="text-align:center;border:solid #000 1px;" onclick="javascript:cargarPag('listado_campus.php','datos1','<?php echo $col ?>','rut','<?php echo $dire ?>');">&nbsp;ID<img src='img/<?php echo $flecha1 ?>' alt="" name='flecha1' width='8' height='8' id='flecha4' /></td>
	             <td width="200" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_campus.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;NOMBRE </span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha5' /></span></td>
	             <td width="150" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_campus.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class="span_fact" style="float:left;">&nbsp;NOMBRE CORTO</span><span style="float:right;margin:4px;"><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha9' /></span></td>
	             <td width="200" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_campus.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;DIRECCIÓN </span><span style="float:right;margin:4px;"><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha10' /></span></td>
                <td style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_campus.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;CAMPUS </span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha6' /></span></td>
	             <td width="80"><div class='span_fact1'>&nbsp;MODIFICAR</div></td>
                <td width="80"><div class='span_fact1'>&nbsp;ELIMINAR</div></td>
          </tr>
			   <tr id='ta_campus' height='0' class="cont_tabla">
			     <td style="text-align:left;border:solid #000 1px;" width="35" bgcolor="#666666"><div id='con_id' style='background-color:#666666;'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_nombre' style='background-color:#666666;'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_nombre_corto' style='background-color:#666;'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_direc'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_campus'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#333" width="200" colspan='2'><div id='con_guardar' style='background-color:#333; text-align:left'></div></td>
	      </tr>	
      </table>
	</form>			
	<div align='center' style="background-color:#333"><br>
	  NO EXISTEN DEPENDENCIAS EN EL SISTEMA<br>
	<br>
<br></div><br>	
<?php } ?>