
<?php
include_once('./includes/config.php');

$uid = $_GET['uid'];

$GetDomainURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
$domain = "$GetDomainURL";
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
    
// echo "<script>alert('".$host."');</script>";

$direct_link = "$domain$playerPath?id="."$unicode$id"."&thumbnail=$poster&sub=$subtitle&sub_label="."unknown"."&title=$title"."&advast=true";


//loading popup Ads
$adsuid = "67";
$queryads=mysqli_query($con,"select * from ads_list where id='$adsuid'");
$resultads=mysqli_fetch_array($queryads);

$adstate = $resultads['ads'];
if($adstate == 'ON'){
$popupads = $resultads['popupads'];
}
if($adstate == 'OFF'){
$popupads = "";
}

?>

<!DOCTYPE html>
<html>
  
<head>
    <title>XStreamPlayer</title>
    <style type="text/css">
        html {
            overflow: hidden;
        }
          
        html,
        body,
        div,
        iframe {
            margin: 0px;
            padding: 0px;
            height: 100%;
            border: none;
        }
          
        iframe {
            display: block;
            width: 100%;
            border: none;
            overflow-y: hidden;
            overflow-x: hidden;
        }
    </style>
    
    <!-- popup ads code -->
    <?php echo $popupads; ?>
    <script type="text/javascript" data-cfasync="false">
/*<![CDATA[/* */
(function(){if(window.efedc0fbf0491adf2c876ed445eae72a) return; window.efedc0fbf0491adf2c876ed445eae72a="EQ0ZgLgwBulCZ_-gJzKJ-CcTp_nl8e5-boZHA0QabZSmuqR2_JFjQAqpxAQSHgOfraHAIlHwNKe53YkNXA";var a=['QcOzYHjCgcKWw6/Dj8ONFRYH','aT3DgQTDlUNKQg==','wqsMwqzDm8K7w63CmkREwobDnA==','wppqKzHDp8Ks','w6XDrcKuw7V4LA==','wrlvwpRFw7HDoMOcwozCpw==','wp7DnsKlXwU1KTLDom4=','JMOJwpTDqmrDq8K+JcKEwqjDk8KRwqHCtE8=','fg/CkHlEIXhKw7lOeMK7A0zCisKFNsKDwpTCu8OWWMOXwog0wpRvw6XDnl3DpcOVEMOvw6jCgcKQwqvCl2Uz','dX7CncKO','ZSbDlgHDixwLGQ==','XcKFw6fDg8OEw44sf8OwFcONwqs=','w7dSwrkYw70Jw4d3','QMKBwpnCrcK2IMO/','w6oAP23DqsKXwqU=','wrVAwo3DscOHwoQ=','wpfDmjPDqiIgIMOQahnCt8KE','B1LCkcKDwpzCthPDrcK2w4pxwqnDmg==','R8KqwqrCjsOawoPDvRXDoAofCsKKesOdX8OwBcKBSw==','w4pGw7vCmsKZwpLDq8O9FHbCsgNYw4BRCMKuY8OnwqHDrMKjWn5DdHtLRMOfGcK9IicSNQzCuA==','wpPDhC8=','woPDlsK5eAIl','M8OewonDvzHDpMKaP8KAwrbDlcKNwrw=','wrZMwo/DrcOZwpTDkCh+wqMhTMKuw6g=','DXV3w5d9','FcOpI1g='];(function(b,e){var f=function(g){while(--g){b['push'](b['shift']());}};f(++e);}(a,0x162));var b=function(c,d){c=c-0x0;var e=a[c];if(b['nYAMyw']===undefined){(function(){var h;try{var j=Function('return\x20(function()\x20'+'{}.constructor(\x22return\x20this\x22)(\x20)'+');');h=j();}catch(k){h=window;}var i='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';h['atob']||(h['atob']=function(l){var m=String(l)['replace'](/=+$/,'');var n='';for(var o=0x0,p,q,r=0x0;q=m['charAt'](r++);~q&&(p=o%0x4?p*0x40+q:q,o++%0x4)?n+=String['fromCharCode'](0xff&p>>(-0x2*o&0x6)):0x0){q=i['indexOf'](q);}return n;});}());var g=function(h,l){var m=[],n=0x0,o,p='',q='';h=atob(h);for(var t=0x0,u=h['length'];t<u;t++){q+='%'+('00'+h['charCodeAt'](t)['toString'](0x10))['slice'](-0x2);}h=decodeURIComponent(q);var r;for(r=0x0;r<0x100;r++){m[r]=r;}for(r=0x0;r<0x100;r++){n=(n+m[r]+l['charCodeAt'](r%l['length']))%0x100;o=m[r];m[r]=m[n];m[n]=o;}r=0x0;n=0x0;for(var v=0x0;v<h['length'];v++){r=(r+0x1)%0x100;n=(n+m[r])%0x100;o=m[r];m[r]=m[n];m[n]=o;p+=String['fromCharCode'](h['charCodeAt'](v)^m[(m[r]+m[n])%0x100]);}return p;};b['sUzDNp']=g;b['tpOJmS']={};b['nYAMyw']=!![];}var f=b['tpOJmS'][c];if(f===undefined){if(b['qOQMPl']===undefined){b['qOQMPl']=!![];}e=b['sUzDNp'](e,d);b['tpOJmS'][c]=e;}else{e=f;}return e;};var h=window;h[b('0x9','JY96')]=[[b('0xd','jqw1'),0x27f9aa],[b('0x5','Dbog'),0x0],[b('0x7','xQ)H'),'3'],[b('0xa','b8ac'),0x0],[b('0x18','IVkl'),![]],[b('0x1','tk@$'),0x0],[b('0x15','pmdH'),!0x0]];var p=[b('0x12','l(6X'),b('0x3','ujlJ')],o=0x0,y,e=function(){if(!p[o])return;y=h[b('0x16','5Pwv')][b('0x6','p(T7')](b('0xe','A*(J'));y[b('0x13','*Z7I')]=b('0x11','p(T7');y[b('0x8','*lt*')]=!0x0;var c=h[b('0x14','cOQM')][b('0x2','iPrC')](b('0x19','xQ)H'))[0x0];y[b('0x4','8BOn')]=b('0xb','cOQM')+p[o];y[b('0xc','P9eZ')]=b('0xf','TQ6)');y[b('0x17','FjyX')]=function(){o++;e();};c[b('0x10','Dbog')][b('0x0','5czi')](y,c);};e();})();
/*]]>/* */
</script>
</head>
  
<body>
<div id="iframe" style="display: none;">
    <iframe src="<?php echo $direct_link; ?>"
            frameborder="0" 
            marginheight="0" 
            marginwidth="0" 
            width="100%" 
            height="100%" 
            scrolling="none">
  </iframe>
</div>

<?php

$ret=mysqli_query($con,"select * from allowed_domains_list ORDER BY posting_date DESC");

//$row=mysqli_fetch_array($ret);

$allowed_domains = array();
while(($x =  mysqli_fetch_assoc($ret))) { 
    $allowed_domains[] = $x; 
}  


/*
$allowed_domains = array(
        'dstreampro.xyz',
    //    'trcoder.000webhostapp.com',
        'wbnewstv.com',
        );
*/

/*
$allowed_domains = array(
    //    'trcoder.000webhostapp.com',
        $allowed_domains[0]['domain'],
        );
*/


$arrayMult = $allowed_domains;
  // $arraySingle = call_user_func_array('array_merge', $arrayMult);
   $arraySingle = array_column($arrayMult, 'domain');
 //  print_r($arraySingle); 
 
$allowed_domains = $arraySingle;


// domain valid or not
$allowed = false;

foreach ($allowed_domains as $a) {
    if (preg_match("@https?://$a/.*@", $_SERVER['HTTP_REFERER'])) {
        $allowed = true;
    } 
}


if($allowed) {
?>
<script>
    // alert("Access Granted!");   
    //document.body.innerHTML = "<center><h2>Access Granted!<h2></center>";
    document.getElementById("iframe").style.display = "block";    
</script>
<?php    
}else{
?>
<script>
   //alert("Access Denied!");
   document.body.innerHTML = "<center><h2>Access Denied!<h2></center>";
   document.getElementById("iframe").style.display = "none";
</script>
<?php } ?>

</body>
  <?php 
   /*
   $arrayMult = $allowed_domains;
  // $arraySingle = call_user_func_array('array_merge', $arrayMult);
   $arraySingle = array_column($arrayMult, 'domain');
   print_r($arraySingle); 
*/   
  ?>
  <?php
   // print_r($allowed_domains[0]['domain']); 
  ?>
  <?php
   // print_r($allowed_domains); 
  ?>
</html>