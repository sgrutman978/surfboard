<?php
//include ImageManipulator class
require_once('ImageManipulator.php');

//get image file name
$image = explode("/", $_POST['image']);
$image = end($image);


  include 'zzzzz.php';
$result = mysqli_query($con,"SELECT username from users WHERE userID=".$_POST['userID']);

$row = mysqli_fetch_array($result);

//check if file Extension is on the list of allowed ones
$manipulator = new ImageManipulator("userInfo/" . $row['username'] . "/pics/" . $image);

//get the x1, y1, x2, y2 for the new picture
$x1 = $_POST["x"];
$y1 = $_POST["y"];

$x2 = $x1 + $_POST["width"];
$y2 = $y1 + $_POST["height"];

//crop
$newImage = $manipulator->crop($x1, $y1, $x2, $y2);

$newNamePrefix = time() . '_';

//saving file to proper folder
$manipulator->save("userInfo/" . $row['username'] . "/pics/" . $newNamePrefix . $image);

 mysqli_query($con,"UPDATE users SET profPicLoc='" . $newNamePrefix . $image . "' WHERE userID=" . $_POST['userID'] . "");

echo "saved";

?>