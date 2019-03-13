<?php include("header.php"); ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="jobs.php">Jobs</a></li>
    <li class="breadcrumb-item active">Add Job</li>
  </ol>
</nav>

<form action="post.php" method="post" autocomplete="off">
  <div class="form-group">
    <label>Company</label>
    <select class="form-control" name="company_id" required>
      <option value="">Select a company...</option>
      <?php 
      
      $sql = mysqli_query($mysqli,"SELECT * FROM companies"); 
      while($row = mysqli_fetch_array($sql)){
        $company_id = $row['company_id'];
        $company_name = $row['company_name'];
      ?>
      <option value="<?php echo "$company_id"; ?>"><?php echo "$company_name"; ?></option>
      <?php
      }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="job_title" required>
  </div>
  <div class="form-group">
    <label>Openings</label>
    <input type="number" class="form-control" name="job_openings" required>
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea class="form-control" name="job_description" required></textarea> 
  </div>
  <button type="submit" name="add_job" class="btn btn-primary">Submit</button>
</form>

<?php include("footer.php"); ?>