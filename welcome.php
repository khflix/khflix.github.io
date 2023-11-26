<?php session_start();

$redirect = false; //true or false
$redirectURL = "https://utapps.000webhostapp.com/index.php";

if($redirect === true) {
echo '<script type="text/javascript">
           window.location = "'.$redirectURL.'"
      </script>';
}

if(!file_exists('./includes/config.php')){
	header('location:installer/install.php');
	die();
}
if(!file_exists('./includes/config-web-info.php')){
header('location:installer/install.php');
die();
}

//Website Details config file
include("./includes/config-web-info.php");
 ?>
<?php 
// Turn off all error reporting
error_reporting(0);
include_once('includes/config.php');
if (strlen($_SESSION['id']==0)) {
//  header('location:logout.php');
echo "<script type='text/javascript'> document.location = 'logout.php'; </script>";

} else{

?>
<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title><?php echo("$title");?></title>
        <link rel="icon" type="image/png" href="<?php echo("$logo");?>"/>
        <meta name="description" content="<?php echo("$description");?>">
        <meta name="keywords" content="<?php echo("$keywords");?>
">
        <meta name="author" content="<?php echo("$author");?>">

<!-- remove 000webhost Banner --> <link href="/includes/remove-000webhost-Banner.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="css/styles.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body class="sb-nav-fixed">
<?php include_once('includes/navbar.php');?>
<div id="layoutSidenav">
<?php include_once('includes/sidebar.php');?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<!-- <h1 class="mt-4">Dashboard</h1> 
<hr /> -->

<ol class="breadcrumb mb-4">
<!--     <li class="breadcrumb-item active">Dashboard</li> -->
</ol>


<?php 
$userid=$_SESSION['id'];
$query=mysqli_query($con,"select * from users where id='$userid'");
while($result=mysqli_fetch_array($query))
{?>                        
<div class="row" id="box">
<div class="col-xl-5 col-md-6" >
<div class="card bg-primary text-white mb-4">
<div class="card-body">Welcome Back - <?php echo $result['fname'].' '.$result['lname'];?></div>
<div class="card-footer d-flex align-items-center justify-content-between">
    <a class="small text-white stretched-link" href="profile.php">View Profile</a>
    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
</div>
</div>
</div>
</div>
<!-- <hr/> -->
<?php } ?>
<script>
setTimeout(() => {
const box = document.getElementById('box');

// 👇️ removes element from DOM
// box.style.display = 'none';
$("#box").toggle("slow");
//$("#box").slideUp();


// 👇️ hides element (still takes up space on page)
// box.style.visibility = 'hidden';
}, 5000); // 👈️ time in milliseconds

</script>

<style>
/* <!--Page Content's style --> */
</style>
<center>
<div class="content">

<!-- Show All Contents from INDEXER (using PHP include/Iframe)-->
<!--
<?php include "" ?>
-->

<style>

.my-iframe {
height:calc(100vh - 4px);
width:calc(75vw - 3px);
box-sizing: border-box;
}

@media screen and (max-width: 600px) {
.my-iframe {
height:calc(100vh - 4px);
width:calc(75vw - 23px);
box-sizing: border-box;
}
}
</style>

<iframe class="my-iframe" src="./All-Websites/.INDEXER.php" height="100%" width="100%" frameborder="0">
</iframe>

</div>
<br/>
</center>

</div>

</div>

</div>
</main>
<br>
<?php include('includes/footer.php');?>
<br/>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>
</html>
<?php } ?>
