<<<<<<< HEAD
<?php
date_default_timezone_set("America/Santiago");
include_once('config/Bd.php');
include_once('phpfunc/func.php');
$nombres = "";

$bd = new Bd();
$bd->sql = "SELECT * FROM ua_usuarios";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $nombres = $nombres.",".($row['nombre']." ".$row['apellidop']);  
}

$bd = new Bd();
$bd->sql = "SELECT nombre FROM ua_inventario";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $nombresi = $nombresi.",".($row['nombre']);  
}

$bd = new Bd();
$bd->sql = "SELECT * FROM ua_cargos";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $nombres = $nombres.",".($row['nombre'])." ".($row['apellidop']);  
}


$areas = "";
$bd = new Bd();
$bd->sql = "SELECT id,nombre,nombre_corto FROM ua_zonas UNION SELECT id,nombre,nombre_corto FROM ua_areas";
$bd->ejecutar();
while($row=$bd->fetch_row()){
  $areas = $areas.$row['nombre_corto']." (".$row['nombre'].")".",";
}

$incidentes = "";
$bd = new Bd();
$bd->sql = "SELECT distinct incidente FROM ua_incidentes";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $incidentes = $incidentes.",".c_sp($row['incidente']);
}
$causas = "";
$bd = new Bd();
$bd->conectar();
$bd->sql = "SELECT distinct causa FROM ua_incidentes";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $causas = $causas.",".$row['causa'];
}

$acciones = "";
$bd = new Bd();
$bd->conectar();
$bd->sql = "SELECT distinct accion FROM ua_incidentes";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $acciones = $acciones.",".$row['accion'];
}

$dependencia = "";
$bd = new Bd();
$bd->sql = "SELECT * FROM ua_dependencias";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $dependencia = $dependencia.",".c_en($row['nombre']);  
}

$dependencia_corto = "";
$bd = new Bd();
$bd->sql = "SELECT * FROM ua_dependencias";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $dependencia_corto = $dependencia_corto.",".c_en($row['nombre_corto']);  
}


$ips = "";
$bd = new Bd();
$bd->sql = "SELECT DISTINCT ip FROM ua_inventario";
$bd->ejecutar();
while($row=$bd->fetch_row()){
  $ips = $ips.$row['ip'].",";
}

$marcas = "";
$bd = new Bd();
$bd->sql = "SELECT DISTINCT marca FROM ua_inventario";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $marcas = $marcas.",".c_en($row['marca']);  
}

$modelos = "";
$bd = new Bd();
$bd->sql = "SELECT distinct modelo FROM ua_inventario";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $modelos = $modelos.",".c_en($row['modelo']);  
}

$procesadores = "";
$bd = new Bd();
$bd->sql = "SELECT distinct procesador FROM ua_inventario";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $procesadores = $procesadores.",".c_en($row['procesador']);  
}

$hdds = "";
$bd = new Bd();
$bd->sql = "SELECT distinct hdd FROM ua_inventario";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $hdds = $hdds.",".c_en($row['hdd']);  
}

$rams = "";
$bd = new Bd();
$bd->sql = "SELECT distinct ram FROM ua_inventario";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $rams = $rams.",".c_en($row['ram']);  
}

$sos = "";
$bd = new Bd();
$bd->sql = "SELECT distinct so FROM ua_inventario";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $sos = $sos.",".c_en($row['so']);  
}

$series = "";
$bd = new Bd();
$bd->sql = "SELECT distinct serie FROM ua_inventario";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $series = $series.",".c_en($row['serie']);  
}

$activos = "";
$bd = new Bd();
$bd->sql = "SELECT distinct activo_fijo FROM ua_inventario";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $activos = $activos.",".c_en($row['activo_fijo']);  
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: UAUTONOMA ::</title>
<link href="css/us.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="js1/jquery.ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<script type="text/javascript" src="js/libreriaAjax.js"></script>
   		<script type="text/javascript" src="admin/js/libreriaAjax1.js"></script>
		
		<script type="text/javascript" src="js/valida_form.js"></script>        
		<script type="text/javascript" src="js1/jquery-1.9.1.js"></script>        
		<script type="text/javascript" src="js/js/highcharts.js"></script>
	    <script type="text/javascript" src="js/js/themes/grid.js"></script>
		<script type="text/javascript" src="js/js/modules/exporting.js"></script>
		<script type="text/javascript" src="js1/centrar.jQuery.js"></script>  

<script src="js1/jquery.ui/jquery-ui.js"></script>
<script src="js/valida_form.js"></script>
<script language="javascript">
function auto_usuario(){
	$(function() {
		var data = "<?php echo $nombres ?>".split(",");
		$("#usuario").autocomplete({
				source: data
			});
	});
}

function auto_cargo(){
	$(function() {
		var data = "<?php echo $cargos ?>".split(",");
		$("#cargo").autocomplete({
				source: data
			});
	});
}

function auto_area(){
	$(function() {
		var data = "<?php echo $areas ?>".split(",");
		$("#area").autocomplete({
				source: data
			});
	});
}	
function auto_incidente(){
	$(function() {
		var data = "<?php echo $incidentes ?>".split(",");
		$("#incidente").autocomplete({
				source: data
			});
	});
}
function auto_causa(id){
	$(function() {
		var data = "<?php echo $causas ?>".split(",");
		$("#causa"+id).autocomplete({
				source: data
			});
	});
}
function auto_accion(id){
	$(function() {
		var data = "<?php echo $acciones ?>".split(",");
		$("#accion"+id).autocomplete({
				source: data
			});
	});
}

function auto_dependencia(){
	$(function() {
		var data = "<?php echo $dependencia ?>".split(",");
		$("#nombre").autocomplete({
				source: data
			});
	});
}

function auto_dependencia_corto(){
	$(function() {
		var data = "<?php echo $dependencia_corto ?>".split(",");
		$("#nombre_corto").autocomplete({
				source: data
			});
	});
}

function auto_ip(obj){
	$(function() {
		ip = "#"+obj;
		var data = "<?php echo $ips ?>".split(",");
		$(ip).autocomplete({
				source: data
			});
	});
}

function auto_nombre(obj){
	$(function() {
		auto_nombre = "#"+obj;
		var data = "<?php echo $nombres ?>".split(",");
		$(nombre).autocomplete({
				source: data
			});
	});
}

function auto_nombrei(obj){
	$(function() {
		auto_nombrei = "#"+obj;
		var data = "<?php echo $nombresi ?>".split(",");
		$(nombre).autocomplete({
				source: data
			});
	});
}

function auto_marca(obj){
	$(function() {
		marca = "#"+obj;
		var data = "<?php echo $marcas ?>".split(",");
		$(marca).autocomplete({
				source: data
			});
	});
}

function auto_modelo(obj){
	$(function() {
		modelo = "#"+obj;
		var data = "<?php echo $modelos ?>".split(",");
		$(modelo).autocomplete({
				source: data
			});
	});
}

function auto_procesa(obj){
	$(function() {
		procesador = "#"+obj;
		var data = "<?php echo $procesadores ?>".split(",");
		$(procesador).autocomplete({
				source: data
			});
	});
}

function auto_hdd(obj){
	$(function() {
		hdd = "#"+obj;
		var data = "<?php echo $hdds ?>".split(",");
		$(hdd).autocomplete({
				source: data
			});
	});
}

function auto_ram(obj){
	$(function() {
		ram = "#"+obj;
		var data = "<?php echo $rams ?>".split(",");
		$(ram).autocomplete({
				source: data
			});
	});
}

function auto_so(obj){
	$(function() {
		so = "#"+obj;
		var data = "<?php echo $sos ?>".split(",");
		$(so).autocomplete({
				source: data
			});
	});
}

function auto_serie(obj){
	$(function() {
		serie = "#"+obj;
		var data = "<?php echo $series ?>".split(",");
		$(serie).autocomplete({
				source: data
			});
	});
}

function auto_activo(obj){
	$(function() {
		activo = "#"+obj;
		var data = "<?php echo $activos ?>".split(",");
		$(activo).autocomplete({
				source: data
			});
	});
}


function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function valida_usuario() {
usuario=document.getElementById('usuario').value;
clave=document.getElementById('clave').value;
if ((usuario=="") || (clave==""))
	{
		alert("Debe ingresar Usuario y Clave");
		return false;
	}else{
		valida_clave(usuario,clave);
	}
}

</script>
<link href="css/us.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="cont">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    <td width="320" height="100">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="115">&nbsp;</td>
    <td style="text-align:center"><table width="100%" border="1" cellpadding="0" cellspacing="0" style="border:solid #999 1px;">
      <tr>
        <td><table width="330" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="330" height="110" bgcolor="#3A3532" style="background-image:url(img/header1.jpg)">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#3A3532">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#676362" style="text-align:center"><table width="280" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>USUARIO</td>
                <td><input type="text" name="usuario" id="usuario" style="height:18px" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>CLAVE</td>
                <td><input name="clave" type="password" id="clave" value="" style="height:18px" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="button" name="INGRESAR" id="INGRESAR" value="INGRESAR" style="height:20px; text-align:right;" onclick="valida_usuario()" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#3A3532">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</div>
<script language="javascript">
<?php 
if ($_SESSION['AUT']=='1'){ ?>
cargarContenido('login.php?val=1','cont');
<?php
}
?>
</script>

</html>
=======
<?php
date_default_timezone_set("America/Santiago");
include_once('config/Bd.php');
include_once('phpfunc/func.php');
$nombres = "";

$bd = new Bd();
$bd->sql = "SELECT * FROM ua_usuarios";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $nombres = $nombres.",".($row['nombre']." ".$row['apellidop']);  
}

$bd = new Bd();
$bd->sql = "SELECT nombre FROM ua_inventario";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $nombresi = $nombresi.",".($row['nombre']);  
}

$bd = new Bd();
$bd->sql = "SELECT * FROM ua_cargos";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $nombres = $nombres.",".($row['nombre'])." ".($row['apellidop']);  
}


$areas = "";
$bd = new Bd();
$bd->sql = "SELECT id,nombre,nombre_corto FROM ua_zonas UNION SELECT id,nombre,nombre_corto FROM ua_areas";
$bd->ejecutar();
while($row=$bd->fetch_row()){
  $areas = $areas.$row['nombre_corto']." (".$row['nombre'].")".",";
}

$incidentes = "";
$bd = new Bd();
$bd->sql = "SELECT distinct incidente FROM ua_incidentes";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $incidentes = $incidentes.",".c_sp($row['incidente']);
}
$causas = "";
$bd = new Bd();
$bd->conectar();
$bd->sql = "SELECT distinct causa FROM ua_incidentes";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $causas = $causas.",".$row['causa'];
}

$acciones = "";
$bd = new Bd();
$bd->conectar();
$bd->sql = "SELECT distinct accion FROM ua_incidentes";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $acciones = $acciones.",".$row['accion'];
}

$dependencia = "";
$bd = new Bd();
$bd->sql = "SELECT * FROM ua_dependencias";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $dependencia = $dependencia.",".c_en($row['nombre']);  
}

$dependencia_corto = "";
$bd = new Bd();
$bd->sql = "SELECT * FROM ua_dependencias";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $dependencia_corto = $dependencia_corto.",".c_en($row['nombre_corto']);  
}


$ips = "";
$bd = new Bd();
$bd->sql = "SELECT DISTINCT ip FROM ua_inventario";
$bd->ejecutar();
while($row=$bd->fetch_row()){
  $ips = $ips.$row['ip'].",";
}

$marcas = "";
$bd = new Bd();
$bd->sql = "SELECT DISTINCT marca FROM ua_inventario";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $marcas = $marcas.",".c_en($row['marca']);  
}

$modelos = "";
$bd = new Bd();
$bd->sql = "SELECT distinct modelo FROM ua_inventario";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $modelos = $modelos.",".c_en($row['modelo']);  
}

$procesadores = "";
$bd = new Bd();
$bd->sql = "SELECT distinct procesador FROM ua_inventario";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $procesadores = $procesadores.",".c_en($row['procesador']);  
}

$hdds = "";
$bd = new Bd();
$bd->sql = "SELECT distinct hdd FROM ua_inventario";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $hdds = $hdds.",".c_en($row['hdd']);  
}

$rams = "";
$bd = new Bd();
$bd->sql = "SELECT distinct ram FROM ua_inventario";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $rams = $rams.",".c_en($row['ram']);  
}

$sos = "";
$bd = new Bd();
$bd->sql = "SELECT distinct so FROM ua_inventario";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $sos = $sos.",".c_en($row['so']);  
}

$series = "";
$bd = new Bd();
$bd->sql = "SELECT distinct serie FROM ua_inventario";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $series = $series.",".c_en($row['serie']);  
}

$activos = "";
$bd = new Bd();
$bd->sql = "SELECT distinct activo_fijo FROM ua_inventario";
$bd->ejecutar();
while($row = $bd->fetch_row()){
  $activos = $activos.",".c_en($row['activo_fijo']);  
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: UAUTONOMA ::</title>
<link href="css/us.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="js1/jquery.ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<script type="text/javascript" src="js/libreriaAjax.js"></script>
   		<script type="text/javascript" src="admin/js/libreriaAjax1.js"></script>
		
		<script type="text/javascript" src="js/valida_form.js"></script>        
		<script type="text/javascript" src="js1/jquery-1.9.1.js"></script>        
		<script type="text/javascript" src="js/js/highcharts.js"></script>
	    <script type="text/javascript" src="js/js/themes/grid.js"></script>
		<script type="text/javascript" src="js/js/modules/exporting.js"></script>
		<script type="text/javascript" src="js1/centrar.jQuery.js"></script>  

<script src="js1/jquery.ui/jquery-ui.js"></script>
<script src="js/valida_form.js"></script>
<script language="javascript">
function auto_usuario(){
	$(function() {
		var data = "<?php echo $nombres ?>".split(",");
		$("#usuario").autocomplete({
				source: data
			});
	});
}

function auto_cargo(){
	$(function() {
		var data = "<?php echo $cargos ?>".split(",");
		$("#cargo").autocomplete({
				source: data
			});
	});
}

function auto_area(){
	$(function() {
		var data = "<?php echo $areas ?>".split(",");
		$("#area").autocomplete({
				source: data
			});
	});
}	
function auto_incidente(){
	$(function() {
		var data = "<?php echo $incidentes ?>".split(",");
		$("#incidente").autocomplete({
				source: data
			});
	});
}
function auto_causa(id){
	$(function() {
		var data = "<?php echo $causas ?>".split(",");
		$("#causa"+id).autocomplete({
				source: data
			});
	});
}
function auto_accion(id){
	$(function() {
		var data = "<?php echo $acciones ?>".split(",");
		$("#accion"+id).autocomplete({
				source: data
			});
	});
}

function auto_dependencia(){
	$(function() {
		var data = "<?php echo $dependencia ?>".split(",");
		$("#nombre").autocomplete({
				source: data
			});
	});
}

function auto_dependencia_corto(){
	$(function() {
		var data = "<?php echo $dependencia_corto ?>".split(",");
		$("#nombre_corto").autocomplete({
				source: data
			});
	});
}

function auto_ip(obj){
	$(function() {
		ip = "#"+obj;
		var data = "<?php echo $ips ?>".split(",");
		$(ip).autocomplete({
				source: data
			});
	});
}

function auto_nombre(obj){
	$(function() {
		auto_nombre = "#"+obj;
		var data = "<?php echo $nombres ?>".split(",");
		$(nombre).autocomplete({
				source: data
			});
	});
}

function auto_nombrei(obj){
	$(function() {
		auto_nombrei = "#"+obj;
		var data = "<?php echo $nombresi ?>".split(",");
		$(nombre).autocomplete({
				source: data
			});
	});
}

function auto_marca(obj){
	$(function() {
		marca = "#"+obj;
		var data = "<?php echo $marcas ?>".split(",");
		$(marca).autocomplete({
				source: data
			});
	});
}

function auto_modelo(obj){
	$(function() {
		modelo = "#"+obj;
		var data = "<?php echo $modelos ?>".split(",");
		$(modelo).autocomplete({
				source: data
			});
	});
}

function auto_procesa(obj){
	$(function() {
		procesador = "#"+obj;
		var data = "<?php echo $procesadores ?>".split(",");
		$(procesador).autocomplete({
				source: data
			});
	});
}

function auto_hdd(obj){
	$(function() {
		hdd = "#"+obj;
		var data = "<?php echo $hdds ?>".split(",");
		$(hdd).autocomplete({
				source: data
			});
	});
}

function auto_ram(obj){
	$(function() {
		ram = "#"+obj;
		var data = "<?php echo $rams ?>".split(",");
		$(ram).autocomplete({
				source: data
			});
	});
}

function auto_so(obj){
	$(function() {
		so = "#"+obj;
		var data = "<?php echo $sos ?>".split(",");
		$(so).autocomplete({
				source: data
			});
	});
}

function auto_serie(obj){
	$(function() {
		serie = "#"+obj;
		var data = "<?php echo $series ?>".split(",");
		$(serie).autocomplete({
				source: data
			});
	});
}

function auto_activo(obj){
	$(function() {
		activo = "#"+obj;
		var data = "<?php echo $activos ?>".split(",");
		$(activo).autocomplete({
				source: data
			});
	});
}


function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function valida_usuario() {
usuario=document.getElementById('usuario').value;
clave=document.getElementById('clave').value;
if ((usuario=="") || (clave==""))
	{
		alert("Debe ingresar Usuario y Clave");
		return false;
	}else{
		valida_clave(usuario,clave);
	}
}

</script>
<link href="css/us.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="cont">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    <td width="320" height="100">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="115">&nbsp;</td>
    <td style="text-align:center"><table width="100%" border="1" cellpadding="0" cellspacing="0" style="border:solid #999 1px;">
      <tr>
        <td><table width="330" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="330" height="110" bgcolor="#3A3532" style="background-image:url(img/header1.jpg)">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#3A3532">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#676362" style="text-align:center"><table width="280" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>USUARIO</td>
                <td><input type="text" name="usuario" id="usuario" style="height:18px" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>CLAVE</td>
                <td><input name="clave" type="password" id="clave" value="" style="height:18px" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="button" name="INGRESAR" id="INGRESAR" value="INGRESAR" style="height:20px; text-align:right;" onclick="valida_usuario()" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#3A3532">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</div>
<script language="javascript">
<?php 
if ($_SESSION['AUT']=='1'){ ?>
cargarContenido('login.php?val=1','cont');
<?php
}
?>
</script>

</html>
>>>>>>> origin/master
