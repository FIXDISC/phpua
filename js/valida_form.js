// Creación del objeto XMLHttpRequest.

function valida_incidente(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	if(contenedor.elements['usuario'+fila].value==""){alert("Debe ingresar un usuario");contenedor.elements['usuario'+fila].focus();return};
	if(contenedor.elements['area'+fila].value==""){alert("Debe ingresar un area");contenedor.elements['area'+fila].focus();return};
	if(accion==1){enviarFormulario2('agrega_incidente.php','contenido','form1'); alert("INCIDENTE AGREGADO");}
//	 cargarContenido('incidentes.php?id=0','contenido'); carga_up();} 
//	if(accion==2){enviarFormulario2('modifica_usuario.php','a_usuario','form2'); alert("USUARIO MODIFICADO"); cargarContenido1('usuarios.php?id=0','contenido');}
}

function valida_encargado(formulario,fila,accion){	
    contenedor = document.getElementById(formulario);
	encargado = document.getElementById('encargado'+fila).value;
	if(contenedor.elements['encargado'+fila].value==0){alert("Debe ingresar un encargado");contenedor.elements['encargado'+fila].focus();return};
	if(accion==1){cargarContenido('modifica_encargado.php?id='+fila+'&encargado='+encargado,'contenido');alert("ENCARGADO MODIFICADO"); cargarContenido('incidentes.php?id=0','contenido'); carga_up();} 
}

function valida_dependencia1(formulario,fila,accion){	
    contenedor = document.getElementById(formulario);
	dependencia = document.getElementById('dependencia'+fila).value;
	if(contenedor.elements['dependencia'+fila].value==0){alert("Debe ingresar una dependencia");contenedor.elements['dependencia'+fila].focus();return};
	if(accion==1){cargarContenido('modifica_dependencia.php?id='+fila+'&dependencia='+dependencia,'contenido');
	alert("DEPENDENCIA MODIFICADA"); cargarContenido('incidentes.php?id=0','contenido'); carga_up();} 
}

function valida_causa(formulario,fila,accion){	
    contenedor = document.getElementById(formulario);
	causa = document.getElementById('causa'+fila).value;
	if(contenedor.elements['causa'+fila].value==""){alert("Debe ingresar una causa");contenedor.elements['causa'+fila].focus();return};
	if(accion==1){cargarContenido('modifica_causa.php?id='+fila+'&causa='+causa,'contenido');alert("CAUSA MODIFICADA"); cargarContenido('incidentes.php?id=0','contenido'); carga_up();} 
}

function valida_accion(formulario,fila,accion){	
    contenedor = document.getElementById(formulario);
	accion1 = document.getElementById('accion'+fila).value;	
	if(contenedor.elements['accion'+fila].value==""){alert("Debe ingresar una accion");contenedor.elements['accion'+fila].focus();return};
	if(accion==1){cargarContenido('modifica_accion.php?id='+fila+'&accion='+accion1,'contenido');alert("ACCION MODIFICADA"); cargarContenido('incidentes.php?id=0','contenido'); carga_up();} 
}

function valida_archivo(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	if(contenedor.elements['test'+fila].value==""){alert("Debe ingresar un archivo");contenedor.elements['test'+fila].focus();return};
	if(accion==1){document.f.submit();}
}

function valida_excel(formulario,fila,accion){	
    contenedor = document.getElementById(formulario);
	if(contenedor.elements['userfile'+fila].value==""){alert("Debe ingresar un archivo");contenedor.elements['userfile'+fila].focus();return};
	if(accion==1){document.f.submit();}
}

function isNumberKey(evt){
          var charCode = (evt.which) ? evt.which : event.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
}

function valida_clave(usuario,clave){
	if (usuario=='admin' && clave=='info'){
		cargarContenido('login.php?val=1','cont');
	}else{
		alert("USUARIO Y/O CLAVE INCORRECTO(S)");	
	}
}
	   
function valida_campus(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	nombre = document.getElementById('nombre'+fila).value;
	direccion = document.getElementById('direccion'+fila).value;	
	if(nombre==""){alert("Debe ingresar un nombre");contenedor.elements['nombre'+fila].focus();return};
	if(direccion==""){alert("Debe ingresar una direccion");contenedor.elements['direccion'+fila].focus();return};	
	if(accion==1){cargarContenido('admin/agrega_campus.php?nombre='+nombre+'&direccion='+direccion,'ta_agregar','form1'); alert("CAMPUS AGREGADO"); cargarContenido('admin/listado_campus.php','contenido');}
	if(accion==2){cargarContenido('admin/modifica_campus.php?id='+fila+'&nombre='+nombre+"&direccion="+direccion,'ta_agregar','form1',fila); alert("CAMPUS MODIFICADO");cargarContenido('admin/listado_campus.php','contenido');}
}

function valida_dependencia(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	nombre = document.getElementById('nombre'+fila).value;
	nombre_corto = document.getElementById('nombre_corto'+fila).value;
	direccion = document.getElementById('direccion'+fila).value;
	campus = contenedor.elements['campus'+fila].value;
	if(nombre==""){alert("Debe ingresar un nombre");contenedor.elements['nombre'+fila].focus();return};
	if(nombre_corto==""){alert("Debe ingresar un nombre corto");contenedor.elements['nombre_corto'+fila].focus();return};
	if(direccion==""){alert("Debe ingresar una direccion");contenedor.elements['direccion'+fila].focus();return};		
	if(campus==0){alert("Debe seleccionar un campus");document.getElementById('campus'+fila).focus();return};	
	if(accion==1){cargarContenido('admin/agrega_dependencia.php?nombre='+nombre+'&nombre_corto='+nombre_corto+'&direccion='+direccion+'&campus='+campus,'ta_agregar','form1');
	alert("DEPENDENCIA AGREGADA"); cargarContenido('admin/listado_dependencias.php','contenido');}
	if(accion==2){cargarContenido('admin/modifica_dependencia.php?id='+fila+'&nombre='+nombre+'&nombre_corto='+nombre_corto+'&direccion='+direccion+'&campus='+campus,'ta_agregar','form1',fila); alert("DEPENDENCIA MODIFICADA"); cargarContenido('admin/listado_dependencias.php','contenido');}
}

function valida_area(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	nombre = document.getElementById('nombre'+fila).value;
	nombre_corto = document.getElementById('nombre_corto'+fila).value;
	tipo = document.getElementById('tipo'+fila).value;	
	campus = document.getElementById('campus'+fila).value;		
	dependencia = document.getElementById('dependencia'+fila).value;		
	if(nombre==""){alert("Debe ingresar un nombre");contenedor.elements['nombre'+fila].focus();return};
	if(nombre_corto==""){alert("Debe ingresar un nombre corto");contenedor.elements['nombre_corto'+fila].focus();return};
	if(tipo==0){alert("Debe seleccionar un tipo corto");contenedor.elements['tipo'+fila].focus();return};
	if(dependencia==0){alert("Debe seleccionar una dependencia");contenedor.elements['dependencia'+fila].focus();return};		
	if(campus==0){alert("Debe seleccionar un campus");document.getElementById('campus'+fila).focus();return};	
	if(accion==1){cargarContenido('admin/agrega_area.php?nombre='+nombre+'&nombre_corto='+nombre_corto+'&tid='+tipo+'&dependencia='+dependencia+'&campus='+campus,'ta_agregar','form1');
	alert("AREA AGREGADA"); cargarContenido('admin/listado_areas.php','contenido');}
	if(accion==2){cargarContenido('admin/modifica_area.php?id='+fila+'&nombre='+nombre+'&nombre_corto='+nombre_corto+'&tid='+tipo+'&dependencia='+dependencia+'&campus='+campus,'ta_agregar','form1',fila); alert("AREA MODIFICADA"); cargarContenido('admin/listado_areas.php','contenido');}
}

function valida_facultad(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	nombre = document.getElementById('nombre'+fila).value;
	nombre_corto = document.getElementById('nombre_corto'+fila).value;
	if(nombre==""){alert("Debe ingresar un nombre");contenedor.elements['nombre'+fila].focus();return};
	if(nombre_corto==""){alert("Debe ingresar un nombre corto");contenedor.elements['nombre_corto'+fila].focus();return};
	if(accion==1){cargarContenido('admin/agrega_facultad.php?nombre='+nombre+'&nombre_corto='+nombre_corto,'ta_agregar','form1');alert("FACULTAD AGREGADA"); cargarContenido('admin/listado_facultades.php','contenido');}
	if(accion==2){cargarContenido('admin/modifica_facultad.php?id='+fila+'&nombre='+nombre+'&nombre_corto='+nombre_corto,'ta_agregar','form1',fila); alert("FACULTAD MODIFICADA"); cargarContenido('admin/listado_facultades.php','contenido');}
}

function valida_carrera(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	nombre = document.getElementById('nombre'+fila).value;
	facultad = contenedor.elements['facultad'+fila].value;	
	nombre_corto = document.getElementById('nombre_corto'+fila).value;
	if(nombre==""){alert("Debe ingresar un nombre");contenedor.elements['nombre'+fila].focus();return};
	if(nombre_corto==""){alert("Debe ingresar un nombre corto");contenedor.elements['nombre_corto'+fila].focus();return};
	if(facultad==0){alert("Debe seleccionar una facultad");document.getElementById('facultad'+fila).focus();return};		
	if(accion==1){cargarContenido('admin/agrega_carrera.php?nombre='+nombre+'&nombre_corto='+nombre_corto+'&facultad='+facultad,'ta_agregar','form1'); alert("CARRERA AGREGADA"); cargarContenido('admin/listado_carreras.php','contenido');}
	if(accion==2){cargarContenido('admin/modifica_carrera.php?id='+fila+'&nombre='+nombre+'&nombre_corto='+nombre_corto+'&facultad='+facultad,'ta_agregar','form1',fila); alert("CARRERA MODIFICADA"); cargarContenido('admin/listado_carreras.php','contenido');}
}

function valida_zona(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	nombre = document.getElementById('nombre'+fila).value;
	nombre_corto = document.getElementById('nombre_corto'+fila).value;
	aid = document.getElementById('area'+fila).value;		
	if(nombre==""){alert("Debe ingresar un nombre");contenedor.elements['nombre'+fila].focus();return};
	if(nombre_corto==""){alert("Debe ingresar un nombre corto");contenedor.elements['nombre_corto'+fila].focus();return};
	if(aid==0){alert("Debe seleccionar un area");contenedor.elements['area'+fila].focus();return};
	if(accion==1){cargarContenido('admin/agrega_zona.php?nombre='+nombre+'&nombre_corto='+nombre_corto+'&aid='+aid,'ta_agregar','form1');alert("ZONA AGREGADA"); cargarContenido('admin/listado_zonas.php','contenido');}
	if(accion==2){cargarContenido('admin/modifica_zona.php?id='+fila+'&nombre='+nombre+'&nombre_corto='+nombre_corto+'&aid='+aid,'ta_agregar','form1',fila);
	alert("ZONA MODIFICADA"); cargarContenido('admin/listado_zonas.php','contenido');}
}

function valida_inventario(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	item1 = document.getElementById('item'+fila);
	if(item1.value==0){alert("Debe seleccionar un item");item1.focus();return};
	item2 = item1.value;
	serie = document.getElementById('serie'+fila);
	if(serie.value==0){alert("Debe ingresar un numero de serie");serie.focus();return};

	nombre = document.getElementById('nombre'+fila).value;
	proc = document.getElementById('procesa'+fila).value;
	hdd = document.getElementById('hdd'+fila).value;
	ram = document.getElementById('ram'+fila).value;
	//so = document.getElementById('so'+fila).value;
	so = "";
	marca = document.getElementById('marca'+fila).value;
	modelo = document.getElementById('modelo'+fila).value;
	serie = document.getElementById('serie'+fila).value;
	activo = document.getElementById('activo'+fila).value;
	ip = document.getElementById('ip'+fila).value;
	horas = document.getElementById('horas'+fila).value;
	dependencia = document.getElementById('dependencia'+fila).value;
	area = document.getElementById('area'+fila).value;
	zona = document.getElementById('zona'+fila).value;
	n_item = document.getElementById('n_item'+fila).value;
	usuario	 = document.getElementById('usuario'+fila).value;
	pagina = carga_filtro();
	if (n_item=="0" || n_item==""){n_item=1}
//	alert('agrega_inventario.php?item='+item2+'&nombre='+nombre+'&proc='+proc+'&hdd='+hdd+'&ram='+ram+'&so='+so+'&marca='+marca+'&modelo='+modelo+'&serie='+serie+'&activo='+activo+'&ip='+ip+'&horas='+horas+'&&dependencia='+dependencia+'&area='+area+'&zona='+zona+'&usuario='+usuario+'&n_item='+n_item);return;
	if(accion==1){cargarContenido('agrega_inventario.php?item='+item2+'&nombre='+nombre+'&proc='+proc+'&hdd='+hdd+'&ram='+ram+'&so='+so+'&marca='+marca+'&modelo='+modelo+'&serie='+serie+'&activo='+activo+'&ip='+ip+'&horas='+horas+'&&dependencia='+dependencia+'&area='+area+'&zona='+zona+'&usuario='+usuario+'&n_item='+n_item,'contenido','form1'); alert("ITEM AGREGADO"); cargarContenido(pagina,'contenido');}
	if(accion==2){cargarContenido('modifica_inventario.php?id='+fila+'&nombre='+nombre+'&proc='+proc+'&hdd='+hdd+'&ram='+ram+'&so='+so+'&marca='+marca+'&modelo='+modelo+'&serie='+serie+'&activo='+activo+'&ip='+ip+'&horas='+horas+'&dependencia='+dependencia+'&area='+area+'&zona='+zona+'&usuario='+usuario+'&n_item='+n_item,'contenido','form1',fila); alert("CARRERA MODIFICADA"); cargarContenido(pagina,'contenido');}
}


function valida_dependencia2(formulario,fila,accion){	
    contenedor = document.getElementById(formulario);
	dependencia = document.getElementById('dependencia'+fila).value;
	anterior = document.getElementById('anterior'+fila).value;
	pagina = carga_filtro();
	//alert("cargarContenido1('modifica_inv_dependencia.php?id="+fila+"&dependencia="+dependencia+"&anterior="+anterior);
	if(accion==1){cargarContenido1('modifica_inv_dependencia.php?id='+fila+'&dependencia='+dependencia+'&anterior='+anterior,'contenido');alert("DEPENDENCIA MODIFICADA"); cargarContenido(pagina,'contenido');} 
}

function elimina_inventario(){	
	pagina = carga_filtro();
	alert("ITEM ELIMINADO"); cargarContenido(pagina,'contenido');
}

function valida_zona1(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	zona = document.getElementById('zona'+fila).value;
	pagina = carga_filtro();
	if(accion==1){cargarContenido1('modifica_inv_zona.php?id='+fila+'&zona='+zona,'contenido');alert("ZONA MODIFICADA"); cargarContenido(pagina,'contenido');} 
}

function valida_area1(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	area = document.getElementById('area'+fila).value;
	pagina = carga_filtro();	
	//if(contenedor.elements['area'+fila].value==0){alert("Debe ingresar una area");contenedor.elements['area'+fila].focus();return};
	if(accion==1){cargarContenido1('modifica_inv_area.php?id='+fila+'&area='+area,'contenido');alert("AREA MODIFICADA"); cargarContenido(pagina,'contenido');} 
}

function valida_item(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	nombre = document.getElementById('nombre'+fila).value;
	nombre_corto = document.getElementById('nombre_corto'+fila).value;
	marca = document.getElementById('marca'+fila).value;
	modelo = document.getElementById('modelo'+fila).value;		
	if(nombre==""){alert("Debe ingresar un nombre");contenedor.elements['nombre'+fila].focus();return};
	if(nombre_corto==""){alert("Debe ingresar un nombre corto");contenedor.elements['nombre_corto'+fila].focus();return};
	if(accion==1){cargarContenido('admin/agrega_item.php?nombre='+nombre+'&nombre_corto='+nombre_corto+'&marca='+marca+'&modelo='+modelo,'ta_agregar','form1');alert("ITEM AGREGADO"); cargarContenido('admin/listado_items.php','contenido');}
	if(accion==2){cargarContenido('admin/modifica_item.php?id='+fila+'&nombre='+nombre+'&nombre_corto='+nombre_corto+'&marca='+marca+'&modelo='+modelo,'ta_agregar','form1',fila);alert("ITEM MODIFICADO"); cargarContenido('admin/listado_items.php','contenido');}
}

function valida_item1(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	item = document.getElementById('item'+fila).value;
	pagina = carga_filtro();	
	if(accion==1){cargarContenido1('modifica_inv_item.php?id='+fila+'&item='+item,'contenido');alert("ITEM MODIFICADO"); cargarContenido(pagina,'contenido');} 
}

function valida_ip1(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	ip = document.getElementById('ip'+fila).value;
	pagina = carga_filtro();	
	if(accion==1){cargarContenido1('modifica_inv_ip.php?id='+fila+'&ip='+ip,'contenido');alert("IP MODIFICADA"); cargarContenido(pagina,'contenido');} 
}

function valida_nombre1(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	nombre = document.getElementById('nombre'+fila).value;
	pagina = carga_filtro();	
	if(accion==1){cargarContenido1('modifica_inv_nombre.php?id='+fila+'&nombre='+nombre,'contenido');alert("NOMBRE MODIFICADO"); cargarContenido(pagina,'contenido');} 
}

function valida_marca1(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	marca = document.getElementById('marca'+fila).value;
	pagina = carga_filtro();	
	if(accion==1){cargarContenido1('modifica_inv_marca.php?id='+fila+'&marca='+marca,'contenido');alert("MARCA MODIFICADA"); cargarContenido(pagina,'contenido');} 
}

function valida_modelo1(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	modelo = document.getElementById('modelo'+fila).value;
	pagina = carga_filtro();	
	if(accion==1){cargarContenido1('modifica_inv_modelo.php?id='+fila+'&modelo='+modelo,'contenido');alert("MODELO MODIFICADO"); cargarContenido(pagina,'contenido');} 
}

function valida_procesador1(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	procesador = document.getElementById('procesador'+fila).value;
	pagina = carga_filtro();
	//alert(pagina);
	if(accion==1){cargarContenido1('modifica_inv_procesador.php?id='+fila+'&procesador='+procesador,'contenido');alert("PROCESADOR MODIFICADO"); cargarContenido(pagina,'contenido');} 
}

function valida_hdd1(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	hdd = document.getElementById('hdd'+fila).value;
	pagina = carga_filtro();
	if(accion==1){cargarContenido1('modifica_inv_hdd.php?id='+fila+'&hdd='+hdd,'contenido');alert("HDD MODIFICADO"); cargarContenido(pagina,'contenido');} 
}

function valida_ram1(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	ram = document.getElementById('ram'+fila).value;
	pagina = carga_filtro();
	if(accion==1){cargarContenido1('modifica_inv_ram.php?id='+fila+'&ram='+ram,'contenido');alert("RAM MODIFICADA"); cargarContenido(pagina,'contenido');} 
}

function valida_so1(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	so = document.getElementById('so'+fila).value;
	pagina = carga_filtro();
	if(accion==1){cargarContenido1('modifica_inv_so.php?id='+fila+'&so='+so,'contenido');alert("SO MODIFICADO"); cargarContenido(pagina,'contenido');} 
}

function valida_serie1(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	serie = document.getElementById('serie'+fila).value;
	pagina = carga_filtro();	
	if(accion==1){cargarContenido1('modifica_inv_serie.php?id='+fila+'&serie='+serie,'contenido');alert("SERIE MODIFICADO"); cargarContenido(pagina,'contenido');} 
}

function valida_activo1(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	activo = document.getElementById('activo'+fila).value;
	pagina = carga_filtro();	
	if(accion==1){cargarContenido1('modifica_inv_activo.php?id='+fila+'&activo='+activo,'contenido');alert("ACTIVO FIJO MODIFICADO"); cargarContenido(pagina,'contenido');} 
}

function valida_horas1(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	horas = document.getElementById('horas'+fila).value;
	pagina = carga_filtro();
	if(accion==1){cargarContenido1('modifica_inv_horas.php?id='+fila+'&horas='+horas,'contenido');alert("HORAS MODIFICADAS"); cargarContenido(pagina,'contenido');} 
}

function valida_estado1(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	estado = document.getElementById('estado'+fila).value;
	pagina = carga_filtro();
	if(accion==1){cargarContenido1('modifica_inv_estado.php?id='+fila+'&estado='+estado,'contenido');alert("ESTADO MODIFICADO"); cargarContenido(pagina,'contenido');} 
}

function carga_filtro(){
		tabla=document.getElementById('tabla'); filtro = tabla.contentWindow;
		tipo1 = filtro.document.getElementById('tipo1').value;
		area1 = filtro.document.getElementById('area1').value;		
		zona1 = filtro.document.getElementById('zona1').value;
		item1 = filtro.document.getElementById('item1').value;
		usuario1 = filtro.document.getElementById('usuario1').value;
		cargo1 = filtro.document.getElementById('cargo1').value;
		activo1 = filtro.document.getElementById('activo1').value;		
		serie1 = filtro.document.getElementById('serie1').value;
		campo1 = filtro.document.getElementById('campo').value;
		comp1 = filtro.document.getElementById('comp').value;
		txt1 = filtro.document.getElementById('txt').value;
		campo2 = filtro.document.getElementById('campo1').value;
		comp2 = filtro.document.getElementById('comp1').value;
		txt2 = filtro.document.getElementById('txt1').value;
		
		
		pagina = "listado_inventario.php?tipo="+tipo1+"&area="+area1+"&zona="+zona1+"&item="+item1+"&usuario="+usuario1+"&cargo="+cargo1+"&activo="+activo1+"&serie="+serie1+"&campo="+campo1+"&comp="+comp1+"&txt="+txt1+"&campo1="+campo2+"&comp1="+comp2+"&txt1="+txt2;
		return pagina;	
}

function valida_usuario1(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	nombre = document.getElementById('nombre'+fila).value;
	apellidop = document.getElementById('apellidop'+fila).value;
	apellidom = document.getElementById('apellidom'+fila).value;	
	cargo = document.getElementById('cargo'+fila).value;		
	tipo = document.getElementById('tipo'+fila).value;
	area = document.getElementById('area'+fila).value;		
	carrera = document.getElementById('carrera'+fila).value;		
	anexo = document.getElementById('anexo'+fila).value;		
	ip = document.getElementById('ip'+fila).value;
	if(nombre==""){alert("Debe ingresar un nombre");contenedor.elements['nombre'+fila].focus();return};
	if(apellidop==""){alert("Debe ingresar un Apellido Paterno");contenedor.elements['apellidop'+fila].focus();return};
	if(accion==1){cargarContenido('admin/agrega_usuario.php?nombre='+nombre+'&apellidop='+apellidop+'&apellidom='+apellidom+'&cargo='+cargo+'&tipo='+tipo+'&area='+area+'&carrera='+carrera+'&anexo='+anexo+'&ip='+ip,'ta_agregar','form1');
	alert("USUARIO AGREGADO"); cargarContenido('admin/listado_usuarios.php','contenido');}
	if(accion==2){cargarContenido('admin/modifica_usuario.php?id='+fila+'&nombre='+nombre+'&apellidop='+apellidop+'&apellidom='+apellidom+'&cargo='+cargo+'&tipo='+tipo+'&area='+area+'&carrera='+carrera+'&anexo='+anexo+'&ip='+ip,'ta_agregar','form1',fila);
	alert("USUARIO MODIFICADO"); cargarContenido('admin/listado_usuarios.php','contenido');}
}

function valida_usuario2(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	usuario = document.getElementById('usuario'+fila).value;
	pagina = carga_filtro();
	if(accion==1){cargarContenido1('modifica_inv_usuario.php?id='+fila+'&usuario='+usuario,'contenido');alert("USUARIO MODIFICADO"); cargarContenido(pagina,'contenido');} 
}

function valida_cargo(formulario,fila,accion){
    contenedor = document.getElementById(formulario);
	nombre = document.getElementById('nombre'+fila).value;
	nombre_largo = document.getElementById('nombre_largo'+fila).value;
	if(nombre==""){alert("Debe ingresar un nombre");contenedor.elements['nombre'+fila].focus();return};
	if(nombre_largo==""){alert("Debe ingresar un nombre largo");contenedor.elements['nombre_largo'+fila].focus();return};
	if(accion==1){cargarContenido('admin/agrega_cargo.php?nombre='+nombre+'&nombre_largo='+nombre_largo,'ta_agregar','form1');
	alert("CARGO AGREGADO"); cargarContenido('admin/listado_cargos.php','contenido');}
	if(accion==2){cargarContenido('admin/modifica_cargo.php?id='+fila+'&nombre='+nombre+'&nombre_largo='+nombre_largo,'ta_agregar','form1',fila); alert("CARGO MODIFICADO"); cargarContenido('admin/listado_cargos.php','contenido');}
}
