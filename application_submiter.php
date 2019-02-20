 <?php

 	echo "<h1>Variables Passed</h1>";

 	foreach ($_POST as $key => $value) {

 		echo "<p>Key: ".$key."<br>Value: ".$value."</p>";
 	}

 	echo date('d-m-Y', strtotime($_POST['date']));
 ?>