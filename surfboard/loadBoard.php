<?php
include 'zzzzz.php';
	
if (!isset($boardID)) {
		$boardID=$_REQUEST['boardID'];
	}
	$result = mysqli_query($con,"SELECT users.username AS username FROM boards INNER JOIN users ON users.userID=boards.userID WHERE boards.boardID=$boardID");
	$viewUsername="";
	while($row = mysqli_fetch_array($result)) {
		$viewUsername = $row['username'];
	}
	
	$result45 = mysqli_query($con,"SELECT * FROM boards WHERE boardID=" . $_POST['boardID'] . "");
$row45 = mysqli_fetch_array($result45);
$otherID = $row45['userID'];
if($row45['see'] == 0){
$result44 = mysqli_query($con,"SELECT count(*) AS count FROM buddys WHERE (friendUnoID=" . $_POST['userID'] . " AND friendDosID=" . $otherID . ") OR (friendDosID=" . $_POST['userID'] . " AND friendUnoID=" . $otherID . ")");
		$row44 = mysqli_fetch_array($result44);
			 	 if($row44['count'] == 0 && $_POST['userID'] != $otherID){
			 	 	echo "no";
			 	 }else{
			 	 	echo file_get_contents("userInfo/$viewUsername/boards/$boardID.html");
			 	 	mysqli_query($con, "UPDATE users SET lastLog=NOW() WHERE userID=" . $_POST['userID'] . "");
			 	 }
			 	}
if($row45['see'] == 1){
			 	 	echo file_get_contents("userInfo/$viewUsername/boards/$boardID.html");
			 	 	mysqli_query($con, "UPDATE users SET lastLog=NOW() WHERE userID=" . $_POST['userID'] . "");
			 	}
			 	if($row45['see'] == 2){
			 if($_POST['userID'] != $otherID){
			 	 		echo "no";
			 	 }else{
			 	 	echo file_get_contents("userInfo/$viewUsername/boards/$boardID.html");
	mysqli_query($con, "UPDATE users SET lastLog=NOW() WHERE userID=" . $_POST['userID'] . "");
			 	 }
			 	}
			 	mysqli_close($con);

?>