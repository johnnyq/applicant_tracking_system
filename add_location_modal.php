<!-- Modal -->
<div class="modal fade" id="addLocationModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Location <i class="fa fa-map-marker"></i></h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" autocomplete="off">
        <div class="modal-body">
          <div class="form-group">
		    <label>Location Name</label>
		    <input type="text" class="form-control" name="location_name" required>
		  </div>
		  <div class="form-group">
		    <label>Address</label>
		    <input type="text" class="form-control" name="location_address" required> 
		  </div>
		  <div class="form-group">
		    <label>City</label>
		    <input type="text" class="form-control" name="location_city" required> 
		  </div>
		  <div class="form-group">
        <label>State</label>
        <select class="form-control" name="location_state" required>
          <option value="">Select a state...</option>
          <?php foreach($states_array as $state_abbr => $state_name) { ?>
          <option value="<?php echo $state_abbr; ?>"><?php echo $state_name; ?></option>
          <?php } ?>
        </select> 
      </div>
      <div class="form-group">
		    <label>Zip</label>
		    <input type="text" class="form-control" name="location_zip" data-inputmask="'mask': '99999'" required>
		  </div>
      <div class="form-group">
        <label>TimeZone</label>
        <select class="form-control" name="location_timezone" required>   
          <option value="">Select a timezone...</option>
          <?php foreach($timezones_array as $timezone) { ?>
          <option><?php echo $timezone; ?></option>
          <?php } ?>
        </select> 
      </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="add_location" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>