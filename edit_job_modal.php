<!-- Modal -->
<div class="modal fade" id="editJobModal<?php echo $job_id; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-briefcase"></i> Edit Job</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" autocomplete="off">
        <div class="modal-body">
          <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
      
          
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="job_title" value="<?php echo $job_title; ?>" required>
          </div>
          <div class="form-group">
            <label>Openings</label>
            <input type="number" class="form-control" name="job_openings" value="<?php echo $job_openings; ?>" required>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="job_description" required><?php echo $job_description; ?></textarea> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="edit_job" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>