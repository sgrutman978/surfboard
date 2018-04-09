<?php 
  include 'zzzzz.php';
  $result45 = mysqli_query($con,"SELECT * FROM boards WHERE boardID=" . $_POST['boardID'] . "");
$row45 = mysqli_fetch_array($result45);
$otherID = $row45['userID'];
if($row45['edit'] == 0){
$result44 = mysqli_query($con,"SELECT count(*) AS count FROM buddys WHERE (friendUnoID=" . $_POST['userID'] . " AND friendDosID=" . $otherID . ") OR (friendDosID=" . $_POST['userID'] . " AND friendUnoID=" . $otherID . ")");
		$row44 = mysqli_fetch_array($result44);
			 	 if($row44['count'] == 0 && $_POST['userID'] != $otherID){
			 	 	echo "no";
			 	 }else{
			 	 	echo "yes";
			 	 }
			 	}
if($row45['edit'] == 1){
			 	 	echo "yes";
			 	}
			 	if($row45['edit'] == 2){
			 if($_POST['userID'] != $otherID){
			 	 	echo "no";
			 	 }else{
			 	 	echo "yes";
			 	 }
			 	}
			 	 ?>