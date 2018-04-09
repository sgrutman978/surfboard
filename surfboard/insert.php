<?php

include 'zzzz.php';

$arr = array();
$arr2 = array();
$arr3 = array();

error_reporting(0);
$result = mysqli_query($con,"SELECT * FROM 1users WHERE userID = " . $_COOKIE["diresu"] . "");
$ttttt = 0;
$stringE = " " . $_GET['post'] . " ";
$array = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
$array2 = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
$stringA = urldecode($stringE);
$numb = substr_count($stringA, "#");
$stringEnd = "";
for($ii = 0; $ii < $numb; $ii++)
{

//temp1 = after
$temp1 = strstr($stringA, "#");
//temp2 = before
$temp2 .= strstr($stringA, "#", true);

//is the first char a letter?
$bool = false;
for($rtrt = 1; $rtrt < 63; $rtrt++){
if($temp1[1] == $array[$rtrt]){
$bool = true;
}
}

$temp5 = strstr($temp1, ' ', true);
$stopper = ' ';
$trash = '';
if($temp2[strlen($temp2) - 1] == " " && $bool == true){
for($opop = 1; $opop < strlen($temp5); $opop++){
$tester = 1;
for($rtrt = 1; $rtrt < 63; $rtrt++){
if($temp5[$opop] == $array[$rtrt]){
$tester = 0;
}
if($tester == 1 && $rtrt == 62){
$stopper = $temp5[$opop];
$opop = strlen($temp5) + 100;
}
}
}

$temp5 = strstr($temp1, $stopper, true);
//check if there is a letter in it
$tester = 1;
$bool2 = false;
for($opop = 1; $opop < strlen($temp5); $opop++){
for($rtrt = 1; $rtrt < 63; $rtrt++){
if($temp5[$opop] == $array2[$rtrt]){
$tester = 0;
}
}
}
if($tester == 0){
$bool2 = true;
}
if($stopper == '#'){
$stopper = ' '; 
}
}

$stringEnd .= strstr($stringA, "#", true); 
$stringA = strstr($temp1, $stopper);

if($temp2[strlen($temp2) - 1] != " " || $bool == false || $bool2 == false){
$stringEnd .= strstr($temp1, ' ', true);
}

if($temp2[strlen($temp2) - 1] == " " && $bool == true && $bool2 == true){
$hashtag = "<div class=\'hashtag links\' onclick=\'jkjk(\"" . substr((strstr($temp1, $stopper, true)), 1) . "\")\'><a href=\'http://www.stevengrutman.com/shani\' style=\'text-decoration:none\'>" . strstr($temp1, $stopper, true) . "</a></div>";
$temp4 = strstr($temp1, ' ', true);
$arr[$ttttt] = $temp4; 
$ttttt++;
$stringEnd .= $hashtag;
}	
}

$stringEnd .= $stringA;

////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////

$stringA = urldecode($stringEnd);
$numb = substr_count($stringA, "^");
$stringEnd = "";
for($ii = 0; $ii < $numb; $ii++)
{


$temp1 = strstr($stringA, "^");
$temp2 .= strstr($stringA, "^", true);

$bool = false;
for($rtrt = 1; $rtrt < 63; $rtrt++){
if($temp1[1] == $array[$rtrt]){
$bool = true;
}
}

$temp5 = strstr($temp1, ' ', true);
$stopper = ' ';
$trash = '';
if($temp2[strlen($temp2) - 1] == " " && $bool == true){
for($opop = 1; $opop < strlen($temp5); $opop++){
$tester = 1;
for($rtrt = 1; $rtrt < 63; $rtrt++){
if($temp5[$opop] == $array[$rtrt]){
$tester = 0;
//$trash = strstr($temp5, $stopper)
}
if($tester == 1 && $rtrt == 62){
$stopper = $temp5[$opop];
$opop = strlen($temp5) + 100;
}
}
}

$temp5 = strstr($temp1, $stopper, true);
$tester = 1;
$bool2 = false;
for($opop = 1; $opop < strlen($temp5); $opop++){
for($rtrt = 1; $rtrt < 63; $rtrt++){
if($temp5[$opop] == $array2[$rtrt]){
$tester = 0;
}
}
}
if($tester == 0){
$bool2 = true;
}
if($stopper == '^'){
$stopper = ' '; 
}
}

$stringEnd .= strstr($stringA, "^", true); 
$stringA = strstr($temp1, $stopper);

if($temp2[strlen($temp2) - 1] != " " || $bool == false || $bool2 == false){
$stringEnd .= strstr($temp1, ' ', true);
}

if($temp2[strlen($temp2) - 1] == " " && $bool == true && $bool2 == true){

/*for($oo = 1; ){
if(){
$temp[$oo]
}
}*/
$exists2 = false;
$result12 = mysqli_query($con,"SELECT * FROM 1tents");
while($row12 = mysqli_fetch_array($result12)){
if(strtolower(substr((strstr($temp1, $stopper, true)), 1)) == $row12['tentname']){
$exists2 = true;
}
}

if($exists2 == true){
$hashtag = "<div class=\'hashtag links\' onclick=\'jkjk2(\"" . strtolower(substr((strstr($temp1, $stopper, true)), 1)) . "\")\'>" . strstr($temp1, $stopper, true) . "</div>";
$temp4 = strstr($temp1, ' ', true);
$arr2[$ii] = $temp4; 
$stringEnd .= $hashtag;
}else{
$stringEnd .= "^" . substr((strstr($temp1, $stopper, true)), 1);
}

}	
}
$stringEnd .= $stringA;

////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////

$stringA = urldecode($stringEnd);
$numb = substr_count($stringA, "@");
$stringEnd = "";
for($ii = 0; $ii < $numb; $ii++)
{


$temp1 = strstr($stringA, "@");
$temp2 .= strstr($stringA, "@", true);

$bool = false;
for($rtrt = 1; $rtrt < 63; $rtrt++){
if($temp1[1] == $array[$rtrt]){
$bool = true;
}
}

$temp5 = strstr($temp1, ' ', true);
$stopper = ' ';
$trash = '';
if($temp2[strlen($temp2) - 1] == " " && $bool == true){
for($opop = 1; $opop < strlen($temp5); $opop++){
$tester = 1;
for($rtrt = 1; $rtrt < 63; $rtrt++){
if($temp5[$opop] == $array[$rtrt]){
$tester = 0;
//$trash = strstr($temp5, $stopper)
}
if($tester == 1 && $rtrt == 62){
$stopper = $temp5[$opop];
$opop = strlen($temp5) + 100;
}
}
}

$temp5 = strstr($temp1, $stopper, true);
$tester = 1;
$bool2 = false;
for($opop = 1; $opop < strlen($temp5); $opop++){
for($rtrt = 1; $rtrt < 63; $rtrt++){
if($temp5[$opop] == $array2[$rtrt]){
$tester = 0;
}
}
}
if($tester == 0){
$bool2 = true;
}
if($stopper == '@'){
$stopper = ' '; 
}
}

$stringEnd .= strstr($stringA, "@", true); 
$stringA = strstr($temp1, $stopper);

if($temp2[strlen($temp2) - 1] != " " || $bool == false || $bool2 == false){
$stringEnd .= strstr($temp1, ' ', true);
}

if($temp2[strlen($temp2) - 1] == " " && $bool == true && $bool2 == true){

/*for($oo = 1; ){
if(){
$temp[$oo]
}
}*/

$exists = false;
$result11 = mysqli_query($con,"SELECT * FROM 1users");
while($row11 = mysqli_fetch_array($result11)){
if(strtolower(substr((strstr($temp1, $stopper, true)), 1)) == $row11['username']){
$exists = true;
}
}

if($exists == true){
$hashtag = "<div class=\'hashtag links\' onclick=\'jkjk3(\"" . strtolower(substr((strstr($temp1, $stopper, true)), 1)) . "\")\'>" . strstr($temp1, $stopper, true) . "</div>";
$temp4 = strstr($temp1, ' ', true);
$arr3[$ii] = $temp4; 
$stringEnd .= $hashtag;
}else{
$stringEnd .= "@" . substr((strstr($temp1, $stopper, true)), 1);
}

}	
}
$stringEnd .= $stringA;

////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////

//mysqli_query($con, "UPDATE worldposts1 SET spot = spot%2 +1 WHERE 1");

while($row = mysqli_fetch_array($result)){

mysqli_query($con,"INSERT INTO 1posts (post, author, dateTime, userID) VALUES ('" . $stringEnd . "', '" . $row['username'] . "', NOW(), " . $_COOKIE["diresu"] . ")");
$result3 = mysqli_query($con,"SELECT * FROM 1users WHERE userID = " . $_COOKIE['diresu']);
while($row3 = mysqli_fetch_array($result3)){
$result6 = mysqli_query($con,"SELECT * FROM 1posts WHERE post = '" . $stringEnd . "' AND userID = " . $_COOKIE['diresu'] . " LIMIT 1");
$row6 = mysqli_fetch_array($result6);
mysqli_query($con,"INSERT INTO 2" . $row3['username'] . " (post, author, dateTime, userID, type, postID) VALUES ('" . $stringEnd . "', '" . $row['username'] . "', NOW(), " . $_COOKIE["diresu"] . ", 5, " . $row6['postID'] . ")");
}
}

$result9 = mysqli_query($con,"SELECT * FROM 1users WHERE userID = " . $_COOKIE['diresu']);
		$row9 = mysqli_fetch_array($result9);

for($rrrr = 0; $rrrr < count($arr); $rrrr++){
echo "" . $arr . "";
mysqli_query($con,"CREATE TABLE 3" . substr($arr[$rrrr], 1) . "(post text, userID INT, author text)");
mysqli_query($con,"INSERT INTO 3" . substr($arr[$rrrr], 1) . " (post, userID, author) VALUES ('" . $stringEnd . "', " . $_COOKIE['diresu'] . ", '" . $row9['username'] . "')");
mysqli_query($con,"INSERT INTO 1hashtags (hashtag) VALUES ('" . substr($arr[$rrrr], 1) . "')");

}

var_dump($arr);

$result2 = mysqli_query($con,"SELECT * FROM 1posts WHERE userID = " . $_COOKIE["diresu"] . " AND post = '" . $stringEnd . "' ORDER BY postID DESC");

while($row = mysqli_fetch_array($result2)){

echo $row['postID'];
$result2 = 1;

}

?>