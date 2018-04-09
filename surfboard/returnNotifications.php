<?php
  include 'zzzzz.php';
 $result2 = mysqli_query($con,"SELECT * FROM friendRequests WHERE newFriendID=" . $_POST['userID'] . "");
 while($row2 = mysqli_fetch_array($result2)){
 	$result = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row2['friendSenderID'] . "");
 	$row = mysqli_fetch_array($result);
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
echo "<div style='width:94%;font-size:20px;margin-left:3%;margin-bottom:-2px;height:75px;background:rgb(250,190,109);border-style:solid;text-align:left;border-color:black;border-width:2px'><span style='cursor:pointer' class='hoverColorWhite' onclick='loadBoard(" . $row['meBoardID'] . ")'><img src='/userInfo/" . $row['username'] . "/pics/" . $row['profPicLoc'] . "' style='cursor:pointer;height:100%;margin-right:10px;float:left' />" . $row['realName']. "</br><span style='font-size:17px'>@" . $row['username'] . "</span></br><span style='font-size:16px'>Age: " . $age . "</span></span>
<div id='yesOrNoBox'><div style='right:13%;margin-top:-57px;' class='button red noFriend' id='" . $end . "a' onclick='loadFriendButton(\"" . $end . "a\", 20, " . $row['userID'] . ")'>no</div><div style='right:3.5%;margin-top:-57px;' class='button yesFriend' id='" . $end . "b' onclick='loadFriendButton(\"" . $end . "b\", 21, " . $row['userID'] . ")'>yes</div></div>
</div>";
}



$result4 = mysqli_query($con,"SELECT * FROM boards WHERE userID=" . $_POST['userID'] . "");
while($row4 = mysqli_fetch_array($result4)){
 $result5 = mysqli_query($con,"SELECT * FROM follows WHERE boardID=" . $row4['boardID'] . "");
 while($row5 = mysqli_fetch_array($result5)){
 	if($_POST['userID'] != $row5['followerID'] && $row5['seen'] == 0){
 $result = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row5['followerID'] . "");
 	$row = mysqli_fetch_array($result);
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
echo "<div style='width:94%;font-size:20px;margin-left:3%;margin-bottom:-2px;height:75px;background:rgb(250,190,109);border-style:solid;text-align:left;border-color:black;border-width:2px'><span style='cursor:pointer' class='hoverColorWhite' onclick='loadBoard(" . $row['meBoardID'] . ")'><img src='/userInfo/" . $row['username'] . "/pics/" . $row['profPicLoc'] . "' style='cursor:pointer;height:100%;margin-right:10px;float:left' />" . $row['realName']. " <span style='color:red'> followed your \"" . $row4['boardName'] . "\" Storyboard</span></br><span style='font-size:17px'>@" . $row['username'] . "</span></br><span style='font-size:16px'>Age: " . $age . "</span></span>
<div id='yesOrNoBox'><div style='position:absolute;right:29px;margin-top:-39px;' class='button noFriend' id='" . $end . "a' onclick='seenNotification(" . $row4['boardID'] . ", " . $row5['followerID'] . ", 1)'>Gnarly!</div></div>
</div>";
}
}
}




$result4 = mysqli_query($con,"SELECT * FROM buddys WHERE friendUnoID=" . $_POST['userID'] . " OR friendDosID=" . $_POST['userID'] . "");
while($row4 = mysqli_fetch_array($result4)){
  if(($row4['friendUnoID'] == $_POST['userID'] && $row4['seen'] == 0) || ($row4['friendDosID'] == $_POST['userID'] && $row4['seen2'] == 0)){
 if($row4['friendUnoID'] == $_POST['userID']){
  $result = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row4['friendDosID'] . "");
 $typer = 3;
 }else{
  $result = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row4['friendUnoID'] . "");
 $typer = 4;
 }
  $row = mysqli_fetch_array($result);
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
echo "<div style='width:94%;font-size:20px;margin-left:3%;margin-bottom:-2px;height:75px;background:rgb(250,190,109);border-style:solid;text-align:left;border-color:black;border-width:2px'><span style='cursor:pointer' class='hoverColorWhite' onclick='loadBoard(" . $row['meBoardID'] . ")'><img src='/userInfo/" . $row['username'] . "/pics/" . $row['profPicLoc'] . "' style='cursor:pointer;height:100%;margin-right:10px;float:left' />" . $row['realName']. " <span style='color:red'>is now your buddy!</span></br><span style='font-size:17px'>@" . $row['username'] . "</span></br><span style='font-size:16px'>Age: " . $age . "</span></span>
<div id='yesOrNoBox'><div style='position:absolute;right:29px;margin-top:-39px;' class='button noFriend' id='" . $end . "a' onclick='seenNotification(" . $row4['friendUnoID'] . ", " . $row4['friendDosID'] . ", " . $typer . ")'>Gnarly!</div></div>
</div>";
}
}



$result4 = mysqli_query($con,"SELECT * FROM boards WHERE userID=" . $_POST['userID'] . "");
while($row4 = mysqli_fetch_array($result4)){
  $result56 = mysqli_query($con,"SELECT * FROM posts WHERE boardID=" . $row4['boardID'] . "");
  while($row56 = mysqli_fetch_array($result56)){
  if($row56['seen'] == 0 && $row56['userID'] != $_POST['userID']){
 $result = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row56['userID'] . "");
  $row = mysqli_fetch_array($result);
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
echo "<div style='width:94%;font-size:20px;margin-left:3%;margin-bottom:-2px;height:75px;background:rgb(250,190,109);border-style:solid;text-align:left;border-color:black;border-width:2px'><span style='cursor:pointer' class='hoverColorWhite' onclick='loadBoard(" . $row['meBoardID'] . ")'><img src='/userInfo/" . $row['username'] . "/pics/" . $row['profPicLoc'] . "' style='cursor:pointer;height:100%;margin-right:10px;float:left' />" . $row['realName']. " <span style='color:red'>posted on your \"" . $row4['boardName'] . "\" storyboard</span></br><span style='font-size:17px'>@" . $row['username'] . "</span></br><span style='font-size:16px'>Age: " . $age . "</span></span>
<div id='yesOrNoBox'><div style='position:absolute;right:29px;margin-top:-39px;' class='button noFriend' id='" . $end . "a' onclick='seenNotification(" . $row56['boardID'] . ", " . $row56['postID'] . ", 6)'>Gnarly!</div></div>
</div>";
}
}
}




$result4 = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $_POST['userID'] . "");
$row4 = mysqli_fetch_array($result4);
  $result56 = mysqli_query($con,"SELECT * FROM ats WHERE ats='" . $row4['username'] . "'");
  while($row56 = mysqli_fetch_array($result56)){
 $result47 = mysqli_query($con,"SELECT * FROM posts WHERE postID=" . $row56['postID'] . "");
  $row47 = mysqli_fetch_array($result47);
   $result470 = mysqli_query($con,"SELECT * FROM boards WHERE boardID=" . $row47['boardID'] . "");
  $row470 = mysqli_fetch_array($result470);
   $result = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row47['userID'] . "");
  $row = mysqli_fetch_array($result);
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
echo "<div style='width:94%;font-size:20px;margin-left:3%;margin-bottom:-2px;height:75px;background:rgb(250,190,109);border-style:solid;text-align:left;border-color:black;border-width:2px'><span style='cursor:pointer' class='hoverColorWhite' onclick='loadBoard(" . $row['meBoardID'] . ")'><img src='/userInfo/" . $row['username'] . "/pics/" . $row['profPicLoc'] . "' style='cursor:pointer;height:100%;margin-right:10px;float:left' />" . $row['realName']. " <span style='color:red'>mentioned you on thier \"" . $row470['boardName'] . "\" storyboard</span></br><span style='font-size:17px'>@" . $row['username'] . "</span></br><span style='font-size:16px'>Age: " . $age . "</span></span>
<div id='yesOrNoBox'><div style='position:absolute;right:29px;margin-top:-39px;' class='button noFriend' id='" . $end . "a' onclick='seenNotification(" . $row56['postID'] . ", \"" . $row56['ats'] . "\", 8)'>Gnarly!</div></div>
</div>";
}




?>