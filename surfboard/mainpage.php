<?php
$url = 'index.php';
	if(isset($_COOKIE['diresu']) && isset($_COOKIE['nekot'])){
		$result = mysqli_query($con,"SELECT * FROM users WHERE userID = " . $_COOKIE["diresu"] . "");
		$result156 = mysqli_query($con,"SELECT * FROM users WHERE userID = " . $_COOKIE["diresu"] . "");
		$row156 = mysqli_fetch_array($result156);
		while($row = mysqli_fetch_array($result)){
			if($row['userID'] == $_COOKIE['diresu'] && $row['token'] == $_COOKIE['nekot']){
			$boardID = $row['meBoardID'];
	$loggedInID = $row['userID'];
    $newOrNo = $row['newUser'];
      mysqli_query($con,"UPDATE users SET newUser=1 WHERE userID = " . $_COOKIE["diresu"] . "");
			}else{
//		header( "Location: $url" );
    $boardID = 0;
  $loggedInID = 0;
     $newOrNo = 2;
   setcookie("diresu", 0);
setcookie("nekot", "token");
header( "Location: mainpage.php" );
				}
		}
	}else{
	//	header( "Location: $url" );
   $boardID = 0;
  $loggedInID = 0;
  $newOrNo = 2;
  setcookie("diresu", 0);
setcookie("nekot", "token");
header( "Location: mainpage.php" );
	}
  $postNumber=time();
?>
	


<!-- 
  _________              ________.                          .___
 /   _____/__ __________/ ____\_ |__   _________ _______  __| _/
 \_____  \|  |  \_  __ \   __\ | __ \ /  _ \__  \\_  __ \/ __ | 
 /        \  |  /|  | \/|  |   | \_\ (  <_> ) __ \|  | \/ /_/ | 
/_______  /____/ |__|   |__|   |___  /\____(____  /__|  \____ | 
        \/                         \/           \/           \/ 
 -->






<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="sWaves.png" />
 <title>
 Surfboard
 </title>
    <link rel="stylesheet" href="cropper.min.css">
    <link href='http://fonts.googleapis.com/css?family=Crafty+Girls|Pacifico|Yellowtail|Limelight|Courgette|Rancho|Open+Sans|Fugaz+One|Contrail+One|Nova+Square|Cherry+Cream+Soda|Alfa+Slab+One|Covered+By+Your+Grace|Inconsolata|Coming+Soon|Comfortaa|Source+Code+Pro|Fredoka+One|Righteous' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Questrial|Montserrat:400,700' rel='stylesheet' type='text/css'>
 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
 <link rel="stylesheet" href="style.php">
 <?php
 function isMobile(){
if(preg_match('/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|sagem|sharp|sie-|smartphone|sony|symbian|t-mobile|telus|up\.browser|up\.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i', $_SERVER['HTTP_USER_AGENT'])){
 echo   "<style>
	 #navigator {
  background:rgb(245,245,255);
  border:1px solid black;
  height:100px;
  width:100px;
  position:fixed;
  right:1%;
  top:50px;
  z-index:99999999;
 display:none;
}
#boardView {
  width:100%;
  overflow:scroll;
  height:94%;
  top:41px;
  left:0px;
  position:absolute;
  border:none;
  background:rgba(12,190,109,0.05);    /*(125,58,0,.1)     -------     (250,190,109,0.1)*/
}
</style>";
}else{
    echo "<style>
        #navigator {
  background:rgb(245,245,255);
  border:1px solid black;
  height:100px;
  width:100px;
  position:fixed;
  right:1%;
  top:50px;
  z-index:99999999;
}
#boardView {
  width:100%;
  overflow:hidden;
  height:94%;
  top:41px;
  left:0px;
  position:absolute;
  border:none;
  background:rgba(12,190,109,0.05);    /*(125,58,0,.1)     -------     (250,190,109,0.1)*/
}
        </style>";
        }
}

echo isMobile();
 ?>
 <style>

#navigator #view {
  width:20px;
  height:20px;
  background:black;
  opacity:.3;
  z-index: 1002;
  cursor:pointer;
}

#view.addSpace {
	border-width: 0px 8px 8px 0px;
  border-style: solid;
  border-color:white;
}

.post {
	z-index: 3;
	border-radius:5px;
}
.draggable-creator {
  	cursor:all-scroll;
	float:left;
	margin-left:9px;
	margin-top:4px;
	color:rgb(125,58,0);
}
.draggable-creator:hover {
	color:white;
}
.draggable {
  background:white;
  width:300px;
  height:200px;
  text-align:center;
  z-index:1;
  cursor:move;
  border-radius:5px;
}
.draggable .handle {
  z-index:100;
  top:0px;
  left:0px;
  position: absolute;
  height:100%;
  width:100%;
}
.draggable img {
  height:100%;
  width:100%;
}
.draggable iframe {
  width:100%;
  height:100%;
}

#massiveConfusion {
	min-height:100%;
	min-width:100%;
	position:absolute;
	top:0px;
	left:0px;
}
/*.xOut{
background:red;
position:absolute;
padding:0px 3px;
border-radius:20px;
font-size:15px;
cursor:pointer;
}*/

#favorite:hover{
color:yellow;
}
#favorite{
color:black;
}
#unfavorite{
	color:yellow;
}
#unfavorite:hover{
color:black;
}
#notificationsButton:hover{
color:white;
}
#showBoards:hover{
	color:white;
}
/*#refreshButton:hover{
	color:white;
}*/
#editButton:hover, #drawButton:hover, #addPost:hover{
	color:white;
}
#infoBoardButton:hover{
	color:white;
}
#settingsButton{
  top:-11px;
  left:81px;
  position:absolute;
  cursor:pointer;
  float:left;
  width:56px;
  font-size:26px;
  height:100%;
}
.hoverWhite:hover{
	color:white;
}
#logOutButton{
top:-7px;
  left:117px;
  position:absolute;
  cursor:pointer;
  float:left;
  width:56px;
  font-size:28px;
  height:100%;
  color:rgb(125,58,0);
}
#notificationsButton{
	top:-11px;
  left:1px;
  position:absolute;
  cursor:pointer;
  float:left;
  width:56px;
  font-size:26px;
  height:100%;
  color:white;
}
/*#refreshButton{
	cursor:pointer;
	color:green;
	float:left;
	margin-left:9px;
	margin-top:-2px;
}*/
#infoBoardButton{
	cursor:pointer;
	color:green;
	float:left;
	margin-left:9px;
	margin-right:4px;
	margin-top:-2px;
	display:none;
}
#editButton{
	cursor:pointer;
	margin-left:8px;
	margin-top:-7px;
	color:rgb(125,58,0);
	font-size:22px;
	float:left;
}
#drawButton{
	cursor:pointer;
	margin-left:8px;
	margin-top:-7px;
	color:rgb(125,58,0);
	font-size:22px;
	float:left;
}
#addPost{
  cursor:pointer;
  margin-left:8px;
  margin-top:-7px;
  color:rgb(125,58,0);
  font-size:22px;
  float:left;
}
.friend:hover{
color:yellow;
}
.friend{
color:black;
}
.unfriend{
	color:yellow;
}
.unfriend:hover{
color:black;
}
.noRequest:hover{
color:yellow;
}
.noRequest{
color:black;
}
.noFriend:hover{
color:yellow;
}
.noFriend{
color:black;
}
.yesFriend{
	color:yellow;
}
.yesFriend:hover{
color:black;
}
.hoverColorWhite{
	color:black;
}
.hoverColorWhite:hover{
	color:white;
}
#addSpace{
	background:lightgreen;
	border-radius:20px;
	text-align:center;
	height:18px;
	width:18px;
	position:absolute;
	bottom:-10px;
	right:-10px;
	cursor:pointer;
	z-index: 1003;
}
#addSpace:hover{
	background:orange;
}
.at, .hashtag {
	cursor:pointer;
	color:#0066CC;
}
.at:hover, .hashtag:hover {
	text-decoration: underline;
}
.removePost{
	color:red;
	position:absolute;
	left:5px;
	bottom:-2px;
	font-size:25px;
	z-index:999999;
	cursor:pointer;
}
.removePost:hover{
	color:white;
}
.commentButtons{
	position:absolute;
bottom:10px;
left:10px;
opacity:0;
color:white;
z-index: 111111111111111;
cursor:pointer;
}
.commentButtons:hover{
opacity:1;
}
.bigBoxes{
	color:ghostwhite;
	background:rgb(125,58,0);
	position:fixed;
	top:-2000px;
	z-index:999999999;
	border-style:solid;
	border-color:black;
	border-width:2px;
	border-radius:5px;
	text-align:center;
	font-size:30px;
}
 </style>
 </head>
  <body style="cursor:default" onload="InitThis();">
  	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54080156-1', 'auto');
  ga('send', 'pageview');

</script>
<link rel="stylesheet" type="text/css" href="byrei-dyndiv_0.5.css">
 <script type="text/javascript" src="byrei-dyndiv_1.0rc1.js"></script>	

	<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed|Happy+Monkey|Architects+Daughter|Audiowide|Gloria+Hallelujah' rel='stylesheet' type='text/css'>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<div id="drawSpecs" style="display:none;z-index:11;left:400px;bottom:7px;position:absolute;background:rgb(250,190,109)">
       <!--  <button onclick="javascript:clearArea();return false;">Clear Area</button> -->
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
	</div>

<img src="0" id="scream" style="position:fixed;top:-20000px" />

    <div id="boardView">
    		<div id="massiveConfusion"></div>
    		<canvas id='drawCanvas' width="1400" height="1200" style='left:0px;top:0px;position:absolute;z-index:2'></canvas>
	</div>
	<div id="dropDiv"></div>
    <div id="dragDrop">
    	<span style="font-size:14px;margin-left:9px">Drag to add a post:</span></br>
	<div class="draggable-creator" data-type="picture">
    <span class="fontawesome-camera"></span></br>
  </div>
  <div class="draggable-creator" data-type="video">
    <span class="fontawesome-facetime-video"></span>
  </div>
    <div class="draggable-creator" data-type="text">
    <span class="fontawesome-font"></span>
  </div>
    <div class="draggable-creator" data-type="iframe">
    <span class="fontawesome-desktop"></span>
  </div>
    <!-- <div class="draggable-creator" data-type="file">
    <span class="fontawesome-paper-clip"></span>
  </div>
    <div class="draggable-creator" data-type="list">
    <span class="fontawesome-list-ul"></span>
  </div>
   <div class="draggable-creator" data-type="question">
    <span class="fontawesome-question-sign"></span>
  </div>
   <div class="draggable-creator" data-type="canvas">
    <span class="fontawesome-pencil"></span>
  </div> -->
  <!-- <div class="xOut" style="bottom:-2px;right:-2px">X</div> -->
    </div>
    <div id='slider' style='cursor:pointer;background:rgb(69,115,175);z-index:1000;color:white;position:fixed;right:0%;text-align:center;padding:3px;bottom:0px;width:20px;height:20px'>&#8592;</div>
	<div id='boardWalk' class="beach" style='padding-bottom:6px;position:fixed;color:rgb(125,58,0);width:18.5%;font-size:28px;text-align:center;font-family:Audiowide;top:40px;right:-20%;z-index:10000'>The Boardwalk</div>
  <div id="meBoard" style="z-index:100000;height:350px;position:fixed;top:-2000px;left:5%;border-style:solid;border-color:black;border-width:2px;border-radius:5px"></div>
	
    <header class="beach">
    	<div id="goToMe" class="fontawesome-user"><span style="font-size:12px;position:absolute;top:23px;left:15px;font-family:Open Sans"><b>Me</b></span>
		</div>
	<img src="wavesla.png" style="height:100%;float:left" />

	<div id="showBoards" style="font-family: 'Montserrat', sans-serif;margin-left:-10px; margin-top:7px;"> </div>
	<span style="float:left;font-size:20px;margin-top:7px;margin-left:-10px;font-family: 'Montserrat', sans-serif;">
	<span id="boardNameShow"></span></span>
	 <div id="infoBoardButton"><span class="entypo-info"></span></div>
		
		<div id="saveButton">
    <span class='fontawesome-ok'></span>
    <div style="margin-top:-4px;font-size:12px;font-family:Open Sans"><b>Save</b></div>
  </div>
  <div id="saveButton2">
    <span class='fontawesome-remove'></span>
     <div style="margin-top:-4px;font-size:12px;font-family:Open Sans"><b>Cancel</b></div>
  </div>
 
   <div id='addPost'><span class='fa fa-plus'></span><div style="margin-top:-9px;font-size:12px;font-family:Open Sans"><b>Post</b></div></div>
   <div id='drawButton'><span class='fa fa-pencil'></span><div style="margin-top:-9px;font-size:12px;font-family:Open Sans"><b>Draw</b></div></div>
  <div id='editButton'><span class='fa fa-arrows'></span></br><div style="margin-top:-8px;font-size:12px;font-family:Open Sans"><b>Edit</b></div></div>


  <div id="saveButtonEdit" style="left:18px">
     <span class='fontawesome-ok'></span>
     <div style="margin-top:-4px;font-size:12px;font-family:Open Sans"><b>Save</b></div>
  </div>
   <div id="saveButton3">
    <span class='fontawesome-remove'></span>
     <div style="margin-top:-4px;font-size:12px;font-family:Open Sans"><b>Cancel</b></div>
  </div>

    <div id="saveButton4" style="left:18px">
     <span class='fontawesome-ok'></span>
     <div style="margin-top:-4px;font-size:12px;font-family:Open Sans"><b>Save</b></div>
  </div>
   <div id="saveButton5">
    <span class='fontawesome-remove'></span>
    <div style="margin-top:-4px;font-size:12px;font-family:Open Sans"><b>Cancel</b></div>
  </div>
	
 <!-- <div id="refreshButton"><span class="fontawesome-refresh"></span></div>-->
   <div id="followButton" style="cursor:pointer;color:black;float:left;font-size:22px;margin-left:8px;margin-top:-7px"></div>
		<!--<span style="background:rgb(125,58,0);width:20%;height:40px;position:fixed;right:0px;top:0px"></span>-->
		<div id="search">
			<input id="searchBar" type="text" placeholder="Search People and #'s" maxlength="35" onkeyup="searchChange()"/>
			<i id="searchButtonIcon" style="color:rgb(125,58,0);cursor:pointer" class="fontawesome-search"></i>
		</div>

		<div id="notificationsButton"><span class='fontawesome-bullhorn'></span><span style="font-size:12px;position:absolute;top:34px;left:7px;font-family:Open Sans"><b>Alerts</b></span></div>
		 </header>
	
    <aside id="aside">
        
    </aside>
	
	<div id="navigator">
  <div id="addSpace">+</div>
  <img id="scream2" style="position:absolute;top:0px;z-index:1001;left:0px;width:100%;height:100%">
  <div id="view"></div>
  </div>
<div id="suggestions" style="display:none;padding:11px;width:17%;height:200px;background:rgb(125,58,0);position:fixed;top:-5000px;right:2%;overflow-x:hidden;overflow-y:scroll;z-index:10000000000001"></div> 
<div id="settingsBoard" class="bigBoxes" style="font-size:22px;color:rgb(69,115,175);background-color:rgb(250,190,109);width:64%;height:535px;left:8%;overflow-x:hidden;overflow-y:auto">
<span style="font-size:33px">Settings</span>
<div style="width:100%;height:500px;position:absolute;top:35px;left:0px" id="innerSettings"></div>
<!-- <div class="xOut" style="top:1px;left:1px">X</div> -->
</div>
<div id="friendsBoard" class="bigBoxes" style="width:56%;height:535px;left:8%;overflow-x:hidden;overflow-y:auto">
<!-- <div class="xOut" style="top:1px;left:1px">X</div> -->
</div>
<div id="notificationsBoard" class="bigBoxes" style="width:80%;height:535px;left:8%;overflow:hidden">
Alerts
<div style="width:100%;height:500px;position:absolute;top:35px;left:0px" id="innerNotifications"></div>
<!-- <div class="xOut" style="top:1px;left:1px">X</div>
 --></div>
<div id="searchResults" class="bigBoxes" style="width:48%;height:535px;left:8%;overflow-x:hidden;overflow-y:auto">
<!-- <div class="xOut" style="top:1px;left:1px">X</div>
 --></br>

</div>
<iframe src="" name="addIframe" id="addIframe" style="position:fixed;left:-5000;top:-5000px;width:1px;height:1px"></iframe>
	<!--<span id="logo">Board<span style="color:rgb(250,190,109)">walk</span></span>
	<div id="canvasGrab" style="position:absolute;top:-7150px;left:-7150px;width:100px;height:100px;background:green"></div>-->
   <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

<script type="text/javascript" src="cropper.min.js"></script>


	<script>
var currentBoard = <?php echo $boardID; ?>;
var newOrNo = <?php echo $newOrNo; ?>;
	var boardDiv = document.getElementById('boardView');
	var dropDivVar = document.getElementById('dropDiv');
	var blinker = 0;
	var yeay = true;
	/*var showIt = '';
	var newPostText = '';
	var IDs = [];*/
	
	var scale=5;

	$(document).ready(function(){
		if(window.location.hash){
			var stringS = window.location.hash;
currentBoard = parseInt(stringS.substr(1));
		}
	loadBoard(currentBoard).then(function () {
			// $("#massiveConfusion").css("width", "+=500px");
			// $("#massiveConfusion").css("height", "+=500px");
			rescaleDragDivThingyNavigator();
			searchChange();
			getPosts();
			notifications();
      if(newOrNo == 0){
        $('#meBoard iframe').remove();
      $('body').append("<div id='helpVid' style='width:100%;height:100%;position:fixed;top:0px;left:0px;background:rgba(0,0,0,.6);z-index:999999999999999999999'><iframe src='https://www.youtube.com/embed/_o8ZTLev8nQ?autoplay=1' frameborder='0' allowfullscreen' style='width:70%;height:80%;position:absolute;top:10%;left:15%'></iframe><div id='noHelp' onclick='noHelp()' style='cursor:pointer;background:red;border-radius:50px;width:50px;height:50px;position:absolute;top:10px;right:10px;text-align:center;font-size:40px'>X</div></div>");
    }
	});
    });

function noHelp(){
$('#helpVid').remove();
loadBoard(currentBoard);
  grabMeBoard(0, 0);
  grabMeBoard(<?php echo $row156['meBoardID']; ?>, 0);
   }

    $(document).click(function(){
    	if(!$(event.target).closest('#notificationsBoard').length){
$("#notificationsBoard").css({
	"top" : "-2000px",
	});
}
	if(!$(event.target).closest('#settingsBoard').length && !$(event.target).closest('#settingsButton').length){
$("#settingsBoard").css({
	"top" : "-1234px",
	});
}
	if(!$(event.target).closest('#searchResults').length && !$(event.target).closest('#searchBar').length){
$("#searchResults").css({
	"top" : "-2000px",
	});
}
	if(!$(event.target).closest('#friendsBoard').length){
$("#friendsBoard").css({
	"top" : "-2000px",
	});
}
if(!$(event.target).closest('#meBoard').length){
$("#meBoard").css({
	"top" : "-2000px",
	});
}
if(!$(event.target).closest('#addPost').length && !$(event.target).closest('#dragDrop').length){
  $( "#dragDrop" ).css("top", "-500px");
}
if($(event.target).closest('#searchBar').length || $(event.target).closest('#suggestions').length){
searchChange();
	$( "#suggestions" ).css("top", "40px");
}else{
	$( "#suggestions" ).css("top", "-2000px");
}

/*if($(event.target).closest('.post').length){
alert("pizza");
}else{

}*/
    });

$(".commentButtons").click(function() {
	alert("oh yeah");
});

    function getPosts(){
$.ajax({
		  type: "POST",
		  url: "getPosts.php",
		  data: { userID: <?php echo $loggedInID; ?> }
		})
		  .done(function( msg ) {
			document.getElementById("aside").innerHTML = msg;
			  });
    }
var slideOpen = 0;
    $("#slider").click(function() {
  if  (slideOpen == 0) {
  $( "aside" ).animate({
        right:"0%"
      }, 500);
  $( "#boardWalk" ).animate({
        right:"1.5%"
      }, 500);
          $( "#navigator" ).animate({
        right:"21%"
      }, 500);
           $( "#slider" ).animate({
        right:"20%"
      }, 500);
           setTimeout(function(){
 $("#slider").html("&#8594;");
           slideOpen = 1;
           }, 500);
         }else{
           $( "aside" ).animate({
        right:"-20%"
      }, 500);
           $( "#boardWalk" ).animate({
        right:"-20%"
      }, 500);
          $( "#navigator" ).animate({
        right:"1%"
      }, 500);
           $( "#slider" ).animate({
        right:"0px"
      }, 500);
           setTimeout(function(){
 $("#slider").html("&#8592;");
           slideOpen = 0;
           }, 500);
         }
    });

    function setUpPost(boardID, lefter, topper){
loadBoard(boardID);
rescaleDragDivThingyNavigator();
$("#view").css("left", Math.floor(lefter/scale));
$("#view").css("top", Math.floor(topper/scale));
$("#boardView").scrollLeft(lefter);
$("#boardView").scrollTop(topper);
    }
	


function settingsClicked(){
	$("#meBoard").css({
	"top" : "-2000px",
	});
	 returnSettings(1);
}

function returnSettings(yay){
	 $.ajax({
		  type: "POST",
		  url: "returnSettings.php",
		  data: { userID: <?php echo $loggedInID; ?> }
		})
		  .done(function( msg ) {
		 $("#innerSettings").html(msg);
			  });
    if	($( "#settingsBoard" ).css("top")=='54px') {
			
		}
		else {
			if(yay == 1){
			$( "#settingsBoard" ).animate({
			  top:"54px"
			}, 900);
		}
		}
}

function notifications(){
	 $.ajax({
		  type: "POST",
		  url: "returnNotifications.php",
		  data: { userID: <?php echo $loggedInID; ?> }
		})
		  .done(function( msg ) {
		 $("#innerNotifications").html(msg);

		 if(msg != ""){
		 	clearInterval(blinker);
		 	$("#notificationsButton").css( "color", "white" );
		 	counterBlinker = 0;
		 	 blinker = setInterval(function(){
		 			if(counterBlinker%2 != 0){
		 		$("#notificationsButton").css( "color", "red" );
		 	}else{
		 		$("#notificationsButton").css( "color", "white" );
		 	}
		 	counterBlinker++;
		 	}, 500);
		 	/*setTimeout(function(){
		 		clearInterval(blinker);
		 	blinker = 'pie';
		 	}, 14900);*/
		 }else{
		 	clearInterval(blinker);
		 	blinker = 'pie';
		 	$("#notificationsButton").css( "color", "white" );
		 }
			  });
			  }

$("#searchPeople").click(function() {
  startSearchPeople();
   });

setInterval(function(){
notifications();
}, 18000);

$("#notificationsButton").click(function(){
	notifications();
	 if	($( "#notificationsBoard" ).css("top")=='54px') {
			
		}
		else {
			$( "#notificationsBoard" ).animate({
			  top:"54px"
			}, 900);
		}
})

function loadFriendButton(specialID, type, otherID){
	 var x;
	 if(type == 4){
    if (confirm("Would you like to unfollow all of this person's storyboards when you unfriend them?") == true) {
        x = 2;
    } else {
        x = 1;
    }
}
	 $.ajax({
		  type: "POST",
		  url: "doFriendStuff.php",
		  data: { userID: <?php echo $loggedInID; ?>, type: type, otherID: otherID, yesNo: x, boardID: currentBoard }
		})
		  .done(function( msg ) {
		  	if(type==20 || type==21){
		  		$("#" + specialID).parent().replaceWith(msg);
		}else{
			$("#" + specialID).replaceWith(msg);
		}
		notifications();
			  });
}

function seenNotification(boardID, followerID, type){
	 $.ajax({
		  type: "POST",
		  url: "seenNotification.php",
		  data: { boardID: boardID, followerID: followerID, userID: <?php echo $loggedInID; ?>, type: type }
		})
		  .done(function( msg ) {
		if(type == 6 || type == 9){
loadBoard(boardID);
	 }
	 notifications();
			  });
}
   
   function startSearchPeople(){
   $.ajax({
		  type: "POST",
		  url: "returnSearch.php",
		  data: { userID: <?php echo $loggedInID; ?>, type: "people", search: document.getElementById("searchBar").value }
		})
		  .done(function( msg ) {
			document.getElementById("searchResults").innerHTML = msg;
			  });
   }
   

   
   //addEventListener('touchmove', function(e) { e.preventDefault(); }, true);
	
$("#view").draggable({ 
  containment: "parent",
  scroll: false,
  drag: function( event, ui ) {
    $("#boardView").scrollLeft($('#view').position().left*scale);
    $("#boardView").scrollTop($('#view').position().top*scale);
  },
  stop: function() {
  }
});

/*.touch({
    animate: false,
    sticky: false,
    dragx: true,
    dragy: true,
    rotate: false,
    resort: true,
    scale: false
});
*/

	
	var counter=<?=$postNumber;?>;
	var elements={"picture":"<div class='draggable' style='background:rgb(250,190,109);color:rgb(125,58,0);font:bold;z-index:1;font-size:25px'><form action='uploadImage.php' method='post' target='addIframe' enctype='multipart/form-data'></br></br>Choose a picture:</br><input type='file' value='Choose Picture' name='file' accept='image/*'></input></br><input type='submit' name='submit'></input></form><span class='fontawesome-comment commentButtons'></span></div>", "video":"<div class='draggable' style='background:rgb(250,190,109);color:rgb(125,58,0);font:bold;font-size:25px'><input type='text' id='videoText' placeholder='Paste youtube link to video here'></input></br></div>", "text":"<div class='draggable' style='z-index:3;text-align:center;background:rgb(250,190,109);color:rgb(125,58,0);font:bold;font-size:18px'><textarea placeholder='Sup?'></textarea></div>", "iframe":"<div class='draggable' style='background:rgb(250,190,109);color:rgb(125,58,0);font:bold;font-size:25px'><input type='text' id='iframeText' placeholder='Paste link here'></input></div>"};
var objName="";
var brand = "";

function makeIframe(){
var nameID = $("#dropDiv").children().first().attr("id");
$("#"+nameID+"").append("<iframe src='"+$("#"+nameID+" input").val()+"' style='position:absolute;top:0px;left:0px;height:100%;width:100%'></iframe>");
$("#"+nameID+" input").remove();
}

function makeVideo(){
var nameID = $("#dropDiv").children().first().attr("id");
var stringx = $("#"+nameID+" input").val();
$("#"+nameID+"").append("<iframe src='http://youtube.com/embed/"+stringx.substring(stringx.indexOf("=")+1)+"' style='position:absolute;top:0px;left:0px;height:100%;width:100%' frameborder='0' allowfullscreen></iframe>");
$("#"+nameID+" input").remove();
}

function editDraggable() {
	$("#massiveConfusion").children('.post').each(function(index, el) {
		$(this).addClass('draggable');
		$(this).prepend("<div class='handle'></div><div class='removePost' onclick='removePost(\"" + $(this).attr('id') + "\")'>X</div>");
	});

 	$(".post").draggable({
 		containment: "parent",
 		stop: function( event, ui ) {
 			rescaleDragDivThingyNavigator();
 		}
 	}).resizable({
 		stop: function( event, ui ) {
 			rescaleDragDivThingyNavigator();
 		}
 	});
}
var stringCheese = "";
function removePost(itsID){
			$("#" + itsID).remove();
			stringCheese += itsID + ","; 
}

/*function saveBoardGrab() {
var c=document.getElementById("drawCanvas");
var d=c.toDataURL("image/jpg");
var w=window.open('about:blank','image from canvas');
var nav=document.getElementById("navigator");
w.nav.append("<img src='"+d+"' style='width:100%;position:absolute;top:0px;left:0px' />");
};*/


$( ".draggable-creator" ).draggable({ 
containment: [ 7, 50, $("#boardView").width()-310, $("#boardView").height()-169],
  cursorAt: { top: -5, left: -5 },
  helper: function() {
    var element = elements[$(this).attr("data-type")];
    element=element.replace("number", Math.floor((Math.random() * 200) + 1));
    return element;
  },
  stop: function( event, ui ) {
  	// loadBoard(currentBoard).done(function() {
  
  	// });

    var pos = $(ui.helper).offset();
    objName = "div" + counter;
    counter++;
	$(ui.helper).clone().attr("id", objName).appendTo($("#dropDiv"));
      $("#addPost").css({
   "display" : "none"
   });
      $("#dragDrop").css({
  "top" : "-500px",
  });
      $("#editButton").css({
  "display" : "none",
  });
$("#drawButton").css({
  "display" : "none",
  });
   /* $(ui.helper).clone().attr("id", objName).appendTo($("#boardView"));
	$("body").append("<div id='extraBoard' style='display:hidden'></div>");
	showIt = document.getElementById('extraBoard')
	$(ui.helper).clone().attr("id", objName).appendTo($("#extraBoard"));
	newPostText = newPostText + showIt.innerHTML;
	alert(newPostText);
	IDs = [];
$("#extraBoard").find("div").each(function(){ IDs.push(this.id); });
alert(IDs);
	$('#extraBoard').remove();*/
	
	
    $("#"+objName).css({
      "left": pos.left-$("#dropDiv").offset().left,
      "top": pos.top-$("#dropDiv").offset().top,
      "width": "300px",
      "height": "200px"
    });
$("#drawCanvas").css({
			"z-index" : "0",
			});
$("#drawButton").css({
		"display" : "none",
		});
$("#editButton").css({
		"display" : "none",
		});

    
    $("#"+objName).draggable({
      containment: [ 7, 50, $("#boardView").width()-310, $("#boardView").height()-169],
      scroll: true,
      start: function() {
        $(this).draggable( "option", "zIndex", 1+counter);
      }
    }).resizable({
      
    });
$("#"+objName+" form").submit(function(event) {
	 $("#"+objName+" form").innerHTML = "Loading...";
	  $('#addIframe').load(function(){
  $("#"+objName+" form").remove();
	   $("#"+objName).append(window.frames['addIframe'].document.body.innerHTML);
});
    });
	$("#saveButton").css({
	"display" : "block",
	});
	$("#saveButton2").css({
	"display" : "block",
	});

    /*$("#"+objName+" input[type=submit]").click(function() {
      savePicture($("#"+objName).attr('id'));
    });*/
  },
  revert: false
});

$( "#dropDiv" ).droppable({
  drop: function( event, ui ) {
    
  }
});

	var pizzaToppings = 0;
	
	///////////////////////////////////////////////////////////////////////////////////////////
	
	var editVsSave = 0;
	$(document).on('resize', function(){
		rescaleDragDivThingyNavigator();
	
	});
  
function addBoard(){
$.ajax({
		  type: "POST",
		  url: "addFile.php",
		  data: { userID: <?php echo $loggedInID; ?> }
		})
		  .done(function( msg ) {
		loadBoard(msg);
		returnSettings(1);
	});
}
var tabs = 0;
$("#addSpace").click(function (){
 $("#massiveConfusion").css("height", "+=500px");
  $("#massiveConfusion").css("width", "+=500px");
// $("#drawCanvas").attr("height", parseInt($("#drawCanvas").attr("height"))+500);
// $("#drawCanvas").attr("width", parseInt($("#drawCanvas").attr("width"))+500);
tabs++;
// getCanvas(currentBoard);
		rescaleDragDivThingyNavigator();
});

function getCanvas(boardID){
	 $.ajax({
		  type: "POST",
		  url: "getCanvas.php",
		  data: { boardID: boardID, userID: <?php echo $loggedInID; ?> }
		}).done(function( msg2 ) {
				document.getElementById("scream").src='0';
			clearArea();
		  	//alert(msg2);
		  	document.getElementById("scream").src=msg2;
		  		document.getElementById("scream2").src=msg2;
		  	$("#scream").load(function(){
$("#drawCanvas").attr("height", parseInt($("#massiveConfusion").css("height")));
		  		$("#drawCanvas").attr("width", parseInt($("#massiveConfusion").css("width")));
var c=document.getElementById("drawCanvas");
var ctx=c.getContext("2d");
var img=document.getElementById("scream");
if(lesser){
ctx.drawImage(img,0,0,parseInt($("#massiveConfusion").css("width"))-(tabs*500), parseInt($("#massiveConfusion").css("height"))-(tabs*500));
}else{
ctx.drawImage(img,0,0,parseInt($("#massiveConfusion").css("width")), parseInt($("#massiveConfusion").css("height")));
}
rescaleDragDivThingyNavigator();
		  	});
		  		
		  });
}

	/*$("#refreshButton").click(function (){
		loadBoard(currentBoard);
    });*/

	$("#saveButton").click(function (){
		var nameID = $("#dropDiv").children().first().attr("id");
		if($("#"+nameID+" input").attr("id") == "iframeText"){
makeIframe();
}
if($("#"+nameID+" input").attr("id") == "videoText"){
makeVideo();
}
			saveAllOnBoard();
			$("#drawCanvas").css({
			"z-index" : "2",
			});
	$("#saveButton").css({
	"display" : "none",
	});
	$("#saveButton2").css({
	"display" : "none",
	});
	$("#saveButtonEdit").css({
	"display" : "none",
	});
	$("#saveButton3").css({
	"display" : "none",
	});
    });

    	$("#saveButton2").click(function (){
dropDivVar.innerHTML = '';
$("#drawCanvas").css({
			"z-index" : "2",
			});
$("#addPost").css({
  "display" : "block",
  });
$("#saveButton").css({
	"display" : "none",
	});
	$("#saveButton2").css({
	"display" : "none",
	});
	$("#saveButtonEdit").css({
	"display" : "none",
	});
	$("#saveButton3").css({
	"display" : "none",
	});
	$("#saveButton4").css({
	"display" : "none",
	});
		$("#saveButton5").css({
	"display" : "none",
	});
		loadBoard(currentBoard);
    	});


  $("#saveButtonEdit").click(function (){
  	$("#editButton").css({
	"display" : "block",
	});
	$("#drawCanvas").css({
			"z-index" : "2",
			});
  	var jason = [];
  	$("#massiveConfusion").children('.post').each(function(index, el) {
  		var left = parseInt($(this).css('left'));
  		var top = parseInt($(this).css('top'));

  		var content = $(this).attr('id');
  		jason.push({left:left, top:top, content:content});
  	});

  	$.ajax({
  		url: 'updatePost.php',
  		type: 'POST',
  		data: {jason: jason, boardID: currentBoard}
  	})
  	.done(function(data) {
  		$("#massiveConfusion").children('.post').each(function(index, el) {
  			
  			$(this).removeClass().addClass('post');
  			

  			$(this).children(':not(img):not(iframe):not(.textStuff)').remove();
  		});

  		saveBoard(currentBoard);
  		loadBoard(currentBoard);
  		//alert("Updated");
  	});
  	 $.ajax({
		  type: "POST",
		  url: "removePost.php",
		  data: { boardID: currentBoard, string: stringCheese }
		})
		  .done(function(msg) {
		  	//alert(msg);
		});

		$("#saveButtonEdit").css({
		"display" : "none",
		});
		$("#saveButton").css({
		"display" : "none",
		});
		$("#saveButton2").css({
	"display" : "none",
	});
		$("#saveButton3").css({
	"display" : "none",
	});
  });  


$("#saveButton3").click(function() {
	loadBoard(currentBoard);
	$("#drawCanvas").css({
			"z-index" : "2",
			});
	$("#saveButtonEdit").css({
		"display" : "none",
		});
		$("#saveButton").css({
		"display" : "none",
		});
		$("#saveButton2").css({
	"display" : "none",
	});
		$("#saveButton3").css({
	"display" : "none",
	});
		$("#saveButton4").css({
	"display" : "none",
	});
		$("#saveButton5").css({
	"display" : "none",
	});
$("#editButton").css({
	"display" : "block",
	});
$("#drawButton").css({
	"display" : "block",
	});
});


	$("#editButton").click(function (){
	$("#addPost").css({
  "display" : "none",
  });
		$("#drawCanvas").css({
			"z-index" : "0",
			});
			$("#saveButtonEdit").css({
			"display" : "block",
			});
			$("#saveButton3").css({
	"display" : "block",
	});
			$("#saveButton").css({
			"display" : "none",
			});
			$("#saveButton2").css({
	"display" : "none",
	});
			$("#saveButton4").css({
	"display" : "none",
	});
		$("#saveButton5").css({
	"display" : "none",
	});
				$("#editButton").css({
	"display" : "none",
	});
				$("#drawButton").css({
	"display" : "none",
	});
		editDraggable();
		if(editVsSave == 0){
		//dropDivVar.innerHTML = boardDiv.innerHTML;
		//boardDiv.innerHTML = '';
		}else{
		
		}
    });
	/*$("#editButton").click(function (){
	$("#boardView").addClass("...");
    });*/
	
	
	function saveAllOnBoard() {
		yeay = false;
		var newPostID;
    pizzaToppings = 1;
loadBoard(currentBoard).then(function () {
		var stuffer = $("#dropDiv").children().first();
		var stufferP = stuffer.position();
		newPostID = stuffer.attr('id');
	$.ajax({
		  type: "POST",
		  url: "newPost.php",
		  data: { boardID: currentBoard, loggedInUserID: <?php echo $loggedInID; ?>, divID: stuffer.attr("id"), left: stufferP.left, top: stufferP.top }
		})
		  .done(function( msg ) {
		//alert(msg);

		$(dropDivVar).children().each(function( index ) {
			var topa = $(this).css("top").substring(0, $(this).css("top").length-2);
			topa = $("#boardView").scrollTop()+parseInt(topa);
			$(this).css("top", topa+"px");
			
			var lefta = $(this).css("left").substring(0, $(this).css("left").length-2);
			lefta = $("#boardView").scrollLeft()+parseInt(lefta);
			$(this).css("left", lefta+"px");

			$(this).removeClass().addClass('post');

			
		});
		var val = $(dropDivVar).find('textarea').val();
		$("#massiveConfusion").append(dropDivVar.innerHTML);
		dropDivVar.innerHTML = '';
		if ($("#"+newPostID).children('textarea').length > 0) {
			sendText(newPostID, val);
		}
		else {
			$("#"+newPostID).children(':not(img):not(iframe):not(.textStuff)').remove();
			saveBoard(currentBoard);
			loadBoard(currentBoard);
		}
		/* html2canvas($("#boardView"), {
            onrendered: function(canvas) {
                theCanvas = canvas;
                document.body.appendChild(canvas);

                canvas.toBlob(function(blob) {
                    saveAs(blob, "Dashboard.png"); 
                });
            }
        });*/
		rescaleDragDivThingyNavigator();
		yeay = true;
		  });
});

	}

	function changeBoardSetting(selectID, type, boardID){
		$.ajax({
		  type: "POST",
		  url: "changeBoardSetting.php",
		  data: { boardID: boardID, type: type, setting: $('#' + selectID).find(":selected").text() }
		});
		setTimeout(function(){
		if(type == 4){
			returnSettings(0);
			grabMeBoard(<?php echo $row156['meBoardID']; ?>, 0);
			loadBoard(<?php echo $row156['meBoardID']; ?>);
		}
	}, 100);
	}

$('.post').click(function(){
alert("hi");
});

	function changeBoardName(boardID, selectID, type){
		setTimeout(function(){
			$.ajax({
		  type: "POST",
		  url: "changeBoardSetting.php",
		  data: { boardID: boardID, type: type, setting: document.getElementById(selectID).value }
		});
		}, 100);
	}
	
	function changePersonSetting(selectID, type, userID){
		$.ajax({
		  type: "POST",
		  url: "changePerson.php",
		  data: { userID: userID, type: type, setting: document.getElementById(selectID).value.replace(/.*?:\/\//g, "") }
		});
		loadBoard(currentBoard);
		grabMeBoard(0, 1);
		setTimeout(function(){
		grabMeBoard(currentBoard, 1);
	}, 250);
	}
	
function changePasswordSetting(type, userID){
		$.ajax({
		  type: "POST",
		  url: "changePerson.php",
		  data: { userID: userID, type: type, setting: document.getElementById("newPasswordSetting").value, oldSetting: document.getElementById("oldPasswordSetting").value }
		});
		document.getElementById("newPasswordSetting").value = "";
		document.getElementById("oldPasswordSetting").value = "";
	}

	var $img;
	$(document).on('submit', '#profilePictureForm form', function(event) {
		 $('#addIframe').load(function(){
	  	//alert(window.frames['addIframe'].document.body.innerHTML);
 			$("#profilePicture").html(window.frames['addIframe'].document.body.innerHTML);

			$img = $("#profilePicture img");
			$img.cropper({
			    aspectRatio: 1
			});

			$("#profilePictureForm form").replaceWith("<button id='saveProfilePic'>Save</button>");
			$("#saveProfilePic").click(function(event) {
				var data = $img.cropper("getData");
				$.ajax({
					url: 'cropImage.php',
					type: 'POST',
					data: {x: data.x, y: data.y, width: data.width, height: data.height, image: $img.attr('src'), userID: <?php echo $loggedInID; ?>}
				})
				.done(function(data) {
					returnSettings();
				});
			});
		});
	});

  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var boardAllowed = 0;
	function loadBoard(boardID) {
		tabs = 0;
		if(yeay){
			dropDivVar.innerHTML = '';
$("#saveButtonEdit").css({
		"display" : "none",
		});
$("#saveButton3").css({
	"display" : "none",
	});
		$("#saveButton").css({
		"display" : "none",
		});
		$("#saveButton2").css({
	"display" : "none",
	});
		
	}
	currentBoard = boardID;
	window.location = '#' + boardID;
	getPosts();
		  var typeer = 1;
		 if(pizzaToppings == 0){
      	$.ajax({
		  type: "POST",
		  url: "getSize.php",
		  data: { boardID: boardID, type: typeer }
		})
		  .done(function( msg ) {
			  $("#massiveConfusion").css("height", msg+"px");
			  $("#scream2").css("height", Math.floor(($("#boardView").get(0).scrollHeight+(1500-msg))/scale)+"px");
		  });	
		  typeer = 2;
		  $.ajax({
		  type: "POST",
		  url: "getSize.php",
		  data: { boardID: boardID, type: typeer }
		})
		  .done(function( msg ) {
			  $("#massiveConfusion").css("width", msg+"px");
			  $("#scream2").css("width", Math.floor(($("#boardView").get(0).scrollWidth+(1500-msg))/scale)+"px");
		  });	
    }else{
      pizzaToppings = 0;
    }

	$.ajax({
		  type: "POST",
		  url: "getUsernameShow.php",
		  data: { boardID: boardID }
		})
		  .done(function( msg ) {
			$("#showBoards").html(msg);
		  });
		  $.ajax({
		  type: "POST",
		  url: "getBoardNameShow.php",
		  data: { boardID: boardID }
		})
		  .done(function( msg ) {
			$("#boardNameShow").html(msg);
		  });
		   $.ajax({
		  type: "POST",
		  url: "addAllowed.php",
		  data: { boardID: boardID, userID: <?php echo $loggedInID; ?> }
		})
		  .done(function( msg ) {
		  	if(msg == "no"){
		  	$("#addSpace").css("display", "none");
			$("#addPost").css({
  "display" : "none",
  });
			$("#drawButton").css({
	"display" : "none",
	});
		}else{
			$("#addSpace").css("display", "block");
		$("#addPost").css({
  "display" : "block",
  });
			$("#drawButton").css({
	"display" : "block",
	});
		}
		  });
		    $.ajax({
		  type: "POST",
		  url: "editAllowed.php",
		  data: { boardID: boardID, userID: <?php echo $loggedInID; ?> }
		})
		  .done(function( msg ) {
		  	if(msg == "no"){
			$("#editButton").css("display", "none");
			$("#view").removeClass('addSpace');
		}else{
			$("#editButton").css("display", "block");
			$("#view").addClass('addSpace');
		}
		  });


		  grabMeBoard(boardID, 0);
		  followStuff('none');
		var timest = 0;
		return $.ajax({
		  type: "POST",
		  url: "loadBoard.php",
		  data: { boardID: boardID, userID: <?php echo $loggedInID; ?>, timest: timest }
		})
		  .done(function( msg ) {
          $("#massiveConfusion").html("");
		  if(msg == "no"){
		  alert("SORRY, this user does not want you seeing this storyboard board... :(");
		  boardAllowed = 0;
      rescaleDragDivThingyNavigator();
		  }else{
			$("#massiveConfusion").append(msg);
// 			$("#drawCanvas").css( "height", $("#boardView").get(0).scrollHeight+"px" );
// alert(document.getElementById("massiveConfusion").scrollHeight);

			//setTimeout(function(){
				lesser = false;
			getCanvas(boardID);
			//}, 200);
			boardAllowed = 1;
			rescaleDragDivThingyNavigator();
			returnSettings(0);
			}
      getCanvas(boardID);
		  });
	}

  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$(".post").click(function() {
alert("hi");
});

$("#followButton").click(function(){
	if($(this).children().first().attr("id") == "favorite"){
followStuff('yes');
}else{
followStuff('no');
}
});

	function followStuff(followOrNo){
 $.ajax({
		  type: "POST",
		  url: "followButton.php",
		  data: { boardID: currentBoard, loggedInUserID: <?php echo $loggedInID; ?>, follow: followOrNo }
		})
		  .done(function( msg ) {
			$("#followButton").html(msg);
			$("#followButton").append("<div style='margin-top:-8px;font-size:12px;font-family:Open Sans;color:rgb(125,58,0)'><b>Favorite</b></div>");
		  });
	}
	
	function rescaleDragDivThingyNavigator(){
	//	$("#navigator").html("<img id='canvasImg' style='position:absolute;top:0px;left:0px;width:100%;height:100%' /><div id='view' style='z-index:999999999'></div>");
    var size = $("#boardView").get(0).scrollHeight;
    
    if($("#boardView").get(0).scrollWidth > size){
      size=$("#boardView").get(0).scrollWidth;
    }
    scale=Math.ceil(size/200);

	 $("#navigator").css({
          "height" : Math.floor($("#boardView").get(0).scrollHeight/scale)+"px",
          "width" : Math.floor($("#boardView").get(0).scrollWidth/scale)+"px"
		//saveBoardGrab();
	   });
       
       setTimeout(function(){
$("#scream2").css("height", Math.floor(($("#boardView").get(0).scrollHeight-(500*tabs))/scale)+"px");
$("#scream2").css("width", Math.floor(($("#boardView").get(0).scrollWidth-(500*tabs))/scale)+"px");
}, 300);
    var view=$("#view");

    $("#navigator").children(':not(#view):not(#addSpace):not(#scream2)').remove();
    $("#navigator").append($("#massiveConfusion").html());

    $("#view").css({
      "height" : Math.floor($("#boardView").height()/scale)+"px",
      "width" : Math.floor($("#boardView").width()/scale)+"px"
    });

    $("#navigator").children(':not(#view):not(#addSpace)').each(function(index, el) {
      $(this).css({
      	"font-size" : "1px",
        "height" : Math.floor($(this).height()/scale)+"px",
        "width" : Math.floor($(this).width()/scale)+"px",
        "top" : Math.floor($(this).position().top/scale)+"px",
        "left" : Math.floor($(this).position().left/scale)+"px"
      }).removeClass('draggable').html($(this).html().replace("sorry",""));
//$(this).removeClass('ui-resizable-handle');
    });
        
    /*    while($("#navigator").height()>200||$("#navigator").width()>200) {
          scale*=1.25;
          $("#navigator").css({
            "height" : Math.floor($("#boardView").get(0).scrollHeight/scale)+"px",
            "width" : Math.floor($("#boardView").get(0).scrollWidth/scale)+"px"
          });

          $("#view").css({
            "height" : Math.floor($("#boardView").height()/scale)+"px",
            "width" : Math.floor($("#boardView").width()/scale)+"px"
          });
        }
		 //document.getElementById('boardView').style.overflow = 'visible';
		html2canvas(document.getElementById("massiveConfusion"), {
  onrendered: function(canvas) {
    document.getElementById("canvasGrab").appendChild(canvas);
	//document.getElementById('boardView').style.overflow = 'hidden';
	 var dataURLVar = document.getElementById('canvasGrab').getElementsByTagName("canvas");
	 var dataURL = dataURLVar[0].toDataURL();
	  document.getElementById('canvasImg').src = dataURL;
      document.getElementById("canvasGrab").innerHTML = "";
  }
});*/

	}
	
function moveAway(){
	$("#meBoard").css({
			  top:"-2000px"
			});
}

	// $(".xOut").click(function(){
	// 	$(this).parent().css({
	// 		  top:"-2000px"
	// 		});
	// });
	
	function saveBoard(boardID) {
	$.ajax({
		  type: "POST",
		  url: "boardURL.php",
		  data: { divContents:  document.getElementById('massiveConfusion').innerHTML, boardID: boardID, widtha: parseInt($("#massiveConfusion").css("width")), heighta: parseInt($("#massiveConfusion").css("height"))}
		})
		  .done(function( msg ) {
		  });
	}

var sameBoard = 0;

	function grabMeBoard(boardID, yay){
		$.ajax({
		  type: "POST",
		  url: "getBoardOwner.php",
		  data: { boardID: boardID, userID: <?php echo $loggedInID; ?> }
		})
		  .done(function( msg ) {
		  	if(sameBoard != boardID){
		  	$("#meBoard").html(msg);
		  	sameBoard = boardID;
		  	$("#boardsList").append("<div id='myFriends' onclick='getFriends(0)' class='hoverWhite' style='cursor:pointer;font-size:20px;height:20px;width:200px;position:absolute;top:320px;left:-20px'><i class='fa fa-group'></i> <b>Buddys</b></div><div id='imFollowing' onclick='getFriends(1)' class='hoverWhite' style='cursor:pointer;font-size:20px;position:absolute;top:320px;left:145px;height:20px;width:150px'><span class='fontawesome-star'></span><b>Favorites</b></div>");
		
		  }
		  });
		  if	($( "#meBoard" ).css("top")=='54px') {
			
		}
		else {
			if(yay == 1){
			$( "#meBoard" ).animate({
			  top:"54px"
			}, 900);
		}
		}
	}

var boardThing = 0;

	function getFriends(yay){
		if(meButton){
boardThing = <?php echo $row156['meBoardID']; ?>;
		}else{
boardThing = currentBoard;
		}
		 $.ajax({
		  type: "POST",
		  url: "getFriends.php",
		  data: { boardID: boardThing, yay: yay }
		})
		  .done(function( msg ) {
		 $("#friendsBoard").html(msg);
		// alert(msg);
    if	($( "#friendsBoard" ).css("top")=='54px') {
			
		}
		else {
			$( "#friendsBoard" ).animate({
			  top:"54px"
			}, 900);
		}
		});
	}
	var meButton = false;
	$("#goToMe").click(function(){
		meButton = true;
		grabMeBoard(<?php echo $row156['meBoardID']; ?>, 1);
		setTimeout(function(){
		$("#boardsList").append("<a href='logOut.php'><div id='logOutButton' class='hoverWhite' style='cursor:pointer;font-size:20px;height:20px;width:200px;position:absolute;top:290px;left:-20px'><i class='fa fa-power-off'></i> <b>Sign Out</b></div></a><div id='settingsButton' class='hoverWhite' onclick='settingsClicked()' style='cursor:pointer;font-size:20px;position:absolute;top:290px;left:145px;height:20px;width:150px'><span class='fontawesome-cog'></span><b> Settings</b></div>");
		}, 700);
	});


		$("#showBoards").click(function(){
			meButton = false;
		grabMeBoard(currentBoard, 1);
	});	


function sendText(id, val) {
	$.ajax({
		  type: "POST",
		  url: "getText.php",
		  data: { content: val, id: id, boardID: currentBoard, userID: <?php echo $loggedInID; ?> }
		})
		  .done(function( msg ) {
		  //	alert(msg);
		  	$("#"+id).html(msg);
		  	saveBoard(currentBoard);
		  	loadBoard(currentBoard);
		  });
		   }


function searchChange(){
$.ajax({
		  type: "POST",
		  url: "suggestions.php",
		  data: { search: document.getElementById("searchBar").value }
		}).done(function( msg ) {
			document.getElementById("suggestions").innerHTML = msg;
		  });
}

$('#searchBar').keydown(function (event) {
   var keypressed = event.keyCode || event.which;
    if (keypressed == 13) {
	startSearchPeople();
	document.getElementById("searchBar").blur();
	saveSearch();
	}
});

$("#searchButtonIcon").click(function(){
startSearchPeople();
document.getElementById("searchBar").blur();
saveSearch();
});

function suggClick(msgs){
 $("#searchBar").val(msgs);
 startSearchPeople();
	saveSearch();
}

function hashtag(stuff){
		document.getElementById("searchBar").value = stuff;
	startSearchPeople();
	document.getElementById("searchBar").blur();
saveSearch();
}

function saveSearch() {
  $.ajax({
		  type: "POST",
		  url: "addSearched.php",
		  data: { search: document.getElementById("searchBar").value }
		})
		  .done(function( msg ) {
			searchedDone(msg);
		  });
			$( "#searchResults" ).animate({
			  top:"54px"
			}, 1000);
		$.ajax({
		  type: "POST",
		  url: "returnSearch.php",
		  data: { userID: <?php echo $loggedInID; ?>, search: document.getElementById("searchBar").value }
		})
		  .done(function( msg ) {
			searchedDone(msg);
		  });
}
    
	
	/*$(".loadBoard").click(function(e){
		loadBoard($(this).attr("href"));
		e.preventDefault();
	});

    function savePicture(postID) {
      alert($('#'+postID+' form input[name=file]').val());
	  e.preventDefault();
var formData = new FormData($(this)[0]);  
alert(formData);   
	 $.post('uploadImage.php',
       formData) 
      .done(function(data) {
        $("#"+postID).html(data);
      });
      
    }*/

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////PIZZA

	var mousePressed = false;
	var mousePressed2 = false;
var lastX, lastY;
var ctx;
var boxerr = $('#boxerr').position();
var movable = true;
var drawTime = false;
var lesser = false;

$("#drawButton").click(function() {
drawTime = true;

$("#drawCanvas").attr("height", parseInt($("#massiveConfusion").css("height")));
		  		$("#drawCanvas").attr("width", parseInt($("#massiveConfusion").css("width")));
		  		lesser = true;
		  		getCanvas(currentBoard);
$("#drawCanvas").css({
	"z-index" : "2",
	});
$("#saveButtonEdit").css({
		"display" : "none",
		});
$("#addPost").css({
  "display" : "none",
  });
		$("#saveButton").css({
		"display" : "none",
		});
		$("#saveButton2").css({
	"display" : "none",
	});
		$("#saveButton3").css({
	"display" : "none",
	});
			$("#saveButton4").css({
	"display" : "block",
	});
		$("#saveButton5").css({
	"display" : "block",
	});
		$("#drawSpecs").css({
	"display" : "block",
	});
$("#editButton").css({
	"display" : "none",
	});
$("#drawButton").css({
	"display" : "none",
	});
});


$("#addPost").click(function() {
          lesser = true;
          getCanvas(currentBoard);
$("#saveButtonEdit").css({
    "display" : "none",
    });
    $("#saveButton").css({
    "display" : "none",
    });
    $("#saveButton2").css({
  "display" : "none",
  });
    $("#saveButton3").css({
  "display" : "none",
  });
      $("#saveButton4").css({
  "display" : "none",
  });
    $("#saveButton5").css({
  "display" : "none",
  });
    $("#drawSpecs").css({
  "display" : "none",
  });
$( "#dragDrop" ).animate({
    top: "47px"
  }, 800);
});


$("#saveButton4").click(function() {
    $("#saveButton4").css({
  "display" : "none",
  });
    $("#saveButton5").css({
  "display" : "none",
  });
    $("#drawSpecs").css({
  "display" : "none",
  });
$("#editButton").css({
  "display" : "block",
  });
$("#drawButton").css({
  "display" : "block",
  });
$("#addPost").css({
  "display" : "block",
  });
	alert("Saving...");
	drawTime = false;
var c=document.getElementById("drawCanvas");
var d=c.toDataURL("image/jpg");
saveBoard(currentBoard);//var w=window.open('about:blank','image from canvas');
//w.document.write("<img src='"+d+"' alt='from canvas'/>");
$.ajax({
    url: "save.php",
    type: "POST",
    data: { picture: d, boardID: currentBoard, userID: <?php echo $loggedInID; ?> },
}).done(function(data) {
    alert("Saved");
// $("#drawCanvas").css({
// 	"z-index" : "0",
// 	});
setTimeout(function(){
	loadBoard(currentBoard);
}, 300);

});
});

$("#saveButton5").click(function() {
	drawTime = false;
	clearArea();
loadBoard(currentBoard);
			$("#saveButton4").css({
	"display" : "none",
	});
		$("#saveButton5").css({
	"display" : "none",
	});
		$("#drawSpecs").css({
	"display" : "none",
	});
	// 	$("#drawCanvas").css({
	// "z-index" : "0",
	// });
		$("#addPost").css({
	"display" : "block",
	});
});

function clearArea() {
    // Use the identity matrix while clearing the canvas  
   ctx.setTransform(1, 0, 0, 1, 0, 0);
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
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

function InitThis() {
    ctx = document.getElementById('drawCanvas').getContext("2d");

    $('#drawCanvas').mousedown(function (e) {
        mousePressed = true;
		if(movable && drawTime){
        Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);
    }});

    $('#drawCanvas').mousemove(function (e) {
        if (mousePressed && movable && drawTime) {
            Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, true);
        }
    });

    $('body').mouseup(function (e) {
        mousePressed = false;
    });
}





    </script>
	<?php
	mysqli_close($con);
	?>


  </body>
</html>