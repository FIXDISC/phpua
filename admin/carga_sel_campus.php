<?php
include_once 'class/Bd.php';
include_once 'phpfunc/func.php';

$id = $_GET['id'];
$cid = $_GET['cid'];
$bd = new Bd();
$bd->sql = "SELECT * FROM ua_campus order by nombre";
//echo "SELECT * FROM ua_campus order by nombre";
$bd->ejecutar();
?>
<select id="campus<?php echo $id ?>" name="campus<?php echo $id ?>" >
      <option value='0' selected>CAMPUS</option>
      <?php
     while($row = $bd->fetch_row()){
		 	if($cid==$row['id']){$sel1="selected";}else{$sel1="";}	 
		 ?>
      <option value="<?php echo $row['id'] ?>" <?php echo $sel1 ?>><?php echo c_sp($row['nombre']) ?></option>
      <?php
     }
    ?>
</select>