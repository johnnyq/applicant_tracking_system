<?php include("header.php"); ?>
<?php 

if(isset($_GET['candidate_id'])){
  $candidate_id = intval($_GET['candidate_id']);

  $sql = mysqli_query($mysqli,"SELECT * FROM candidates WHERE candidate_id = $candidate_id");
  $row = mysqli_fetch_array($sql);

  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $address = $row['address'];
  $city = $row['city'];
  $state = $row['state'];
  $zip = $row['zip'];
  $email = $row['email'];
  $password_hash = $row['password'];
  $phone = $row['phone'];
  if(strlen($phone)>2){ $phone = substr($row['phone'],0,3)."-".substr($row['phone'],3,3)."-".substr($row['phone'],6,4);}
  $social_security = $row['social_security'];
  $birth_day = $row['birth_day'];
  $location_applied_at = $row['location_applied_at'];
  $candidate_avatar = $row['candidate_avatar'];

?>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="candidates.php">Candidates</a></li>
    <li class="breadcrumb-item"><a href="candidate.php?candidate_id=<?php echo $candidate_id; ?>"><?php echo "$first_name $last_name"; ?></a></li>
    <li class="breadcrumb-item active"></a>Edit</li>
  </ol>
</nav>

<form class="border-md p-3" action="post.php" method="post" enctype="multipart/form-data" autocomplete="off">
  <input type="hidden" name="old_password" value="<?php echo $password_hash; ?>">
  <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
  <input type="hidden" name="current_avatar_path" value="<?php echo $candidate_avatar; ?>">
  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" name="first_name" value="<?php echo "$first_name"; ?>" required >
  </div>
  <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" name="last_name" value="<?php echo "$last_name"; ?>" required> 
  </div>
  <div class="form-group">
    <label>Address</label>
    <input type="text" class="form-control" name="address" value="<?php echo "$address"; ?>" required> 
  </div>
  <div class="form-group">
    <label>City</label>
    <input type="text" class="form-control" name="city" value="<?php echo "$city"; ?>" required> 
  </div>
  <div class="form-group">
    <label>State</label>
    <select class="form-control" name="state" required>
      <option value="">Select a state...</option>
      <?php foreach($states_array as $state_abbr => $state_name) { ?>
      <option <?php if($state == $state_abbr) { echo "selected"; } ?> value="<?php echo $state_abbr; ?>"><?php echo $state_name; ?></option>
      <?php } ?>
    </select> 
  </div>
  <div class="form-group">
    <label>Zip</label>
    <input type="text" class="form-control" name="zip" value="<?php echo "$zip"; ?>" data-inputmask="'mask': '99999'" required> 
  </div>
  <div class="form-group">
    <label>Phone</label>
    <input type="text" class="form-control" name="phone" value="<?php echo "$phone"; ?>" data-inputmask="'mask': '999-999-9999'" required> 
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" value="<?php echo "$email"; ?>" required>
  </div>
  <div class="form-group">
    <label>Password</label>
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
  <div class="form-group">
    <label>Social Security #</label>
    <input type="text" class="form-control" name="social_security" value="<?php echo "$social_security"; ?>" data-inputmask="'mask': '999-99-9999'" required> 
  </div>
  <div class="form-group">
    <label>Birthday</label>
    <input type="date" class="form-control" name="birth_day" value="<?php echo "$birth_day"; ?>" required> 
  </div>
  <div class="form-group">
    <label>Location</label>
    <select class="form-control" name="location">
      <?php
      $sql = mysqli_query($mysqli,"SELECT * FROM locations ORDER BY location_name DESC");
      while($row = mysqli_fetch_array($sql)){
        $location_id = $row['location_id'];
        $location_name = $row['location_name'];
      ?>
      <option <?php if($location_applied_at == $location_id){ echo "selected"; } ?> value="<?php echo $location_id; ?>"><?php echo $location_name; ?></option>
      <?php
      } 
      ?>
    </select>
  </div>
  <div class="form-group">
    <label>Avatar</label>
    <input type="file" class="form-control-file mb-2" accept="image/*;capture=camera" name="avatar"> 
    <img class="img-fluid rounded-circle" src="<?php echo $candidate_avatar; ?>" height="256" width="256">
  </div>
  <button type="submit" name="edit_candidate" class="btn btn-primary">Submit</button>
</form>

<?php 

}

?>

<?php include("footer.php"); ?>