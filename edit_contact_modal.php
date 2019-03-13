<!-- Modal -->
<div class="modal fade" id="editContactModal<?php echo $contact_id; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Contact</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" autocomplete="off">
        <div class="modal-body">
          <input type="hidden" name="contact_id" value="<?php echo $contact_id; ?>">
          <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
          <input type="hidden" name="company_name" value="<?php echo $company_name; ?>">
          <div class="form-group">
		    <label>Name</label>
		    <input type="text" class="form-control" name="name" value="<?php echo $contact_name; ?>" required>
		  </div>
		  <div class="form-group">
		    <label>Title</label>
		    <input type="text" class="form-control" name="title" value="<?php echo $contact_title; ?>" required> 
		  </div>
		  <div class="form-group">
		    <label>Phone</label>
		    <input type="text" class="form-control" name="phone" value="<?php echo $contact_phone; ?>" data-inputmask="'mask': '999-999-9999'" required> 
		  </div>
		  <div class="form-group">
		    <label>Email</label>
		    <input type="email" class="form-control" name="email" value="<?php echo $contact_email; ?>" required>
		  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="edit_contact" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>