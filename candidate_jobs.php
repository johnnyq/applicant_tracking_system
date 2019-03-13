<?php 

$sql = mysqli_query($mysqli,"SELECT * FROM jobs, companies WHERE jobs.company_id = companies.company_id AND job_openings > 0 ORDER BY job_id DESC"); 

if(mysqli_num_rows($sql) > 0){ 

?>

<legend>Jobs Available</legend>
<div class="table-responsive">
	<table class="table border" id="dt">
		<thead class="thead-light">
			<tr>
				<th>Company</th>
				<th>Job</th>
				<th>Open</th>
				<th>Description</th>
				<th>Created</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_array($sql)){
	            $job_id = $row['job_id'];
	            $job_title = $row['job_title'];
	            $job_description = $row['job_description'];
	            $job_openings = $row['job_openings'];
	            $company_name = $row['company_name'];
	            $company_id = $row['company_id'];
	            $job_created_at = date($config_date_format,$row['job_created_at']);
	        ?>
			<tr>
				<td><?php echo "$company_name"; ?></td>
				<td><?php echo "$job_title"; ?></td>
				<td><?php echo "$job_openings"; ?></td>
				<td><?php echo "$job_description"; ?></td>
				<td><?php echo "$job_created_at"; ?></td>
				<td>
					<button class="btn btn-primary" data-toggle="modal" data-target="#hireModal<?php echo $job_id; ?>"><i class="fa fa-thumbs-up"></i> Hire</button>
				</td>
			</tr>
			<?php
			include("hire_modal.php");

			}
			?>
		</tbody>
	</table>
</div>

<?php

}else{
	echo "There are no jobs right now, you can mark the candidate inactive and call him when new jobs come up...";
}

?>