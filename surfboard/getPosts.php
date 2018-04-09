		<!--name 0 #board boardname</br>example: sgrutman97804prom-->
		<?php
			   include 'zzzzz.php';
			  echo "<div style='width:100%;height:40px'></div>";
			 // $result2 = mysqli_query($con, "SELECT * FROM buddys WHERE friendUnoID=" . $_POST['userID'] . " friendDosID=" . $_POST['userID'] . "");
			$result = mysqli_query($con,"SELECT * FROM users INNER JOIN posts ON users.userID=posts.userID INNER JOIN boards ON boards.boardID=posts.boardID ORDER BY posts.postID DESC LIMIT 18");
				while($row = mysqli_fetch_array($result)) {
				 	$result2 = mysqli_query($con, "SELECT distinct followerID,boardID FROM follows WHERE followerID=" . $_POST['userID'] . "");
				 	while($row2 = mysqli_fetch_array($result2)) {
				 						if($row2['boardID'] == $row['boardID']){
				 		$result3 = mysqli_query($con, "SELECT * FROM boards WHERE boardID=" . $row2['boardID'] . "");
				 	$row3 = mysqli_fetch_array($result3);
					$posterName = $row['username'];
						$result5 = mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row3['userID'] . "");
				$row5 = mysqli_fetch_array($result5);
				$ownerName = $row5['username'];
					$boardName = $row3['boardName'];
		echo "<div style='border-style:solid;border-color:rgb(125,58,0);color:rgb(125,58,0);border-width:1px;width:96%;margin:5px auto;border-radius:5px;overflow:hidden;height:23%;overflow:hidden;background:white;position:relative;'><iframe frameborder='0' src='grabContent.php?postID=" . $row['postID'] . "' scrolling='no' style='width:100%;height:100%'></iframe>
<div onclick='setUpPost(" . $row['boardID'] . ", " . $row['lefter'] . ", " . $row['topper'] . ")' style='cursor:pointer;width:100%;height:80%;position:absolute;top:0px;left:0px'></div>
<div class='postInfo'><span onclick='grabMeBoard(" . $row['meBoardID'] . ",1)' style='cursor:pointer;color:blue'>@" . $posterName . "</span> &#10168; <span onclick='grabMeBoard(" . $row5['meBoardID'] . ",1)' style='cursor:pointer;color:blue'>@" . $ownerName . "</span>'s \"" . $boardName . "\" Storyboard</div>
		</div>";
	}
			}
		}

/*echo "<div style='transform:scale(1,1);overflow:hidden;width:100%;height:20%;background:red'>";
		//<div style='border-width:1px;width:80%;height:15%;border-style:solid;border-color:black;background:white;font-size:12px;padding-left:2px'>@sgrutman978 &#10148; @equartner</div>";
		echo "<div style='overflow:hidden;transform:scale(.33,.33);margin-top:-" . ($row['top']*.33) . "px;margin-left:-" . ($row['left']) . "px'>";
			//echo "<div style='position:absolute;top:-" . ($row['top']*3) . "px;left:-" . ($row['left']*3) . "px'>";
		echo file_get_contents("userInfo/" . $row['username'] . "/boards/" . $row['boardID'] . ".html");
		echo "</div></div>";*/

		?>