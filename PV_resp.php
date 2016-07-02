<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>:: UAUTONOMA ::</title>

<script src="http://code.createjs.com/easeljs-0.6.0.min.js"></script>
<script src="http://code.createjs.com/tweenjs-0.4.0.min.js"></script>
<script src="http://code.createjs.com/movieclip-0.6.0.min.js"></script>
<script src="http://code.createjs.com/preloadjs-0.3.0.min.js"></script>
<script src="PV_resp.js"></script>

<script src="js/libreria.js"></script>
<script src="js/libreriaAjax.js"></script>


<script>

var canvas, canvas1, stage, exportRoot;

function init() {
	canvas = document.getElementById("canvas");
	images = images||{};

	var manifest = [
		{src:"images/build.png", id:"build"},
		{src:"images/calles.png", id:"calles"},
		{src:"images/PLANO_UAPV_1.jpg", id:"PLANO_UAPV_1"},
		{src:"images/scan1.png", id:"scan1"}
	];

	var loader = new createjs.LoadQueue(false);
	loader.addEventListener("fileload", handleFileLoad);
	loader.addEventListener("complete", handleComplete);
	loader.loadManifest(manifest);
}

function handleFileLoad(evt) {
	if (evt.item.type == "image") { images[evt.item.id] = evt.result; }
}

function handleComplete() {
	exportRoot = new lib.PV();

	stage = new createjs.Stage(canvas);
	stage.addChild(exportRoot);
	stage.update();

	createjs.Ticker.setFPS(24);
	createjs.Ticker.addEventListener("tick", stage);
}

</script>
<link href="css/us.css" rel="stylesheet" type="text/css" />
</head>

<body onload="init();" style="background-color:#252324">
<table width="800" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="5" height="25" bgcolor="#393532">&nbsp;</td>
    <td bgcolor="#393532" style="text-align:left; font-size:18px;">CAMPUS  PROVIDENCIA</td>
  </tr>
</table>
	<div id='incidentes1' style="border: solid 1px #FFFFFF; width:300px; height:69px; visibility:visible; position:absolute; float:left; margin-top:7px; margin-left:492px; z-index:110;-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=0);filter: alpha(opacity=0);-moz-opacity: 0;-khtml-opacity:0;opacity:0; cursor:pointer" onMouseOver="out_menu1(); act_incidentes();" onMouseOut="des_incidentes();" onMouseMove="out_menu1()" class="shine" ></div>      
<div id="cont">
<canvas id="canvas" width="800" height="569" style="color:#FFFFFF; border:none; position:absolute; float:left; margin-top:0px; margin-left:0px; z-index:100;"></canvas>        
	<div id="pta" style="border:0; width:198px; visibility:hidden; position:absolute; float:left; margin-top:0px; margin-left:0px; z-index:100; -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=80);filter: alpha(opacity=80);-moz-opacity: 0.8;-khtml-opacity:0.8;opacity:0.8;"><img src="images/pta.png" width="800" height="569" id="pta"></div>   
  <div id="menu1" style="border:0; width:198px; visibility:visible; position:absolute; float:left; margin-top:0px; margin-left:0px; z-index:100; -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=90);filter: alpha(opacity=90);-moz-opacity: 0.9;-khtml-opacity:0.9;opacity:0.9;">
    <img id="plano" src="" width="800" height="569">
    </div>
  <iframe id="circ" style="visibility:hidden; height:65px; width: 60px; border:none; position:absolute; float:left; margin-top:0px; margin-left:0px; z-index:100;" frameborder="0" src="circ.html"></iframe>
  <div id='cuad' style="visibility:hidden; height:20px; width: 200px; border:1px #FFF solid; position:absolute; float:left; margin-top:0px; margin-left:0px; z-index:101; text-align:center; padding-top:5px; background-image: url(images/bg_div_black.png);" ></div>
  <iframe id='desc' style="visibility:visible; height:130px; width: 200px; border:1px #09F solid; position:absolute; float:left; margin-top:25px; margin-left:0px; z-index:101; text-align:center; padding-top:5px; background-image: url(images/bg_div_blue.png); -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=90);filter: alpha(opacity=90);-moz-opacity: 0.9;-khtml-opacity:0.9;opacity:0.9;"  ></iframe>  

  	<div id="menu1" style="border:0px; width:198px; visibility:visible; position:absolute; float:left; margin-top:0px; margin-left:0px; z-index:100; -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=90);filter: alpha(opacity=90);-moz-opacity: 0.9;-khtml-opacity:0.9;opacity:0.9;">
	<div id="incidentes" class="incidentes"></div>
   	  <img id="plano1" src="" width="800" height="569" usemap="#Map" onMouseMove="out_menu1()">
    </div>  
    <map name="Map">
      <area shape="poly" coords="230,121,239,163,262,159,254,116" href="PV_resp.php" onMouseOver="over_menu1('ca2.png',220,112,'Carlos Antúnez I: DOCENCIA')" onMouseOut="out_menu1()">
      <area shape="poly" coords="476,171,501,164,543,297,519,305,504,258,496,261,492,249,499,245,481,187,474,190,470,177,477,175" href="#" onMouseOver="over_menu1('pta.png',476,171,'P. de Valdivia: TORRE A')" onMouseOut="out_menu1()">
      <area shape="poly" coords="360,290,381,348,400,341,379,283" href="#" onMouseOver="over_menu1('ptb.png',350,270,'P. de Valdivia: TORRE B')" onMouseOut="out_menu1()">
      <area shape="poly" coords="418,194,427,221,475,206,467,178" href="#" onMouseOver="over_menu1('auditorio.png',420,170,'P. de Valdivia: AUDITORIO')" onMouseOut="out_menu1()">
      <area shape="poly" coords="463,280,455,254,414,267,424,293" href="#" onMouseOver="over_menu1('casino.png',420,240,'P. de Valdivia: CASINO')" onMouseOut="out_menu1()">
      <area shape="poly" coords="378,276,383,289,417,278,412,263" href="#" onMouseOver="over_menu1('dae.png',377,247,'P. de Valdivia: DAE')" onMouseOut="out_menu1()">
      <area shape="poly" coords="389,306,393,316,417,308,413,297" href="#" onMouseOver="over_menu1('laboratorio.png',377,280,'P. de Valdivia: LAB. DENTAL')" onMouseOut="out_menu1()">
    </map>        
</div>    
</body>
<script>
inc = document.getElementById('incidentes');
cargarContenido('tabla1.php','incidentes');
</script>
=======
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>:: UAUTONOMA ::</title>

<script src="http://code.createjs.com/easeljs-0.6.0.min.js"></script>
<script src="http://code.createjs.com/tweenjs-0.4.0.min.js"></script>
<script src="http://code.createjs.com/movieclip-0.6.0.min.js"></script>
<script src="http://code.createjs.com/preloadjs-0.3.0.min.js"></script>
<script src="PV_resp.js"></script>

<script src="js/libreria.js"></script>
<script src="js/libreriaAjax.js"></script>


<script>

var canvas, canvas1, stage, exportRoot;

function init() {
	canvas = document.getElementById("canvas");
	images = images||{};

	var manifest = [
		{src:"images/build.png", id:"build"},
		{src:"images/calles.png", id:"calles"},
		{src:"images/PLANO_UAPV_1.jpg", id:"PLANO_UAPV_1"},
		{src:"images/scan1.png", id:"scan1"}
	];

	var loader = new createjs.LoadQueue(false);
	loader.addEventListener("fileload", handleFileLoad);
	loader.addEventListener("complete", handleComplete);
	loader.loadManifest(manifest);
}

function handleFileLoad(evt) {
	if (evt.item.type == "image") { images[evt.item.id] = evt.result; }
}

function handleComplete() {
	exportRoot = new lib.PV();

	stage = new createjs.Stage(canvas);
	stage.addChild(exportRoot);
	stage.update();

	createjs.Ticker.setFPS(24);
	createjs.Ticker.addEventListener("tick", stage);
}

</script>
<link href="css/us.css" rel="stylesheet" type="text/css" />
</head>

<body onload="init();" style="background-color:#252324">
<table width="800" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="5" height="25" bgcolor="#393532">&nbsp;</td>
    <td bgcolor="#393532" style="text-align:left; font-size:18px;">CAMPUS  PROVIDENCIA</td>
  </tr>
</table>
	<div id='incidentes1' style="border: solid 1px #FFFFFF; width:300px; height:69px; visibility:visible; position:absolute; float:left; margin-top:7px; margin-left:492px; z-index:110;-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=0);filter: alpha(opacity=0);-moz-opacity: 0;-khtml-opacity:0;opacity:0; cursor:pointer" onMouseOver="out_menu1(); act_incidentes();" onMouseOut="des_incidentes();" onMouseMove="out_menu1()" class="shine" ></div>      
<div id="cont">
<canvas id="canvas" width="800" height="569" style="color:#FFFFFF; border:none; position:absolute; float:left; margin-top:0px; margin-left:0px; z-index:100;"></canvas>        
	<div id="pta" style="border:0; width:198px; visibility:hidden; position:absolute; float:left; margin-top:0px; margin-left:0px; z-index:100; -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=80);filter: alpha(opacity=80);-moz-opacity: 0.8;-khtml-opacity:0.8;opacity:0.8;"><img src="images/pta.png" width="800" height="569" id="pta"></div>   
  <div id="menu1" style="border:0; width:198px; visibility:visible; position:absolute; float:left; margin-top:0px; margin-left:0px; z-index:100; -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=90);filter: alpha(opacity=90);-moz-opacity: 0.9;-khtml-opacity:0.9;opacity:0.9;">
    <img id="plano" src="" width="800" height="569">
    </div>
  <iframe id="circ" style="visibility:hidden; height:65px; width: 60px; border:none; position:absolute; float:left; margin-top:0px; margin-left:0px; z-index:100;" frameborder="0" src="circ.html"></iframe>
  <div id='cuad' style="visibility:hidden; height:20px; width: 200px; border:1px #FFF solid; position:absolute; float:left; margin-top:0px; margin-left:0px; z-index:101; text-align:center; padding-top:5px; background-image: url(images/bg_div_black.png);" ></div>
  <iframe id='desc' style="visibility:visible; height:130px; width: 200px; border:1px #09F solid; position:absolute; float:left; margin-top:25px; margin-left:0px; z-index:101; text-align:center; padding-top:5px; background-image: url(images/bg_div_blue.png); -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=90);filter: alpha(opacity=90);-moz-opacity: 0.9;-khtml-opacity:0.9;opacity:0.9;"  ></iframe>  

  	<div id="menu1" style="border:0px; width:198px; visibility:visible; position:absolute; float:left; margin-top:0px; margin-left:0px; z-index:100; -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=90);filter: alpha(opacity=90);-moz-opacity: 0.9;-khtml-opacity:0.9;opacity:0.9;">
	<div id="incidentes" class="incidentes"></div>
   	  <img id="plano1" src="" width="800" height="569" usemap="#Map" onMouseMove="out_menu1()">
    </div>  
    <map name="Map">
      <area shape="poly" coords="230,121,239,163,262,159,254,116" href="PV_resp.php" onMouseOver="over_menu1('ca2.png',220,112,'Carlos Antúnez I: DOCENCIA')" onMouseOut="out_menu1()">
      <area shape="poly" coords="476,171,501,164,543,297,519,305,504,258,496,261,492,249,499,245,481,187,474,190,470,177,477,175" href="#" onMouseOver="over_menu1('pta.png',476,171,'P. de Valdivia: TORRE A')" onMouseOut="out_menu1()">
      <area shape="poly" coords="360,290,381,348,400,341,379,283" href="#" onMouseOver="over_menu1('ptb.png',350,270,'P. de Valdivia: TORRE B')" onMouseOut="out_menu1()">
      <area shape="poly" coords="418,194,427,221,475,206,467,178" href="#" onMouseOver="over_menu1('auditorio.png',420,170,'P. de Valdivia: AUDITORIO')" onMouseOut="out_menu1()">
      <area shape="poly" coords="463,280,455,254,414,267,424,293" href="#" onMouseOver="over_menu1('casino.png',420,240,'P. de Valdivia: CASINO')" onMouseOut="out_menu1()">
      <area shape="poly" coords="378,276,383,289,417,278,412,263" href="#" onMouseOver="over_menu1('dae.png',377,247,'P. de Valdivia: DAE')" onMouseOut="out_menu1()">
      <area shape="poly" coords="389,306,393,316,417,308,413,297" href="#" onMouseOver="over_menu1('laboratorio.png',377,280,'P. de Valdivia: LAB. DENTAL')" onMouseOut="out_menu1()">
    </map>        
</div>    
</body>
<script>
inc = document.getElementById('incidentes');
cargarContenido('tabla1.php','incidentes');
</script>
>>>>>>> origin/master
</html>