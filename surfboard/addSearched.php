<?php
  include 'zzzzz.php';
  	  $reason = 0;
 $result = mysqli_query($con,"SELECT * FROM search WHERE text='" . $_POST['search'] . "'");
 while($row = mysqli_fetch_array($result)){
			if($row['text'] == $_POST['search']){
			$reason = 4;
			}
			}
			if($reason==0){
			mysqli_query($con,"INSERT INTO search (text, searches) VALUES ('" . $_POST['search'] . "', 1)");
			}else{
			 mysqli_query($con,"UPDATE search SET searches=searches+1 WHERE text='" . $_POST['search'] . "'");
			}
echo $_POST['search'];
	?>