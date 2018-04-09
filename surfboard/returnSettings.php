<?php

  include 'zzzzz.php';
$array = array("Friends", "Everyone", "Just Me");
	$result = mysqli_query($con,"SELECT * FROM boards WHERE userID=" . $_POST['userID'] . "");
	$result44 = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $_POST['userID'] . "");
	$row44 = mysqli_fetch_array($result44);
		 	echo "<div style='margin-left:55px'></br>Who Can.....?</div><div style='max-height:275px;width:100%;overflow-x:hidden;overflow-y:auto;border-style:solid;border-width:0px;border-bottom-width:2px;border-color:black'><div style='float:left;width:32%;overflow-x:hidden;padding:0px 0px 7px 0px;text-align:center;font-size:19px'><span style='font-size:22px;border-style:solid;border-width:0px;border-bottom-width:2px;border-color:black;padding:0px 0px 2px 0px'>My Storyboards</span></br>";
		 	while($row = mysqli_fetch_array($result)){
		 		echo "<div style='margin-top:10px;cursor:pointer' class='hoverColorWhite'><span onclick='loadBoard(" . $row['boardID'] . ")'>" . $row['boardName'] . "</span>"; 
		 		if($row['boardID'] != $row44['meBoardID']){
		 		echo " <span style='background-color:red;padding:0px 3px' onclick='changeBoardSetting(\"delete" . $row['boardID'] . "\", 4, " . $row['boardID'] . ")'>Delete</span>";
		 		}
		 		echo "</div>";
		 	}
		 	echo "</div>";

		echo "<div style='float:left;width:15%;text-align:center;padding:0px 0px 7px 0px;font-size:19px'><span style='font-size:22px;border-style:solid;border-width:0px;border-bottom-width:2px;border-color:black;padding:0px 0px 2px 0px'>Edit</span></br>";
		 	$result = mysqli_query($con,"SELECT * FROM boards WHERE userID=" . $_POST['userID'] . "");
		 	while($row = mysqli_fetch_array($result)){
		 		echo "<select id='editSetting" . $row['boardID'] . "' style='margin-top:11px' onchange='changeBoardSetting(\"editSetting" . $row['boardID'] . "\", 0, " . $row['boardID'] . ")'>";
		 		for($counter = 0; $counter < 3; $counter++){
		 			if($row['edit'] == $counter){
					echo "<option selected='selected'>" . $array[$counter] . "</option>";
		 			}else{
		 			echo "<option>" . $array[$counter] . "</option>";
		 		}
		 		}
echo "</select></br>";
		 	}
		 	echo "</div>";

		 	echo "<div style='float:left;width:15%;text-align:center;padding:0px 0px 7px 0px;font-size:19px'><span style='font-size:22px;border-style:solid;border-width:0px;border-bottom-width:2px;border-color:black;padding:0px 0px 2px 0px'>See</span></br>";
		 	$result = mysqli_query($con,"SELECT * FROM boards WHERE userID=" . $_POST['userID'] . "");
		 	while($row = mysqli_fetch_array($result)){
		 		echo "<select id='seeSetting" . $row['boardID'] . "' style='margin-top:11px' onchange='changeBoardSetting(\"seeSetting" . $row['boardID'] . "\", 1, " . $row['boardID'] . ")'>";
		 		for($counter = 0; $counter < 3; $counter++){
		 			if($row['see'] == $counter){
					echo "<option selected='selected'>" . $array[$counter] . "</option>";
		 			}else{
		 			echo "<option>" . $array[$counter] . "</option>";
		 		}
		 		}
echo "</select></br>";
		 	}
		 	echo "</div>";

		 	echo "<div style='float:left;width:15%;padding:0px 0px 7px 0px;text-align:center;font-size:19px'><span style='font-size:22px;border-style:solid;border-width:0px;border-bottom-width:2px;border-color:black;padding:0px 0px 2px 0px'>Favorite</span></br>";
		 	$result = mysqli_query($con,"SELECT * FROM boards WHERE userID=" . $_POST['userID'] . "");
		 	while($row = mysqli_fetch_array($result)){
		 		echo "<select id='favoriteSetting" . $row['boardID'] . "' style='margin-top:11px' onchange='changeBoardSetting(\"favoriteSetting" . $row['boardID'] . "\", 2, " . $row['boardID'] . ")'>";
		 		for($counter = 0; $counter < 3; $counter++){
		 			if($row['favorite'] == $counter){
					echo "<option selected='selected'>" . $array[$counter] . "</option>";
		 			}else{
		 			echo "<option>" . $array[$counter] . "</option>";
		 		}
		 		}
echo "</select></br>";
		 	}
		 	echo "</div>";

echo "<div style='float:left;width:23%;padding:0px 0px 7px 0px;text-align:center;font-size:19px'><span style='font-size:22px;border-style:solid;border-width:0px;border-bottom-width:2px;border-color:black;padding:0px 0px 2px 0px'>Rename</span></br>";
		 	$result = mysqli_query($con,"SELECT * FROM boards WHERE userID=" . $_POST['userID'] . "");
		 	while($row = mysqli_fetch_array($result)){
		 		echo "<div style='margin-top:7px'>";
		 		if($row['boardID'] != $row44['meBoardID']){
					echo "<input type='text' maxlength='25' placeholder='" . $row['boardName'] . "' id='changeName" . $row['boardID'] . "' onchange='loadBoard(" . $row['boardID'] . ")' onkeypress='changeBoardName(" . $row['boardID'] . ", \"changeName" . $row['boardID'] . "\", 3)'></input>";
}else{
						echo "<input type='text' maxlength='25' placeholder='" . $row['boardName'] . "' id='changeName" . $row['boardID'] . "' onchange='loadBoard(" . $row['boardID'] . ")' onkeypress='changeBoardName(" . $row['boardID'] . ", \"changeName" . $row['boardID'] . "\", 3)' disabled></input>";
}
echo "</div>";
		 	}
		 	echo "</div>";

$result = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $_POST['userID'] . "");
$row = mysqli_fetch_array($result);
		 	echo "</div></br><div style='padding:0px 0px 0px 10px;height:225px;width:55%;text-align:left'>Just Type to edit:</br>
		 	Name: <input type='text' value='" . $row['realName'] . "' id='realNameSetting' onchange='changePersonSetting(\"realNameSetting\", \"realName\", " . $row['userID'] . ")'></br>
		 <!--	Username: <input type='text' value='" . $row['username'] . "' id='usernameSetting' onchange='changePersonSetting(\"usernameSetting\", \"username\", " . $row['userID'] . ")'></br>-->
		 	E-mail: <input type='text' value='" . $row['email'] . "' id='emailSetting' onchange='changePersonSetting(\"emailSetting\", \"email\", " . $row['userID'] . ")'></br>
			Birthday: <input type='date' value='" . $row['birthday'] . "' id='birthdaySetting' onchange='changePersonSetting(\"birthdaySetting\", \"birthday\", " . $row['userID'] . ")'></br>
			Favorite Song: <input type='text' value='" . $row['favoriteSong'] . "' id='songSetting' onchange='changePersonSetting(\"songSetting\", \"favoriteSong\", " . $row['userID'] . ")'></br>
			Old Password: <input type='password' value='' id='oldPasswordSetting'></br>
				New Password: <input type='password' value='' id='newPasswordSetting'><button onclick='changePasswordSetting(\"password\", " . $row['userID'] . ")'>Save Password</button>
		 </div>";
		 echo "</br><div id='profilePictureForm' style='width:44%;float:right;margin-right:1%;margin-top:-223px;color:rgb(125,58,0);text-align:center;font:bold;font-size:25px'><div id='profilePicture' style='position:relative;float:left;margin-left:7px;margin-top:7px;width:100px;height:100px;'><img style='height:100%;width:100%;' src='userInfo/" . $row['username'] . "/pics/" . $row['profPicLoc'] . "'></div><form action='uploadImage.php' method='post' target='addIframe' enctype='multipart/form-data'></br>Choose a picture:</br><input type='file' value='Choose Picture' name='file' accept='image/*'></input></br><input type='submit' name='submit'></input></form>";
echo "</div>";
//password <form action='uploadImage.php' method='post' target='addIframe' enctype='multipart/form-data'></br></br>Choose a picture:</br><input type='file' value='Choose Picture' name='file' accept='image/*'></input></br><input type='submit' name='submit'></input></form>
//Old Password: <input type='text' id='realNameSetting' onchange='changePersonSetting(\"realNameSetting\", " . $row['userID'] . ")'></br>
		 	//New Password: <input type='text' value='" . $row['realName'] . "' id='realNameSetting' onchange='changePersonSetting(\"realNameSetting\", " . $row['userID'] . ")'></br>
		 	
?>