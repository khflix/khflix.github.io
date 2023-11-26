<?php
//Configrations
include("config.php"); ?>

<!Doctype Html>
<html>
	<head>
		<title>All Links</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<style type="text/css">
		      .btn{
				padding: 10px;
				color: #fff;
				background-color: #4db6ac;
				width: 120px;
				border: none;
				cursor: pointer;
                                margin-bottom:5px;
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
			<h1>All Links</h1>
		
<button class='btn' onClick="window.location.href=window.location.href">Refresh</button>

<a href="index.php"><button class="btn">Cancel</button></a>
<br></br>
			<?php
				$files = scandir("$folder");
		
				for($i = 2; $i < count($files); $i++){
					$path = "$folder/" . $files[$i];
?>

<?php
$FileName_Is = $files[$i] . "";
$hideFile = "index.php";
	if("$FileName_Is" == "$hideFile")
	{
		$display = "none";
	} else {
		$display = "block";
	}
?>

<div style="display:<?php echo"$display";?>;">
<?php
					$URL = "$Final_Website_URL" .$files[$i] . "";
$UrlString = "$URL";
echo $short_link = str_replace(".txt","","$UrlString");?>
				<p></p>	
				<a href="<?php echo $short_link; ?>"><input type="button" class="viewbtn" value="Open"></a>

				<a href="<?php echo $path; ?>" ><button class="downbtn">View</button></a>
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
<button class="copy-style" id="copyButton" onclick="myCopyFunction();return alert('ShareLink copied successfully!');"><img src="copy-icon.svg" alt="Copy URL"></button>
</body>
<br/><br/>
</div>

<?php
	}
?>
				<?php
  $dirPath = "$folder"; // dir path assign here
  echo (count(glob("$dirPath/*")) === 1) ? 'No Links found!' : '';
?>			
			<p></p>
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
