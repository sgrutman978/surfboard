<?php
  include 'zzzzz.php';
$result = mysqli_query($con,"SELECT * FROM posts WHERE postID=" . $_GET['postID'] . " LIMIT 1");
$row = mysqli_fetch_array($result);
$result3 = mysqli_query($con,"SELECT * FROM boards WHERE boardID=" . $row['boardID'] . " LIMIT 1");
$row3 = mysqli_fetch_array($result3);
$result2 = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row3['userID'] . " LIMIT 1");
$row2 = mysqli_fetch_array($result2);
echo "<div style='-ms-transform: scale(.3,.3);-webkit-transform: scale(.3,.3);transform:scale(.3,.3);position:absolute;top:-" . ($row['topper']*.3) . "px;left:-" . ($row['lefter']*.3) . "px'>";
echo file_get_contents("userInfo/" . $row2['username'] . "/boards/" . $row['boardID'] . ".html");
echo "</div>";
?>