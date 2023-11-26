<?php

	// By Qassim Hassan | wp-time.com

	if( isset($_GET['id']) ){

		$id = $_GET['id']; // short link ID
		
		if( file_exists("txt-db/$id.txt") ){ // check if the ID is has txt file in "txt-db" folder
			$get_long_link = file_get_contents("txt-db/$id.txt"); // get the long link from txt file
			header("location: $get_long_link"); // redirect the user to the long link!
		}else{
			$error = "invalid short link or deleted";
echo "<script type='text/javascript'>
           window.location = 'index.php?error=$error'
      </script>";  // if invalid ID (invalid short link or deleted), will be redirect the user to index page
		}

	}

	else{
		header("location: index.php");
	}

?>