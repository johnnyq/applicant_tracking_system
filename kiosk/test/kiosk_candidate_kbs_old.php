<?php include("kiosk_header.php"); ?>

<?php

$sql = mysqli_query($mysqli,"SELECT * FROM candidates WHERE candidate_id = $session_candidate_id");
  $row = mysqli_fetch_array($sql);

    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $address = $row['address'];
    $city = $row['city'];
    $state = $row['state'];
    $zip = $row['zip'];
    $email = $row['email'];
    $password_hash = $row['password'];
    $phone = $row['phone'];
    $social_security = $row['social_security'];
    if(strlen($phone)>2){ $phone = substr($row['phone'],0,3)."-".substr($row['phone'],3,3)."-".substr($row['phone'],6,4);}
    $birth_day = $row['birth_day'];

?>
<div class="row">
  <div class="col-md-5">
    <legend class="text-center border bg-light">Withholding - Federal</legend>
    <form class="border p-3" action="post_kiosk.php" method="post" autocomplete="off">
      <input type="hidden" id="signature_image_base64" name="signature_image_base64" value="">
      <a href="https://apps.irs.gov/app/withholdingcalculator/" target="_blank" class="btn btn-sm btn-outline-dark pull-right"><i class="fa fa-calculator"></i></a>
      <div class="form-group">
        <label><strong>Filing Status</strong> <small class="text-secondary">Box 3</small></label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="box3">
          <label class="form-check-label">
            Single
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="box3">
          <label class="form-check-label">
            Married
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="box3">
          <label class="form-check-label">
            Married, but withhold at higher Single rate.
          </label>
        </div>
      </div>
      <div class="form-group">
        <label><strong>Last Name</strong> <small class="text-secondary">Box 4</small></label>
        <div class="form-group form-check">
           <input type="checkbox" class="form-check-input" name="box4" id="exampleCheck1" value="1" >
           <label class="form-check-label" for="exampleCheck1"><small>Your last name differs from what is shown on your Social Security card.</small></label>
        </div>
      </div>
      <div class="form-group">
        <label>
          <strong>Allowances</strong> <small class="text-secondary">Box 5</small>
          <br>
          <small>Total number of allowances you’re claiming</small>
        </label>

        <input type="number" name="box5" class="form-control" placeholder="Box 5" required>
      </div>
      <div class="form-group">
        <label>
          <strong>Additional Withholdings</strong> <small class="text-secondary">Box 6</small>
          <br>
          <small>Additional amount, if any, you want withheld from each paycheck.</small>
        </label>
        <input type="number" name="box6" class="form-control" placeholder="Box 6" required>
      </div>
      <div class="form-group">
        <label><strong>Exemption from Taxes</strong> <small class="text-secondary">Box 7</small></label>
        <div class="form-group form-check">
           <input type="checkbox" class="form-check-input" name="box7" value="Exempt" >
           <label class="form-check-label">
              <small>I claim exemption from withholding for 2018, and I certify that I meet both of the following conditions for exemption.
                <ul>
                  <li>Last year I had a right to a refund of all federal income tax withheld because I had no tax liability, and</li>
                  <li> This year I expect a refund of all federal income tax withheld because I expect to have no tax liability.</li>
                </ul>
              </small>
           </label>
        </div>
      </div>
      <strong><i class="fa fa-pencil"></i> Sign</strong> <small class="text-secondary">Click in the Box below</small> 
      <br>
      <img id="fw4_employee_signature" src="../img/spacer.png" class="border" height="100" width="410" data-toggle="modal" data-target="#signModal">
      <br><br>
      <button type="submit" name="add_w4" class="btn btn-danger btn-block">Submit Form</button>
    </form>
  </div>
  <div class="col-md-7">
    <div class="embed-responsive" style="padding-bottom: 141.42%;">
      <object class="embed-responsive-item" data="../uploads/forms/fw4.pdf" type="application/pdf" internalinstanceid="9" title="">
          <p>Your browser isn't supporting embedded pdf files. You can download the file
              <a href="/media/post/bootstrap-responsive-embed-aspect-ratio/example.pdf">here</a>.</p>
      </object>
    </div>

  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="signModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-pencil"></i> Sign</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span>&times;</span>
        </button>
      </div> 
        <div class="modal-body">
          <div class="wrapper">
            <canvas id="signature-pad" class="signature-pad" width=750 height=200></canvas>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" id="save-png">Save</button>
          <button class="btn btn-danger" id="clear">Clear</button>
        </div>
    </div>
  </div>
</div>


<?php include("kiosk_footer.php"); ?>