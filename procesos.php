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

	$bd = new Bd();
	$bd->conectar();
	$bd->sql = "SELECT * FROM ua_usuarios order by nombre";
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
        <td height="3" colspan="10" nowrap="nowrap" bgcolor="#393532" style="text-align:left; color:#FFF">&nbsp;</td>
      </tr>
      <tr class="tit_tabla">
        <td colspan="10" nowrap="nowrap" bgcolor="#393532" style="text-align:left; color:#FFF"><table width="100" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td bgcolor="#597014" style="cursor:pointer" onClick="muestra_a_incidente('<?php echo cambiarFormatoFecha($fecha_act) ?>','<?php echo $hora_act ?>'); cargarContenido('carga_sel_tipos.php','con_tipo'); cargarContenido('carga_sel_impactos.php','con_impacto'); cargarContenido('carga_sel_encargados.php','con_encargado');" >AGREGAR</td>
          </tr>
        </table></td>
        </tr>
      <tr class="tit_tabla">
        <td width="30">ID</td>
        <td>Campus</td>
        <td>Area</td>
        <td>Apellido Materno</td>
        <td>Campus</td>
        <td>Area</td>
        <td>Carrera</td>
        <td>Cargo</td>
        <td width="100" bgcolor="#62270B">ANEXO</td>
        <td>ESTADO</td>
      </tr>
	        
      <div id='agregar'>
      <tr>
        <td bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_fecha" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_hora" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_usuario" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_area" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_incidente" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_tipo" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_impacto" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_encargado" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_guardar" bgcolor="#454344" style="color:#FFF;border:solid #393532 1px;"></td>
      </tr>
      </div>
      
<?php if ($row_count==0){ ?>       
      <tr class="cont_tabla">
        <td colspan="10" style="text-align: center; border:solid #C1C1C1 1px;" ><br>
          NO EXISTEN USUARIOS<br><br>
          </td>
        </tr>
<?php  }else{  
		while($row = $bd->fetch_row()){
		
			$estado = $row['estado'];
			if ($estado=="1"){$bg_estado="#232C07";$nom_estado="ACTIVO";}
			if ($estado=="0"){$bg_estado="#62270B";$nom_estado="INACTIVO";}	
			
			$bd1 = new Bd();
			$bd1->sql = "SELECT * FROM ua_sedes where id='".$row['id_sede']."'";
			//echo "SELECT * FROM ua_incidentes ".$query." order by fecha DESC";
			$bd1->ejecutar();
			$row_count1 = $bd1->row_count();
			$row1 = $bd1->fetch_row();
			if($row_count1==0){$campus = "SIN DEFINIR";}else{$campus = $row1['nombre'];}					

			$bd1 = new Bd();
			$bd1->sql = "SELECT * FROM ua_areas where id='".$row['id_area']."'";
			$bd1->ejecutar();
			$row_count1 = $bd1->row_count();
			$row1 = $bd1->fetch_row();
			if($row_count1==0){$area = "SIN DEFINIR";}else{$area = $row1['nombre'];}
			
			$bd1 = new Bd();
			$bd1->sql = "SELECT * FROM ua_carreras where id='".$row['id_carrera']."'";
			$bd1->ejecutar();
			$row_count1 = $bd1->row_count();
			$row1 = $bd1->fetch_row();
			if($row_count1==0){$carrera = "SIN DEFINIR";}else{$carrera = $row1['nombre'];}					

			$bd1 = new Bd();
			$bd1->sql = "SELECT * FROM ua_cargos where id='".$row['id_cargo']."'";
			$bd1->ejecutar();
			$row_count1 = $bd1->row_count();
			$row1 = $bd1->fetch_row();
			if($row_count1==0){$cargo = "SIN DEFINIR";}else{$cargo = $row1['nombre'];}					
								
					
	?>      
		  <tr id='line<?php echo $row['id'] ?>' onMouseOver="on_ove('line<?php echo $row['id'] ?>')" onMouseOut="on_out('line<?php echo $row['id'] ?>')" class="cont_tabla" style="border:solid #000 1px;">
			<td style="text-align:right;border:solid #000 1px;"><?php echo $row['id'] ?>&nbsp;</td>
			<td style="border:solid #000 1px;"><?php echo c_en($row['nombre']) ?></td>
			<td style="border:solid #000 1px;"><?php echo c_en($row['apellidop']) ?></td>
			<td style="border:solid #000 1px;"><?php echo c_en($row['apellidom']) ?></td>
			<td style="border:solid #000 1px;"><?php echo c_sp($campus) ?></td>
			<td style="border:solid #000 1px;"><?php echo c_en($area) ?></td>
			<td style="border:solid #000 1px;"><?php echo c_en($carrera) ?></td>
			<td style="border:solid #000 1px;"><?php echo c_en($cargo) ?></td>
			<td style="border:solid #000 1px;"><?php echo c_sp($row['anexo']) ?></td>
			<td style="border:solid #000 1px; cursor:pointer" bgcolor="<?php echo $bg_estado?>" onclick="cargarContenido1('modifica_estado.php?id=<?php echo $row['id']?>&estado=<?php echo $row['estado']?>','agregar'); alert('ESTADO MODIFICADO');cargarContenido1('incidentes.php?id=0','contenido');carga_up();"><span style="color:#FFF"><?php echo $nom_estado ?></span></td>
		  </tr>
<?php }
}
?>
	<tr><td colspan="10" bgcolor="#1C1C1C">&nbsp;</td></tr>
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

	$bd = new Bd();
	$bd->conectar();
	$bd->sql = "SELECT * FROM ua_usuarios order by nombre";
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
        <td height="3" colspan="10" nowrap="nowrap" bgcolor="#393532" style="text-align:left; color:#FFF">&nbsp;</td>
      </tr>
      <tr class="tit_tabla">
        <td colspan="10" nowrap="nowrap" bgcolor="#393532" style="text-align:left; color:#FFF"><table width="100" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td bgcolor="#597014" style="cursor:pointer" onClick="muestra_a_incidente('<?php echo cambiarFormatoFecha($fecha_act) ?>','<?php echo $hora_act ?>'); cargarContenido('carga_sel_tipos.php','con_tipo'); cargarContenido('carga_sel_impactos.php','con_impacto'); cargarContenido('carga_sel_encargados.php','con_encargado');" >AGREGAR</td>
          </tr>
        </table></td>
        </tr>
      <tr class="tit_tabla">
        <td width="30">ID</td>
        <td>Campus</td>
        <td>Area</td>
        <td>Apellido Materno</td>
        <td>Campus</td>
        <td>Area</td>
        <td>Carrera</td>
        <td>Cargo</td>
        <td width="100" bgcolor="#62270B">ANEXO</td>
        <td>ESTADO</td>
      </tr>
	        
      <div id='agregar'>
      <tr>
        <td bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_fecha" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_hora" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_usuario" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_area" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_incidente" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_tipo" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_impacto" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_encargado" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_guardar" bgcolor="#454344" style="color:#FFF;border:solid #393532 1px;"></td>
      </tr>
      </div>
      
<?php if ($row_count==0){ ?>       
      <tr class="cont_tabla">
        <td colspan="10" style="text-align: center; border:solid #C1C1C1 1px;" ><br>
          NO EXISTEN USUARIOS<br><br>
          </td>
        </tr>
<?php  }else{  
		while($row = $bd->fetch_row()){
		
			$estado = $row['estado'];
			if ($estado=="1"){$bg_estado="#232C07";$nom_estado="ACTIVO";}
			if ($estado=="0"){$bg_estado="#62270B";$nom_estado="INACTIVO";}	
			
			$bd1 = new Bd();
			$bd1->sql = "SELECT * FROM ua_sedes where id='".$row['id_sede']."'";
			//echo "SELECT * FROM ua_incidentes ".$query." order by fecha DESC";
			$bd1->ejecutar();
			$row_count1 = $bd1->row_count();
			$row1 = $bd1->fetch_row();
			if($row_count1==0){$campus = "SIN DEFINIR";}else{$campus = $row1['nombre'];}					

			$bd1 = new Bd();
			$bd1->sql = "SELECT * FROM ua_areas where id='".$row['id_area']."'";
			$bd1->ejecutar();
			$row_count1 = $bd1->row_count();
			$row1 = $bd1->fetch_row();
			if($row_count1==0){$area = "SIN DEFINIR";}else{$area = $row1['nombre'];}
			
			$bd1 = new Bd();
			$bd1->sql = "SELECT * FROM ua_carreras where id='".$row['id_carrera']."'";
			$bd1->ejecutar();
			$row_count1 = $bd1->row_count();
			$row1 = $bd1->fetch_row();
			if($row_count1==0){$carrera = "SIN DEFINIR";}else{$carrera = $row1['nombre'];}					

			$bd1 = new Bd();
			$bd1->sql = "SELECT * FROM ua_cargos where id='".$row['id_cargo']."'";
			$bd1->ejecutar();
			$row_count1 = $bd1->row_count();
			$row1 = $bd1->fetch_row();
			if($row_count1==0){$cargo = "SIN DEFINIR";}else{$cargo = $row1['nombre'];}					
								
					
	?>      
		  <tr id='line<?php echo $row['id'] ?>' onMouseOver="on_ove('line<?php echo $row['id'] ?>')" onMouseOut="on_out('line<?php echo $row['id'] ?>')" class="cont_tabla" style="border:solid #000 1px;">
			<td style="text-align:right;border:solid #000 1px;"><?php echo $row['id'] ?>&nbsp;</td>
			<td style="border:solid #000 1px;"><?php echo c_en($row['nombre']) ?></td>
			<td style="border:solid #000 1px;"><?php echo c_en($row['apellidop']) ?></td>
			<td style="border:solid #000 1px;"><?php echo c_en($row['apellidom']) ?></td>
			<td style="border:solid #000 1px;"><?php echo c_sp($campus) ?></td>
			<td style="border:solid #000 1px;"><?php echo c_en($area) ?></td>
			<td style="border:solid #000 1px;"><?php echo c_en($carrera) ?></td>
			<td style="border:solid #000 1px;"><?php echo c_en($cargo) ?></td>
			<td style="border:solid #000 1px;"><?php echo c_sp($row['anexo']) ?></td>
			<td style="border:solid #000 1px; cursor:pointer" bgcolor="<?php echo $bg_estado?>" onclick="cargarContenido1('modifica_estado.php?id=<?php echo $row['id']?>&estado=<?php echo $row['estado']?>','agregar'); alert('ESTADO MODIFICADO');cargarContenido1('incidentes.php?id=0','contenido');carga_up();"><span style="color:#FFF"><?php echo $nom_estado ?></span></td>
		  </tr>
<?php }
}
?>
	<tr><td colspan="10" bgcolor="#1C1C1C">&nbsp;</td></tr>
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
