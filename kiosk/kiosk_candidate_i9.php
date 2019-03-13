<?php include("kiosk_header.php"); ?>

<?php 
  if($session_agree_terms == 0){ 
    mysqli_query($mysqli,"UPDATE candidates SET current_status = 'Applying - Form i9' WHERE candidate_id = $session_candidate_id");
  }
?>

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
    <legend class="text-center border bg-light">Section 1 - Employee Information</legend>
    <form class="border p-3" action="post_kiosk.php" method="post" autocomplete="off">
      <input type="hidden" id="signature_image_base64" name="signature_image_base64" value="">
      
      <div class="form-group">
        <label><strong>Last Name</strong> <small class="text-secondary">(Family Name)</small></label>
        <input type="text" name="i9_last_name" class="form-control" value="<?php echo $last_name; ?>" required autofocus>
      </div>

      <div class="form-group">
        <label><strong>First Name</strong> <small class="text-secondary">(Given Name)</small></label>
        <input type="text" name="i9_first_name" class="form-control" value="<?php echo $first_name; ?>" required>
      </div>

      <div class="form-group">
        <label><strong>Middle Initial</strong></label>
        <input type="text" name="i9_middle_initial" class="form-control">
      </div>

      <div class="form-group">
        <label><strong>Other Last Names Used</strong> <small class="text-secondary">(if any)</small></label>
        <input type="text" name="i9_other_last_names_used" class="form-control">
      </div>

      <div class="form-group">
        <label><strong>Address</strong> <small class="text-secondary">(Street Number and Name)</small></label>
        <input type="text" name="i9_address" class="form-control" value="<?php echo $address; ?>" required>
      </div>

      <div class="form-group">
        <label><strong>Apt. Number</strong></label>
        <input type="number" name="i9_apt_number" class="form-control">
      </div>

      <div class="form-group">
        <label><strong>City or Town</strong></label>
        <input type="text" name="i9_city_or_town" class="form-control" value="<?php echo $city; ?>" required>
      </div>

      <div class="form-group">
        <label><strong>State</strong></label>
        <select class="form-control" name="i9_state" required>
          <option value="">Select a state...</option>
          <?php foreach($states_array as $state_abbr => $state_name) { ?>
          <option <?php if($state == $state_abbr) { echo "selected"; } ?> value="<?php echo $state_abbr; ?>"><?php echo $state_name; ?></option>
          <?php } ?>
        </select> 
      </div>

      <div class="form-group">
        <label><strong>ZIP Code</strong></label>
        <input type="text" name="i9_zip_code" class="form-control" value="<?php echo $zip; ?>" data-inputmask="'mask': '99999'" required>
      </div>

      <div class="form-group">
        <label><strong>Date of Birth</strong> <small class="text-secondary">(mm/dd/yyyy)</small></label>
        <input type="date" name="i9_date_of_birth" class="form-control" value="<?php echo $birth_day; ?>" required>
      </div>

      <div class="form-group">
        <label><strong>U.S. Social Security Number</strong></label>
        <input type="text" name="i9_us_social_security_number" class="form-control" value="<?php echo $social_security; ?>" data-inputmask="'mask': '999-99-9999'" required>
      </div>

      <div class="form-group">
        <label><strong>Employee's E-mail Address</strong></label>
        <input type="email" name="i9_employee_email_address" class="form-control" value="<?php echo $email; ?>">
      </div>

      <div class="form-group">
        <label><strong>Employee's Telephone Number</strong></label>
        <input type="text" name="i9_employee_telephone_number" class="form-control" value="<?php echo $phone; ?>" data-inputmask="'mask': '999-999-9999'">
      </div>

      <div class="form-group">
        <label><strong>I attest, under penalty of perjury, that I am:</strong></label>
        <div class="form-check">
          <input class="form-check-input" type="radio" value="1" name="i9_citizenship_status">
          <label class="form-check-label">
             A citizen of the United States
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" value="2" name="i9_citizenship_status">
          <label class="form-check-label">
            A noncitizen national of the United States 
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="lawfulResident" value="3" name="i9_citizenship_status">
          <label class="form-check-label">
            A lawful permanent resident
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" value="4" name="i9_citizenship_status">
          <label class="form-check-label">
             An alien authorized to work
          </label>
        </div>
      </div>
      <div class="form-group">
        <label><strong>Preparer and/or Translator Certification:</strong></label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="i9_used_preparer" value="0">
          <label class="form-check-label">
             I did not use a preparer or translator.
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="preparerAssisted" name="i9_used_preparer" value="1">
          <label class="form-check-label">
             A preparer(s) and/or translator(s) assisted the employee in completing Section 1.
          </label>
        </div>
      </div>
      <strong><i class="fa fa-pencil"></i> Signature of Employee</strong> <small class="text-secondary">Click in the Box below to sign</small> 
      <br>
      <img id="fw4_employee_signature" src="../img/spacer.png" class="border" height="100" width="410" data-toggle="modal" data-target="#signModal">
      <br><br>
      <div id="preparerSection" style='display:none'>
        <hr>
        <h5>Preparer and/or Translator Information</h5>
        <strong>I attest, under penalty of perjury, that I have assisted in the completion of Section 1 of this form and that to the best of my
knowledge the information is true and correct.</strong>
        <br><br>
        <input type="hidden" id="preparer_signature_image_base64" name="preparer_signature_image_base64" value="">
      
        <strong><i class="fa fa-pencil"></i> Signature of Preparer or Translator</strong> <small class="text-secondary">Click in the Box below to sign</small> 
        <br>
        <img id="i9PreparerSignature" src="../img/spacer.png" class="border" height="100" width="410" data-toggle="modal" data-target="#signPreparerModal">
        <br><br>
        <div class="form-group">
          <label><strong>Last Name</strong> <small class="text-secondary">(Family Name)</small></label>
          <input type="text" name="i9_preparer_last_name" class="form-control">
        </div>

        <div class="form-group">
          <label><strong>First Name</strong> <small class="text-secondary">(Given Name)</small></label>
          <input type="text" name="i9_preparer_first_name" class="form-control" >
        </div>

        <div class="form-group">
          <label><strong>Address</strong> <small class="text-secondary">(Street Number and Name)</small></label>
          <input type="text" name="i9_preparer_address" class="form-control" >
        </div>

        <div class="form-group">
          <label><strong>City or Town</strong></label>
          <input type="text" name="i9_preparer_city_or_town" class="form-control">
        </div>

        <div class="form-group">
          <label><strong>State</strong></label>
          <select class="form-control" name="i9_preparer_state">
            <option value="">Select a state...</option>
            <?php foreach($states_array as $state_abbr => $state_name) { ?>
            <option value="<?php echo $state_abbr; ?>"><?php echo $state_name; ?></option>
            <?php } ?>
          </select> 
        </div>

        <div class="form-group">
          <label><strong>ZIP Code</strong></label>
          <input type="text" name="i9_preparer_zip_code" class="form-control" data-inputmask="'mask': '99999'">
        </div>
      </div>
      <button type="submit" name="add_i9" class="btn btn-success btn-block btn-lg mb-3 mt-3"><i class="fa fa-check"></i> Save</button>
    </form>
  </div>
  <div class="col-md-7">
    <div class="embed-responsive" style="padding-bottom: 141.42%;">
      <object class="embed-responsive-item" data="../uploads/forms/i-9.pdf" type="application/pdf" internalinstanceid="9" title="">
          <p>Your browser isn't supporting embedded pdf files. You can download the file
              <a href="/media/post/bootstrap-responsive-embed-aspect-ratio/example.pdf">here</a>.</p>
      </object>
    </div>

  </div>
</div>
<div class="row">
  <div class="col-md-12 mb-5">
    <div class="border p-3 mt-5">
      <a href="kiosk_candidate_w4.php"><i class="fa fa-arrow-left"></i> Back - W-4 Form</a>
      <a href="kiosk_candidate_verify.php" class="float-right">Next - Agreement <i class="fa fa-arrow-right"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="signPreparerModal" tabindex="-1">
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

<script>

$(document).ready(function() {
   $('input[type="radio"]').click(function() {
       if($(this).attr('id') == 'preparerAssisted') {
            $('#preparerSection').show();           
       }

       else {
            $('#preparerSection').hide();   
       }
   });
});

</script>