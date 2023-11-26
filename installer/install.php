<?php
//Configrations
$DBconfig_File ="../includes/config.php";
$WEBconfig_File = "../includes/config-web-info.php";
$checkFiles = "true";
?>


<?php
if($checkFiles == "true"){

if(file_exists("$DBconfig_File")){
echo("<p class='checkFiles'>db config = true</p>");
$config = "true";
}else{
echo("<p class='checkFiles'>db config = false</p>");
}

if(file_exists("$WEBconfig_File")){
echo("<p class='checkFiles'>web config = true</p>");
$web_config = "true";
}else{
echo("<p class='checkFiles'>web config = false</p>");
}

if(!empty($config) and !empty($web_config)){
  echo("<p class='checkFiles'>Website db installed successfully!</p>");
echo("<style>.checkFiles{display:block;}</style>");
echo("<a href='../' class='link_button'>Open Website</a>");
echo("<style>
.link_button {
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    border: solid 1px #20538D;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    background: #4479BA;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none;
}
</style>");
die();
}else{
echo("<p class='checkFiles'>Website not installed yet!</p>");
echo("<style>.checkFiles{display:none;}</style>");
}
}


// Turn off all error reporting
error_reporting(0);

//Website database config file
include("$DBconfig_File");
$hostname="$host";

//Website Details config file
include("$WEBconfig_File");

$msg="";
$host="";

$dbuname="";
$dbpwd="";
$dbname="";

if(isset($_POST['submit'])){
	$host=$_POST['host'];
	$dbuname=$_POST['dbuname'];
	$dbpwd=$_POST['dbpwd'];
	$dbname=$_POST['dbname'];
	
	$con=@mysqli_connect($host,$dbuname,$dbpwd,$dbname);
	if(mysqli_connect_error()){
		$msg=mysqli_connect_error();
	}else{
		copy("db.inc.config.php","$DBconfig_File");
		$file="$DBconfig_File";
		file_put_contents($file,str_replace("db_host",$host,file_get_contents($file)));
		file_put_contents($file,str_replace("db_username",$dbuname,file_get_contents($file)));
		file_put_contents($file,str_replace("db_password",$dbpwd,file_get_contents($file)));
		file_put_contents($file,str_replace("db_name",$dbname,file_get_contents($file)));


$host = "$host";
$uname = "$dbuname";
$pass = "$dbpwd";
$database = "$dbname"; //Change Your Database Name
$conn = new mysqli($host, $uname, $pass, $database);
$filename = "trcoder_db.sql"; //How to Create SQL File Step : url:http://localhost/phpmyadmin->detabase select->table select->Export(In Upper Toolbar)->Go:DOWNLOAD .SQL FILE
$op_data = '';
$lines = file($filename);
foreach ($lines as $line)
{
    if (substr($line, 0, 2) == '--' || $line == '')//This IF Remove Comment Inside SQL FILE
    {
        continue;
    }
    $op_data .= $line;
    if (substr(trim($line), -1, 1) == ';')//Breack Line Upto ';' NEW QUERY
    {
        $conn->query($op_data);
        $op_data = '';
    }
}
$message2 = "Tables Created Successfully Inside " . $database . " Database.";
?>

<!-- Display the alert box  -->
<script>alert('<?php echo "$message2"; ?>');</script>

<!-- Redirect to step 3 page -->
<script>location.href = '?step=2';</script>

<?php
	}
}
?>

<?php
if(isset($_POST['done'])){
$website_version=$_POST['website_version'];
       $author=$_POST['author'];
       $email=$_POST['email'];
       $contact_form=$_POST['contact_form'];

       $title=$_POST['title'];
       $logo=$_POST['logo']; $YoutubeChannelID=$_POST['YoutubeChannelID'];
       $description=$_POST['description'];
       $keywords=$_POST['keywords'];


copy("web.inc.config.php","$WEBconfig_File");
               $file="$WEBconfig_File";
		file_put_contents($file,str_replace("web_version",$website_version,file_get_contents($file)));
		file_put_contents($file,str_replace("your_name",$author,file_get_contents($file)));
		file_put_contents($file,str_replace("your_email",$email,file_get_contents($file)));
		file_put_contents($file,str_replace("cont_form",$contact_form,file_get_contents($file)));

file_put_contents($file,str_replace("web_title",$title,file_get_contents($file)));

file_put_contents($file,str_replace("img_logo",$logo,file_get_contents($file)));

file_put_contents($file,str_replace("yt_channel_id",$YoutubeChannelID,file_get_contents($file)));

file_put_contents($file,str_replace("full_description",$description,file_get_contents($file)));

file_put_contents($file,str_replace("some_keywords",$keywords,file_get_contents($file)));      

$message3 = "installation has been completed successfully!";        
?>

<!-- Display the alert box  -->
<script>alert('<?php echo "$message3"; ?>');</script>

<!-- Redirect to website home page -->
<script>location.href = '../index.php';</script>
<?php
}
?>

<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>PHP Installer</title>
      <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- remove 000webhost Banner -->
<script src="/includes/remove-000webhost-Banner.js"></script>

      <style>
		table{width:30% !important; text-align:center; margin:auto; margin-top:px;}
		.success{color:green;}
		.error{color:red;}
		.frm{width:70% !important; margin:auto; margin-top:10px;}
	  </style>
   </head>
   <body>
      
      <main role="main" class="container">	
      <?php
      if($_GET['step'] == "1"){
      ?>
      
      <p style="text-align:center; margin-top:20%;">MySQL Database Setup</p>	
      
      <form class="frm" method="post">
      <div class="form-group">
      <input type="text" class="form-control" placeholder="Host" required name="host" value="<?php echo $hostname?>">
      </div>
      <div class="form-group">
      <input type="text" class="form-control" placeholder="Database User Name" required name="dbuname" value="<?php echo $user?>">
      </div>
      <div class="form-group">
      <input type="text" class="form-control" placeholder="Database Password" name="dbpwd" value="<?php echo $password?>">
      </div>
      <div class="form-group">
      <input type="text" class="form-control" placeholder="Database Name" required name="dbname" value="<?php echo $database?>">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Next</button>
      <span class="error"><?php echo $msg?></span>
      </form>
      
      <?php
      }
      ?>	  
  

<?php
if(file_exists("$DBconfig_File")){
$readonly = "readonly";

//select
$sql = "SELECT id, UserName, Password, email FROM admin";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $UserName = $row["UserName"];
    $Password = $row["Password"];
    $email = $row["email"];
  }
} else {
  //echo "DB tables found!";
}
$con->close();
}

if($_GET['step'] == "2"){

if(isset($_POST['update'])){

//update
   $newname=$_POST['newname'];
   $newpassword=md5($_POST['newpassword']);
   $newemail=$_POST['newemail'];

/* ENTER HARE UPDATE CODE*/

    $message4 = "Admin Profile Successfully updated!";
?>

<!-- Display the alert box  --><script>alert('<?php echo "$message4"; ?>');</script>

<!-- Redirect to step 3 page -->
<script>location.href = '?step=3';</script>

<?php
}
?>


<?php
//Default Password match

$encodedPassword = 'Hpsc%40123';
$defaultPassword = urldecode("$encodedPassword");

if (md5($defaultPassword) == "$Password"){
$Password = "$defaultPassword";
}
else {
$Password = "$Password";
}
?>

<p style="text-align:center; margin-top:20%;">Admin Profile</p>	

<form class="frm" method="post">
      <div class="form-group">
      <input type="text" class="form-control" placeholder="username" required name="newname" value="<?php echo $UserName?>" <?php echo "$readonly";?>>
      </div>
      <div class="form-group">
      <input type="text" class="form-control" placeholder="password" required name="newpassword" value="<?php echo $Password?>" <?php echo $readonly?>>
      </div>
      <div class="form-group">
      <input type="text" class="form-control" placeholder="email" required name="newemail" value="<?php echo $email?>" <?php echo $readonly?>>
      </div>
    <button type="submit" name="update" class="btn btn-primary">Next</button>
      <span class="error"><?php echo $msg?></span>
      </form>
<?php
}
?>
		<?php
		if($_GET['step'] == "3"){
			?>

<p style="text-align:center; margin-top:20%;">Website Config Setup</p>	
			
			<form class="frm" method="post">
			  <div class="form-group">
				<input type="text" class="form-control" placeholder="website version" required name="website_version" value="<?php echo $website_version?>">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" placeholder="author" required name="author" value="<?php echo $author?>">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" placeholder="email" name="email" value="<?php echo $email?>">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" placeholder="contact_form" required name="contact_form" value="<?php echo $contact_form?>">
			  </div>
<br>
                          <div class="form-group">
				<input type="text" class="form-control" placeholder="title" required name="title" value="<?php echo $title?>">
			  </div>
                          <div class="form-group">
				<input type="text" class="form-control" placeholder="logo" required name="logo" value="<?php echo $logo?>">
			  </div>
                          <div class="form-group">
				<input type="text" class="form-control" placeholder="Youtube Channel ID" required name="YoutubeChannelID" value="<?php echo $YoutubeChannelID?>">
			  </div>
                         <div class="form-group">
				<input type="text" class="form-control" placeholder="description" required name="description" value="<?php echo $description?>">
			  </div>
                         <div class="form-group">
				<input type="text" class="form-control" placeholder="keywords" required name="keywords" value="<?php echo $keywords?>">
			  </div>
			  <button type="submit" name="done" class="btn btn-primary">Done</button>
			  <span class="error"><?php echo $msg?></span>
			</form>
<br/><br><br/>			
			<?php
		}else if($_GET['step'] == ""){
		?>	  
		
<p style="text-align:center; margin-top:20%;"><?php echo("$website_title");?> | <?php echo("$website_version");?></p>
<table class="table">         
		  <thead>
			<tr>
			  <th scope="col">Configuration</th>
			  <th scope="col">Status</th>
			</tr>
		  </thead>
		  <tbody>
			<tr>
			  <th scope="row">PHP Version</th>
			  <td>
				<?php
					$is_error="";
					$php_version=phpversion();
					if($php_version>5){
						echo "<span class='success'>".$php_version."</span>";
					}else{
						echo "<span class='error'>".$php_version."</span>";
						$is_error='yes';
					}
				?>
			  </td>
			</tr>
			<tr>
			  <th scope="row">Curl Install</th>
			  <td>
				<?php
				$curl_version=function_exists('curl_version');
				if($curl_version){
					echo "<span class='success'>Yes</span>";
				}else{
					echo "<span class='error'>No</span>";
					$is_error='yes';
				}
				?>
			  </td>
			</tr>
			<tr>
			  <th scope="row">Mail Function</th>
			  <td>
				<?php
				$mail=function_exists('mail');
				if($mail){
					echo "<span class='success'>Yes</span>";
				}else{
					echo "<span class='error'>No</span>";
					$is_error='yes';
				}
				?>
			  </td>
			</tr>
			<tr>
			  <th scope="row">Session Working</th>
			  <td>
				<?php
				$_SESSION['IS_WORKING']=1;
				if(!empty($_SESSION['IS_WORKING'])){
					echo "<span class='success'>Yes</span>";
				}else{
					echo "<span class='error'>No</span>";
					$is_error='yes';
				}
				?>
			  </td>
			</tr>
			
			<tr>
			  <td colspan="2">
				<?php 
				if($is_error==''){
					?>
					<a href="?step=1"><button type="button" class="btn btn-success">Next</button></a>
					<?php
				}else{
					?><button type="button" class="btn btn-danger">Error</button><?php
				}
				?>
			  </td>
			</tr>
		  </tbody>
		  
		</table>
<?php
     }
?>
		
      </main>
      
      <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
      <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
   </body>
</html>





