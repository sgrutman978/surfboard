<?php
  include 'zzzzz.php';

$text = $_POST['content'];

$return = "";

$words = explode(" ", $text);

for ($i=0; $i < count($words); $i++) {
	$word = $words[$i];

	if ($word[0] === "@") {
			$result44 = mysqli_query($con,"SELECT * FROM users WHERE username='" . substr($word, 1) . "'");
	$row44 = mysqli_fetch_array($result44);
	$result5 = mysqli_query($con,"SELECT * FROM posts WHERE content='" . $_POST['id'] . "' AND boardID=" . $_POST['boardID'] . "");
	$row5 = mysqli_fetch_array($result5);
	if($_POST['userID'] != $row44['userID']){
	mysqli_query($con, "INSERT INTO ats (postID, ats) VALUES (" . $row5['postID'] . ", '" . substr($word, 1) . "')");
}
	$boardID = $row44['meBoardID'];
		$word = "<span class='at' onclick='grabMeBoard($boardID, 1)'>" . $words[$i] . "</span>"; 
	}
	else if ($word[0] === "#")  {
		$result5 = mysqli_query($con,"SELECT * FROM posts WHERE content='" . $_POST['id'] . "' AND boardID=" . $_POST['boardID'] . "");
	$row5 = mysqli_fetch_array($result5);
	mysqli_query($con, "INSERT INTO hashtags (postID, hashtag) VALUES (" . $row5['postID'] . ", '" . substr($word, 1) . "')");
		$word = "<span class='hashtag' onclick='hashtag(\"".$words[$i]."\")'>" . $words[$i] . "</span>"; 
	}

	$return .= $word. " ";
}

echo "<p class='textStuff'>" . $return . "</p>";
?>