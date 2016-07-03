$.fn.centrar = function(){

var elemento = $(this);

cambiarCss();

$(window).bind("resize", function(){
	cambiarCss();
});


function cambiarCss(){

var altoEle = $(elemento).height();
var anchoEle = $(elemento).width();
var anchoVentana = $(window).width();
var altoVentana = $(window).height();

$(elemento).css({
	"position" : "absolute",
	"left" : anchoVentana / 2 - anchoEle / 2,
	"left" : altoVentana / 2 - altoEle / 2
});

};

};