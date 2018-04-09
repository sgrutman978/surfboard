
<?php 
  include 'zzzzz.php';
$newNamePrefix = time() . '_';
  $result22 = mysqli_query($con,"SELECT * FROM boards WHERE boardID=" . $_POST['boardID'] . "");
			$row22 = mysqli_fetch_array($result22);
			  $result = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row22['userID'] . "");
			$row = mysqli_fetch_array($result);
				if(file_put_contents("userInfo/" . $row['username'] . "/pics/" . $newNamePrefix."aa.jpg", base64_decode(explode(',',$_POST['picture'])[1]))){
				 	mysqli_query($con, "UPDATE boards SET canvasImage='" . $newNamePrefix . "aa.jpg' WHERE boardID=" . $_POST['boardID'] . "");

mysqli_query($con, "INSERT INTO draws (boardID, posterID, seen) VALUES (" . $_POST['boardID'] . ", " . $_POST['userID'] . ", 0)");

}
?>