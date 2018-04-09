<?php
  include 'zzzzz.php';
			 $result=mysqli_query($con,"SELECT count(*) AS count FROM posts WHERE boardID=" . $_POST['boardID'] . "");
  while($row = mysqli_fetch_array($result)) {
    echo $row["count"];
  }
?>