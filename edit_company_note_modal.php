<!-- Modal -->
<div class="modal fade" id="editNoteModal<?php echo $note_id; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-edit"></i> Edit Note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span>&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" autocomplete="off">
        <div class="modal-body">
            <input type="hidden" name="note_id" value="<?php echo $note_id; ?>">
            <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
            <input type="hidden" name="company_name" value="<?php echo $company_name; ?>">
            <div class="form-group">
              <textarea rows="4" class="form-control" placeholder="Enter a note" name="note"><?php echo $note; ?></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="edit_company_note" class="btn btn-primary"><i class="fa fa-pencil"></i> Update</button>
        </div>
      </form>
    </div>
  </div>
</div>