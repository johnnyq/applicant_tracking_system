<?php include("header.php"); ?>

<?php

if(isset($_GET['education_id'])){
  $education_id = intval($_GET['education_id']);
  $candidate_id = intval($_GET['candidate_id']);

  $sql = mysqli_query($mysqli,"SELECT * FROM candidate_education, candidate WHERE candidate_education.candidate_id = $candidate_id AND candidates.candidate_id = $candidate_id");
  $row = mysqli_fetch_array($sql);

  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $education_type = $row['education_type'];
  $education_name = $row['education_name'];
  $education_address = $row['education_address'];
  $education_city = $row['education_city'];
  $education_state = $row['education_state'];
  $education_zip = $row['education_zip'];
  $education_date_from = date('Y',strtotime($row['education_date_from']));
  $education_date_to = date('Y',strtotime($row['education_date_to']));
  $graduate = $row['graduate'];
  $major = $row['major'];

?>

<nav>
  <ol class="breadcrumb border">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="candidates.php">Candidates</a></li>
    <li class="breadcrumb-item"><a href="candidate.php?candidate_id=<?php echo $candidate_id; ?>"><?php echo "$first_name $last_name"; ?></a></li>
    <li class="breadcrumb-item"><a href="candidate.php?candidate_id=<?php echo $candidate_id; ?>&tab=education">Education</a></li>
    <li class="breadcrumb-item active">Add</li>
  </ol>
</nav>

<form action="post.php" method="post" autocomplete="off">
  <div class="modal-body">
    <input type="hidden" name="education_id" value="<?php echo $education_id; ?>">
    <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
    <div class="form-group">
  <label>Type</label>
  <select class="form-control" name="education_type" required>
    <option>High School</option>
    <option>Tech School</option>
    <option>College</option>
    <option>Other</option>
  </select>
</div>
<div class="form-group">
  <label>School Name</label>
  <input type="text" class="form-control" name="education_name" required> 
</div>
<div class="form-group">
  <label>Address</label>
  <input type="text" class="form-control" name="address" required> 
</div>
<div class="form-group">
  <label>City</label>
  <input type="text" class="form-control" name="city" required>
</div>
<div class="form-group">
  <label>State</label>
  <select class="form-control" name="state" required>
    <option value="">Select a state...</option>
    <?php foreach($states_array as $state_abbr => $state_name) { ?>
    <option value="<?php echo $state_abbr; ?>"><?php echo $state_name; ?></option>
    <?php } ?>
  </select>
</div>
<div class="form-group">
  <label>Zip</label>
  <input type="text" class="form-control" name="zip" required>
</div>
<div class="form-group">
  <label>Date From</label>
  <input type="date" class="form-control" name="date_from" required>
</div>
<div class="form-group">
  <label>Date To</label>
  <input type="date" class="form-control" name="date_to" required>
</div>
<div class="form-group">
  <label>Graduate</label>
  <select class="form-control" name="graduate" required>
    <option>Yes</option>
    <option>No</option>
  </select>
</div>
<div class="form-group">
  <label>Major</label>
  <input type="text" class="form-control" name="major" required>
</div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" name="add_education" class="btn btn-primary">Submit</button>
  </div>
</form>

<?php

}

?>

<?php include("footer.php"); ?>