<?php  include("login_header.php"); ?>

<?php

$ip = $_SERVER['REMOTE_ADDR'];

session_start();

if(isset($_POST['login'])){
  
  $email = mysqli_real_escape_string($mysqli,$_POST['email']);
  $password = md5(mysqli_real_escape_string($mysqli,$_POST['password']));

  $sql = mysqli_query($mysqli,"SELECT * FROM users WHERE email = '$email' AND password = '$password' AND user_access > 0");
  
  if(mysqli_num_rows($sql) == 1){
    $row = mysqli_fetch_array($sql);
    $_SESSION['logged'] = TRUE;
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['first_name'] = $row['first_name'];
    $user_id = $row['user_id'];
    
    mysqli_query($mysqli,"UPDATE users SET last_login = UNIX_TIMESTAMP() WHERE user_id = $user_id");

    //LOGGING
    $event_description = "User $email sucessfully logged in via $ip";

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'Login Success', event_description = '$event_description', event_created_at = UNIX_TIMESTAMP(), user_id = $user_id");
    //END LOGGING
    header("Location: index.php");
  }else{
    $response = "
      <div class='alert alert-danger'>
        Incorrect email or password.
        <button class='close' data-dismiss='alert'>&times;</button>
      </div>
    ";
    //LOGGING
    $event_description = "User $email failed to login via $ip";

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'Login Failed', event_description = '$event_description', event_created_at = UNIX_TIMESTAMP()");
    //END LOGGING
  }
}

?>

<form class="form-signin" method="post">
  <div id="avatar"></div>
  <div><img class="mb-4" height="256" width="256" src="img/default_user_avatar.png"></img></div>
  <h1 class="h3 mb-3 font-weight-normal"><?php echo $config_company_name; ?><br><small class="text-secondary">Administrative Login</small></h1>
  <?php if(isset($response)) { echo $response; } ?>
  <input type="email" id="email" class="form-control" placeholder="Email address" name="email" value="<?php if(isset($email)){ echo $email; } ?>"<?php if(empty($email)){ echo "autofocus"; } ?> required>
  <input type="password" id="password" class="form-control <?php if(isset($_POST['login'])) { echo "is-invalid"; } ?>" placeholder="Password" name="password" <?php if(isset($email)){ echo "autofocus"; } ?> required>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
  <a href="/kiosk/login.php" class="btn btn-lg btn-outline-dark btn-block">Candidate Login</a>
</form>

<?php include("login_footer.php"); ?>