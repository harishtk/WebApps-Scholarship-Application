<?php 

	$target_dir = "uploads/";

	$target_file = $target_dir.basename("PROF_IMG_174202".'.'.strtolower(pathinfo($_FILES['prof_img']['name'], PATHINFO_EXTENSION)));

	if ( move_uploaded_file($_FILES['prof_img']['tmp_name'], $target_file) ) {
		echo "File Upload Successful!<br>";
		echo "File Path: ".basename($target_file);
	} else {
		echo "<br>File Upload Failed :(";
	}

	chdir("uploads");

	echo "<br>".getcwd();

	foreach (scandir('174202') as $value) {
		echo "<br>$value";
	}
 ?>