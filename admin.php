<?php include("header.php"); ?>

<?php if($session_access > 1){ ?>

<nav>
  <ol class="breadcrumb border">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active">Admin</li>
  </ol>
</nav>

<div class="row">
	<div class="col-sm-3">
		<?php include("admin_nav.php"); ?>
	</div>

	<div class="col-sm-9">
		
		<?php
		if(isset($_GET['tab'])){
			if($_GET['tab'] == "users") {
				include("users.php");
			}elseif($_GET['tab'] == "locations") {
				include("locations.php");
			}elseif($_GET['tab'] == "settings") {
				include("settings.php");
			}elseif($_GET['tab'] == "user_logs") {
				include("events.php");
			}elseif($_GET['tab'] == "candidate_logs") {
				include("candidate_events.php");
			}elseif($_GET['tab'] == "login_attempts") {
				include("login_attempts.php");
			}
		}else{
			include("users.php");
		}
 
		?>

	</div>
</div>

<?php }else{ ?>

Access Denied...

<?php } ?>

<?php include("footer.php"); ?>