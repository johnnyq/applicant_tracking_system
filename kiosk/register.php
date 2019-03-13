<?php include("../config.php"); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../plugins/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <title><?php echo $config_company_name; ?> | Candidate Registration</title>
  </head>
  <body>
    <div class="container">

<?php

if(isset($_POST['register'])){
    $first_name = strip_tags(mysqli_real_escape_string($mysqli,$_POST['first_name']));
    $last_name = strip_tags(mysqli_real_escape_string($mysqli,$_POST['last_name']));
    $email = strip_tags(mysqli_real_escape_string($mysqli,$_POST['email']));
    $location = intval($_POST['location']);
    $password = mysqli_real_escape_string($mysqli,$_POST['password']);
    $password_passed = 1;  
    if( strlen($password) < 8 ) {
      $response = "<div class='alert alert-danger'>Password too short!<button class='close' data-dismiss='alert'>&times;</button></div>";
      $password_passwd = 0;
    }

    if( !preg_match("#[0-9]+#", $password) ) {
      $response = "<div class='alert alert-danger'>Password must include at least one number! <button class='close' data-dismiss='alert'>&times;</button></div>";
      $password_passed = 0;
    }

    if( !preg_match("#[a-z]+#", $password) ) {
      $response = "<div class='alert alert-danger'>Password must include at least one letter! <button class='close' data-dismiss='alert'>&times;</button></div>";
      $password_passed = 0;
    }

    if( !preg_match("#[A-Z]+#", $password) ) {
      $response = "<div class='alert alert-danger'>Password must include at least one CAPITAL letter! <button class='close' data-dismiss='alert'>&times;</button></div>";
      $password_passed = 0;

    }

    if( !preg_match("#\W+#", $password) ) {
      $response = "<div class='alert alert-danger'>Password must include at least one symbol! <button class='close' data-dismiss='alert'>&times;</button></div>";
      $password_passed = 0;
    }

    if($password_passed == 1){

      $hash_password = md5($password);

      $num_emails = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM candidates WHERE email = '$email'"));
      if($num_emails > 0 ){
          $response = "<div class='alert alert-danger'><h2>Email is already Registered</h2>Please <a href='login.php'>Click Here to Login</a>. <button class='close' data-dismiss='alert'>&times;</button></div>";
      }else{
          mysqli_query($mysqli,"INSERT INTO candidates SET first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$hash_password', candidate_avatar = 'img/default_candidate_avatar.png', location_applied_at = $location, current_status = 'Registered', candidate_created_at = UNIX_TIMESTAMP()");

          $candidate_id = mysqli_insert_id($mysqli);

          mkdir("../uploads/candidate_files/$candidate_id");

          $response = "<div class='alert alert-warning'>Candidate Added.<button class='close' data-dismiss='alert'>&times;</button></div>";
          
          header("Location: login.php");
      }
    }
}

?>

<?php if(isset($response)) { echo $response; } ?>
<form class="border p-3" method="post" autocomplete="off">
  <legend>Candidate Registration</legend>
  <div class="form-group">
    <label>Location</label>
    <select class="form-control" name="location" required>
      <option value="">Choose the location nearest you...</option>
      <?php
      $sql = mysqli_query($mysqli,"SELECT * FROM locations ORDER BY location_name DESC");
      while($row = mysqli_fetch_array($sql)){
        $location_id = $row['location_id'];
        $location_name = $row['location_name'];
        $location_address = $row['location_address'];
        $location_city = $row['location_city'];
        $location_state = $row['location_state'];
      ?>
      
        <option <?php if($location == $location_id) { echo "selected"; } ?> value="<?php echo $location_id; ?>"><?php echo "$location_name | $location_address | $location_city, $location_state"; ?></option>
      
      <?php
      } 
      ?>
    </select>
  </div>
  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" name="first_name" value="<?php if(isset($first_name)){ echo $first_name; } ?>" required>
  </div>
  <div class="form-group ">
    <label>Last Name</label>
    <input type="text" class="form-control" name="last_name" value="<?php if(isset($last_name)){ echo $last_name; } ?>" required>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" value="<?php if(isset($email)){ echo $email; } ?>" required>
  </div>
  <div class="form-group">
    <label>Password</label>
    <div class="input-group" id="show_hide_password">
      <input type="password" class="form-control" name="password" required>
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button"><i class="fa fa-eye-slash"></i></button>
      </div>
    </div>
    <small class="form-text text-muted">
      Password must be 8 characters or longer, have one upper case, one lowercase letter, one number and one symbol.
    </small>
  </div>
  <hr>
  <button type="submit" name="register" class="btn btn-danger">Register <i class="fa fa-check"></i></button>
</form>

<?php include("kiosk_footer.php"); ?>