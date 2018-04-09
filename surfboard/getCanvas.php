<?php
  include 'zzzzz.php';
    $result22 = mysqli_query($con,"SELECT * FROM boards WHERE boardID=" . $_POST['boardID'] . "");
			$row22 = mysqli_fetch_array($result22);
			  $result = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row22['userID'] . "");
			$row = mysqli_fetch_array($result);
				 	$result2 = mysqli_query($con, "SELECT * FROM boards WHERE boardID=" . $_POST['boardID'] . "");
				 	$row2 = mysqli_fetch_array($result2);
echo "userInfo/" . $row['username'] . "/pics/" . $row2['canvasImage'] . "";
?>