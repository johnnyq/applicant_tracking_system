<?php include("header.php"); ?>
<?php 

if(isset($_GET['candidate_id'])){
  $candidate_id = intval($_GET['candidate_id']);

  $sql = mysqli_query($mysqli,"SELECT * FROM candidates WHERE candidate_id = $candidate_id");
  $row = mysqli_fetch_array($sql);

  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
 
?>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="candidates.php">Candidates</a></li>
    <li class="breadcrumb-item"><a href="candidate.php?candidate_id=<?php echo $candidate_id; ?>"><?php echo "$first_name $last_name"; ?></a></li>
    <li class="breadcrumb-item active">Forms</li>
    <li class="breadcrumb-item active">KBS Application</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-5">
    <form class="border-md p-3" action="post.php" method="post" autocomplete="off">
      
      <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
      
      <div class="form-group">
        <label>Start Date</label>
        <input type="date" class="form-control" name="start_date"> 
      </div>

      <div class="form-group">
        <label>Work Code</label>
        <input type="text" class="form-control" name="work_code" > 
      </div>

      <div class="form-group">
        <label>Pay Rate</label>
        <input type="number" class="form-control" name="pay_rate" > 
      </div>

      <div class="form-group">
        <label>Rate Type</label>
        <select class="form-control" name="rate_type" >
          <option>Hourly</optiom>
          <option>Salary</option>
        </select>
      </div>

      <div class="form-group">
        <label>Overtime Pay Rate</label>
        <input type="number" class="form-control" name="overtime_pay_rate" > 
      </div>

      <div class="form-group">
        <label>Regular Pay Day</label>
        <input type="text" class="form-control" name="regular_pay_day" > 
      </div>

      <div class="form-group">
        <label>Allowances</label>
        <input type="text" class="form-control" name="allowances" > 
      </div>

      <div class="form-group">
        <label>Gender</label>
        <select class="form-control" name="gender" >
          <optiom>Male</optiom>
          <option>Female</option>
        </select>
      </div>
      
      <div class="form-group">
        <label>Race</label>
        <select class="form-control" name="race" >
          <optiom>White</optiom>
          <option>Black</option>
          <option>Hispanic</option>
          <option>Asian or Pacific Islander</option>
          <option>American Indian or Alaskan Native</option>
          <option>Native Hawaiian or Other Pacific Islander</option>
        </select>
      </div>
      
      <div class="form-group">
        <label>Military Veteran</label>
        <select class="form-control" name="gender" >
          <optiom>Yes</optiom>
          <option>No</option>
        </select>
      </div>
      
      <legend>Emergency Contact</legend>
      
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="emergency_name" > 
      </div>
      
      <div class="form-group">
        <label>Relationship</label>
        <input type="text" class="form-control" name="emergency_relationship" > 
      </div>
      
      <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control" name="emergency_phone" > 
      </div>
      <button type="submit" name="add_kbs_form" class="btn btn-primary">Submit Form</button>
    </form>
  </div>
  <div class="col-md-7">
    <div class="embed-responsive" style="padding-bottom: 141.42%;">
      <object class="embed-responsive-item" data="uploads/forms/2018 KBS Application English.pdf" type="application/pdf" internalinstanceid="9" title="">
          <p>Your browser isn't supporting embedded pdf files. You can download the file
              <a href="/media/post/bootstrap-responsive-embed-aspect-ratio/example.pdf">here</a>.</p>
      </object>
    </div>
  </div>
</div>

<?php 

}

?>

<?php include("footer.php"); ?>