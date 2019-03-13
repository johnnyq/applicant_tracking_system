<?php 

$sql = mysqli_query($mysqli,"SELECT * FROM candidate_references WHERE candidate_id = $candidate_id ORDER BY reference_id DESC"); 

if(mysqli_num_rows($sql) > 0){ 

?>


<legend>References</legend>

<div class="table-responsive">
  <table class="table border">
    <thead class="thead-light">
      <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Company</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row = mysqli_fetch_array($sql)){
        $reference_id = $row['reference_id'];
        $reference_name = $row['reference_name'];
        $reference_relationship = $row['reference_relationship'];
        $reference_company = $row['reference_company'];
        $reference_address = $row['reference_address'];
        $reference_city = $row['reference_city'];
        $reference_state = $row['reference_state'];
        $reference_zip = $row['reference_zip'];
        $reference_phone = $row['reference_phone'];
        if(strlen($reference_phone)>2){ 
          $reference_phone = substr($row['reference_phone'],0,3)."-".substr($row['reference_phone'],3,3)."-".substr($row['reference_phone'],6,4);
        }
      ?>
      <tr>
        <td>
          <strong><?php echo "$reference_relationship"; ?></strong>
          <br>
          <div class="text-secondary"><?php echo "$reference_name"; ?></div>
        </td>
        <td>
          <?php echo "$reference_address"; ?>
          <br>
          <?php echo "$reference_city $reference_state $reference_zip"; ?>
        </td>
        <td><?php echo "$reference_phone"; ?></td>
        <td><?php echo "$reference_company"; ?></td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>

<?php

}else{
  echo $config_no_records;
} //ends row count

?>

<!-- Modal -->
<div class="modal fade" id="addReferenceModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Reference</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" autocomplete="off">
        <div class="modal-body">
          <input type="hidden" name="candidate_id" value="<?php echo "$candidate_id"; ?>">
          <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" required>
      </div>
      <div class="form-group">
        <label>Relationship</label>
        <select class="form-control" name="relationship" required> 
          <option value="">Choose one...</option>
          <option>Relative</option>
          <option>Friend</option>
          <option>Supervisor</option>
          <option>Other</option>
        </select>
      </div>
      <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control" name="address" required> 
      </div>
      <div class="form-group">
        <label>City</label>
        <input type="text" class="form-control" name="city" required>
      </div>
      <div class="form-group">
        <label>State</label>
        <select class="form-control" name="state" required>
          <option value="">Choose a state...</option>
          <option value="AL">Alabama</option>
          <option value="AK">Alaska</option>
          <option value="AZ">Arizona</option>
          <option value="AR">Arkansas</option>
          <option value="CA">California</option>
          <option value="CO">Colorado</option>
          <option value="CT">Connecticut</option>
          <option value="DE">Delaware</option>
          <option value="DC">District Of Columbia</option>
          <option value="FL">Florida</option>
          <option value="GA">Georgia</option>
          <option value="HI">Hawaii</option>
          <option value="ID">Idaho</option>
          <option value="IL">Illinois</option>
          <option value="IN">Indiana</option>
          <option value="IA">Iowa</option>
          <option value="KS">Kansas</option>
          <option value="KY">Kentucky</option>
          <option value="LA">Louisiana</option>
          <option value="ME">Maine</option>
          <option value="MD">Maryland</option>
          <option value="MA">Massachusetts</option>
          <option value="MI">Michigan</option>
          <option value="MN">Minnesota</option>
          <option value="MS">Mississippi</option>
          <option value="MO">Missouri</option>
          <option value="MT">Montana</option>
          <option value="NE">Nebraska</option>
          <option value="NV">Nevada</option>
          <option value="NH">New Hampshire</option>
          <option value="NJ">New Jersey</option>
          <option value="NM">New Mexico</option>
          <option value="NY">New York</option>
          <option value="NC">North Carolina</option>
          <option value="ND">North Dakota</option>
          <option value="OH">Ohio</option>
          <option value="OK">Oklahoma</option>
          <option value="OR">Oregon</option>
          <option value="PA">Pennsylvania</option>
          <option value="RI">Rhode Island</option>
          <option value="SC">South Carolina</option>
          <option value="SD">South Dakota</option>
          <option value="TN">Tennessee</option>
          <option value="TX">Texas</option>
          <option value="UT">Utah</option>
          <option value="VT">Vermont</option>
          <option value="VA">Virginia</option>
          <option value="WA">Washington</option>
          <option value="WV">West Virginia</option>
          <option value="WI">Wisconsin</option>
          <option value="WY">Wyoming</option>
        </select>
      </div>
      <div class="form-group">
        <label>Zip</label>
        <input type="text" class="form-control" name="zip" required>
      </div>
      <div class="form-group">
        <label>Company</label>
        <input type="text" class="form-control" name="company" required>
      </div>
      <div class="form-group">
        <label>Phone</label>
        <input type="tel" class="form-control" name="phone" required>
      </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="add_reference" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>