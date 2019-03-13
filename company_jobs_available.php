<?php $sql = mysqli_query($mysqli,"SELECT * FROM jobs WHERE company_id = $company_id AND job_openings > 0 ORDER BY job_id DESC"); ?>

<legend>Jobs</legend>
<div class="table-responsive">
	<table class="table border">
		<thead class="thead-light">
			<tr>
				<th>Job</th>
				<th>Created</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_array($sql)){
	            $job_id = $row['job_id'];
	            $job_title = $row['job_title'];
	            $job_description = $row['job_description'];
	            $job_openings = $row['job_openings'];
	            $job_created_at = date("$config_date_format",$row['job_created_at']);
	        ?>

			<tr>
				<td>
					<strong><?php echo "$job_title"; ?></strong>
					<br>
					<small class="text-secondary"><?php echo "$job_description"; ?></small>	
				</td>
			
				<td><?php echo "$job_created_at"; ?></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>