<?php
	if (!isset($boardID)) {
		$boardID=$_REQUEST['boardID'];
	}
	
  include 'zzzzz.php';
  	$result = mysqli_query($con,"SELECT users.username AS username FROM boards INNER JOIN users ON users.userID=boards.userID WHERE boards.boardID=$boardID");
	mysqli_query($con,"UPDATE boards SET widtha=" . $_REQUEST['widtha'] . ", heighta=" . $_REQUEST['heighta'] . " WHERE boardID=" . $_REQUEST['boardID'] . "");
	$viewUsername="";
	while($row = mysqli_fetch_array($result)) {
		$viewUsername = $row['username'];
	}
	mysqli_close($con);
	echo $_REQUEST['divContents'];
	file_put_contents("userInfo/$viewUsername/boards/$boardID.html", $_REQUEST['divContents']);
?>