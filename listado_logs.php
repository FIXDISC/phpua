<<<<<<< HEAD
<?php
date_default_timezone_set("America/Santiago");
include_once('config/Bd.php');
include_once('phpfunc/func.php');
//header("Content-type: text/html; charset=latin1");

$id = $_GET['id'];

	$bd = new Bd();
	$bd->sql = "SELECT * FROM ua_log_items where id_item='$id' order by fecha DESC";
	//echo "SELECT * FROM ua_inventario ".$query." order by id DESC<br>";
	$bd->ejecutar();
	$row_count = $bd->row_count();

if ($row_count!=0){ ?>
<link href="css/us.css" rel="stylesheet" type="text/css" />

	<form name='form1' id='form1' method='post'>
      <div id='ta_agregar'><table cellpadding='0' cellspacing='0' width='100%'>
	     <tr>
	       <td width="87" height="10" colspan="2" >&nbsp;</td>
         </tr>
	     <tr>
	     <td height='5' colspan="2" bgcolor="#333333">
         </td>
	   </tr></table>
	   </div>
		<table width="100%" border="0" cellpadding='0' cellspacing='0'>
	          <tr class="tit_tabla">
	            <td width="35" style="text-align:center;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','rut','<?php echo $dire ?>');">&nbsp;ID<img src='img/<?php echo $flecha1 ?>' name='flecha1' id='flecha1' width='8' height='8'></td>
	            <td width="230" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" >ACCI&Oacute;N</td>
	            <td width="230" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;NOMBRE </span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' name='flecha2' id='flecha2' width='8' height='8'></span></td>
	            <td width="150" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class="span_fact" style="float:left;">&nbsp;ACTUAL</span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha7' /></span></td>
	            <td width="150" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class="span_fact" style="float:left;">&nbsp;TIPO</span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha11' /></span></td>
	            <td width="150" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;DEPENDENCIA </span><span style="float:right;margin:4px;"><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha8' /></span></td>
	            <td style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;CAMPUS </span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha3' /></span></td>
	            <td width='80'><div class='span_fact1'>&nbsp;MODIFICAR</div></td>			
	            <td width='80'><div class='span_fact1'>&nbsp;ELIMINAR</div></td>				
          </tr>
           <div id='agregar'>	      </div>
<?php	while($row =  $bd->fetch_row()){	 
			if ($row['tipo']==1){$tipo="ADMINISTRATIVO(A)";}
			if ($row['tipo']==2){$tipo="DOCENTE";}
			if ($row['tipo']==3){$tipo="ALUMNOS";}			
			
?>
		          <tr id='line<?php echo $row['id'] ?>' onMouseOver="on_ove('line<?php echo $row['id'] ?>')" onMouseOut="on_out('line<?php echo $row['id'] ?>')" class="cont_tabla">
		            <td style="text-align:right;border:solid #000 1px;"><div id='con_id<?php echo $row['id'] ?>'>&nbsp;<?php echo $row['id'] ?>&nbsp;</div></td>
		            <td style="text-align:left;border:solid #000 1px;"><?php echo ($row['accion']) ?></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_nombre<?php echo $row['id'] ?>'>&nbsp;<?php echo ($row['nombre']) ?></div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_nombre_corto<?php echo $row['id'] ?>'>&nbsp;<?php echo ($row['nuevo']) ?></div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_tipo<?php echo $row['id'] ?>'>&nbsp;<?php echo $tipo ?>
		              <input type="hidden" id="tid<?php echo $row['id'] ?>" value="<?php echo $row['tipo'] ?>" />
		            </div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_dependencia<?php echo $row['id'] ?>'>&nbsp;<?php echo c_sp($row['dn']) ?>
		              <input type="hidden" id="did<?php echo $row['id'] ?>" value="<?php echo $row['did'] ?>" />
		            </div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_campus<?php echo c_sp($row['id']) ?>'>&nbsp;<?php echo c_sp($row['cnombre']) ?>
		              <input type="hidden" id="cid<?php echo $row['id'] ?>" value="<?php echo $row['cid'] ?>" />
		            </div></td>
		            <td width='80' bgcolor="#333333" id='td_modificar<?php echo $row['id'] ?>' style="text-align:left;border:solid #000 1px;"><div class='con_modificar<?php echo $row['id'] ?>' id='con_modificar<?php echo $row['id'] ?>' align='center'><a href='javascript:;'><img src='admin/img/modifica.png' name='bot_modif' border='0' id='bot_modif' width='23' height='23' onclick="javascript:EditaFila_area('<?php echo $row['id'] ?>');"></a></div></td>				
		            <td width='80' bgcolor="#333333" id='td_eliminar<?php echo $row['id'] ?>' style="text-align:left;border:solid #000 1px;"><div class='con_eliminar<?php echo $row['id'] ?>' id='con_eliminar<?php echo $row['id'] ?>' align='center' ><a href='javascript:;'><img src='admin/img/borra.png' name='bot_eliminar' border='0' id='bot_eliminar' width='23' height='23' onclick="javascript:cargarContenido('admin/elimina_area.php?id=<?php echo $row['id'] ?>','ta_agregar'); cargarContenido('admin/listado_areas.php','contenido');"></a></div></td>						
		          </tr>
<?php				  } ?>
		          <tr class="cont_tabla">
		            <td colspan="9" bgcolor="#666666" style="text-align:right;border:solid #000 1px;">&nbsp;</td>
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
	       <td width="87" height="30" bgcolor="#678916" style="text-align:center; cursor:pointer" onclick="javascript:muestra_a_area();cargarContenido('admin/carga_sel_campus.php','con_campus');cargarContenido('admin/carga_sel_dependencia.php','con_dependencia'); cargarContenido('admin/carga_sel_tipoarea.php','con_tipo')">AGERGAR</td>
	       <td bgcolor="#333333">&nbsp;</td>
         </tr>
	     <tr><td height='5' colspan="2" bgcolor="#333333"></td></tr></table>
	   </div>
		<table width="100%" border="0" cellpadding='0' cellspacing='0'>
              <tr class="tit_tabla">
	             <td style="text-align:center;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','rut','<?php echo $dire ?>');">&nbsp;ID<img src='img/<?php echo $flecha1 ?>' alt="" name='flecha1' width='8' height='8' id='flecha4' /></td>
	             <td width="230" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" >ACCIÓN</td>
	             <td width="230" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;NOMBRE </span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha5' /></span></td>
	             <td width="150" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class="span_fact" style="float:left;">&nbsp;NOMBRE CORTO</span><span style="float:right;margin:4px;"><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha9' /></span></td>
	             <td width="150" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class="span_fact" style="float:left;">&nbsp;TIPO</span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha12' /></span></td>
	             <td width="150" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;DEPENDENCIA </span><span style="float:right;margin:4px;"><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha10' /></span></td>
                <td style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;CAMPUS </span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha6' /></span></td>
	             <td width="80"><div class='span_fact1'>&nbsp;MODIFICAR</div></td>
                <td width="80"><div class='span_fact1'>&nbsp;ELIMINAR</div></td>
          </tr>
			   <tr id='ta_campus' height='0' class="cont_tabla">
			     <td style="text-align:left;border:solid #000 1px;" width="35" bgcolor="#666666"><div id='con_id' style='background-color:#666666;'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666">&nbsp;</td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_nombre' style='background-color:#666666;'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_nombre_corto' style='background-color:#666;'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_tipo' style='background-color:#666;'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_dependencia'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_campus'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#333" width="200" colspan='2'><div id='con_guardar' style='background-color:#333; text-align:left'></div></td>
	      </tr>	
      </table>
	</form>			
	<div align='center' style="background-color:#333"><br>
	  NO EXISTEN MOVIMIENTOS REGISTRADOS PARA ESTE ITEM<br>
	<br>
<br></div><br>	
=======
<?php
date_default_timezone_set("America/Santiago");
include_once('config/Bd.php');
include_once('phpfunc/func.php');
//header("Content-type: text/html; charset=latin1");

$id = $_GET['id'];

	$bd = new Bd();
	$bd->sql = "SELECT * FROM ua_log_items where id_item='$id' order by fecha DESC";
	//echo "SELECT * FROM ua_inventario ".$query." order by id DESC<br>";
	$bd->ejecutar();
	$row_count = $bd->row_count();

if ($row_count!=0){ ?>
<link href="css/us.css" rel="stylesheet" type="text/css" />

	<form name='form1' id='form1' method='post'>
      <div id='ta_agregar'><table cellpadding='0' cellspacing='0' width='100%'>
	     <tr>
	       <td width="87" height="10" colspan="2" >&nbsp;</td>
         </tr>
	     <tr>
	     <td height='5' colspan="2" bgcolor="#333333">
         </td>
	   </tr></table>
	   </div>
		<table width="100%" border="0" cellpadding='0' cellspacing='0'>
	          <tr class="tit_tabla">
	            <td width="35" style="text-align:center;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','rut','<?php echo $dire ?>');">&nbsp;ID<img src='img/<?php echo $flecha1 ?>' name='flecha1' id='flecha1' width='8' height='8'></td>
	            <td width="230" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" >ACCI&Oacute;N</td>
	            <td width="230" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;NOMBRE </span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' name='flecha2' id='flecha2' width='8' height='8'></span></td>
	            <td width="150" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class="span_fact" style="float:left;">&nbsp;ACTUAL</span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha7' /></span></td>
	            <td width="150" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class="span_fact" style="float:left;">&nbsp;TIPO</span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha11' /></span></td>
	            <td width="150" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;DEPENDENCIA </span><span style="float:right;margin:4px;"><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha8' /></span></td>
	            <td style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;CAMPUS </span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha3' /></span></td>
	            <td width='80'><div class='span_fact1'>&nbsp;MODIFICAR</div></td>			
	            <td width='80'><div class='span_fact1'>&nbsp;ELIMINAR</div></td>				
          </tr>
           <div id='agregar'>	      </div>
<?php	while($row =  $bd->fetch_row()){	 
			if ($row['tipo']==1){$tipo="ADMINISTRATIVO(A)";}
			if ($row['tipo']==2){$tipo="DOCENTE";}
			if ($row['tipo']==3){$tipo="ALUMNOS";}			
			
?>
		          <tr id='line<?php echo $row['id'] ?>' onMouseOver="on_ove('line<?php echo $row['id'] ?>')" onMouseOut="on_out('line<?php echo $row['id'] ?>')" class="cont_tabla">
		            <td style="text-align:right;border:solid #000 1px;"><div id='con_id<?php echo $row['id'] ?>'>&nbsp;<?php echo $row['id'] ?>&nbsp;</div></td>
		            <td style="text-align:left;border:solid #000 1px;"><?php echo ($row['accion']) ?></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_nombre<?php echo $row['id'] ?>'>&nbsp;<?php echo ($row['nombre']) ?></div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_nombre_corto<?php echo $row['id'] ?>'>&nbsp;<?php echo ($row['nuevo']) ?></div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_tipo<?php echo $row['id'] ?>'>&nbsp;<?php echo $tipo ?>
		              <input type="hidden" id="tid<?php echo $row['id'] ?>" value="<?php echo $row['tipo'] ?>" />
		            </div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_dependencia<?php echo $row['id'] ?>'>&nbsp;<?php echo c_sp($row['dn']) ?>
		              <input type="hidden" id="did<?php echo $row['id'] ?>" value="<?php echo $row['did'] ?>" />
		            </div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_campus<?php echo c_sp($row['id']) ?>'>&nbsp;<?php echo c_sp($row['cnombre']) ?>
		              <input type="hidden" id="cid<?php echo $row['id'] ?>" value="<?php echo $row['cid'] ?>" />
		            </div></td>
		            <td width='80' bgcolor="#333333" id='td_modificar<?php echo $row['id'] ?>' style="text-align:left;border:solid #000 1px;"><div class='con_modificar<?php echo $row['id'] ?>' id='con_modificar<?php echo $row['id'] ?>' align='center'><a href='javascript:;'><img src='admin/img/modifica.png' name='bot_modif' border='0' id='bot_modif' width='23' height='23' onclick="javascript:EditaFila_area('<?php echo $row['id'] ?>');"></a></div></td>				
		            <td width='80' bgcolor="#333333" id='td_eliminar<?php echo $row['id'] ?>' style="text-align:left;border:solid #000 1px;"><div class='con_eliminar<?php echo $row['id'] ?>' id='con_eliminar<?php echo $row['id'] ?>' align='center' ><a href='javascript:;'><img src='admin/img/borra.png' name='bot_eliminar' border='0' id='bot_eliminar' width='23' height='23' onclick="javascript:cargarContenido('admin/elimina_area.php?id=<?php echo $row['id'] ?>','ta_agregar'); cargarContenido('admin/listado_areas.php','contenido');"></a></div></td>						
		          </tr>
<?php				  } ?>
		          <tr class="cont_tabla">
		            <td colspan="9" bgcolor="#666666" style="text-align:right;border:solid #000 1px;">&nbsp;</td>
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
	       <td width="87" height="30" bgcolor="#678916" style="text-align:center; cursor:pointer" onclick="javascript:muestra_a_area();cargarContenido('admin/carga_sel_campus.php','con_campus');cargarContenido('admin/carga_sel_dependencia.php','con_dependencia'); cargarContenido('admin/carga_sel_tipoarea.php','con_tipo')">AGERGAR</td>
	       <td bgcolor="#333333">&nbsp;</td>
         </tr>
	     <tr><td height='5' colspan="2" bgcolor="#333333"></td></tr></table>
	   </div>
		<table width="100%" border="0" cellpadding='0' cellspacing='0'>
              <tr class="tit_tabla">
	             <td style="text-align:center;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','rut','<?php echo $dire ?>');">&nbsp;ID<img src='img/<?php echo $flecha1 ?>' alt="" name='flecha1' width='8' height='8' id='flecha4' /></td>
	             <td width="230" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" >ACCIÓN</td>
	             <td width="230" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;NOMBRE </span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha5' /></span></td>
	             <td width="150" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class="span_fact" style="float:left;">&nbsp;NOMBRE CORTO</span><span style="float:right;margin:4px;"><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha9' /></span></td>
	             <td width="150" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class="span_fact" style="float:left;">&nbsp;TIPO</span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha12' /></span></td>
	             <td width="150" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;DEPENDENCIA </span><span style="float:right;margin:4px;"><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha10' /></span></td>
                <td style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;CAMPUS </span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha6' /></span></td>
	             <td width="80"><div class='span_fact1'>&nbsp;MODIFICAR</div></td>
                <td width="80"><div class='span_fact1'>&nbsp;ELIMINAR</div></td>
          </tr>
			   <tr id='ta_campus' height='0' class="cont_tabla">
			     <td style="text-align:left;border:solid #000 1px;" width="35" bgcolor="#666666"><div id='con_id' style='background-color:#666666;'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666">&nbsp;</td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_nombre' style='background-color:#666666;'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_nombre_corto' style='background-color:#666;'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_tipo' style='background-color:#666;'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_dependencia'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_campus'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#333" width="200" colspan='2'><div id='con_guardar' style='background-color:#333; text-align:left'></div></td>
	      </tr>	
      </table>
	</form>			
	<div align='center' style="background-color:#333"><br>
	  NO EXISTEN MOVIMIENTOS REGISTRADOS PARA ESTE ITEM<br>
	<br>
<br></div><br>	
>>>>>>> origin/master
<?php } ?>