<?php include("kiosk_header.php"); ?>

<?php 

  $sql = mysqli_query($mysqli,"SELECT * FROM candidate_employment WHERE candidate_id = $session_candidate_id ORDER BY employment_id DESC");

  if($session_agree_terms == 0){
    mysqli_query($mysqli,"UPDATE candidates SET current_status = 'Applying - Employment' WHERE candidate_id = $session_candidate_id");
  }

if(mysqli_num_rows($sql) > 0){ 

?>

<div class="table-responsive">
  <table class="table border">
    <thead class="thead-light">
      <tr>
        <th>Company</th>
        <th>Address</th>
        <th>Supervisor</th>
        <th>Dates</th>
        <th>Wages</th>
        <th>Responsiblities</th>
        <th>Reason of Leave</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row = mysqli_fetch_array($sql)){
        $employment_id = $row['employment_id'];
        $employment_company = $row['employment_company'];
        $employment_address = $row['employment_address'];
        $employment_city = $row['employment_city'];
        $employment_state = $row['employment_state'];
        $employment_zip = $row['employment_zip'];
        $employment_phone = $row['employment_phone'];
        if(strlen($employment_phone)>2){ $employment_phone = substr($row['employment_phone'],0,3)."-".substr($row['employment_phone'],3,3)."-".substr($row['employment_phone'],6,4);}
        $employment_supervisor = $row['employment_supervisor'];
        $employment_job_title = $row['employment_job_title'];
        $employment_starting_salary = $row['employment_starting_salary'];
        $employment_ending_salary = $row['employment_ending_salary'];
        $employment_responsibilities = $row['employment_responsibilities'];
        $employment_date_from = date('M Y',strtotime($row['employment_date_from']));
        $employment_date_to = date('M Y',strtotime($row['employment_date_to']));
        $employment_reason_for_leave = $row['employment_reason_for_leave'];
        $employment_allow_contact = $row['employment_allow_contact'];
    
      ?>
      <tr>
        <td>
          <strong><?php echo $employment_company; ?></strong>
          <br>
          <div class='text-secondary'><?php echo $employment_job_title; ?></div>
        </td>
        <td>
          <?php echo "$employment_address"; ?>
          <br>
          <?php echo "$employment_city $employment_state $employment_zip"; ?>
        </td>
        <td>
          <?php echo $employment_supervisor; ?>
          <div class='text-secondary'><?php echo $employment_phone; ?> <small><?php echo $employment_allow_contact; ?></small>
        </td>
        <td>
          <?php echo $employment_date_from; ?>
          <br>
          <?php echo $employment_date_to; ?>
        </td>
        <td>
          $<?php echo $employment_starting_salary; ?>
          <br>
          $<?php echo $employment_ending_salary; ?>    
        </td>
        <td><small><?php echo "$employment_responsibilities"; ?></small></td>
        <td><small><?php echo "$employment_reason_for_leave"; ?></small></td>
        <td>
          <a href="post_kiosk.php?delete_employment=<?php echo $employment_id; ?>&candidate_id=<?php echo $candidate_id; ?>" 
            class="btn btn-outline-danger btn-sm"><i class="fa fa-remove"></i>
          </a>
        </td>
      </tr>
      
      <?php
      
      }
      
      ?>
    
    </tbody>
  </table>
</div>

<?php
}
?>

<form class="border p-3" action="post_kiosk.php" method="post" autocomplete="off">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Company</label>
      <input type="text" class="form-control" name="company" autofocus required>
    </div>
    <div class="form-group col-md-6">
      <label>Job Title</label>
      <input type="text" class="form-control" name="job_title" required>
    </div>
  </div>
  <div class="form-group">
    <label>Address</label>
    <input type="text" class="form-control" name="address">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>City</label>
      <input type="text" class="form-control" name="city">
    </div>
    <div class="form-group col-md-4">
      <label>State</label>
      <select class="form-control" name="state">
        <option value="">Select a state...</option>
        <?php foreach($states_array as $state_abbr => $state_name) { ?>
        <option value="<?php echo $state_abbr; ?>"><?php echo $state_name; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label>Zip</label>
      <input type="text" class="form-control" name="zip" data-inputmask="'mask': '99999'">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label>Supervisor Name</label>
      <input type="text" class="form-control" name="supervisor">
    </div>
    <div class="form-group col-md-4">
      <label>Phone</label>
      <input type="text" class="form-control" name="phone" data-inputmask="'mask': '999-999-9999'">
    </div>
    <div class="form-group col-md-4">
      <label>Allow contact?</label>
      <select class="form-control" name="allow_contact" required>
        <option selected>Yes</option>
        <option>No</option>
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Date From</label>
      <input type="date" class="form-control" name="date_from">
    </div>
    <div class="form-group col-md-6">
      <label>Date To</label>
      <input type="date" class="form-control" name="date_to">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Starting Salary</label>
      <input type="number" step="0.01" class="form-control" name="starting_salary">
    </div>
    <div class="form-group col-md-6">
      <label>Ending Salary</label>
      <input type="number" step="0.01" class="form-control" name="ending_salary">
    </div>
  </div>
  <div class="form-row">  
    <div class="form-group col-md-6">
      <label>Responsibilities</label>
      <textarea rows="3" class="form-control" name="responsibilities"></textarea>
    </div>
    <div class="form-group col-md-6">
      <label>Reason For Leaving</label>
      <textarea rows="3" class="form-control" name="reason_for_leave"></textarea>
    </div>
  </div>
  <button type="submit" name="add_employment" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
</form>
<div class="border p-3 mt-5">
  <a href="kiosk_candidate_education.php"><i class="fa fa-arrow-left"></i> Back - Education</a>
  <a href="kiosk_candidate_references.php" class="float-right">Next - References <i class="fa fa-arrow-right"></i></a>
</div>

<?php include("kiosk_footer.php"); ?>