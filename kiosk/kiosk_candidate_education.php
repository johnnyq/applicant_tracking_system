<?php include("kiosk_header.php"); ?>
<?php 

if($session_agree_terms == 0){
  mysqli_query($mysqli,"UPDATE candidates SET current_status = 'Applying - Education' WHERE candidate_id = $session_candidate_id");
}

?>
<?php 
  
  $sql = mysqli_query($mysqli,"SELECT * FROM candidate_education WHERE candidate_id = $session_candidate_id ORDER BY education_id DESC"); 

if(mysqli_num_rows($sql) > 0){

?>
<div class="table-responsive">
  <table class="table border">
    <thead class="thead-light">
      <tr>
        <th>School</th>
        <th>Address</th>
        <th>Years</th>
        <th>Major</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row = mysqli_fetch_array($sql)){
        $education_id = $row['education_id'];
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
      <tr>
        <td>
          <strong><?php echo $education_type; ?></strong>
          <br>
          <div class='text-secondary'><?php echo $education_name; ?></div>
        </td>
        <td>
          <?php echo "$education_address"; ?>
          <br>
          <?php echo "$education_city $education_state $education_zip"; ?>
        </td>
        <td><?php echo "$education_date_from<br>$education_date_to"; ?></td>
        <td>
          <?php echo "$major"; ?>
          <div class="text-secondary">Graduate: <?php echo "$graduate"; ?></div>
        </td>
        <td>
          <a href="post_kiosk.php?delete_education=<?php echo $education_id; ?>&candidate_id=<?php echo $candidate_id; ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-remove"></i></a>
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
  <legend>School Details</legend>
  <div class="form-row">
    <div class="form-group col-md-5 ">
      <label>Education Type</label>
      <select class="form-control" name="education_type">
        <option value="">Select one...</option>
        <option>GED</option>
        <option>High School</option>
        <option>Tech School</option>
        <option>College</option>
        <option>Other</option>
      </select>
    </div>
    <div class="form-group col-md-7">
      <label>School Name</label>
      <input type="text" class="form-control" name="education_name" required>
    </div>
  </div>
  <legend>Address</legend>
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
  <legend>Graduation Details</legend>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Year From</label>
      <input type="text" class="form-control" placeholder="ex 2003" name="date_from" data-inputmask="'mask': '9999'">
    </div>
    <div class="form-group col-md-6">
      <label>Year To</label>
      <input type="text" class="form-control" placeholder="ex 2007" name="date_to" data-inputmask="'mask': '9999'">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label>Did You Graduate</label>
      <select class="form-control" name="graduate" required>
        <option value="">Choose...</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
    </div>
    <div class="form-group col-md-7">
      <label>Major</label>
      <input type="text" class="form-control" name="major">
    </div>
  </div>
  <button type="submit" name="add_education_kiosk" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
</form>
<div class="border p-3 mt-5">
  <a href="kiosk_candidate_emergency.php"><i class="fa fa-arrow-left"></i> Back - Emergency Contacts</a>
  <a href="kiosk_candidate_employment.php" class="float-right">Next - Employment <i class="fa fa-arrow-right"></i></a>
</div>

<?php include("kiosk_footer.php"); ?>