<?php
  include 'zzzzz.php';
if($_POST['type'] == 1) {
mysqli_query($con,"UPDATE follows SET seen=1 WHERE boardID=" . $_POST['boardID'] . " AND followerID=" . $_POST['followerID'] . "");
}
if($_POST['type'] == 3) {
mysqli_query($con,"UPDATE buddys SET seen=1 WHERE friendUnoID=" . $_POST['boardID'] . " AND friendDosID=" . $_POST['followerID'] . "");
}
if($_POST['type'] == 4) {
mysqli_query($con,"UPDATE buddys SET seen2=1 WHERE friendUnoID=" . $_POST['boardID'] . " AND friendDosID=" . $_POST['followerID'] . "");
}
if($_POST['type'] == 6) {
mysqli_query($con,"UPDATE posts SET seen=1 WHERE postID=" . $_POST['followerID'] . "");
}
if($_POST['type'] == 8) {
mysqli_query($con,"DELETE FROM ats WHERE postID=" . $_POST['boardID'] . " AND ats='" . $_POST['followerID'] . "'");
}
if($_POST['type'] == 9) {
mysqli_query($con,"UPDATE draws SET seen=1 WHERE drawID=" . $_POST['followerID'] . "");
}
 ?>