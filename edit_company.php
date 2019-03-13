<?php include("header.php"); ?>

<?php 

if(isset($_GET['company_id'])){
  $company_id = intval($_GET['company_id']);

  $sql = mysqli_query($mysqli,"SELECT * FROM companies WHERE company_id = $company_id");
  $row = mysqli_fetch_array($sql);

  $company_name = $row['company_name'];
  $company_address = $row['company_address'];
  $company_city = $row['company_city'];
  $company_state = $row['company_state'];
  $company_zip = $row['company_zip'];

?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="companies.php">Companies</a></li>
    <li class="breadcrumb-item"><a href="company.php?company_id=<?php echo $company_id; ?>"><?php echo $company_name; ?></a></li>
    <li class="breadcrumb-item active">Edit</a></li>
  </ol>
</nav>

<form class="border-md p-3" action="post.php" method="post" autocomplete="off">
  <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
  <div class="form-group">
    <label>Company Name</label>
    <input type="text" class="form-control" name="company_name" value="<?php echo $company_name; ?>" required>
  </div>
  <div class="form-group">
    <label>Address</label>
    <input type="text" class="form-control" name="company_address" value="<?php echo $company_address; ?>" required> 
  </div>
  <div class="form-group">
    <label>City</label>
    <input type="text" class="form-control" name="company_city" value="<?php echo $company_city; ?>" required> 
  </div>
  <div class="form-group">
    <label>State</label>
    <select class="form-control" name="company_state" required>
      <option value="">Select a state...</option>
        <?php foreach($states_array as $state_abbr => $state_name) { ?>
        <option <?php if($company_state == $state_abbr) { echo "selected"; } ?> value="<?php echo $state_abbr; ?>"><?php echo $state_name; ?></option>
        <?php } ?>
    </select> 
  </div>
  <div class="form-group">
    <label>Zip</label>
    <input type="text" class="form-control" name="company_zip" value="<?php echo $company_zip; ?>" data-inputmask="'mask': '99999'" required> 
  </div>
  <button type="submit" name="edit_company" class="btn btn-primary">Update</button>
</form>

<?php

}

?>

<?php include("footer.php"); ?>