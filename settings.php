<form class="p-3 border" >
  <legend>Settings</legend>
  <div class="form-group">
    <label>Company Name</label>
    <input type="text" class="form-control" name="company_name" value="<?php echo $config_company_name; ?>" required>
  </div>
  <div class="form-group">
    <label>Date Format</label>
    <select class="form-control" name="date_output_format" required>
      <option value="Y-m-d">YYYY-MM-DD</option>
      <option value="m-d-Y">MM-DD-YYYY</option>
    </select>
  </div>
  <div class="form-group">
    <label>Time Format</label>
    <select class="form-control" name="time_output_format" required>
      <option value="H:i">24 Hour</option>
      <option value="h:ia">AM/PM</option>
    </select>
  </div>
  <div class="form-group">
    <label>Event Logging</label>
    <select class="form-control" name="event_logging" required> 
      <option>Yes</option>
      <option>No</option>
    </select>
  </div>
  <div class="form-group">
    <label>Theme</label>
    <select class="form-control" name="theme">
      <option>Default</option>
      <option>Blue</option>
    </select> 
  </div>
  <legend>Default Avatars</legend>
  <div class="form-group">
    <label>User</label>
    <input type="text" class="form-control" name="default_user_avatar" value="<?php echo $config_company_name; ?>" required>
  </div>
  <div class="form-group">
    <label>Candidate</label>
    <input type="text" class="form-control" name="default_candidate_avatar" value="<?php echo $config_company_name; ?>" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>