<?php
	    include 'zzzzz.php';
			mysqli_query($con,"INSERT INTO posts (lefter, topper, boardID, userID, datePlusTime, content) VALUES (" . $_REQUEST['left'] . "," . $_REQUEST['top'] . "," . $_REQUEST['boardID'] . "," . $_REQUEST['loggedInUserID'] . ",NOW(),'" . $_REQUEST['divID'] . "')");
	//mysqli_query($con, "UPDATE posts SET lefter=" . $_REQUEST['left'] . ",topper=" . $_REQUEST['top'] . " WHERE boardID=" . $_REQUEST['boardID'] . " AND content='" . $_REQUEST['divID'] . "'");
	echo "Saved";
	?>