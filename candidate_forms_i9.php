<?php include("header.php"); ?>
<?php 

if(isset($_GET['candidate_id'])){
  $candidate_id = intval($_GET['candidate_id']);

  $sql = mysqli_query($mysqli,"SELECT * FROM candidates WHERE candidate_id = $candidate_id");
  $row = mysqli_fetch_array($sql);

  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
 
?>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="candidates.php">Candidates</a></li>
    <li class="breadcrumb-item"><a href="candidate.php?candidate_id=<?php echo $candidate_id; ?>"><?php echo "$first_name $last_name"; ?></a></li>
    <li class="breadcrumb-item active">Forms</li>
    <li class="breadcrumb-item active">I-9</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-5">
    <legend class="text-center border bg-light">Section 2 - Employer</legend>
    <form class="border-md p-3 border" action="post.php" method="post" autocomplete="off">
      
      <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
      <input type="hidden" id="signature_image_base64" name="signature_image_base64" value="">
      
      <div class="form-group">
        <label><strong>Choose Document Listing</strong></label>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="showListA">
          <label class="form-check-label">List A</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="showListBC">
          <label class="form-check-label">List B and C</label>
        </div>
      </div>
      
      <div id="listA">
        <legend>List A</legend>
        
        <div class="form-group">
          <label>Document Title</label>
          <select class="form-control" name="i9_list_a_document_title">
            <option value="">Choose one...</option>
            <option>U.S. Passport</option>
            <option>U.S. Passport Card</option>
          </select>
        </div>
        
        <div class="form-group">
          <label><strong>Issuing Authority</strong></label>
          <input type="text" class="form-control" name="i9_list_a_issuing_authority">
        </div>
      
        <div class="form-group">
          <label><strong>Document Number</strong></label>
          <input type="text" class="form-control" name="i9_list_a_document_number"> 
        </div>

        <div class="form-group">
          <label><strong>Expiration Date</strong></label>
          <input type="date" class="form-control" name="i9_list_a_expiration_date"> 
        </div>
      </div>
      
      <div id="listBC">
        
        <legend>List B</legend>
        
        <div class="form-group">
          <label>Document Title</label>
          <select class="form-control" name="i9_list_b_document_title">
            <option value="">Choose one...</option>
            <option>Driver's License issued by state/territory</option>
            <option>ID card issued by state/territory</option>
            <option>Government ID</option>
            <option>School ID</option>
            <option>Voter registration card</option>
            <option>U.S. Military card</option>
            <option>U.S. Military draft record</option>
            <option>Military dependent's ID card</option>
            <option>USCG Merchant Mariner card</option>
            <option>Native Amaerican tribal document</option>
            <option>Canadian driver's license</option>
            <option>School record (under age 18)</option>
            <option>Report card (under age 18)</option>
            <option>Clinic record (under age 18)</option>
            <option>Doctor record (under age 18)</option>
            <option>Hospital record (under age 18)</option>
            <option>Day-care record (under age 18)</option>
            <option>Nursery School record (under age 18)</option>
            <option>Individual under Age 18</option>
            <option>Special Placement</option>
            <option>Reciept Replacement Driver's License</option>
            <option>Reciept Replacement ID Card</option>
            <option>Reciept Replacement Government ID</option>
            <option>Reciept Replacement School ID</option>
            <option>Reciept Replacement Voter Reg. Card</option>
            <option>Reciept Replacement U.S. Military Card</option>
          </select>
        </div>
        
        <div class="form-group">
          <label><strong>Issuing Authority</strong></label>
          <input type="text" class="form-control" name="i9_list_b_issuing_authority">
        </div>
      
        <div class="form-group">
          <label><strong>Document Number</strong></label>
          <input type="text" class="form-control" name="i9_list_b_document_number"> 
        </div>

        <div class="form-group">
          <label><strong>Expiration Date</strong></label>
          <input type="date" class="form-control" name="i9_list_b_expiration_date"> 
        </div>

        <legend>List C</legend>
        
        <div class="form-group">
          <label>Document Title</label>
          <select class="form-control" name="i9_list_c_document_title">
            <option value="">Choose one...</option>
            <optiom>Social Security Card (Unrestricted)</option>
            <option>Form FS-545</option>
            <option>Form DS-1350</option>
            <option>Form FS-240</option>
            <option>U.S. Birth certificate</option>
            <option>Native American tribal document</option>
            <option>Form I-197</option>
            <option>Form I-179</option>
            <option>Employment auth. document (DHS)</option>
            <option>Reciept Replace. Unrestricted SS Card</option>
            <option>Reciept Replacment Birth Certificate</option>
            <option>Reciept Replace. Native American Tribal Doc.</option>
            <option>Reciept Replace. Employment Auth Doc.</option>
          </select>
        </div>
        
        <div class="form-group">
          <label><strong>Issuing Authority</strong></label>
          <input type="text" class="form-control" name="i9_list_c_issuing_authority">
        </div>
      
        <div class="form-group">
          <label><strong>Document Number</strong></label>
          <input type="text" class="form-control" name="i9_list_c_document_number" > 
        </div>

        <div class="form-group">
          <label><strong>Expiration Date</strong></label>
          <input type="date" class="form-control" name="i9_list_c_expiration_date" > 
        </div>
      </div>

      <legend>More....</legend>

      <div class="form-group">
        <label><strong>The employee's first day of employment</strong></label>
        <input type="date" class="form-control" name="i9_first_day_of_employment" required>
      </div>

      <strong><i class="fa fa-pencil"></i> Signature of Employer or Authorized Representative</strong> <small class="text-secondary">Click in the Box below to sign</small> 
      <br>
      <img id="fw4_employee_signature" src="../img/spacer.png" class="border" height="100" width="410" data-toggle="modal" data-target="#signModal">
      <br><br>

      <div class="form-group">
        <label><strong>Title</strong> <small class="text-secondary"> of Employer or Authorized Representative</small></label>
        <input type="text" class="form-control" name="i9_employer_title" value="<?php echo $session_title; ?>" required>
      </div>

      <div class="form-group">
        <label><strong>Last Name</strong> <small class="text-secondary"> of Employer or Authorized Representative</small></label>
        <input type="text" class="form-control" name="i9_employer_last_name" value="<?php echo $session_last_name; ?>" required>
      </div>

      <div class="form-group">
        <label><strong>First Name</strong> <small class="text-secondary"> of Employer or Authorized Representative</small></label>
        <input type="text" class="form-control" name="i9_employer_first_name" value="<?php echo $session_first_name; ?>" required>
      </div>

      <div class="form-group">
        <label><strong>Employer's Business or Organization Name</strong></label>
        <input type="text" class="form-control" name="i9_employer_business_name" value="<?php echo $config_company_name; ?>" required>
      </div>

      <div class="form-group">
        <label><strong>Employer's Business or Organization Address</strong> <small class="text-secondary">(Street Number and Name)</small></label>
        <input type="text" class="form-control" name="i9_employer_business_address" value="<?php echo $config_company_address; ?>" required>
      </div>

      <div class="form-group">
        <label><strong>City or Town</strong></label>
        <input type="text" class="form-control" name="i9_employer_business_city_or_town" value="<?php echo $config_company_city; ?>" required>
      </div>

      <div class="form-group">
        <label><strong>State</strong></label>
        <select class="form-control" name="i9_employer_business_state" required>
          <option value="">Select a state...</option>
          <?php foreach($states_array as $state_abbr => $state_name) { ?>
          <option <?php if($config_company_state == $state_abbr) { echo "selected"; } ?> value="<?php echo $state_abbr; ?>"><?php echo $state_name; ?></option>
          <?php } ?>
        </select> 
      </div>

      <div class="form-group">
        <label><strong>Zip Code</strong></label>
        <input type="text" class="form-control" name="i9_employer_business_zip_code" value="<?php echo $config_company_zip; ?>" data-inputmask="'mask': '99999'" required>
      </div>

      <button type="submit" name="add_i9" class="btn btn-primary">Submit Form</button>
    </form>
  </div>
  
  <div class="col-md-7">
    <legend class="text-center border bg-light">Candidate Filled i9 Form</legend>
    <img class="img-fluid border mb-5" src="uploads/candidate_files/<?php echo $candidate_id; ?>/i9-1-candidate-filled.png">
    <legend class="text-center border bg-light">Blank i9 Form <small>for Reference</small></legend>
    <div class="embed-responsive border" style="padding-bottom: 141.42%;">
      <object class="embed-responsive-item" data="uploads/forms/i-9.pdf" type="application/pdf" internalinstanceid="9" title="">
          <p>Your browser isn't supporting embedded pdf files. You can download the file
              <a href="/media/post/bootstrap-responsive-embed-aspect-ratio/example.pdf">here</a>.</p>
      </object>
    </div>
    <legend class="text-center border bg-light">Candidate Filled i9 Form</legend>
    <img class="img-fluid border" src="uploads/candidate_files/<?php echo $candidate_id; ?>/i9-1-candidate-filled.png">
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


<?php 

}

?>

<?php include("footer.php"); ?>