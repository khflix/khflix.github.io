<?php session_start();
include_once('../includes/config.php');


$videoid=$_GET['id'];
$query=mysqli_query($con,"select * from video_list where id='$videoid'");
while($result=mysqli_fetch_array($query))
{?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Video Redirect Page</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <!--script to redirect to video page-->
    <script>        
    var videourl = "<?php echo $result['direct_link'];?>";                
    window.location.href = videourl;                       
    </script>
      </body>
</html>
<?php } ?>
