<?php include("header.php"); ?>

<div class="row">
	<?php
	$sql = mysqli_query($mysqli,"SELECT * FROM users, locations WHERE users.current_location_id = locations.location_id AND online >= UNIX_TIMESTAMP(DATE_ADD(NOW(),INTERVAL -$session_timeout SECOND))");
	$online_user_count = mysqli_num_rows($sql);
	if($online_user_count > 0){

	?>

		<div class="col">
			<div class="card text-center">
			  <div class="card-header">
			    Users Online
			  </div>
			  <div class="card-body">
			    <h5 class="card-title"></h5>
			    <div class="row">
			   		<?php
					while($row = mysqli_fetch_array($sql))
					{
					 	$first_name = ucwords($row['first_name']);
					 	$avatar = $row['avatar'];
					 	$location_name = $row['location_name'];
					 	$last_login = time_ago($row['last_login']);
					?>

			    	<div class="col">
					    <img height="128" width="128" class="img-fluid rounded-circle" src="<?php echo $avatar; ?>">
						<p><?php echo $first_name; ?><br><small><?php echo $location_name; ?></small><br><small class="text-muted"><?php echo $last_login; ?></small></p>
					</div>
					<?php } ?>
			  	</div>
			  </div>
			  <div class="card-footer text-muted">
			    There are <?php echo $online_user_count; ?> user(s) online.
			  </div>
			</div>
		</div>
	
	<?php
	}
	?>	

	<?php
	$sql = mysqli_query($mysqli,"SELECT * FROM users, candidates WHERE users.user_id = candidates.candidate_updated_by AND candidates.current_status = 'Interviewing'");
	$interviewing_count = mysqli_num_rows($sql);
	if($interviewing_count > 0){
	?>

		<div class="col">
			<div class="card text-center">
			  <div class="card-header">
			    Employees Interviewing Candidates
			  </div>
			  <div class="card-body">
			    <h5 class="card-title"></h5>
			    <div class="row">
			    	<?php
					while($row = mysqli_fetch_array($sql))
					{
					 	$first_name = ucwords($row['first_name']);
					 	$last_name = ucwords($row['last_name']);
					 	$avatar = $row['avatar'];
						$candidate_id = $row['candidate_id'];
					?>
			    	<div class="col">
					    <img height="128" width="128" class="img-fluid" src="<?php echo $avatar; ?>">
						<p><a href="<?php echo "candidate.php?candidate_id=$candidate_id"; ?>"><?php echo "$first_name $last_name"; ?></a><br><small class="text-muted">Now Interviewing</small></p>
					</div>
				<?php } ?>
			  	</div>
			  </div>
			  <div class="card-footer text-muted">
			    <?php echo $interviewing_count; ?> candidate(s) being interviewed.
			  </div>
			</div>
		</div>
	<?php } ?>


	<?php
	$sql = mysqli_query($mysqli,"SELECT * FROM candidates WHERE current_status LIKE 'Applying%'");
	$applying_count = mysqli_num_rows($sql);
	if($applying_count > 0){
	?>

		<div class="col">
			<div class="card text-center">
			  <div class="card-header">
			    Candidates Current Applying
			  </div>
			  <div class="card-body">
			    <h5 class="card-title"></h5>
			    <div class="row">
			    	<?php
					while($row = mysqli_fetch_array($sql))
					{
					 	$first_name = ucwords($row['first_name']);
					 	$last_name = ucwords($row['last_name']);
					 	$current_status = $row['current_status'];
						$candidate_avatar = $row['candidate_avatar'];
						$candidate_id = $row['candidate_id'];
					?>
			    	<div class="col">
						<a href="<?php echo "candidate.php?candidate_id=$candidate_id"; ?>">
							<img height="128" width="128" class="img-fluid rounded-circle" src="<?php echo $candidate_avatar; ?>">
							<p><?php echo "$first_name $last_name"; ?></a><br><small class="text-muted"><?php echo $current_status; ?></small></p>
					</div>
				<?php } ?>
			  	</div>
			  </div>
			  <div class="card-footer text-muted">
			    <?php echo $applying_count; ?> potential candidate(s) applying.
			  </div>
			</div>
		</div>
	<?php } ?>

	<?php
	$sql = mysqli_query($mysqli,"SELECT * FROM candidates WHERE online >= UNIX_TIMESTAMP(DATE_ADD(NOW(),INTERVAL -$session_timeout SECOND))");
	$online_candidate_count = mysqli_num_rows($sql);
	if($online_candidate_count > 0){

	?>

		<div class="col">
			<div class="card text-center">
			  <div class="card-header">
			    Candidates Online
			  </div>
			  <div class="card-body">
			    <h5 class="card-title"></h5>
			    <div class="row">
			   		<?php
					while($row = mysqli_fetch_array($sql))
					{
					 	$first_name = $row['first_name'];
					 	$last_name = $row['last_name'];
						$last_login = time_ago($row['last_login']);
						$candidate_avatar = $row['candidate_avatar'];
					?>

			    	<div class="col">
					    <img height="128" width="128" class="img-fluid rounded-circle" src="<?php echo $candidate_avatar; ?>">
						<p><?php echo "$first_name $last_name"; ?><br><small class="text-muted"><?php echo $last_login; ?></small></p>
					</div>
					<?php } ?>
			  	</div>
			  </div>
			  <div class="card-footer text-muted">
			    There are <?php echo $online_candidate_count; ?> candidate(s) online.
			  </div>
			</div>
		</div>
	
	<?php
	}
	?>	

<?php include("footer.php"); ?>