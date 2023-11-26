<?php
$path = './config.json';
// JSON data as an array


// vast ads code
$vastCode = "https://bobabillydirect.org";

// player download button
$playerDownload = "true";


$temp =  "https://streampro.fihag47015.workers.dev,https://streampro2.fihag47015.workers.dev,https://helloworldstreampro.fihag47015.workers.dev,https://streampro5.vosodi3559.workers.dev,https://streampro.tiher56899.workers.dev,https://streampro.jicevey694.workers.dev,https://streampro.memap66651.workers.dev,https://streampro.biholat161.workers.dev,https://dstream.moxol15644.workers.dev,https://dstreampro.xeyirar456.workers.dev";
$arr = explode(",",$temp);
// $result2 = '"' . implode ( '", "', $arr ) . '"';
// echo $arr;
// echo $result2; 


$jsonData = [
    "player" => [
        "aboutlink" => "/",
        "abouttext" => "Powered by dstreampro",
        "advertising" => [
            "admessage" => "The ad will end in xx seconds",
            "adTag" => "$vastCode",
            "client" => "vast",
            "offset" => ["1350", "4050", "50%", "post", "pre"],
        ],
        "allowFullscreen" => true,
        "autostart" => false,
        "captions" => [
            "backgroundOpacity" => 0,
            "color" => "#FFFF00",
            "edgeStyle" => "uniform",
            "fontSize" => 15,
        ],
        "fuckadblock" => false,
        "height" => "100%",
        "logo" => ["file" => "#"],
        "mute" => false,
        "playbackRateControls" => true,
        "playerDownload" => $playerDownload,
        "preload" => "metadata",
        "loop" => true,
        "showAD" => true,
        "tracks" => ["kind" => "captions"],
        "width" => "100%",
    ],
    "workers" => 
$arr
];


// Convert JSON data from an array to a string
$jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);

// Write in the file
$fp = fopen($path, 'w');
fwrite($fp, $jsonString);
fclose($fp);

?>