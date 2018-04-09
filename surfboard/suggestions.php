<?php
	   include 'zzzzz.php';
	  //MID(text,1," . strlen($_POST['search']) .") AS hellos          $row['hellos']
			 $result = mysqli_query($con,"SELECT * FROM search ORDER BY searches DESC");
			 $counter = 0;
			while($row = mysqli_fetch_array($result)){
			//if($row['hellos'] == $_POST['search']){
			if(substr($row['text'],0,strlen($_POST['search'])) == $_POST['search']){
			echo "<span class='suggestion' onclick='suggClick(\"" . $row['text'] . "\")'>" . $row['text']. "</span></br>";
			$counter++;
			}
			if($counter > 25){
			$result=4;
			}
			}
			
	?>