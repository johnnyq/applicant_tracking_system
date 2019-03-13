<?php include("header.php"); ?>

<?php 

$sql = mysqli_query($mysqli,"SELECT * FROM companies"); 

if(isset($_GET['date_from'])) {
	$unix_date_from = strtotime($_GET['date_from'] . '00:00');
	$unix_date_to = strtotime($_GET['date_to'] . '23:59');
}else{
	$unix_date_from = strtotime('today');
	$unix_date_to = time();
}

if(isset($_GET['canned_date'])){
	$detailed = $_GET['detailed'];
	$canned_date = $_GET['canned_date'];
	$date_from = strtotime($_GET['date_from']);
	$date_to = strtotime($_GET['date_to']);
	if($canned_date == 'custom'){
		$date_from = strtotime("midnight", $date_from);
		$date_to   = strtotime("tomorrow", $date_to) - 1;
	}elseif($canned_date == "today"){
		$date_from = strtotime('today');
		$date_to = $now;
	}elseif($canned_date == "yesterday"){
		$date_from = strtotime('yesterday');
		$date_to = strtotime('yesterday 23:59');
	}elseif($canned_date == "weektodate"){
		$date_from = strtotime('last monday');
		$date_to = $now;
	}elseif($canned_date == "lastweek"){
		$date_from = strtotime('last week 00:00');
		$date_to = strtotime('last week + 7 days');
	}elseif($canned_date == "monthtodate"){
		$date_from = strtotime('first day of this month 00:00');
		$date_to = $now;
	}elseif($canned_date == "lastmonth"){
		$date_from = strtotime('first day of last month 00:00');
		$date_to = strtotime('last day of last month 23:59');
	}elseif($canned_date == "yeartodate"){
		$date_from = strtotime('first day of january this year');
		$date_to = $now;
	}elseif($canned_date == "lastyear"){
		$date_from = strtotime('first day of january last year');
		$date_to = strtotime('last day of december last year 23:59');
	}elseif($canned_date == "2014"){
		$date_from = strtotime('first day of january 2014');
		$date_to = strtotime('last day of december 2014 23:59');
	}elseif($canned_date == "2013"){
		$date_from = strtotime('first day of january 2013');
		$date_to = strtotime('last day of december 2013 23:59');
	}elseif($canned_date == "2012"){
		$date_from = strtotime('first day of january 2012');
		$date_to = strtotime('last day of december 2012 23:59');
	}elseif($canned_date == "2011"){
		$date_from = strtotime('first day of january 2011');
		$date_to = strtotime('last day of december 2011 23:59');
	}
}

$date_from = date("Y-m-d",$unix_date_from);
$date_to = date("Y-m-d",$unix_date_to);

$order_total = 0;
$no_show_total = 0;
$placed_total = 0;

$count_applied = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM candidates WHERE candidate_created_at > $unix_date_from AND candidate_created_at < $unix_date_to"));
$count_jobs = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM jobs WHERE job_created_at > $unix_date_from AND job_created_at < $unix_date_to"));
$count_companies = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM companies WHERE company_created_at > $unix_date_from AND company_created_at < $unix_date_to"));

?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active">Reports</a></li>
  </ol>
</nav>

<form class="form-inline mb-3 input-daterange" method="get">
	<input type="text" class="form-control mr-sm-2" name="date_from" value="<?php if(isset($date_from)){ echo $date_from; } ?>" placeholder="Date From">
	<input type="text" class="form-control mr-sm-2" name="date_to" value="<?php if(isset($date_to)){ echo $date_to; } ?>" placeholder="Date To">
	<button class="btn btn-primary" type="submit"><i class="fa fa-check"></i></button> 
</form>

<div class="table-responsive">
	<table class="table table-bordered">
		<thead class="thead-light">
			<tr>
				<th>Candidates Added</th>
				<th>Jobs Added</th>
				<th>Companies Added</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $count_applied; ?></td>
				<td><?php echo $count_jobs; ?></td>
				<td><?php echo $count_companies; ?></td>
			</tr>
		</tbody>
	</table>
</div>

<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Company</th>
				<th>Ordered</th>
				<th>No Show</th>
				<th>Placed</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_array($sql)){
	            $company_id = $row['company_id'];
	            $company_name = $row['company_name'];
	        	$count_ordered = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM candidate_work_history WHERE hired_date > $unix_date_from AND hired_date < $unix_date_to AND company_id = $company_id"));
	        	$count_no_show = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM candidate_work_history WHERE showed_up = 1 AND hired_date > $unix_date_from AND hired_date < $unix_date_to AND company_id = $company_id"));
	        	$count_placed = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM candidate_work_history WHERE showed_up = 2 AND hired_date > $unix_date_from AND hired_date < $unix_date_to AND company_id = $company_id"));

	        	$order_total = $count_ordered + $order_total;
	        	$no_show_total = $no_show_total + $count_no_show;
	        	$placed_total = $placed_total + $count_placed;

	        ?>
			
			<tr>
				<th><a href="company.php?company_id=<?php echo "$company_id"; ?>&tab=history"><?php echo "$company_name"; ?></a></th>
				<td><?php echo $count_ordered; ?></td>
				<td><?php echo $count_no_show; ?></td>
				<td><?php echo $count_placed; ?></td>
			</tr>

			<?php
			}
			?>
			<tr class="bg-light">
				<th>Totals</th>
				<th><?php echo $order_total; ?></th>
				<th><?php echo $no_show_total; ?></th>
				<th><?php echo $placed_total; ?></th>
			</tr>
		</tbody>
	</table>
</div>


<?php include("footer.php"); ?>