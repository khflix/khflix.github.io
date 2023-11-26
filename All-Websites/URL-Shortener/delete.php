<?php
//Configrations
include("config.php"); ?>

<!Doctype html>
<html>
	<head>
		<title>Delete Links</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
<style type="text/css">
			.delbtn{
				padding: 5px;
				color: #fff;
				background-color: red;
				width: 80px;
				border: none;
				cursor: pointer;
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
	</style>

<head>
<body>
<center>
<h1>Delete Links</h1>

<button class='btn' onClick="window.location.href=window.location.href">Refresh</button>

<a href="index.php"><button class="btn">Cancel</button></a>

<br><br>
<?php
	$files = scandir("$folder");
	
	for($i = 2; $i < count($files); $i++){
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
echo $short_link = str_replace(".txt","","$UrlString");?><br><br><form action="?" method="POST"><button name="delete" class="delbtn" value="<?php echo $files[$i]; ?>">Delete</button></form><br/><br/>
</div>

<?php
	}
	if(isset($_POST['delete'])){
		$path = "$folder/" . $_POST['delete'];
		unlink($path);
echo "<script type='text/javascript'>alert('File successfully Deleted!');</script>";
echo "<script type='text/javascript'> document.location = 'delete.php'; </script>";
} 
else if(isset($_POST['delete'])){
  echo "<script type='text/javascript'>alert('Failed to delete or File does not exist!');</script>";
echo "<script type='text/javascript'> document.location = 'delete.php'; </script>";
	}
?>
<?php
  $dirPath = "$folder"; // dir path assign here
  echo (count(glob("$dirPath/*")) === 1) ? 'No Links found!' : '';
?>
				


</center>
</body>
</html>