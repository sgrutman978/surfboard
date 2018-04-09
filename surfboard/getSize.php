<?php
  include 'zzzzz.php';
	if($_POST['type'] == 1){
	$result = mysqli_query($con,"SELECT heighta FROM boards WHERE boardID=" . $_POST['boardID'] . "");
		$row = mysqli_fetch_array($result);
	echo $row['heighta'];
}
		if($_POST['type'] == 2){
		$result = mysqli_query($con,"SELECT widtha FROM boards WHERE boardID=" . $_POST['boardID'] . "");
	$row = mysqli_fetch_array($result);
		echo $row['widtha'];
}

?>