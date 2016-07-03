<?php
include_once 'conex.php';

class cCurso{
  public $id_curso='';
    
  function cCurso(){
  }

  public function consultar($ord,$dir){ 
   $con = new Conexion;
   if ($ord!=''){$query1=' order by '.$ord;}
   if ($dir!=''){$query1=$query1.' '.$dir;}
   if($con->conectar()==true){
		$query = "select * from cursos order by id asc";
		//echo $query; exit();
		$result = @mysql_query($query);
			if(!($result = @mysql_query($query))){
			echo "Error en la consulta"; 
			exit();}		
			
		if (!$result)
		 return false;
		else	 
		 return $result;
   }
  }

  public function consultar_activo(){ 
   $con = new Conexion;
   if($con->conectar()==true){
		$query = "select * from cursos where estado=1";
		//echo $query; exit();
		$result = @mysql_query($query);
			if(!($result = @mysql_query($query))){
			echo "Error en la consulta"; 
			exit();}		
			
		if (!$result)
		 return false;
		else	 
		 return $result;
   }
  }


  public function consultar_ant(){ 
   $con = new Conexion;
   if($con->conectar()==true){
		$query = "select * from cursos where estado=0 order by desde desc";
		//echo $query; exit();
		$result = @mysql_query($query);
			if(!($result = @mysql_query($query))){
			echo "Error en la consulta"; 
			exit();}		
			
		if (!$result)
		 return false;
		else	 
		 return $result;
   }
  }
  
        
  public function agregar($nombre,$lugar,$fecha,$desde,$hssta,$horario,$contenido){ 
   $con = new Conexion;
   if($con->conectar()==true){
		$query1 = "insert into cursos(nombre, lugar, fecha, desde, hasta, horario, contenido) values ('$nombre','$lugar','$fecha','$desde','$hssta','$horario','$contenido')";
		//echo $query1;exit(); 		
				
			if(!($result1 = @mysql_query($query1))){
				echo "Error en la consulta";
				return false;  
				exit();
			}else{
				return '1';			
			}


   }
  }

  public function modificar($id,$nombre,$lugar,$fecha_mod,$desde,$hasta,$horario,$contenido){   
   $con = new Conexion;
   if($con->conectar()==true){
		$query = "update cursos set nombre='$nombre', lugar='$lugar', fecha_mod='$fecha_mod', desde='$desde', hasta='$hasta', horario='$horario', contenido='$contenido' where id='$id'";	
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
		$query = "delete from cursos where id='$id'";
			if(!($result = @mysql_query($query))){
			echo "Error en la consulta"; 
			exit();}		
			
		if (!$result)
		 return false;
		else
		 return $result;
   }
  }


  public function activar($id){   
   $con = new Conexion;
   if($con->conectar()==true){
		$query = "update cursos set estado='1' where id='$id'";	
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

  public function desactivar($id){   
   $con = new Conexion;
   if($con->conectar()==true){
		$query = "update cursos set estado='0' where id='$id'";	
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


}
?>
