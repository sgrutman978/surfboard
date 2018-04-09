<?php
  include 'zzzzz.php';
 $result55 = mysqli_query($con,"SELECT * FROM boards WHERE boardID=" . $_REQUEST['boardID'] . "");
 $row55 = mysqli_fetch_array($result55);
$result2 = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row55['userID'] . "");
			$row2 = mysqli_fetch_array($result2);
echo "@" . $row2['username'] . "<span style='color:rgb(69,115,175)'>'s</span>";
?>