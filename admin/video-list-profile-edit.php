<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
 // header('location:logout.php');
echo "<script type='text/javascript'> document.location = 'logout.php'; </script>";

  } else{
//Code for Updation 
if(isset($_POST['update']))
{
$userid=$_GET['uid'];

    $title=$_POST['title'];
    $url=$_POST['url'];
    $poster=$_POST['poster'];
    $subtitle=$_POST['subtitle'];
    $host=$_POST['host'];
    $direct_link=$_POST['direct_link'];
    $embed_code=$_POST['embed_code'];

    $msg=mysqli_query($con,"update video_list set title='$title',url='$url',poster='$poster',subtitle='$subtitle',host='$host',direct_link='$direct_link',embed_code='$embed_code' where id='$userid'");

if($msg)
{
    echo "<script>alert('Data updated successfully');</script>";
       echo "<script type='text/javascript'> document.location = 'video-list.php'; </script>";
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
        <title>Edit Profile | Registration and Login System</title>
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
$query=mysqli_query($con,"select * from video_list where id='$userid'");
while($result=mysqli_fetch_array($query))
{?>
                        <h1 class="mt-4"><?php echo $result['fname'];?></h1>
                        <div class="card mb-4">
                     <form method="post">
                            <div class="card-body">
                                <table class="table table-bordered">
                                   <tr>
                                    <th>title</th>
                                       <td><input class="form-control" id="title" name="title" type="text" value="<?php echo $result['title'];?>" required /></td>
                                   </tr>
                                   <tr>
                                       <th>url</th>
                                       <td><input class="form-control" id="url" name="url" type="text" value="<?php echo $result['url'];?>"  required /></td>
                                   </tr>
                                         <tr>
                                       <th>poster</th>
                                       <td colspan="3"><input class="form-control" id="poster" name="poster" type="text" value="<?php echo $result['poster'];?>" /></td>
                                   </tr>
                                   
                                   <tr>
                                       <th>subtitle</th>
                                       <td><input class="form-control" id="subtitle" name="subtitle" type="text" value="<?php echo $result['subtitle'];?>" /></td>
                                   </tr>

                                   <tr>
                                       <th>host</th>
                                       <td><input class="form-control" id="host" name="host" type="text" value="<?php echo $result['host'];?>" /></td>
                                   </tr>

                                   <tr>
                                       <th>direct_link</th>
                                       <td>

<div class="form-group"> 
  <!--  <label for="direct_link"></label> -->
    <textarea class="form-control" id="direct_link" name="direct_link" rows="1"><?php echo $result['direct_link'];?></textarea>
  </div>

</td>
                                   </tr>

                                   <tr>
                                       <th>embed_code</th>
                                       <td>

<div class="form-group"> 
  <!--  <label for="embed_code"></label> -->
    <textarea class="form-control" id="embed_code" name="embed_code" rows="2"><?php echo $result['embed_code'];?></textarea>
  </div>

</td>
                                   </tr>                               
                                     
                                        <tr>
                                       <th>Reg. Date</th>
                                       <td colspan="3"><?php echo $result['posting_date'];?></td>
                                   </tr>
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="update">Update</button></td>

                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
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
