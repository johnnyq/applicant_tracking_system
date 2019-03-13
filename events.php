<?php $sql = mysqli_query($mysqli,"SELECT * FROM users, events WHERE users.user_id = events.user_id AND events.user_id > 0 ORDER BY event_id DESC"); ?>

<div class="table-responsive">
	<table class="table border" id="dt" style="width:100%">
		<thead class="thead-light">
			<tr>
				<th>Date</th>
				<th>Type</th>
				<th>Event</th>
				<th>User</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_array($sql)){
	            $event_id = $row['event_id'];
	            $event_type = $row['event_type'];
	            $event_description = $row['event_description'];
	            $event_created_at = date("$config_date_format $config_time_format",$row['event_created_at']);
	            $user_id = $row['user_id'];
	            $first_name = $row['first_name'];
	        ?>
			
			<tr>
				<td><?php echo $event_created_at; ?></td>
				<td><?php echo $event_type; ?></td>
				<td><?php echo $event_description; ?></td>
				<td><?php echo $first_name; ?></td>
			</tr>
			
			<?php
			}
			?>

		</tbody>
	</table>
</div>