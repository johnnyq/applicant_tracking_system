<?php $sql = mysqli_query($mysqli,"SELECT * FROM files, users WHERE files.uploaded_by = users.user_id AND candidate_id = $candidate_id ORDER BY file_id DESC"); ?>

<legend>Files 
	<button type="button" class="btn btn-dark pull-right" data-toggle="modal" data-target="#uploadFile">
    	<i class="fa fa-upload"></i>
      Upload
	</button>
</legend>
<div class="table-responsive">
  <table class="table border">
  	<thead class="thead-light">
  		<tr>
  			<th>Name</th>
  			<th>Uploaded</th>
  			<th></th>
  		</tr>
  	</thead>
  	<tbody>
  		<?php
  		while($row = mysqli_fetch_array($sql)){
              $file_id = $row['file_id'];
              $file_location = $row['file_location'];
              $uploaded_at = date("$config_date_format $config_time_format",$row['uploaded_at']);
              $file_name = basename($file_location);
              $file_ext = substr(strrchr($file_name,'.'),1);
              if($file_ext == "pdf" ){
              	$file_ext_icon = "fa fa-2x fa-file-pdf-o";
              }elseif($file_ext == "png" or $file_ext == "jpg" or $file_ext == "gif"){
              	$file_ext_icon = "fa fa-2x fa-file-image-o";
              }elseif($file_ext == "doc" or $file_ext == "docx"){
              	$file_ext_icon = "fa fa-2x fa-file-word-o";
              }elseif($file_ext == "xls" or $file_ext == "xlsx"){
              	$file_ext_icon = "fa fa-2x fa-file-excel-o";
              }
              $first_name = $row['first_name'];
              $last_name = $row['last_name'];
          ?>
  		<tr>
  			<td><i class="<?php echo $file_ext_icon; ?>""></i> <?php echo "$file_name"; ?></td>
  			<td>
          <?php echo "$uploaded_at"; ?>
          <div class="text-secondary"><?php echo "$first_name $last_name"; ?></div>
        </td>
  			<td>
  				<div class="btn-group">
  					<a href="<?php echo $file_location; ?>" target="_blank" class="btn btn-sm btn-outline-dark"><i class="fa fa-download"></i></a>
  					<a href="post.php?delete_candidate_file=<?php echo $file_id; ?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-remove"></i></a>
  				</div>
  			</td>
  		</tr>
  	    <?php
  		}
  		?>

  	</tbody>
  </table>
</div>

<hr>

<legend>Candidate Filled Forms that need Approval</legend> 

<div class="table-responsive">
  <table class="table border">
    <thead class="thead-light">
      <tr>
        <th>Form</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
       <?php if(file_exists("uploads/candidate_files/$candidate_id/i9-1-candidate-filled.png")){ ?>
       <tr>
        <td>Form I-9</td>
        <td>
          <div class="btn-group">
            <a href="uploads/candidate_files/<?php echo $candidate_id; ?>/i9-1-candidate-filled.png" target="_blank" class="btn btn-sm btn-outline-dark"><i class="fa fa-eye"></i> View</a>
            <a href="candidate_forms_i9.php?candidate_id=<?php echo $candidate_id; ?>" class="btn btn-sm btn-outline-success"><i class="fa fa-thumbs-up"></i> Approve</a>
            <a href="post.php?delete_candidate_form_i9" class="btn btn-sm btn-outline-danger"><i class="fa fa-thumbs-down"></i> Disapprove</a>
          </div>
        </td>
      </tr>
      <?php } ?>
      <?php if(file_exists("uploads/candidate_files/$candidate_id/w4-candidate-filled.png")){ ?>
      <tr>
        <td>Form W-4</td>
        <td>
          <div class="btn-group">
            <a href="uploads/candidate_files/<?php echo $candidate_id; ?>/w4-candidate-filled.png" target="_blank" class="btn btn-sm btn-outline-dark"><i class="fa fa-eye"></i> View</a>
            <a href="candidate_forms_w4.php?candidate_id=<?php echo $candidate_id; ?>" class="btn btn-sm btn-outline-success"><i class="fa fa-thumbs-up"></i> Approve</a>
            <a href="post.php?delete_candidate_form_w4" class="btn btn-sm btn-outline-danger"><i class="fa fa-thumbs-down"></i> Disapprove</a>
          </div>
        </td>
      </tr>
      <?php } ?>
      <?php if(file_exists("uploads/candidate_files/$candidate_id/kbs-1-candidate-signed.png")){ ?>
      <tr>
        <td>KBS Application</td>
        <td>
          <div class="btn-group">
            <a href="uploads/candidate_files/<?php echo $candidate_id; ?>/kbs-5-candidate-signed.png" target="_blank" class="btn btn-sm btn-outline-dark"><i class="fa fa-eye"></i> View</a>
            <a href="post.php?add_kbs_form&candidate_id=<?php echo $candidate_id; ?>" class="btn btn-sm btn-outline-success"><i class="fa fa-thumbs-up"></i> Approve</a>
            <a href="post.php?delete_candidate_form_w4" class="btn btn-sm btn-outline-danger"><i class="fa fa-thumbs-down"></i> Disapprove</a>
          </div>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="uploadFile" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-upload"></i> Upload File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="modal-body">
          <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
          <div class="form-group">
    		    <input type="file" class="form-control-file" name="file" required>
    		  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="upload_candidate_file" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>