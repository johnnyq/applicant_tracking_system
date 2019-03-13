<!-- Modal -->
<div class="modal fade" id="addCompanyModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-building"></i> Add Company</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" autocomplete="off">
        <div class="modal-body">
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
            <input type="text" class="form-control" name="company_zip" data-inputmask="'mask': '99999'" required> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="add_company" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>