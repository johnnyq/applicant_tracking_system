<?php include("header.php"); ?>

<?php

if(isset($_GET['company_id'])){
	$company_id = intval($_GET['company_id']);

	$sql = mysqli_query($mysqli,"SELECT * FROM companies WHERE company_id = $company_id");
	$row = mysqli_fetch_array($sql);

	$company_name = $row['company_name'];
    $company_address = $row['company_address'];
    $company_city = $row['company_city'];
    $company_state = $row['company_state'];
    $company_zip = $row['company_zip'];
    $company_created_at = date("$config_date_format $config_time_format",$row['company_created_at']);

?>

<nav>
  <ol class="breadcrumb border">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="companies.php">Companies</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo "$company_name"; ?></li>
  </ol>
</nav>

<div class="row">
	<div class="col-sm-3">
		<div class="card">
		  <img class="card-img-top py-3" src="img/default_company_avatar.png" alt="Card image cap">
		  <h4 class="text-center"><?php echo "$company_name"; ?></h4>
		  <ul class="list-group list-group-flush">
		    <li class="list-group-item">
				<strong><i class="fa fa-map-marker"></i> Address</strong>
				<br>
				<a class="text-secondary" href="https://maps.google.com?q=<?php echo "$company_address $company_zip"; ?>" target="_blank"><?php echo "$company_address"; ?><br><?php echo "$company_city $company_state $company_zip"; ?></a>
			</li>
			<li class="list-group-item">
				<strong><i class="fa fa-clock-o"></i> Created</strong> 
				<br>
				<div class="text-secondary"><?php echo "$company_created_at"; ?></div>
			</li>
			<li class="list-group-item">
				<a href="edit_company.php?company_id=<?php echo "$company_id"; ?>" class="btn btn-outline-secondary">Edit</a>
			</li>
		  </ul>
		</div>
	</div>

	<div class="col-sm-9">
		
		<?php include("company_nav.php"); ?>
		<?php
		if(isset($_GET['tab'])){
			if($_GET['tab'] == "contacts") {
				include("company_contacts.php");
			}elseif($_GET['tab'] == "history") {
				include("company_candidate_history.php");
			}elseif($_GET['tab'] == "jobs") {
				include("company_jobs_available.php");
			}elseif($_GET['tab'] == "files") {
				include("company_files.php");
			}elseif($_GET['tab'] == "notes") {
				include("company_notes.php");
			}
		}else{
			include("company_contacts.php");
		}
 
		?>

	</div>
</div>

<?php

}

?>

<?php include("footer.php"); ?>