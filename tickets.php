<?php include("header.php"); ?>

<?php $sql = mysqli_query($mysqli,"SELECT * FROM tickets, users WHERE user_id = ticket_created_by ORDER BY ticket_id DESC"); ?>

<br>
<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addTicketModal"><i class="fa fa-plus"></i></button>
<div class="table-responsive">
	<table class="table border" id="dt">
		<thead class="thead-light">
			<tr>
				<th>Status</th>
				<th>Created</th>
				<th>Subject</th>
				<th>Opened By</th>
				<th>Body</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_array($sql)){
	            $ticket_id = $row['ticket_id'];
	            $ticket_status = $row['ticket_status'];
	            $ticket_subject = $row['ticket_subject'];
	            $ticket_body = $row['ticket_body'];
	            $first_name = $row['first_name'];
	            $last_name = $row['last_name'];
	            $ticket_closed_at = time_ago($row['ticket_closed_at']);
	            $ticket_created_at = time_ago($row['ticket_created_at']);
	        ?>
			
			<tr>
				<th><?php echo $ticket_status; ?></th>
				<td><?php echo $ticket_created_at; ?></td>
				<td><?php echo $ticket_subject; ?></td>
				<td><?php echo "$first_name $last_name"; ?></td>
				<td><?php echo $ticket_body; ?></td>
			</tr>

			<?php
			}
			?>

		</tbody>
	</table>
</div>

<?php include("add_ticket_modal.php"); ?>

<?php include("footer.php"); ?>