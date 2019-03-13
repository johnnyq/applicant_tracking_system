<?php include("header.php"); ?>
<?php 

	$registered_count = mysqli_num_rows(mysqli_query($mysqli,"SELECT candidate_id FROM candidates WHERE current_status = 'Registered'"));
	$applying_count = mysqli_num_rows(mysqli_query($mysqli,"SELECT candidate_id FROM candidates WHERE current_status LIKE 'Applying%'"));
	$pending_count = mysqli_num_rows(mysqli_query($mysqli,"SELECT candidate_id FROM candidates WHERE current_status = 'Pending Interview'"));
	$interviewing_count = mysqli_num_rows(mysqli_query($mysqli,"SELECT candidate_id FROM candidates WHERE current_status = 'Interviewing'"));
	$hired_count = mysqli_num_rows(mysqli_query($mysqli,"SELECT candidate_id FROM candidates WHERE current_status = 'Hired - Followup'"));
	$placed_count = mysqli_num_rows(mysqli_query($mysqli,"SELECT candidate_id FROM candidates WHERE current_status = 'Placed'"));
	$inactive_count = mysqli_num_rows(mysqli_query($mysqli,"SELECT candidate_id FROM candidates WHERE current_status = 'Inactive'"));
	$do_not_hire_count = mysqli_num_rows(mysqli_query($mysqli,"SELECT candidate_id FROM candidates WHERE current_status = 'Do Not Hire'"));

	if(isset($_GET['tab'])){
		if($_GET['tab'] == "registered") {
			$status = "Registered";
		}elseif($_GET['tab'] == "applying") {
			$status = "Applying%";
		}elseif($_GET['tab'] == "pending") {
			$status = "Pending Interview";
		}elseif($_GET['tab'] == "interviewing") {
			$status = "Interviewing";
		}elseif($_GET['tab'] == "hired") {
			$status = "Hired - Followup";
		}elseif($_GET['tab'] == "placed") {
			$status = "Placed";
		}elseif($_GET['tab'] == "inactive") {
			$status = "Inactive";
		}elseif($_GET['tab'] == "do_not_hire") {
			$status = "Do Not Hire";
		}
	}else{
		$status = "%";
	}
 
?>

<?php $sql = mysqli_query($mysqli,"SELECT * FROM candidates, locations WHERE candidates.location_applied_at = locations.location_id AND current_status LIKE '$status' ORDER BY candidate_id DESC"); ?>

<nav class="nav nav-pills nav-justified nav-fill bg-light p-2 border mb-4 mt-2">
  <?php if($registered_count > 0 ){ ?>
  <a class="nav-item nav-link <?php if( $_GET['tab'] == "registered" ) { echo "active"; } ?>" href="?tab=registered">Registered
	  <br>
	  <span class="badge badge-pill badge-secondary"><?php echo $registered_count; ?></span>
  </a>
  <?php } ?>
  <?php if($applying_count > 0 ){ ?>
  <a class="nav-item nav-link <?php if( $_GET['tab'] == "applying" ) { echo "active"; } ?>" href="?tab=applying">Applying
  	<br>
  	<span class="badge badge-pill badge-secondary"><?php echo $applying_count; ?></span>
  </a>
  <?php } ?>
  <?php if($pending_count > 0 ){ ?>
  <a class="nav-item nav-link <?php if( $_GET['tab'] == "pending" ) { echo "active"; } ?>" href="?tab=pending">Pend Interview
  	<br>
  	<span class="badge badge-pill badge-secondary"><?php echo $pending_count; ?></span>
  </a>
  <?php } ?>
  <?php if($interviewing_count > 0 ){ ?>
  <a class="nav-item nav-link <?php if( $_GET['tab'] == "interviewing" ) { echo "active"; } ?>" href="?tab=interviewing">Interviewing
  	<br>
  	<span class="badge badge-pill badge-secondary"><?php echo $interviewing_count; ?></span>
  </a>
  <?php } ?>
  <?php if($hired_count > 0 ){ ?>
  <a class="nav-item nav-link <?php if( $_GET['tab'] == "hired" ) { echo "active"; } ?>" href="?tab=hired">Followup
  	<br>
  	<span class="badge badge-pill badge-secondary"><?php echo $hired_count; ?></span>
  </a>
  <?php } ?>
  <?php if($placed_count > 0 ){ ?>
  <a class="nav-item nav-link <?php if( $_GET['tab'] == "placed" ) { echo "active"; } ?>" href="?tab=placed">Placed
  	<br>
  	<span class="badge badge-pill badge-secondary"><?php echo $placed_count; ?></span>
  </a>
  <?php } ?>
  <?php if($inactive_count > 0 ){ ?>
  <a class="nav-item nav-link <?php if( $_GET['tab'] == "inactive" ) { echo "active"; } ?>" href="?tab=inactive">Inactive
  	<br>
  	<span class="badge badge-pill badge-secondary"><?php echo $inactive_count; ?></span>
  </a>
  <?php } ?>
  <?php if($do_not_hire_count > 0 ){ ?>
  <a class="nav-item nav-link <?php if( $_GET['tab'] == "do_not_hire" ) { echo "active"; } ?>" href="?tab=do_not_hire">Do Not Hire
  	<br>
  	<span class="badge badge-pill badge-secondary"><?php echo $do_not_hire_count; ?></span>
  </a>
  <?php } ?>
</nav>


<div class="table-responsive">
	<table class="table border" id="dt" style="width:100%">
		<thead class="thead-light">
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>Contact</th>
				<th>Created</th>
				<th>Status</th>
				<th>Last Modified</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_array($sql)){
	            $candidate_id = $row['candidate_id'];
	            $first_name = $row['first_name'];
	            $last_name = $row['last_name'];
	            $address = $row['address'];
	            $city = $row['city'];
	            $state = $row['state'];
	            $zip = $row['zip'];
	            $email = $row['email'];
	            $phone = $row['phone'];
	            if(strlen($phone)>2){ $phone = substr($row['phone'],0,3)."-".substr($row['phone'],3,3)."-".substr($row['phone'],6,4);}
	            $candidate_avatar = $row['candidate_avatar'];
	            $location_name = $row['location_name'];
	            $created_date = time_ago($row['candidate_created_at']);
	            $updated_date = time_ago($row['candidate_updated_at']);
	            $candidate_updated_by = $row['candidate_updated_by'];
				$new_status = $row['current_status'];
				if($new_status == "Placed"){
					$sql2 = mysqli_query($mysqli,"SELECT * FROM candidate_work_history, companies WHERE candidate_work_history.company_id = companies.company_id AND candidate_id = $candidate_id AND showed_up = 2 ORDER BY work_history_id DESC LIMIT 1");
					$row2 = mysqli_fetch_array($sql2);
					$company_id = $row2['company_id'];
					$company_name = $row2['company_name'];
					$start_date = date($config_date_format,$row2['start_date']);
					$new_status = "Placed <a href='company.php?company_id=$company_id&tab=history'>$company_name</a><br><div class='text-secondary'>$start_date</div>";
				}elseif($new_status == "Hired - Followup"){
					$sql3 = mysqli_query($mysqli,"SELECT * FROM candidate_work_history, companies WHERE candidate_work_history.company_id = companies.company_id AND candidate_id = $candidate_id AND showed_up = 0 ORDER BY work_history_id DESC LIMIT 1");
					$row3 = mysqli_fetch_array($sql3);
					$company_id = $row3['company_id'];
					$company_name = $row3['company_name'];
					$start_date_check = $row3['start_date'];
					$start_date = date($config_date_format,$row3['start_date']);
					if($start_date_check == 0){
						$new_status = "Hired <a href='company.php?company_id=$company_id&tab=history'>$company_name</a><br><div class='text-secondary'>Followup to set a start date.</div>";
					}else{
						$new_status = "Hired <a href='company.php?company_id=$company_id&tab=history'>$company_name</a><br><div class='text-secondary'>Followup on $start_date</div>";
					}
				}elseif($new_status == "Interviewing"){
					$sql4 = mysqli_query($mysqli,"SELECT first_name, last_name FROM users WHERE user_id = $candidate_updated_by");
					$row4 = mysqli_fetch_array($sql4);
					$user_first_name = $row4['first_name'];
					$user_last_name = $row4['last_name'];
					$new_status = "Being Interviewed<div class='text-secondary'>$user_first_name $user_last_name</div>";
				}

	        ?>
			
			<tr>
				<td class="text-center">
					<a href="candidate.php?candidate_id=<?php echo $candidate_id; ?>">
						<img class="img-fluid rounded-circle" height="64" width="64" src="<?php echo $candidate_avatar; ?>">
						<div class="text-secondary" href=><?php echo "$first_name $last_name"; ?></div>
						</a>
				</td>
				<td>
					<?php echo "$address"; ?>
					<br>
					<?php echo "$city $state $zip"; ?>		
				</td>
				<td>
					<?php echo "$phone"; ?>
					<br>
					<a href="mailto:<?php echo $email; ?>" class="text-secondary"><?php echo "$email"; ?></a>
				</td>
				<td>
					<?php echo "$created_date"; ?>
					<div class="text-secondary"><?php echo $location_name; ?></div>
				</td>
				<td><?php echo "$new_status"; ?></td>
				<td><?php echo $updated_date; ?></td>
			</tr>
			
			<?php
			}
			?>

		</tbody>
	</table>
</div>


<?php include("footer.php"); ?>