<?php
	if (isset($_COOKIE['diresu']) && isset($_COOKIE['nekot'])) {
		$result1432 = mysqli_query($con,"SELECT token FROM users WHERE userID=" . $_COOKIE['diresu'] . "");
$row1432 = mysqli_fetch_array($result1432);
if($_COOKIE['nekot'] != $row1432['token']){
mysqli_close($con);
}
}else{
	mysqli_close($con);
}
?>