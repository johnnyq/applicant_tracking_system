<?php 

$sql = mysqli_query($mysqli,"SELECT * FROM candidate_employment WHERE candidate_id = $candidate_id ORDER BY employment_id DESC"); 

if(mysqli_num_rows($sql) > 0){ 

?>
<legend>Employment</legend>
<div class="table-responsive">
  <table class="table border">
    <thead class="thead-light">
      <tr>
        <th>Company</th>
        <th>Address</th>
        <th>Supervisor</th>
        <th>Dates</th>
        <th>Wages</th>
        <th>Respons</th>
        <th>Reason Leave</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row = mysqli_fetch_array($sql)){
        $employment_id = $row['employment_id'];
        $employment_company = $row['employment_company'];
        $employment_address = $row['employment_address'];
        $employment_city = $row['employment_city'];
        $employment_state = $row['employment_state'];
        $employment_zip = $row['employment_zip'];
        $employment_phone = $row['employment_phone'];
        if(strlen($employment_phone)>2){ $employment_phone = substr($row['employment_phone'],0,3)."-".substr($row['employment_phone'],3,3)."-".substr($row['employment_phone'],6,4);}
        $employment_supervisor = $row['employment_supervisor'];
        $employment_job_title = $row['employment_job_title'];
        $employment_starting_salary = $row['employment_starting_salary'];
        $employment_ending_salary = $row['employment_ending_salary'];
        $employment_responsibilities = $row['employment_responsibilities'];
        $employment_date_from = date('M Y',strtotime($row['employment_date_from']));
        $employment_date_to = date('M Y',strtotime($row['employment_date_to']));
        $employment_reason_for_leave = $row['employment_reason_for_leave'];
        $employment_allow_contact = $row['employment_allow_contact'];
    
      ?>
      <tr>
        <td>
          <strong><?php echo $employment_company; ?></strong>
          <br>
          <div class='text-secondary'><?php echo $employment_job_title; ?></div>
        </td>
        <td>
          <?php echo $employment_address; ?>
          <br>
          <?php echo "$employment_city $employment_state $employment_zip"; ?>
        </td>
        <td>
          <?php echo $employment_supervisor; ?>
          <div class='text-secondary'><?php echo $employment_phone; ?> <small><?php echo $employment_allow_contact; ?></small>
        </td>
        <td>
          <?php echo $employment_date_from; ?>
          <br>
          <?php echo $employment_date_to; ?>
        </td>
        <td>
          $<?php echo $employment_starting_salary; ?>
          <br>
          $<?php echo $employment_ending_salary; ?>    
        </td>
        <td><small><?php echo $employment_responsibilities; ?></small></td>
        <td><small><?php echo $employment_reason_for_leave; ?></small></td>
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
<div class="modal fade" id="addEmploymentModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Employment</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" autocomplete="off">
        <div class="modal-body">
          <input type="hidden" name="candidate_id" value="<?php echo "$candidate_id"; ?>">
          <div class="form-group">
        <label>Company Name</label>
        <input type="text" class="form-control" name="company" required>
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
        <label>Phone</label>
        <input type="tel" class="form-control" name="phone" required>
      </div>
      <div class="form-group">
        <label>Supervisor Name</label>
        <input type="text" class="form-control" name="supervisor" required>
      </div>
      <div class="form-group">
        <label>Job Title</label>
        <input type="text" class="form-control" name="job_title" required>
      </div>
      <div class="form-group">
        <label>Starting Salary</label>
        <input type="number" step="0.01" class="form-control" name="starting_salary" required>
      </div>
      <div class="form-group">
        <label>Ending Salary</label>
        <input type="number" step="0.01" class="form-control" name="ending_salary" required>
      </div>
      <div class="form-group">
        <label>Reponsibilities</label>
        <textarea class="form-control" name="responsibilities" required></textarea>
      </div>
      <div class="form-group">
        <label>Date From</label>
        <input type="date" class="form-control" name="date_from" required>
      </div>
      <div class="form-group">
        <label>Date To</label>
        <input type="date" class="form-control" name="date_to" required>
      </div>
      <div class="form-group">
        <label>Reason for Leave</label>
        <textarea class="form-control" name="reason_for_leave" required></textarea>
      </div>
      <div class="form-group">
        <label>Allow Contact</label>
        <select class="form-control" name="allow_contact" required>
          <option>Yes</option>
          <option>No</option>
        </select>
      </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="add_employment" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>