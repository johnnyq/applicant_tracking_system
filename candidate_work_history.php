<?php 

$sql = mysqli_query($mysqli,"SELECT * FROM candidate_work_history, companies WHERE candidate_work_history.company_id = companies.company_id AND candidate_work_history.candidate_id = $candidate_id ORDER BY work_history_id DESC"); 

if(mysqli_num_rows($sql) > 0){ 

?>

<legend>Work History</legend>
<div class="table-responsive">
	<table class="table border">
		<thead class="thead-light">
			<tr>
				<th>Job</th>
				<th>Hire Date</th>
				<th>Start Date</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_array($sql)){
	            $work_history_id = $row['work_history_id'];
	            $work_history_job = $row['work_history_job'];
	            $company_name = $row['company_name'];
	            $company_id = $row['company_id'];
	        	$hired_date = date("$config_date_format",$row['hired_date']);
	        	$start_date_time = date("$config_date_format $config_time_format",$row['start_date']);
	        	$start_date_check = $row['start_date'];
	        	if($start_date_check == 0){
	        		$start_date_time = "Please set a start date!";
	        	}
	        	$start_date = date("$config_date_format",$row['start_date']);
	        	$start_time = date("H:i",$row['start_date']);
	        	$showed_up = $row['showed_up'];
	        	if($showed_up == 0){
	        		$showed_status = "Pending Followup";
	        	}elseif($showed_up == 1){
	        		$showed_status = "No Show";
	        	}else{
	        		$showed_status = "Showed up";
	        	}
	        ?>
			<tr>
				<td>
					<strong><a href="company.php?company_id=<?php echo $company_id; ?>"><?php echo "$company_name"; ?></a></strong>
					<br>
					<div class="text-secondary"><?php echo "$work_history_job"; ?></div>
				<td><?php echo $hired_date; ?></td>
				<td><?php echo $start_date_time; ?></td>
				<td><?php echo $showed_status; ?></td>
				<td>
					<?php if($showed_up == 0) { ?>
						<?php if($start_date_check != 0){ ?>
							<button class="btn btn-primary" data-toggle="modal" data-target="#followupWorkHistoryModal<?php echo $work_history_id; ?>">Followup</button>
						<?php } ?>
					<button class="btn btn-primary" data-toggle="modal" data-target="#modifyWorkHistoryModal<?php echo $work_history_id; ?>"><i class="fa fa-calendar"></i></button>
					<?php } ?>
			    </td>
			</tr>
			<?php
			
			if($showed_up == 0) {
				include("followup_work_history_modal.php");
				include("modify_work_history_modal.php");
			}
			
			?>
			<?php
			}
			?>
		</tbody>
	</table>
</div>

<?php

}

?>