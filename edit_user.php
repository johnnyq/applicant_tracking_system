<?php include("header.php"); ?>

<?php 

if(isset($_GET['user_id'])){
  $user_id = intval($_GET['user_id']);

  $sql = mysqli_query($mysqli,"SELECT * FROM users WHERE user_id = $user_id");

  $row = mysqli_fetch_array($sql);
  $user_id = $row['user_id'];
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $title = $row['title'];
  $email = $row['email'];
  $phone = $row['phone'];
  if(strlen($phone)>2){ $phone = substr($row['phone'],0,3)."-".substr($row['phone'],3,3)."-".substr($row['phone'],6,4);}
  $password_hash = $row['password'];
  $user_access = $row['user_access'];
  $avatar = $row['avatar'];
  $current_location_id = $row['current_location_id'];

?>

<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
    <li class="breadcrumb-item"><a href="admin.php?tab=users">Users</a></li>
    <li class="breadcrumb-item"><a href="admin.php?tab=users"><?php echo "$first_name $last_name"; ?></a></li>
    <li class="breadcrumb-item active">Edit</li>
  </ol>
</nav>

<form action="post.php" method="post" enctype="multipart/form-data" autocomplete="off">
  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
  <input type="hidden" name="current_password_hash" value="<?php echo $password_hash; ?>">
  <input type="hidden" name="current_avatar_path" value="<?php echo $avatar; ?>">
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
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
    <label>First Name</label>
    <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>" required>
  </div>
  <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>" required> 
  </div>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $title; ?>" required> 
  </div>
  <div class="form-group">
    <label>Phone</label>
    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>" data-inputmask="'mask': '999-999-9999'" required> 
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
      <option <?php if($current_location_id == $location_id){ echo "selected"; } ?> value="<?php echo $location_id; ?>"><?php echo $location_name; ?></option>
      <?php
      } 
      ?>
    </select>
  </div>
  <div class="form-group">
    <label>Access Level</label>
    <select class="form-control" name="user_access" required>
      <option value="2">Admin</option>
      <option <?php if($user_access == 1){ echo "selected"; } ?> value="1">User</option>
      <option <?php if($user_access == 0){ echo "selected"; } ?> value="0">Inactive</option>
    </select>
  </div>
  <div class="form-group">
    <label>Avatar</label>
    <input type="file" class="form-control-file mb-2" accept="image/*;capture=camera" name="avatar"> 
    <img class="img-fluid rounded-circle" src="<?php echo $avatar; ?>" height="256" width="256">
  </div>
  <div class="form-group">
  </div>
  <button type="submit" name="edit_user" class="btn btn-primary">Update</button>
</form>

<?php 

}

?>

<?php include("footer.php"); ?>