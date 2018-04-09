<?php
  include 'zzzzz.php';
 $allow = 1;
if($_POST['type'] == "username"){
 $result = mysqli_query($con, "SELECT * FROM users WHERE userID=" . $_POST['userID'] . "");
$row = mysqli_fetch_array($result);
rename("userInfo/" . $row['username'] . "", "userInfo/" . $_POST['setting'] . "");
}
if($_POST['type'] == "password"){
 $result = mysqli_query($con, "SELECT count(*) AS count FROM users WHERE userID=" . $_POST['userID'] . " AND password=PASSWORD('" . $_POST['oldSetting'] . "')");
$row = mysqli_fetch_array($result);
if($row['count'] != 1){
	$allow = 0;
}
}
if($allow == 1){
		$setting = $_POST['setting'];

	if ($_POST['type'] == 'favoriteSong') {
		$setting = "http://youtube.com/embed/".substr($setting, strrpos($setting,"=")+1) . "?autoplay=1";
	}

	if ($_POST['type'] == 'password') {
		mysqli_query($con,"UPDATE users SET " . $_POST['type'] . "=PASSWORD('" . $setting . "') WHERE userID=" . $_POST['userID'] . "");
	}else{
mysqli_query($con,"UPDATE users SET " . $_POST['type'] . "='" . $setting . "' WHERE userID=" . $_POST['userID'] . "");
}
}
			 	?>