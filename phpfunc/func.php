<?php
function dia_semana($dds){
	if ($dds==0){$dds="Domingo";}
	if ($dds==1){$dds="Lunes";}
	if ($dds==2){$dds="Martes";}
	if ($dds==3){$dds="Miercoles";}
	if ($dds==4){$dds="Jueves";}
	if ($dds==5){$dds="Viernes";}
	if ($dds==6){$dds="Sábado";}
}

function mes_ano($dds){
if ($dds=='01'){$dds="Enero";}
if ($dds=='02'){$dds="Febrero";}
if ($dds=='03'){$dds="Marzo";}
if ($dds=='04'){$dds="Abril";}
if ($dds=='05'){$dds="Mayo";}
if ($dds=='06'){$dds="Junio";}
if ($dds=='07'){$dds="Julio";}
if ($dds=='08'){$dds="Agosto";}
if ($dds=='09'){$dds="Septiembre";}
if ($dds=='10'){$dds="Octubre";}
if ($dds=='11'){$dds="Noviembre";}
if ($dds=='12'){$dds="Diciembre";}
return $dds;
}

function cambiarFormatoFecha($fecha){ 
list($anio,$mes,$dia)=explode("-",$fecha); 
return $dia."-".$mes."-".$anio; 
} 

function invierteFormatoFecha($fecha){ 
list($dia,$mes,$anio)=explode("-",$fecha); 
return $anio."-".$mes."-".$dia; 
}

function invierteFormatoFecha1($fecha){ 
list($dia,$mes,$anio)=explode("/",$fecha); 
return $anio."-".$mes."-".$dia; 
}

function blanks($str){
while(strpos($str1," ") !== false && strpos($str1,"  ") !== false && strpos($str1,"   ") !== false){
    $str1 = str_replace(" ","", $str);
    $str1 = str_replace("  ","", $str);	
    $str1 = str_replace("   ","", $str);		
}
//echo "-".$str1."-<br>";
//return $str1;
}

function c_sp($str){
$str1 = iconv("utf-8", "iso-8859-1", $str);
return $str1;
}

function c_en($str){
$str1 = iconv("iso-8859-1", "utf-8", $str);
return $str1;
}

?>