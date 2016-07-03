<?php
include_once 'class/Bd.php';
include_once 'phpfunc/func.php';

$id = $_GET['id'];
$fid = $_GET['fid'];
$bd = new Bd();
$bd->sql = "SELECT * FROM ua_facultades order by nombre";
//echo "SELECT * FROM ua_facultad order by nombre";
$bd->ejecutar();
?>
<select name="facultad<?php echo $id ?>" id="facultad<?php echo $id ?>" >
      <option value='0' selected >FACULTAD</option>
      <?php
     while($row = $bd->fetch_row()){
		 	if($fid==$row['id']){$sel1="selected";}else{$sel1="";}	 
		 ?>
      <option value="<?php echo $row['id'] ?>" <?php echo $sel1 ?>><?php echo ($row['nombre']) ?></option>
      <?php
     }
    ?>
</select>