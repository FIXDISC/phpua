<<<<<<< HEAD
(function (lib, img, cjs) {

var p; // shortcut to reference prototypes
var rect; // used to reference frame bounds

// stage content:
(lib.PV = function(mode,startPosition,loop) {
if (loop == null) { loop = false; }	this.initialize(mode,startPosition,loop,{});

	// bordes
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#FFFFFF").ss(1,1,1).p("AQBtEIA+gUIgsiWIhDAVgAHdsbIBXEJIHPiXIhQkIgAIlC1IF5h4IhXkRIlyBzgAGzhbIlgByIApB/IFeh2gABNBVIDTJIIioBBIjYpMgADnGtIDohZIgrhzIjmBYgARER/IgQhcIDIgnIBBEdIkJA/IgpjNgAUhiRIgriHIg/AWIAuCHgAX/SqIikAmIg4jaICqgmgAXAE0Iml0/ID9hMIGjU7gA4f2kIkRAnIgMhrIELgpgA163nIDkgfIBNG4IjoAngA7hzlID8gqIAsDhIkAAtgAahYSIgvihICdgzIAuCeg");
	this.shape.setTransform(371.8,273.9);

	this.instance = new lib.Symbol3();
	this.instance.setTransform(371.8,273.9,1,1,0,0,0,185.3,155.5);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[]}).to({state:[]},5).to({state:[{t:this.shape}]},19).to({state:[{t:this.instance}]},5).wait(1));

	// build
	this.instance_1 = new lib.build_1();
	this.instance_1.setTransform(399.2,284.5,1,1,0,0,0,400,284.5);
	this.instance_1._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_1).wait(5).wait(14).to({_off:false},0).wait(11));

	// line
	this.instance_2 = new lib.line();
	this.instance_2.setTransform(400,0,1,1,0,0,0,400,0);
	this.instance_2._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_2).wait(5).to({_off:false},0).wait(25));

	// scann
	this.instance_3 = new lib.scan();
	this.instance_3.setTransform(400.3,-41.6,1,1,0,0,0,400,-81.2);
	this.instance_3._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_3).wait(5).to({_off:false},0).wait(25));

	// calles
	this.instance_4 = new lib.calles_1();
	this.instance_4.setTransform(0,-1.5);
	this.instance_4._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_4).wait(5).to({_off:false},0).wait(25));

	// black
	this.instance_5 = new lib.Symbol2();
	this.instance_5.setTransform(400,283.8,1,1,0,0,0,400,285.3);
	this.instance_5.alpha = 0;

	this.timeline.addTween(cjs.Tween.get(this.instance_5).wait(1).to({alpha:0.027},0).wait(1).to({alpha:0.053},0).wait(1).to({alpha:0.08},0).wait(1).to({alpha:0.107},0).wait(1).to({alpha:0.133},0).wait(1).to({alpha:0.16},0).wait(19).wait(1).to({alpha:0.21},0).wait(1).to({alpha:0.26},0).wait(1).to({alpha:0.31},0).wait(1).to({alpha:0.36},0).wait(1));

	// BG
	this.instance_6 = new lib.calles_1();
	this.instance_6.setTransform(400,283,1,1,0,0,0,400,284.5);

	this.instance_7 = new lib.PLANO_UAPV_1();

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.instance_7},{t:this.instance_6}]}).wait(30));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = rect = new cjs.Rectangle(0,-1.5,800,570.6);
p.frameBounds = [rect, rect, rect, rect, rect, rect=new cjs.Rectangle(0,-45.5,800.7,614.7), rect, rect, rect, rect, rect, rect, rect, rect, rect, rect, rect, rect, rect, rect=new cjs.Rectangle(-2481.5,-1764.4,5761.6,4097.9), rect, rect, rect, rect, rect, rect, rect, rect, rect, rect];


// symbols:
(lib.build = function() {
	this.initialize(img.build);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,800,569);


(lib.calles = function() {
	this.initialize(img.calles);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,800,569);


(lib.PLANO_UAPV_1 = function() {
	this.initialize(img.PLANO_UAPV_1);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,800,569);


(lib.scan1 = function() {
	this.initialize(img.scan1);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,800,48);


(lib.Tween12 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.build();
	this.instance.setTransform(-2880.7,-2048.9,7.202,7.202);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = rect = new cjs.Rectangle(-2880.7,-2048.9,5761.6,4097.9);
p.frameBounds = [rect];


(lib.Tween5 = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#66FFFF").ss(1,1,1).p("Eg+fAAAMB8/AAA");

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = rect = new cjs.Rectangle(-399.9,0,800,0);
p.frameBounds = [rect];


(lib.Tween1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.calles();
	this.instance.setTransform(-399.9,-284.4);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = rect = new cjs.Rectangle(-399.9,-284.4,800,569);
p.frameBounds = [rect];


(lib.Symbol3 = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#66CCFF").ss(1,1,1).p("AXAE0Iml0/ID9hMIGjU7gAX/SqIikAmIg4jaICqgmgAcPU+IAuCeIicA2IgmiEIgJgdgAQ/tYIgsiWIhDAVIAxCVgAOzuxInWCWIBXEJIHPiXgABNBVIDTJIIioBBIjYpMgAB8CWIFeh2Ignh7IlgBygAGkDhIjmBYIApB0IDohZgAIlC1IF5h4IhXkRIlyBzgAT2kYIg/AWIAuCHIA8gWgAyW4GIBNG4IjoAnIhJnAgA8w19IgMhrIELgpIASBtgA3l0PIAsDhIkAAtIgojkgAU9UZIkJA/IgpjNIA5gMIgQhcIDIgng");
	this.shape.setTransform(185.3,155.5);

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = rect = new cjs.Rectangle(0,0,370.7,311);
p.frameBounds = [rect];


(lib.Symbol2 = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#000000").s().p("Eg+fAskMAAAhZHMB8/AAAMAAABZHg");
	this.shape.setTransform(400,285.3);

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = rect = new cjs.Rectangle(0,0,800,570.6);
p.frameBounds = [rect];


(lib.Symbol1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.scan1();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = rect = new cjs.Rectangle(0,0,800,48);
p.frameBounds = [rect];


(lib.scan = function(mode,startPosition,loop) {
if (loop == null) { loop = false; }	this.initialize(mode,startPosition,loop,{});

	// Layer 3
	this.instance = new lib.Symbol1();
	this.instance.setTransform(400.4,-61,1,1,0,0,0,400,24);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1).to({y:6.8},0).wait(1).to({y:74.7},0).wait(1).to({y:142.7},0).wait(1).to({y:210.6},0).wait(1).to({y:278.5},0).wait(1).to({y:346.5},0).wait(1).to({y:414.4},0).wait(1).to({y:482.4},0).wait(1).to({y:550.3},0).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = rect = new cjs.Rectangle(0.4,-85.1,800,48);
p.frameBounds = [rect, new cjs.Rectangle(0.4,-17.2,800,48), new cjs.Rectangle(0.4,50.7,800,48), new cjs.Rectangle(0.4,118.7,800,48), new cjs.Rectangle(0.4,186.6,800,48), new cjs.Rectangle(0.4,254.5,800,48), new cjs.Rectangle(0.4,322.5,800,48), new cjs.Rectangle(0.4,390.4,800,48), new cjs.Rectangle(0.4,458.4,800,48), new cjs.Rectangle(0.4,526.3,800,48)];


(lib.line = function(mode,startPosition,loop) {
if (loop == null) { loop = false; }	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.Tween5("synched",0);
	this.instance.setTransform(400,0);

	this.timeline.addTween(cjs.Tween.get(this.instance).to({y:617.4},9).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = rect = new cjs.Rectangle(0,0,800,0);
p.frameBounds = [rect, new cjs.Rectangle(0,68.6,800,0), new cjs.Rectangle(0,137.2,800,0), new cjs.Rectangle(0,205.8,800,0), new cjs.Rectangle(0,274.4,800,0), new cjs.Rectangle(0,343,800,0), new cjs.Rectangle(0,411.6,800,0), new cjs.Rectangle(0,480.2,800,0), new cjs.Rectangle(0,548.8,800,0), new cjs.Rectangle(0,617.4,800,0)];


(lib.calles_1 = function(mode,startPosition,loop) {
if (loop == null) { loop = false; }	this.initialize(mode,startPosition,loop,{});

	// Layer 3 (mask)
	var mask = new cjs.Shape();
	mask._off = true;
	var mask_graphics_0 = new cjs.Graphics().p("Eg+fAFFIAAqIMB8/AAAIAAKIg");
	var mask_graphics_1 = new cjs.Graphics().p("Eg+fAIFIAAwJMB8/AAAIAAQJg");
	var mask_graphics_2 = new cjs.Graphics().p("Eg+fALGIAA2LMB8/AAAIAAWLg");
	var mask_graphics_3 = new cjs.Graphics().p("Eg+fAOGIAA8LMB8/AAAIAAcLg");
	var mask_graphics_4 = new cjs.Graphics().p("Eg+fARHMAAAgiNMB8/AAAMAAAAiNg");
	var mask_graphics_5 = new cjs.Graphics().p("Eg+fAUIMAAAgoPMB8/AAAMAAAAoPg");
	var mask_graphics_6 = new cjs.Graphics().p("Eg+fAXIMAAAguPMB8/AAAMAAAAuPg");
	var mask_graphics_7 = new cjs.Graphics().p("Eg+fAaJMAAAg0RMB8/AAAMAAAA0Rg");
	var mask_graphics_8 = new cjs.Graphics().p("Eg+fAdKMAAAg6TMB8/AAAMAAAA6Tg");
	var mask_graphics_9 = new cjs.Graphics().p("Eg+fAgKMAAAhATMB8/AAAMAAABATg");
	var mask_graphics_10 = new cjs.Graphics().p("Eg+fAjLMAAAhGVMB8/AAAMAAABGVg");
	var mask_graphics_11 = new cjs.Graphics().p("Eg+fAmMMAAAhMXMB8/AAAMAAABMXg");
	var mask_graphics_12 = new cjs.Graphics().p("Eg+fApMMAAAhSXMB8/AAAMAAABSXg");
	var mask_graphics_13 = new cjs.Graphics().p("Eg+fAsNMAAAhYZMB8/AAAMAAABYZg");
	var mask_graphics_14 = new cjs.Graphics().p("Eg+fAvOMAAAhebMB8/AAAMAAABebg");
	var mask_graphics_15 = new cjs.Graphics().p("Eg+fAyOMAAAhkbMB8/AAAMAAABkbg");

	this.timeline.addTween(cjs.Tween.get(mask).to({graphics:mask_graphics_0,x:400,y:-32.4}).wait(1).to({graphics:mask_graphics_1,x:400,y:-13.1}).wait(1).to({graphics:mask_graphics_2,x:400,y:6}).wait(1).to({graphics:mask_graphics_3,x:400,y:25.3}).wait(1).to({graphics:mask_graphics_4,x:400,y:44.6}).wait(1).to({graphics:mask_graphics_5,x:400,y:63.8}).wait(1).to({graphics:mask_graphics_6,x:400,y:83.1}).wait(1).to({graphics:mask_graphics_7,x:400,y:102.4}).wait(1).to({graphics:mask_graphics_8,x:400,y:121.6}).wait(1).to({graphics:mask_graphics_9,x:400,y:140.9}).wait(1).to({graphics:mask_graphics_10,x:400,y:160.2}).wait(1).to({graphics:mask_graphics_11,x:400,y:179.4}).wait(1).to({graphics:mask_graphics_12,x:400,y:198.7}).wait(1).to({graphics:mask_graphics_13,x:400,y:218}).wait(1).to({graphics:mask_graphics_14,x:400,y:237.2}).wait(1).to({graphics:mask_graphics_15,x:400,y:256.5}).wait(1));

	// Layer 1
	this.instance = new lib.Tween1("synched",0);
	this.instance.setTransform(400,284.5);

	this.instance.mask = mask;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(15).to({startPosition:0},0).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = rect = new cjs.Rectangle(0,0,800,0);
p.frameBounds = [rect, new cjs.Rectangle(0,0,800,38.6), new cjs.Rectangle(0,0,800,77.1), new cjs.Rectangle(0,0,800,115.6), new cjs.Rectangle(0,0,800,154.1), new cjs.Rectangle(0,0,800,192.7), new cjs.Rectangle(0,0,800,231.2), new cjs.Rectangle(0,0,800,269.7), new cjs.Rectangle(0,0,800,308.3), new cjs.Rectangle(0,0,800,346.8), new cjs.Rectangle(0,0,800,385.3), new cjs.Rectangle(0,0,800,423.9), new cjs.Rectangle(0,0,800,462.4), new cjs.Rectangle(0,0,800,500.9), new cjs.Rectangle(0,0,800,539.4), new cjs.Rectangle(0,0,800,569)];


(lib.build_1 = function(mode,startPosition,loop) {
if (loop == null) { loop = false; }	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.Tween12("synched",0);
	this.instance.setTransform(400,284.5);
	this.instance.alpha = 0.102;

	this.timeline.addTween(cjs.Tween.get(this.instance).to({scaleX:0.14,scaleY:0.14,alpha:0.59},14).to({alpha:0.398},10).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = rect = new cjs.Rectangle(-2480.7,-1764.4,5761.6,4097.9);
p.frameBounds = [rect, new cjs.Rectangle(-2303.5,-1638.3,5407.2,3845.8), new cjs.Rectangle(-2126.3,-1512.3,5052.8,3593.8), new cjs.Rectangle(-1949.1,-1386.3,4698.4,3341.7), new cjs.Rectangle(-1771.9,-1260.2,4343.9,3089.6), new cjs.Rectangle(-1594.7,-1134.2,3989.6,2837.6), new cjs.Rectangle(-1417.5,-1008.2,3635.2,2585.5), new cjs.Rectangle(-1240.3,-882.2,3280.8,2333.5), new cjs.Rectangle(-1063.1,-756.1,2926.4,2081.4), new cjs.Rectangle(-885.9,-630.1,2572.1,1829.4), new cjs.Rectangle(-708.7,-504.1,2217.7,1577.3), new cjs.Rectangle(-531.5,-378,1863.2,1325.2), new cjs.Rectangle(-354.3,-252,1508.8,1073.1), new cjs.Rectangle(-177.1,-126,1154.4,821.1), rect=new cjs.Rectangle(0,0,800,569), rect, rect, rect, rect, rect, rect, rect, rect, rect, rect];

})(lib = lib||{}, images = images||{}, createjs = createjs||{});
=======
(function (lib, img, cjs) {

var p; // shortcut to reference prototypes
var rect; // used to reference frame bounds

// stage content:
(lib.PV = function(mode,startPosition,loop) {
if (loop == null) { loop = false; }	this.initialize(mode,startPosition,loop,{});

	// bordes
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#FFFFFF").ss(1,1,1).p("AQBtEIA+gUIgsiWIhDAVgAHdsbIBXEJIHPiXIhQkIgAIlC1IF5h4IhXkRIlyBzgAGzhbIlgByIApB/IFeh2gABNBVIDTJIIioBBIjYpMgADnGtIDohZIgrhzIjmBYgARER/IgQhcIDIgnIBBEdIkJA/IgpjNgAUhiRIgriHIg/AWIAuCHgAX/SqIikAmIg4jaICqgmgAXAE0Iml0/ID9hMIGjU7gA4f2kIkRAnIgMhrIELgpgA163nIDkgfIBNG4IjoAngA7hzlID8gqIAsDhIkAAtgAahYSIgvihICdgzIAuCeg");
	this.shape.setTransform(371.8,273.9);

	this.instance = new lib.Symbol3();
	this.instance.setTransform(371.8,273.9,1,1,0,0,0,185.3,155.5);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[]}).to({state:[]},5).to({state:[{t:this.shape}]},19).to({state:[{t:this.instance}]},5).wait(1));

	// build
	this.instance_1 = new lib.build_1();
	this.instance_1.setTransform(399.2,284.5,1,1,0,0,0,400,284.5);
	this.instance_1._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_1).wait(5).wait(14).to({_off:false},0).wait(11));

	// line
	this.instance_2 = new lib.line();
	this.instance_2.setTransform(400,0,1,1,0,0,0,400,0);
	this.instance_2._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_2).wait(5).to({_off:false},0).wait(25));

	// scann
	this.instance_3 = new lib.scan();
	this.instance_3.setTransform(400.3,-41.6,1,1,0,0,0,400,-81.2);
	this.instance_3._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_3).wait(5).to({_off:false},0).wait(25));

	// calles
	this.instance_4 = new lib.calles_1();
	this.instance_4.setTransform(0,-1.5);
	this.instance_4._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_4).wait(5).to({_off:false},0).wait(25));

	// black
	this.instance_5 = new lib.Symbol2();
	this.instance_5.setTransform(400,283.8,1,1,0,0,0,400,285.3);
	this.instance_5.alpha = 0;

	this.timeline.addTween(cjs.Tween.get(this.instance_5).wait(1).to({alpha:0.027},0).wait(1).to({alpha:0.053},0).wait(1).to({alpha:0.08},0).wait(1).to({alpha:0.107},0).wait(1).to({alpha:0.133},0).wait(1).to({alpha:0.16},0).wait(19).wait(1).to({alpha:0.21},0).wait(1).to({alpha:0.26},0).wait(1).to({alpha:0.31},0).wait(1).to({alpha:0.36},0).wait(1));

	// BG
	this.instance_6 = new lib.calles_1();
	this.instance_6.setTransform(400,283,1,1,0,0,0,400,284.5);

	this.instance_7 = new lib.PLANO_UAPV_1();

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.instance_7},{t:this.instance_6}]}).wait(30));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = rect = new cjs.Rectangle(0,-1.5,800,570.6);
p.frameBounds = [rect, rect, rect, rect, rect, rect=new cjs.Rectangle(0,-45.5,800.7,614.7), rect, rect, rect, rect, rect, rect, rect, rect, rect, rect, rect, rect, rect, rect=new cjs.Rectangle(-2481.5,-1764.4,5761.6,4097.9), rect, rect, rect, rect, rect, rect, rect, rect, rect, rect];


// symbols:
(lib.build = function() {
	this.initialize(img.build);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,800,569);


(lib.calles = function() {
	this.initialize(img.calles);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,800,569);


(lib.PLANO_UAPV_1 = function() {
	this.initialize(img.PLANO_UAPV_1);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,800,569);


(lib.scan1 = function() {
	this.initialize(img.scan1);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,800,48);


(lib.Tween12 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.build();
	this.instance.setTransform(-2880.7,-2048.9,7.202,7.202);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = rect = new cjs.Rectangle(-2880.7,-2048.9,5761.6,4097.9);
p.frameBounds = [rect];


(lib.Tween5 = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#66FFFF").ss(1,1,1).p("Eg+fAAAMB8/AAA");

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = rect = new cjs.Rectangle(-399.9,0,800,0);
p.frameBounds = [rect];


(lib.Tween1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.calles();
	this.instance.setTransform(-399.9,-284.4);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = rect = new cjs.Rectangle(-399.9,-284.4,800,569);
p.frameBounds = [rect];


(lib.Symbol3 = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#66CCFF").ss(1,1,1).p("AXAE0Iml0/ID9hMIGjU7gAX/SqIikAmIg4jaICqgmgAcPU+IAuCeIicA2IgmiEIgJgdgAQ/tYIgsiWIhDAVIAxCVgAOzuxInWCWIBXEJIHPiXgABNBVIDTJIIioBBIjYpMgAB8CWIFeh2Ignh7IlgBygAGkDhIjmBYIApB0IDohZgAIlC1IF5h4IhXkRIlyBzgAT2kYIg/AWIAuCHIA8gWgAyW4GIBNG4IjoAnIhJnAgA8w19IgMhrIELgpIASBtgA3l0PIAsDhIkAAtIgojkgAU9UZIkJA/IgpjNIA5gMIgQhcIDIgng");
	this.shape.setTransform(185.3,155.5);

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = rect = new cjs.Rectangle(0,0,370.7,311);
p.frameBounds = [rect];


(lib.Symbol2 = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#000000").s().p("Eg+fAskMAAAhZHMB8/AAAMAAABZHg");
	this.shape.setTransform(400,285.3);

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = rect = new cjs.Rectangle(0,0,800,570.6);
p.frameBounds = [rect];


(lib.Symbol1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.scan1();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = rect = new cjs.Rectangle(0,0,800,48);
p.frameBounds = [rect];


(lib.scan = function(mode,startPosition,loop) {
if (loop == null) { loop = false; }	this.initialize(mode,startPosition,loop,{});

	// Layer 3
	this.instance = new lib.Symbol1();
	this.instance.setTransform(400.4,-61,1,1,0,0,0,400,24);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1).to({y:6.8},0).wait(1).to({y:74.7},0).wait(1).to({y:142.7},0).wait(1).to({y:210.6},0).wait(1).to({y:278.5},0).wait(1).to({y:346.5},0).wait(1).to({y:414.4},0).wait(1).to({y:482.4},0).wait(1).to({y:550.3},0).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = rect = new cjs.Rectangle(0.4,-85.1,800,48);
p.frameBounds = [rect, new cjs.Rectangle(0.4,-17.2,800,48), new cjs.Rectangle(0.4,50.7,800,48), new cjs.Rectangle(0.4,118.7,800,48), new cjs.Rectangle(0.4,186.6,800,48), new cjs.Rectangle(0.4,254.5,800,48), new cjs.Rectangle(0.4,322.5,800,48), new cjs.Rectangle(0.4,390.4,800,48), new cjs.Rectangle(0.4,458.4,800,48), new cjs.Rectangle(0.4,526.3,800,48)];


(lib.line = function(mode,startPosition,loop) {
if (loop == null) { loop = false; }	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.Tween5("synched",0);
	this.instance.setTransform(400,0);

	this.timeline.addTween(cjs.Tween.get(this.instance).to({y:617.4},9).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = rect = new cjs.Rectangle(0,0,800,0);
p.frameBounds = [rect, new cjs.Rectangle(0,68.6,800,0), new cjs.Rectangle(0,137.2,800,0), new cjs.Rectangle(0,205.8,800,0), new cjs.Rectangle(0,274.4,800,0), new cjs.Rectangle(0,343,800,0), new cjs.Rectangle(0,411.6,800,0), new cjs.Rectangle(0,480.2,800,0), new cjs.Rectangle(0,548.8,800,0), new cjs.Rectangle(0,617.4,800,0)];


(lib.calles_1 = function(mode,startPosition,loop) {
if (loop == null) { loop = false; }	this.initialize(mode,startPosition,loop,{});

	// Layer 3 (mask)
	var mask = new cjs.Shape();
	mask._off = true;
	var mask_graphics_0 = new cjs.Graphics().p("Eg+fAFFIAAqIMB8/AAAIAAKIg");
	var mask_graphics_1 = new cjs.Graphics().p("Eg+fAIFIAAwJMB8/AAAIAAQJg");
	var mask_graphics_2 = new cjs.Graphics().p("Eg+fALGIAA2LMB8/AAAIAAWLg");
	var mask_graphics_3 = new cjs.Graphics().p("Eg+fAOGIAA8LMB8/AAAIAAcLg");
	var mask_graphics_4 = new cjs.Graphics().p("Eg+fARHMAAAgiNMB8/AAAMAAAAiNg");
	var mask_graphics_5 = new cjs.Graphics().p("Eg+fAUIMAAAgoPMB8/AAAMAAAAoPg");
	var mask_graphics_6 = new cjs.Graphics().p("Eg+fAXIMAAAguPMB8/AAAMAAAAuPg");
	var mask_graphics_7 = new cjs.Graphics().p("Eg+fAaJMAAAg0RMB8/AAAMAAAA0Rg");
	var mask_graphics_8 = new cjs.Graphics().p("Eg+fAdKMAAAg6TMB8/AAAMAAAA6Tg");
	var mask_graphics_9 = new cjs.Graphics().p("Eg+fAgKMAAAhATMB8/AAAMAAABATg");
	var mask_graphics_10 = new cjs.Graphics().p("Eg+fAjLMAAAhGVMB8/AAAMAAABGVg");
	var mask_graphics_11 = new cjs.Graphics().p("Eg+fAmMMAAAhMXMB8/AAAMAAABMXg");
	var mask_graphics_12 = new cjs.Graphics().p("Eg+fApMMAAAhSXMB8/AAAMAAABSXg");
	var mask_graphics_13 = new cjs.Graphics().p("Eg+fAsNMAAAhYZMB8/AAAMAAABYZg");
	var mask_graphics_14 = new cjs.Graphics().p("Eg+fAvOMAAAhebMB8/AAAMAAABebg");
	var mask_graphics_15 = new cjs.Graphics().p("Eg+fAyOMAAAhkbMB8/AAAMAAABkbg");

	this.timeline.addTween(cjs.Tween.get(mask).to({graphics:mask_graphics_0,x:400,y:-32.4}).wait(1).to({graphics:mask_graphics_1,x:400,y:-13.1}).wait(1).to({graphics:mask_graphics_2,x:400,y:6}).wait(1).to({graphics:mask_graphics_3,x:400,y:25.3}).wait(1).to({graphics:mask_graphics_4,x:400,y:44.6}).wait(1).to({graphics:mask_graphics_5,x:400,y:63.8}).wait(1).to({graphics:mask_graphics_6,x:400,y:83.1}).wait(1).to({graphics:mask_graphics_7,x:400,y:102.4}).wait(1).to({graphics:mask_graphics_8,x:400,y:121.6}).wait(1).to({graphics:mask_graphics_9,x:400,y:140.9}).wait(1).to({graphics:mask_graphics_10,x:400,y:160.2}).wait(1).to({graphics:mask_graphics_11,x:400,y:179.4}).wait(1).to({graphics:mask_graphics_12,x:400,y:198.7}).wait(1).to({graphics:mask_graphics_13,x:400,y:218}).wait(1).to({graphics:mask_graphics_14,x:400,y:237.2}).wait(1).to({graphics:mask_graphics_15,x:400,y:256.5}).wait(1));

	// Layer 1
	this.instance = new lib.Tween1("synched",0);
	this.instance.setTransform(400,284.5);

	this.instance.mask = mask;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(15).to({startPosition:0},0).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = rect = new cjs.Rectangle(0,0,800,0);
p.frameBounds = [rect, new cjs.Rectangle(0,0,800,38.6), new cjs.Rectangle(0,0,800,77.1), new cjs.Rectangle(0,0,800,115.6), new cjs.Rectangle(0,0,800,154.1), new cjs.Rectangle(0,0,800,192.7), new cjs.Rectangle(0,0,800,231.2), new cjs.Rectangle(0,0,800,269.7), new cjs.Rectangle(0,0,800,308.3), new cjs.Rectangle(0,0,800,346.8), new cjs.Rectangle(0,0,800,385.3), new cjs.Rectangle(0,0,800,423.9), new cjs.Rectangle(0,0,800,462.4), new cjs.Rectangle(0,0,800,500.9), new cjs.Rectangle(0,0,800,539.4), new cjs.Rectangle(0,0,800,569)];


(lib.build_1 = function(mode,startPosition,loop) {
if (loop == null) { loop = false; }	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.Tween12("synched",0);
	this.instance.setTransform(400,284.5);
	this.instance.alpha = 0.102;

	this.timeline.addTween(cjs.Tween.get(this.instance).to({scaleX:0.14,scaleY:0.14,alpha:0.59},14).to({alpha:0.398},10).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = rect = new cjs.Rectangle(-2480.7,-1764.4,5761.6,4097.9);
p.frameBounds = [rect, new cjs.Rectangle(-2303.5,-1638.3,5407.2,3845.8), new cjs.Rectangle(-2126.3,-1512.3,5052.8,3593.8), new cjs.Rectangle(-1949.1,-1386.3,4698.4,3341.7), new cjs.Rectangle(-1771.9,-1260.2,4343.9,3089.6), new cjs.Rectangle(-1594.7,-1134.2,3989.6,2837.6), new cjs.Rectangle(-1417.5,-1008.2,3635.2,2585.5), new cjs.Rectangle(-1240.3,-882.2,3280.8,2333.5), new cjs.Rectangle(-1063.1,-756.1,2926.4,2081.4), new cjs.Rectangle(-885.9,-630.1,2572.1,1829.4), new cjs.Rectangle(-708.7,-504.1,2217.7,1577.3), new cjs.Rectangle(-531.5,-378,1863.2,1325.2), new cjs.Rectangle(-354.3,-252,1508.8,1073.1), new cjs.Rectangle(-177.1,-126,1154.4,821.1), rect=new cjs.Rectangle(0,0,800,569), rect, rect, rect, rect, rect, rect, rect, rect, rect, rect];

})(lib = lib||{}, images = images||{}, createjs = createjs||{});
>>>>>>> origin/master
var lib, images, createjs;