<?php 
	
	include("config.php");
	include("check_login.php");
	
	mysqli_query($mysqli,"UPDATE users SET online = 0 WHERE user_id = $session_user_id");

	session_start();
	session_destroy();
	header('Location: login.php');

?>