<?php
include_once 'class/Bd.php';
include_once 'phpfunc/func.php';

$id = $_GET['id'];
$did = $_GET['did'];
$bd = new Bd();
$bd->sql = "SELECT * FROM ua_dependencias order by nombre";
//echo "SELECT * FROM ua_dependencia order by nombre";
$bd->ejecutar();
?>
<select name="dependencia<?php echo $id ?>" id="dependencia<?php echo $id ?>" >
      <option value='0' selected >DEPENDENCIA</option>
      <?php
     while($row = $bd->fetch_row()){
		 	if($did==$row['id']){$sel1="selected";}else{$sel1="";}	 
		 ?>
      <option value="<?php echo $row['id'] ?>" <?php echo $sel1 ?>><?php echo c_sp($row['nombre']) ?></option>
      <?php
     }
    ?>
</select>