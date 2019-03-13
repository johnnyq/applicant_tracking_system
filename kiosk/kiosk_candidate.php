<?php include("kiosk_header.php"); ?>

<?php
  
  if($session_agree_terms == 0) {
    mysqli_query($mysqli,"UPDATE candidates SET current_status = 'Applying - Personal' WHERE candidate_id = $session_candidate_id");
  }

  $sql = mysqli_query($mysqli,"SELECT * FROM candidates WHERE candidate_id = $session_candidate_id");
  $row = mysqli_fetch_array($sql);

    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $address = $row['address'];
    $city = $row['city'];
    $state = $row['state'];
    $zip = $row['zip'];
    $email = $row['email'];
    $phone = $row['phone'];
    $social_security = $row['social_security'];
    if(strlen($phone)>2){ $phone = substr($row['phone'],0,3)."-".substr($row['phone'],3,3)."-".substr($row['phone'],6,4);}
    $birth_day = $row['birth_day'];

?>

<form class="border p-3" action="post_kiosk.php" method="post" autocomplete="off">
  <legend>Contact Info</legend>
  <div class="form-group">
    <label>Address</label>
    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" required autofocus>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>City</label>
      <input type="text" class="form-control" name="city" value="<?php echo $city; ?>" required>
    </div>
    <div class="form-group col-md-4">
      <label>State</label>
      <select class="form-control" name="state" required>
        <option value="">Select a state...</option>
        <?php foreach($states_array as $state_abbr => $state_name) { ?>
        <option <?php if($state == $state_abbr) { echo "selected"; } ?> value="<?php echo $state_abbr; ?>"><?php echo $state_name; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label>Zip</label>
      <input type="text" class="form-control" name="zip" value="<?php echo $zip; ?>" data-inputmask="'mask': '99999'" required>
    </div>
  </div>
  <div class="form-group">
    <label>Phone</label>
    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>" data-inputmask="'mask': '999-999-9999'" required>
  </div>
  <legend>Important Info</legend>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label>Birthday</label>
      <input type="date" class="form-control" name="birth_day" value="<?php echo $birth_day; ?>" required>
    </div>
    <div class="form-group col-md-7">
      <label>Social Security #</label>
      <input type="text" class="form-control" name="social_security" value="<?php echo $social_security; ?>" data-inputmask="'mask': '999-99-9999'" required>
    </div>
  </div>
  <button type="submit" name="update_candidate_info" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
  <br>
  <br>
  <hr>
  <button type="submit" name="add_candidate_kiosk" class="btn btn-link btn-sm float-right">Next - Emergency <i class="fa fa-arrow-right"></i></button>
  <br>
  <br>
</form>

<?php include("kiosk_footer.php"); ?>