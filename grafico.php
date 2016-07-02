<<<<<<< HEAD
<?php
date_default_timezone_set("America/Santiago");
include_once('config/Bd.php');
include_once('phpfunc/func.php');

$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);

$hh = "8";
while($hh<20){
	$fecha = $fecha_act." ".$hh.":00:00";
	$fecha1 = $fecha_act." ".($hh+1).":00:00";
	$bd = new Bd();
	$bd->conectar();
	$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'";
	//echo "SELECT count FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'<br>";
	$bd->ejecutar();
	$row = $bd->fetch_row();
	$h[$hh] = $row['CONT'];
	$h_incidentes_hoy = $h_incidentes_hoy.$row['CONT'];
	if ($hh<19){$h_incidentes_hoy = $h_incidentes_hoy.",";}

	$bd->sql = "SELECT count(*) CONT FROM ua_log_estados where fecha>='$fecha' and fecha<='$fecha1' and accion='ESTADO TERMINADA'";
	//echo "SELECT count(*) CONT FROM ua_log_estados where fecha>='$fecha' and fecha<='$fecha1' and accion='ESTADO TERMINADA'<br>";
	$bd->ejecutar();
	$row = $bd->fetch_row();	
	$h[$hh] = $row['CONT'];
	$h_terminadas_hoy = $h_terminadas_hoy.$row['CONT'].",";

	$bd->sql = "SELECT count(*) CONT FROM ua_log_estados where fecha>='$fecha' and fecha<='$fecha1' and accion='ESTADO PENDIENTE'";
	//echo "SELECT count(*) CONT FROM ua_log_estados where fecha>='$fecha' and fecha<='$fecha1' and accion='ESTADO PENDIENTE'<br>";
	$bd->ejecutar();
	$row = $bd->fetch_row();	
	$h[$hh] = $row['CONT'];
	$h_pendientes_hoy = $h_pendientes_hoy.$row['CONT'].",";
	
	//echo "$h[$hh]<br>";
	$hh = $hh+1;
}

$fecha_1 = strtotime('+1 day',strtotime($fecha_act));
$fecha_11 = date("Y-m-d",$fecha_1);
$bd = new Bd();
$bd->conectar();
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha_act' and fecha<'$fecha_11'";
$bd->ejecutar();
	$row = $bd->fetch_row();
$tot_hoy = $row['CONT'];
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes";
$bd->ejecutar();
	$row = $bd->fetch_row();
$tot = $row['CONT'];

$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha_act' and fecha<'$fecha_11' and estado=1";
$bd->ejecutar();
	$row = $bd->fetch_row();
$pen_hoy = $row['CONT'];
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where estado=1";
$bd->ejecutar();
	$row = $bd->fetch_row();
$pen = $row['CONT'];


$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha_act' and fecha<'$fecha_11' and estado=2";
$bd->ejecutar();
	$row = $bd->fetch_row();
$cur_hoy = $row['CONT'];
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where estado=2";
$bd->ejecutar();
	$row = $bd->fetch_row();
$cur = $row['CONT'];

$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha_act' and fecha<'$fecha_11' and estado=3";
$bd->ejecutar();
	$row = $bd->fetch_row();
$fin_hoy = $row['CONT'];
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where estado=3";
$bd->ejecutar();
	$row = $bd->fetch_row();
$fin = $row['CONT'];
?>
<html>
<link href="css/us.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="js1/jquery.ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<script type="text/javascript" src="js/libreriaAjax.js"></script>
		<script type="text/javascript" src="js/valida_form.js"></script>        
		<script type="text/javascript" src="js1/jquery-1.9.1.js"></script>        
		<script type="text/javascript" src="js/js/highcharts.js"></script>
	    <script type="text/javascript" src="js/js/themes/grid.js"></script>
		<script type="text/javascript" src="js/js/modules/exporting.js"></script>
		<script type="text/javascript" src="js1/centrar.jQuery.js"></script>  

<script src="js1/jquery.ui/jquery-ui.js"></script>   
<script type="text/javascript">       
$(function () {
        $('#container3').highcharts({
            chart: {
                type: 'column',
				plotBackgroundColor: '#333333',
				backgroundColor: '#333333',
				style: {
					fontFamily: '"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif', // default font
					fontSize: '9px',
					color: '#FFFFFF'
				},
				marginTop: 5,
				marginBottom: 15,
				borderWidth: 0,
            },
			exporting: {
         		enabled: false
			},
			credits: {
         		enabled: false				
			},
			legend: {
				enabled: false
			},
            title: {
				text: '',
				style: {
					display: 'none'}
            },
            subtitle: {
				enabled: false
            },
            xAxis: {
				gridLineColor: '#333333',
				minorGridLineColor: '#333333',
				labels:{
				style:{color: '#FFFFFF'}	
				},
                categories: [
                    '8',
                    '9',
                    '10',
                    '11',
                    '12',
                    '13',
                    '14',
                    '15',
                    '16',
                    '17',
                    '18',
                    '19'
                ]
            },
            yAxis: {
			stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                },
				
				gridLineColor: '#171717',
				minorGridLineColor: '#292929',
                min: 0,
                title: {
                    text: 'INCIDENTES',
					style:{color: '#999999', fontSize: '11px'}
                },
				labels:{
					formatter: function() {return this.value;},					
					style:{color: '#FFFFFF', fontSize: '9px'}
				}
            },
            tooltip: {
                headerFormat: '<table><span style="font-size:10px">{point.key}</span>',
                pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:10px">{series.name}: </td>' +
                    '<td style="padding:0;font-size:10px;color:#000">{point.y:.1f}</td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: 
				[{
                name: 'INCIDENTES',
                data: [<?php echo $h_incidentes_hoy ?>],    
            }, {
                name: 'FINALIZADOS',
                data: [<?php echo $h_terminadas_hoy ?>]
    
            }, {
                name: 'PENDIENTES',
                data: [<?php echo $h_pendientes_hoy ?>]
    
            },]
        });
    });
</script> 
<html>
<div id="container3" style="height:94px; width: 300px; color:#FFFFFF"></div>
=======
<?php
date_default_timezone_set("America/Santiago");
include_once('config/Bd.php');
include_once('phpfunc/func.php');

$fecha_act = date("Y-m-d");
$hora = time(); 
$hora_act = date ("H:i", $hora);

$hh = "8";
while($hh<20){
	$fecha = $fecha_act." ".$hh.":00:00";
	$fecha1 = $fecha_act." ".($hh+1).":00:00";
	$bd = new Bd();
	$bd->conectar();
	$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'";
	//echo "SELECT count FROM ua_incidentes where fecha>='$fecha' and fecha<='$fecha1'<br>";
	$bd->ejecutar();
	$row = $bd->fetch_row();
	$h[$hh] = $row['CONT'];
	$h_incidentes_hoy = $h_incidentes_hoy.$row['CONT'];
	if ($hh<19){$h_incidentes_hoy = $h_incidentes_hoy.",";}

	$bd->sql = "SELECT count(*) CONT FROM ua_log_estados where fecha>='$fecha' and fecha<='$fecha1' and accion='ESTADO TERMINADA'";
	//echo "SELECT count(*) CONT FROM ua_log_estados where fecha>='$fecha' and fecha<='$fecha1' and accion='ESTADO TERMINADA'<br>";
	$bd->ejecutar();
	$row = $bd->fetch_row();	
	$h[$hh] = $row['CONT'];
	$h_terminadas_hoy = $h_terminadas_hoy.$row['CONT'].",";

	$bd->sql = "SELECT count(*) CONT FROM ua_log_estados where fecha>='$fecha' and fecha<='$fecha1' and accion='ESTADO PENDIENTE'";
	//echo "SELECT count(*) CONT FROM ua_log_estados where fecha>='$fecha' and fecha<='$fecha1' and accion='ESTADO PENDIENTE'<br>";
	$bd->ejecutar();
	$row = $bd->fetch_row();	
	$h[$hh] = $row['CONT'];
	$h_pendientes_hoy = $h_pendientes_hoy.$row['CONT'].",";
	
	//echo "$h[$hh]<br>";
	$hh = $hh+1;
}

$fecha_1 = strtotime('+1 day',strtotime($fecha_act));
$fecha_11 = date("Y-m-d",$fecha_1);
$bd = new Bd();
$bd->conectar();
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha_act' and fecha<'$fecha_11'";
$bd->ejecutar();
	$row = $bd->fetch_row();
$tot_hoy = $row['CONT'];
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes";
$bd->ejecutar();
	$row = $bd->fetch_row();
$tot = $row['CONT'];

$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha_act' and fecha<'$fecha_11' and estado=1";
$bd->ejecutar();
	$row = $bd->fetch_row();
$pen_hoy = $row['CONT'];
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where estado=1";
$bd->ejecutar();
	$row = $bd->fetch_row();
$pen = $row['CONT'];


$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha_act' and fecha<'$fecha_11' and estado=2";
$bd->ejecutar();
	$row = $bd->fetch_row();
$cur_hoy = $row['CONT'];
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where estado=2";
$bd->ejecutar();
	$row = $bd->fetch_row();
$cur = $row['CONT'];

$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where fecha>='$fecha_act' and fecha<'$fecha_11' and estado=3";
$bd->ejecutar();
	$row = $bd->fetch_row();
$fin_hoy = $row['CONT'];
$bd->sql = "SELECT count(*) CONT FROM ua_incidentes where estado=3";
$bd->ejecutar();
	$row = $bd->fetch_row();
$fin = $row['CONT'];
?>
<html>
<link href="css/us.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="js1/jquery.ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<script type="text/javascript" src="js/libreriaAjax.js"></script>
		<script type="text/javascript" src="js/valida_form.js"></script>        
		<script type="text/javascript" src="js1/jquery-1.9.1.js"></script>        
		<script type="text/javascript" src="js/js/highcharts.js"></script>
	    <script type="text/javascript" src="js/js/themes/grid.js"></script>
		<script type="text/javascript" src="js/js/modules/exporting.js"></script>
		<script type="text/javascript" src="js1/centrar.jQuery.js"></script>  

<script src="js1/jquery.ui/jquery-ui.js"></script>   
<script type="text/javascript">       
$(function () {
        $('#container3').highcharts({
            chart: {
                type: 'column',
				plotBackgroundColor: '#333333',
				backgroundColor: '#333333',
				style: {
					fontFamily: '"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif', // default font
					fontSize: '9px',
					color: '#FFFFFF'
				},
				marginTop: 5,
				marginBottom: 15,
				borderWidth: 0,
            },
			exporting: {
         		enabled: false
			},
			credits: {
         		enabled: false				
			},
			legend: {
				enabled: false
			},
            title: {
				text: '',
				style: {
					display: 'none'}
            },
            subtitle: {
				enabled: false
            },
            xAxis: {
				gridLineColor: '#333333',
				minorGridLineColor: '#333333',
				labels:{
				style:{color: '#FFFFFF'}	
				},
                categories: [
                    '8',
                    '9',
                    '10',
                    '11',
                    '12',
                    '13',
                    '14',
                    '15',
                    '16',
                    '17',
                    '18',
                    '19'
                ]
            },
            yAxis: {
			stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                },
				
				gridLineColor: '#171717',
				minorGridLineColor: '#292929',
                min: 0,
                title: {
                    text: 'INCIDENTES',
					style:{color: '#999999', fontSize: '11px'}
                },
				labels:{
					formatter: function() {return this.value;},					
					style:{color: '#FFFFFF', fontSize: '9px'}
				}
            },
            tooltip: {
                headerFormat: '<table><span style="font-size:10px">{point.key}</span>',
                pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:10px">{series.name}: </td>' +
                    '<td style="padding:0;font-size:10px;color:#000">{point.y:.1f}</td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: 
				[{
                name: 'INCIDENTES',
                data: [<?php echo $h_incidentes_hoy ?>],    
            }, {
                name: 'FINALIZADOS',
                data: [<?php echo $h_terminadas_hoy ?>]
    
            }, {
                name: 'PENDIENTES',
                data: [<?php echo $h_pendientes_hoy ?>]
    
            },]
        });
    });
</script> 
<html>
<div id="container3" style="height:94px; width: 300px; color:#FFFFFF"></div>
>>>>>>> origin/master
</html>