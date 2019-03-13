<?php  include("kiosk_login_header.php"); ?>

<?php

$ip = $_SERVER['REMOTE_ADDR'];

session_start();

if(isset($_POST['login'])){
  
  $email = mysqli_real_escape_string($mysqli,$_POST['email']);
  $password = md5(mysqli_real_escape_string($mysqli,$_POST['password']));

  $sql = mysqli_query($mysqli,"SELECT * FROM candidates WHERE email = '$email' AND password = '$password'");
  
  if(mysqli_num_rows($sql) == 1){
    $row = mysqli_fetch_array($sql);
    $_SESSION['candidate_logged'] = TRUE;
    $_SESSION['candidate_id'] = $row['candidate_id'];
    $candidate_id = $row['candidate_id'];
    
    mysqli_query($mysqli,"UPDATE candidates SET last_login = UNIX_TIMESTAMP() WHERE candidate_id = $candidate_id");

    //LOGGING
    $event_description = "User $email sucessfully logged in via KIOSK from IP $ip";

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'KIOSK Login Success', event_description = '$event_description', event_created_at = UNIX_TIMESTAMP()");
    //END LOGGING
    header("Location: kiosk_candidate.php");
  }else{
    $response = "
      <div class='alert alert-danger'>
        Incorrect email or password.
        <button class='close' data-dismiss='alert'>&times;</button>
      </div>
    ";
    //LOGGING
    $event_description = "KIOSK User $email failed to login via IP $ip";

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'KIOSK Login Failed', event_description = '$event_description', event_created_at = UNIX_TIMESTAMP()");
    //END LOGGING
  }
}

?>

<form class="form-signin" method="post">
  <img class="mb-4" height="256" width="256"src="../img/default_candidate_avatar.png">
  <h1 class="h3 mb-3 font-weight-normal"><?php echo $config_company_name; ?><br><small class="text-secondary">Candidate Login</small></h1>
  <?php if(isset($response)) { echo $response; } ?>
  <input type="email" class="form-control" placeholder="Email address" name="email" value="<?php if(isset($email)){ echo $email; } ?>" <?php if(empty($email)){ echo "autofocus"; } ?> required>
  <input type="password" class="form-control <?php if(isset($_POST['login'])) { echo "is-invalid"; } ?>" placeholder="Password" name="password" <?php if(isset($email)){ echo "autofocus"; } ?> required>
  <button class="btn btn-lg btn-dark btn-block" type="submit" name="login">Sign in</button>
  <a href="register.php" class="btn btn-lg btn-outline-danger btn-block">Register</a>
</form>

<?php include("kiosk_login_footer.php"); ?>