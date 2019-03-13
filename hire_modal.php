<!-- Modal -->
<div class="modal fade" id="hireModal<?php echo $job_id; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-thumbs-up"></i> Hire</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" autocomplete="off">
        <div class="modal-body">
          <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
          <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
          <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
          <input type="hidden" name="first_name" value="<?php echo $first_name; ?>">
          <input type="hidden" name="last_name" value="<?php echo $last_name; ?>">
          <input type="hidden" name="company_name" value="<?php echo $company_name; ?>">
          <input type="hidden" name="job_openings" value="<?php echo $job_openings; ?>">
          <input type="hidden" name="job_title" value="<?php echo $job_title; ?>">
          <label>Start Date Time</label>
          <div class="form-group row">
    		    <div class="col-sm-6">
              <input type="date" class="form-control" name="start_date">
            </div>
            <div class="col-sm-6">
              <input type="time" class="form-control" name="start_time">
            </div>
          </div>
          <label>Pay</label>
          <div class="form-group row">
            <div class="col-sm-5">
              <input type="text" class="form-control" name="pay" data-inputmask="'mask': '99.99'" required>
            </div>
            <div class="col-sm-7">
              <select class="form-control" name="pay_by" required>
                <option value-="">Select Pay Type...</option>
                <option>Hourly</option>
                <option>Salary</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label>Notes</label>
            <textarea rows="4" class="form-control" name="note"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="hire_candidate" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>