<!-- Modal -->
<div class="modal fade" id="modifyWorkHistoryModal<?php echo $work_history_id; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-calendar"></i> Start Date</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" autocomplete="off">
        <div class="modal-body">
          <input type="hidden" name="work_history_id" value="<?php echo $work_history_id; ?>">
          <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
          <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
          <input type="hidden" name="first_name" value="<?php echo $first_name; ?>">
          <input type="hidden" name="last_name" value="<?php echo $last_name; ?>">
          <input type="hidden" name="company_name" value="<?php echo $company_name; ?>">
          <input type="hidden" name="work_history_job" value="<?php echo $work_history_job; ?>">
          <div class="form-group">
    		    <label>Start Date</label>
    		    <input type="date" class="form-control" name="start_date" value="<?php echo $start_date; ?>" required>
    		  </div>
          <div class="form-group">
            <label>Start Time</label>
            <input type="time" class="form-control" name="start_time" value="<?php echo $start_time; ?>" required>
          </div>
          <div class="form-group">
            <label>Notes</label>
            <textarea rows="4" class="form-control" name="note"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="modify_work_history" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>