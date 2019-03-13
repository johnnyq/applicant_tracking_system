<?php

include("config.php");

if(isset($_GET['q'])){
	$q = $_GET['q'];
	$sql = mysqli_query($mysqli,"SELECT * FROM users WHERE email = '$q'");
	if(mysqli_num_rows($sql) == 1){

		$row = mysqli_fetch_array($sql);
		$avatar = $row['avatar'];

		echo "<h1>HELLO</h1>";
	}
}

?>