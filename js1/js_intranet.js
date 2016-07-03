// JavaScript Document

$(document).ready(function(){
	//código a ejecutar cuando el DOM está listo para recibir instrucciones.
	/*******************todo lo que se haga en esta zona, se ejecutará al cargar la página*******************
	
	********************************************************************************************************/
 
});

function show_form(div, url){
	$(document).ready(function(){
		 //document.getElementById(div).innerHTML = '<img src="/Neociclo/cargando.php" />';
		 //$("#"+div).hide().load("cargando.php").fadeIn("fast");
		   document.getElementById(div).innerHTML="&nbsp;</br><img src=\"/Neociclo/images/cargando1.gif\" />";
         $("#"+div).load(url).fadeIn('fast');

	});
}