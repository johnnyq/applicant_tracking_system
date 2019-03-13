<?php include("header.php"); ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
    <li class="breadcrumb-item"><a href="admin.php?tab=users">Users</a></li>
    <li class="breadcrumb-item active">Add User</a></li>
  </ol>
</nav>
<form action="post.php" method="post" enctype="multipart/form-data" autocomplete="off">
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" required autofocus>
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
  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" name="first_name" required>
  </div>
  <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" name="last_name" required> 
  </div>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" required> 
  </div>
  <div class="form-group">
    <label>Phone</label>
    <input type="text" class="form-control" name="phone" data-inputmask="'mask': '999-999-9999'" required> 
  </div>
  <div class="form-group">
    <label>Location</label>
    <select class="form-control" name="location">
      <?php
      $sql = mysqli_query($mysqli,"SELECT * FROM locations ORDER BY location_name DESC");
      while($row = mysqli_fetch_array($sql)){
        $location_id = $row['location_id'];
        $location_name = $row['location_name'];
        echo "<option value='$location_id'>$location_name</option>";
      } 
      ?>
    </select>
  </div>
  <div class="form-group">
    <label>Access Level</label>
    <select class="form-control" name="user_access" required>
      <option value="2">Admin</option>
      <option value="1">User</option>
      <option value="0">Inactive</option>
    </select>
  </div>
  <div class="form-group">
    <label>Avatar</label>  
    <input type="file" class="form-control-file" accept="image/*;capture=camera" name="avatar"> 
  </div>
  <button type="submit" name="add_user" class="btn btn-primary">Submit</button>
</form>

<?php include("footer.php"); ?>