var nombre="";

function over_menu1(img,x,y,nom){
	nombre = nom;
	obj.src='images/'+img;	
	circ = document.getElementById('circ');
	circ.style.marginTop=y+"px";
	circ.style.marginLeft=x+"px";
	circ.src = "circ.html";
	circ.style.visibility="visible";
	cuad.style.marginTop=(y-26)+"px";desc.style.marginTop=(y+2)+"px";
	cuad.style.marginLeft=(x+54)+"px";desc.style.marginLeft=(x+54)+"px";
	setTimeout(function(){
	cuad = document.getElementById('cuad');	cuad.innerHTML = nombre;
	desc = document.getElementById('desc');	desc.innerHTML = nombre;	
		if (circ.style.visibility=="visible"){
		cuad.style.visibility="visible";
		desc.style.visibility="visible";
		desc.src = "inv_dependencia.php?nom="+nom;
		}
	},700);
}

function out_menu1(){
	obj = document.getElementById('plano');
	obj.src='images/build.png'	
	circ = document.getElementById('circ');circ.style.visibility="hidden";
	cuad = document.getElementById('cuad');cuad.style.visibility="hidden";
	desc = document.getElementById('desc');desc.style.visibility="hidden";	
}

function texto(){
	txt = document.getElementById('nombre');
	txt.style.marginTop="100px";
	txt.style.marginLeft="270px";
	txt = document.getElementById('bnom');
	txt.style.marginTop="100px";
	txt.style.marginLeft="270px";	
}

function dela(){
return;	
}

function act_incidentes(obj){
	obj=document.getElementById('incidentes');
	obj.style.opacity = 100;
}	

function des_incidentes(obj){
	obj=document.getElementById('incidentes');
	obj.style.opacity = .8;
}

function activa_fil(){
	area1 = document.getElementById('area1');
	zona1 = document.getElementById('zona1');
	item1 = document.getElementById('item1');
	filtro = document.getElementById('filt');
	if (area1.value=="0" && zona1.value=="0" && item1.value=="0"){
		filtro.style.backgroundColor="#454344";
	}else{
		filtro.style.backgroundColor="#DE2825";
	}	
}