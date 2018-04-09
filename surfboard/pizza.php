<html>
<head></head><style>
body{
-webkit-touch-callout: none;
-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
<!--overflow:hidden;-->
}
</style>
<body style="cursor:default" onload="InitThis();">

 <link rel="stylesheet" type="text/css" href="byrei-dyndiv_0.5.css">
 <script type="text/javascript" src="byrei-dyndiv_1.0rc1.js"></script>	
  <script type="text/javascript" src="html2canvas.js"></script>	

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="JsCode.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed|Happy+Monkey|Architects+Daughter|Gloria+Hallelujah' rel='stylesheet' type='text/css'>
<script src="/jquery.js" ></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

  
<div id="testdiv_1" class="dynDiv_moveDiv">
 <p style="padding: 10px;">This is a Test Div with ByRei DynDiv, resize it ;)</p>
 <div class="dynDiv_resizeDiv_tl"></div>
 <div class="dynDiv_resizeDiv_tr"></div>
 <div class="dynDiv_resizeDiv_bl"></div>
 <div class="dynDiv_resizeDiv_br"></div>
</div>

<div id="testdiv_2" class="dynDiv_moveDiv">
 <p style="padding: 10px;">This is a Test Div with ByRei DynDiv, resize it ;)</p>
 <div class="dynDiv_resizeDiv_tl"></div>
 <div class="dynDiv_resizeDiv_tr"></div>
 <div class="dynDiv_resizeDiv_bl"></div>
 <div class="dynDiv_resizeDiv_br"></div>
</div>

     <style>
	 #testdiv_1 {
 width: 150px;
 height: 150px;
 background: #ccc;
 top: 300px;
 left: 50px;
 position: absolute;
 z-index:10;
}

#testdiv_2 {
 width: 295px;
 height: 394px;
 right: 10px;
  background: #ccc;
 top: 160px;
 position: absolute;
}

#testdiv_2_move {
 text-align: center;
 filter:alpha(opacity=50);
 opacity:0.5;
 color: #fff;
}
</style>

	    <canvas id="myCanvas" width="900" height="600" style="position:absolute;top:-1px;left:-1px;border:1px solid black;z-index:0">
		<!-- background:url() no-repeat center center fixed -->

		</canvas>
		<!--<canvas id="c" width = "900" height = "600" style="position:absolute;top:30px;left:170px"></canvas>-->
    
        <br /><br />
		<div style="z-index:11;top:610px;position:absolute">
        <button onclick="javascript:clearArea();return false;">Clear Area</button>
        Line width : <select id="selWidth">
            <option value="1">1</option>
            <option value="3">3</option>
            <option value="6">6</option>
            <option value="10" selected="selected">10</option>
            <option value="16">16</option>
            <option value="25">25</option>
			 <option value="38">38</option>
            <option value="57">57</option>
            <option value="110">110</option>
			<option value="165">165</option>
        </select>
        Color : <select id="selColor">
            <option value="black">black</option>
            <option value="blue" selected="selected">blue</option>
            <option value="red">red</option>
            <option value="green">green</option>
            <option value="yellow">yellow</option>
            <option value="gray">gray</option>
        </select></br>
		  <input type="file" id="file2">
	<button id="subPic" style="background-color:green;padding:8px">Change Background</button>
	<!--Name:<input type="text" placeholder="name" id="name">-->
		<button id="saveAs" style="background-color:green;padding:8px">Save</button>
<!--<div id="boxerr" style="position:absolute;top:0px;left:0px;width:200px;height:200px;background-color:red">hi</div>-->
<button id="editPics">Edit Pics</button>
<button id="editDraw">Draw</button>
<button id="savePicCanvas">Save</button>

		</div>

		<div id="saveCanvas" style="width:900px;top:800px;left:0px;position:absolute;min-height:1000px;background-color:green"></div>
	<script>
	//$("field_name").update("New text");
	var mousePressed = false;
	var mousePressed2 = false;
var lastX, lastY;
var ctx;
var boxerr = $('#boxerr').position();
var movable = true;

$(document).ready(function(){	
fffff();
    });

$('body').mousedown(function(e) {
mousePressed2 = true;
});

$('body').mouseup(function() {
mousePressed2 = false;
});

function rrrr() {
movable = false;
 $(".dynDiv_resizeDiv_tl").css("visibility","visible");
   $(".dynDiv_resizeDiv_tr").css("visibility","visible");
    $(".dynDiv_resizeDiv_bl").css("visibility","visible");
	 $(".dynDiv_resizeDiv_br").css("visibility","visible");
  $(".dynDiv_moveDiv").css("z-index","10");
};

$("#editPics").click(function(){
rrrr();
});


$("#savePicCanvas").click(function(){
html2canvas(document.body, {
  onrendered: function(canvas) {
    document.getElementById("saveCanvas").appendChild(canvas);
  },
  width: 900,
  height: 600
}); 
});

$("#editDraw").click(function(){
fffff();
});

function fffff(){
movable = true;
  $(".dynDiv_resizeDiv_tl").css("visibility","hidden");
   $(".dynDiv_resizeDiv_tr").css("visibility","hidden");
    $(".dynDiv_resizeDiv_bl").css("visibility","hidden");
	 $(".dynDiv_resizeDiv_br").css("visibility","hidden");
  $(".dynDiv_moveDiv").css("z-index","-1");
};

$('body').mousemove(function(e) {
if(mousePressed2 || movable){
  offset = $(this).offset();
   x = (e.clientX - offset.left - ((($(window).width()/100)*7)/2))*100/$(window).width();
   y = ((e.clientY - offset.top - ((($(window).width()/100)*7)/2))/$(window).height())*100;
	$('#boxerr').animate({
                    left: e.clientX-100 + "px",
					top: e.clientY-100 + "px",
                }, 0);
				}
});

   $("#subPic").click(function () {
			// grab name of file and location
		var fullPath = document.getElementById('file2').value;
	var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
	var filename = fullPath.substring(startIndex);
	if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
		filename = filename.substring(1);
	}
$('#myCanvas').css({"background":"url(" + filename + ") no-repeat center", "background-size":"contain"});
			});

function InitThis() {
    ctx = document.getElementById('myCanvas').getContext("2d");

    $('#myCanvas').mousedown(function (e) {
        mousePressed = true;
		if(movable){
        Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);
    }});

    $('#myCanvas').mousemove(function (e) {
        if (mousePressed && movable) {
            Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, true);
        }
    });

    $('body').mouseup(function (e) {
        mousePressed = false;
    });
}

function Draw(x, y, isDown) {
ctx.beginPath();  
  if (isDown) {
        ctx.moveTo(lastX, lastY);
    }else{
	ctx.moveTo(x-1, y-1);
	}
	 ctx.strokeStyle = $('#selColor').val();
        ctx.lineWidth = $('#selWidth').val();
		ctx.lineJoin = "round";
        ctx.lineTo(x, y);
        ctx.closePath();
        ctx.stroke();
    lastX = x; lastY = y;
}

function clearArea() {
    // Use the identity matrix while clearing the canvas  
   ctx.setTransform(1, 0, 0, 1, 0, 0);
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
}




///////////////////////////////////////////////////////////




$("#saveAs").click(function () {
var c=document.getElementById("myCanvas");
var d=c.toDataURL("image/jpg");
//var w=window.open('about:blank','image from canvas');
//w.document.write("<img src='"+d+"' alt='from canvas'/>");
$.ajax({
    url: "save.php",
    type: "POST",
    data: {name: $("#name").val(), picture: d},
})
.done(function(data) {
    alert("done");
    alert(data);
});

});

//////////////////////////////////////////////////////////////

/*var canvas = $("#myCanvas");
var c = canvas[0].getContext("2d");

var path = "http://wonderfl.net/images/icon/e/ec/ec3c/ec3c37ba9594a7b47f1126b2561efd35df2251bfm";
var image = new DragImage(path, 200, 100);

var loop = setInterval(function() {

    c.fillStyle = "white";
    c.fillRect(0, 0, 612, 612);

    image.update();

}, 30);

var mouseX = 0, mouseY = 0;
var mousePressed3 = false;
canvas.mousemove(function(e) {
  mouseX = e.offsetX;
  mouseY = e.offsetY;
})
 
$(document).mousedown(function(){
    mousePressed3 = true;
}).mouseup(function(){
    mousePressed3 = false;
});

function DragImage(src, x, y) {
    var that = this;
    var startX = 0, startY = 0;
    var drag = false;
    this.x = x;
    this.y = y;
    var img = new Image();
    img.src = src;
    this.update = function() {
        if (mousePressed3){
            var left = that.x;
            var right = that.x + img.width;
            var top = that.y;
            var bottom = that.y + img.height;
            if (!drag){
              startX = mouseX - that.x;
              startY = mouseY - that.y;
            }
            if (mouseX < right && mouseX > left && mouseY < bottom && mouseY > top){
               drag = true;
            }
        }else{
           drag = false;
        }
        if (drag){
            that.x = mouseX - startX;
            that.y = mouseY - startY;
        }
        c.drawImage(img, that.x, that.y);
    }
}
*/










	</script>
</body>
</html>