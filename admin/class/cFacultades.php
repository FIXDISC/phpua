<?php
include_once 'conex.php';

class cFacultades{
  public $id_area='',$nombre_area='';
    
  function cFacultades(){
  }

  public function consultar($ord,$dir){ 
   $con = new Conexion;
   if ($ord!=''){$query1=' order by '.$ord;}
   if ($dir!=''){$query1=$query1.' '.$dir;}
   if($con->conectar()==true){
		$query = "select * from ua_facultades ".$query1;
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
		 $query1 = "insert into ua_facultades (nombre) values ('$nombre')";
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
		$query = "update ua_facultades set nombre='$nombre' where id='$id'";	
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
		$query = "delete from ua_facultades where id='$id'";
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
