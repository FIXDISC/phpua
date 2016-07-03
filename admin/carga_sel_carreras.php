<?php
include_once 'class/Bd.php';
include_once 'phpfunc/func.php';

$id = $_GET['id'];
$caid = $_GET['caid'];
$bd = new Bd();
$bd->sql = "SELECT * FROM ua_carreras order by nombre";
//echo "SELECT * FROM ua_carreras order by nombre";
$bd->ejecutar();
?>
<select id="carrera<?php echo $id ?>" name="carrera<?php echo $id ?>" >
      <option value='0' selected>CARRERA</option>
      <?php
     while($row = $bd->fetch_row()){
		 	if($caid==$row['id']){$sel1="selected";}else{$sel1="";}	 
		 ?>
      <option value="<?php echo $row['id'] ?>" <?php echo $sel1 ?>><?php echo $row['nombre'] ?></option>
      <?php
     }
    ?>
</select>