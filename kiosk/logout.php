<?php 
	
	include("../config.php");
	include("check_login.php");
	
	mysqli_query($mysqli,"UPDATE candidates SET online = 0 WHERE candidate_id = $session_candidate_id");

	session_start();
	session_destroy();
	header('Location: login.php');

?>