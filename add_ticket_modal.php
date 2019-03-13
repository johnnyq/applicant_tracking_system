<!-- Modal -->
<div class="modal fade" id="addTicketModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-bug"></i> Report Bug</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" autocomplete="off">
        <div class="modal-body">
          <div class="form-group">
            <label>Subject</label>
            <input type="text" class="form-control" name="ticket_subject" required>
          </div>
          <div class="form-group">
            <label>Details</label>
            <textarea rows=8 class="form-control" name="ticket_body" required></textarea> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="add_ticket" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>