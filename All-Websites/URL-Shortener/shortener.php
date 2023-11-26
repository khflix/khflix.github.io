<?php
session_start();

//Configrations
include("config.php");

   // By Qassim Hassan | wp-time.com

	if( !empty($_POST['my-link']) and isset($_SESSION['prevent_repeat']) ){

		$link = $_POST['my-link']; // link from input "my-link" in index.php form

		$id = substr( str_shuffle("ASDFGHJKLZXCVBNMQWERTYUIOP0123456789asdfghjklzxcvbnmqwertyuiop"), 0, 6 ); // create random ID (6 lenght), you can change 6 to your custom number

		$txt_path = "txt-db/"; // txt folder path, you can change it (if you changed it, open robots.txt file and change "txt-db" to your new folder name, robots.txt is file to protection your text database from search engine)

		if( file_exists($txt_path.$id.".txt") ){ // check if ID is taken
			while($id) { // start loop to create a new ID

				$id = substr( str_shuffle("ASDFGHJKLZXCVBNMQWERTYUIOP0123456789asdfghjklzxcvbnmqwertyuiop"), 0, 6 ); // create random ID again (6 lenght)

				if( file_exists($txt_path.$id.".txt") ){ // if ID is taken 
					continue; // if ID is taken: back again to search for available ID
				}else{
					break; // if found available ID: loop will be finished!
				}

			} // end loop
		}

		$create_txt_file = file_put_contents($txt_path.$id.".txt", $link); // create a new txt file and add inside it the long link

		if( $create_txt_file ){
			$website = "$Final_Website_URL"; // enter your website link
			$short_link = $website.$id; // short link
			echo '<br>Your Short Link: <a href="'.$short_link.'" target="_blank">'.$short_link.'</a>';

echo "<script type='text/javascript'>
           window.location = 'index.php?short_link=$short_link'
      </script>"; 
	
		}else{
			echo "We have some errors! Please try later.";

$error = "We have some errors! Please try later.";
echo "<script type='text/javascript'>
           window.location = 'index.php?error=$error'
      </script>"; 
		}

		unset($_SESSION['prevent_repeat']); // Prevent a repeat of the process

	}

	else{
		$error = "empty link or repeated!";
echo "<script type='text/javascript'>
           window.location = 'index.php?error=$error'
      </script>";  // if empty link or repeat process, will be redirect the user to index page
	}

?>