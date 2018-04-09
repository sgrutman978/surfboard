 <?php
$url = 'mainpage.php';
	if(isset($_COOKIE['diresu']) && isset($_COOKIE['nekot']) && $_COOKIE['diresu'] != 0){
		$result = mysqli_query($con,"SELECT * FROM users WHERE userID = " . $_COOKIE["diresu"] . "");
		while($row = mysqli_fetch_array($result)){
			if($row['userID'] == $_COOKIE['diresu'] && $row['token'] == $_COOKIE['nekot']){
				echo "<script type='text/javascript'>window.location.href = 'mainpage.php';</script>";
			}
		}
	}
 ?>
  <link rel="shortcut icon" href="sWaves.png" />
 <title>
 Surfboard
 </title>
 <body style="overflow:hidden">
 		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54080156-1', 'auto');
  ga('send', 'pageview');

</script>
 <link href='http://fonts.googleapis.com/css?family=Coming+Soon|Permanent+Marker|Luckiest+Guy|Righteous|Rock+Salt|Yellowtail|Bangers|Oleo+Script|Architects+Daughter|Courgette|Boogaloo|Merienda+One|Sansita+One|Lobster|Indie+Flower|Pacifico|Audiowide|Poiret+One|Gloria+Hallelujah|Crafty+Girls|Special+Elite|Bubblegum+Sans|Changa+One|Chewy|Lemon' rel='stylesheet' type='text/css'>
<img src="" id="back2" style="position:absolute;left:0px;top:0px;width:100%;min-height:100%" />
 <img src="" id="back" style="position:absolute;left:0px;top:0px;width:100%;min-height:100%" />
 <div style="width:100%;height:80%;position:absolute;left:0px;top:8%;font-size:20px;text-align:center">
 <span style="color:white;background:rgb(69,115,175);font-family:Sansita One;font-size:100px;padding:5px 20px;border-radius:10px"><img style="height:127px;top:-5px;position:absolute" src="sWaves.png" /><span style="margin-left:130px;margin-right:-20px;border-radius:10px;background:rgb(250,190,109);padding:5px 20px;color:rgb(125,58,0)"><span style="color:rgb(69,115,175)">urf</span> board</span></span></br>
<div style="background:rgb(250,190,109);color:rgb(125,58,0);padding:30px;text-align:center;position:absolute;bottom:0px;left:18%;border-radius:10px"><span style="font-size:28px">Login </span><form action="check.php" method="post">
</br>Username: @<input type="text" name="username"></input></br>
Password: <input type="password" name="password"></input></br>
Stay Logged In: <input type="checkbox" name="check1"></input>
<input type="submit"></input>
</form>
</div>
<div style="background:rgb(250,190,109);color:rgb(125,58,0);padding:30px;position:absolute;bottom:-25px;right:18%;text-align:center;border-radius:10px"><span style="font-size:28px">Register </span><form action="newPerson.php" method="post">
</br>Name: <input type="text" name="realName"></input></br>
Username: @<input type="text" name="username2" maxlength="18"></input></br>
Password: <input type="password" name="password2"></input></br>
Email: <input type="text" name="email"></input></br>
Birthday: <input type="date" name="bday"></input></br>
<input type="submit"></input>
</form>
</div>
</div>
<style>
#aboutUsBoard{
	height:300px;
	width:400px;
	background-color:rgb(250,190,109);
	color:rgb(69,115,175);
	display:none;
	position: absolute;
	bottom:30px;
	right:30px;
	padding:7px;
	border-style:solid;
	border-color:rgb(125,58,0);
	border-width:2px;
	border-radius:5px;
}
#aboutUs{
	position:absolute;
	bottom:0px;
	right:0px;
	padding:3px;
	background-color: rgb(250,190,109);
	color:rgb(69,115,175);
	cursor:pointer;
}
</style>
<div id="aboutUsBoard">
	<span style='font-size:20px'>About Us</span></br> 
Company Email: surfboardcool@gmail.com</br></br>
President, CEO and Co-founder Steven Grutman</br>
Email: sgrutman978@gmail.com</br>
Username: @sgrutman978</br></br>
Co-founder and Vice President of Programming Avi Goldman</br>
Email: avigoldmankid@gmail.com</br>
Username: @monkeyboy324</br></br>
Co-founder and Vice President of Creativity Evan Quartner (Smiley)</br>
Email: evanquartner@verizon.net</br>
Username: @smiley1121
</div>
<div id="aboutUs" onclick="aboutUs()">About Us</div>
</body>
<?php

if(isset($_GET['nope'])){
	if($_GET['nope'] == 1){
		$message = "Sorry, you cannot use that Username and/or Email :(";
	}
	if($_GET['nope'] == 2){
		$message = "Your new account has been created!  Username: " . $_GET['newUsername'] . "";
	}
	if($_GET['nope'] == 3){
		$message = "Wrong Username or Password :(";
	}
	echo "<script type='text/javascript'>alert('$message');</script>";
}

?>

   <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
  
<script>
var counter = 1;
var hello = Math.floor((Math.random() * 16) + 1);

 $(document).click(function(){
    	if(!$(event.target).closest('#aboutUsBoard').length && !$(event.target).closest('#aboutUs').length){
$("#aboutUsBoard").css({
	"display" : "none",
	});
}
});

function aboutUs(){
$("#aboutUsBoard").css({
	"display" : "block",
	});
}

$(document).ready(function() {
document.getElementById("back").src = "surfPics/" + hello + ".jpg";
});

//  $(document).click(function(){
//     	if(!$(event.target).closest('#aboutUsBoard').length){
// $("#aboutUsBoard").css({
// 	"display" : "none",
// 	});
// }
// }

setInterval(function() {
hello = Math.floor((Math.random() * 16) + 1);
counter++;
if(counter%2 == 0){
document.getElementById("back2").src = "surfPics/" + hello + ".jpg";
setTimeout(function() {
  $( "#back" ).fadeOut(2000);
 $( "#back2" ).fadeIn(2000);
 }, 500);
}else{
document.getElementById("back").src = "surfPics/" + hello + ".jpg";
setTimeout(function() {
  $( "#back2" ).fadeOut(2000);
 $( "#back" ).fadeIn(2000);
 }, 500);
}
}, 8500);

</script>




<!--

 <link href='http://fonts.googleapis.com/css?family=Coming+Soon|Permanent+Marker|Luckiest+Guy|Righteous|Rock+Salt|Yellowtail|Bangers|Oleo+Script|Architects+Daughter|Courgette|Boogaloo|Merienda+One|Sansita+One|Lobster|Indie+Flower|Pacifico|Audiowide|Poiret+One|Gloria+Hallelujah|Crafty+Girls|Special+Elite|Bubblegum+Sans|Changa+One|Chewy|Lemon' rel='stylesheet' type='text/css'>
<img src="" id="back" style="position:absolute;left:0px;top:0px;width:100%;height:100%" />
 <div style="width:62%;height:80%;position:absolute;right:23%;top:6%;font-size:20px;text-align:center">
 <span style="color:white;background:rgb(69,115,175);font-family:Sansita One;font-size:100px;padding:5px 20px;border-radius:10px">Surf<img style="height:127px;top:-5px;margin-left:25px;position:absolute" src="waves2.png" /><span style="margin-left:93px;margin-right:-20px;border-radius:10px;background:rgb(250,190,109);padding:5px 20px;color:rgb(125,58,0)">board</span></span></br>
<div style="background:rgb(250,190,109);color:rgb(125,58,0);padding:30px;text-align:center;position:absolute;bottom:0px;left:0px;border-radius:10px"><span style="font-size:28px">Login </span><form action="check.php" method="post">
</br>Username:<input type="text" name="username"></input></br>
Password:<input type="password" name="password"></input></br>
<input type="submit"></input>
</form>
</div>
<div style="background:rgb(250,190,109);color:rgb(125,58,0);padding:30px;position:absolute;bottom:-25px;right:0px;text-align:center;border-radius:10px"><span style="font-size:28px">Register </span><form action="newUser.php" method="post">
</br>Name:<input type="text" name="name"></input></br>
Username:<input type="text" name="usergname"></input></br>
Password:<input type="password" name="passgword"></input></br>
Email:<input type="text" name="email"></input></br>
Birthday:<input type="date" name="bday">
<input type="submit"></input>
</form>
</div>
</div>

-->