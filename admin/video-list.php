<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
 // header('location:logout.php');
echo "<script type='text/javascript'> document.location = 'logout.php'; </script>";

  } else{
// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from video_list where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
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
        <title>Video List</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style>
#alertDiv {
  transition: opacity 1s;
  position: absolute; /*or fixed*/
  right: 0px;
}
</style>
<style>
.code1 {
  padding: 5px;
  display: flex;
  align-items: center;
  justify-content: center;
 /* font-size: 10vw; */
  background: #E8C90F;
  color:white;
  display:inline-block;
  border-radius: 2px;
}
.code2 {
  padding: 5px;
  
  display: flex;
  align-items: center;
  justify-content: center;
  /* font-size: 10vw; */
  background: #3BCCBD;
  color:white;
  display:inline-block;
  border-radius: 2px;
}

.code3 {
  padding: 5px;
  
  display: flex;
  align-items: center;
  justify-content: center;
  /* font-size: 10vw; */
  background: #52CAEC;
  color:white;
  display:inline-block;
  border-radius: 2px;
}

.code4 {
  padding: 5px;
  
  display: flex;
  align-items: center;
  justify-content: center;
  /* font-size: 10vw; */
  background: #75CB4C;
  color:white;
  display:inline-block;
  border-radius: 2px;
}

.code5 {
  padding: 5px;
  
  display: flex;
  align-items: center;
  justify-content: center;
  /* font-size: 10vw; */
  background: #FF6B5D;
  color:white;
  display:inline-block;
  border-radius: 2px;
}
</style>
    </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
         <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Video List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Video List</li>
                            
                            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
                            <div class="alert alert-success" id="alertDiv" role="alert" style="fontSize: 20; display:none; width:200px;">
                            <button onclick="document.getElementById('alertDiv').style.opacity = '0'" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Copy </strong>Success!
                            </div>
                            
                        </ol>
            
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Video list Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                             <th>id</th>
                                  <th>title</th>
                                <!--  <th>url</th> -->
                                <!--  <th>poster</th> -->
                                <!--  <th>subtitle</th> -->
                                  <th>host</th>
                                  <th>Reg. Date</th>
                                  <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                             <th>id</th>
                                  <th>title</th>
                                  <!--  <th>url</th> -->
                                  <!--  <th>poster</th> -->
                                  <!--  <th>subtitle</th> -->
                                  <th>host</th>
                                  <th>Reg. Date</th>
                                  <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                              <?php $ret=mysqli_query($con,"select * from video_list ORDER BY posting_date DESC");
                              $cnt=1;
                              while($row=mysqli_fetch_array($ret))
                              {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['title'];?></td>
                                  <!--
                                  <td><?php echo $row['url'];?></td>
                                  <td><?php echo $row['poster'];?></td>
                                  <td><?php echo $row['subtitle'];?></td>
                                  -->
  <td><?php echo $row['host'];?></td>
<td><?php echo $row['posting_date'];?></td>



                                  <td>

                                     <a class="code1" href="video-preview.php?uid=<?php echo $row['id'];?>"> 
                          <i class="fas fa-eye"></i></a>                            
                                     <a class="code2" href="video-list-profile.php?uid=<?php echo $row['id'];?>"> 
                          <i class="fas fa-edit"></i></a>
                                 <!--    
                                     <a class="code3" href="direct-link-view.php?uid=<?php echo $row['id'];?>"> 
                          <i class="fas fa-link"></i></a>     
                          -->                       
                                     <a class="code3" href="javascript:myFunctionCopy('<?php echo $row['direct_link'];?>')"> 
                          <i class="fas fa-link"></i></a>                                                         
                                        
                                     <a class="code4" href="embed-code-view.php?uid=<?php echo $row['id'];?>"> 
                          <i class="fas fa-code"></i></a>    
                                     <a class="code5" href="video-list.php?id=<?php echo $row['id'];?>" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash" aria-hidden="true"></i></a>


                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
  <?php include('../includes/footer.php');?>
            </div>
        </div>
        <script>
        function myFunctionCopy(val, event) {
        var inp = document.createElement('input');
        document.body.appendChild(inp)
        inp.value = val;
        inp.select();
        document.execCommand('copy', false);
        inp.remove();
        //alert('copied');
        const target = document.getElementById("alertDiv");
        target.style.opacity = '1';
        target.style.display = 'block';
        setInterval(() => target.style.opacity = '0', 3000);      
        setInterval(() => target.style.display = 'none', 5000);                                           
        }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>