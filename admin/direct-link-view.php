<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  //header('location:logout.php');
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
        <title>Ditect Link</title>
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
$directlink = "$GetDomainURL"."/admin/video-redirect.php?id="."$last_id";
$embedcode = '<iframe src="'.$directlink.'" width="100%" height="100%" frameborder="0" scrolling="no" allowfullscreen></iframe>';


$query=mysqli_query($con,"select * from video_list where id='$userid'");
while($result=mysqli_fetch_array($query))
{


?>

<h1 class="mt-4">Short Link</h1>
<div class="card mb-4">
<!--   <form method="post" name="bwdatesreport" action="bwdates-report-result.php" > -->
<div class="card-body">
<table class="table table-bordered">
   <tr>

<div class="form-group">
<label for="exampleFormControlTextarea1"></label>
<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly><?php echo $directlink; ?></textarea>
</div>
       
   </tr>
      

   <tr>
       <td colspan="4" style="text-align:center ;"><button onclick="copy()" type="submit" class="btn btn-primary btn-block" name="submit">Copy</button></td>

   </tr>
    </tbody>
</table>
</div>
<!--  </form> -->
</div>


<h1 class="mt-4">Direct Link</h1>
<div class="card mb-4">
          <!--   <form method="post" name="bwdatesreport" action="bwdates-report-result.php" > -->
<div class="card-body">
<table class="table table-bordered">
   <tr>

<div class="form-group">
<label for="exampleFormControlTextarea2"></label>
<textarea class="form-control" id="exampleFormControlTextarea2" rows="3" readonly><?php echo $result['direct_link']; ?></textarea>
</div>
       
   </tr>
      
          
   <tr>
       <td colspan="4" style="text-align:center ;"><button onclick="copy2()" type="submit" class="btn btn-primary btn-block" name="submit">Copy</button></td>

   </tr>
    </tbody>
</table>
</div>
<!--  </form> -->
</div>
                        

<?php } ?>

                    </div>
                </main>
          <?php include('../includes/footer.php');?>
            </div>
        </div>

<script>
function copy() {
  let textarea = document.getElementById("exampleFormControlTextarea1");
  textarea.select();
  document.execCommand("copy");
 alert('copied!');
}
</script>
<script>
function copy2() {
  let textarea = document.getElementById("exampleFormControlTextarea2");
  textarea.select();
  document.execCommand("copy");
 alert('copied!');
}
</script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
