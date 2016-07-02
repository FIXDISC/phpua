<<<<<<< HEAD
<?php
date_default_timezone_set("America/Santiago");
include_once('config/Bd.php');
include_once('phpfunc/func.php');
?>
<html>
<head>
<link href="css/us.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #333;
}
</style>
<script type="text/javascript" src="js/libreriaAjax.js"></script>
<script type="text/javascript" src="js/libreria.js"></script>
<script type="text/javascript" src="js/valida_form.js"></script> 
<script language="javascript">
	function cambia_tipo(val){

	}
	function cambia_filtro(val){
		tipo1=document.getElementById('tipo1').value;
		area1=document.getElementById('area1').value;
		zona1=document.getElementById('zona1').value;
		item1=document.getElementById('item1').value;
		usuario1=document.getElementById('usuario1').value;
		cargo1=document.getElementById('cargo1').value;
		activo1=document.getElementById('activo1').value;
		serie1=document.getElementById('serie1').value;
		if (tipo1!=0){tit_tipo.style.backgroundColor = "#D58000"; tit_tipo.style.color="#000"}else{tit_tipo.style.backgroundColor = "#252324"; tit_tipo.style.color="#CCC";}
		if (area1!=0){tit_area.style.backgroundColor = "#D58000"; tit_area.style.color="#000"}else{tit_area.style.backgroundColor = "#252324"; tit_area.style.color="#CCC";}
		if (zona1!=0){tit_zona.style.backgroundColor = "#D58000"; tit_zona.style.color="#000"}else{tit_zona.style.backgroundColor = "#252324"; tit_zona.style.color="#CCC";}		
		if (item1!=0){tit_item.style.backgroundColor = "#D58000"; tit_item.style.color="#000"}else{tit_item.style.backgroundColor = "#252324"; tit_item.style.color="#CCC";}		

		if (usuario1!=""){tit_usuario.style.backgroundColor = "#D58000"; tit_usuario.style.color="#000"}else{tit_usuario.style.backgroundColor = "#252324"; tit_usuario.style.color="#CCC";}		
		if (cargo1!=""){tit_cargo.style.backgroundColor = "#D58000"; tit_cargo.style.color="#000"}else{tit_cargo.style.backgroundColor = "#252324"; tit_cargo.style.color="#CCC";}	
		if (activo1!=""){tit_activo.style.backgroundColor = "#D58000"; tit_activo.style.color="#000"}else{tit_activo.style.backgroundColor = "#252324"; tit_activo.style.color="#CCC";}		
		if (serie1!=""){tit_serie.style.backgroundColor = "#D58000"; tit_serie.style.color="#000"}else{tit_serie.style.backgroundColor = "#252324"; tit_serie.style.color="#CCC";}								
		if (tipo1!=0 || area1!=0 || zona1!=0 || item1!=0){filt.style.backgroundColor = "#597014"; filt.style.color="#FFF"}else{filt.style.backgroundColor = "#454344"; filt.style.color="#CCC";}
		if (usuario1!="" || cargo1!="" || activo1!="" || serie1!=""){busq.style.backgroundColor = "#597014"; busq.style.color="#FFF"}else{busq.style.backgroundColor = "#454344"; busq.style.color="#CCC";}				
	}
	
	function activa_filtro(){
		tipo1=document.getElementById('tipo1').value;
		area1=document.getElementById('area1').value;
		zona1=document.getElementById('zona1').value;
		item1=document.getElementById('item1').value;
		usuario1=document.getElementById('usuario1').value;
		cargo1=document.getElementById('cargo1').value;
		activo1=document.getElementById('activo1').value;
		serie1=document.getElementById('serie1').value;
		if (tipo1!=0 || area1!=0 || zona1!=0 || item1!=0){filt.style.backgroundColor = "#D58000"; filt.style.color="#000"}else{filt.style.backgroundColor = "#252324"; filt.style.color="#CCC";}
		if (usuario1!="" || cargo1!="" || activo1 || serie1){busq.style.backgroundColor = "#D58000"; busq.style.color="#000"}else{busq.style.backgroundColor = "#252324"; busq.style.color="#CCC";}		
	}
		
</script>
</head>
<html>
<div id='menu_filtro' style="border:0; width:100%; height:100%; background-color:#333; visibility:hidden; position:absolute; float:left; margin-top:0px; z-index:100;">
<table border="1" cellspacing="0" cellpadding="0" style="border-color:#000">
  <tr class="tit_tabla">
    <td width="100" height="15" bgcolor="#252324" onClick="oculta('menu_filtro')" style="text-align:left; cursor:pointer;"><img src="img/flecha-l.png" width="8" height="8"></td>
    <td width="120" bgcolor="#252324" id="tit_campo" style="font-size:12px">CAMPO</td>
    <td width="120" bgcolor="#252324" id="tit_comp" style="font-size:12px"></td>
    <td width="100" bgcolor="#252324" id="tit_txt" style="font-size:12px">TEXTO</td>
    <td width="100" bgcolor="#252324" id="tit_txt" style="font-size:12px">&nbsp;</td>
    </tr>
  <tr>
    <td id="filt1" bgcolor="#454344" style="font-size:10px">FILTRO 1</td>
    <td bgcolor="#454344" style="font-size:18px">
      <select name="campo" id="campo">
        <option value="dependencia" selected="selected">DEPENDENCIA</option>
        <option value="ip">IP</option>
        <option value="nombre">NOMBRE ITEM</option>
        <option value="marca">MARCA</option>
        <option value="modelo">MODELO</option>
        <option value="procesador">PROCESADOR</option>
        <option value="hdd">HDD</option>
        <option value="ram">RAM</option>
        <option value="so">SO</option>
		<option value="activo_fijo">ACTIVO FIJO</option>        
      </select></td>
  <?php     
	$bd = new Bd();
	$bd->sql = "SELECT * FROM ua_areas order by nombre";
	//echo "SELECT count FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'<br>";
	$bd->ejecutar();
?>    
    <td id="area" bgcolor="#454344"><span style="font-size:18px">
      <select name="comp" id="comp">
        <option value="=" selected>=</option>
        <option value="%">%</option>                 
        </select>
      </span></td>
    
  <?php     
	$bd = new Bd();
	$bd->sql = "SELECT * FROM ua_zonas order by nombre";
	//echo "SELECT count FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'<br>";
	$bd->ejecutar();
?>      
    <td bgcolor="#454344"><input name="txt" type="text" id="txt" size="15"></td>
    <td bgcolor="#454344">&nbsp;</td>
  <?php     
	$bd = new Bd();
	$bd->sql = "SELECT * FROM ua_items order by nombre";
	//echo "SELECT count FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'<br>";
	$bd->ejecutar();
?>       
  </tr>
  <tr class="tit_tabla">
    <td height="15" bgcolor="#252324"></td>
    <td bgcolor="#252324" id="tit_campo" style="font-size:12px">CAMPO</td>
    <td bgcolor="#252324" id="tit_comp" style="font-size:12px"></td>
    <td bgcolor="#252324" id="tit_txt" style="font-size:12px">TEXTO</td>
    <td bgcolor="#252324" id="tit_txt" style="font-size:12px">&nbsp;</td>
  </tr>
  <tr>
    <td id="filt1" bgcolor="#454344" style="font-size:10px" onClick="oculta('menu_filtro')">FILTRO 2</td> 
    <td bgcolor="#454344" style="font-size:18px"><select name="campo1" id="campo1">
      <option value="0" selected="selected">DEPENDENCIA</option>
      <option value="ip">IP</option>
      <option value="nombre">NOMBRE ITEM</option>
      <option value="marca">MARCA</option>
      <option value="modelo">MODELO</option>
      <option value="procesador">PROCESADOR</option>
      <option value="hdd">HDD</option>
      <option value="ram">RAM</option>
      <option value="so">SO</option>
      <option value="activo_fijo">ACTIVO FIJO</option>
      
    </select></td>
    <td id="area3" bgcolor="#454344"><span style="font-size:18px">
      <select name="comp1" id="comp1">
        <option value="=" selected>=</option>
        <option value="%">%</option>
      </select>
    </td>
    <td bgcolor="#454344"><input name="txt1" type="text" id="txt1" size="15"></td>
    <td bgcolor="#454344">&nbsp;</td>
  </tr>
</table>
</div>
<table border="1" cellspacing="0" cellpadding="0" style="border-color:#000">
  <tr class="tit_tabla">
    <td width="100" height="15" bgcolor="#252324"></td>
    <td width="120" bgcolor="#252324" id="tit_tipo" style="font-size:12px">TIPO</td>
    <td width="120" bgcolor="#252324" id="tit_area" style="font-size:12px">AREA</td>
    <td width="100" bgcolor="#252324" id="tit_zona" style="font-size:12px">ZONA</td>
    <td width="100"bgcolor="#252324" id="tit_item" style="font-size:12px">ITEM</td>
    <td bgcolor="#252324" style="font-size:12px; cursor: pointer" onClick="muestra('menu_filtro')"><img src="img/flecha-r.png" width="8" height="8"></td>
  </tr>
  <tr>
    <td id="filt" bgcolor="#454344" style="font-size:10px">FILTRO</td>
    <td bgcolor="#454344" style="font-size:18px">
      <select name="tipo1" id="tipo1" onChange="cambia_filtro(this.value)">
        <option value="0">TODOS</option>
        <option value="1">Administrativo</option>
        <option value="2">Docente</option>
        <option value="3">Alumnos</option>
    </select></td>
<?php     
	$bd = new Bd();
	$bd->sql = "SELECT * FROM ua_areas order by nombre";
	//echo "SELECT count FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'<br>";
	$bd->ejecutar();
?>    
    <td id="area" bgcolor="#454344"><span style="font-size:18px">
      <select name="area1" id="area1" onChange="cambia_filtro(this.value)">
        <option value="0">TODAS</option>                 
		<?php while($row = $bd->fetch_row()){?> 
        <option value="<?php echo $row['id']?>"><?php echo $row['nombre_corto']?></option>
		<?php } ?>
      </select>
    </span></td>
    
<?php     
	$bd = new Bd();
	$bd->sql = "SELECT * FROM ua_zonas order by nombre";
	//echo "SELECT count FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'<br>";
	$bd->ejecutar();
?>      
    <td bgcolor="#454344"><span style="font-size:18px">
      <select name="zona1" size="1" id="zona1" onChange="cambia_filtro(this.value)">
        <option value="0">TODAS</option>                 
		<?php while($row = $bd->fetch_row()){?> 
        <option value="<?php echo $row['id']?>"><?php echo $row['nombre_corto']?></option>
		<?php } ?>
      </select>
    </span></td>
<?php     
	$bd = new Bd();
	$bd->sql = "SELECT * FROM ua_items order by nombre";
	//echo "SELECT count FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'<br>";
	$bd->ejecutar();
?>       
    <td bgcolor="#454344"><span style="font-size:18px">
      <select name="item1" id="item1" onChange="cambia_filtro(this.value)">
        <option value="0">TODOS</option>
        <?php while($row = $bd->fetch_row()){?>
        <option value="<?php echo $row['id']?>"><?php echo $row['nombre_corto']?></option>
        <?php } ?>
      </select>
    </span></td>
    <td rowspan="3">&nbsp;</td>
  </tr>
  <tr class="tit_tabla">
    <td height="15" bgcolor="#252324"></td>
    <td id="tit_usuario" bgcolor="#252324" style="font-size:12px;">USUARIO</td>
    <td id="tit_cargo" bgcolor="#252324" style="font-size:12px;">CARGO</td>
    <td id="tit_activo" bgcolor="#252324" style="font-size:12px;">ACTIVO FIJO</td>
    <td id="tit_serie" bgcolor="#252324" style="font-size:12px;">SERIE</td>
  </tr>
  <tr>
    <td id="busq" height="25" bgcolor="#454344" style="font-size:10px">BUSQUEDA</td>
    <td bgcolor="#454344"><input name="usuario1" type="text" id="usuario1" size="15" onKeyUp="cambia_filtro()"></td>
    <td bgcolor="#454344"><input name="cargo1" type="text" id="cargo1" size="15" onKeyUp="cambia_filtro()"></td>
    <td bgcolor="#454344"><input name="activo1" type="text" id="activo1" size="10" onKeyUp="cambia_filtro()"></td>
    <td bgcolor="#454344"><input name="serie1" type="text" id="serie1" size="15" onKeyUp="cambia_filtro()"></td>
  </tr>
</table> 
=======
<?php
date_default_timezone_set("America/Santiago");
include_once('config/Bd.php');
include_once('phpfunc/func.php');
?>
<html>
<head>
<link href="css/us.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #333;
}
</style>
<script type="text/javascript" src="js/libreriaAjax.js"></script>
<script type="text/javascript" src="js/libreria.js"></script>
<script type="text/javascript" src="js/valida_form.js"></script> 
<script language="javascript">
	function cambia_tipo(val){

	}
	function cambia_filtro(val){
		tipo1=document.getElementById('tipo1').value;
		area1=document.getElementById('area1').value;
		zona1=document.getElementById('zona1').value;
		item1=document.getElementById('item1').value;
		usuario1=document.getElementById('usuario1').value;
		cargo1=document.getElementById('cargo1').value;
		activo1=document.getElementById('activo1').value;
		serie1=document.getElementById('serie1').value;
		if (tipo1!=0){tit_tipo.style.backgroundColor = "#D58000"; tit_tipo.style.color="#000"}else{tit_tipo.style.backgroundColor = "#252324"; tit_tipo.style.color="#CCC";}
		if (area1!=0){tit_area.style.backgroundColor = "#D58000"; tit_area.style.color="#000"}else{tit_area.style.backgroundColor = "#252324"; tit_area.style.color="#CCC";}
		if (zona1!=0){tit_zona.style.backgroundColor = "#D58000"; tit_zona.style.color="#000"}else{tit_zona.style.backgroundColor = "#252324"; tit_zona.style.color="#CCC";}		
		if (item1!=0){tit_item.style.backgroundColor = "#D58000"; tit_item.style.color="#000"}else{tit_item.style.backgroundColor = "#252324"; tit_item.style.color="#CCC";}		

		if (usuario1!=""){tit_usuario.style.backgroundColor = "#D58000"; tit_usuario.style.color="#000"}else{tit_usuario.style.backgroundColor = "#252324"; tit_usuario.style.color="#CCC";}		
		if (cargo1!=""){tit_cargo.style.backgroundColor = "#D58000"; tit_cargo.style.color="#000"}else{tit_cargo.style.backgroundColor = "#252324"; tit_cargo.style.color="#CCC";}	
		if (activo1!=""){tit_activo.style.backgroundColor = "#D58000"; tit_activo.style.color="#000"}else{tit_activo.style.backgroundColor = "#252324"; tit_activo.style.color="#CCC";}		
		if (serie1!=""){tit_serie.style.backgroundColor = "#D58000"; tit_serie.style.color="#000"}else{tit_serie.style.backgroundColor = "#252324"; tit_serie.style.color="#CCC";}								
		if (tipo1!=0 || area1!=0 || zona1!=0 || item1!=0){filt.style.backgroundColor = "#597014"; filt.style.color="#FFF"}else{filt.style.backgroundColor = "#454344"; filt.style.color="#CCC";}
		if (usuario1!="" || cargo1!="" || activo1!="" || serie1!=""){busq.style.backgroundColor = "#597014"; busq.style.color="#FFF"}else{busq.style.backgroundColor = "#454344"; busq.style.color="#CCC";}				
	}
	
	function activa_filtro(){
		tipo1=document.getElementById('tipo1').value;
		area1=document.getElementById('area1').value;
		zona1=document.getElementById('zona1').value;
		item1=document.getElementById('item1').value;
		usuario1=document.getElementById('usuario1').value;
		cargo1=document.getElementById('cargo1').value;
		activo1=document.getElementById('activo1').value;
		serie1=document.getElementById('serie1').value;
		if (tipo1!=0 || area1!=0 || zona1!=0 || item1!=0){filt.style.backgroundColor = "#D58000"; filt.style.color="#000"}else{filt.style.backgroundColor = "#252324"; filt.style.color="#CCC";}
		if (usuario1!="" || cargo1!="" || activo1 || serie1){busq.style.backgroundColor = "#D58000"; busq.style.color="#000"}else{busq.style.backgroundColor = "#252324"; busq.style.color="#CCC";}		
	}
		
</script>
</head>
<html>
<div id='menu_filtro' style="border:0; width:100%; height:100%; background-color:#333; visibility:hidden; position:absolute; float:left; margin-top:0px; z-index:100;">
<table border="1" cellspacing="0" cellpadding="0" style="border-color:#000">
  <tr class="tit_tabla">
    <td width="100" height="15" bgcolor="#252324" onClick="oculta('menu_filtro')" style="text-align:left; cursor:pointer;"><img src="img/flecha-l.png" width="8" height="8"></td>
    <td width="120" bgcolor="#252324" id="tit_campo" style="font-size:12px">CAMPO</td>
    <td width="120" bgcolor="#252324" id="tit_comp" style="font-size:12px"></td>
    <td width="100" bgcolor="#252324" id="tit_txt" style="font-size:12px">TEXTO</td>
    <td width="100" bgcolor="#252324" id="tit_txt" style="font-size:12px">&nbsp;</td>
    </tr>
  <tr>
    <td id="filt1" bgcolor="#454344" style="font-size:10px">FILTRO 1</td>
    <td bgcolor="#454344" style="font-size:18px">
      <select name="campo" id="campo">
        <option value="dependencia" selected="selected">DEPENDENCIA</option>
        <option value="ip">IP</option>
        <option value="nombre">NOMBRE ITEM</option>
        <option value="marca">MARCA</option>
        <option value="modelo">MODELO</option>
        <option value="procesador">PROCESADOR</option>
        <option value="hdd">HDD</option>
        <option value="ram">RAM</option>
        <option value="so">SO</option>
		<option value="activo_fijo">ACTIVO FIJO</option>        
      </select></td>
  <?php     
	$bd = new Bd();
	$bd->sql = "SELECT * FROM ua_areas order by nombre";
	//echo "SELECT count FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'<br>";
	$bd->ejecutar();
?>    
    <td id="area" bgcolor="#454344"><span style="font-size:18px">
      <select name="comp" id="comp">
        <option value="=" selected>=</option>
        <option value="%">%</option>                 
        </select>
      </span></td>
    
  <?php     
	$bd = new Bd();
	$bd->sql = "SELECT * FROM ua_zonas order by nombre";
	//echo "SELECT count FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'<br>";
	$bd->ejecutar();
?>      
    <td bgcolor="#454344"><input name="txt" type="text" id="txt" size="15"></td>
    <td bgcolor="#454344">&nbsp;</td>
  <?php     
	$bd = new Bd();
	$bd->sql = "SELECT * FROM ua_items order by nombre";
	//echo "SELECT count FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'<br>";
	$bd->ejecutar();
?>       
  </tr>
  <tr class="tit_tabla">
    <td height="15" bgcolor="#252324"></td>
    <td bgcolor="#252324" id="tit_campo" style="font-size:12px">CAMPO</td>
    <td bgcolor="#252324" id="tit_comp" style="font-size:12px"></td>
    <td bgcolor="#252324" id="tit_txt" style="font-size:12px">TEXTO</td>
    <td bgcolor="#252324" id="tit_txt" style="font-size:12px">&nbsp;</td>
  </tr>
  <tr>
    <td id="filt1" bgcolor="#454344" style="font-size:10px" onClick="oculta('menu_filtro')">FILTRO 2</td> 
    <td bgcolor="#454344" style="font-size:18px"><select name="campo1" id="campo1">
      <option value="0" selected="selected">DEPENDENCIA</option>
      <option value="ip">IP</option>
      <option value="nombre">NOMBRE ITEM</option>
      <option value="marca">MARCA</option>
      <option value="modelo">MODELO</option>
      <option value="procesador">PROCESADOR</option>
      <option value="hdd">HDD</option>
      <option value="ram">RAM</option>
      <option value="so">SO</option>
      <option value="activo_fijo">ACTIVO FIJO</option>
      
    </select></td>
    <td id="area3" bgcolor="#454344"><span style="font-size:18px">
      <select name="comp1" id="comp1">
        <option value="=" selected>=</option>
        <option value="%">%</option>
      </select>
    </td>
    <td bgcolor="#454344"><input name="txt1" type="text" id="txt1" size="15"></td>
    <td bgcolor="#454344">&nbsp;</td>
  </tr>
</table>
</div>
<table border="1" cellspacing="0" cellpadding="0" style="border-color:#000">
  <tr class="tit_tabla">
    <td width="100" height="15" bgcolor="#252324"></td>
    <td width="120" bgcolor="#252324" id="tit_tipo" style="font-size:12px">TIPO</td>
    <td width="120" bgcolor="#252324" id="tit_area" style="font-size:12px">AREA</td>
    <td width="100" bgcolor="#252324" id="tit_zona" style="font-size:12px">ZONA</td>
    <td width="100"bgcolor="#252324" id="tit_item" style="font-size:12px">ITEM</td>
    <td bgcolor="#252324" style="font-size:12px; cursor: pointer" onClick="muestra('menu_filtro')"><img src="img/flecha-r.png" width="8" height="8"></td>
  </tr>
  <tr>
    <td id="filt" bgcolor="#454344" style="font-size:10px">FILTRO</td>
    <td bgcolor="#454344" style="font-size:18px">
      <select name="tipo1" id="tipo1" onChange="cambia_filtro(this.value)">
        <option value="0">TODOS</option>
        <option value="1">Administrativo</option>
        <option value="2">Docente</option>
        <option value="3">Alumnos</option>
    </select></td>
<?php     
	$bd = new Bd();
	$bd->sql = "SELECT * FROM ua_areas order by nombre";
	//echo "SELECT count FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'<br>";
	$bd->ejecutar();
?>    
    <td id="area" bgcolor="#454344"><span style="font-size:18px">
      <select name="area1" id="area1" onChange="cambia_filtro(this.value)">
        <option value="0">TODAS</option>                 
		<?php while($row = $bd->fetch_row()){?> 
        <option value="<?php echo $row['id']?>"><?php echo $row['nombre_corto']?></option>
		<?php } ?>
      </select>
    </span></td>
    
<?php     
	$bd = new Bd();
	$bd->sql = "SELECT * FROM ua_zonas order by nombre";
	//echo "SELECT count FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'<br>";
	$bd->ejecutar();
?>      
    <td bgcolor="#454344"><span style="font-size:18px">
      <select name="zona1" size="1" id="zona1" onChange="cambia_filtro(this.value)">
        <option value="0">TODAS</option>                 
		<?php while($row = $bd->fetch_row()){?> 
        <option value="<?php echo $row['id']?>"><?php echo $row['nombre_corto']?></option>
		<?php } ?>
      </select>
    </span></td>
<?php     
	$bd = new Bd();
	$bd->sql = "SELECT * FROM ua_items order by nombre";
	//echo "SELECT count FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'<br>";
	$bd->ejecutar();
?>       
    <td bgcolor="#454344"><span style="font-size:18px">
      <select name="item1" id="item1" onChange="cambia_filtro(this.value)">
        <option value="0">TODOS</option>
        <?php while($row = $bd->fetch_row()){?>
        <option value="<?php echo $row['id']?>"><?php echo $row['nombre_corto']?></option>
        <?php } ?>
      </select>
    </span></td>
    <td rowspan="3">&nbsp;</td>
  </tr>
  <tr class="tit_tabla">
    <td height="15" bgcolor="#252324"></td>
    <td id="tit_usuario" bgcolor="#252324" style="font-size:12px;">USUARIO</td>
    <td id="tit_cargo" bgcolor="#252324" style="font-size:12px;">CARGO</td>
    <td id="tit_activo" bgcolor="#252324" style="font-size:12px;">ACTIVO FIJO</td>
    <td id="tit_serie" bgcolor="#252324" style="font-size:12px;">SERIE</td>
  </tr>
  <tr>
    <td id="busq" height="25" bgcolor="#454344" style="font-size:10px">BUSQUEDA</td>
    <td bgcolor="#454344"><input name="usuario1" type="text" id="usuario1" size="15" onKeyUp="cambia_filtro()"></td>
    <td bgcolor="#454344"><input name="cargo1" type="text" id="cargo1" size="15" onKeyUp="cambia_filtro()"></td>
    <td bgcolor="#454344"><input name="activo1" type="text" id="activo1" size="10" onKeyUp="cambia_filtro()"></td>
    <td bgcolor="#454344"><input name="serie1" type="text" id="serie1" size="15" onKeyUp="cambia_filtro()"></td>
  </tr>
</table> 
>>>>>>> origin/master
</html>