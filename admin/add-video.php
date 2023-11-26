<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  //header('location:logout.php');
echo "<script type='text/javascript'> document.location = 'logout.php'; </script>";

  } else{

//Code for add data 
if(isset($_POST['Generate']))
{

    $title=$_POST['title'];
    $url=$_POST['url'];
    $poster=$_POST['poster'];
    $subtitle=$_POST['subtitle'];
    $host=$_POST['host'];
    $direct_link=$_POST['direct_link'];
    $embed_code=$_POST['embed_code'];

$sql=mysqli_query($con,"select id from video_list where title='$title'");
$row=mysqli_num_rows($sql);
if($row>0)
{
 //   echo "<script>alert('Sorry,A video with this title already exist!');</script>";
} else{
    

//Code to Generate 
$GetDomainURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
$domain = "$GetDomainURL";

$playerPath = "/play.php";

if($host == 'doodstream'){
$unicode = 'ZG9vZA';
$id= substr(strrchr($url, '/'), 1);
}

if($host == 'gofile'){
$unicode = 'Z29maQ';
$id= substr(strrchr($url, '/'), 1);
}

// $direct_link = "$domain$playerPath?id="."$unicode$id"."&thumbnail=$poster&sub=$subtitle&sub_label="."unknown"."&title=$title"."&advast=true";
//$direct_link = "$domain$playerPath?id="."$unicode$id";
//$embed_code = '<iframe src="'.$direct_link.'" width="100%" height="380px" frameborder="0" scrolling="no" allowfullscreen></iframe>';
$direct_link = "";
$embed_code = "";

//Code to Save
$sql_2=mysqli_query($con,"insert into video_list(title,url,poster,subtitle,host,direct_link,embed_code) values('$title','$url','$poster','$subtitle','$host','$direct_link','$embed_code')");
if($sql_2)
{
  // echo "<script>alert('Data saved successfully!');</script>";
//       echo "<script type='text/javascript'> document.location = './video-list.php'; </script>";
}

//GET LAST SAVED ID
$last_id = mysqli_insert_id($con);


// $direct_link = "$domain$playerPath?id="."$unicode$id"."&thumbnail=$poster&sub=$subtitle&sub_label="."unknown"."&title=$title"."&advast=true";
$direct_link = "$domain$playerPath?uid=".$last_id;

$embed_code = '<iframe src="'.$direct_link.'" width="100%" height="380px" frameborder="0" scrolling="no" allowfullscreen></iframe>';

//Code to Save
$sql3=mysqli_query($con,"update video_list set direct_link='$direct_link',embed_code='$embed_code' where id='$last_id'");

if($sql_3)
{
  // echo "<script>alert('Data saved successfully!');</script>";
//       echo "<script type='text/javascript'> document.location = './video-list.php'; </script>";
}

// echo "<script>alert('".$last_id."');</script>";
$directlink = "$GetDomainURL"."/admin/video-redirect.php?id="."$last_id";
$embedcode = '<iframe src="'.$directlink.'" width="100%" height="380px" frameborder="0" scrolling="no" allowfullscreen></iframe>';


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
        <title>Add Video</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 670px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}
</style>

<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
 /* background-color: #f2f2f2; */
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row::after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
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
                        

                        <h1 class="mt-4">Add Video</h1>
                                                                                              
                        <div class="card mb-4">
                        
                        <?php
                        if(isset($_POST['Generate']))
                        {
                        ?>
                        <!-- Alert Start -->
                        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
                        <div class="alert alert-success" id="alertDiv" role="alert" style="fontSize: 20; display:none; width:200px;">
                        <button onclick="document.getElementById('alertDiv').style.opacity = '0'" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Data saved </strong>successfully!
                        </div>
                        <style>
                        #alertDiv {
                        transition: opacity 1s;
                        position: absolute; /*or fixed*/
                        right: 0px;
                        }
                        </style>
                        <script>
                        
                        //alert('copied');
                        const target = document.getElementById("alertDiv");
                        target.style.opacity = '1';
                        target.style.display = 'block';
                        setInterval(() => target.style.opacity = '0', 3000);      
                        setInterval(() => target.style.display = 'none', 5000);                                           
                        </script>
                        <!-- Alert End -->
                        <?php } ?>
                        
                     <form method="post" >
                            <div class="card-body">
                                <table class="table table-bordered">


<div class="row" style="border: none ;">
  <div class="column" style="background-color:; overflow: scroll;">
    
    <div class="container">

<!-- <form> -->
  
<div class="form-group">
    <label for="url">url</label>
    <input type="text" class="form-control" id="url" name="url" placeholder="" onchange="parseHostname(this.value)" value="<?php echo $url; ?>" required>
  </div>
  
  <div class="form-group">
  <label for="title">title</label>
  <input type="text" class="form-control" id="title" name="title" placeholder="" value="<?php echo $title; ?>" required>
  </div>

<div class="form-group">
    <label for="poster">poster</label>
    <input type="text" class="form-control" id="poster" name="poster" placeholder="" value="<?php echo $poster; ?>">
  </div>

<div class="form-group">
    <label for="subtitle">subtitle</label>
    <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="" value="<?php echo $subtitle; ?>">
  </div>

<div class="form-group">
<label for="host">host</label>
    <select class="form-control" id="host" name="host" required>
      <option id="doodstream">doodstream</option>
      <option id="gofile">gofile</option>      
<!--
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
-->
    </select>
</div>
<script>
function parseHostname(e) {

var url = new URL (e);

url.protocol; // => "http:"
url.host;     // => "example.com:3000"
url.hostname; // => "example.com"
url.port;     // => "3000"
url.pathname; // => "/pathname/"
url.hash;     // => "#hash"
url.search;   // => "?search=test"
url.origin;   // => "http://example.com:3000"

var hostname = url.hostname;
// alert(hostname);

var hos = hostname;
var remove_after= hos.indexOf('.');
var host =  hos.substring(0, remove_after);
// alert(host);

if(hostname == "doodstream.com" || hostname == "dooood.com"){
document.getElementById("doodstream").selected = true;

} else if(hostname == "gofile.io"){
document.getElementById("gofile").selected = true;

} else{

var select = document.getElementById("host");
  var option = document.createElement("option");
  option.id = host;
  option.text = host;
  select.add(option);
  
document.getElementById(host).selected = true;

}


}

</script>

<!--
<div class="form-group">
    <label for="direct_link">direct_link</label>
    <input type="text" class="form-control" id="direct_link" name="direct_link" placeholder="">
  </div>

<div class="form-group">
    <label for="embed_code">embed_code</label>
    <input type="text" class="form-control" id="embed_code" name="embed_code" placeholder="">
  </div>
-->

<!--
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="exampleCheck1" >
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
-->

<br>
  <button type="submit" name="Generate" class="btn btn-primary">Generate</button>
 </form>

    </div>
    
  </div>
  
  
  <div class="column" style="background-color:; overflow: scroll;">

<div class="container">

<!-- <form> -->

<!--
<div class="form-group">
    <label for="direct_link">short_link</label>
    <textarea class="form-control" onclick="copy(this);" id="short_direct_link" name="short_direct_link" rows="3" readonly><?php echo $directlink;?></textarea>
  </div>
  
<div class="form-group">
    <label for="embed_code">short_code</label>
    <textarea class="form-control" onclick="copy(this);" id="short_embed_code" name="short_embed_code" rows="3" readonly><?php echo $embedcode;?></textarea>
  </div>
-->

  <div class="form-group">
    <label for="direct_link">direct_link</label>
    <textarea class="form-control" onclick="copy(this);" id="direct_link" name="direct_link" rows="3" readonly><?php echo $direct_link;?></textarea>
  </div>
<center>
<button onclick="copy1()" type="button" class="btn btn-primary btn-block" name="submit">Copy</button></td>
</center>
<script>
function copy1() {
  let textarea = document.getElementById("direct_link");
  textarea.select();
  document.execCommand("copy");
 // alert('copied!');
}
</script>

<div class="form-group">
    <label for="embed_code">embed_code</label>
    <textarea class="form-control" onclick="copy(this);" id="embed_code" name="embed_code" rows="3" readonly><?php echo $embed_code;?></textarea>
  </div>

<center>
<button onclick="copy2()" type="button" class="btn btn-primary btn-block" name="submit">Copy</button></td>
</center>
<script>
function copy2() {
  let textarea = document.getElementById("embed_code");
  textarea.select();
  document.execCommand("copy");
// alert('copied!');
}
</script>

<div class="form-group" style="height:200px;">
    <label for="embed_code">video preview</label>
    
    <?php echo $embed_code; ?>
    
  </div>

<!-- </form> -->

</div>

  </div>
</div>
                                      
                  
                                 <!-- 
                                  <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="Save">Save to Video List</button></td>

                                  </tr>
                                 -->
                                    </tbody>
                                </table>
                            </div>
                            <!-- </form> -->
                        </div>


                    </div>
                </main>
          <?php include('../includes/footer.php');?>
            </div>
        </div>

<script>
//Copy Text Value
function copy(e) {
var id = e.id;
let textarea = document.getElementById(e.id);
textarea.select();
document.execCommand("copy");
// return alert('Copied successfully!');
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

