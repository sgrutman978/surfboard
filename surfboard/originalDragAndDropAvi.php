<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

<div id="container">
  <div class="draggable-creator" data-type="picture">
    Picture
  </div>
  <div class="draggable-creator" data-type="video">
    Video
  </div>
</div>

<div id="boardView"></div>
<style>
body {
  margin:0px;
}
#container {
  width:30%;
  height:100%;
  background:white;
  position:absolute;
  left:0;
}

.draggable-creator {
  height:20px;
  width:100%;
  border-style:solid;
  border-width:0px 0px 1px 0px;
  border-color:grey;
  padding:30px;
}

.draggable {
  background:white;
  width:400px;
  height:200px;
  text-align:center;
  z-index:1;
}
.draggable:hover .handle {
  margin-top:-30px;
  display:block;
}
.draggable .handle {
  z-index:100;
  margin-top:0px;
  height:30px;
  width:40px;
  background:black;
  display:none;
}
.draggable img {
  height:100%;
  width:100%;
}
.draggable iframe {
  width:100%;
  height:100%;
}
#boardView {
  height:100%;
  width:70%; 
  background:lightgrey;
  overflow:auto;
  position:absolute;
  right:0;
}
</style>
<script>
var elements={"picture":"<div class='draggable'><div class='handle'></div></br></br>Choose a picture:</br><input type='file' value='Choose Picture' accept='image/*'></input></div>", "video":"<div class='draggable'><div class='handle'></div><iframe src='//www.youtube.com/embed/9bZkp7q19f0?list=PLirAqAtl_h2r5g8xGajEwdXd3x1sZh8hC&index=number' frameborder='0' allowfullscreen></iframe></div>"};

var counter=0;
var objName="";
$( ".draggable-creator" ).draggable({ 
  cursorAt: { top: -2, left: -2 },
  helper: function() {
    var element = elements[$(this).attr("data-type")];
    element=element.replace("number", Math.floor((Math.random() * 200) + 1));
    return element;
  },
  stop: function( event, ui ) {
    var pos = $(ui.helper).offset();
    objName = "div" + counter;
    counter++;
    $(ui.helper).clone().attr("id", objName).appendTo($("#boardView"));
    
    $("#"+objName).css({
      "left": pos.left-$("#boardView").offset().left,
      "top": pos.top-$("#boardView").offset().top
    });
    
    $("#"+objName).draggable({
      containment: [ $("#container").width(), 30],
      scroll: true,
      handle: ".handle",
      cursorAt: { top: -5, left: -5 },
      start: function() {
        $(this).draggable( "option", "zIndex", 1+counter);
      }
    }).resizable({
      
    });
  },
  revert: false
});

$( "#boardView" ).droppable({
  drop: function( event, ui ) {
    
  }
});
</script>