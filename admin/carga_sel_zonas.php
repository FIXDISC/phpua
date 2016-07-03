<?php
include_once 'class/Bd.php';
include_once 'phpfunc/func.php';

$id = $_GET['id'];
$aid = $_GET['aid'];
$tipo = $_GET['aid'];
if ($tipo!=""){$sql=" where tipo=".$tipo;}else{$sql="".$tipo;}


$bd = new Bd();
$bd->sql = "SELECT * FROM ua_zonas ".$sql."order by nombre";
//echo "SELECT * FROM ua_zona order by nombre";
$bd->ejecutar();
?>
<select id="zona<?php echo $id ?>" name="zona<?php echo $id ?>" >
      <option value='0' selected>ZONA</option>
      <?php
     while($row = $bd->fetch_row()){
		 	if($aid==$row['id']){$sel1="selected";}else{$sel1="";}	 
		 ?>
      <option value="<?php echo $row['id'] ?>" <?php echo $sel1 ?>><?php echo $row['nombre_corto'] ?></option>
      <?php
     }
    ?>
</select>