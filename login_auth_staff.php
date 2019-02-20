<?php

	include('database/db_config.php');
	session_start();

	$error = "";

	$username = "";
	$passwd = "";
	
	$db = new Database();

	if ( isset($_POST['username']) && isset($_POST['passwd']) && 
			$_POST['username'] != "" && $_POST['passwd'] != "") {
		
		$username = mysqli_real_escape_string($db->get_connection(), $_POST['username']);
		$passwd = mysqli_real_escape_string($db->get_connection(), $_POST['passwd']);

	} else {
		echo err."Username or Password cannot be empty :( <br/>";
	}

	$res = $db->staff_exists($username, $passwd);
	
	if ( !$res && $db->errno )
		die($db->get_error_msg());

	if ( $res['exists'] ) {

		$_SESSION['login_staff'] = $username;
		$_SESSION['staff_level'] = $res['level'];
		$lvl = $res['level'];
		
		if ( $lvl == 0 )
			header("location: staff_index_lvl0.php");
		else if ( $lvl == 1 )
			header("location: staff_index_lvl1.php");
		else if ( $lvl == 2 )
			header("location: staff_index_lvl2.php");

	} else {
		$error = err."Username or Password Invalid :(";
	}

	if ( $error != "" ) {
		echo "\n".$error;
	}
		

	session_commit();
?>