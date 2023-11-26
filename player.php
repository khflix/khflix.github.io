
<?php if($Iframe == 'false')
exit('Access denied! exit'); 
?>

<?php
include_once('./includes/config.php');

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



<?php

// include_once('./includes/config.php');

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

// echo $article['views'];

?>

<!doctype html>
<meta charset=utf-8>
<meta http-equiv=X-UA-Compatible content="IE=edge">
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<meta name=viewport content="width=device-width,initial-scale=1">
<title id=header>XStream Player</title>
<head>
<link id=favicon rel="shortcut icon" type=image/x-icon href=favicon.ico>
<link rel=preconnect href=https://delivrjs.github.io>
<link rel=stylesheet href=https://cdn.plyr.io/3.6.8/plyr.css>
<script src=https://cdn.plyr.io/3.6.8/plyr.js></script>
<script src=https://ssl.p.jwpcdn.com/player/v/8.26.9/jwplayer.js></script>
<script>
  jwplayer.key = "ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc="
</script>
<style>
  #button-container {
    position: absolute;
    top: 10px;
    right: 10px;
    display: flex;
    flex-direction: column
  }

  .video-button {
    margin-bottom: 10px
  }

  #plyr-video {
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh
  }

  body {
    font-family: Arial, Helvetica, sans-serif;
    width: 100%;
    height: 100%;
    background-color: #000;
    color: #fff;
    overflow: hidden;
    position: fixed;
    border: 0;
    margin: 0;
    padding: 0
  }

  #loading {
    width: 100%;
    height: 100%;
    position: absolute
  }

  #loading {
    z-index: 11
  }

  @-moz-keyframes rotate-loading {
    0% {
      transform: rotate(0);
      -ms-transform: rotate(0);
      -webkit-transform: rotate(0);
      -o-transform: rotate(0);
      -moz-transform: rotate(0)
    }

    100% {
      transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -moz-transform: rotate(360deg)
    }
  }

  @-o-keyframes rotate-loading {
    0% {
      transform: rotate(0);
      -ms-transform: rotate(0);
      -webkit-transform: rotate(0);
      -o-transform: rotate(0);
      -moz-transform: rotate(0)
    }

    100% {
      transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -moz-transform: rotate(360deg)
    }
  }

  @-webkit-keyframes rotate-loading {
    0% {
      transform: rotate(0);
      -ms-transform: rotate(0);
      -webkit-transform: rotate(0);
      -o-transform: rotate(0);
      -moz-transform: rotate(0)
    }

    100% {
      transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -moz-transform: rotate(360deg)
    }
  }

  @keyframes rotate-loading {
    0% {
      transform: rotate(0);
      -ms-transform: rotate(0);
      -webkit-transform: rotate(0);
      -o-transform: rotate(0);
      -moz-transform: rotate(0)
    }

    100% {
      transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -moz-transform: rotate(360deg)
    }
  }

  @-moz-keyframes loading-text-opacity {

    0%,
    100%,
    20% {
      opacity: 0
    }

    50% {
      opacity: 1
    }
  }

  @-o-keyframes loading-text-opacity {

    0%,
    100%,
    20% {
      opacity: 0
    }

    50% {
      opacity: 1
    }
  }

  @-webkit-keyframes loading-text-opacity {

    0%,
    100%,
    20% {
      opacity: 0
    }

    50% {
      opacity: 1
    }
  }

  @keyframes loading-text-opacity {

    0%,
    100%,
    20% {
      opacity: 0
    }

    50% {
      opacity: 1
    }
  }

  .loading-ani,
  .loading-container {
    height: 100px;
    position: relative;
    width: 100px;
    border-radius: 100%
  }

  .loading-container {
    margin: 40vh auto
  }

  .loading-ani {
    border: 2px solid transparent;
    border-color: transparent #fff transparent #fff;
    -moz-animation: rotate-loading 1.5s linear 0s infinite normal;
    -moz-transform-origin: 50% 50%;
    -o-animation: rotate-loading 1.5s linear 0s infinite normal;
    -o-transform-origin: 50% 50%;
    -webkit-animation: rotate-loading 1.5s linear 0s infinite normal;
    -webkit-transform-origin: 50% 50%;
    animation: rotate-loading 1.5s linear 0s infinite normal;
    transform-origin: 50% 50%
  }

  .loading-container:hover .loading-ani {
    border-color: transparent #e45635
  }

  .loading-container .loading-ani,
  .loading-container:hover .loading-ani {
    -webkit-transition: all .5s ease-in-out;
    -moz-transition: all .5s ease-in-out;
    -ms-transition: all .5s ease-in-out;
    -o-transition: all .5s ease-in-out;
    transition: all .5s ease-in-out
  }

  .loading-container .loading-text {
    -moz-animation: loading-text-opacity 2s linear 0s infinite normal;
    -o-animation: loading-text-opacity 2s linear 0s infinite normal;
    -webkit-animation: loading-text-opacity 2s linear 0s infinite normal;
    animation: loading-text-opacity 2s linear 0s infinite normal;
    color: #fff;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 10px;
    font-weight: 700;
    margin-top: 45px;
    opacity: 0;
    position: absolute;
    text-align: center;
    text-transform: uppercase;
    top: 0;
    width: 100px
  }

  .grecaptcha-badge {
    visibility: hidden
  }
</style>
<!-- popup ads code -->
<?php echo $popupads; ?>
</head>


<div id=player></div>
<div id=x-matroska></div>
<div id=button-container></div>
<div id=loading>
  <div class=loading-container>
    <div class=loading-ani></div>
    <div class=loading-text>loading</div>
  </div>
</div>

<?php 
$userid4 = "1";
$query4=mysqli_query($con,"select * from player_controls where id='$userid4'");
$result4=mysqli_fetch_array($query4);

$download_state = $result4['download'];

// player download button
if($download_state == 'ON'){
$playerDownload = "true";
}
if($download_state == 'OFF'){
$playerDownload = "false";
}
$playerDownload = $playerDownload;

?>

<script>
const xstream = {
    async get(t, a, s) {
        try {
            const r = await fetch(`${s.workers[Math.floor(Math.random()*s.workers.length)]}/api/${t}/${a}`),
                e = await r.json();
            return e.status ? e : {
                status: !1
            }
        } catch {
            return {
                status: !1
            }
        }
    }
};
</script>

<script>
function player(e, t, a, l, r, o) {
    document.getElementById("loading")?.remove(), jwplayer("player").setup({
        sources: e,
        image: t,
        title: getQueryParam("title"),
        width: r.player.width,
        height: r.player.height,
        aspectratio: null,
        preload: r.player.preload,
        aboutlink: r.player.aboutlink,
        abouttext: r.player.abouttext,
        allowFullscreen: r.player.allowFullscreen,
        autostart: r.player.autostart,
        mute: r.player.mute,
        repeat: r.player.loop,
        advertising: {
            client: r.player.advertising.client,
            admessage: r.player.advertising.admessage,
            schedule: Object.fromEntries(r.player.advertising.offset.map(((e, t) => [`adbreak${t+1}`, {
                offset: e,
                tag: a
            }])))
        },
        logo: r.player.logo,
        tracks: [{
            kind: r.player.tracks.kind,
            file: getQueryParam("sub") || null,
            label: getQueryParam("sub_label") || null
        }, {
            kind: "thumbnails",
            file: l
        }],
        captions: r.player.captions,
        // sharing: {},
        cast: {},
        playbackRateControls: r.player.playbackRateControls
    }), "doodstream" == o && jwplayer("player").addButton("<?php if($playerDownload == "true"){echo 'https://delivrjs.github.io/delivrjs/assets/custom-icons/download.svg'; } else if($playerDownload == "false"){echo ''; } ?>", "Download Video", (() => {
        <?php if($playerDownload == "true"){ ?>
        window.open(e[jwplayer("player").getCurrentQuality()].download, "_blank")
        <?php
        } else if($playerDownload == "false"){ ?>
        window.open("", "_blank")
        <?php } ?>
    }), "download"), jwplayer("player").addButton("./icons/forward10.png", "Forward 10 Seconds", (() => {
        jwplayer().seek((jwplayer().getPosition() + 10).toFixed(1))
    }), "Forward 10 seconds"), jwplayer("player").on("adBlock", (function() {
        if (r.player.fuckadblock && r.player.showAD) {
            const e = {
                file: "https://delivrjs.github.io/delivrjs/assets/video/adblock.mp4",
                type: "video/mp4",
                image: "https://delivrjs.github.io/delivrjs/assets/img/adblock.jpeg",
                width: r.player.width,
                height: r.player.height,
                preload: r.player.preload,
                controls: !1,
                autostart: !0,
                repeat: !0,
                logo: r.player.logo
            };
            document.getElementById("loading")?.remove(), jwplayer("player").setup(e)
        }
    }))
}

function goFilePlayer(e, t, a) {
    document.getElementById("loading")?.remove(), jwplayer("player").setup({
        playlist: e,
        width: a.player.width,
        height: a.player.height,
        aspectratio: null,
        preload: a.player.preload,
        aboutlink: a.player.aboutlink,
        abouttext: a.player.abouttext,
        allowFullscreen: a.player.allowFullscreen,
        autostart: a.player.autostart,
        mute: a.player.mute,
        repeat: a.player.loop,
        advertising: {
            client: a.player.advertising.client,
            admessage: a.player.advertising.admessage,
            schedule: Object.fromEntries(a.player.advertising.offset.map(((e, a) => [`adbreak${a+1}`, {
                offset: e,
                tag: t
            }])))
        },
        logo: a.player.logo,
        tracks: [{
            kind: a.player.tracks.kind,
            file: getQueryParam("sub") || null,
            label: getQueryParam("sub_label") || null
        }],
        captions: a.player.captions,
        // sharing: {},
        cast: {},
        playbackRateControls: a.player.playbackRateControls
    }), jwplayer("player").addButton("./icons/forward10.png", "Forward 10 Seconds", (() => {
        jwplayer().seek((jwplayer().getPosition() + 10).toFixed(1))
    }), "Forward 10 seconds"), jwplayer("player").addButton("./icons/forward10.png", "Forward 10 Seconds", (() => {
        jwplayer().seek((jwplayer().getPosition() + 10).toFixed(1))
    }), "Forward 10 seconds"), jwplayer("player").addButton("<?php if($playerDownload == "true"){echo 'https://delivrjs.github.io/delivrjs/assets/custom-icons/download.svg'; } else if($playerDownload == "false"){echo ''; } ?>", "Download Video", (() => {
        <?php if($playerDownload == "true"){ ?>
        window.location.href = jwplayer("player").getPlaylistItem().file + "&f=download"
        <?php
        } else if($playerDownload == "false"){ ?>
        window.location.href = ""
        <?php } ?>
    }), "download"), jwplayer("player").on("adBlock", (function() {
        if (a.player.fuckadblock && a.player.showAD) {
            const e = {
                file: "https://delivrjs.github.io/delivrjs/assets/video/adblock.mp4",
                type: "video/mp4",
                image: "https://delivrjs.github.io/delivrjs/assets/img/adblock.jpeg",
                width: a.player.width,
                height: a.player.height,
                preload: a.player.preload,
                controls: !1,
                autostart: !0,
                repeat: !0,
                logo: a.player.logo
            };
            document.getElementById("loading")?.remove(), jwplayer("player").setup(e)
        }
    }))
}

function err(e) {
    document.getElementById("loading")?.remove(), jwplayer("player").setup({
        file: "https://delivrjs.github.io/delivrjs/assets/video/404.mp4",
        type: "video/mp4",
        width: e.player.width,
        height: e.player.height,
        preload: e.player.preload,
        autostart: !0,
        repeat: !0,
        logo: e.player.logo,
        controls: !1
    })
}

function getQueryParam(e) {
    return new URLSearchParams(window.location.search).get(e) ?? null
}

function changeVideo(e) {
    document.getElementById("x-matroska").innerHTML = '<video id="plyr-video" preload="none" poster="' + e.image + '" controls><source src="' + e.file + '"></video>';
    new Plyr("#plyr-video", {
<?php if($playerDownload == "true"){ ?>
controls: ["play-large", "restart", "rewind", "play", "fast-forward", "progress", "current-time", "duration", "mute", "volume", "captions", "settings", "pip", "airplay", "download", "fullscreen"],
        urls: {
            download: `${e.file}&f=download`
<?php
 } else if($playerDownload == "false"){ ?>
controls: ["play-large", "restart", "rewind", "play", "fast-forward", "progress", "current-time", "duration", "mute", "volume", "captions", "settings", "pip", "airplay", "fullscreen"],
        urls: {
            download: ``
<?php } ?>
        }
    })
}(async () => {
    const [e, t] = await Promise.all([fetch("https://connected.pages.dev/regEx.json").then((e => e.json())), fetch("config.json").then((e => e.json()))]), a = getQueryParam("id");
    if (!a) return err(t);
    let l, r;
    for (const {
            prefix: t,
            host: o
        }
        of e) {
        if (new RegExp(t, "gm").test(a)) {
            l = o, r = a.replace(t, "");
            break
        }
    }
    if (!l || !r) return err(t);
    const o = await xstream.get(l, r, t);
    if (!o || !o.status) return err(t);
    "googlephotos" === o.host && document.head.insertAdjacentHTML("afterbegin", '<meta name="referrer" content="never"/><meta name="referrer" content="no-referrer"/>');
    const s = o.sources,
        i = getQueryParam("thumbnail") || o.image,
        n = t.player.showAD ? t.player.advertising.adTag : null,
        d = o.vtt;
    if ("gofile" === o.host)
        if ("plyr" == o.player) {
            document.getElementById("loading")?.remove(), document.getElementById("x-matroska").innerHTML = '<video id="plyr-video" preload="none" poster="' + o.playlist[0].image + '" controls><source src="' + o.playlist[0].file + '"></video>';
            if (new Plyr("#plyr-video", {
                    <?php if($playerDownload == "true"){ ?>
                    controls: ["play-large", "restart", "rewind", "play", "fast-forward", "progress", "current-time", "duration", "mute", "volume", "captions", "settings", "pip", "airplay", "download", "fullscreen"],
                    urls: {
                    download: `${o.playlist[0].file}&f=download`
                    <?php
                    } else if($playerDownload == "false"){ ?>
                    controls: ["play-large", "restart", "rewind", "play", "fast-forward", "progress", "current-time", "duration", "mute", "volume", "captions", "settings", "pip", "airplay", "<?php echo $download2; ?>", "fullscreen"],
                    urls: {
                    download: ``
                    <?php } ?>
                    }
                }), o.playlist.length > 1) {
                const e = document.getElementById("button-container");
                o.playlist.forEach(((t, a) => {
                    const l = document.createElement("button");
                    l.textContent = `Play Video ${a+1}`, l.className = "video-button", l.addEventListener("click", (() => {
                        changeVideo(t)
                    })), e.appendChild(l)
                }))
            }
        } else goFilePlayer(o.playlist, n, t);
    else player(s, i, n, d, t, o.host)
})();
</script>


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
   // document.getElementById("iframe").style.display = "block";    
</script>
<?php    
}else{
?>
<script>
   //alert("Access Denied!");
   document.body.innerHTML = "<center><h2>Access Denied!<h2></center>";
   // document.getElementById("iframe").style.display = "none";
<?php $Iframe = 'false'; ?>
</script>
<?php } ?>