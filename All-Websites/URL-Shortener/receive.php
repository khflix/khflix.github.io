<?php
//Configrations
include("config.php"); 
include("GetDomainURL.php"); 
?>

<!Doctype Html>
<html>
	<head>
		<title>File Share</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<style type="text/css">
			.btn{
				padding: 10px;
				color: #fff;
				background-color: #000;
				width: 120px;
				border: 1px solid #35FFFF;
				cursor: pointer;
			}
.btn:hover {
color:white;
background: #FF3333;
border: 1px solid #35FFFF;
}
			.viewbtn{
				padding: 10px;
				color: #fff;
				background-color: #339ed4;
				width: 110px;
				border: none;
				cursor: pointer;
			}
			.downbtn{
			    padding: 10px;
			    color: white;
			    background-color: #FF3333;
			    width: 110px;
			    border: none;
			    cursor: pointer;
			}
		</style>
	</head>
	<body>
		<center>
			<h1>Receive</h1>
		
			<?php
				$files = scandir("$folder");
		
				for($i = 2; $i < count($files); $i++){
					$path = "$folder/" . $files[$i];
					echo $files[$i] . " ";?>
				<p></p>	
				<a href="<?php echo $path; ?>"><input type="button" class="viewbtn" value="View"></a>

				<a href="<?php echo $path; ?>" download=""><button class="downbtn">Download</button></a>
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
<?php $UrlString = "$GetDomainURL$path";
echo str_replace("receive.php","","$UrlString");
 ?>
</span>
<button class="copy-style" id="copyButton" onclick="myCopyFunction();return alert('ShareLink copied successfully!');"><img src="copy-icon.svg" alt="Copy URL"></button>
</body>
					<br/><br/>
<?php
	}
				if(count($files)<=2){
					echo "No files Uploaded yet!";?><br/><br/><?php
				}
				?>			
			<p></p>
			<a href="index.php"><button class="btn">Cancel</button></a>
		</center>

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
</html>
