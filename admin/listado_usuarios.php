<?php
include_once 'class/Bd.php';
include_once 'class/cUsuarios.php';
include_once 'class/cCargos.php';
include_once 'class/cAreas.php';
include_once 'phpfunc/func.php';
//header("Content-type: text/html; charset=latin1");
$col = $_GET['col'];
$ord = $_GET['ord'];
$dire = $_GET['dire'];
$dire = "";

$oUsuario = new cUsuario;
$consulta = $oUsuario->consultar('nombre','ASC');

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
	       <td width="87" height="30" bgcolor="#678916" style="text-align:center; cursor:pointer" onclick="javascript:muestra_a_usuario();">AGREGAR</td>
	       <td bgcolor="#333333">&nbsp;</td>
         </tr>
	     <tr>
	     <td height='5' colspan="2" bgcolor="#333333">
         </td>
	   </tr></table>
	   </div>
		<table width="100%" border="0" cellpadding='0' cellspacing='0'>
	          <tr class="tit_tabla">
	            <td width="35" style="text-align:center;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','rut','<?php echo $dire ?>');">&nbsp;ID<img src='img/<?php echo $flecha1 ?>' name='flecha1' id='flecha1' width='8' height='8'></td>
	            <td width="120" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;NOMBRE </span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' name='flecha2' id='flecha2' width='8' height='8'></span></td>
	            <td width="120" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;APELLIDO PAT. </span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha13' /></span></td>
	            <td width="120" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;APELLIDO MAT.</span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha14' /></span></td>
	            <td width="150" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class="span_fact" style="float:left;">&nbsp;CARGO</span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha7' /></span></td>
	            <td width="140" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class="span_fact" style="float:left;">&nbsp;TIPO</span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha11' /></span></td>
	            <td width="80" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;AREA </span><span style="float:right;margin:4px;"><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha8' /></span></td>
	            <td width="120" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;CARRERA </span><span style="float:right;margin:4px;"><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha17' /></span></td>
	            <td style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;ANEXO </span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha3' /></span></td>
	            <td style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" >IP</td>
	            <td width="70" style="text-align:center;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" >ESTADO</td>
	            <td width='80'><div class='span_fact1'>&nbsp;MODIFICAR</div></td>			
	            <td width='80'><div class='span_fact1'>&nbsp;ELIMINAR</div></td>				
          </tr>
           <div id='agregar'>
			   <tr height='0'>
				  <td bgcolor="#666"><div id='con_id' style='background-color:#666;'></div></td>
				  <td bgcolor="#666" style="text-align:left"><div id='con_nombre' style='background-color:#666;'></div></td>
				  <td bgcolor="#666" style="text-align:left"><div id='con_apellidop' style='background-color:#666;'></div></td>
				  <td bgcolor="#666" style="text-align:left"><div id='con_apellidom' style='background-color:#666;'></div></td>
				  <td bgcolor="#666" style="text-align:left"><div id='con_cargo' style='background-color:#666;'></div></td>
				  <td bgcolor="#666" style="text-align:left"><div id='con_tipo' style='background-color:#666;'></div></td>
				  <td bgcolor="#666" style="text-align:left"><div id='con_area'></div></td>
				  <td bgcolor="#666" style="text-align:left"><div id='con_carrera'></div></td>
				  <td bgcolor="#666" style="text-align:left"><div id='con_anexo'></div></td>
				  <td bgcolor="#666" style="text-align:left"><div id='con_ip'></div></td>
				  <td bgcolor="#666" style="text-align:left"></td>
			     <td colspan='2' bgcolor="#333333"><div id='con_guardar' style='background-color:#333; text-align:left'></div></td>
			   </tr>	
          </div>
<?php	while($row = mysql_fetch_array($consulta)){	 
			$oCargo = new cCargo;
			$consulta1 = $oCargo->consultar_id($row['cargo']);	
			$num_rows1 = @mysql_num_rows($consulta1);
			$row1 = mysql_fetch_array($consulta1);
			if ($num_rows1 == 0){$cargo="SIN DEFINIR"; $ctexto="#999";}else{$cargo=$row1['nombre'];$ctexto="#FFF";}
			if ($row['tipo']==0){$tipo="SIN DEFINIR"; $ctexto1="#999";}
			if ($row['tipo']==1){$tipo="ADMINISTRATIVO(A)"; $ctexto1="#FFF";}
			if ($row['tipo']==2){$tipo="DOCENTE"; $ctexto1="#FFF";}
			if ($row['id_area']==0){$area="SIN DEFINIR"; $ctexto2="#999";}
			if ($row['id_area']==1){$area="ADMINISTRATIVO(A)"; $ctexto2="#FFF";}
			$oArea = new cAreas;
			$consulta2 = $oArea->consultar_id($row['id_area']);	
			$num_rows2 = @mysql_num_rows($consulta2);
			$row2 = mysql_fetch_array($consulta2);
			if ($row['estado']==1){$estado="ACTIVO"; $ctexto3="#FFF";$bcolor3="";}
			if ($row['estado']==0){$estado="INACTIVO"; $ctexto3="#999";$bcolor3="#62270B";}	
			
			$bd3 = new Bd();
			$bd3->sql = "SELECT * FROM ua_carreras where id='".$row['id_carrera']."'";
			//echo "SELECT * FROM ua_carreras order by nombre";
			$bd3->ejecutar();
			$row3 = $bd3->fetch_row();
			$carrera = $row3['nombre'];
			
?>
		          <tr id='line<?php echo $row['id'] ?>' onMouseOver="on_ove('line<?php echo $row['id'] ?>')" onMouseOut="on_out('line<?php echo $row['id'] ?>')" class="cont_tabla">
		            <td style="text-align:right;border:solid #000 1px;"><div id='con_ide<?php echo $row['id'] ?>'>&nbsp;<?php echo $row['id'] ?>
		              <input type="hidden" id="id_usuario<?php echo $row['id'] ?>2" value="<?php echo $row['id'] ?>" />
	                &nbsp;</div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_nombre<?php echo $row['id'] ?>'>&nbsp;<?php echo ($row['nombre']) ?></div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_apellidop<?php echo $row['id'] ?>'>&nbsp;<?php echo ($row['apellidop']) ?></div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_apellidom<?php echo $row['id'] ?>'>&nbsp;<?php echo ($row['apellidom']) ?></div></td>
		            <td style="text-align:left;border:solid #000 1px; color: <?php echo $ctexto ?>"><div id='con_cargo<?php echo $row['id'] ?>'>&nbsp;<?php echo $cargo ?>
		              <input type="hidden" id="cid<?php echo $row['id'] ?>" value="<?php echo $row1['id'] ?>" />
		            </div></td>
		            <td style="text-align:left;border:solid #000 1px; color: <?php echo $ctexto1 ?>"><div id='con_tipo<?php echo $row['id'] ?>'>&nbsp;<?php echo $tipo ?>
		              <input type="hidden" id="tid<?php echo $row['id'] ?>" value="<?php echo $row['tipo'] ?>" />
		            </div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_area<?php echo $row['id'] ?>'>&nbsp;<?php echo $row2['nombre_corto'] ?>
		              <input type="hidden" id="aid<?php echo $row['id'] ?>" value="<?php echo $row['id_area'] ?>" />
		            </div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_carrera<?php echo $row['id'] ?>'>&nbsp;<?php echo $carrera; ?>
		              <input type="hidden" id="caid<?php echo $row['id'] ?>" value="<?php echo $row['id_carrera'] ?>" />
	                </div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_anexo<?php echo $row['id'] ?>'>&nbsp;<?php echo c_sp($row['anexo']) ?></div></td>
		            <td style="text-align:left;border:solid #000 1px;"><div id='con_ip<?php echo $row['id'] ?>'>&nbsp;<?php echo c_sp($row['ip']) ?></div></td>
		            <td style="text-align:center;border:solid #000 1px; background-color: <?php echo $bcolor3 ?>; color: <?php echo $ctexto3 ?>; cursor:pointer; " onclick="cargarContenido1('modifica_estado_usuario.php?id=<?php echo $row['id']?>&estado=<?php echo $row['estado']?>','agregar'); alert('ESTADO MODIFICADO');cargarContenido1('admin/listado_usuarios.php?id=0','contenido');"><?php echo $estado ?></td>
		            <td width='80' bgcolor="#333333" id='td_modificar<?php echo $row['id'] ?>' style="text-align:left;border:solid #000 1px;"><div class='con_modificar<?php echo $row['id'] ?>' id='con_modificar<?php echo $row['id'] ?>' align='center'><a href='javascript:;'><img src='admin/img/modifica.png' name='bot_modif' border='0' id='bot_modif' width='23' height='23' onclick="javascript:EditaFila_usuario('<?php echo $row['id'] ?>');"></a></div></td>				
		            <td width='80' bgcolor="#333333" id='td_eliminar<?php echo $row['id'] ?>' style="text-align:left;border:solid #000 1px;"><div class='con_eliminar<?php echo $row['id'] ?>' id='con_eliminar<?php echo $row['id'] ?>' align='center' ><a href='javascript:;'><img src='admin/img/borra.png' name='bot_eliminar' border='0' id='bot_eliminar' width='23' height='23' onclick="javascript:cargarContenido('admin/elimina_usuario.php?id=<?php echo $row['id'] ?>','ta_agregar'); cargarContenido('admin/listado_usuarios.php','contenido');"></a></div></td>						
		          </tr>
<?php				  } ?>
		          <tr class="cont_tabla">
		            <td colspan="13" bgcolor="#666666" style="text-align:right;border:solid #000 1px;">&nbsp;</td>
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
	       <td width="87" height="30" bgcolor="#678916" style="text-align:center; cursor:pointer" onclick="javascript:muestra_a_usuario();cargarContenido('admin/carga_sel_campus.php','con_campus');cargarContenido('admin/carga_sel_dependencia.php','con_dependencia'); cargarContenido('admin/carga_sel_tipousuario.php','con_tipo')">AGERGAR</td>
	       <td bgcolor="#333333">&nbsp;</td>
         </tr>
	     <tr><td height='5' colspan="2" bgcolor="#333333"></td></tr></table>
	   </div>
		<table width="100%" border="0" cellpadding='0' cellspacing='0'>
              <tr class="tit_tabla">
	             <td width="35" style="text-align:center;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','rut','<?php echo $dire ?>');">&nbsp;ID<img src='img/<?php echo $flecha1 ?>' alt="" name='flecha1' width='8' height='8' id='flecha4' /></td>
	             <td width="120" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;NOMBRE </span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha5' /></span></td>
	             <td width="120" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class="span_fact" style="float:left;">&nbsp;APELLIDO PAT. <span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha15' /></span></span></td>
	             <td width="120" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class="span_fact" style="float:left;">&nbsp;APELLIDO MAT. <span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha16' /></span></span></td>
	             <td width="150" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class="span_fact" style="float:left;">&nbsp;CARGO</span><span style="float:right;margin:4px;"><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha9' /></span></td>
	             <td width="140" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class="span_fact" style="float:left;">&nbsp;TIPO</span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha12' /></span></td>
	             <td width="80" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;AREA </span><span style="float:right;margin:4px;"><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha10' /></span></td>
	             <td width="80" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;CARRERA </span><span style="float:right;margin:4px;"><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha18' /></span></td>
                <td style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" ><span class='span_fact' style='float:left;'>&nbsp;ANEXO </span><span style='float:right;margin:4px;'><img src='img/<?php echo $flecha2 ?>' alt="" name='flecha2' width='8' height='8' id='flecha6' /></span></td>
                <td style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" >IP</td>
                <td width="70" style="text-align:left;border:solid #000 1px;" onclick="javascript:cargarPag('listado_Campus1.php','datos1','<?php echo $col ?>','nombre','<?php echo $dire ?>');" >ESTADO</td>
                <td width="80"><div class='span_fact1'>&nbsp;MODIFICAR</div></td>
                <td width="80"><div class='span_fact1'>&nbsp;ELIMINAR</div></td>
          </tr>
			   <tr id='ta_campus' height='0' class="cont_tabla">
			     <td style="text-align:left;border:solid #000 1px;" width="35" bgcolor="#666666"><div id='con_id' style='background-color:#666666;'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_nombre' style='background-color:#666666;'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_apellidop' style='background-color:#666;'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_apellidom' style='background-color:#666;'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_cargo' style='background-color:#666;'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_tipo' style='background-color:#666;'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_dependencia'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_carrera'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666"><div id='con_campus'></div></td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666">&nbsp;</td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#666666">&nbsp;</td>
			     <td style="text-align:left;border:solid #000 1px;" bgcolor="#333" width="200" colspan='2'><div id='con_guardar' style='background-color:#333; text-align:left'></div></td>
	      </tr>	
      </table>
	</form>			
	<div align='center' style="background-color:#333"><br>
	  NO EXISTEN USUARIOS EN EL SISTEMA<br>
	<br>
<br></div><br>	
<?php } ?>