<!-- Modal -->
<div class="modal fade" id="createNote" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-edit"></i> New Note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span>&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" autocomplete="off">
        <div class="modal-body">
            <input type="hidden" name="candidate_id" value="<?php echo "$candidate_id"; ?>">
            <div class="form-group">
              <textarea rows="4" class="form-control" placeholder="Enter a note" name="note"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="add_candidate_note" class="btn btn-primary"><i class="fa fa-pencil"></i> Create</button>
        </div>
      </form>
    </div>
  </div>
</div>