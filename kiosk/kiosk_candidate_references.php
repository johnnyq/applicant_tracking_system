<?php include("kiosk_header.php"); ?>

<?php 
 
  $sql = mysqli_query($mysqli,"SELECT * FROM candidate_references WHERE candidate_id = $session_candidate_id ORDER BY reference_id DESC"); 

  if($session_agree_terms == 0){
    mysqli_query($mysqli,"UPDATE candidates SET current_status = 'Applying - References' WHERE candidate_id = $session_candidate_id");
  }

if(mysqli_num_rows($sql) > 0){ 

?>

<div class="table-responsive">
  <table class="table border">
    <thead class="thead-light">
      <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Company</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row = mysqli_fetch_array($sql)){
        $reference_id = $row['reference_id'];
        $reference_name = $row['reference_name'];
        $reference_relationship = $row['reference_relationship'];
        $reference_company = $row['reference_company'];
        $reference_address = $row['reference_address'];
        $reference_city = $row['reference_city'];
        $reference_state = $row['reference_state'];
        $reference_zip = $row['reference_zip'];
        $reference_phone = $row['reference_phone'];
        if(strlen($reference_phone)>2){ 
          $reference_phone = substr($row['reference_phone'],0,3)."-".substr($row['reference_phone'],3,3)."-".substr($row['reference_phone'],6,4);
        }
      ?>
      <tr>
        <td>
          <strong><?php echo "$reference_relationship"; ?></strong>
          <br>
          <div class="text-secondary"><?php echo "$reference_name"; ?></div>
        </td>
        <td>
          <?php echo "$reference_address"; ?>
          <br>
          <?php echo "$reference_city $reference_state $reference_zip"; ?>
        </td>
        <td><?php echo "$reference_phone"; ?></td>
        <td><?php echo "$reference_company"; ?></td>
        <td>
          <a href="post_kiosk.php?delete_reference=<?php echo $reference_id; ?>&candidate_id=<?php echo $candidate_id; ?>" 
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
    <div class="form-group col-md-7">
      <input type="hidden" name="candidate_id" value="<?php echo "$candidate_id"; ?>">
      <label>Full Name</label>
      <input type="text" class="form-control" name="name" required autofocus>
    </div>
    <div class="form-group col-md-5">
      <label>Relationship</label>
      <select class="form-control" name="relationship" required> 
        <option value="">Choose...</option>
        <option>Relative</option>
        <option>Friend</option>
        <option>Supervisor</option>
        <option>Other</option>
      </select>
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
    <div class="form-group col-md-7">
      <label>Company</label>
      <input type="text" class="form-control" name="company">
    </div>
    <div class="form-group col-md-5">
      <label>Phone</label>
      <input type="text" class="form-control" name="phone" data-inputmask="'mask': '999-999-9999'" required>
    </div>
  </div>
  <button type="submit" name="add_reference" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
</form>

<div class="border p-3 mt-5">
  <a href="kiosk_candidate_employment.php"><i class="fa fa-arrow-left"></i> Back - Employment</a>
  <a href="kiosk_candidate_w4.php" class="float-right">Next - W4 Form <i class="fa fa-arrow-right"></i></a>
</div>

<?php include("kiosk_footer.php"); ?>