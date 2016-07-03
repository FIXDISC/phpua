<?php
$id = $_GET['id'];
$tid = $_GET['tid'];
?>
<select id="tipo<?php echo $id ?>" name="tipo<?php echo $id ?>" >
      <option value='0' selected>TIPO</option>
      <?php
	  	if($tid==1){$sel1="selected";}else{$sel1="";}	 ?>
      <option value="1" <?php echo $sel1 ?>>ADMINISTRATIVO(A)</option>
      <?php
	  	if($tid==2){$sel1="selected";}else{$sel1="";}	 ?>
      <option value="2" <?php echo $sel1 ?>>DOCENTE</option> 
</select>