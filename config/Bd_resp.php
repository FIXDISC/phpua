<?php
	define("SERVER", "AUTONOMA"); //<----- es el ODBC, no el servidor!!!
	
//	define("BASE", "autonoma");
	define("BASE", "ee000478_fixdisc");
		
//	define("USUARIO", "root");}
	define("USUARIO", "ee000478_fixdisc");
	
	define("PASS", "apolo0");
	define("INDEX","http://localhost/UAUTONOMA/index.php/");
	class Bd{
		
		var $obd = NULL;
		var $rs = NULL;
		var $sql = "";
		
		function conectar(){
			$this->obd = odbc_connect(SERVER, USUARIO, PASS);				
		}
		
		function desconectar(){
			odbc_close($this->obd);
		}
		
		function ejecutar(){
			$resultado = odbc_exec($this->obd,$this->sql);
			$this->rs = $resultado;
		}
		
		function fetch_row(){
			return odbc_fetch_row($this->rs);
		}
		
		function resultado($i){
			try{
				return odbc_result($this->rs, $i);
			}catch(Exception $e){
				return $e->getMessage();
			}
		}
		
		function num_campos(){
			return odbc_num_fields($this->rs);
		}
		
		function nombre_campos($i){
			return odbc_field_name($this->rs,$i);
		}
		
		function row_count(){
			return odbc_num_rows($this->rs);
		}

			
		function fetch_array(){
			return odbc_fetch_array($this->rs);
		}
				
	}	
?>