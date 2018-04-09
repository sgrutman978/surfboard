<?php
  include 'zzzzz.php';
 $stringC = explode(",", $_POST['string']); 
foreach($stringC as $value) {
  	$result11= mysqli_query($con,"SELECT postID FROM posts WHERE boardID=" . $_POST['boardID'] . " AND content='" . $value . "'");
					$row11 = mysqli_fetch_array($result11);
					mysqli_query($con,"DELETE FROM posts WHERE postID=" . $row11['postID'] . "");
					mysqli_query($con,"DELETE FROM ats WHERE postID=" . $row11['postID'] . "");
					mysqli_query($con,"DELETE FROM hashtags WHERE postID=" . $row11['postID'] . "");
					mysqli_query($con,"DELETE FROM comments WHERE postID=" . $row11['postID'] . "");
			}

echo $_POST['string'];
			 	?>