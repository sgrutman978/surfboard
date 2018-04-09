<?php
  include 'zzzzz.php';

 $result2=mysqli_query($con,"SELECT * FROM boards WHERE boardID=" . $_POST['boardID'] . "");
 	$row2 = mysqli_fetch_array($result2);
 	if($_POST['userID'] != $row2['userID']){
echo "no";
 	}
?>