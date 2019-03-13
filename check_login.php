<?php
	
	session_start();
	
	if(!$_SESSION['logged']){
	    header("Location: login.php");
	    die;
	}

	$session_user_id = $_SESSION['user_id'];

	$sql = mysqli_query($mysqli,"SELECT * FROM users, locations WHERE users.current_location_id = locations.location_id AND user_id = $session_user_id");
	$row = mysqli_fetch_array($sql);
	$session_first_name = $row['first_name'];
	$session_last_name = $row['last_name'];
	$session_title = $row['title'];
	$session_avatar = $row['avatar'];
	$session_current_location_id = $row['current_location_id'];
	$session_current_location_name = $row['location_name'];
	$session_access = $row['user_access'];
	$session_current_location_timezone = $row['location_timezone'];
	$session_timeout = ini_get("session.gc_maxlifetime");

	date_default_timezone_set("$session_current_location_timezone");

	$date = date("U");
	mysqli_query($mysqli,"UPDATE users SET online = $date WHERE user_id = $session_user_id");

?>