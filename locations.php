<?php $sql = mysqli_query($mysqli,"SELECT * FROM locations ORDER BY location_id DESC"); ?>

<br>

<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addLocationModal"><i class="fa fa-plus"></i></button>
<div class="table-responsive">
	<table class="table border" id="dt">
		<thead class="thead-light">
			<tr>
				<th>Location</th>
				<th>Address</th>
				<th>TimeZone</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_array($sql)){
	            $location_id = $row['location_id'];
	            $location_name = $row['location_name'];
	            $location_address = $row['location_address'];
	            $location_city = $row['location_city'];
	            $location_state = $row['location_state'];
	            $location_zip = $row['location_zip'];
	            $location_timezone = $row['location_timezone'];
	        ?>
			
			<tr>
				<th><?php echo $location_name; ?></th>
				<td>
					<?php echo $location_address; ?>
					<br>
					<?php echo "$location_city $location_state $location_zip"; ?>		
				</td>
				<td><?php echo $location_timezone; ?></td>
				<td>  
			    	<button class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#editLocationModal<?php echo $location_id; ?>"><i class="fa fa-edit"></i></button>
				</td>
			</tr>
			<?php include("edit_location_modal.php"); ?>
			<?php
			}
			?>

		</tbody>
	</table>
</div>

<?php include("add_location_modal.php"); ?>