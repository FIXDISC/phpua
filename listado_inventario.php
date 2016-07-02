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

function rep($obj){
	$obj1 = str_replace(" ","~",$obj);
	return $obj1;
}

$comp = $_GET['comp'];
$campo = $_GET['campo'];
$txt = $_GET['txt'];
$comp1 = $_GET['comp1'];
$campo1 = $_GET['campo1'];
$txt1 = $_GET['txt1'];

			$tipo = $_GET['tipo'];
			$area = $_GET['area'];
			$zona = $_GET['zona'];
			$item = $_GET['item'];
			$usuario = $_GET['usuario'];
			$cargo = $_GET['cargo']; 
			$activo = $_GET['activo'];
			$serie = $_GET['serie'];
			
			if ($txt!=""){			
				if ($comp=="="){$q9 = " and i.".$campo."='".$txt."'";}
				if ($comp=="%"){$q9 = " and i.".$campo." like '%".$txt."%'";}
			}
			if ($txt1!=""){			
				if ($comp1=="="){$q10 = " and i.".$campo1."='".$txt1."'";}
				if ($comp1=="%"){$q10 = " and i.".$campo1." like '%".$txt1."%'";}
			}				
			if ($tipo!="" && $tipo!=0){$q1 = " and u.tipo='".$tipo."'";}
			if ($area!="" && $area!=0){$q2 = " and i.area='".$area."'";}
			if ($zona!="" && $zona!=0){$q3 = " and i.zona='".$zona."'";}
			if ($item!="" && $item!=0){$q4 = " and i.item='".$item."'";}
			if ($usuario!=""){$q5 = " and ((u.nombre LIKE '%".$usuario."%') or (u.apellidop LIKE '%".$usuario."%') or (u.apellidom LIKE '%".$usuario."%'))";}
			if ($cargo!=""){$q6 = " and c.nombre like '%".$cargo."%'";}
			if ($activo!=""){$q7 = " and i.activo_fijo like '%".$activo."%'";}
			if ($serie!=""){$q8 = " and i.serie like '%".$serie."%'";}
			
			if ($usuario!="" || $cargo!="" || $tipo!=0){
				$query = "SELECT i.*,u.id idu, c.id idc FROM ua_inventario i, ua_usuarios u, ua_cargos c where i.usuario=u.id and u.cargo=c.id ".$q1.$q2.$q3.$q4.$q5.$q6.$q7.$q8.$q9.$q10." order by i.dependencia, u.nombre ASC, i.area ASC, i.zona ASC, i.usuario ASC, i.serie ASC";
			}else{
				$query = "SELECT i.* FROM ua_inventario i where 1=1 ".$q1.$q2.$q3.$q4.$q5.$q6.$q7.$q8.$q9.$q10." order by i.dependencia, i.area ASC, i.zona ASC, i.usuario ASC, i.item ASC, i.serie ASC";	
			}
			
				$bd = new Bd();
				$bd->sql = $query;
				//echo $query;
				$bd->ejecutar();
				$row_count = $bd->row_count();

$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);
?>
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
        <td colspan="22" nowrap="nowrap" bgcolor="#393532" style="text-align:left; color:#FFF"><table width="100" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td bgcolor="#597014" style="cursor:pointer" onClick="muestra_a_inventario('<?php echo cambiarFormatoFecha($fecha_act) ?>','<?php echo $hora_act ?>'); cargarContenido('carga_sel_dependencias.php','con_dep'); cargarContenido('admin/carga_sel_areas.php','con_area'); cargarContenido('admin/carga_sel_zonas.php','con_zona'); cargarContenido('carga_sel_usuarios.php','con_usuario');cargarContenido('carga_sel_items.php','con_item');" >AGREGAR</td>
            </tr>
          </table></td>
      </tr>
      <tr class="tit_tabla">
        <td width="30">ID</td>
        <td width="50">DEP.</td>
        <td width="80">FECHA</td>
        <td width="50">HORA</td>
        <td width="60">AREA</td>
        <td width="70">ZONA</td>
        <td>USUARIO</td>
        <td>CARGO</td>
        <td width="80">ITEM</td>
        <td width="85">IP</td>
        <td>NOMBRE</td>
        <td width="80">MARCA</td>
        <td>MODELO</td>
        <td>PROC.</td>
        <td width="70">HDD</td>
        <td width="70">RAM</td>
        <td width="50">SO</td>
        <td width="150">SERIE</td>
        <td width="80">A. FIJO</td>
        <td width="50">HORAS</td>
        <td width="100">ESTADO</td>
        <td width="15">&nbsp;</td>
      </tr>
	        
      <div id='agregar'>
      <tr>
        <td bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_dep" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_fecha" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_hora" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_area" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_zona" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_usuario" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_cargo" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_item" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_ip" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_nombre" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_marca" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_modelo" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_procesa" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_hdd" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_ram" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_so" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_serie" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_activo" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_horas" bgcolor="#454344" style="color:#FFF;border:solid #393532 1px;"></td>
        <td id="con_estado" bgcolor="#454344" style="color:#FFF;border:solid #393532 1px;"></td>
        <td id="con_guardar" bgcolor="#454344" style="color:#FFF;border:solid #393532 1px;"></td>
      </tr>
      </div>
      
<?php if ($row_count==0){ ?>       
      <tr class="cont_tabla">
        <td colspan="23" style="text-align: center; border:solid #C1C1C1 1px;" ><br>
          NO EXISTEN ITEMS EN INVENTARIO<br><br>
          </td>
        </tr>
<?php  }else{  
	
	$n_item = 1;

	if (ob_get_level() == 0) ob_start();
		while($row = $bd->fetch_row()){
			$fecha_bd = strtotime($row['fecha_ing']);
			$hora_bd = strtotime($row['fecha_ing']);
			
			
			$bd1 = new Bd();
			$bd1->sql = "SELECT * FROM ua_dependencias where id='".$row['dependencia']."'";
			$bd1->ejecutar();
			$row1 = $bd1->fetch_row();
			$row_count1 = $bd1->row_count();
			//if($row_count1=!0){$dependencia=$row1['nombre_corto'];$detexto="#FFF";}else{$dependencia="INDEFINIDO";$detexto="#999";}
			if ($row['dependencia']!=0 && $row['dependencia']!=""){
				$dependencia = "<div onClick=cargarContenido1('carga_sel_dependencia.php?id=".$row['id']."&dependencia=".rep(trim($row['dependencia']))."','dep_".$row['id']."')>".c_sp($row1['nombre_corto'])."</div>";
				$detexto="#FFF";
			}else{
				$dependencia = "<div onClick=cargarContenido1('carga_sel_dependencia.php?id=".$row['id']."&dependencia=".rep(trim($row['dependencia']))."','dep_".$row['id']."')>S/D</div>";
				$detexto="#999";		
			}			


			$bd1 = new Bd();
			$bd1->conectar();
			$bd1->sql = "SELECT * FROM ua_usuarios where id='".$row['usuario']."'";
			//echo "SELECT * FROM ua_usuarios where id='".$row['usuario']."'";
			$bd1->ejecutar();
			$row1 = $bd1->fetch_row();
			$row_count1 = $bd1->row_count();
			$cargo="S/D";$ctexto="#999";
			if($row_count1!=0){
				$nombre="<div onClick=cargarContenido1('carga_sel_usuarios.php?id=".$row['id']."&usuario=".$row1['id']."','usu_".$row['id']."')>".$row1['nombre'].' '.$row1['apellidop']."</div>";$utexto="#FFF";
					$bd2 = new Bd();
					$bd2->conectar();
					$bd2->sql = "SELECT * FROM ua_cargos where id='".$row1['cargo']."'";
					//echo "SELECT * FROM ua_cargos where id='".$row1['cargo']."'";
					$bd2->ejecutar();
					$row2 = $bd2->fetch_row();
					$row_count2 = $bd2->row_count();
					if($row_count2!=0){$cargo=$row2['nombre'];$ctexto="#FFF";}		
			}else{
				$nombre="<div onClick=cargarContenido1('carga_sel_usuarios.php?id=".$row['id']."&usuario=".$row1['id']."','usu_".$row['id']."')>S/D</div>";$utexto="#999";}
				
							
			if ($row['area']!=0){
				$bd1 = new Bd();
				$bd1->sql = "SELECT * FROM ua_areas where id=".$row['area'];
				//echo "SELECT * FROM ua_areas where id='".$row['area']."'<br>";
				$bd1->ejecutar();
				$row1 = $bd1->fetch_row();
				$row_count1 = $bd1->row_count();
				$atexto="#FFF";									
				if($row_count1==0){
					//$area="<div onClick=cargarContenido1('carga_sel_areas.php?id=".$row['id']."&area=0','are_".$row['id']."')>S/D</div>";
					$area_id= 0;
					$area= "<div onClick=cargarContenido1('carga_sel_areas.php?id=".$row['id']."&area=".$row1['id']."','are_".$row['id']."')>S/D</div>";
					$atexto="#999";
				}else{
					$area= "<div onClick=cargarContenido1('carga_sel_areas.php?id=".$row['id']."&area=".$row1['id']."','are_".$row['id']."')>".c_en($row1['nombre_corto'])."</div>";
					$area_l= c_en($row1['nombre']);
					$area_id= $row1['id'];
					$atexto="#FFF";
				}
		
			}else{
				$area="<div onClick=cargarContenido1('carga_sel_areas.php?id=".$row['id']."&area=0','are_".$row['id']."')>S/D</div>";
				$atexto="#999";
			}
			
			
			if ($row['zona']!=0){
				$bd1 = new Bd();
				$bd1->sql = "SELECT * FROM ua_zonas where id='".$row['zona']."'";
				$bd1->ejecutar();
				$row1 = $bd1->fetch_row();
				$row_count1 = $bd1->row_count();
				if($row_count1=!0){
					$zona= "<div onClick=cargarContenido1('carga_sel_zonas.php?id=".$row['id']."&zona=".$row1['id']."','zon_".$row['id']."')>".$row1['nombre_corto']."</div>";
					$zona_l= ($row1['nombre']);
					$zona_id= $row1['id'];					
				}else{
					$zona="<div onClick=cargarContenido1('carga_sel_zonas.php?id=".$row['id']."&zona=0','zon_".$row['id']."')>S/D</div>";
					$zona_id= $row1['id'];
					//$zona= "S/D";					
				}
				$ztexto="#FFF";			
			}else{
				$zona="<div onClick=cargarContenido1('carga_sel_zonas.php?id=".$row['id']."&zona=0','zon_".$row['id']."')>S/D</div>";
				$ztexto="#999";
			}
			
			if ($row['item']!=0){
				$bd1 = new Bd();
				$bd1->sql = "SELECT * FROM ua_items where id='".$row['item']."'";
				$bd1->ejecutar();
				$row1 = $bd1->fetch_row();
				$row_count1 = $bd1->row_count();
				if($row_count1=!0){
					$item= "<div onClick=cargarContenido1('carga_sel_items.php?id=".$row['id']."&item=".$row1['id']."','ite_".$row['id']."')>".c_en($row1['nombre_corto'])."</div>";
					$item_id= $row1['id'];
					$itexto="#FFF";
				}else{
					$item= "<div onClick=cargarContenido1('carga_sel_items.php?id=".$row['id']."&item=0','ite_".$row['id']."')>S/D</div>";
					$itexto="#999";
				}
							
			}else{
				$item="<div onClick=cargarContenido1('carga_sel_items.php?id=".$row['id']."&item=0','ite_".$row['id']."')>S/D</div>";
				$itexto="#999";
			}

			if (trim($row['ip'])!="0" && trim($row['ip'])!=""){
				$ipe = "<div onClick=cargarContenido1('carga_sel_ip.php?id=".$row['id']."&ip=".rep(trim($row['ip']))."','ipe_".$row['id']."')>".c_sp($row['ip'])."</div>";
				$iptexto="#FFF";
			}else{
				$ipe = "<div onClick=cargarContenido1('carga_sel_ip.php?id=".$row['id']."&ip=".rep(trim($row['ip']))."','ipe_".$row['id']."')>S/D</div>";
				$iptexto="#999";		
			}
			
			if (trim($row['nombre'])!="0" && trim($row['nombre'])!=""){
				$nombrei = "<div onClick=cargarContenido1('carga_sel_nombre.php?id=".$row['id']."&nombre=".rep(trim($row['nombre']))."','nom_".$row['id']."')>".c_sp($row['nombre'])."</div>";
				$ntexto="#FFF";
			}else{
				$nombrei = "<div onClick=cargarContenido1('carga_sel_nombre.php?id=".$row['id']."&nombre=".rep(trim($row['nombre']))."','nom_".$row['id']."')>S/D</div>";
				$ntexto="#999";		
			}

			if ($row['marca']!="0" && $row['marca']!=""){
				$marca = "<div onClick=cargarContenido1('carga_sel_marcas.php?id=".$row['id']."&marca=".rep($row['marca'])."','mar_".$row['id']."')>".c_sp($row['marca'])."</div>";
				$mtexto="#FFF";
			}else{
				$marca = "<div onClick=cargarContenido1('carga_sel_marcas.php?id=".$row['id']."&marca=".rep($row['marca'])."','mar_".$row['id']."')>S/D</div>";
				$mtexto="#999";		
			}
			
			if ($row['modelo']!="0" && $row['modelo']!=""){
				$modelo = "<div onClick=cargarContenido1('carga_sel_modelos.php?id=".$row['id']."&modelo=".rep($row['modelo'])."','mod_".$row['id']."')>".($row['modelo'])."</div>";
				$motexto="#FFF";
			}else{
				$modelo = "<div onClick=cargarContenido1('carga_sel_modelos.php?id=".$row['id']."&modelo=".rep($row['modelo'])."','mod_".$row['id']."')>S/D</div>";
				$motexto="#999";		
			}
			
			if ($row['procesador']!="0" && $row['procesador']!=""){
				$procesador = "<div onClick=cargarContenido1('carga_sel_procesadores.php?id=".$row['id']."&procesador=".rep(c_sp($row['procesador']))."','pro_".$row['id']."')>".c_sp($row['procesador'])."</div>";
				$ptexto="#FFF";
			}else{
				$procesador = "<div onClick=cargarContenido1('carga_sel_procesadores.php?id=".$row['id']."&procesador=".rep(c_sp($row['procesador']))."','pro_".$row['id']."')>S/D</div>";
				$ptexto="#999";		
			}						

			if ($row['hdd']!="0" && $row['hdd']!=""){
				$hdd = "<div onClick=cargarContenido1('carga_sel_hdd.php?id=".$row['id']."&hdd=".rep($row['hdd'])."','hdd_".$row['id']."')>".c_sp($row['hdd'])."</div>";
				$htexto="#FFF";
			}else{
				$hdd = "<div onClick=cargarContenido1('carga_sel_hdd.php?id=".$row['id']."&hdd=".rep($row['hdd'])."','hdd_".$row['id']."')>S/D</div>";
				$htexto="#999";		
			}
			
			if ($row['ram']!="0" && $row['ram']!=""){
				$ram = "<div onClick=cargarContenido1('carga_sel_ram.php?id=".$row['id']."&ram=".rep($row['ram'])."','ram_".$row['id']."')>".c_sp($row['ram'])."</div>";
				$rtexto="#FFF";
			}else{
				$ram = "<div onClick=cargarContenido1('carga_sel_ram.php?id=".$row['id']."&ram=".rep($row['ram'])."','ram_".$row['id']."')>S/D</div>";
				$rtexto="#999";		
			}
			
			if ($row['so']!="0" && $row['so']!=""){
				$so = "<div onClick=cargarContenido1('carga_sel_so.php?id=".$row['id']."&so=".rep($row['so'])."','so_".$row['id']."')>".c_sp($row['so'])."</div>";
				$sotexto="#FFF";
			}else{
				$so = "<div onClick=cargarContenido1('carga_sel_so.php?id=".$row['id']."&so=".rep($row['so'])."','so_".$row['id']."')>S/D</div>";
				$sotexto="#999";		
			}	
			
			if ($row['serie']!="0" && $row['serie']!=""){
				$serie = "<div onClick=cargarContenido1('carga_sel_serie.php?id=".$row['id']."&serie=".rep($row['serie'])."','ser_".$row['id']."')>".c_sp($row['serie'])."</div>";
				$stexto="#FFF";
			}else{
				$serie = "<div onClick=cargarContenido1('carga_sel_serie.php?id=".$row['id']."&serie=".rep($row['serie'])."','ser_".$row['id']."')>S/D</div>";
				$stexto="#999";		
			}	
			
			if ($row['activo_fijo']!="0" && $row['activo_fijo']!=""){
				$activo = "<div onClick=cargarContenido1('carga_sel_activo.php?id=".$row['id']."&activo=".rep($row['activo_fijo'])."','act_".$row['id']."')>".c_sp($row['activo_fijo'])."</div>";
				$aftexto="#FFF";
			}else{
				$activo = "<div onClick=cargarContenido1('carga_sel_activo.php?id=".$row['id']."&activo=".rep($row['activo_fijo'])."','act_".$row['id']."')>S/D</div>";
				$aftexto="#999";		
			}
			
			if ($row['horas']!="0" && $row['horas']!=""){
				$horas = "<div onClick=cargarContenido1('carga_sel_horas.php?id=".$row['id']."&horas=".rep($row['horas'])."','hor_".$row['id']."')>".c_sp($row['horas'])."</div>";
				$hotexto="#FFF";
			}else{
				$horas = "<div onClick=cargarContenido1('carga_sel_horas.php?id=".$row['id']."&horas=".rep($row['horas'])."','hor_".$row['id']."')>N/A</div>";
				$hotexto="#999";		
			}												
			
			$estado = $row['estado'];
			if ($estado=="0"){$bg_estado="#203012";$nom_estado="<div onClick=cargarContenido1('carga_sel_estado.php?id=".$row['id']."&estado=".$row['estado']."','est_".$row['id']."')>INGRESADO</div>";}
			if ($estado=="1"){$bg_estado="#597014";$nom_estado="<div onClick=cargarContenido1('carga_sel_estado.php?id=".$row['id']."&estado=".$row['estado']."','est_".$row['id']."')>OPERATIVO</div>";}
			if ($estado=="2"){$bg_estado="#B74915";$nom_estado="<div onClick=cargarContenido1('carga_sel_estado.php?id=".$row['id']."&estado=".$row['estado']."','est_".$row['id']."')>DEFECTUOSO</div>";}
			if ($estado=="3"){$bg_estado="#FFA41A";$nom_estado="<div onClick=cargarContenido1('carga_sel_estado.php?id=".$row['id']."&estado=".$row['estado']."','est_".$row['id']."')>MANTENCIÓN</div>";}
			if ($estado=="4"){$bg_estado="#999";$nom_estado="<div onClick=cargarContenido1('carga_sel_estado.php?id=".$row['id']."&estado=".$row['estado']."','est_".$row['id']."')>OBSOLETO</div>";}			
			if ($estado=="5"){$bg_estado="#D58000";$nom_estado="<div onClick=cargarContenido1('carga_sel_estado.php?id=".$row['id']."&estado=".$row['estado']."','est_".$row['id']."')>RETIRO</div>";}			
			if ($estado=="6"){$bg_estado="#CCC";$nom_estado="<div onClick=cargarContenido1('carga_sel_estado.php?id=".$row['id']."&estado=".$row['estado']."','est_".$row['id']."')>BAJA</div>";}
			if ($estado=="7"){$bg_estado="";$nom_estado="<div onClick=cargarContenido1('carga_sel_estado.php?id=".$row['id']."&estado=".$row['estado']."','est_".$row['id']."')>ROBADO</div>";}						
			
			if ($row['actual']==1){$bg_actual = "#669933";}else{$bg_actual = "";}
	?>      
		  <tr id='line<?php echo $row['id'] ?>' onMouseOver="on_ove('line<?php echo $row['id'] ?>')" onMouseOut="on_out('line<?php echo $row['id'] ?>')" class="cont_tabla" style="border:solid #000 1px;">
			<td style="text-align:right;border:solid #000 1px;"><div width="100%" style="cursor:pointer;" onClick="window.open('listado_logs.php?id=<?php echo $row['id']?>','LOGS','directories=0,titlebar=0,toolbar=0,location=0,status=0,menubar=0,scrollbars=0,resizable=0,width=810,height=600')"><?php echo $n_item  //$row['id'] ?>&nbsp;</div></td>
			<td id="dep_<?php echo $row['id'] ?>" style="border:solid #000 1px;color:<?php echo $detexto ?>;cursor:pointer;"><?php echo c_sp($dependencia) ?></td>
			<td style="border:solid #000 1px;"><?php echo date("d-m-Y",$fecha_bd) ?></td>
			<td style="border:solid #000 1px;"><?php echo date("H:i",$fecha_bd) ?></td>
			<td id="are_<?php echo $row['id'] ?>" style="border:solid #000 1px;text-align:left; color:<?php echo $atexto ?>;cursor:pointer" title="<?php echo c_sp($area_l) ?>"><?php echo c_sp($area)?><input name="area<?php echo $row['id'] ?>" type="hidden" value="<?php echo $area_id ?>"></td>
			<td id="zon_<?php echo $row['id'] ?>" style="border:solid #000 1px;text-align:left; color:<?php echo $ztexto ?>;cursor:pointer" title="<?php echo c_sp($zona_l) ?>"><?php echo ($zona) ?><input name="zona<?php echo $row['id'] ?>" type="hidden" value="<?php echo $zona_id ?>"></td>
			<td id="usu_<?php echo $row['id'] ?>" style="border:solid #000 1px;text-align:left; color:<?php echo $utexto ?>;cursor:pointer" title="<?php echo c_sp($usuario_l) ?>"><?php echo $nombre ?><input name="usuario<?php echo $row['id'] ?>" type="hidden" id="usuario<?php echo $row['id'] ?>" value="<?php echo $usuario_id ?>"></td>
			<td style="border:solid #000 1px; color:<?php echo $utexto ?>; text-align:left"><?php echo $cargo ?></td>
			<td id="ite_<?php echo $row['id'] ?>" style="border:solid #000 1px;text-align:left; color:<?php echo $itexto ?>;cursor:pointer" title="<?php echo $item_l ?>"><?php echo c_sp($item) ?><input name="item<?php echo $row['id'] ?>" type="hidden" id="item<?php echo $row['id'] ?>" value="<?php echo $item_id ?>"></td>
			<td id="ipe_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $iptexto ?>; text-align:left;cursor:pointer;"><?php echo $ipe ?></td>
			<td id="nom_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $ntexto ?>; text-align:left;cursor:pointer;"><?php echo c_en($nombrei) ?></td>
			<td id="mar_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $mtexto ?>; text-align:left;cursor:pointer;"><?php echo $marca ?></td>
			<td id="mod_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $motexto ?>; text-align:left;cursor:pointer;"><?php echo $modelo ?></td>
			<td id="pro_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $ptexto ?>; text-align:left;cursor:pointer;"><?php echo $procesador ?></td>
			<td id="hdd_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $htexto ?>; text-align:center;cursor:pointer;"><?php echo $hdd ?></td>
			<td id="ram_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $rtexto ?>; text-align:center;cursor:pointer;"><?php echo $ram ?></td>
			<td id="so_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $sotexto ?>; text-align:center;cursor:pointer;"><?php echo $so ?></td>
			<td id="ser_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $stexto ?>; text-align:right;cursor:pointer;"><?php echo $serie ?></td>
			<td id="act_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $aftexto ?>; text-align:center"><?php echo $activo ?></td>
			<td id="hor_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $hotexto ?>; text-align:center"><?php echo $horas ?></td>
			<td id="est_<?php echo $row['id'] ?>" style="border:solid #000 1px; background-color:<?php echo $bg_estado ?>; text-align:center"><?php echo $nom_estado ?></td>
			<td id="actual<?php echo $row['id']?>" style="border:solid #000 1px; cursor:pointer; background-color:<?php echo $bg_actual ?>"><img src="img/cancelar.jpg" width="20" height="20" onClick="cargarContenido('elimina_inventario.php?id=<?php echo $row['id']?>','contenido');elimina_inventario();" style="cursor:pointer"></td>
		  </tr>

<?php 
	        ob_flush();
        	flush();
			$n_item = $n_item +1;
}

ob_end_flush();
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

function rep($obj){
	$obj1 = str_replace(" ","~",$obj);
	return $obj1;
}

$comp = $_GET['comp'];
$campo = $_GET['campo'];
$txt = $_GET['txt'];
$comp1 = $_GET['comp1'];
$campo1 = $_GET['campo1'];
$txt1 = $_GET['txt1'];

			$tipo = $_GET['tipo'];
			$area = $_GET['area'];
			$zona = $_GET['zona'];
			$item = $_GET['item'];
			$usuario = $_GET['usuario'];
			$cargo = $_GET['cargo']; 
			$activo = $_GET['activo'];
			$serie = $_GET['serie'];
			
			if ($txt!=""){			
				if ($comp=="="){$q9 = " and i.".$campo."='".$txt."'";}
				if ($comp=="%"){$q9 = " and i.".$campo." like '%".$txt."%'";}
			}
			if ($txt1!=""){			
				if ($comp1=="="){$q10 = " and i.".$campo1."='".$txt1."'";}
				if ($comp1=="%"){$q10 = " and i.".$campo1." like '%".$txt1."%'";}
			}				
			if ($tipo!="" && $tipo!=0){$q1 = " and u.tipo='".$tipo."'";}
			if ($area!="" && $area!=0){$q2 = " and i.area='".$area."'";}
			if ($zona!="" && $zona!=0){$q3 = " and i.zona='".$zona."'";}
			if ($item!="" && $item!=0){$q4 = " and i.item='".$item."'";}
			if ($usuario!=""){$q5 = " and ((u.nombre LIKE '%".$usuario."%') or (u.apellidop LIKE '%".$usuario."%') or (u.apellidom LIKE '%".$usuario."%'))";}
			if ($cargo!=""){$q6 = " and c.nombre like '%".$cargo."%'";}
			if ($activo!=""){$q7 = " and i.activo_fijo like '%".$activo."%'";}
			if ($serie!=""){$q8 = " and i.serie like '%".$serie."%'";}
			
			if ($usuario!="" || $cargo!="" || $tipo!=0){
				$query = "SELECT i.*,u.id idu, c.id idc FROM ua_inventario i, ua_usuarios u, ua_cargos c where i.usuario=u.id and u.cargo=c.id ".$q1.$q2.$q3.$q4.$q5.$q6.$q7.$q8.$q9.$q10." order by i.dependencia, u.nombre ASC, i.area ASC, i.zona ASC, i.usuario ASC, i.serie ASC";
			}else{
				$query = "SELECT i.* FROM ua_inventario i where 1=1 ".$q1.$q2.$q3.$q4.$q5.$q6.$q7.$q8.$q9.$q10." order by i.dependencia, i.area ASC, i.zona ASC, i.usuario ASC, i.item ASC, i.serie ASC";	
			}
			
				$bd = new Bd();
				$bd->sql = $query;
				//echo $query;
				$bd->ejecutar();
				$row_count = $bd->row_count();

$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);
?>
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
        <td colspan="22" nowrap="nowrap" bgcolor="#393532" style="text-align:left; color:#FFF"><table width="100" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td bgcolor="#597014" style="cursor:pointer" onClick="muestra_a_inventario('<?php echo cambiarFormatoFecha($fecha_act) ?>','<?php echo $hora_act ?>'); cargarContenido('carga_sel_dependencias.php','con_dep'); cargarContenido('admin/carga_sel_areas.php','con_area'); cargarContenido('admin/carga_sel_zonas.php','con_zona'); cargarContenido('carga_sel_usuarios.php','con_usuario');cargarContenido('carga_sel_items.php','con_item');" >AGREGAR</td>
            </tr>
          </table></td>
      </tr>
      <tr class="tit_tabla">
        <td width="30">ID</td>
        <td width="50">DEP.</td>
        <td width="80">FECHA</td>
        <td width="50">HORA</td>
        <td width="60">AREA</td>
        <td width="70">ZONA</td>
        <td>USUARIO</td>
        <td>CARGO</td>
        <td width="80">ITEM</td>
        <td width="85">IP</td>
        <td>NOMBRE</td>
        <td width="80">MARCA</td>
        <td>MODELO</td>
        <td>PROC.</td>
        <td width="70">HDD</td>
        <td width="70">RAM</td>
        <td width="50">SO</td>
        <td width="150">SERIE</td>
        <td width="80">A. FIJO</td>
        <td width="50">HORAS</td>
        <td width="100">ESTADO</td>
        <td width="15">&nbsp;</td>
      </tr>
	        
      <div id='agregar'>
      <tr>
        <td bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_dep" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_fecha" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_hora" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_area" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_zona" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_usuario" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_cargo" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_item" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_ip" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_nombre" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_marca" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_modelo" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_procesa" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_hdd" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_ram" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_so" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_serie" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_activo" bgcolor="#454344" style="border:solid #393532 1px;"></td>
        <td id="con_horas" bgcolor="#454344" style="color:#FFF;border:solid #393532 1px;"></td>
        <td id="con_estado" bgcolor="#454344" style="color:#FFF;border:solid #393532 1px;"></td>
        <td id="con_guardar" bgcolor="#454344" style="color:#FFF;border:solid #393532 1px;"></td>
      </tr>
      </div>
      
<?php if ($row_count==0){ ?>       
      <tr class="cont_tabla">
        <td colspan="23" style="text-align: center; border:solid #C1C1C1 1px;" ><br>
          NO EXISTEN ITEMS EN INVENTARIO<br><br>
          </td>
        </tr>
<?php  }else{  
	
	$n_item = 1;

	if (ob_get_level() == 0) ob_start();
		while($row = $bd->fetch_row()){
			$fecha_bd = strtotime($row['fecha_ing']);
			$hora_bd = strtotime($row['fecha_ing']);
			
			
			$bd1 = new Bd();
			$bd1->sql = "SELECT * FROM ua_dependencias where id='".$row['dependencia']."'";
			$bd1->ejecutar();
			$row1 = $bd1->fetch_row();
			$row_count1 = $bd1->row_count();
			//if($row_count1=!0){$dependencia=$row1['nombre_corto'];$detexto="#FFF";}else{$dependencia="INDEFINIDO";$detexto="#999";}
			if ($row['dependencia']!=0 && $row['dependencia']!=""){
				$dependencia = "<div onClick=cargarContenido1('carga_sel_dependencia.php?id=".$row['id']."&dependencia=".rep(trim($row['dependencia']))."','dep_".$row['id']."')>".c_sp($row1['nombre_corto'])."</div>";
				$detexto="#FFF";
			}else{
				$dependencia = "<div onClick=cargarContenido1('carga_sel_dependencia.php?id=".$row['id']."&dependencia=".rep(trim($row['dependencia']))."','dep_".$row['id']."')>S/D</div>";
				$detexto="#999";		
			}			


			$bd1 = new Bd();
			$bd1->conectar();
			$bd1->sql = "SELECT * FROM ua_usuarios where id='".$row['usuario']."'";
			//echo "SELECT * FROM ua_usuarios where id='".$row['usuario']."'";
			$bd1->ejecutar();
			$row1 = $bd1->fetch_row();
			$row_count1 = $bd1->row_count();
			$cargo="S/D";$ctexto="#999";
			if($row_count1!=0){
				$nombre="<div onClick=cargarContenido1('carga_sel_usuarios.php?id=".$row['id']."&usuario=".$row1['id']."','usu_".$row['id']."')>".$row1['nombre'].' '.$row1['apellidop']."</div>";$utexto="#FFF";
					$bd2 = new Bd();
					$bd2->conectar();
					$bd2->sql = "SELECT * FROM ua_cargos where id='".$row1['cargo']."'";
					//echo "SELECT * FROM ua_cargos where id='".$row1['cargo']."'";
					$bd2->ejecutar();
					$row2 = $bd2->fetch_row();
					$row_count2 = $bd2->row_count();
					if($row_count2!=0){$cargo=$row2['nombre'];$ctexto="#FFF";}		
			}else{
				$nombre="<div onClick=cargarContenido1('carga_sel_usuarios.php?id=".$row['id']."&usuario=".$row1['id']."','usu_".$row['id']."')>S/D</div>";$utexto="#999";}
				
							
			if ($row['area']!=0){
				$bd1 = new Bd();
				$bd1->sql = "SELECT * FROM ua_areas where id=".$row['area'];
				//echo "SELECT * FROM ua_areas where id='".$row['area']."'<br>";
				$bd1->ejecutar();
				$row1 = $bd1->fetch_row();
				$row_count1 = $bd1->row_count();
				$atexto="#FFF";									
				if($row_count1==0){
					//$area="<div onClick=cargarContenido1('carga_sel_areas.php?id=".$row['id']."&area=0','are_".$row['id']."')>S/D</div>";
					$area_id= 0;
					$area= "<div onClick=cargarContenido1('carga_sel_areas.php?id=".$row['id']."&area=".$row1['id']."','are_".$row['id']."')>S/D</div>";
					$atexto="#999";
				}else{
					$area= "<div onClick=cargarContenido1('carga_sel_areas.php?id=".$row['id']."&area=".$row1['id']."','are_".$row['id']."')>".c_en($row1['nombre_corto'])."</div>";
					$area_l= c_en($row1['nombre']);
					$area_id= $row1['id'];
					$atexto="#FFF";
				}
		
			}else{
				$area="<div onClick=cargarContenido1('carga_sel_areas.php?id=".$row['id']."&area=0','are_".$row['id']."')>S/D</div>";
				$atexto="#999";
			}
			
			
			if ($row['zona']!=0){
				$bd1 = new Bd();
				$bd1->sql = "SELECT * FROM ua_zonas where id='".$row['zona']."'";
				$bd1->ejecutar();
				$row1 = $bd1->fetch_row();
				$row_count1 = $bd1->row_count();
				if($row_count1=!0){
					$zona= "<div onClick=cargarContenido1('carga_sel_zonas.php?id=".$row['id']."&zona=".$row1['id']."','zon_".$row['id']."')>".$row1['nombre_corto']."</div>";
					$zona_l= ($row1['nombre']);
					$zona_id= $row1['id'];					
				}else{
					$zona="<div onClick=cargarContenido1('carga_sel_zonas.php?id=".$row['id']."&zona=0','zon_".$row['id']."')>S/D</div>";
					$zona_id= $row1['id'];
					//$zona= "S/D";					
				}
				$ztexto="#FFF";			
			}else{
				$zona="<div onClick=cargarContenido1('carga_sel_zonas.php?id=".$row['id']."&zona=0','zon_".$row['id']."')>S/D</div>";
				$ztexto="#999";
			}
			
			if ($row['item']!=0){
				$bd1 = new Bd();
				$bd1->sql = "SELECT * FROM ua_items where id='".$row['item']."'";
				$bd1->ejecutar();
				$row1 = $bd1->fetch_row();
				$row_count1 = $bd1->row_count();
				if($row_count1=!0){
					$item= "<div onClick=cargarContenido1('carga_sel_items.php?id=".$row['id']."&item=".$row1['id']."','ite_".$row['id']."')>".c_en($row1['nombre_corto'])."</div>";
					$item_id= $row1['id'];
					$itexto="#FFF";
				}else{
					$item= "<div onClick=cargarContenido1('carga_sel_items.php?id=".$row['id']."&item=0','ite_".$row['id']."')>S/D</div>";
					$itexto="#999";
				}
							
			}else{
				$item="<div onClick=cargarContenido1('carga_sel_items.php?id=".$row['id']."&item=0','ite_".$row['id']."')>S/D</div>";
				$itexto="#999";
			}

			if (trim($row['ip'])!="0" && trim($row['ip'])!=""){
				$ipe = "<div onClick=cargarContenido1('carga_sel_ip.php?id=".$row['id']."&ip=".rep(trim($row['ip']))."','ipe_".$row['id']."')>".c_sp($row['ip'])."</div>";
				$iptexto="#FFF";
			}else{
				$ipe = "<div onClick=cargarContenido1('carga_sel_ip.php?id=".$row['id']."&ip=".rep(trim($row['ip']))."','ipe_".$row['id']."')>S/D</div>";
				$iptexto="#999";		
			}
			
			if (trim($row['nombre'])!="0" && trim($row['nombre'])!=""){
				$nombrei = "<div onClick=cargarContenido1('carga_sel_nombre.php?id=".$row['id']."&nombre=".rep(trim($row['nombre']))."','nom_".$row['id']."')>".c_sp($row['nombre'])."</div>";
				$ntexto="#FFF";
			}else{
				$nombrei = "<div onClick=cargarContenido1('carga_sel_nombre.php?id=".$row['id']."&nombre=".rep(trim($row['nombre']))."','nom_".$row['id']."')>S/D</div>";
				$ntexto="#999";		
			}

			if ($row['marca']!="0" && $row['marca']!=""){
				$marca = "<div onClick=cargarContenido1('carga_sel_marcas.php?id=".$row['id']."&marca=".rep($row['marca'])."','mar_".$row['id']."')>".c_sp($row['marca'])."</div>";
				$mtexto="#FFF";
			}else{
				$marca = "<div onClick=cargarContenido1('carga_sel_marcas.php?id=".$row['id']."&marca=".rep($row['marca'])."','mar_".$row['id']."')>S/D</div>";
				$mtexto="#999";		
			}
			
			if ($row['modelo']!="0" && $row['modelo']!=""){
				$modelo = "<div onClick=cargarContenido1('carga_sel_modelos.php?id=".$row['id']."&modelo=".rep($row['modelo'])."','mod_".$row['id']."')>".($row['modelo'])."</div>";
				$motexto="#FFF";
			}else{
				$modelo = "<div onClick=cargarContenido1('carga_sel_modelos.php?id=".$row['id']."&modelo=".rep($row['modelo'])."','mod_".$row['id']."')>S/D</div>";
				$motexto="#999";		
			}
			
			if ($row['procesador']!="0" && $row['procesador']!=""){
				$procesador = "<div onClick=cargarContenido1('carga_sel_procesadores.php?id=".$row['id']."&procesador=".rep(c_sp($row['procesador']))."','pro_".$row['id']."')>".c_sp($row['procesador'])."</div>";
				$ptexto="#FFF";
			}else{
				$procesador = "<div onClick=cargarContenido1('carga_sel_procesadores.php?id=".$row['id']."&procesador=".rep(c_sp($row['procesador']))."','pro_".$row['id']."')>S/D</div>";
				$ptexto="#999";		
			}						

			if ($row['hdd']!="0" && $row['hdd']!=""){
				$hdd = "<div onClick=cargarContenido1('carga_sel_hdd.php?id=".$row['id']."&hdd=".rep($row['hdd'])."','hdd_".$row['id']."')>".c_sp($row['hdd'])."</div>";
				$htexto="#FFF";
			}else{
				$hdd = "<div onClick=cargarContenido1('carga_sel_hdd.php?id=".$row['id']."&hdd=".rep($row['hdd'])."','hdd_".$row['id']."')>S/D</div>";
				$htexto="#999";		
			}
			
			if ($row['ram']!="0" && $row['ram']!=""){
				$ram = "<div onClick=cargarContenido1('carga_sel_ram.php?id=".$row['id']."&ram=".rep($row['ram'])."','ram_".$row['id']."')>".c_sp($row['ram'])."</div>";
				$rtexto="#FFF";
			}else{
				$ram = "<div onClick=cargarContenido1('carga_sel_ram.php?id=".$row['id']."&ram=".rep($row['ram'])."','ram_".$row['id']."')>S/D</div>";
				$rtexto="#999";		
			}
			
			if ($row['so']!="0" && $row['so']!=""){
				$so = "<div onClick=cargarContenido1('carga_sel_so.php?id=".$row['id']."&so=".rep($row['so'])."','so_".$row['id']."')>".c_sp($row['so'])."</div>";
				$sotexto="#FFF";
			}else{
				$so = "<div onClick=cargarContenido1('carga_sel_so.php?id=".$row['id']."&so=".rep($row['so'])."','so_".$row['id']."')>S/D</div>";
				$sotexto="#999";		
			}	
			
			if ($row['serie']!="0" && $row['serie']!=""){
				$serie = "<div onClick=cargarContenido1('carga_sel_serie.php?id=".$row['id']."&serie=".rep($row['serie'])."','ser_".$row['id']."')>".c_sp($row['serie'])."</div>";
				$stexto="#FFF";
			}else{
				$serie = "<div onClick=cargarContenido1('carga_sel_serie.php?id=".$row['id']."&serie=".rep($row['serie'])."','ser_".$row['id']."')>S/D</div>";
				$stexto="#999";		
			}	
			
			if ($row['activo_fijo']!="0" && $row['activo_fijo']!=""){
				$activo = "<div onClick=cargarContenido1('carga_sel_activo.php?id=".$row['id']."&activo=".rep($row['activo_fijo'])."','act_".$row['id']."')>".c_sp($row['activo_fijo'])."</div>";
				$aftexto="#FFF";
			}else{
				$activo = "<div onClick=cargarContenido1('carga_sel_activo.php?id=".$row['id']."&activo=".rep($row['activo_fijo'])."','act_".$row['id']."')>S/D</div>";
				$aftexto="#999";		
			}
			
			if ($row['horas']!="0" && $row['horas']!=""){
				$horas = "<div onClick=cargarContenido1('carga_sel_horas.php?id=".$row['id']."&horas=".rep($row['horas'])."','hor_".$row['id']."')>".c_sp($row['horas'])."</div>";
				$hotexto="#FFF";
			}else{
				$horas = "<div onClick=cargarContenido1('carga_sel_horas.php?id=".$row['id']."&horas=".rep($row['horas'])."','hor_".$row['id']."')>N/A</div>";
				$hotexto="#999";		
			}												
			
			$estado = $row['estado'];
			if ($estado=="0"){$bg_estado="#203012";$nom_estado="<div onClick=cargarContenido1('carga_sel_estado.php?id=".$row['id']."&estado=".$row['estado']."','est_".$row['id']."')>INGRESADO</div>";}
			if ($estado=="1"){$bg_estado="#597014";$nom_estado="<div onClick=cargarContenido1('carga_sel_estado.php?id=".$row['id']."&estado=".$row['estado']."','est_".$row['id']."')>OPERATIVO</div>";}
			if ($estado=="2"){$bg_estado="#B74915";$nom_estado="<div onClick=cargarContenido1('carga_sel_estado.php?id=".$row['id']."&estado=".$row['estado']."','est_".$row['id']."')>DEFECTUOSO</div>";}
			if ($estado=="3"){$bg_estado="#FFA41A";$nom_estado="<div onClick=cargarContenido1('carga_sel_estado.php?id=".$row['id']."&estado=".$row['estado']."','est_".$row['id']."')>MANTENCIÓN</div>";}
			if ($estado=="4"){$bg_estado="#999";$nom_estado="<div onClick=cargarContenido1('carga_sel_estado.php?id=".$row['id']."&estado=".$row['estado']."','est_".$row['id']."')>OBSOLETO</div>";}			
			if ($estado=="5"){$bg_estado="#D58000";$nom_estado="<div onClick=cargarContenido1('carga_sel_estado.php?id=".$row['id']."&estado=".$row['estado']."','est_".$row['id']."')>RETIRO</div>";}			
			if ($estado=="6"){$bg_estado="#CCC";$nom_estado="<div onClick=cargarContenido1('carga_sel_estado.php?id=".$row['id']."&estado=".$row['estado']."','est_".$row['id']."')>BAJA</div>";}
			if ($estado=="7"){$bg_estado="";$nom_estado="<div onClick=cargarContenido1('carga_sel_estado.php?id=".$row['id']."&estado=".$row['estado']."','est_".$row['id']."')>ROBADO</div>";}						
			
			if ($row['actual']==1){$bg_actual = "#669933";}else{$bg_actual = "";}
	?>      
		  <tr id='line<?php echo $row['id'] ?>' onMouseOver="on_ove('line<?php echo $row['id'] ?>')" onMouseOut="on_out('line<?php echo $row['id'] ?>')" class="cont_tabla" style="border:solid #000 1px;">
			<td style="text-align:right;border:solid #000 1px;"><div width="100%" style="cursor:pointer;" onClick="window.open('listado_logs.php?id=<?php echo $row['id']?>','LOGS','directories=0,titlebar=0,toolbar=0,location=0,status=0,menubar=0,scrollbars=0,resizable=0,width=810,height=600')"><?php echo $n_item  //$row['id'] ?>&nbsp;</div></td>
			<td id="dep_<?php echo $row['id'] ?>" style="border:solid #000 1px;color:<?php echo $detexto ?>;cursor:pointer;"><?php echo c_sp($dependencia) ?></td>
			<td style="border:solid #000 1px;"><?php echo date("d-m-Y",$fecha_bd) ?></td>
			<td style="border:solid #000 1px;"><?php echo date("H:i",$fecha_bd) ?></td>
			<td id="are_<?php echo $row['id'] ?>" style="border:solid #000 1px;text-align:left; color:<?php echo $atexto ?>;cursor:pointer" title="<?php echo c_sp($area_l) ?>"><?php echo c_sp($area)?><input name="area<?php echo $row['id'] ?>" type="hidden" value="<?php echo $area_id ?>"></td>
			<td id="zon_<?php echo $row['id'] ?>" style="border:solid #000 1px;text-align:left; color:<?php echo $ztexto ?>;cursor:pointer" title="<?php echo c_sp($zona_l) ?>"><?php echo ($zona) ?><input name="zona<?php echo $row['id'] ?>" type="hidden" value="<?php echo $zona_id ?>"></td>
			<td id="usu_<?php echo $row['id'] ?>" style="border:solid #000 1px;text-align:left; color:<?php echo $utexto ?>;cursor:pointer" title="<?php echo c_sp($usuario_l) ?>"><?php echo $nombre ?><input name="usuario<?php echo $row['id'] ?>" type="hidden" id="usuario<?php echo $row['id'] ?>" value="<?php echo $usuario_id ?>"></td>
			<td style="border:solid #000 1px; color:<?php echo $utexto ?>; text-align:left"><?php echo $cargo ?></td>
			<td id="ite_<?php echo $row['id'] ?>" style="border:solid #000 1px;text-align:left; color:<?php echo $itexto ?>;cursor:pointer" title="<?php echo $item_l ?>"><?php echo c_sp($item) ?><input name="item<?php echo $row['id'] ?>" type="hidden" id="item<?php echo $row['id'] ?>" value="<?php echo $item_id ?>"></td>
			<td id="ipe_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $iptexto ?>; text-align:left;cursor:pointer;"><?php echo $ipe ?></td>
			<td id="nom_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $ntexto ?>; text-align:left;cursor:pointer;"><?php echo c_en($nombrei) ?></td>
			<td id="mar_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $mtexto ?>; text-align:left;cursor:pointer;"><?php echo $marca ?></td>
			<td id="mod_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $motexto ?>; text-align:left;cursor:pointer;"><?php echo $modelo ?></td>
			<td id="pro_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $ptexto ?>; text-align:left;cursor:pointer;"><?php echo $procesador ?></td>
			<td id="hdd_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $htexto ?>; text-align:center;cursor:pointer;"><?php echo $hdd ?></td>
			<td id="ram_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $rtexto ?>; text-align:center;cursor:pointer;"><?php echo $ram ?></td>
			<td id="so_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $sotexto ?>; text-align:center;cursor:pointer;"><?php echo $so ?></td>
			<td id="ser_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $stexto ?>; text-align:right;cursor:pointer;"><?php echo $serie ?></td>
			<td id="act_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $aftexto ?>; text-align:center"><?php echo $activo ?></td>
			<td id="hor_<?php echo $row['id'] ?>" style="border:solid #000 1px; color:<?php echo $hotexto ?>; text-align:center"><?php echo $horas ?></td>
			<td id="est_<?php echo $row['id'] ?>" style="border:solid #000 1px; background-color:<?php echo $bg_estado ?>; text-align:center"><?php echo $nom_estado ?></td>
			<td id="actual<?php echo $row['id']?>" style="border:solid #000 1px; cursor:pointer; background-color:<?php echo $bg_actual ?>"><img src="img/cancelar.jpg" width="20" height="20" onClick="cargarContenido('elimina_inventario.php?id=<?php echo $row['id']?>','contenido');elimina_inventario();" style="cursor:pointer"></td>
		  </tr>

<?php 
	        ob_flush();
        	flush();
			$n_item = $n_item +1;
}

ob_end_flush();
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
>>>>>>> origin/master
</html>