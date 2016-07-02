<<<<<<< HEAD
<?php

date_default_timezone_set("America/Santiago");
include_once('config/Bd.php');
include_once('phpfunc/func.php');

$nom = $_GET['nom'];

$query = "SELECT * FROM ua_items order by nombre_corto";
$bd = new Bd();
$bd->sql = $query;
$bd->ejecutar();
$row_count = $bd->row_count();

if ($nom='P. de Valdivia: TORRE A'){$gquery = ' where area=';}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablas">
  <?php if ($row_count==0){ ?>
  <tr class="cont_tabla">
    <td colspan="3" style="text-align: center; border:solid #C1C1C1 1px;" ><br />
      NO EXISTEN ITEMS EN INVENTARIO<br />
      <br /></td>
  </tr>
  <?php  }else{  
		while($row = $bd->fetch_row()){
			
			$query1 = "SELECT COUNT(*) as tot FROM ua_inventario where item='".$row['id']."'";
			//echo $query1;
			$bd1 = new Bd();
			$bd1->sql = $query1;
			$bd1->ejecutar();
			$row1 = $bd1->fetch_row();
		
	?>
  <tr style="background-color:transparent; font-size:10px; font-family:Arial, Helvetica, sans-serif;color:#FFF; border:solid #000 1px;">
    <td width="80" style="text-align:left;"><?php echo c_en($row['nombre_corto']) ?>&nbsp;</div></td>
    <td><?php echo $row1['tot'] ?></td>
  </tr>
  <?php 
	        ob_flush();
        	flush();
			$n_item = $n_item +1;
}

ob_end_flush();
} 
?>
</table>
</body>
</html>
=======
<?php

date_default_timezone_set("America/Santiago");
include_once('config/Bd.php');
include_once('phpfunc/func.php');

$nom = $_GET['nom'];

$query = "SELECT * FROM ua_items order by nombre_corto";
$bd = new Bd();
$bd->sql = $query;
$bd->ejecutar();
$row_count = $bd->row_count();

if ($nom='P. de Valdivia: TORRE A'){$gquery = ' where area=';}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablas">
  <?php if ($row_count==0){ ?>
  <tr class="cont_tabla">
    <td colspan="3" style="text-align: center; border:solid #C1C1C1 1px;" ><br />
      NO EXISTEN ITEMS EN INVENTARIO<br />
      <br /></td>
  </tr>
  <?php  }else{  
		while($row = $bd->fetch_row()){
			
			$query1 = "SELECT COUNT(*) as tot FROM ua_inventario where item='".$row['id']."'";
			//echo $query1;
			$bd1 = new Bd();
			$bd1->sql = $query1;
			$bd1->ejecutar();
			$row1 = $bd1->fetch_row();
		
	?>
  <tr style="background-color:transparent; font-size:10px; font-family:Arial, Helvetica, sans-serif;color:#FFF; border:solid #000 1px;">
    <td width="80" style="text-align:left;"><?php echo c_en($row['nombre_corto']) ?>&nbsp;</div></td>
    <td><?php echo $row1['tot'] ?></td>
  </tr>
  <?php 
	        ob_flush();
        	flush();
			$n_item = $n_item +1;
}

ob_end_flush();
} 
?>
</table>
</body>
</html>
>>>>>>> origin/master
