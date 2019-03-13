<?php include("header.php"); ?>

<?php $sql = mysqli_query($mysqli,"SELECT * FROM jobs, companies WHERE jobs.company_id = companies.company_id ORDER BY job_id DESC"); ?>

<br>
<button href="add_job.php" class="btn btn-primary float-right" data-toggle="modal" data-target="#addJobModal"><i class="fa fa-plus"></i></button>
<div class="table-responsive">
	<table class="table border" id="dt">
		<thead class="thead-light">
			<tr>
				<th>Type</th>
				<th>Job</th>
				<th>Open</th>
				<th>Description</th>
				<th>Company</th>
				<th>Created</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_array($sql)){
	            $job_id = $row['job_id'];
	            $job_title = $row['job_title'];
	            $current_job_type = $row['job_type'];
	            $job_openings = $row['job_openings'];
	            $job_description = $row['job_description'];
	            $company_name = $row['company_name'];
	            $company_id = $row['company_id'];
	            $job_created_at = $row['job_created_at'];
	            $date_added = time_ago($job_created_at);
	        ?>
			<tr>
				<th><?php echo $current_job_type; ?></th>
				<td><?php echo $job_title; ?></td>
				<td><?php echo $job_openings; ?></td>
				<td><?php echo $job_description; ?></td>
				<td><a href="company.php?company_id=<?php echo $company_id; ?>&tab=jobs"><?php echo $company_name; ?></a></td>
				<td><?php echo $date_added; ?></td>
				<td>
					<div class="btn-group">
					  <a href="edit_job.php?job_id=<?php echo $job_id; ?>" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i></a>
					  <a href="post.php?delete_job=<?php echo $job_id; ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-remove"></i></a>
					</div>
				</td>
			</tr>
			
			<?php
			
			}
			
			?>
			
		</tbody>
	</table>
</div>
<?php include("add_job_modal.php"); ?>
<?php include("footer.php"); ?>