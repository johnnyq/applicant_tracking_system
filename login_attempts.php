<?php $sql = mysqli_query($mysqli,"SELECT * FROM events WHERE candidate_id = 0 AND user_id = 0 ORDER BY event_id DESC"); ?>

<div class="table-responsive">
	<table class="table border" id="dt" style="width:100%">
		<thead class="thead-light">
			<tr>
				<th>Date</th>
				<th>Type</th>
				<th>Event</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_array($sql)){
	            $event_id = $row['event_id'];
	            $event_type = $row['event_type'];
	            $event_description = $row['event_description'];
	            $event_created_at = date("$config_date_format $config_time_format",$row['event_created_at']);
	        ?>
			
			<tr>
				<td><?php echo $event_created_at; ?></td>
				<td><?php echo $event_type; ?></td>
				<td><?php echo $event_description; ?></td>
			</tr>
			
			<?php
			}
			?>

		</tbody>
	</table>
</div>