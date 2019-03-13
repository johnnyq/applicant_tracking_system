<?php 

$sql = mysqli_query($mysqli,"SELECT * FROM candidate_work_history, candidates WHERE candidate_work_history.candidate_id = candidates.candidate_id AND company_id = $company_id ORDER BY work_history_id DESC"); 

if(mysqli_num_rows($sql) > 0){ 

?>

<legend>Candidate History</legend>
<div class="table-responsive">
	<table class="table border">
		<thead class="thead-light">
			<tr>
				<th>Candidate</th>
				<th>Job Title</th>
				<th>Date Hired</th>
				<th>Start Date</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_array($sql)){
	            $work_history_id = $row['work_history_id'];
	            $candidate_id = $row['candidate_id'];
	            $work_history_job = $row['work_history_job'];
	        	$hired_date = date("$config_date_format",$row['hired_date']);
	        	$start_date = date("$config_date_format $config_time_format",$row['start_date']);
	        	$start_date_check = $row['start_date'];
	        	if($start_date_check == 0){
	        		$start_date = "Set a start Date";
	        	}
	        	$showed_up = $row['showed_up'];
	        	$first_name = $row['first_name'];
	        	$last_name = $row['last_name'];
	        	if($showed_up == 0){
	        		$showed_status = "Pending Followup";
	        	}elseif($showed_up == 1){
	        		$showed_status = "No Show";
	        	}else{
	        		$showed_status = "Showed up";
	        	}
	        ?>
			<tr>
				<td><a href="candidate.php?candidate_id=<?php echo $candidate_id; ?>&tab=work_history"><?php echo "$first_name $last_name"; ?></a></td>
				<td><?php echo "$work_history_job"; ?></td>
				<td><?php echo "$hired_date"; ?></td>
				<td><?php echo "$start_date"; ?></td>
				<td><?php echo "$showed_status"; ?></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>

<?php

}

?>