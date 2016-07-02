<<<<<<< HEAD
<?php
date_default_timezone_set("America/Santiago");
include_once('config/Bd.php');
include_once('phpfunc/func.php');

$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);
$fecha1 = strtotime('+1 day',strtotime($fecha_act));
$fecha11 = date("Y-m-d",$fecha1);

$filtro = $_GET['filtro'];
if ($filtro=='0'){$query="";}
if ($filtro!='0'){$query=" where estado='$filtro'";}

	$bd = new Bd();
	$bd->sql = "SELECT * FROM ua_incidentes ".$query." order by fecha DESC";
	//echo "SELECT * FROM ua_incidentes ".$query." order by fecha DESC";
	$bd->ejecutar();
	$row_count = $bd->row_count();

$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>:: UAUTONOMA ::</title>
<link href="css/us.css" rel="stylesheet" type="text/css">
</head>

<body>
<form name="form1" id="form1" method="post" action=""> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="100" bgcolor="#393532"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablas">
      <tr class="tit_tabla">
        <td height="3" colspan="14" nowrap="nowrap" bgcolor="#393532" style="text-align:left; color:#FFF">&nbsp;</td>
      </tr>
      <tr class="tit_tabla">
        <td width="30">ID</td>
        <td width="50">DEP.</td>
        <td width="80">FECHA</td>
        <td width="50">HORA</td>
        <td width="150">USUARIO</td>
        <td width="120">AREA</td>
        <td>INCIDENTE</td>
        <td width="80">TIPO</td>
        <td width="80">IMPACTO</td>
        <td width="100" bgcolor="#62270B">ENCARGADO</td>
        <td>CAUSA</td>
        <td>ACCIÓN</td>
        <td width="100">ESTADO</td>
        <td width="15">&nbsp;</td>
      </tr>
	        
      <div id='agregar'>
      <tr>
        <td bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_fecha" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_fecha" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_hora" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_usuario" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_area" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_incidente" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_tipo" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_impacto" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_encargado" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_causa" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_accion" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_guardar" bgcolor="#454344" style="color:#FFF;border:solid #393532 1px;"></td>
        <td id="con_guardar" bgcolor="#454344" style="color:#FFF;border:solid #393532 1px;"></td>
      </tr>
      </div>
      
<?php if ($row_count==0){ ?>       
      <tr class="cont_tabla">
        <td colspan="14" style="text-align: center; border:solid #C1C1C1 1px;" ><br>
          NO EXISTEN INCIDENTES REPORTADOS<br><br>
          </td>
        </tr>
<?php  }else{  
		while($row = $bd->fetch_row()){
			$fecha_bd = strtotime($row['fecha']);
			$hora_bd = strtotime($row['fecha']);
			
			$bd1 = new Bd();
			$bd1->sql = "SELECT * FROM ua_tipo_incidente where id='".$row['tipo']."'";
			$bd1->ejecutar();
			$row1=$bd1->fetch_row();
			$row_count1 = $bd1->row_count();
			if($row_count1=!0){$tipo=$row1['nombre'];}else{$tipo="INDEFINIDO";}
			
			$bd1 = new Bd();
			$bd1->sql = "SELECT * FROM ua_impactos where id='".$row['impacto']."'";
			$bd1->ejecutar();
			$row1=$bd1->fetch_row();
			$row_count1 = $bd1->row_count();
			if($row_count1=!0){$impacto=$row1['nombre'];}else{$impacto="INDEFINIDO";}
			
			if ($row['encargado']==0){$encargado="";}else{$encargado=$row['encargado'];}
			if ($encargado!=0){
				$bd1 = new Bd();
				$bd1->sql = "SELECT * FROM ua_usuarios where id='".$row['encargado']."'";
				$bd1->ejecutar();
				$row1=$bd1->fetch_row();
				$row_count1 = $bd1->row_count();
				if($row_count1=!0){$encargado=$row1['nombre'];}else{$encargado="INDEFINIDO";}		
			}else{
				
				$bd2 = new Bd();
				$bd2->sql = "SELECT * FROM ua_usuarios where id_area=2 order by nombre";
				$bd2->ejecutar();
				$encargado = $encargado."<table width='100'><tr><td><select name='encargado".$row['id']."' id='encargado".$row['id']."'>"; 
				$encargado = $encargado."<option selected='selected' value='0'>ENCARGADO</option>";
					while($row2 = $bd2->fetch_row()){
						$encargado = $encargado."<option value='".$row2['id']."'>".($row2['nombre'])."</option>";
					}
				$encargado = $encargado."</select></td><td><img src='img/save.jpg' width='20' height='20' onclick=valida_encargado('form1','".$row['id']."','2') style='cursor:pointer;' ></td></tr></table>"; 		
			}
			
			if ($row['causa']==""){
				$causa="";
				$causa="<table><tr><td><input name='causa".$row['id']."' type='text' id='causa".$row['id']."' size='10' onkeypress='auto_causa(".$row['id'].")' ></td><td><img src='img/save.jpg' width='20' height='20' onclick=valida_causa('form1','".$row['id']."',1) style='cursor:pointer;' ></td></tr></table>";
			}else{
				$causa=$row['causa'];
			}
	
			if ($row['accion']==""){
				$accion="";
				$accion="<table><tr><td><input name='accion".$row['id']."' type='text' id='accion".$row['id']."' size='10' onkeypress='auto_accion(".$row['id'].")' ></td><td><img src='img/save.jpg' width='20' height='20' onclick=valida_accion('form1','".$row['id']."',1) style='cursor:pointer;' ></td></tr></table>";
			}else{
				$accion=$row['accion'];
			}
			
			$estado = $row['estado'];
			if ($estado=="1"){$bg_estado="#B74915";$nom_estado="PENDIENTE";}
			if ($estado=="2"){$bg_estado="#D58000";$nom_estado="EN CURSO";}
			if ($estado=="3"){$bg_estado="#232C07";$nom_estado="TERMINADO";}
			if ($estado=="4"){$bg_estado="#62270B";$nom_estado="CANCELADO";}	
			
			if ($row['id_dependencia']!=0){
				$bd3 = new Bd();
				$bd3->sql = "SELECT * FROM ua_dependencias where id='".$row['id_dependencia']."'";
				$bd3->ejecutar();
				$row3 = $bd3->fetch_row();
				$row_count3 = $bd3->row_count();
				if($row_count3=!0){
					$dependencia="<div onClick=cargarContenido('carga_sel_dependencias.php?id=".$row['id']."','dep_".$row['id']."')>".c_en($row3['nombre_corto'])."</div>";
				}else{
					
				}
				$ctexto="#FFF";			
			}else{
				$dependencia="<div onClick=cargarContenido1('carga_sel_dependencias.php?id=".$row['id']."','dep_".$row['id']."')>S/D</div>";
				$ctexto="#999";
			}
														
					
	?>      
		  <tr id='line<?php echo $row['id'] ?>' onMouseOver="on_ove('line<?php echo $row['id'] ?>')" onMouseOut="on_out('line<?php echo $row['id'] ?>')" class="cont_tabla" style="border:solid #000 1px;">
			<td style="text-align:right;border:solid #000 1px;"><?php echo $row['id'] ?>&nbsp;</td>
			<td style="border:solid #000 1px;"  id="dep_<?php echo $row['id'] ?>"><?php echo c_sp($dependencia) ?></td>
			<td style="border:solid #000 1px;"><?php echo date("d-m-Y",$fecha_bd) ?></td>
			<td style="border:solid #000 1px;"><?php echo date("H:i",$fecha_bd) ?></td>
			<td style="border:solid #000 1px; text-align:left;">&nbsp;<?php echo c_sp($row['usuario']) ?></td>
			<td style="border:solid #000 1px; text-align:left;">&nbsp;<?php echo c_sp($row['id_area']) ?></td>
			<td style="border:solid #000 1px; text-align:left;">&nbsp;<?php echo c_sp($row['incidente']) ?></td>
			<td style="border:solid #000 1px;"><?php echo c_en($tipo) ?></td>
			<td style="border:solid #000 1px;"><?php echo c_sp($impacto) ?></td>
			<td style="border:solid #000 1px;"><?php echo ($encargado) ?></td>
			<td style="border:solid #000 1px; text-align:left;">&nbsp;<?php echo $causa ?></td>
			<td style="border:solid #000 1px; text-align:left;">&nbsp;<?php echo $accion ?></td>
			<td style="border:solid #000 1px; cursor:pointer" bgcolor="<?php echo $bg_estado?>" onclick="cargarContenido1('modifica_estado.php?id=<?php echo $row['id']?>&estado=<?php echo $row['estado']?>','agregar'); alert('ESTADO MODIFICADO');cargarContenido1('incidentes.php?id=0','contenido');carga_up();"><span style="color:#FFF"><?php echo $nom_estado ?></span></td>
			<td style="border:solid #000 1px;">&nbsp;</td>
		  </tr>
<?php }
} 
?>
	</table></td>
    <td width="42" bgcolor="#393532">&nbsp;</td>
  </tr>
  <tr>
    <td height="1" colspan="2" bgcolor="#5f5f5f"></td>
  </tr>
</table>
</form>
</body>
</html>
=======
<?php
date_default_timezone_set("America/Santiago");
include_once('config/Bd.php');
include_once('phpfunc/func.php');

$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);
$fecha1 = strtotime('+1 day',strtotime($fecha_act));
$fecha11 = date("Y-m-d",$fecha1);

$filtro = $_GET['filtro'];
if ($filtro=='0'){$query="";}
if ($filtro!='0'){$query=" where estado='$filtro'";}

	$bd = new Bd();
	$bd->sql = "SELECT * FROM ua_incidentes ".$query." order by fecha DESC";
	//echo "SELECT * FROM ua_incidentes ".$query." order by fecha DESC";
	$bd->ejecutar();
	$row_count = $bd->row_count();

$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>:: UAUTONOMA ::</title>
<link href="css/us.css" rel="stylesheet" type="text/css">
</head>

<body>
<form name="form1" id="form1" method="post" action=""> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="100" bgcolor="#393532"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablas">
      <tr class="tit_tabla">
        <td height="3" colspan="14" nowrap="nowrap" bgcolor="#393532" style="text-align:left; color:#FFF">&nbsp;</td>
      </tr>
      <tr class="tit_tabla">
        <td width="30">ID</td>
        <td width="50">DEP.</td>
        <td width="80">FECHA</td>
        <td width="50">HORA</td>
        <td width="150">USUARIO</td>
        <td width="120">AREA</td>
        <td>INCIDENTE</td>
        <td width="80">TIPO</td>
        <td width="80">IMPACTO</td>
        <td width="100" bgcolor="#62270B">ENCARGADO</td>
        <td>CAUSA</td>
        <td>ACCIÓN</td>
        <td width="100">ESTADO</td>
        <td width="15">&nbsp;</td>
      </tr>
	        
      <div id='agregar'>
      <tr>
        <td bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_fecha" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_fecha" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_hora" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_usuario" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_area" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_incidente" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_tipo" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_impacto" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_encargado" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_causa" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_accion" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_guardar" bgcolor="#454344" style="color:#FFF;border:solid #393532 1px;"></td>
        <td id="con_guardar" bgcolor="#454344" style="color:#FFF;border:solid #393532 1px;"></td>
      </tr>
      </div>
      
<?php if ($row_count==0){ ?>       
      <tr class="cont_tabla">
        <td colspan="14" style="text-align: center; border:solid #C1C1C1 1px;" ><br>
          NO EXISTEN INCIDENTES REPORTADOS<br><br>
          </td>
        </tr>
<?php  }else{  
		while($row = $bd->fetch_row()){
			$fecha_bd = strtotime($row['fecha']);
			$hora_bd = strtotime($row['fecha']);
			
			$bd1 = new Bd();
			$bd1->sql = "SELECT * FROM ua_tipo_incidente where id='".$row['tipo']."'";
			$bd1->ejecutar();
			$row1=$bd1->fetch_row();
			$row_count1 = $bd1->row_count();
			if($row_count1=!0){$tipo=$row1['nombre'];}else{$tipo="INDEFINIDO";}
			
			$bd1 = new Bd();
			$bd1->sql = "SELECT * FROM ua_impactos where id='".$row['impacto']."'";
			$bd1->ejecutar();
			$row1=$bd1->fetch_row();
			$row_count1 = $bd1->row_count();
			if($row_count1=!0){$impacto=$row1['nombre'];}else{$impacto="INDEFINIDO";}
			
			if ($row['encargado']==0){$encargado="";}else{$encargado=$row['encargado'];}
			if ($encargado!=0){
				$bd1 = new Bd();
				$bd1->sql = "SELECT * FROM ua_usuarios where id='".$row['encargado']."'";
				$bd1->ejecutar();
				$row1=$bd1->fetch_row();
				$row_count1 = $bd1->row_count();
				if($row_count1=!0){$encargado=$row1['nombre'];}else{$encargado="INDEFINIDO";}		
			}else{
				
				$bd2 = new Bd();
				$bd2->sql = "SELECT * FROM ua_usuarios where id_area=2 order by nombre";
				$bd2->ejecutar();
				$encargado = $encargado."<table width='100'><tr><td><select name='encargado".$row['id']."' id='encargado".$row['id']."'>"; 
				$encargado = $encargado."<option selected='selected' value='0'>ENCARGADO</option>";
					while($row2 = $bd2->fetch_row()){
						$encargado = $encargado."<option value='".$row2['id']."'>".($row2['nombre'])."</option>";
					}
				$encargado = $encargado."</select></td><td><img src='img/save.jpg' width='20' height='20' onclick=valida_encargado('form1','".$row['id']."','2') style='cursor:pointer;' ></td></tr></table>"; 		
			}
			
			if ($row['causa']==""){
				$causa="";
				$causa="<table><tr><td><input name='causa".$row['id']."' type='text' id='causa".$row['id']."' size='10' onkeypress='auto_causa(".$row['id'].")' ></td><td><img src='img/save.jpg' width='20' height='20' onclick=valida_causa('form1','".$row['id']."',1) style='cursor:pointer;' ></td></tr></table>";
			}else{
				$causa=$row['causa'];
			}
	
			if ($row['accion']==""){
				$accion="";
				$accion="<table><tr><td><input name='accion".$row['id']."' type='text' id='accion".$row['id']."' size='10' onkeypress='auto_accion(".$row['id'].")' ></td><td><img src='img/save.jpg' width='20' height='20' onclick=valida_accion('form1','".$row['id']."',1) style='cursor:pointer;' ></td></tr></table>";
			}else{
				$accion=$row['accion'];
			}
			
			$estado = $row['estado'];
			if ($estado=="1"){$bg_estado="#B74915";$nom_estado="PENDIENTE";}
			if ($estado=="2"){$bg_estado="#D58000";$nom_estado="EN CURSO";}
			if ($estado=="3"){$bg_estado="#232C07";$nom_estado="TERMINADO";}
			if ($estado=="4"){$bg_estado="#62270B";$nom_estado="CANCELADO";}	
			
			if ($row['id_dependencia']!=0){
				$bd3 = new Bd();
				$bd3->sql = "SELECT * FROM ua_dependencias where id='".$row['id_dependencia']."'";
				$bd3->ejecutar();
				$row3 = $bd3->fetch_row();
				$row_count3 = $bd3->row_count();
				if($row_count3=!0){
					$dependencia="<div onClick=cargarContenido('carga_sel_dependencias.php?id=".$row['id']."','dep_".$row['id']."')>".c_en($row3['nombre_corto'])."</div>";
				}else{
					
				}
				$ctexto="#FFF";			
			}else{
				$dependencia="<div onClick=cargarContenido1('carga_sel_dependencias.php?id=".$row['id']."','dep_".$row['id']."')>S/D</div>";
				$ctexto="#999";
			}
														
					
	?>      
		  <tr id='line<?php echo $row['id'] ?>' onMouseOver="on_ove('line<?php echo $row['id'] ?>')" onMouseOut="on_out('line<?php echo $row['id'] ?>')" class="cont_tabla" style="border:solid #000 1px;">
			<td style="text-align:right;border:solid #000 1px;"><?php echo $row['id'] ?>&nbsp;</td>
			<td style="border:solid #000 1px;"  id="dep_<?php echo $row['id'] ?>"><?php echo c_sp($dependencia) ?></td>
			<td style="border:solid #000 1px;"><?php echo date("d-m-Y",$fecha_bd) ?></td>
			<td style="border:solid #000 1px;"><?php echo date("H:i",$fecha_bd) ?></td>
			<td style="border:solid #000 1px; text-align:left;">&nbsp;<?php echo c_sp($row['usuario']) ?></td>
			<td style="border:solid #000 1px; text-align:left;">&nbsp;<?php echo c_sp($row['id_area']) ?></td>
			<td style="border:solid #000 1px; text-align:left;">&nbsp;<?php echo c_sp($row['incidente']) ?></td>
			<td style="border:solid #000 1px;"><?php echo c_en($tipo) ?></td>
			<td style="border:solid #000 1px;"><?php echo c_sp($impacto) ?></td>
			<td style="border:solid #000 1px;"><?php echo ($encargado) ?></td>
			<td style="border:solid #000 1px; text-align:left;">&nbsp;<?php echo $causa ?></td>
			<td style="border:solid #000 1px; text-align:left;">&nbsp;<?php echo $accion ?></td>
			<td style="border:solid #000 1px; cursor:pointer" bgcolor="<?php echo $bg_estado?>" onclick="cargarContenido1('modifica_estado.php?id=<?php echo $row['id']?>&estado=<?php echo $row['estado']?>','agregar'); alert('ESTADO MODIFICADO');cargarContenido1('incidentes.php?id=0','contenido');carga_up();"><span style="color:#FFF"><?php echo $nom_estado ?></span></td>
			<td style="border:solid #000 1px;">&nbsp;</td>
		  </tr>
<?php }
} 
?>
	</table></td>
    <td width="42" bgcolor="#393532">&nbsp;</td>
  </tr>
  <tr>
    <td height="1" colspan="2" bgcolor="#5f5f5f"></td>
  </tr>
</table>
</form>
</body>
</html>
>>>>>>> origin/master
