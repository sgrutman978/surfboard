<?php 
$url = 'error.php';
if (mysqli_connect_errno($con))
{
header( "Location: $url" );
}
		
$result = mysqli_query($con,"SELECT count(*) AS count FROM users WHERE username='" . $_POST['username'] . "' AND password=PASSWORD('" . $_POST['password'] . "')");
	$url = 'mainpage.php';		
	$row = mysqli_fetch_array($result);	

if ($row['count'] == 1)
{
	$result2 = mysqli_query($con,"SELECT * FROM users WHERE username='" . $_POST['username'] . "' AND password=PASSWORD('" . $_POST['password'] . "')");		
	while($row2 = mysqli_fetch_array($result2))
{
/*if(isset($_POST['check1']))
{
    setcookie("diresu", $row['userID'], time() + 360000000);
setcookie("nekot", $row['token'], time() + 360000000);
header( "Location: $url" );
 }
 else
{
   setcookie("diresu", $row['userID']);
setcookie("nekot", $row['token']);
header( "Location: $url" );
}*/
$array = array('a', 'b', 'c','d', 'e', 'f','g', 'h', 'i','j', 'k', 'l','m', 'n', 'o','p', 'q', 'r','s', 't', 'u','v', 'w', 'x','y', 'z', 'A','B', 'C', 'D','E', 'F', 'G','H', 'I', 'J','K', 'L', 'M','N', 'O', 'P','Q', 'R', 'S','T', 'U', 'V','W', 'X', 'Y','Z', '1', '2','3', '4', '5','6', '7', '8', '9', '0');

$counter = 0;
$end = '';
while($counter < 18){
$stuff = array_rand($array);
$end .= $array[$stuff];
$counter++;
}

mysqli_query($con,"UPDATE users SET token='" . $end . "' WHERE username='" . $_POST['username'] . "' AND password=PASSWORD('" . $_POST['password'] . "')");

if(isset($_POST['check1']))
{

    setcookie("diresu", $row2['userID'], time() + 360000000);
setcookie("nekot", $end, time() + 360000000);
header( "Location: $url" );
$result=4;
 }else{
 setcookie("diresu", $row2['userID']);
setcookie("nekot", $end);
header( "Location: $url" );
$result=4;
}
}
}

if($result!=4){
$url = 'index.php?nope=3';
header( "Location: $url" );
	}
	
mysqli_close($con);

?> 



