<?php
	    include 'zzzzz.php';
	  $array = array('a', 'b', 'c','d', 'e', 'f','g', 'h', 'i','j', 'k', 'l','m', 'n', 'o','p', 'q', 'r','s', 't', 'u','v', 'w', 'x','y', 'z', 'A','B', 'C', 'D','E', 'F', 'G','H', 'I', 'J','K', 'L', 'M','N', 'O', 'P','Q', 'R', 'S','T', 'U', 'V','W', 'X', 'Y','Z', '1', '2','3', '4', '5','6', '7', '8', '9', '0');
	  //MID(text,1," . strlen($search) .") AS hellos          $row['hellos']
	  //$row['hellos']
	  $search = $_POST['search'];
	  echo "Search Results: " . $search;
	  if(substr($search, 0, 1) == '#'){
	  	$search = substr($_POST['search'], 1);
			  $result = mysqli_query($con,"SELECT * FROM hashtags");
			  $counter = 0;
			while($row = mysqli_fetch_array($result)){
			if(substr(strtolower($row['hashtag']),0,strlen(strtolower($search))) == strtolower($search)) {
				$result45 = mysqli_query($con, "SELECT * FROM posts WHERE postID=" . $row['postID'] . "");
				$row45 = mysqli_fetch_array($result45);
			 	echo "<div style='border-style:solid;border-color:black;border-width:0px;border-bottom-width:2px;width:94%;left:3%;height:20%;background:white;position:relative'><iframe frameborder='0' src='grabContent.php?postID=" . $row45['postID'] . "' scrolling='no' style='width:100%;height:100%'></iframe>
<div onclick='setUpPost(" . $row45['boardID'] . ", " . $row45['topper'] . ", " . $row45['lefter'] . ")' style='cursor:pointer;width:100%;height:100%;position:absolute;top:0px;left:0px'></div>
		<div class='postInfo'><span onclick='grabMeBoard(" . $row['meBoardID'] . ",1)' style='cursor:pointer;color:blue'>@" . $posterName . "</span> &#10168; <span onclick='grabMeBoard(" . $row5['meBoardID'] . ",1)' style='cursor:pointer;color:blue'>@" . $ownerName . "</span>'s \"" . $boardName . "\" Storyboard</div>
		</div>";
			$counter++;
			}
			if($counter > 25){
			$result=4;
			}
			}
			}else{
				//////////////////////////////////////////////////////////////////////////////////////////////////////
			 if(substr($search, 0, 1) == '@'){
			 	$search = substr($_POST['search'], 1);
			 }
			 $result = mysqli_query($con,"SELECT * FROM users WHERE userID!=0");
			//////////////////////////////////////////////////////////////////////////////////////////////////////
			$counter = 0;
			while($row = mysqli_fetch_array($result)){
				//if($row['userID'] != 0)
				for($ii = 0; $ii+strlen($search) <= strlen($row['realName']); $ii++){
			if(substr(strtolower($row['realName']),$ii,strlen(strtolower($search))) == strtolower($search) || substr(strtolower($row['username']),$ii,strlen(strtolower($search))) == strtolower($search)){
			$ii = 1000000000000;
			  //date in mm/dd/yyyy format; or it can be in other formats as well
  $birthDate = $row['birthday'];
  //explode the date to get month, day and year
  $birthDate = explode("-", $birthDate);
  $temp = $birthDate[0];
  $birthDate[0] = $birthDate[1];
  $birthDate[1] = $temp;
   $temp = $birthDate[2];
  $birthDate[2] = $birthDate[1];
  $birthDate[1] = $temp;

  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));

			echo "<div style='width:94%;font-size:24px;margin-left:3%;margin-bottom:-2px;height:90px;background:rgb(250,190,109);border-style:solid;text-align:left;border-color:black;border-width:2px'><span style='cursor:pointer' class='hoverColorWhite' onclick='loadBoard(" . $row['meBoardID'] . ")'><img src='/userInfo/" . $row['username'] . "/pics/" . $row['profPicLoc'] . "' style='cursor:pointer;height:100%;margin-right:10px;float:left' />" . $row['realName']. "</br><span style='font-size:21px'>@" . $row['username'] . "</span></br><span style='font-size:18px'>Age: " . $age . "</span></span>";
		
		if($_POST['userID'] == $row['userID']){
			//me
		}else{
$counter = 0;
$end = '';
while($counter < 18){
$stuff = array_rand($array);
$end .= $array[$stuff];
$counter++;
}
		$result44 = mysqli_query($con,"SELECT count(*) AS count FROM buddys WHERE (friendUnoID=" . $_POST['userID'] . " AND friendDosID=" . $row['userID'] . ") OR (friendDosID=" . $_POST['userID'] . " AND friendUnoID=" . $row['userID'] . ")");
		$result57 = mysqli_query($con,"SELECT count(*) AS count FROM friendRequests WHERE friendSenderID=" . $_POST['userID'] . " AND newFriendID=" . $row['userID'] . "");
		$result58 = mysqli_query($con,"SELECT count(*) AS count FROM friendRequests WHERE newFriendID=" . $_POST['userID'] . " AND friendSenderID=" . $row['userID'] . "");
			$row44 = mysqli_fetch_array($result44);
		 	 $row57 = mysqli_fetch_array($result57);
		 	  $row58 = mysqli_fetch_array($result58);
			 	 if($row44['count'] == 0){
			 	 	if($row57['count'] == 0){
			 	 		if($row58['count'] == 0){
			 	 		//send request
			 	 		echo "<div style='right:3.5%;margin-top:-17px' class='button friend' id='" . $end . "' onclick='loadFriendButton(\"" . $end . "\", 1, " . $row['userID'] . ")'>Request</div>";
			 	 		}else{
			 	 			//respond to request (ie yes button and no button)
			 	 			echo "<div id='yesOrNoBox'><div style='right:13%;margin-top:-43px;' class='button red noFriend' id='" . $end . "a' onclick='loadFriendButton(\"" . $end . "a\", 20, " . $row['userID'] . ")'>No</div><div style='right:3.5%;margin-top:-43px;' class='button yesFriend' id='" . $end . "b' onclick='loadFriendButton(\"" . $end . "b\", 21, " . $row['userID'] . ")'>Yes</div></div>";
			 	 		}
			 	 	}else{
			 	 		//cancel request
			 	 		echo "<div style='right:3.5%;margin-top:-17px;' class='button red noRequest' id='" . $end . "' onclick='loadFriendButton(\"" . $end . "\", 3, " . $row['userID'] . ")'>Cancel</div>";
			 	 	}
			 	 }else{
			 	 	//already friends/ unfriend button
			 	 	echo "<div style='right:3.5%;margin-top:-17px;' class='button green unfriend' id='" . $end . "' onclick='loadFriendButton(\"" . $end . "\", 4, " . $row['userID'] . ")'>Buddys</div>";
			 	 }
			 	}
			echo "</div>";
			$counter++;
			}
			if($counter > 25){
			$result=4;
			}
			}
		}
	}
			echo "</br>";
			
	?>