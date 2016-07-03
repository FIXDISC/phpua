// JavaScript Document
$(document).ready(function(){
	//código a ejecutar cuando el DOM está listo para recibir instrucciones.
	/*******************todo lo que se haga en esta zona, se ejecutará al cargar la página*******************
	
	********************************************************************************************************/
	
	$("#principal").load("inicio.php");
	$("#div_galeria_1").hide().load("/Neociclo/images/galeria_1/galeria_1.php?imagen=imagen_1.png").fadeIn("slow"); 
	
	//Mouse
	//Evento Click
	//Click según ID
	$("#menu_principal").click(function(evento){
		//alert("menu_principal");
	});
	 
});

//Show Form
function show_form(div, url){
	$(document).ready(function(){
		 //document.getElementById(div).innerHTML = '<img src="/Neociclo/cargando.php" />';
		 //$("#"+div).hide().load("cargando.php").fadeIn("fast");
		   document.getElementById(div).innerHTML="&nbsp;</br><img src=\"/Neociclo/images/cargando1.gif\" />";
         $("#"+div).load(url).fadeIn('fast');

	});
}

//Menu_principal
function menu_principal(URL, imagen, id_a){
	$(document).ready(function(){
		menu_css_a(id_a);
		document.getElementById("div_galeria_1").innerHTML = '<img src="/Neociclo/cargando.php" />';
		$("#div_galeria_1").hide("slow");
		$("#div_galeria_1").hide("slow").load("/Neociclo/images/galeria_1/galeria_1.php?imagen="+imagen).fadeIn("slow"); 
		$("#principal").hide("slow");
		$("#principal").hide("slow").load(URL).fadeIn("slow"); 
	});		
}

function menu_css_a(id_a){
	$("#menu_principal a").css("color", "black");
	$("#"+id_a).css("color", "brown");
}

//Menu_productos
function menu_producto(div, url, id_a){
	$(document).ready(function(){
		menu_css_productos(id_a);
		$("#product_box").hide("slow");
		$("#product_box").hide("slow").load("blank_.php").fadeIn("slow");
		show_form(div, url);
	});
}

function menu_css_productos(id_a){
	$("#menu_productos a").css("color", "black");
	$("#"+id_a).css("color", "brown");
}

//Menu_sub_productos
function menu_sub_producto(div, url, id_a){
	$(document).ready(function(){
		menu_css_productos(id_a);
		$("#product_box").hide("slow");
		$("#product_box").hide("slow").load("blank_.php").fadeIn("slow");
		show_form(div, url);
	});
}

function menu_css_sub_productos(id_a){
	$("#menu_productos_detalle a").css("color", "black");
	$("#"+id_a).css("color", "brown");
}

function habilitaFecha(){
	if(document.getElementById('listar_todos').checked == true){
		document.getElementById('fec_desde').disabled = true;
		document.getElementById('fec_hasta').disabled = true;
	}else{
		document.getElementById('fec_desde').disabled = false;
		document.getElementById('fec_hasta').disabled = false;
	}		
}

/******** REPORTES ***********/
function listadoReporteRecuperacion(){
	var codUsuario = document.getElementById('pro_empresa').value;
    var ing_estado = document.getElementById('estados').value;
    var fec_desde = document.getElementById('fec_desde').value;
    var fec_hasta = document.getElementById('fec_hasta').value;
    var listar_todo = document.getElementById('listar_todos').checked;
	
	var url	= '/Neociclo/portal/Reportes/reporteRecuperacionesListado.php';
	var div = 'div_list_recu';
	show_form(div, url+'?codUsuario='+codUsuario+'&ing_estado='+ing_estado+'&fec_desde='+fec_desde+'&fec_hasta='+fec_hasta+'&listar_todo='+listar_todo);
}

function listadoReporteRecuperacionXLS(){
	var codUsuario = document.getElementById('pro_empresa').value;
    var ing_estado = document.getElementById('estados').value;
    var fec_desde = document.getElementById('fec_desde').value;
    var fec_hasta = document.getElementById('fec_hasta').value;
    var listar_todo = document.getElementById('listar_todos').checked;
	
	var url	= '/Neociclo/portal/Reportes/reporteRecuperacionesListadoXLS.php';
	
	
	window.open(url+'?codUsuario='+codUsuario+'&ing_estado='+ing_estado+'&fec_desde='+fec_desde+'&fec_hasta='+fec_hasta+'&listar_todo='+listar_todo);
}


function galeria_pesajes(GRC){
    var opciones="toolbar=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=1000, top=85, left=140";
    window.open('/Neociclo/portal/Imagenes/galeria.php?grc='+GRC, '', opciones);
}

function reportes_pesajes(){
    var opciones="toolbar=no, menubar=no, scrollbars=yes, resizable=yes, width=1200, height=500, top=85, left=140";
    window.open('/Neociclo/portal/Reportes/ReporteVehiculosEnPesajeReLoad.php', '', opciones);
}

function reporteDocumentoListado(){
	//alert('prueba');
	var TIDO = document.getElementById('tip_doc').value;
	var NUDO = document.getElementById('nro_doc').value;
	var EMPRESA = document.getElementById('cod_emp').value;
	//alert(TIDO+' '+NUDO+' '+EMPRESA);
	
	var URL = '/Neociclo/portal/Reportes/reporteDocumentosListado.php?TIDO='+TIDO+'&NUDO='+NUDO+'&EMPRESA='+EMPRESA;
	//alert(URL);
	show_form('list_doc', URL);

}

function reporteDocumentoListadoshadowBox(tipo_doc, nro_doc){
			//alert( '<div><img src="http://www.armex.cl/Utiles/portal/fotos_pesajes/'+dir+'/'+imagen+'"></div>')
           Shadowbox.open({  
               content:    '<div>'+tipo_doc+' - '+nro_doc+'</div>',  
               player:     "html",
               title:      tipo_doc,
               width:      400,
               height:     400
           });
}

function cargaAviso(){
	
	Shadowbox.open({  
               content:    "cargando2.gif",  
               player:     "img",
               title:      "Aviso",
               width:      400,
               height:     400
           });
}    
	
function envio_correo_doc_pend(nro_doc, empresa){
		 Shadowbox.open({  
               content:    "/Neociclo/portal/Reportes/reporteListaDocumentosListadoEmail.php?nro_doc="+nro_doc+"&empresa="+empresa,  
               player:     "iframe",
               title:      "Aviso",
               width:      1000,
               height:     1000
           });
}

function envio_correo_doc_pend_datos(){
	/*
	var mail_tipo_doc = document.getElementById('mail_tipo_doc').value;
	var mail_empresa = document.getElementById('mail_empresa').value;
	var mail_nombre = document.getElementById('mail_nombre').value;
	var mail_email = document.getElementById('mail_email').value;
	var mail_asunto = document.getElementById('mail_asunto').value;
	var mail_mensaje = document.getElementById('mail_mensaje').value;
	var mail_archivo1 = document.getElementById('mail_archivo1').value;
	
	var pagina = '/Neociclo/portal/Reportes/reporteListaDocumentosListadoEnviar.php';
	var variables = '?mail_tipo_doc='+mail_tipo_doc+
					'&mail_empresa='+mail_empresa+
					'&mail_nombre='+mail_nombre+
					'&mail_email='+mail_email+
					'&mail_asunto='+mail_asunto+
					'&mail_mensaje='+mail_mensaje+
					'&mail_archivo1='+mail_archivo1;
					
	  var URL = pagina+variables;

   	  show_form('id_envio_mail', URL);
*/
}

function reporteListaPrecios(){
	//alert('prueba');
	var EMPRESA = document.getElementById('cod_emp').value;
	//alert(TIDO+' '+NUDO+' '+EMPRESA);
	
	var URL = '/Neociclo/portal/Reportes/reporteListaPreciosListado.php?EMPRESA='+EMPRESA;
	//alert(URL);
	show_form('list_pre', URL);

}

function reporteListaPreciosXLS(){
	//alert('prueba');
	var EMPRESA = document.getElementById('cod_emp').value;
	//alert(TIDO+' '+NUDO+' '+EMPRESA);
	
	var URL = '/Neociclo/portal/Reportes/reporteListaPreciosListadoXLS.php?EMPRESA='+EMPRESA;
	//alert(URL);
	window.open(URL, 'lista_pre_XLS');

}

function reporteListaPreciosPDF(){
	//alert('prueba');
	var EMPRESA = document.getElementById('cod_emp').value;
	//alert(TIDO+' '+NUDO+' '+EMPRESA);
	
	var URL = '/Neociclo/portal/Reportes/reporteListaPreciosListadoPDF.php?EMPRESA='+EMPRESA;
	//alert(URL);
	window.open(URL, 'lista_pre_PDF');

}

function asignaKOENGPS(){

	var EMPRESA = document.getElementById('cod_emp').value;
	
	var URL = '/Neociclo/portal/Reportes/reporteSeguimientoGPSAsigna.php?EMPRESA='+EMPRESA;

	show_form('GPS_asig', URL);

}

function reporteListaFacturas(){
	//alert('prueba');
	var EMPRESA = document.getElementById('cod_emp').value;
	//alert(TIDO+' '+NUDO+' '+EMPRESA);
	
	var URL = '/Neociclo/portal/Reportes/reporteFacturasListado.php?EMPRESA='+EMPRESA;
	//alert(URL);
	show_form('list_fac', URL);

}

function shadowBoxFacturas(TIDO, NUDO){
			//alert( '<div><img src="http://www.armex.cl/Utiles/portal/fotos_pesajes/'+dir+'/'+imagen+'"></div>')
           Shadowbox.open({  
               content:    '<div><img width="400px" height="400px" src="\\SVRCOBRE\fct\"></div>',  
               player:     "html",
               title:      NUDO,
               width:      400,
               height:     400
           });
}

function reporteListaDocumentos(){
	//alert('prueba');
	var EMPRESA = document.getElementById('cod_emp').value;
	//alert(TIDO+' '+NUDO+' '+EMPRESA);
	
	var URL = '/Neociclo/portal/Reportes/reporteListaDocumentosListado.php?EMPRESA='+EMPRESA;
	//alert(URL);
	show_form('list_doc_cli', URL);

}

function reporteRomanas(GRC){
    var opciones="toolbar=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=1000, top=85, left=140";
    window.open('/Neociclo/portal/intranet/cam_rom/reporteRomanaOnline.php', '', opciones);
}

function navegador(){
	window.location = '/Neociclo/portal/navegador';
}

function rec_mat_5(GRC){
	window.open('/Neociclo/portal/Reportes/rpt/recup_resumen5.php?GRC='+GRC);
	//window.open('/Neociclo/portal/Reportes/rpt/info_compras_pro.php');
}

function infoComprasProd(){
	var cod_cobrador = document.getElementById('cod_cobrador').value;
	var fec_ini = document.getElementById('fec_desde').value;
	var fec_fin = document.getElementById('fec_hasta').value;
	var ferroso = document.getElementById('inc_ferroso').checked;
	var bodega = document.getElementById('cod_bodega').value;
	var muestra = document.getElementById('muestra').value;
	
	window.open('/Neociclo/portal/Reportes/rpt/info_compras_pro.php?cod_cobrador='+cod_cobrador+'&fec_ini='+fec_ini+'&fec_fin='+fec_fin+'&ferroso='+ferroso+'&bodega='+bodega+'&muestra='+muestra);
	//window.open('/Neociclo/portal/Reportes/rpt/info_compras_pro.php');
}
/***********************************************  CLIENTES  **************************************************************/
function listadoNotaDeVenta(){
	var codUsuario = document.getElementById('pro_empresa').value;
    var fec_desde = document.getElementById('fec_desde').value;
    var fec_hasta = document.getElementById('fec_hasta').value;
    var listar_todo = document.getElementById('listar_todos').checked;
	
	var url	= '/Neociclo/portal/Reportes/reporteNotaDeVentaListado.php';
	var div = 'div_list_ntaven';
	show_form(div, url+'?codUsuario='+codUsuario+'&fec_desde='+fec_desde+'&fec_hasta='+fec_hasta+'&listar_todo='+listar_todo);
}


function listadoNotaDeVentaXLS(){
	var codUsuario = document.getElementById('pro_empresa').value;
    var fec_desde = document.getElementById('fec_desde').value;
    var fec_hasta = document.getElementById('fec_hasta').value;
    var listar_todo = document.getElementById('listar_todos').checked;
	
	var url	= '/Neociclo/portal/Reportes/reporteNotaDeVentaListadoXLS.php';
	var div = 'div_list_ntaven_download';
	show_form(div, url+'?codUsuario='+codUsuario+'&fec_desde='+fec_desde+'&fec_hasta='+fec_hasta+'&listar_todo='+listar_todo);
}

function listadoTiempodeEspera(){
    var fec_desde = document.getElementById('fec_desde').value;
    var fec_hasta = document.getElementById('fec_hasta').value;
	
	var url	= '/Neociclo/portal/Reportes/reporteListaTiemposDeEspera.php';
	var div = 'div_list_esp';
	show_form(div, url+'?fec_desde='+fec_desde+'&fec_hasta='+fec_hasta);
}

function reporteIngresosGrafico(){
    var mes = document.getElementById('mes').value;
    var agno = document.getElementById('agno').value;

	var url	= '/Neociclo/portal/Reportes/reporteInfoIngresosGRAF.php';
	var div = 'graf_ing';
	show_form(div, url+'?mes='+mes+'&agno='+agno);
}


function reporteListaDiasSinEntrega(){
    var dias_ini = document.getElementById('dias_ini').value;
    var dias_fin = document.getElementById('dias_fin').value;

	var url	= '/Neociclo/portal/Reportes/rpt/reporteDiasSinEntrega.php';
	var div = 'list_dias';
	alert(dias_ini);
	alert(dias_fin);
	//show_form(div, url+'?dias_ini='+dias_ini+'&dias_fin='+dias_fin);
	window.open(url+'?dias_ini='+dias_ini+'&dias_fin='+dias_fin);
}

function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57)){
		return false;
	}else{	 
		return true;
	}
}