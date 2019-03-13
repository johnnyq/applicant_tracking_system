<div class="modal fade" id="changeCandidateAvatar" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-image"></i> Change Avatar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span>&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="modal-body">
          <input type="hidden" name="current_avatar_path" value="<?php echo $candidate_avatar; ?>">
          <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
          <input type="hidden" name="current_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
          <img class="img-fluid rounded-circle p-5 mx-auto d-block" src="<?php echo $candidate_avatar; ?>"></img>
          <div class="form-group">
            <input type="file" class="form-control-file" name="avatar" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="change_candidate_avatar" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>