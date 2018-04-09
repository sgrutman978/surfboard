<?php

$array = array('a', 'b', 'c','d', 'e', 'f','g', 'h', 'i','j', 'k', 'l','m', 'n', 'o','p', 'q', 'r','s', 't', 'u','v', 'w', 'x','y', 'z', 'A','B', 'C', 'D','E', 'F', 'G','H', 'I', 'J','K', 'L', 'M','N', 'O', 'P','Q', 'R', 'S','T', 'U', 'V','W', 'X', 'Y','Z', '1', '2','3', '4', '5','6', '7', '8', '9', '0');

$counter = 0;
$end = '';
while($counter < 18){
$stuff = array_rand($array);
$end .= $array[$stuff];
$counter++;
}

  include 'zzzzz.php';
if($_POST['type'] == 1){
	mysqli_query($con,"INSERT INTO friendRequests (friendSenderID, newFriendID) VALUES (" . $_POST['userID'] . ", " . $_POST['otherID'] . ")");
echo "<div style='right:3.5%;margin-top:-17px;' class='button red noRequest' id='" . $end . "' onclick='loadFriendButton(\"" . $end . "\", 3, " . $_POST['otherID'] . ")'>Cancel</div>";			 	
}
if($_POST['type'] == 20){
	mysqli_query($con,"DELETE FROM friendRequests WHERE friendSenderID=" . $_POST['otherID'] . " AND newFriendID=" . $_POST['userID'] . "");
echo "<div style='right:3.5%;margin-top:-17px;' class='button friend' id='" . $end . "' onclick='loadFriendButton(\"" . $end . "\", 1, " . $_POST['otherID'] . ")'>Request</div>";
}
if($_POST['type'] == 21){
	mysqli_query($con,"DELETE FROM friendRequests WHERE friendSenderID=" . $_POST['otherID'] . " AND newFriendID=" . $_POST['userID'] . "");
mysqli_query($con,"INSERT INTO buddys (friendUnoID, friendDosID) VALUES (" . $_POST['otherID'] . ", " . $_POST['userID'] . ")");
$result44 = mysqli_query($con,"SELECT * FROM boards WHERE userID=" . $_POST['userID'] . " OR userID=" . $_POST['otherID'] . "");
	while($row44 = mysqli_fetch_array($result44)) {
mysqli_query($con,"INSERT INTO follows (boardID, followerID, seen) VALUES (" . $row44['boardID'] . ", " . $_POST['userID'] . ", 1)");
mysqli_query($con,"INSERT INTO follows (boardID, followerID, seen) VALUES (" . $row44['boardID'] . ", " . $_POST['otherID'] . ", 1)");
	}
echo "<div style='right:3.5%;margin-top:-17px;' class='button green unfriend' id='" . $end . "' onclick='loadFriendButton(\"" . $end . "\", 4, " . $row['userID'] . ")'>Buddys</div>";
}
if($_POST['type'] == 3){
		mysqli_query($con,"DELETE FROM friendRequests WHERE friendSenderID=" . $_POST['userID'] . " AND newFriendID=" . $_POST['otherID'] . "");
echo "<div style='right:3.5%;margin-top:-17px;' class='button friend' id='" . $end . "' onclick='loadFriendButton(\"" . $end . "\", 1, " . $_POST['otherID'] . ")'>Request</div>";			 	
}
if($_POST['type'] == 4){
	mysqli_query($con,"DELETE FROM buddys WHERE (friendUnoID=" . $_POST['userID'] . " AND friendDosID=" . $_POST['otherID'] . ") OR (friendDosID=" . $_POST['userID'] . " AND friendUnoID=" . $_POST['otherID'] . ")");
	echo "<div style='right:3.5%;margin-top:-17px;' class='button friend' id='" . $end . "' onclick='loadFriendButton(\"" . $end . "\", 1, " . $_POST['otherID'] . ")'>Request</div>";
if($_POST['yesNo'] == 2){
mysqli_query($con,"DELETE FROM follows WHERE followerID=" . $_POST['userID'] . " AND boardID=" . $_POST['boardID'] . "");
}
}
?>