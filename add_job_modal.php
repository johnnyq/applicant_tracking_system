<!-- Modal -->
<div class="modal fade" id="addJobModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-briefcase"></i> Add Job</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" autocomplete="off">
        <div class="modal-body">
          <div class="form-group">
            <label>Company</label>
            <select class="form-control" name="company_id" required>
              <option value="">Select a company...</option>
              <?php 
              
              $sql = mysqli_query($mysqli,"SELECT * FROM companies"); 
              while($row = mysqli_fetch_array($sql)){
                $company_id = $row['company_id'];
                $company_name = $row['company_name'];
              ?>
              <option value="<?php echo "$company_id"; ?>"><?php echo "$company_name"; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Job Type</label>
            <select class="form-control" name="job_type" required>
              <option value="">Select a job type...</option>
              <?php foreach($job_types_array as $job_type) { ?>
              <option><?php echo $job_type; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="job_title" required>
          </div>
          <div class="form-group">
            <label>Openings</label>
            <input type="number" class="form-control" name="job_openings" required>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="job_description" required></textarea> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="add_job" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>