<!-- Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-lock"></i> Change Password</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <form action="post.php" method="post" autocomplete="off">
        <input type="hidden" name="current_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label>Password</label>
            <div class="input-group" id="show_hide_password">
              <input type="password" class="form-control" name="new_password" required>
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button"><i class="fa fa-eye-slash"></i></button>
              </div>
            </div>
            <small class="form-text text-muted">
              Password must be 8 characters or longer, have one upper case, one lowercase letter, one number and one symbol.
            </small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="change_password" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>