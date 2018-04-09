<?php

$result44 = mysqli_query($con,"SELECT count(*) AS count FROM users WHERE username='" . $_POST['username2'] . "' LIMIT 1");
$result47 = mysqli_query($con,"SELECT count(*) AS count FROM users WHERE email='" . $_POST["email"] . "' LIMIT 1");
$row44 = mysqli_fetch_array($result44);
$row47 = mysqli_fetch_array($result47);
if($row44['count'] == 0 && $row47['count'] == 0){
 $result2=mysqli_query($con,"SELECT MAX(boardID) AS maxes FROM boards");
 	$row2 = mysqli_fetch_array($result2);
    $postNumber=$row2['maxes'];


  mysqli_query($con,"INSERT INTO users (profPicLoc, username, realName, password, birthday, meBoardID, email) VALUES ('keepCalm.png', '" . $_POST['username2'] . "', '" . $_POST['realName'] . "', PASSWORD('" . $_POST['password2'] . "'), '" . $_POST['bday'] . "', " . ($postNumber+1) . ", '" . $_POST['email'] . "')");
 $result3=mysqli_query($con,"SELECT * FROM users WHERE username='" . $_POST['username2'] . "' LIMIT 1");
 	$row3 = mysqli_fetch_array($result3);
mysqli_query($con,"INSERT INTO boards (boardID, userID, boardName, edit, see, favorite) VALUES (" . ($postNumber+1) . ", " . $row3['userID'] . ", 'Me', 0, 1, 1)");
mysqli_query($con,"INSERT INTO follows (boardID, followerID) VALUES (" . ($postNumber+1) . ", " . $row3['userID'] . ")");
	
mkdir("userInfo/" . $_POST['username2'] . "/boards", 0777, true);
mkdir("userInfo/" . $_POST['username2'] . "/pics", 0777, true);

$myfile = fopen("userInfo/" . $_POST['username2'] . "/boards/" . ($postNumber+1) . ".html", "w");
fclose($myfile);
copy("keepCalm.png", "userInfo/" . $_POST['username2'] . "/pics/keepCalm.png");
$array = array('a', 'b', 'c','d', 'e', 'f','g', 'h', 'i','j', 'k', 'l','m', 'n', 'o','p', 'q', 'r','s', 't', 'u','v', 'w', 'x','y', 'z', 'A','B', 'C', 'D','E', 'F', 'G','H', 'I', 'J','K', 'L', 'M','N', 'O', 'P','Q', 'R', 'S','T', 'U', 'V','W', 'X', 'Y','Z', '1', '2','3', '4', '5','6', '7', '8', '9', '0');

$counter = 0;
$end = '';
while($counter < 18){
$stuff = array_rand($array);
$end .= $array[$stuff];
$counter++;
}

mysqli_query($con,"UPDATE users SET token='" . $end . "' WHERE username='" . $_POST['username2'] . "'");

    setcookie("diresu", $row3['userID']);
setcookie("nekot", $end);


header("Location: mainpage.php");
}else{
	header("Location: index.php?nope=1");
}

?>