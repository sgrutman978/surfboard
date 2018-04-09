<?php 
  include 'zzzzz.php';

$result345 = mysqli_query($con,"SELECT userID FROM boards WHERE boardID=" . $_POST['boardID'] . "");
  $row345 = mysqli_fetch_array($result345);
  $userIDa = $row345['userID'];

    $array = array('a', 'b', 'c','d', 'e', 'f','g', 'h', 'i','j', 'k', 'l','m', 'n', 'o','p', 'q', 'r','s', 't', 'u','v', 'w', 'x','y', 'z', 'A','B', 'C', 'D','E', 'F', 'G','H', 'I', 'J','K', 'L', 'M','N', 'O', 'P','Q', 'R', 'S','T', 'U', 'V','W', 'X', 'Y','Z', '1', '2','3', '4', '5','6', '7', '8', '9', '0');

if($_POST['yay'] == 0){
echo "Buddys</br>";
$result4 = mysqli_query($con,"SELECT * FROM buddys WHERE friendUnoID=" . $userIDa . " OR friendDosID=" . $userIDa . "");
while($row4 = mysqli_fetch_array($result4)){
  if(($row4['friendUnoID'] == $userIDa) || ($row4['friendDosID'] == $userIDa)){
 if($row4['friendUnoID'] == $userIDa){
  $result = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row4['friendDosID'] . "");
 }else{
  $result = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row4['friendUnoID'] . "");
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

  $counter = 0;
$end = '';
while($counter < 18){
$stuff = array_rand($array);
$end .= $array[$stuff];
$counter++;
}

  echo "<div style='width:94%;font-size:24px;margin-left:3%;margin-bottom:-2px;height:90px;background:rgb(250,190,109);border-style:solid;text-align:left;border-color:black;border-width:2px'><span style='cursor:pointer' class='hoverColorWhite' onclick='loadBoard(" . $row['meBoardID'] . ")'><img src='/userInfo/" . $row['username'] . "/pics/" . $row['profPicLoc'] . "' style='cursor:pointer;height:100%;margin-right:10px;float:left' />" . $row['realName']. "</br><span style='font-size:21px'>@" . $row['username'] . "</span></br><span style='font-size:18px'>Age: " . $age . "</span></span>";
    echo "<div style='right:3.5%;margin-top:-17px;' class='button green unfriend' id='" . $end . "' onclick='loadFriendButton(\"" . $end . "\", 4, " . $row['userID'] . ")'>Buddys</div></div>";
}
}
}


if($_POST['yay'] == 1){
  echo "Favorites</br>";
 $result5 = mysqli_query($con,"SELECT DISTINCT followerID, boardID FROM follows WHERE followerID=" . $userIDa . "");
 while($row5 = mysqli_fetch_array($result5)){
    $result4 = mysqli_query($con,"SELECT * FROM boards WHERE boardID=" . $row5['boardID'] . "");
while($row4 = mysqli_fetch_array($result4)){
 $result = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row4['userID'] . "");
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
echo "<div style='width:94%;font-size:24px;margin-left:3%;margin-bottom:-2px;height:85px;background:rgb(250,190,109);border-style:solid;text-align:left;border-color:black;border-width:2px'><span style='cursor:pointer' class='hoverColorWhite' onclick='loadBoard(" . $row['meBoardID'] . ")'><img src='/userInfo/" . $row['username'] . "/pics/" . $row['profPicLoc'] . "' style='cursor:pointer;height:100%;margin-right:10px;float:left' />" . $row['realName']. " <span style='color:red'>'s' \"" . $row4['boardName'] . "\" Storyboard</span></br><span style='font-size:20px'>@" . $row['username'] . "</span></br><span style='font-size:16px'>Age: " . $age . "</span></span>
</div>";
}
}
}




?>