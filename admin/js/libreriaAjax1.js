// Creación del objeto XMLHttpRequest.
us_val=0;
cont_inicial="";
menu_sel=0;

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


function cargarContenido0(pagina,destino,par){ // NUEVA PAGINA
    var contenedor;
    var ajax;
	contenedor = document.getElementById(destino);				
    ajax = nuevoAjax(ajax);
	code = displayTime();
	pagina = pagina + "&code="+code;
	//alert (pagina);
	window.location = pagina;
	//cargarContenido1('carga_sel_pozos.php','div_pozos');

}

function cargarContenido(pagina,destino){ //PAGINA CONTENIDO
    var contenedor;
    var ajax;
	contenedor = window.document.getElementById(destino);
	//alert(pagina);	
    ajax = nuevoAjax(ajax);
    ajax.open("GET", pagina, true);
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText;
        }
    }
    ajax.send(null);
}

function cierra_det(obj){
contenedor = document.getElementById(obj);
contenedor.innerHTML = "";
	}

function cargarContenido1(pagina,destino){
//	alert(pagina);
    var contenedor;
    var ajax;
	contenedor = document.getElementById(destino);
		code = displayTime();
		pagina = pagina + "&code="+code;	
    ajax = nuevoAjax(ajax);
    ajax.open("POST", pagina, true);
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
			if (ajax.responseText == "X"){
				if (destino.substr(0,3)=="a_t"){
				alert("Ya existe un rango que contiene la profundidad ingresada.");return;}
				if (destino.substr(0,3)=="a_c"){
				alert("Ya existe un contrato con ese codigo.");return;}
				if (destino.substr(0,3)=="a_b"){
				alert("Ya existe el pozo para el contrato.");return;}				
			
			}		
			contenedor.innerHTML = ajax.responseText;			
        }
    }
    ajax.send(null);
}



function cargarInformes(pagina,destino,par){
    var contenedor;
    var ajax;
	//alert(pagina);
	contenedor = document.getElementById(destino);
	if (pagina=="reporte_dia_x_proyecto.php" || pagina=="reporte_semana_x_proyecto.php" || pagina=="reporte_diario_semana_x_proyecto.php" || pagina=="reporte_dia_x_turno.php"){
		contenedor1 = document.getElementById('cont_extra');
		
			if (pagina=="reporte_semana_x_proyecto.php" || pagina=="reporte_diario_semana_x_proyecto.php"){
				str = activa_fecha1(pagina);
			}else{
				str = activa_fecha(pagina);	
			}
		contenedor1.innerHTML =  str;
		desde = document.getElementById("desde1").value;
		hasta= document.getElementById("hasta1").value;
		if (desde==""){desde=fecha_esp;hasta=fecha_esp;}
		pagina = pagina + "?desde="+desde+"&hasta="+hasta;
	}else{
		contenedor1 = document.getElementById('cont_extra');
		str = activa_agno(pagina);		
		contenedor1.innerHTML =  str;
		contenedor4 = document.getElementById("agno");			
		pagina = pagina + "?agno="+contenedor4.value;				
	}
	//alert(pagina);	
    ajax = nuevoAjax(ajax);
    ajax.open("POST", pagina, true);
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText;
        }
    }
    ajax.send(null);
}


function grafica(pagina,destino,par){
    var contenedor;
    var ajax;
	contenedor = document.getElementById('plantilla');
	pagina= "gr_"+contenedor.value;
	//alert(pagina);
	if(pagina=="gr_blank.php?proyecto="){alert("Debe seleccionar un Informe de la lista"); return;}
	if(pagina=='gr_reporte_dia_x_proyecto.php' || pagina=='gr_reporte_semana_x_proyecto.php' || pagina=='gr_reporte_diario_semana_x_proyecto.php' || pagina=="gr_reporte_dia_x_turno.php"){
		desde = document.getElementById('desde1').value;
		hasta = document.getElementById('hasta1').value;
		pagina=pagina+"?desde="+desde+"&hasta="+hasta;	
		}else{
		agno = document.getElementById('agno').value;
		pagina=pagina+"?agno="+agno;		
	}
	contenedor = document.getElementById('cont_graf');
	//alert(pagina);
	//contenedor1 = document.getElementById('temp');
	//contenedor1.innerHTML = pagina;
	contenedor.innerHTML = "<iframe id='graf' src='"+pagina+"' style='width:100%;height:550px;' seamless></iframe>";	
}

function grafica_det(pagina,destino,par){
    var contenedor;
    var ajax;
	obj = "serie_"+par;
	contenedor = document.getElementById(obj);
	agno = document.getElementById('agno').value;
	pagina = pagina + "?serie="+contenedor.value+"&mes="+par+"&agno="+agno;
	//alert(pagina);
	contenedor = document.getElementById('cont_graf');
	//alert(pagina);
	//contenedor1 = document.getElementById('temp');
	//contenedor1.innerHTML = pagina;
	contenedor.innerHTML = "<iframe id='graf' src='"+pagina+"' style='width:100%;height:450px;' seamless></iframe>";	
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


function enviarFormulario2(url, destino, formid, fila){
		 //loading();
		 var Formulario = document.getElementById(formid);
         var longitudFormulario = Formulario.elements.length;
		 //alert (Formulario.elements[0].id);return;
         var cadena = "";
         var sepCampos;
         sepCampos = "";
         for (var i=0; i <= Formulario.elements.length-1;i++) {
			 cadena += sepCampos+Formulario.elements[i].id+'='+encodeURI(Formulario.elements[i].value);
			 sepCampos="&";}
		 pagina = url+"?"+cadena;
		 if (url=="modifica_reporte.php"){
			 id = document.getElementById("id"+fila).value;
			 turnoa = document.getElementById("turnoa"+fila).value;
 			 turnob = document.getElementById("turnob"+fila).value;
			 pagina = url+"?id="+id+"&turnoa="+turnoa+"&turnob="+turnob;
			 }
		 code = displayTime();
		 pagina = pagina + "&code="+code;
		 //alert (pagina);
		 cargarContenido1 (pagina, destino);
		 //c_loading();	 
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
	
function oculta_menu(){
	contenedor = document.getElementById('menu');
	contenedor.style.visibility = "hidden";
}	

function muestra_menu(){
	contenedor = document.getElementById('menu');
	contenedor.style.visibility = "visible";
}

function muestra_a_incidente(fecha,hora){
	contenedor=document.getElementById('con_fecha');
	contenedor.innerHTML=fecha;
	contenedor=document.getElementById('con_hora');
	contenedor.innerHTML=hora;
	contenedor=document.getElementById('con_usuario');
	contenedor.innerHTML="<input name='usuario' type='text' id='usuario' size='10' onkeypress='auto_usuario()' onblur='carga_usuario(this)' >";
	contenedor=document.getElementById('con_area');
	contenedor.innerHTML="<input name='area' type='text' id='area' size='10' onkeypress='auto_area()' >";
	contenedor=document.getElementById('con_incidente');
	contenedor.innerHTML="<input name='incidente' type='text' id='incidente' size='10' onkeypress='auto_incidente()' >";
	contenedor=document.getElementById('con_tipo');
	contenedor.innerHTML="<select name='tipo' id='tipo'><option value='1'>HARDWARE</option></select>";
	contenedor=document.getElementById('con_impacto');
	contenedor.innerHTML="<select name='impacto' id='impacto'><option value='1'>GLOBAL</option></select>";
	contenedor=document.getElementById('con_encargado');
	contenedor.innerHTML="<select name='encargado' id='encargado'><option value='0'>SIN ENCARGADO</option></select>";
	contenedor=document.getElementById('con_causa');
	contenedor.innerHTML="<input name='causa' type='text' id='causa' size='10' onkeypress=auto_causa('') >";
	contenedor=document.getElementById('con_accion');
	contenedor.innerHTML="<input name='accion' type='text' id='accion' size='10' onkeypress=auto_accion('') >";	
	contenedor=document.getElementById('con_guardar');
	contenedor.innerHTML="<table><tr><td style='text-align:center'><img src='img/mas.jpg' width='26' height='26' onclick=valida_incidente('form1','',1);cargarContenido1('incidentes.php?id=0','contenido');carga_up(); style='cursor:pointer'></td><td><img src='img/cancelar.jpg' width='26' height='26' onclick=cargarContenido('incidentes.php?id=0','contenido'); style='cursor:pointer'></td></tr></table>";	
}

function muestra_a_inventario(fecha,hora){
	contenedor=document.getElementById('con_fecha');
	contenedor.innerHTML=fecha;
	contenedor=document.getElementById('con_hora');
	contenedor.innerHTML=hora;
	contenedor=document.getElementById('con_ip');
	contenedor.innerHTML="<input name='ip' type='text' id='ip' size='10' maxlength='15' onkeypress='auto_ip(this.id)'>";
	contenedor=document.getElementById('con_nombre');
	contenedor.innerHTML="<input name='nombre' type='text' id='nombre' size='20' maxlength='25' onkeypress='auto_nombrei(this.id)'>";	
	contenedor=document.getElementById('con_marca');
	contenedor.innerHTML="<input name='marca' type='text' id='marca' size='10' maxlength='20' onkeypress='auto_marca(this.id)'>";	
	contenedor=document.getElementById('con_modelo');
	contenedor.innerHTML="<input name='modelo' type='text' id='modelo' size='10' maxlength='20' onkeypress='auto_modelo(this.id)'>";	
	contenedor=document.getElementById('con_procesa');
	contenedor.innerHTML="<input name='procesa' type='text' id='procesa' size='10' maxlength='20' onkeypress='auto_procesa(this.id)'>";	
	contenedor=document.getElementById('con_hdd');
	contenedor.innerHTML="<input name='hdd' type='text' id='hdd' size='3' maxlength='5' onkeypress='auto_hdd(this.id)'>";		
	contenedor=document.getElementById('con_ram');
	contenedor.innerHTML="<input name='ram' type='text' id='ram' size='3' maxlength='5' onkeypress='auto_ram(this.id)'>";			
	contenedor=document.getElementById('con_serie');
	contenedor.innerHTML="<input name='serie' type='text' id='serie' size='15' maxlength='25' onkeypress='auto_serie(this.id)'>";				
	contenedor=document.getElementById('con_activo');
	contenedor.innerHTML="<input name='activo' type='text' id='activo' size='6' maxlength='10' onkeypress='auto_activo(this.id)'>";					
	contenedor=document.getElementById('con_horas');
	contenedor.innerHTML="<input name='horas' type='text' id='horas' size='3' maxlength='5' onkeypress='auto_horas(this.id)'>";						
	contenedor=document.getElementById('con_estado');	
	pagina = carga_filtro();	
	contenedor.innerHTML="<table><tr><td style='text-align:center'><img src='img/mas.jpg' width='26' height='26' onclick=valida_inventario('form1','',1); style='cursor:pointer'></td><td><input id='n_item' type='text' size='2' maxlength='2'></td><td><img src='img/cancelar.jpg' width='26' height='26' onclick=cargarContenido('"+pagina+"','contenido'); style='cursor:pointer'></td></tr></table>";	
}

function muestra_a_campus(fecha,hora){
	contenedor=document.getElementById('con_nombre');
	contenedor.innerHTML="<input name='nombre' type='text' id='nombre' size='10' onkeypress='auto_campus()'>";
	contenedor=document.getElementById('con_direc');
	contenedor.innerHTML="<input name='direccion' type='text' id='direccion' size='10'>";
	contenedor=document.getElementById('con_guardar');
	contenedor.innerHTML="<table><tr><td style='text-align:center'><img src='img/mas.jpg' width='26' height='26' onclick=valida_campus('form1','',1); style='cursor:pointer'></td><td><img src='img/cancelar.jpg' width='26' height='26' onclick=cargarContenido('admin/listado_campus.php','contenido'); style='cursor:pointer'></td></tr></table>";	
}

function muestra_a_dependencia(fecha,hora){
	contenedor=document.getElementById('con_nombre');contenedor.innerHTML="<input name='nombre' type='text' id='nombre' size='10' onkeypress='auto_dependencia()' >";
	contenedor=document.getElementById('con_nombre_corto');contenedor.innerHTML="<input name='nombre_corto' type='text' id='nombre_corto' size='10' onkeypress='auto_dependencia_corto()' >";
	contenedor=document.getElementById('con_direc');contenedor.innerHTML="<input name='direccion' type='text' id='direccion' size='10'>";	
	contenedor=document.getElementById('con_guardar');
	contenedor.innerHTML="<table><tr><td style='text-align:center'><img src='img/mas.jpg' width='26' height='26' onclick=valida_dependencia('form1','',1); style='cursor:pointer'></td><td><img src='img/cancelar.jpg' width='26' height='26' onclick=cargarContenido('admin/listado_dependencias.php','contenido'); style='cursor:pointer'></td></tr></table>";	
}

function muestra_a_area(fecha,hora){
	contenedor=document.getElementById('con_nombre');contenedor.innerHTML="<input name='nombre' type='text' id='nombre' size='10' onkeypress='auto_dependencia()' >";
	contenedor=document.getElementById('con_nombre_corto');contenedor.innerHTML="<input name='nombre_corto' type='text' id='nombre_corto' size='10' onkeypress='auto_dependencia_corto()' >";
	contenedor=document.getElementById('con_guardar');
	contenedor.innerHTML="<table><tr><td style='text-align:center'><img src='img/mas.jpg' width='26' height='26' onclick=valida_area('form1','',1); style='cursor:pointer'></td><td><img src='img/cancelar.jpg' width='26' height='26' onclick=cargarContenido('admin/listado_areas.php','contenido'); style='cursor:pointer'></td></tr></table>";	
}

function muestra_a_facultad(fecha,hora){
	contenedor=document.getElementById('con_nombre');contenedor.innerHTML="<input name='nombre' type='text' id='nombre' size='10' onkeypress='auto_dependencia()' >";
	contenedor=document.getElementById('con_nombre_corto');contenedor.innerHTML="<input name='nombre_corto' type='text' id='nombre_corto' size='10' onkeypress='auto_dependencia_corto()' >";
	contenedor=document.getElementById('con_guardar');
	contenedor.innerHTML="<table><tr><td style='text-align:center'><img src='img/mas.jpg' width='26' height='26' onclick=valida_facultad('form1','',1); style='cursor:pointer'></td><td><img src='img/cancelar.jpg' width='26' height='26' onclick=cargarContenido('admin/listado_facultades.php','contenido'); style='cursor:pointer'></td></tr></table>";	
}

function muestra_a_carrera(fecha,hora){
	contenedor=document.getElementById('con_nombre');contenedor.innerHTML="<input name='nombre' type='text' id='nombre' size='10' onkeypress='auto_dependencia()' >";
	contenedor=document.getElementById('con_nombre_corto');contenedor.innerHTML="<input name='nombre_corto' type='text' id='nombre_corto' size='10' onkeypress='auto_dependencia_corto()' >";
	contenedor=document.getElementById('con_guardar');
	contenedor.innerHTML="<table><tr><td style='text-align:center'><img src='img/mas.jpg' width='26' height='26' onclick=valida_carrera('form1','',1); style='cursor:pointer'></td><td><img src='img/cancelar.jpg' width='26' height='26' onclick=cargarContenido('admin/listado_carreras.php','contenido'); style='cursor:pointer'></td></tr></table>";	
}


function muestra_a_zona(fecha,hora){
	contenedor=document.getElementById('con_nombre');contenedor.innerHTML="<input name='nombre' type='text' id='nombre' size='10' onkeypress='auto_dependencia()' >";
	contenedor=document.getElementById('con_nombre_corto');contenedor.innerHTML="<input name='nombre_corto' type='text' id='nombre_corto' size='10' onkeypress='auto_dependencia_corto()' >";
	contenedor=document.getElementById('con_guardar');
	contenedor.innerHTML="<table><tr><td style='text-align:center'><img src='img/mas.jpg' width='26' height='26' onclick=valida_zona('form1','',1); style='cursor:pointer'></td><td><img src='img/cancelar.jpg' width='26' height='26' onclick=cargarContenido('admin/listado_zonas.php','contenido'); style='cursor:pointer'></td></tr></table>";	
}

function muestra_a_usuario(fila){
		contenedor=document.getElementById('con_nombre');contenedor.innerHTML="<input name='nombre' type='text' id='nombre' size='10' maxlength='30' onkeypress='auto_nombre()' >";
		contenedor=document.getElementById('con_apellidop');contenedor.innerHTML="<input name='apellidop' type='text' id='apellidop' size='10' maxlength='30' onkeypress='auto_apellidop()' >";
		contenedor=document.getElementById('con_apellidom');contenedor.innerHTML="<input name='apellidom' type='text' id='apellidom' size='10' maxlength='30' onkeypress='auto_apellidom()' >";
		cargarContenido('admin/carga_sel_tipoarea.php','con_tipo');	
		cargarContenido('admin/carga_sel_cargos.php','con_cargo');
		cargarContenido('admin/carga_sel_areas.php','con_area');																				
		cargarContenido('admin/carga_sel_carreras.php','con_carrera');																						
		contenedor=document.getElementById('con_anexo');contenedor.innerHTML="<input name='anexo' type='text' id='anexo' size='10' maxlength='10' onkeypress='auto_anexo()' >";
		contenedor=document.getElementById('con_ip');contenedor.innerHTML="<input name='ip' type='text' id='ip' size='10' maxlength='10' onkeypress='auto_ip()' >";
		contenedor=document.getElementById('con_guardar');		
		contenedor.innerHTML="<table><tr><td style='text-align:center'><img src='img/mas.jpg' width='26' height='26' onclick=valida_usuario1('form1','',1); style='cursor:pointer'></td><td><img src='img/cancelar.jpg' width='26' height='26' onclick=cargarContenido('admin/listado_usuarios.php','contenido'); style='cursor:pointer'></td></tr></table>";	
}

function muestra_a_cargo(fecha,hora){
	contenedor=document.getElementById('con_nombre');contenedor.innerHTML="<input name='nombre' type='text' id='nombre' size='10' onkeypress='auto_cargo()' >";
	contenedor=document.getElementById('con_nombre_largo');contenedor.innerHTML="<input name='nombre_largo' type='text' id='nombre_largo' size='10' onkeypress='auto_cargo_largo()' >";
	contenedor=document.getElementById('con_guardar');
	contenedor.innerHTML="<table><tr><td style='text-align:center'><img src='img/mas.jpg' width='26' height='26' onclick=valida_cargo('form1','',1); style='cursor:pointer'></td><td><img src='img/cancelar.jpg' width='26' height='26' onclick=cargarContenido('admin/listado_cargos.php','contenido'); style='cursor:pointer'></td></tr></table>";	
}

function muestra_a_item(fila){
		contenedor=document.getElementById('con_nombre');contenedor.innerHTML="<input name='nombre' type='text' id='nombre' size='10' maxlength='30' onkeypress='auto_nombre()' >";
		contenedor=document.getElementById('con_nombre_corto');contenedor.innerHTML="<input name='nombre_corto' type='text' id='nombre_corto' size='10' maxlength='30' onkeypress='auto_apellidop()' >";
		contenedor=document.getElementById('con_marca');contenedor.innerHTML="<input name='marca' type='text' id='marca' size='10' maxlength='30' onkeypress='auto_apellidom()' >";
		contenedor=document.getElementById('con_modelo');contenedor.innerHTML="<input name='modelo' type='text' id='modelo' size='10' maxlength='30' onkeypress='auto_apellidom()' >";		
		contenedor=document.getElementById('con_guardar');		
		contenedor.innerHTML="<table><tr><td style='text-align:center'><img src='img/mas.jpg' width='26' height='26' onclick=valida_item('form1','',1); style='cursor:pointer'></td><td><img src='img/cancelar.jpg' width='26' height='26' onclick=cargarContenido('admin/listado_items.php','contenido'); style='cursor:pointer'></td></tr></table>";	
}

function EditaFila_campus(fila){
		contenedor=document.getElementById('con_nombre'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='nombre"+fila+"' type='text' size='10' maxlength='30' value='"+val1+"'/>";
		contenedor=document.getElementById('con_direc'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='direccion"+fila+"' type='text' size='10' maxlength='40' value='"+val1+"'/>";
		contenedor=document.getElementById('con_modificar'+fila);
		contenedor.innerHTML="<table border='0' cellpadding='0' cellspacing='0' style='color:#FFF'><tr><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td><td width='160' height='25' bgcolor='#FF9900' style = 'text-align:center; cursor:pointer;' onclick=valida_campus('form2','"+fila+"','2')>MODIFICAR</td><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td></tr></table>";
		contenedor=document.getElementById('con_eliminar'+fila);
		contenedor.innerHTML="<table border='0' cellpadding='0' cellspacing='0' style='color:#FFF'><tr><td width='10' height='25' style='text-align:center; cursor:pointer;'>&nbsp;</td><td width='160' bgcolor='#E32402' style='text-align:center; cursor:pointer;' onclick=cargarContenido('admin/listado_campus.php?id=0','contenido'); >CANCELAR</td><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td></tr></table>";		
}

function EditaFila_dependencia(fila){
		contenedor=document.getElementById('con_nombre'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='nombre"+fila+"' type='text' size='10' maxlength='30' value='"+val1+"'/>";
		contenedor=document.getElementById('con_nombre_corto'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='nombre_corto"+fila+"' type='text' size='10' maxlength='30' value='"+val1+"'/>";				
		contenedor=document.getElementById('con_direc'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='direccion"+fila+"' type='text' size='10' maxlength='40' value='"+val1+"'/>";						
		cid=document.getElementById('cid'+fila).value;
		cargarContenido('admin/carga_sel_campus.php?id='+fila+"&cid="+cid,'con_campus'+fila);	
		contenedor=document.getElementById('con_modificar'+fila);
		contenedor.innerHTML="<table border='0' cellpadding='0' cellspacing='0'  style='color:#FFF'><tr><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td><td width='160' height='25' bgcolor='#FF9900' style = 'text-align:center; cursor:pointer;' onclick=valida_dependencia('form1','"+fila+"','2')>MODIFICAR</td><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td></tr></table>";
		contenedor=document.getElementById('con_eliminar'+fila);
		contenedor.innerHTML="<table border='0' cellpadding='0' cellspacing='0' style='color:#FFF'><tr><td width='10' height='25' style='text-align:center; cursor:pointer;'>&nbsp;</td><td width='160' bgcolor='#E32402' style='text-align:center; cursor:pointer;' onclick=cargarContenido('admin/listado_dependencias.php?id=0','contenido'); >CANCELAR</td><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td></tr></table>";		
}

function EditaFila_area(fila){
		contenedor=document.getElementById('con_nombre'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='nombre"+fila+"' type='text' size='10' maxlength='45' value='"+val1+"'/>";
		contenedor=document.getElementById('con_nombre_corto'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='nombre_corto"+fila+"' type='text' size='10' maxlength='30' value='"+val1+"'/>";				
		cid=document.getElementById('cid'+fila).value;
		did=document.getElementById('did'+fila).value;		
		tid=document.getElementById('tid'+fila).value;
		cargarContenido('admin/carga_sel_campus.php?id='+fila+"&cid="+cid,'con_campus'+fila);	
		cargarContenido('admin/carga_sel_dependencia.php?id='+fila+"&did="+did,'con_dependencia'+fila);				
		cargarContenido('admin/carga_sel_tipoarea.php?id='+fila+"&tid="+tid,'con_tipo'+fila);		
		contenedor=document.getElementById('con_modificar'+fila);
		contenedor.innerHTML="<table border='0' cellpadding='0' cellspacing='0'  style='color:#FFF'><tr><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td><td width='160' height='25' bgcolor='#FF9900' style = 'text-align:center; cursor:pointer;' onclick=valida_area('form1','"+fila+"','2')>MODIFICAR</td><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td></tr></table>";
		contenedor=document.getElementById('con_eliminar'+fila);
		contenedor.innerHTML="<table border='0' cellpadding='0' cellspacing='0' style='color:#FFF'><tr><td width='10' height='25' style='text-align:center; cursor:pointer;'>&nbsp;</td><td width='160' bgcolor='#E32402' style='text-align:center; cursor:pointer;' onclick=cargarContenido('admin/listado_areas.php?id=0','contenido'); >CANCELAR</td><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td></tr></table>";		
}

function EditaFila_facultad(fila){
		contenedor=document.getElementById('con_nombre'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='nombre"+fila+"' type='text' size='10' maxlength='45' value='"+val1+"'/>";
		contenedor=document.getElementById('con_nombre_corto'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='nombre_corto"+fila+"' type='text' size='10' maxlength='30' value='"+val1+"'/>";				
		contenedor=document.getElementById('con_modificar'+fila);
		contenedor.innerHTML="<table border='0' cellpadding='0' cellspacing='0'  style='color:#FFF'><tr><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td><td width='160' height='25' bgcolor='#FF9900' style = 'text-align:center; cursor:pointer;' onclick=valida_facultad('form1','"+fila+"','2')>MODIFICAR</td><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td></tr></table>";
		contenedor=document.getElementById('con_eliminar'+fila);
		contenedor.innerHTML="<table border='0' cellpadding='0' cellspacing='0' style='color:#FFF'><tr><td width='10' height='25' style='text-align:center; cursor:pointer;'>&nbsp;</td><td width='160' bgcolor='#E32402' style='text-align:center; cursor:pointer;' onclick=cargarContenido('admin/listado_facultades.php?id=0','contenido'); >CANCELAR</td><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td></tr></table>";		
}

function EditaFila_carrera(fila){
		contenedor=document.getElementById('con_nombre'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='nombre"+fila+"' type='text' size='10' maxlength='45' value='"+val1+"'/>";
		contenedor=document.getElementById('con_nombre_corto'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='nombre_corto"+fila+"' type='text' size='10' maxlength='30' value='"+val1+"'/>";				
		fid=document.getElementById('fid'+fila).value;		
		cargarContenido('admin/carga_sel_facultad.php?id='+fila+'&fid='+fid,'con_facultad'+fila);			
		contenedor=document.getElementById('con_modificar'+fila);
		contenedor.innerHTML="<table border='0' cellpadding='0' cellspacing='0'  style='color:#FFF'><tr><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td><td width='160' height='25' bgcolor='#FF9900' style = 'text-align:center; cursor:pointer;' onclick=valida_carrera('form1','"+fila+"','2')>MODIFICAR</td><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td></tr></table>";
		contenedor=document.getElementById('con_eliminar'+fila);
		contenedor.innerHTML="<table border='0' cellpadding='0' cellspacing='0' style='color:#FFF'><tr><td width='10' height='25' style='text-align:center; cursor:pointer;'>&nbsp;</td><td width='160' bgcolor='#E32402' style='text-align:center; cursor:pointer;' onclick=cargarContenido('admin/listado_carrera.php?id=0','contenido'); >CANCELAR</td><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td></tr></table>";		
}

function EditaFila_zona(fila){
		contenedor=document.getElementById('con_nombre'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='nombre"+fila+"' type='text' size='10' maxlength='45' value='"+val1+"'/>";
		contenedor=document.getElementById('con_nombre_corto'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='nombre_corto"+fila+"' type='text' size='10' maxlength='30' value='"+val1+"'/>";				
		aid=document.getElementById('aid'+fila).value;
		cargarContenido('admin/carga_sel_areas.php?id='+fila+"&aid="+aid,'con_area'+fila);		
		contenedor=document.getElementById('con_modificar'+fila);
		contenedor.innerHTML="<table border='0' cellpadding='0' cellspacing='0'  style='color:#FFF'><tr><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td><td width='160' height='25' bgcolor='#FF9900' style = 'text-align:center; cursor:pointer;' onclick=valida_zona('form1','"+fila+"','2')>MODIFICAR</td><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td></tr></table>";
		contenedor=document.getElementById('con_eliminar'+fila);
		contenedor.innerHTML="<table border='0' cellpadding='0' cellspacing='0' style='color:#FFF'><tr><td width='10' height='25' style='text-align:center; cursor:pointer;'>&nbsp;</td><td width='160' bgcolor='#E32402' style='text-align:center; cursor:pointer;' onclick=cargarContenido('admin/listado_zonas.php?id=0','contenido'); >CANCELAR</td><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td></tr></table>";		
}

function EditaFila_usuario(fila){
		contenedor=document.getElementById('con_ide'+fila); contenedor.innerHTML="<input type='hidden' name='id_usuario' id='id_usuario' value='"+fila+"' />";
		contenedor=document.getElementById('con_nombre'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='nombre"+fila+"' type='text' size='10' maxlength='30' value='"+val1+"'/>";
		contenedor=document.getElementById('con_apellidop'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", ""); contenedor.innerHTML="&nbsp;<input id='apellidop"+fila+"' type='text' size='10' maxlength='30' value='"+val1+"'/>";
		contenedor=document.getElementById('con_apellidom'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", ""); contenedor.innerHTML="&nbsp;<input id='apellidom"+fila+"' type='text' size='10' maxlength='30' value='"+val1+"'/>";
		tid=document.getElementById('tid'+fila).value;		
		cid=document.getElementById('cid'+fila).value;
		aid=document.getElementById('aid'+fila).value;
		caid=document.getElementById('caid'+fila).value;
		cargarContenido('admin/carga_sel_tipoarea.php?id='+fila+"&tid="+tid,'con_tipo'+fila);	
		cargarContenido('admin/carga_sel_cargos.php?id='+fila+"&cid="+cid,'con_cargo'+fila);
		cargarContenido('admin/carga_sel_areas.php?id='+fila+"&aid="+aid,'con_area'+fila);																				
		cargarContenido('admin/carga_sel_carreras.php?id='+fila+"&caid="+caid,'con_carrera'+fila);																						
		contenedor=document.getElementById('con_anexo'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", ""); contenedor.innerHTML="&nbsp;<input id='anexo"+fila+"' type='text' size='10' maxlength='10' value='"+val1+"'/>";		
		contenedor=document.getElementById('con_ip'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", ""); contenedor.innerHTML="&nbsp;<input id='ip"+fila+"' type='text' size='10' maxlength='20' value='"+val1+"'/>";				
		contenedor=document.getElementById('con_modificar'+fila);
		contenedor.innerHTML="<table border='0' cellpadding='0' cellspacing='0'  style='color:#FFF'><tr><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td><td width='160' height='25' bgcolor='#FF9900' style = 'text-align:center; cursor:pointer;' onclick=valida_usuario1('form1','"+fila+"','2')>MODIFICAR</td><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td></tr></table>";
		contenedor=document.getElementById('con_eliminar'+fila);
		contenedor.innerHTML="<table border='0' cellpadding='0' cellspacing='0' style='color:#FFF'><tr><td width='10' height='25' style='text-align:center; cursor:pointer;'>&nbsp;</td><td width='160' bgcolor='#E32402' style='text-align:center; cursor:pointer;' onclick=cargarContenido1('admin/listado_usuarios.php?id=0','contenido'); >CANCELAR</td><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td></tr></table>";		
}

function EditaFila_cargo(fila){
		contenedor=document.getElementById('con_nombre'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='nombre"+fila+"' type='text' size='10' maxlength='45' value='"+val1+"'/>";
		contenedor=document.getElementById('con_nombre_largo'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='nombre_largo"+fila+"' type='text' size='10' maxlength='30' value='"+val1+"'/>";				
		contenedor=document.getElementById('con_modificar'+fila);
		contenedor.innerHTML="<table border='0' cellpadding='0' cellspacing='0'  style='color:#FFF'><tr><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td><td width='160' height='25' bgcolor='#FF9900' style = 'text-align:center; cursor:pointer;' onclick=valida_cargo('form1','"+fila+"','2')>MODIFICAR</td><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td></tr></table>";
		contenedor=document.getElementById('con_eliminar'+fila);
		contenedor.innerHTML="<table border='0' cellpadding='0' cellspacing='0' style='color:#FFF'><tr><td width='10' height='25' style='text-align:center; cursor:pointer;'>&nbsp;</td><td width='160' bgcolor='#E32402' style='text-align:center; cursor:pointer;' onclick=cargarContenido('admin/listado_cargos.php?id=0','contenido'); >CANCELAR</td><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td></tr></table>";		
}

function EditaFila_item(fila){
		contenedor=document.getElementById('con_nombre'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='nombre"+fila+"' type='text' size='10' maxlength='45' value='"+val1+"'/>";
		contenedor=document.getElementById('con_nombre_corto'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='nombre_corto"+fila+"' type='text' size='10' maxlength='30' value='"+val1+"'/>";				
		contenedor=document.getElementById('con_marca'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='marca"+fila+"' type='text' size='10' maxlength='45' value='"+val1+"'/>";
		contenedor=document.getElementById('con_modelo'+fila); val=contenedor.innerHTML.substr(6,contenedor.innerHTML.length); val1=val.replace("&nbsp;", "");contenedor.innerHTML="&nbsp;<input id='modelo"+fila+"' type='text' size='10' maxlength='45' value='"+val1+"'/>";		
		contenedor=document.getElementById('con_modificar'+fila);
		contenedor.innerHTML="<table border='0' cellpadding='0' cellspacing='0'  style='color:#FFF'><tr><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td><td width='160' height='25' bgcolor='#FF9900' style = 'text-align:center; cursor:pointer;' onclick=valida_item('form1','"+fila+"','2')>MODIFICAR</td><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td></tr></table>";
		contenedor=document.getElementById('con_eliminar'+fila);
		contenedor.innerHTML="<table border='0' cellpadding='0' cellspacing='0' style='color:#FFF'><tr><td width='10' height='25' style='text-align:center; cursor:pointer;'>&nbsp;</td><td width='160' bgcolor='#E32402' style='text-align:center; cursor:pointer;' onclick=cargarContenido('admin/listado_items.php?id=0','contenido'); >CANCELAR</td><td width='10' style='text-align:center; cursor:pointer;'>&nbsp;</td></tr></table>";		
}

function flecha(id){
cont = document.getElementById('flecha'+id);
cont.innerHTML = "<img src='img/bot_up_flecha1.jpg' width='28' height='26' style='cursor:pointer;' onclick=javascript:oculta_tarifa('"+id+"');flecha1('"+id+"') />";
}

function flecha1(id){
cont = document.getElementById('flecha'+id);
cont.innerHTML = "<img src='img/bot_up_flecha.jpg' width='28' height='26' style='cursor:pointer;' onclick=javascript:cargarContenido2('tarifas.php?id_contrato="+id+"','tarifas"+id+"',0);cargarContenido2('blancos.php?id_contrato="+id+"','blancos"+id+"',0);flecha('"+id+"') />";
}

function datepicker_desde(){
	new JsDatePick({
		useMode:2,
		target:"desde1",
		dateFormat:"%d-%m-%Y"
	});
}

function datepicker_hasta(){
	new JsDatePick({
		useMode:2,
		target:"hasta1",
		dateFormat:"%d-%m-%Y"
	});
}

function datepicker_fin(){
	new JsDatePick({
		useMode:2,
		target:"fin1",
		dateFormat:"%d-%m-%Y"
	});
}

function on_over1(obj,obj1,sel){
	if(menu_sel!=sel){
		cont = document.getElementById(obj);
		cont.style.backgroundColor = "#676362";
		cont1 = document.getElementById(obj1);
		cont1.style.backgroundColor = "#B6130E";	
	}
	
}

function on_out1(obj,obj1,sel){
	if(menu_sel!=sel){
		cont = document.getElementById(obj);
		cont.style.backgroundColor = "#000";
		cont1 = document.getElementById(obj1);
		cont1.style.backgroundColor = "#676362";
	}
}

function on_click1(obj,obj1,sel){
	menu_sel = sel;
	cont11 = document.getElementById('bot1_d'); cont11.style.backgroundColor = "#676362";
	cont11 = document.getElementById('bot2_d'); cont11.style.backgroundColor = "#676362";
	cont11 = document.getElementById('bot3_d'); cont11.style.backgroundColor = "#676362";	
	cont11 = document.getElementById('bot4_d'); cont11.style.backgroundColor = "#676362";
	cont11 = document.getElementById('bot5_d'); cont11.style.backgroundColor = "#676362";
	cont11 = document.getElementById('bot6_d'); cont11.style.backgroundColor = "#676362";
	cont11 = document.getElementById('bot7_d'); cont11.style.backgroundColor = "#676362";
	cont11 = document.getElementById('bot8_d'); cont11.style.backgroundColor = "#676362";				
	cont11 = document.getElementById('bot9_d'); cont11.style.backgroundColor = "#676362";					
	cont11 = document.getElementById('bot1'); cont11.style.backgroundColor = "#000";
	cont11 = document.getElementById('bot2'); cont11.style.backgroundColor = "#000";
	cont11 = document.getElementById('bot3'); cont11.style.backgroundColor = "#000";	
	cont11 = document.getElementById('bot4'); cont11.style.backgroundColor = "#000";
	cont11 = document.getElementById('bot5'); cont11.style.backgroundColor = "#000";		
	cont11 = document.getElementById('bot6'); cont11.style.backgroundColor = "#000";
	cont11 = document.getElementById('bot7'); cont11.style.backgroundColor = "#000";
	cont11 = document.getElementById('bot8'); cont11.style.backgroundColor = "#000";					
	cont11 = document.getElementById('bot9'); cont11.style.backgroundColor = "#000";						
	
		
	cont = document.getElementById(obj);
	cont.style.backgroundColor = "#666";
	cont1 = document.getElementById(obj1);
	cont1.style.backgroundColor = "#FF0000";
}

function llena_desde(){
	contenedor1 = document.getElementById('fondo_ant');
	contenedor2 = document.getElementById("desde");
	val = contenedor1.value;
	contenedor2.value = val;
}


function loading(){
 	cont = document.getElementById('loading');
	cont.style.visibility = "visible";
}

function c_loading(){
 	cont = document.getElementById('loading');
	cont.style.visibility = "hidden";
}

function carga_nom_proyecto(){
 	cont = document.getElementById('proyectos');
 	cont1 = document.getElementById('nom_proyecto');
	cont1.value = cont.options[cont.selectedIndex].text;	
}

function carga_nom_blanco(){
 	cont = document.getElementById('blancos');
 	cont1 = document.getElementById('nom_blanco');
	cont1.value = cont.options[cont.selectedIndex].text;
}

function carga_nom_pozo(){
 	cont = document.getElementById('pozos');
 	cont1 = document.getElementById('nom_pozo');
	cont1.value = cont.options[cont.selectedIndex].text;	
}

function carga_nom_tipo(){
 	cont = document.getElementById('tipo');
 	cont1 = document.getElementById('nom_tipo');
	cont1.value = cont.options[cont.selectedIndex].text;	
}

function carga_nom_herramienta(){
 	cont = document.getElementById('herramienta');
 	cont1 = document.getElementById('nom_herramienta');
	cont1.value = cont.options[cont.selectedIndex].text;	
}

function carga_nom_diametro(){
 	cont = document.getElementById('diametro');
 	cont1 = document.getElementById('nom_diametro');
	cont1.value = cont.options[cont.selectedIndex].text;	
}

function carga_nom_empresa(){
 	cont = document.getElementById('empresa');
 	cont1 = document.getElementById('nom_empresa');
	cont1.value = cont.options[cont.selectedIndex].text;	
}

function carga_usuario(obj){
	usuario = obj.value;
	cargarContenido1('carga_inp_lugar.php?usuario='+usuario,'con_area');
}

function carga_up(){
contenedor = document.getElementById('grafico');
contenedor.src = "grafico.php";
contenedor = document.getElementById('tabla');
contenedor.src = "tabla.php";
contenedor = document.getElementById('alertas');
contenedor.src = "alertas.php";
}

function cambia_menu(nom){
	cont = document.getElementById('nom_menu');
	cont1 = document.getElementById('menu_logo');
	cont2 = document.getElementById('menu_texto');	
	cont.innerHTML = "&nbsp;&nbsp"+nom;
	cont2.innerHTML = nom;	
	if (nom == "ANEXOS"){cont1.src = "img/ico_anexos.png";}
	if (nom == "INVENTARIO"){cont1.src = "img/ico_inventario.png";}		
	if (nom == "INCIDENTES"){cont1.src = "img/ico_incidentes.png";}
	if (nom == "REDES"){cont1.src = "img/ico_redes.png";}
	if (nom == "MANUALES"){cont1.src = "img/ico_manuales.png";}		
	
}