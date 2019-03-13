<?php
	
	session_start();
	
	if(!$_SESSION['candidate_logged']){
	    header("Location: index.php");
	    die;
	}

	$session_candidate_id = $_SESSION['candidate_id'];

	$sql = mysqli_query($mysqli,"SELECT * FROM candidates, locations WHERE candidates.location_applied_at = locations.location_id AND candidate_id = $session_candidate_id");
	$row = mysqli_fetch_array($sql);
	$session_candidate_first_name = $row['first_name'];
	$session_candidate_last_name = $row['last_name'];
	$session_candidate_email = $row['email'];
	$session_candidate_avatar = $row['candidate_avatar'];
	$session_location = $row['location_name'];

	$session_agree_terms = $row['agree_terms'];

	$date = date("U");
	mysqli_query($mysqli,"UPDATE candidates SET online = $date WHERE candidate_id = $session_candidate_id");

?>