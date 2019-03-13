<!-- Modal -->
<div class="modal fade" id="addContactModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-address-book-o"></i> Add Contact</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" autocomplete="off">
        <div class="modal-body">
          <input type="hidden" name="company_id" value="<?php echo "$company_id"; ?>">
          <div class="form-group">
		    <label>Name</label>
		    <input type="text" class="form-control" name="name" required>
		  </div>
		  <div class="form-group">
		    <label>Title</label>
		    <input type="text" class="form-control" name="title" required> 
		  </div>
		  <div class="form-group">
		    <label>Phone</label>
		    <input type="text" class="form-control" name="phone" data-inputmask="'mask': '999-999-9999'" required> 
		  </div>
		  <div class="form-group">
		    <label>Email</label>
		    <input type="email" class="form-control" name="email" required>
		  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="add_contact" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>