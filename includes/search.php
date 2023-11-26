<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search Results...</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- remove 000webhost Banner -->
<script src="/Index_Resources/includes/remove-000webhost-Banner.js"></script>

<style>
/*
* {
  box-sizing: border-box;
}

body {
    color: white;  
   background-color: #333333;
   border: ;
  border-radius: 9px;
  outline: none;
  padding-top: 10%;
  padding-bottom: 10%;
  }
  
  body:hover {
   color: #35FFFF;
   background-color: ;
   border: none;
   border-radius: 9px;
   outline: none;
  }

    div {
  width: 90%;
  height: 95%;
  background: silver;
  border: 2px dotted white;
  overflow-x: hidden;
  overflow-y: scroll;
}

div:hover {
border: 2px solid #35FFFF;
}

h4{
color: white;
}
*/

 a{
 display: none;
}
</style>

<style>
.button01 {
  display: inline-black;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  color: black;
  border:1px solid blue;
  background-color: skyblue;
  border-radius: 9px;
  outline: none;
  }
  
.button01:hover{
border: 2px solid purple;
color: white;
}

  .div {
  margin: 6%;
  padding: 0%;
  box-sizing: border-box;
  }
  
  /* Set height of body and the document to 100% */
  body, html {
  height: 100%;
  width: 100%
  margin: 0%;
  font-family: Arial;
  }

div.search input[type=text] {
/*
  padding: 7px;
  font-size: 17px;
  float: left;
  background: white;
  outline: none;
  text-align:center;
*/
   width: 70%;
  border: 1px solid silver;
}


div.search input[type=text]:hover {
/*
  padding: 7px;
  font-size: 17px; 
   float: left; 
*/
border: 1px solid #333333;
  width: 70%;
  background: #f1f1f1;
  color:#333333;
  text-align:left;
}

div.search {
border: 1px solid silver;
}

@media screen and (min-width: 300px) {
div.search {
border: 1px solid silver;
width: 68%;
}
}

div.search:hover {
border: none;
}

h4 {
color: silver;
}
  </style>

</head>
<body>
<center>

<div class="search">
<form action="search.php" method="get">
<input name="formname" id="fname" value="<?php echo $_GET['formname'];?>" placeholder="Search More..."
type="text"> 
<input name="submit" type="submit" value="Search">
</form>
</div>


<h4>Your Search Results...</h4>
<div>


<?php
$dir = '../All-Websites/'; 
$exclude = array('.','..','.htaccess','.INDEXER.php','.Zip-Files-Installer.php'); 
$q = (isset($_GET['formname']))? strtolower($_GET['formname']) : ''; 
$res = opendir($dir); 
while(false!== ($file = readdir($res))) { 
if(strpos(strtolower($file),$q)!== false &&!in_array($file,$exclude)) { 

echo "

<!-- Name -->
<h2 class='name'>$file</h2>
<br/>

<!-- Link -->
<form action='$dir$file' method='get'' target='_parent'>
<button class='button01' type='submit' onclick='myFunction()' type='button'>Run App Online Free
</button>
</form>
"; 

echo "<br>"; 
}

}
closedir($res); 
?>

</div>
</center>



</body>
</html>