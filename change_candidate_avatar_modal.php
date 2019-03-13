<div class="modal fade" id="changeCandidateAvatar" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-camera"></i> Take Snapshot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span>&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" name="current_avatar_path" value="<?php echo $candidate_avatar; ?>">
        <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
        <input type="hidden" name="current_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <div class="modal-body">
          <div id="my_camera"></div>
          <br><br>
          <div id="results">Your captured image will appear here...</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" onClick="take_snapshot()"><i class="fa fa-camera"></i> Take Snapshot</button>
          <input type="hidden" name="image" class="image-tag">         
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="snapshot_candidate" class="btn btn-primary">Use Photo</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script language="JavaScript">
    Webcam.set({
        // live preview size
        width: 320,
        height: 240,

        // device capture size
        dest_width: 320,
        dest_height: 240,
        // final cropped size
        crop_width: 240,
        crop_height: 240,
        // format and quality
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>