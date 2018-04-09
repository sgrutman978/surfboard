<?php
for ($x = 1; $x <= 4000; $x++) { 
 	if ($x%2==0) {
		$color ="green";
    echo "<div style=width:80px;height:5%;background-color:".$color.";color:orange'><b>Go O's".$x."</b></div></br>";
}else{     
	$color="blue";
  echo "<div style=width:80px;height:5%;background-color:".$color.";color:orange'><b>Go O's".$x."</b></div></br>";

}
 }    

for ($x = 1; $x <= 1000000; $x++) { 
if ($x%7==0 && $x%4==0) { 
	echo $x."</br>";
}
}
?>
     