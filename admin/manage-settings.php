<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
//header('location:logout.php');
echo "<script type='text/javascript'> document.location = 'logout.php'; </script>";

} else{

// raw id
$rawid = "67";

//Code for add data 
if(isset($_POST['Save']))
{

    $ads = $_POST['ads'];
    $popupads = $_POST['popupads'];
    $vastads = $_POST['vastads'];
        
//Code to create new raw
//$sql_2=mysqli_query($con,"insert into ads_list(ads,popupads,vastads) values('$ads','$popupads','$vastads')");

//Code to update existing raw data
$sql_2=mysqli_query($con,"update ads_list set ads='$ads',popupads='$popupads',vastads='$vastads' where id='$rawid'");

if($sql_2)
{

 //  echo "<script>alert('Data saved successfully!');</script>";
//       echo "<script type='text/javascript'> document.location = './manage-settings.php'; </script>";
}
}


$userid = "67";
$query=mysqli_query($con,"select * from ads_list where id='$userid'");
$result=mysqli_fetch_array($query);

/*
if(isset($_POST['Save']))
{
function replace_string_in_file($filename, $string_to_replace , $replace_with){
    $content=file_get_contents($filename);
    $content_chunks=explode($string_to_replace, $content);
    $content=implode($replace_with, $content_chunks);
    file_put_contents($filename, $content);
}

if($result['vastads'] !== $vastads){
// update vastads in config.json
$filename = "../config.json";
$string_to_replace = $result['vastads'];
$replace_with = "$vastads";

replace_string_in_file($filename, $string_to_replace, $replace_with);

}
}
*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Manage-Settings</title>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="../css/styles.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

<style>
/*  toggle switch  */
.switch {
position: relative;
display: inline-block;
width: 50px;
height: 20px;
}

.switch input {display:none;}

.slider {
position: absolute;
cursor: pointer;
top: 0;
left: 0;
right: 0;
bottom: 0;
background-color: #ccc;
-webkit-transition: .4s;
transition: .4s;
border-radius: 6px;
}

.slider:before {
position: absolute;
content: "";
height:18px;
width:15px;
top: 1px;
left: 1px;
right: 1px;
bottom: 1px;
background-color: white;
transition: 0.5s;
border-radius: 6px;
}

input:checked + .slider {
background-color: #2196F3;
}

input:focus + .slider {
box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
-webkit-transform: translateX(10px);
-ms-transform: translateX(10px);
transform: translateX(33px);
}

.slider:after {
content:'OFF';
color: white;
display: block;
position: absolute;
transform: translate(-50%,-50%);
top: 50%;
left: 50%;
font-size: 9px;
font-family: Verdana, sans-serif;
}
input:checked + .slider:after {
content:'ON';
}
</style>
<style>
.code1 {
  padding: 5px;
  display: flex;
  align-items: center;
  justify-content: center;
 /* font-size: 10vw; */
  background: #E8C90F;
  color:white;
  display:inline-block;
  border-radius: 2px;
}
.code2 {
  padding: 5px;
  
  display: flex;
  align-items: center;
  justify-content: center;
  /* font-size: 10vw; */
  background: #3BCCBD;
  color:white;
  display:inline-block;
  border-radius: 2px;
}

.code3 {
  padding: 5px;
  
  display: flex;
  align-items: center;
  justify-content: center;
  /* font-size: 10vw; */
  background: #52CAEC;
  color:white;
  display:inline-block;
  border-radius: 2px;
}

.code4 {
  padding: 5px;
  
  display: flex;
  align-items: center;
  justify-content: center;
  /* font-size: 10vw; */
  background: #75CB4C;
  color:white;
  display:inline-block;
  border-radius: 2px;
}

.code5 {
  padding: 5px;
  
  display: flex;
  align-items: center;
  justify-content: center;
  /* font-size: 10vw; */
  background: #FF6B5D;
  color:white;
  display:inline-block;
  border-radius: 2px;
}
</style>

</head>
<body class="sb-nav-fixed">
<?php include_once('includes/navbar.php');?>
<div id="layoutSidenav">
<?php include_once('includes/sidebar.php');?>
<div id="layoutSidenav_content">
<main>


<!-- start_1 -->
<div class="container-fluid px-4">

<h2 class="mt-4">Ads List</h2>
<div class="card mb-4">

<?php
                       if(isset($_POST['Save']))
                       {
                       ?>
                       <!-- Alert Start -->
                       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
                       <div class="alert alert-success" id="alertDiv" role="alert" style="fontSize: 20; display:none; width:200px;">
                       <button onclick="document.getElementById('alertDiv').style.opacity = '0'" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <strong>Data saved </strong>successfully!
                       </div>
                       <style>
                       #alertDiv {
                       transition: opacity 1s;
                       position: absolute; /*or fixed*/
                       right: 0px;
                       }
                       </style>
                       <script>
                       
                       //alert('copied');
                       const target = document.getElementById("alertDiv");
                       target.style.opacity = '1';
                       target.style.display = 'block';
                       setInterval(() => target.style.opacity = '0', 3000);      
                       setInterval(() => target.style.display = 'none', 5000);                                           
                       </script>
                       <!-- Alert End -->
                       <?php } ?>

<form method="post" >
<div class="card-body">
<table class="table table-bordered">
<tr>
<th>Ads</th>
<td>
<label class="switch">

<?php 
$adstate = $result['ads'];
if($adstate == 'ON'){
$adcheck = 'checked';
}
if($adstate == 'OFF'){
$adcheck = '';
}
?>

<input type="checkbox" id="checkbox1" <?php echo $adcheck; ?> /> 
<div class="slider"></div>
</label>
<input class="form-control" id="textbox1" name="ads" type="text" value="" style="display:none; text-align:center;" size="1" readonly/> 
<br>

</td>
<script>	
//checkbox1
$(document).ready(function() { 
// Set initial state 
$('#textbox1').val('<?php echo $result['ads'];?>'); 
// Returns yes or no in textbox1 
// when checked and unchecked 
$('#checkbox1').click(function() { 
if ($("#checkbox1").is(":checked") == true) { 
$('#textbox1').val('ON'); 
} else { 
$('#textbox1').val('OFF'); 
} 
}); 
});
</script>	
</tr>
<tr>
<th>Popup Ads Code</th>
<td>
<textarea class="form-control" id="popupads" name="popupads" rows="3"><?php echo $result['popupads'];?></textarea>
</td>
</tr>
<tr>
<th>Vast Ads Code</th>
<td>
<textarea class="form-control" id="vastads" name="vastads" rows="3" required><?php echo $result['vastads'];?></textarea>
</td>
</tr>

<tr>
<td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="Save">Submit</button></td>

</tr>
</tbody>
</table>
</div>
</form>
</div>
</div>
<!-- end_1 -->


<?php

// add new domain
if(isset($_POST['Save2']))
{
$domain = $_POST['domain'];

$sql_3 =mysqli_query($con,"insert into allowed_domains_list(domain) values('$domain')");
if($sql_3)
{
// echo "<script>alert('Domain added');</script>";
}
}

// delete a domain
if(isset($_GET['delete_domain_id']))
{
$domainid=$_GET['delete_domain_id'];
$sql_4=mysqli_query($con,"delete from allowed_domains_list where id='$domainid'");
if($sql_4)
{
// echo "<script>alert('Domain deleted');</script>";
}
}

?>

<!-- start_2 -->
<div class="container-fluid px-4">

<h2 class="mt-4">Allowed Domains</h2>
<div class="card mb-4">

<?php
                       if(isset($_POST['Save2']))
                       {
                       ?>
                       <!-- Alert Start -->
                       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
                       <div class="alert alert-success" id="alertDiv" role="alert" style="fontSize: 20; display:none; width:200px;">
                       <button onclick="document.getElementById('alertDiv').style.opacity = '0'" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <strong>Data saved </strong>successfully!
                       </div>
                       <style>
                       #alertDiv {
                       transition: opacity 1s;
                       position: absolute; /*or fixed*/
                       right: 0px;
                       }
                       </style>
                       <script>
                       
                       //alert('copied');
                       const target = document.getElementById("alertDiv");
                       target.style.opacity = '1';
                       target.style.display = 'block';
                       setInterval(() => target.style.opacity = '0', 3000);      
                       setInterval(() => target.style.display = 'none', 5000);                                           
                       </script>
                       <!-- Alert End -->
                       <?php } ?>

<form method="post">
<div class="card-body">
<table class="table table-bordered">

<tr>
<th>id</th>
<th>Domain</th>
<th>
Reg. Date
</th>
<th>
Action
</th>
</tr>

<?php $ret=mysqli_query($con,"select * from allowed_domains_list ORDER BY posting_date DESC");
                              $cnt=1;
                              while($row=mysqli_fetch_array($ret))
                              {?>
<tr>
<td><?php echo $cnt;?></td>
<td><?php echo $row['domain'];?></td>
<td>
<?php echo $row['posting_date'];?>
</td>
<td>
<a class="code5" href="./manage-settings.php?delete_domain_id=<?php echo $row['id'];?>" onClick="return confirm('Do you really want to delete');">
<i class="fa fa-trash" aria-hidden="true"></i></a>
</td>
</tr>
<?php $cnt=$cnt+1; }?>

<tr>

<tr>
<th colspan="4">
<input type="text" class="form-control" id="domain" name="domain" placeholder="New domain">
</th>
</tr>

<td colspan="4" style="text-align:center ;">
<button type="submit" class="btn btn-primary btn-block" name="Save2">Submit</button>
</td>
</tbody>
</table>
</div>
</form>
</div>
</div>
<!-- end_2 -->


<?php

// add new domain
if(isset($_POST['Save3']))
{
$workers = $_POST['workers'];
$rawid3 = "1";
$sql_3=mysqli_query($con,"update workers_list set workers='$workers' where id='$rawid3'");

if($sql_3)
{
// echo "<script>alert('Data Updated!');</script>";
}
}

$userid3 = "1";
$query3=mysqli_query($con,"select * from workers_list where id='$userid3'");
$result3=mysqli_fetch_array($query3);

?>

<!-- start_3 -->
<div class="container-fluid px-4">

<h2 class="mt-4">Workers List</h2>
<div class="card mb-4">

<?php
                       if(isset($_POST['Save3']))
                       {
                       ?>
                       <!-- Alert Start -->
                       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
                       <div class="alert alert-success" id="alertDiv" role="alert" style="fontSize: 20; display:none; width:200px;">
                       <button onclick="document.getElementById('alertDiv').style.opacity = '0'" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <strong>Data saved </strong>successfully!
                       </div>
                       <style>
                       #alertDiv {
                       transition: opacity 1s;
                       position: absolute; /*or fixed*/
                       right: 0px;
                       }
                       </style>
                       <script>
                       
                       //alert('copied');
                       const target = document.getElementById("alertDiv");
                       target.style.opacity = '1';
                       target.style.display = 'block';
                       setInterval(() => target.style.opacity = '0', 3000);      
                       setInterval(() => target.style.display = 'none', 5000);                                           
                       </script>
                       <!-- Alert End -->
                       <?php } ?>

<form method="post" >
<div class="card-body">
<table class="table table-bordered">

<tr>
<th>Workers</th>
<td>
<textarea class="form-control" id="workers" name="workers" rows="3"><?php echo $result3['workers'];?></textarea>
</td>
</tr>

<tr>
<td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="Save3">Submit</button></td>

</tr>
</tbody>
</table>
</div>
</form>
</div>
</div>
<!-- end_3 -->

<?php

// add new domain
if(isset($_POST['Save4']))
{
$download = $_POST['download'];   
$rawid4 = "1";
//Code to update existing raw data
$sql_4=mysqli_query($con,"update player_controls set download='$download' where id='$rawid4'");

if($sql_4)
{

 //  echo "<script>alert('Data saved successfully!');</script>";
//       echo "<script type='text/javascript'> document.location = './manage-settings.php'; </script>";
}

}

?>

<!-- start_4 -->
<div class="container-fluid px-4">

<h2 class="mt-4">Player Controls</h2>
<div class="card mb-4">

<?php
                       if(isset($_POST['Save4']))
                       {
                       ?>
                       <!-- Alert Start -->
                       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
                       <div class="alert alert-success" id="alertDiv" role="alert" style="fontSize: 20; display:none; width:200px;">
                       <button onclick="document.getElementById('alertDiv').style.opacity = '0'" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <strong>Data saved </strong>successfully!
                       </div>
                       <style>
                       #alertDiv {
                       transition: opacity 1s;
                       position: absolute; /*or fixed*/
                       right: 0px;
                       }
                       </style>
                       <script>
                       
                       //alert('copied');
                       const target = document.getElementById("alertDiv");
                       target.style.opacity = '1';
                       target.style.display = 'block';
                       setInterval(() => target.style.opacity = '0', 3000);      
                       setInterval(() => target.style.display = 'none', 5000);                                           
                       </script>
                       <!-- Alert End -->
                       <?php } ?>

<form method="post" >
<div class="card-body">
<table class="table table-bordered">
<tr>
<th>Download Button</th>
<td>
<label class="switch">

<?php 
$userid4 = "1";
$query4=mysqli_query($con,"select * from player_controls where id='$userid4'");
$result4=mysqli_fetch_array($query4);

$download_state = $result4['download'];
if($download_state == 'ON'){
$download_check = 'checked';
}
if($download_state == 'OFF'){
$download_check = '';
}
?>

<input type="checkbox" id="checkbox4" <?php echo $download_check; ?> /> 
<div class="slider"></div>
</label>
<input class="form-control" id="textbox4" name="download" type="text" value="" style="display:none; text-align:center;" size="1" readonly/> 
<br>

</td>
<script>	
//checkbox1
$(document).ready(function() { 
// Set initial state 
$('#textbox4').val('<?php echo $result4['download'];?>'); 
// Returns yes or no in textbox1 
// when checked and unchecked 
$('#checkbox4').click(function() { 
if ($("#checkbox4").is(":checked") == true) { 
$('#textbox4').val('ON'); 
} else { 
$('#textbox4').val('OFF'); 
} 
}); 
});
</script>	
</tr>

<tr>
<td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="Save4">Submit</button></td>

</tr>
</tbody>
</table>
</div>
</form>
</div>
</div>


<!-- end_4 -->

</main>



<?php
//Update config.json file
$update_config_json = true;

if($update_config_json = true) {
$path = '../config.json';
// JSON data as an array


// vast ads code
$vastCode = $result['vastads'];

// player download button
if($download_state == 'ON'){
$playerDownload = "true";
}
if($download_state == 'OFF'){
$playerDownload = "false";
}
$playerDownload = $playerDownload;

// workers list as temp
$temp =  $result3['workers'];
$arr = explode(",",$temp);
// $result2 = '"' . implode ( '", "', $arr ) . '"';
// echo $arr;
// echo $result2; 


$jsonData = [
    "player" => [
        "aboutlink" => "/",
        "abouttext" => "Powered by dstreampro",
        "advertising" => [
            "admessage" => "The ad will end in xx seconds",
            "adTag" => "$vastCode",
            "client" => "vast",
            "offset" => ["1350", "4050", "50%", "post", "pre"],
        ],
        "allowFullscreen" => true,
        "autostart" => false,
        "captions" => [
            "backgroundOpacity" => 0,
            "color" => "#FFFF00",
            "edgeStyle" => "uniform",
            "fontSize" => 15,
        ],
        "fuckadblock" => false,
        "height" => "100%",
        "logo" => ["file" => "#"],
        "mute" => false,
        "playbackRateControls" => true,
        "playerDownload" => $playerDownload,
        "preload" => "metadata",
        "loop" => true,
        "showAD" => true,
        "tracks" => ["kind" => "captions"],
        "width" => "100%",
    ],
    "workers" => 
$arr
];


// Convert JSON data from an array to a string
$jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);

// Write in the file
$fp = fopen($path, 'w');
fwrite($fp, $jsonString);
fclose($fp);

}
?>


<?php include('../includes/footer.php');?>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="../js/datatables-simple-demo.js"></script>
</body>
</html>
<?php } ?>
