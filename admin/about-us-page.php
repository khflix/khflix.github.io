<?php
//Website Details config file
include("../includes/config-web-info.php");

 $GetDomainURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
 ?>
<!DOCTYPE html>
<html>
<head>
<title>About us</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- remove 000webhost Banner -->
 <link href="/includes/remove-000webhost-Banner.css" rel="stylesheet">

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>

<div class="about-section">
  <h1>About</h1>
  
  <p style="color: #35FFFF;background-color: #365667;text-align: center;">
  ADMIN</p>
  <p><?php echo("$author");?></p>
  
  <p style="color: #35FFFF;background-color: #365667;text-align: center;">
  WEBSITE URL</p>
  <a href="./" style="color: white;background-color: #365667;text-align: center;"><?php echo $GetDomainURL; ?></a>
  
  <script src="https://apis.google.com/js/platform.js"></script>
  <p style="color: #35FFFF;background-color: #365667;text-align: center;">
  YOUTUBE CHANNEL</p>
  <div class="g-ytsubscribe" data-channelid="<?php echo $YoutubeChannelID; ?>" data-layout="full" data-theme="white" data-count="default"></div>

</div>


<!-- ALL-COLUMNS SECTION -->
<h2 style="text-align:center">
Contact</h2>
<div class="row">



<title>Column 001</title>
<div class="column">
    <div class="card">
      <img src="Images/E-mail.jpeg" alt="E-mail" style="width:100%">
      <div class="container">
        <h2>Contact us via E-mail</h2>
        <p class="title">E-mail Address :</p>
        
        <p><?php echo("$email");?></p>
		   
       <br/>
        <!DOCTYPE html>
        <html>
        <style>
        .button001 {
        display: inline-black;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        color: black;
        border:1px solid black;
        background-color: skyblue;
        border-radius: 6px;
        outline: none;
        
        /*.button */
        border: none;
        outline: 0;
        display: inline-block;
        padding: 8px;
        color: #35FFFF;
        background-color: #365667;
        text-align: center;
        cursor: pointer;
        width: 100%;
        }
        
        .div {
        margin: 6%;
        padding: 0%;
        box-sizing: border-box;
        }
        
        </style>
        <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
        
        $(document).ready(function(){
        var myVar;
        $( "#myDiv001" ).click(function() {
        myFunction(this);
        });
        
        function myFunction(div) {
        $("#loader001").toggle();
        $(div).toggle();
        
        }
        
        
        });
        </script>
        </head>
        <body>
        
        <a id="myDiv001" class="button001" href="<?php echo("$contact_form");?>">Send Email Now &rarr;</a>
        
        <div id="loader001" style="display:none;background:red;padding:5px">Loading- Please Wait.... &rarr;</div>
        
        </body>
        </html>
        <br/>
      </div>
    </div>
  </div>
<br>

  


  
</div>
</body>
</html>