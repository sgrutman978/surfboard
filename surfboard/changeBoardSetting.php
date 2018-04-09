<?php
  include 'zzzzz.php';
			if($_POST['setting'] == "Friends" && $_POST['type'] != 3){
				$setting = 0;
			}
			if($_POST['setting'] == "Everyone" && $_POST['type'] != 3){
				$setting = 1;
			}
			if($_POST['setting'] == "Just Me" && $_POST['type'] != 3){
				$setting = 2;
			}
			if($_POST['type'] == 0){
				$type = "edit";
			}
			if($_POST['type'] == 1){
				$type = "see";
			}
			if($_POST['type'] == 2){
				$type = "favorite";
			}
			if($_POST['type'] == 3){
				mysqli_query($con,"UPDATE boards SET boardName='" . $_POST['setting'] . "' WHERE boardID=" . $_POST['boardID'] . "");
			}else{
				if($_POST['type'] == 4){
					mysqli_query($con,"DELETE FROM follows WHERE boardID=" . $_POST['boardID'] . "");
					mysqli_query($con,"DELETE FROM posts WHERE boardID=" . $_POST['boardID'] . "");
					$result10= mysqli_query($con,"SELECT * FROM boards WHERE boardID=" . $_POST['boardID'] . "");
					$row10 = mysqli_fetch_array($result10);
					$result11= mysqli_query($con,"SELECT * FROM users WHERE userID=" . $row10['userID'] . "");
					$row11 = mysqli_fetch_array($result11);
						mysqli_query($con,"DELETE FROM boards WHERE boardID=" . $_POST['boardID'] . "");
						unlink("userInfo/" . $row11['username'] . "/boards/" . $_POST['boardID'] . ".html");
				}else{
			mysqli_query($con,"UPDATE boards SET " . $type . "=" . $setting . " WHERE boardID=" . $_POST['boardID'] . "");
		}
		}
			 	?>