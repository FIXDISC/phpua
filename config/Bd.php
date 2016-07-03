<?php
	define("SERVER", "null"); //<----- es el ODBC, no el servidor!!!
	
	define("BASE", "");	define("USUARIO", "root");	define("PASS", "");
//	define("BASE", "ee000478_fixdisc"); define("USUARIO", "ee000478_fixdisc"); define("PASS", "Apolo011");	
	
	class Bd{
		
		var $obd = NULL;
		var $rs = NULL;
		var $sql = "";
		var $mysqli = "";

		function conectar(){
				if ($mysqli->connect_errno) {
					echo "Error al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				}
		}
		
		function desconectar(){
			$mysqli_close($mysqli);
		}
		
		function ejecutar(){
			$mysqli = new mysqli('/cloudsql/uautonoma-1244:ua-php', 'root', 'apolo0', 'UA');
			if (!$resultado = $mysqli->query($this->sql)){
				echo "Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error;	
				//echo $this->sql;
			}else{
				//$resultado = $mysqli->query($this->sql);
				//$row = 
			}
			//$resultado = odbc_exec($this->obd,$this->sql);
//			$resultado = $mysqli->query($this->sql);
			$this->rs = $resultado;
		}
		
		function fetch_row(){
			//return odbc_fetch_row($this->rs);
			return $this->rs->fetch_assoc();
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
			return mysqli_num_rows($this->rs);
		}

			
		function fetch_array(){
			return odbc_fetch_array($this->rs);
		}
				
	}	
?>