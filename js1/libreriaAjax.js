// Creación del objeto XMLHttpRequest.
us_val=0;
cont_inicial="";

function foco(){
    contenedor = document.getElementById('usuario');
	contenedor.focus();
}

function nuevoAjax(xmlhttp){
     try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP.5.0");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}
 
function cargarLogin(pagina,destino){
    var contenedor;
    var ajax;
    contenedor = document.getElementById(destino);
    ajax = nuevoAjax(ajax);
    ajax.open("POST", pagina, true);
	
    ajax.onreadystatechange=function() {

        if (ajax.readyState==4) {
			if (ajax.responseText=="X"){
				contenedor = document.getElementById('head_login');
				contenedor.style.backgroundColor = "#B8492D";
				contenedor = document.getElementById('aviso');
				contenedor.innerHTML = "USUARIO Y/O CLAVE INCORRECTOS";
			}else{
				cargarContenido0(ajax.responseText,'data');	
			}
        }
    }
    ajax.send(null);
}


function cargarContenido(pagina,destino,par){
    var contenedor;
    var ajax;
	contenedor = document.getElementById(destino);
	ide = par.value;
	pagina = pagina+ide;	
    ajax = nuevoAjax(ajax);
    ajax.open("POST", pagina, true);
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText;
        }
    }
    ajax.send(null);
}

function cargarContenido1(pagina,destino){
	//alert(pagina);
    var contenedor;
    var ajax;
	contenedor = document.getElementById(destino);
		code = displayTime();
		pagina = pagina + "&code="+code;	
    ajax = nuevoAjax(ajax);
    ajax.open("POST", pagina, true);
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText;
        }
    }
    ajax.send(null);
}


function enviarFormulario(url, destino, formid){
		 //loading();
		 var Formulario = document.getElementById(formid);
         var longitudFormulario = Formulario.elements.length;
         var cadena = "";
         var sepCampos;
         sepCampos = "";
	
         for (var i=0; i <= Formulario.elements.length-1;i++) {
         cadena += sepCampos+Formulario.elements[i].name+'='+Formulario.elements[i].value;
         sepCampos="&";} 
		 pagina = url+"?"+cadena;
		 code = displayTime();
		 //pagina = pagina + "&code="+code;			 
		 cargarContenido3 (pagina, destino);
}


function enviarFormulario2(url, destino, formid){
	
		 var Formulario = document.getElementById(formid);
         var longitudFormulario = Formulario.elements.length;
         var cadena = "";
         var sepCampos;
         sepCampos = "";
         for (var i=0; i <= Formulario.elements.length-1;i++) {
         cadena += sepCampos+Formulario.elements[i].name+'='+encodeURI(Formulario.elements[i].value);
         sepCampos="&";}
		 pagina = url+"?"+cadena;
		 cargarContenido2 (pagina, destino);
}

function displayTime()
    {
        var localTime = new Date();
        var year= localTime.getYear();
        var month= localTime.getMonth() +1;
        var date = localTime.getDate();
        var hours = localTime .getHours();
        var minutes = localTime .getMinutes();
        var seconds = localTime .getSeconds();  
		var ran = Math.floor(Math.random()*110000000);
        var code = seconds+""+hours+""+minutes+""+year+""+date+""+month+""+ran;
		return code;
    } 
