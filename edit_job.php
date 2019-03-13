<?php include("header.php"); ?>

<?php

if(isset($_GET['job_id'])){
  $job_id = $_GET['job_id'];
  $sql = mysqli_query($mysqli,"SELECT * FROM jobs, companies WHERE jobs.company_id = companies.company_id AND jobs.job_id = $job_id");
  $row = mysqli_fetch_array($sql);
  $job_title = $row['job_title'];
  $job_type = $row['job_type'];
  $job_openings = $row['job_openings'];
  $job_description = $row['job_description'];
  $company_name = $row['company_name'];
  $company_id = $row['company_id'];

?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="jobs.php">Jobs</a></li>
    <li class="breadcrumb-item active">Edit Job</li>
  </ol>
</nav>

<form action="post.php" method="post" autocomplete="off">
  <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
  <div class="form-group">
    <label>Company</label>
    <select class="form-control" name="company_id" required>
      <?php 
      
      $sql = mysqli_query($mysqli,"SELECT * FROM companies"); 
      while($row = mysqli_fetch_array($sql)){
        $company_id2 = $row['company_id'];
        $company_name = $row['company_name'];
      ?>
      <option <?php if($company_id == $company_id2){ ?> selected <?php } ?> value="<?php echo "$company_id2"; ?>"><?php echo "$company_name"; ?></option>
      <?php
      }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label>Job Type</label>
    <select class="form-control" name="job_type" required>
      <option value="">Select a job type...</option>
      <?php foreach($job_types_array as $job) { ?>
      <option <?php if($job_type == $job) { echo "selected"; } ?> value="<?php echo $job; ?>"><?php echo $job; ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="job_title" value="<?php echo $job_title; ?>" required>
  </div>
  <div class="form-group">
    <label>Openings</label>
    <input type="number" class="form-control" name="job_openings" value="<?php echo $job_openings; ?>" required>
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea class="form-control" name="job_description" required><?php echo $job_description; ?></textarea> 
  </div>
  <button type="submit" name="edit_job" class="btn btn-primary">Update</button>
</form>

<?php

}

?>
<?php include("footer.php"); ?>