 <?php  
  include 'zzzzz.php';
 $result2=mysqli_query($con,"SELECT MAX(boardID) AS maxes FROM boards");
 	$row2 = mysqli_fetch_array($result2);
    $postNumber=$row2['maxes'];

mysqli_query($con,"INSERT INTO boards (boardID, userID, boardName, edit, see, favorite) VALUES (" . ($postNumber+1) . ", " . $_POST['userID'] . ", 'newBoard" . ($postNumber+1) . "', 0, 1, 1)");
mysqli_query($con,"INSERT INTO follows (boardID, followerID) VALUES (" . ($postNumber+1) . ", " . $_POST['userID'] . ")");

					$result11= mysqli_query($con,"SELECT * FROM users WHERE userID=" . $_POST['userID'] . "");
					$row11 = mysqli_fetch_array($result11);

$myfile = fopen("userInfo/" . $row11['username'] . "/boards/" . ($postNumber+1) . ".html", "w");
fclose($myfile);
echo ($postNumber+1);
  ?>