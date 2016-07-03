<?php
include_once 'conex.php';

class cDependencias{
  public $id_dependencia='',$nombre_dependencia='';
    
  function cDependencias(){
  }

  public function consultar($ord,$dir){ 
   $con = new Conexion;
   if ($ord!=''){$query1=' order by '.$ord;}else{$query1=' order by d.id';}
   if ($dir!=''){$query1=$query1.' '.$dir;}
   if($con->conectar()==true){
		$query = "select *, c.nombre as cnombre, d.nombre as nombre, d.id as id, d.direccion as d1, c.id as cid from ua_dependencias d, ua_campus c where d.campus = c.id ".$query1;
		//echo $query; exit();
		$result = @mysql_query($query);
			if(!($result = @mysql_query($query))){
			echo "Error en la consulta select"; 
			exit();}		
			
		if (!$result)
		 return false;
		else	 
		 return $result;
   }
  }
    
  public function agregar($nombre,$apellidop,$apellidom,$rut,$clave,$email){ 
   $con = new Conexion;
   if($con->conectar()==true){
		 $this->nombre_campus = $nombre;
		 $query1 = "insert into ua_dependencias (nombre) values ('$nombre')";
		//echo $query1;exit(); 		
				
			if(!($result1 = @mysql_query($query1))){
				echo "Error en la consulta insert";
				return false;  
				exit();
			}else{
				return '1';			
			}


   }
  }

  public function modificar($id, $nombre){   
   $con = new Conexion;
   if($con->conectar()==true){
		$query = "update ua_dependencias set nombre='$nombre' where id='$id'";	
		//echo $query; exit();
			if(!($result = @mysql_query($query))){
			echo "Error en la consulta"; 
			exit();}	
			
		if (!$result)
		 return false;
		else
		 return $result;
   }
  }


  public function eliminar($id){ 
   $con = new Conexion;
   if($con->conectar()==true){
		$query = "delete from ua_dependencias where id='$id'";
			if(!($result = @mysql_query($query))){
			echo "Error en la consulta delete"; 
			exit();}		
			
		if (!$result)
		 return false;
		else
		 return $result;
   }
  }

}


?>
