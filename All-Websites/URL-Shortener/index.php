<?php
  
    // By Qassim Hassan | wp-time.com
  
    session_start();
 
    $_SESSION['prevent_repeat'] = rand(); // Prevent a repeat of the process
 
?>

<!Doctype html>
<html>
	<head>
		<title>URL Shortener</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://bootswatch.com/darkly/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.2.0/css/mdb.css'><link rel="stylesheet" href="./style.css">


		<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Raleway:400,500);

body {
  background: F44336;
}
* {
  font-family: Raleway;
}
			.btn{
				padding: 10px;
				color: #fff;
				background-color: #4db6ac;
				width: 120px;
				border: none;
				cursor: pointer;
                                margin-bottom:5px;
			}
                     
                     .btn2{
				padding: 6px;                           
				color: #fff;
				background-color: #4db6ac;
				width: 56px;
				border: none;
				cursor: pointer;
                                border-radius:1px;
			}
		
		</style>
	</head>
	<body>

<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">URL Shortener</a>
    </div>
  </div>
</nav>

       <center>
<div class="form-group" style="
                               width: 70%;                              
                               text-align: -webkit-center;
                               ">
<h3>
<form method="post" action="shortener.php"> 
  Enter a long link to sorten:<input type="text" name="my-link" value="">
<br>
  <input class="btn btn-success" type="submit" value="Shorten">
</h3>
</form>
</div>

<?php 
if (isset($_GET["short_link"])) {
$short_link = $_GET['short_link']; // short link
			echo "<br><h5>Your Short Link Is: <a href='$short_link' target='_blank'>$short_link</a></h5>";
?>


<body>
<style>
.copy-style {
padding: 0px;
border: 1px solid #35FFFF;
text-align: center;
cursor: pointer;
}
.copy-style:hover {
border: 2px solid #FF3333;
}
.copy-style:active {
color: #333333;
border: 3px solid green;
opacity: 0.5;
}
</style>

<span class=mono id="theList" style="display: none ;">
<?php echo "$short_link"; ?>
</span>
<button class="copy-style" id="copyButton" onclick="myCopyFunction();return alert('ShareLink copied successfully!');"><img src="copy-icon.svg" alt="Copy URL">Copy Link</button>
<br>
<script>
function myCopyFunction() {
  var myText = document.createElement("textarea")
  myText.value = document.getElementById("theList").innerHTML;
  myText.value = myText.value.replace(/&lt;/g,"<");
  myText.value = myText.value.replace(/&gt;/g,">");
  document.body.appendChild(myText)
  myText.focus();
  myText.select();
  document.execCommand('copy');
  document.body.removeChild(myText);
}
</script>
</body>


<?php
		}

if (isset($_GET["error"])) {
                       $error = $_GET['error'];
			echo "<h6 style='color:red;'>$error</h6>";
		}

?>

<br/>	

<button class='btn' onClick="window.location.href=window.location.href">Refresh</button>
<button class='btn' OnClick="window.location.href='index.php';">Cancel</button>
<br>		

<a href="all-links.php"><input type="button" class='btn' value="View All" /></a>
<a href="delete.php"><input type="button" class='btn' value="Delete" /></a>

</center>
	</body>
</html>
