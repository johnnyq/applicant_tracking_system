<?php $sql = mysqli_query($mysqli,"SELECT * FROM files, users WHERE files.uploaded_by = users.user_id AND company_id = $company_id ORDER BY file_id DESC"); ?>

<legend>Files 
	<button type="button" class="btn btn-dark pull-right" data-toggle="modal" data-target="#uploadFile">
    	<i class="fa fa-upload"></i>
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
              $uploaded_at = date("$config_date_format $comfig_time_format",$row['uploaded_at']);
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
  			<td><i class="<?php echo $file_ext_icon; ?>"></i> <?php echo "$file_name"; ?></td>
  			<td>
          <?php echo "$uploaded_at"; ?>
          <div class="text-secondary"><?php echo "$first_name $last_name"; ?></div>
        </td>
  			<td>
  				<div class="btn-group">
  					<a href="<?php echo "$file_location"; ?>" target="_blank" class="btn btn-sm btn-outline-dark"><i class="fa fa-download"></i></a>
  					<a href="post.php?delete_company_file=<?php echo "$file_id"; ?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-remove"></i></a>
  				</div>
  			</td>
  		</tr>
  	    <?php
  		}
  		?>

  	</tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="uploadFile" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-upload"></i> Upload File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span>&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="modal-body">
          <input type="hidden" name="company_id" value="<?php echo "$company_id"; ?>">
          <div class="form-group">
		        <input type="file" class="form-control-file" name="file" required>
		      </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="upload_company_file" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>