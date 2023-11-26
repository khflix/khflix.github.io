<?php 
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
	<script>
	// redirect to admin login
	location.href = "./admin/";
	</script>
	<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title><?php echo("$website_title");?></title>
        <link rel="icon" type="image/png" href="<?php echo("$logo");?>"/>
        <meta name="description" content="<?php echo("$description");?>">
        <meta name="keywords" content="<?php echo("$keywords");?>
">
        <meta name="author" content="<?php echo("$author");?>">

	<!-- remove 000webhost Banner --> 
	<link href="./includes/remove-000webhost-Banner.css" rel="stylesheet">
	
	<link href="css/styles.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
	<style>
	main{
	padding-left:19%;
	}
	@media only screen and (max-width: 600px) {
	main{
	padding-left:40%;
	}
	}
	</style>
	</head>
	<body>
	<center>
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
	<!-- Navbar Brand-->
	<a class="navbar-brand ps-3" href="./index.php">
	Login or Register
	</a>
	
	<!-- Sidebar Toggle-->
	
	<!-- Navbar Search-->
	
	</nav>
	<div id="layoutSidenav">
	
	<div id="layoutSidenav_content">
	<main>
	<div class="container-fluid px-4">
	<h1 class="mt-4">
	
	</h1>
	<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item"><a href="index.php"></a></li>
	
	</ol>
	
	
	<div class="row" >
	
	
	<div class="col-xl-3 col-md-6">
	<div class="card bg-primary text-white mb-4">
	<div class="card-body">Login</div>
	<div class="card-footer d-flex align-items-center justify-content-between">
	<a class="small text-white stretched-link" href="login.php">Signin Here</a>
	<div class="small text-white"><i class="fas fa-angle-right"></i></div>
	</div>
	</div>
	</div>
	
	
	<div class="col-xl-3 col-md-6" >
	<div class="card bg-success text-white mb-4">
	<div class="card-body">Register</div>
	<div class="card-footer d-flex align-items-center justify-content-between">
	<a class="small text-white stretched-link" href="signup.php">Signup Here</a>
	<div class="small text-white"><i class="fas fa-angle-right"></i></div>
	</div> 
	</div>
	</div>

	
	
	<div class="col-xl-3 col-md-6">
	<div class="card bg-danger text-white mb-4">
	<div class="card-body">Admin</div>
	<div class="card-footer d-flex align-items-center justify-content-between">
	<a class="small text-white stretched-link" href="admin">Login Here</a>
	<div class="small text-white"><i class="fas fa-angle-right"></i></div>
	</div>
	</div>
	</div>
	
	</div>
	
	
	<div style="height: 10vh"></div>
	
	</div>
	</main>
	<?php include_once('includes/footer.php');?>
	</div>
	</div>
	</center>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="js/scripts.js"></script>
	</body>
	</html>
	