<?php
//Configrations

//Define 'url-shortner' Directory path
$url_shortner_Path = "Index_Resources/indexer/URL-Shortener";

//Folder to store urls
$folder = "txt-db";

//Get Domain URL
include("GetDomainURL.php");
$DomainURL = "$GetDomainURL";

//Final Website URL
$Final_Website_URL=  "$DomainURL/$url_shortner_Path/";
?>