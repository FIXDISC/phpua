<?php
class Conexion{
  var $conect;  
  function Conexion(){	//Constructor
  }

  function conectar() {
   if(!($con=@mysql_connect("localhost","root","apolo0"))){ 
//   if(!($con=@mysql_connect("localhost","ee000478_fixdisc","Apolo011"))){ 
    echo"Error al conectar a la base de datos"; 
    exit();
   }
   if (!@mysql_select_db("autonoma",$con)) {  
//   if (!@mysql_select_db("ee000478_fixdisc",$con)) {   
    echo "Error al seleccionar la base de datos"; 
    exit();
   }
   $this->conect=$con;
   return true; 
  }
 }



class Consulta {
var $consult;
var $arrays;
     function Consulta($query) {
     $this->consult = $query;
     $cargar = mysql_query($this->consult);
     $this->arrays = $cargar;
     return $this->arrays;
}
function Array_Consulta() {
     $row = mysql_fetch_array($this->arrays);
     return $row;
     }
}
?>