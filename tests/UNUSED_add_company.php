<?php include("header.php"); ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="companies.php">Companies</a></li>
    <li class="breadcrumb-item active">Add</a></li>
  </ol>
</nav>

<form action="post.php" method="post" autocomplete="off">
  <div class="form-group">
    <label>Company Name</label>
    <input type="text" class="form-control" name="company_name" required autofocus>
  </div>
  <div class="form-group">
    <label>Address</label>
    <input type="text" class="form-control" name="company_address" required> 
  </div>
  <div class="form-group">
    <label>City</label>
    <input type="text" class="form-control" name="company_city" required> 
  </div>
  <div class="form-group">
    <label>State</label>
    <select class="form-control" name="company_state" required>
      <option value="">Select a state...</option>
      <?php foreach($states_array as $state_abbr => $state_name) { ?>
      <option value="<?php echo $state_abbr; ?>"><?php echo $state_name; ?></option>
      <?php } ?>
    </select> 
  </div>
  <div class="form-group">
    <label>Zip</label>
    <input type="text" class="form-control" name="company_zip" required> 
  </div>
  <button type="submit" name="add_company" class="btn btn-primary">Submit</button>
</form>

<?php include("footer.php"); ?>