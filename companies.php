<?php include("header.php"); ?>

<?php $sql = mysqli_query($mysqli,"SELECT * FROM companies ORDER BY company_id DESC"); ?>

<br>
<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addCompanyModal"><i class="fa fa-plus"></i></button>
<div class="table-responsive">
	<table class="table border" id="dt">
		<thead class="thead-light">
			<tr>
				<th>Company</th>
				<th>Address</th>
				<th>Created</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_array($sql)){
	            $company_id = $row['company_id'];
	            $company_name = $row['company_name'];
	            $company_address = $row['company_address'];
	            $company_city = $row['company_city'];
	            $company_state = $row['company_state'];
	            $company_zip = $row['company_zip'];
	            $company_created_at = time_ago($row['company_created_at']);
	        ?>
			
			<tr>
				<th><a href="company.php?company_id=<?php echo "$company_id"; ?>"><?php echo "$company_name"; ?></a></th>
				<td>
					<?php echo "$company_address"; ?>
					<br>
					<?php echo "$company_city $company_state $company_zip"; ?>		
				</td>
				<td><?php echo "$company_created_at"; ?></td>
				</td>
			</tr>

			<?php
			}
			?>

		</tbody>
	</table>
</div>

<?php include("add_company_modal.php"); ?>

<?php include("footer.php"); ?>