<?php include("header.php"); ?>

<?php

if(isset($_GET['candidate_id'])){
	$candidate_id = intval($_GET['candidate_id']);

	$sql = mysqli_query($mysqli,"SELECT * FROM candidates, locations WHERE location_applied_at = location_id AND candidate_id = $candidate_id");
	$row = mysqli_fetch_array($sql);

	$first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $address = $row['address'];
    $city = $row['city'];
    $state = $row['state'];
    $zip = $row['zip'];
    $email = $row['email'];
    $phone = $row['phone'];
    if(strlen($phone)>2){ $phone = substr($row['phone'],0,3)."-".substr($row['phone'],3,3)."-".substr($row['phone'],6,4);}
    $birth_day = $row['birth_day'];
    $candidate_avatar = $row['candidate_avatar'];
    $location_name = $row['location_name'];
    $last_login = $row['last_login'];
    if($last_login == 0){
    	$last_login = "Never Logged in"; 
    }else{
    	$last_login = date("$config_date_format $config_time_format",$row['last_login']);
    }
    $candidate_created_at = date("$config_date_format $config_time_format",$row['candidate_created_at']);
    $age = date_diff(date_create($birth_day), date_create('now'))->y;
    $status = $row['current_status'];

?>

<nav>
  <ol class="breadcrumb border">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="candidates.php">Candidates</a></li>
    <li class="breadcrumb-item active"><?php echo "$first_name $last_name"; ?></li>
  </ol>
</nav>

<div class="row">
	<div class="col-sm-3">
		<div class="card mb-3">
		  <a href="#" data-toggle="modal" data-target="#changeCandidateAvatar"><img class="card-img-top img-fluid rounded-circle p-2" src="<?php echo $candidate_avatar; ?>"></a>
		  <h4 class="text-center"><?php echo "$first_name $last_name"; ?></h4>
		  <h6 class="text-secondary text-center"><i class="fa fa-info"></i> <?php echo "$status"; ?></h6>
		  <?php if($status == 'Interviewing') { ?>
		  	<a href="candidate.php?candidate_id=<?php echo $candidate_id; ?>&tab=jobs" class="btn <?php if($_GET['tab'] == "jobs") { echo "btn-primary"; }else{ echo "btn-outline-primary"; } ?> p-2 my-2 mx-4">Hire</a>
		  <?php
		  }
		  ?>
		  <?php 
		  if($status == 'Pending Interview' or $status == 'Placed' or $status == 'Inactive'){ 
		  ?>
		  	<a href="post.php?interview_candidate=<?php echo $candidate_id; ?>" class="btn btn-outline-success p-2 my-2 mx-4">Interview</a>
		  <?php 
		  }
		  ?>
		  <?php 
		  if($status == 'Pending Interview' or $status == 'Do Not Hire' or $status == 'Placed' or $status == 'Interviewing'){
		  ?>
		  <a href="post.php?inactive_candidate=<?php echo $candidate_id; ?>" class="btn btn-outline-secondary p-2 my-2 mx-4">Inactive</a>
		  
		  <?php 
		  }
		  ?>
		  <?php
		  if($status != "Do Not Hire"){
		  ?>
		  <a href="post.php?do_not_hire_candidate=<?php echo $candidate_id; ?>" class="btn btn-outline-danger p-2 mb-3 mt-2 mx-4">Do Not Hire</a>
		  <?php
		  }
		  ?>
		  <ul class="list-group list-group-flush">
		   	<li class="list-group-item">
				<strong><i class="fa fa-map-marker"></i> Address</strong>
				<br>
				<a class="text-secondary" href="https://maps.google.com?q=<?php echo "$address $zip"; ?>" target="_blank"><?php echo $address; ?><br><?php echo "$city $state $zip"; ?></a>
			</li>
			<li class="list-group-item">
				<strong><i class="fa fa-envelope"></i> Email</strong>
				<br>
				<a href="mailto:<?php echo $email; ?>" class="text-secondary"><?php echo $email; ?></a>
			</li>
			<li class="list-group-item">
				<strong><i class="fa fa-phone"></i> Phone</strong>
				<br>
				<div class="text-secondary"><?php echo $phone; ?></div>
			</li>
			<li class="list-group-item">
				<strong><i class="fa fa-gift"></i> Birthday</strong>
				<br>
				<div class="text-secondary"><?php echo "$birth_day ($age)"; ?></div>
			</li>
			<li class="list-group-item">
				<strong><i class="fa fa-lock"></i> Last Login</strong> 
				<br>
				<div class="text-secondary"><?php echo $last_login; ?></div>
			</li>
			<li class="list-group-item">
				<strong><i class="fa fa-map-marker"></i> Location</strong>
				<div class="text-secondary"><?php echo $location_name; ?></div>
			</li>
			<li class="list-group-item">
				<strong><i class="fa fa-clock-o"></i> Created</strong> 
				<br>
				<div class="text-secondary"><?php echo $candidate_created_at; ?></div>
			</li>
			<li class="list-group-item">
				<a href="edit_candidate.php?candidate_id=<?php echo "$candidate_id"; ?>" class="btn btn-outline-secondary"><i class="fa fa-edit"></i> Edit</a>
				<?php if($status == 'Registered' or $status == 'Applying - Personal' or $status == 'Applying - Education' or $status == 'Applying - Employment' or $status == 'Applying - References' or $status == 'Applying - Verifying'){ ?>
				<a href="post.php?delete_candidate=<?php echo "$candidate_id"; ?>" class="btn btn-outline-danger pull-right"><i class="fa fa-trash"></i> Delete</a>
				<?php } ?>
			</li>
		  </ul>
		</div>
	</div>

	<div class="col-sm-9">
		<?php include("candidate_nav.php"); ?>
		<?php
		if(isset($_GET['tab'])){
			if($_GET['tab'] == "education") {
				include("candidate_education.php");
			}elseif($_GET['tab'] == "employment") {
				include("candidate_employment.php");
			}elseif($_GET['tab'] == "references") {
				include("candidate_references.php");
			}elseif($_GET['tab'] == "work_history") {
				include("candidate_work_history.php");
			}elseif($_GET['tab'] == "jobs") {
				include("candidate_jobs.php");
			}elseif($_GET['tab'] == "files") {
				include("candidate_files.php");
			}elseif($_GET['tab'] == "notes") {
				include("candidate_notes.php");
			}
		}else{
			include("candidate_education.php");
		}
 
		?>

	</div>
</div>

<?php include("change_candidate_avatar_modal-OLD.php"); ?>

<?php

}

?>

<?php include("footer.php"); ?>