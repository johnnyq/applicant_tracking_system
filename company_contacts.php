<?php 

$sql = mysqli_query($mysqli,"SELECT * FROM contacts WHERE company_id = $company_id ORDER BY contact_id DESC"); 

if(mysqli_num_rows($sql) > 0){ 

?>

<legend>Contacts 
	<button type="button" class="btn btn-dark pull-right" data-toggle="modal" data-target="#addContactModal">
		<i class="fa fa-plus"></i>
  	</button>
</legend>
<div class="table-responsive">
	<table class="table border">
		<thead class="thead-light">
			<tr>
				<th>Name</th>
				<th>Contact</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_array($sql)){
	            $contact_id = $row['contact_id'];
	            $contact_name = $row['contact_name'];
	            $contact_title = $row['contact_title'];
	            $contact_email = $row['contact_email'];
	            $contact_phone = $row['contact_phone'];
	            if(strlen($contact_phone)>2){ $contact_phone = substr($row['contact_phone'],0,3)."-".substr($row['contact_phone'],3,3)."-".substr($row['contact_phone'],6,4);}
	            $contact_created_at = $row['contact_created_at'];
	        ?>

			<tr>
				<td>
					<strong><?php echo "$contact_name"; ?></strong>
					<div class="text-secondary"><?php echo "$contact_title"; ?></div>	
				</td>
			
				<td>
					<?php echo "$contact_phone"; ?>
					<br>
					<a class="text-secondary" href="mailto:<?php echo $contact_email; ?>"><?php echo "$contact_email"; ?></a>
				</td>
				<td>
					<div class="btn-group">
						<button class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#editContactModal<?php echo $contact_id; ?>"><i class="fa fa-edit"></i></button> 
						<a href="post.php?delete_contact=<?php echo "$contact_id"; ?>&company_id=<?php echo $company_id; ?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-remove"></i></a>
					</div>
				</td>
			</tr>
			<?php include("edit_contact_modal.php"); ?>
			
			<?php
			
			}
			
			?>
		
		</tbody>
	</table>
</div>

<?php 

}else{
	echo $config_no_records;

?>

<button type="button" class="btn btn-dark pull-right" data-toggle="modal" data-target="#addContactModal">
    <i class="fa fa-plus"></i>
</button>

<?php
 
}

?>

<?php include("add_contact_modal.php"); ?>