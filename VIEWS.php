

<?php

include_once('./includes/config.php');

$DB_host = "$host";
$DB_user = "$user";
$DB_pass = "$password";
$DB_name = "$database";

 try
 {
     $DBcon = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass); 
     $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Done..";
 }
 catch(PDOException $e)
 {
     echo "ERROR : ".$e->getMessage();
 }

//Fetch 
 $stmt_article=$DBcon->prepare("SELECT * FROM views");
$stmt_article->execute();
$article=$stmt_article->fetch(PDO::FETCH_ASSOC);
//echo $article['user_id'];

//Update View
$views=$article['views'];
 $stmt_views=$DBcon->prepare("UPDATE views SET views=:views+1");
$stmt_views->execute(array(':views'=>$views));
// echo "Page Views : ".$article['views'];

echo $article['views'];

?>