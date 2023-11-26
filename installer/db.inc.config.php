<?php
$host="db_host";
$user="db_username";
$password="db_password";
$database="db_name";

define('DB_SERVER', "$host");
define('DB_USER', "$user");
define('DB_PASS', "$password");
define('DB_NAME', "$database");
 
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
?>