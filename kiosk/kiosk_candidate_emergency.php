<?php include("kiosk_header.php"); ?>

<?php 
  if($session_agree_terms == 0){
    mysqli_query($mysqli,"UPDATE candidates SET current_status = 'Applying - Emergency Contact' WHERE candidate_id = $session_candidate_id");
  }
?>

<?php 
  
  $sql = mysqli_query($mysqli,"SELECT * FROM candidate_emergency_contacts WHERE candidate_id = $session_candidate_id ORDER BY emergency_contact_id DESC"); 

if(mysqli_num_rows($sql) > 0){

?>
<div class="table-responsive">
  <table class="table border">
    <thead class="thead-light">
      <tr>
        <th>Name</th>
        <th>Phone</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row = mysqli_fetch_array($sql)){
        $emergency_contact_id = $row['emergency_contact_id'];
        $emergency_contact_name = $row['emergency_contact_name'];
        $emergency_contact_relationship = $row['emergency_contact_relationship'];
        $emergency_contact_phone = $row['emergency_contact_phone'];
        if(strlen($emergency_contact_phone)>2){ 
          $emergency_contact_phone = substr($row['emergency_contact_phone'],0,3)."-".substr($row['emergency_contact_phone'],3,3)."-".substr($row['emergency_contact_phone'],6,4);
        }
      ?>
      <tr>
        <td>
          <strong><?php echo $emergency_contact_name; ?></strong>
          <div class='text-secondary'><?php echo $emergency_contact_relationship; ?></div>
        </td>
        <td><?php echo $emergency_contact_phone; ?></td>
        <td>
          <a href="post_kiosk.php?delete_emergency_contact=<?php echo $emergency_contact_id; ?>&candidate_id=<?php echo $candidate_id; ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-remove"></i></a>
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
  <legend>Emergency Contact</legend>
  <div class="form-row">
    <div class="form-group col-md-7">
      <label>Name</label>
      <input type="text" class="form-control" name="emergency_contact_name" required autofocus>
    </div>
    <div class="form-group col-md-5">
      <label>Relationship</label>
      <input type="text" class="form-control" name="emergency_contact_relationship" required>
    </div>
  </div>
  <div class="form-group">
    <label>Phone</label>
    <input type="text" class="form-control" name="emergency_contact_phone" data-inputmask="'mask': '999-999-9999'" required>
  </div>
  <button type="submit" name="add_emergency_contact" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
</form>
<div class="border p-3 mt-5">
  <a href="kiosk_candidate_education.php" class="float-right">Next - Education <i class="fa fa-arrow-right"></i></a>
  <a href="kiosk_candidate.php"><i class="fa fa-arrow-left"></i> Back - Personal</a>
</div>

<?php include("kiosk_footer.php"); ?>