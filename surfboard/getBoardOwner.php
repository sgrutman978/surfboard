<!-- <div class="xOut" onclick="moveAway()" style="top:-7px;left:-7px">X</div>
 --><div style="float:left;background:rgb(250,190,109);height:350px">
	 <?php
	  include 'zzzzz.php';
	  $result54 = mysqli_query($con,"SELECT * FROM boards WHERE boardID=" . $_REQUEST['boardID'] . "");
	  $row54 = mysqli_fetch_array($result54);
			$result3 = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row54['userID'] . "");
			$row3 = mysqli_fetch_array($result3);
				echo "<img style='float:left;margin-left:7px;margin-top:7px;width:100px;height:100px;' src='userInfo/" . $row3['username'] . "/pics/" . $row3['profPicLoc'] . "' />";
	
  //date in mm/dd/yyyy format; or it can be in other formats as well
  $birthDate = $row3['birthday'];
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

		echo "<div style='float:left;margin-left:10px;margin-right:14px;margin-top:14px;height:100px;font-size:22px'>" . $row3['realName'] ."</br><span style='font-size:20px'>@" . $row3['username'] ."</span></br><span style='font-size:18px'>Age: " . $age . "</span></div></br></br><div style='width:100%;text-align:center'>Favorite Song/Video:</div></br><iframe src='" . $row3['favoriteSong'] . "' frameborder='0' style='width:90%;margin-left:5%;margin-top:-16px' allowfullscreen=''></iframe></br>";
		?>
	</div>
	 <div id="boardsList">
	 <span id="resizeMyBoardwalk" style="padding:3px;text-align:center;background:rgb(245,245,253);height:25px">My Storyboards</span></br><div style="height:8px;width:100%"></div>
      <?php
       include 'zzzzz.php';
			$result = mysqli_query($con,"SELECT * FROM boards WHERE userID=" . $row54['userID'] . "");
      $postNumber;
			while($row = mysqli_fetch_array($result)) {
				echo "<a style='cursor:pointer' class='loadBoard' onclick='loadBoard(".$row['boardID'].")'>".$row['boardName']."</a>";
				echo "<br>";
			}
			 $result54 = mysqli_query($con,"SELECT * FROM boards WHERE boardID=" . $_REQUEST['boardID'] . "");
	  $row54 = mysqli_fetch_array($result54);
		if ($_REQUEST['userID'] == $row54['userID']) {
			echo "<span style='cursor:pointer;color:white' id='addBoard' class='loadBoard' onclick='addBoard()'>New Board</span>";
		}
		?>
		
    </div>