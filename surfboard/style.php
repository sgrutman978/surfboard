<?php 
header("Content-type:text/css; UTF-8"); 

$headerColor = "rgb(255, 135,64)";
$asideColor = "rgb(29,140,0)";   //rgb(69,115,175)    rgb(34,227,124)    rgb(29,140,0)
$dragDropColor = "rgb(69,115,175)";
?>

@import url(http://weloveiconfonts.com/api/?family=fontawesome);
@import url(http://weloveiconfonts.com/api/?family=entypo);

/* fontawesome */
[class*="fontawesome-"]:before {
  font-family: 'FontAwesome', sans-serif;
}

/* entypo */
[class*="entypo-"]:before {
  font-family: 'Entypo', sans-serif;
}

html, body {
  margin:0px;
  height:100%;
  width:100%;
  padding:0px;
  font-family: 'Montserrat', sans-serif;
}

body {
  overflow:hidden;
  -webkit-touch-callout: none;
-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
}

.newOrange {
  background: #ffb76b; /* Old browsers */
  background: -moz-linear-gradient(top, #ffb76b 0%, #ffa73d 13%, #ff7c00 84%, #ff7f04 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffb76b), color-stop(13%,#ffa73d), color-stop(84%,#ff7c00), color-stop(100%,#ff7f04)); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top, #ffb76b 0%,#ffa73d 13%,#ff7c00 84%,#ff7f04 100%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(top, #ffb76b 0%,#ffa73d 13%,#ff7c00 84%,#ff7f04 100%); /* Opera 11.10+ */
  background: -ms-linear-gradient(top, #ffb76b 0%,#ffa73d 13%,#ff7c00 84%,#ff7f04 100%); /* IE10+ */
  background: linear-gradient(to bottom, #ffb76b 0%,#ffa73d 13%,#ff7c00 84%,#ff7f04 100%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffb76b', endColorstr='#ff7f04',GradientType=0 ); /* IE6-9 */
}
.newBlue {
  background: #ff7f04; /* Old browsers */
  background: -moz-linear-gradient(left, #ff7f04 0%, #0e09b7 30%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, right top, color-stop(0%,#ff7f04), color-stop(30%,#0e09b7)); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(left, #ff7f04 0%,#0e09b7 30%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(left, #ff7f04 0%,#0e09b7 30%); /* Opera 11.10+ */
  background: -ms-linear-gradient(left, #ff7f04 0%,#0e09b7 30%); /* IE10+ */
  background: linear-gradient(to right, #ff7f04 0%,#0e09b7 30%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff7f04', endColorstr='#0e09b7',GradientType=1 ); /* IE6-9 */
}
.beach {
  background:rgb(250,190,109);
}
.lightSand {
  background:rgba(240,180,100,.35);
}
aside {
border-style:solid;
border-color:grey;
border-width:0px;
border-left-width:1px;
  width:20%;
  position:fixed;
  top:41px;
  right:-20%;
  height:94%;
  bottom:0px;
 background:rgb(250,190,109);
   overflow-y:auto;
  z-index:999;
   color:rgb(250,190,109);
  font-size:30px;
  text-align:center;
}
.green {
 color:<?= $asideColor ?>;
}

.blue {
color:<?= $dragDropColor ?>;
}

header {
color:rgb(69,115,175);
  width:100%;
  position:fixed;
  left:0px;
  top:0px;
  height:40px;
  font-family:Pacifico;
  border-style:solid;
  border-color:grey;
  border-width:0px;
  border-bottom-width:1px;
  text-align:center;
  font-size:22px;
}
.loadBoard {
color:rgb(250,190,109);
text-decoration:none;
}
#addPost {


 /* margin-right:10px;
margin-top:-1px;
font-size:22px;
float:right;
color:rgb(125,58,0);
cursor:pointer;*/
cursor:pointer;
  margin-left:8px;
  margin-top:-3px;
  font-size:26px;
  color:rgb(125,58,0);
  float:left;
}
#addPost:hover {
color:white;
}

#goToMe {
  cursor:pointer;
  float:left;
  height:100%;
  padding:0px 15px;
  color:white;
  position:absolute;
  left:45px;
  top:1px;
  font-family:Questrial, sans-serif;
  font-size:24px;
  font-weight:bold;
}

#saveButton, #saveButtonEdit, #saveButton4 {
cursor:pointer;
  float:left;
  height:100%;
  margin-top:3px;
  color:#7FFF00;
  display:none;
  font-family:Questrial, sans-serif;
  font-weight:bold;
    margin-left:7px;
}

#saveButton:hover, #saveButtonEdit:hover, #saveButton2:hover, #saveButton3:hover, #saveButton4:hover, #saveButton5:hover {
color:white;
}


#saveButton2, #saveButton3, #saveButton5 {
cursor:pointer;
  float:left;
  height:100%;
  margin-top:3px;
  color:red;
  display:none;
  font-family:Questrial, sans-serif;
  font-weight:bold;
  margin-left:7px;
}

#goToMe:hover {
color:rgb(125,58,0);
}

#showBoards {
 cursor:pointer;
 float:left;
 height:100%;
 padding:0px 15px;
 color:rgb(125,58,0);
 font-size:20px;
}

#logo {
  width:22%;
  right:0px;
  color:<?= $dragDropColor ?>;
  position:absolute;
   font-family:Nova Square;
  text-align:center;
  font-size:27px;
}

#search {
  margin-right:1.5%;
  float:right;
  margin-top:-4px;
  width:18%;
}

#search input[type=text] {
  color:rgb(125,58,0);
  background-color:rgb(245, 250,255);
  outline:0;
  border:none;
  padding:4px;
  border-radius:3px;
  width:100%;
}

#search i {
  position:absolute;
  font-size:15px;
  margin-top:-31px;
  right:1.5%;
}

#sidebar {
  background:white;
  width:94%;
  height:87%;
  top:7.5%;
  left:3%;
  position:absolute;
}
/*iframe css*/

#dropDiv {
  width:100%;
  width:100%;
  overflow:hidden;
  height:94%;
  top:40px;
  left:0px;
  position:absolute;
  border:none;
}
#dragDrop {
color:rgb(125,58,0);
  padding:0px 10px 5px 5px;
  position:fixed;
 top:-500px;
   left:378px;
  display:hidden;
  border-radius:10px;
  background:rgb(250,190,109);
  font-size:24px;
  z-index:9999;
  text-align:center;
}

#boardsList {
 height:344px;
 padding:3px 7px;
  background:rgb(125,58,0);
  color:rgb(125,58,0);
  font-size:18px;
  text-align:center;
  float:right;
   overflow-x:hidden;
  overflow-y:auto;
  min-width:140px;
}

#dropDiv [id*=div] img, #boardView [id*=div] img {
  width:100%;
  height:100%;
  position:absolute;
  top:0px;
  left:0px;
}


.postInfo {
width:100%;
  font-size:12px;
  border-top:1px solid grey;
  border-radius:5px;
  border-top-right-rdaius:1px;
  border-top-left-rdaius:1px;
  text-align:center;
  padding-bottom:2px;
  background:whitesmoke;
  bottom:0px;
  position:absolute;
  color:rgb(125,58,0);
  z-index:99999999999;
}

.button {
  background:rgb(69,115,175);
  padding:3px 6px;
  border-radius:5px;
  font-size:16px;
  color:white !important;
  position:absolute;
  cursor:pointer;
  height:30px;
  line-height:30px;
  display:inline-block;  
}

.button.red {
  background:red;
}
.button.green{
  background:#33CC33;
}
.button.green:hover{
  background:red;
}