<?php $sql = mysqli_query($mysqli,"SELECT * FROM users, locations WHERE users.current_location_id = locations.location_id ORDER BY user_id ASC"); ?>

<a href="add_user.php" class="btn btn-primary float-right"><i class="fa fa-user-plus"></i></a>
<br><br>
<div class="table-responsive">
	<table class="table border">
		<thead class="thead-light">
			<tr>
				<th class="text-center">Name</th>
				<th>Contact</th>
				<th>Location</th>
				<th>Created/Last Login</th>
				<th>Access</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_array($sql)){
	            $user_id = $row['user_id'];
	            $first_name = $row['first_name'];
	            $last_name = $row['last_name'];
	            $title = $row['title'];
	            $email = $row['email'];
	            $phone = $row['phone'];
	            if(strlen($phone)>2){ $phone = substr($row['phone'],0,3)."-".substr($row['phone'],3,3)."-".substr($row['phone'],6,4);}
	            $avatar = $row['avatar'];
	            $location_name = $row['location_name'];
	            $user_created = date("$config_date_format $config_time_format",$row['user_created']);
	            $last_login = $row['last_login'];
	            if($last_login == 0){
	    			$last_login = "<div class='text-danger'>Never Logged in</div>"; 
			    }else{
			    	$last_login = date("$config_date_format $config_time_format",$row['last_login']);
			    	$last_login = "<div class='text-secondary'>$last_login</div>";
			    }
	            $user_access = $row['user_access'];
	            if($user_access == 2) {
	            	$user_access = "<div class='text-primary'>Admin</div>";
	            }elseif($user_access == 1) {
	            	$user_access = "<div class='text-success'>User</div>";
	            }else{
	            	$user_access = "<div class='text-danger'>Inactive</div>";
	            }


	        ?>
				<tr>
					<td class="text-center">
						<img height="84" width="84" class="img-fluid rounded-circle" src="<?php echo "$avatar"; ?>">
						<div class="text-secondary"><?php echo "$first_name $last_name"; ?></div>
					</td>
					<td>
						<?php echo "$phone"; ?>
						<br>
						<a href="mailto:<?php echo $email; ?>" class="text-secondary"><?php echo "$email"; ?></a>
						<br>
						<div class="text-secondary"><?php echo $title; ?></div>		
					</td>
					<td><?php echo $location_name; ?></td>
					<td><?php echo $user_created; ?><br><?php echo $last_login; ?></td>
					<td><?php echo $user_access; ?></td>
					<td>
						<a href="edit_user.php?user_id=<?php echo $user_id; ?>" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
			<?php
			}
			?>

		</tbody>
	</table>
</div>