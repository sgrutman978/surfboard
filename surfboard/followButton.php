<?php
  include 'zzzzz.php';

$result45 = mysqli_query($con,"SELECT * FROM boards WHERE boardID=" . $_REQUEST['boardID'] . "");
$row45 = mysqli_fetch_array($result45);
$otherID = $row45['userID'];
if($row45['favorite'] == 0){
$result44 = mysqli_query($con,"SELECT count(*) AS count FROM buddys WHERE (friendUnoID=" . $_REQUEST['loggedInUserID'] . " AND friendDosID=" . $otherID . ") OR (friendDosID=" . $_REQUEST['loggedInUserID'] . " AND friendUnoID=" . $otherID . ")");
		$row44 = mysqli_fetch_array($result44);
			 	 if($row44['count'] == 0 && $_REQUEST['loggedInUserID'] != $otherID){
			 	 }else{
			 	 	 if($_REQUEST['follow'] == "none"){
 	$result55 = mysqli_query($con,"SELECT * FROM follows WHERE boardID=" . $_REQUEST['boardID'] . " AND followerID=" . $_REQUEST['loggedInUserID'] . " LIMIT 1");
 if($result55->num_rows == 0){
 	echo "<span id='favorite' class='fontawesome-star'></span>";
 }
 else{
echo "<span id='unfavorite' class='fontawesome-star'></span>";
 }
 }
  if($_REQUEST['follow'] == "yes"){
  	mysqli_query($con,"INSERT INTO follows (boardID, followerID) VALUES (" . $_REQUEST['boardID'] . ", " . $_REQUEST['loggedInUserID'] . ")");
 	echo "<span id='unfavorite' class='fontawesome-star'></span>";
  }
  if($_REQUEST['follow'] == "no"){
  	mysqli_query($con,"DELETE FROM follows WHERE boardID=" . $_REQUEST['boardID'] . " AND followerID=" . $_REQUEST['loggedInUserID'] . "");
 	echo "<span id='favorite' class='fontawesome-star'></span>";
 }
 $row55 = mysqli_fetch_array($result55);
$result2 = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row55['userID'] . "");
			$row2 = mysqli_fetch_array($result2);
			 	 }
			 	}
if($row45['favorite'] == 1){
			 	 	 if($_REQUEST['follow'] == "none"){
 	$result55 = mysqli_query($con,"SELECT * FROM follows WHERE boardID=" . $_REQUEST['boardID'] . " AND followerID=" . $_REQUEST['loggedInUserID'] . " LIMIT 1");
 if($result55->num_rows == 0){
 	echo "<span id='favorite' class='fontawesome-star'></span>";
 }
 else{
echo "<span id='unfavorite' class='fontawesome-star'></span>";
 }
 }
  if($_REQUEST['follow'] == "yes"){
  	mysqli_query($con,"INSERT INTO follows (boardID, followerID) VALUES (" . $_REQUEST['boardID'] . ", " . $_REQUEST['loggedInUserID'] . ")");
 	echo "<span id='unfavorite' class='fontawesome-star'></span>";
  }
  if($_REQUEST['follow'] == "no"){
  	mysqli_query($con,"DELETE FROM follows WHERE boardID=" . $_REQUEST['boardID'] . " AND followerID=" . $_REQUEST['loggedInUserID'] . "");
 	echo "<span id='favorite' class='fontawesome-star'></span>";
 }
 $row55 = mysqli_fetch_array($result55);
$result2 = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row55['userID'] . "");
			$row2 = mysqli_fetch_array($result2);
			 	}
			 	if($row45['favorite'] == 2){
			 if($_REQUEST['loggedInUserID'] != $otherID){
			 	 }else{
			 	 	 if($_REQUEST['follow'] == "none"){
 	$result55 = mysqli_query($con,"SELECT * FROM follows WHERE boardID=" . $_REQUEST['boardID'] . " AND followerID=" . $_REQUEST['loggedInUserID'] . " LIMIT 1");
 if($result55->num_rows == 0){
 	echo "<span id='favorite' class='fontawesome-star'></span>";
 }
 else{
echo "<span id='unfavorite' class='fontawesome-star'></span>";
 }
 }
  if($_REQUEST['follow'] == "yes"){
  	mysqli_query($con,"INSERT INTO follows (boardID, followerID) VALUES (" . $_REQUEST['boardID'] . ", " . $_REQUEST['loggedInUserID'] . ")");
 	echo "<span id='unfavorite' class='fontawesome-star'></span>";
  }
  if($_REQUEST['follow'] == "no"){
  	mysqli_query($con,"DELETE FROM follows WHERE boardID=" . $_REQUEST['boardID'] . " AND followerID=" . $_REQUEST['loggedInUserID'] . "");
 	echo "<span id='favorite' class='fontawesome-star'></span>";
 }
 $row55 = mysqli_fetch_array($result55);
$result2 = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row55['userID'] . "");
			$row2 = mysqli_fetch_array($result2);
			 	 }
			 	}






?>