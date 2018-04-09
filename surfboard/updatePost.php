<?php
	   include 'zzzzz.php';
			
	  $jason = json_decode(json_encode($_REQUEST['jason']), true);
	  for ($i=0; $i < count($jason); $i++) {
	  	mysqli_query($con,"UPDATE posts SET lefter=".$jason[$i]["left"].", topper=".$jason[$i]["top"]." WHERE content='".$jason[$i]["content"]."' AND boardID=".$_REQUEST['boardID']);
	  }
	  echo "Updated";
	?>