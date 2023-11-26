<?php session_start(); 

// Turn off all error reporting
error_reporting(0);

include_once('includes/config.php');
// Code for login 
if(isset($_POST['login']))
{
$password=$_POST['password'];
$dec_password=$password;
$useremail=$_POST['uemail'];
$ret= mysqli_query($con,"SELECT id,fname FROM users WHERE email='$useremail' and password='$dec_password'");
$num=mysqli_fetch_array($ret);
if($num)
{

$_SESSION['id']=$num['id'];
$_SESSION['name']=$num['fname'];

// if remember me clicked . Values will be stored in $_COOKIE  array
			if(!empty($_POST["remember"])) {
//COOKIES for username
setcookie ("user_email",$_POST["uemail"],time()+ (10 * 365 * 24 * 60 * 60));
//COOKIES for password
setcookie ("user_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));

} else {
if(isset($_COOKIE["user_email"])) {
setcookie ("user_email","");
if(isset($_COOKIE["user_password"])) {
setcookie ("user_password","");
				}
			}
}	
echo "<script type='text/javascript'> document.location = 'welcome.php'; </script>";

} else
{
echo "<script>alert('Invalid username or password');</script>";
}

}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Login</title>

 <!-- remove 000webhost Banner --> <link href="/includes/remove-000webhost-Banner.css" rel="stylesheet">

        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">

<div class="card-header">
<h2 align="center"></h2>
<hr />
    <h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        
                                        <form method="post">
                                            
<div class="form-floating mb-3">
<input class="form-control" name="uemail" type="email" placeholder="name@example.com" value="<?php if(isset($_COOKIE["user_email"])) { echo $_COOKIE["user_email"]; } ?>" required/>
<label for="inputEmail">Email address</label>
</div>
                                            

<div class="form-floating mb-3">
<input class="form-control" name="password" type="password" placeholder="Password" value="<?php if(isset($_COOKIE["user_password"])) { echo $_COOKIE["user_password"]; } ?>" required />
<label for="inputPassword">Password</label>
</div>

<div class="form-floating mb-3">
		<div><input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["user_email"])) { ?> checked <?php } ?> />
		<label for="remember-me">Remember me</label>
	</div>

<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
<a class="small" href="password-recovery.php">Forgot Password?</a>
<button class="btn btn-primary" name="login" type="submit">Login</button>
</div>
</form>
</div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="signup.php">Need an account? Sign up!</a></div>
                                          <div class="small"><a href="index.php">Back to Home</a></div>
                                    </div>
                                </div>
	                            </div>
                        </div>
                    </div>
                </main>
            </div>
<?php include('includes/footer.php');?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
