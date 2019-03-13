<?php include("kiosk_header.php"); ?>

<?php

  $sql = mysqli_query($mysqli,"SELECT * FROM candidates WHERE candidate_id = $session_candidate_id");
  $row = mysqli_fetch_array($sql);

    $password_hash = $row['password'];

?>

<?php include("candidate_nav.php"); ?>

<form class="border p-3" action="post_kiosk.php" method="post" autocomplete="off">
  <input type="hidden" name="old_password" value="<?php echo $password_hash; ?>">
   
  <div class="form-group">
    <label>New Password</label>
    <div class="input-group" id="show_hide_password">
      <input type="password" class="form-control" name="new_password" value="<?php echo $password_hash; ?>" required>
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button"><i class="fa fa-eye-slash"></i></button>
      </div>
    </div>
    <small class="form-text text-muted">
      Password must be 8 characters or longer, have one upper case, one lowercase letter, one number and one symbol.
    </small>
  </div>
  
  <hr>
  
  <button type="submit" name="update_candidate_password" class="btn btn-warning"><i class="fa fa-check"></i> Update</button>

</form>

<?php include("kiosk_footer.php"); ?>