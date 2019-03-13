<?php $sql = mysqli_query($mysqli,"SELECT * FROM locations ORDER BY location_name DESC"); ?>

<!-- Modal -->
<div class="modal fade" id="changeLocationModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-map-marker"></i> Change Location</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <form action="post.php" method="post" autocomplete="off">
        <input type="hidden" name="current_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label>Location</label>
            <select class="form-control" name="new_location">
              <?php
              while($row = mysqli_fetch_array($sql)){
                $location_id = $row['location_id'];
                $location_name = $row['location_name'];
              ?>
              <option <?php if($session_current_location_id == $location_id){ echo "selected"; } ?> value="<?php echo $location_id; ?>"><?php echo $location_name; ?></option>
              <?php
              } 
              ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="change_location" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>