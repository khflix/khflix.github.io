<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
 // header('location:logout.php');
echo "<script type='text/javascript'> document.location = 'logout.php'; </script>";

  } else{
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Video List Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                       
<?php 
$userid=$_GET['uid'];

//Code to Generate
//GET LAST SAVED ID
$last_id = $userid;
$GetDomainURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
$domain = "$GetDomainURL";



$uid = $_GET['uid'];
/*
$GetDomainURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
$domain = "$GetDomainURL";
*/
$playerPath = "/player.php";

$query=mysqli_query($con,"select * from video_list where id='$uid'");
$result=mysqli_fetch_array($query);
    $url= $result['url'];   
    
    $id= substr(strrchr($url, '/'), 1);
    $title = $result['title']; 
    $poster = $result['poster'];
    $subtitle = $result['subtitle'];
    $host = $result['host'];    
    
    if($host == 'doodstream'){
    $unicode = 'ZG9vZA';
    $id= substr(strrchr($url, '/'), 1);
    }
    
    if($host == 'gofile'){
    $unicode = 'Z29maQ';
    $id= substr(strrchr($url, '/'), 1);
    }
    
$full_link = "$domain$playerPath?id="."$unicode$id"."&thumbnail=$poster&sub=$subtitle&sub_label="."unknown"."&title=$title"."&advast=true";


$directlink = "$GetDomainURL"."/admin/video-redirect.php?id="."$last_id";
$embedcode = '<iframe src="'.$directlink.'" width="100%" height="380px" frameborder="0" scrolling="no" allowfullscreen></iframe>';

$query=mysqli_query($con,"select * from video_list where id='$userid'");
while($result=mysqli_fetch_array($query))
{?>
                        <h1 class="mt-4"><?php echo $result['title'];?></h1>
                        <div class="card mb-4">
                     
                            <div class="card-body">
                                <a href="video-list-profile-edit.php?uid=<?php echo $result['id'];?>">Edit</a>
                                <table class="table table-bordered">
                                   <tr>
                                    <th>id</th>
                                       <td><?php echo $result['id'];?></td>
                                   </tr>
                                   <tr>
                                       <th>title</th>
                                       <td><?php echo $result['title'];?></td>
                                   </tr>
                                   <tr>
                                       <th>url</th>
                                       <td colspan="3"><?php echo $result['url'];?></td>
                                   </tr>
                                     <tr>
                                       <th>poster</th>
                                       <td colspan="3"><?php echo $result['poster'];?></td>
                                   </tr>
                               
                                     <tr>
                                       <th>subtitle</th>
                                       <td colspan="3"><?php echo $result['subtitle'];?></td>
                                   </tr>

                                     <tr>
                                       <th>host</th>
                                       <td colspan="3"><?php echo $result['host'];?></td>
                                   </tr>
                                   
                                   <tr>
                                   <th>full_link</th>
                                   <td colspan="3">
                                   <div class="form-group">
                                   <!-- <label for="exampleFormControlTextarea1"></label> -->
                                   <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly><?php echo $full_link; ?></textarea>
                                   </div>
                                   </td>
                                   </tr>
                                   
                                   <tr>
                                   <th>short_link</th>
                                   <td colspan="3">
                                   <div class="form-group">
                                   <!-- <label for="exampleFormControlTextarea1"></label> -->
                                   <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly><?php echo $directlink; ?></textarea>
                                   </div>
                                   </td>
                                   </tr>

                                     <tr>
                                       <th>direct_link</th>
                                       <td colspan="3">
<div class="form-group"> 
  <!--  <label for="exampleFormControlTextarea"></label> -->
    <textarea class="form-control" id="exampleFormControlTextarea" rows="2" readonly><?php echo $result['direct_link'];?></textarea>
  </div>
                                   </tr>

                                     <tr>
                                       <th>embed_code</th>
                                       <td colspan="3">

<div class="form-group"> 
  <!--  <label for="exampleFormControlTextarea1"></label> -->
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly><?php echo $result['embed_code'];?></textarea>
  </div>
                                   </tr>      
                                        <tr>
                                       <th>Reg. Date</th>
                                       <td colspan="3"><?php echo $result['posting_date'];?></td>
                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
<?php } ?>

                    </div>
                </main>
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
