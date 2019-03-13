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


<form class="border p-3" action="post_kiosk.php" method="post" autocomplete="off">
  <h1 class="text-center">Form <small class="text-secondary">W-4</small></h1>
  <hr>
  <legend class="text-center">Employee’s Withholding Allowance Certificate</legend>
  <div class="form-group row">
    <label class="col-sm-11 col-form-label col-form-label-sm"><strong class="mr-2">5</strong> Total number of allowances you’re claiming (from the applicable worksheet on the following pages)</label>
    <div class="col-sm-1">
      <input type="number" name="v5" class="form-control form-control-sm" placeholder="5">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-11 col-form-label col-form-label-sm"><strong class="mr-2">6</strong> Additional amount, if any, you want withheld from each paycheck</label>
    <div class="col-sm-1">
      <input type="number" name="6" class="form-control form-control-sm" placeholder="6">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-11 col-form-label col-form-label-sm"><strong class="mr-2">7</strong> I claim exemption from withholding for 2018, and I certify that I meet <strong>both</strong> of the following conditions for exemption.
		<ul>
			<li>Last year I had a right to a refund of <strong>all</strong> federal income tax withheld because I had <strong>no</strong> tax liability, <strong>and</strong></li>
			<li>This year I expect a refund of all federal income tax withheld because I expect to have no tax liability.</li>
		</ul>
		If you meet both conditions, write “Exempt” here
	</label>
    <div class="col-sm-1">
      <input type="text" name="7" class="form-control form-control-sm" placeholder="7">
    </div>
  </div>
  <legend class="text-center">Personal Allowances Worksheet</legend>
  <div class="form-group row">
    <label class="col-sm-11 col-form-label col-form-label-sm"><strong class="mr-2">A</strong> Enter “1” for yourself</label>
    <div class="col-sm-1">
      <input type="number" name="a" class="form-control form-control-sm" placeholder="A">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-11 col-form-label col-form-label-sm"><strong class="mr-2">B</strong> Enter “1” if you will file as married filing jointly</label>
    <div class="col-sm-1">
      <input type="number" name="b" class="form-control form-control-sm" placeholder="B">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-11 col-form-label col-form-label-sm"><strong class="mr-2">C</strong> Enter “1” if you will file as head of household</label>
    <div class="col-sm-1">
      <input type="number" name="c" class="form-control form-control-sm" placeholder="C">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-11 col-form-label col-form-label-sm"><strong class="mr-2">D</strong> Enter “1” if:
    	<ul>
    		<li>You’re single, or married filing separately, and have only one job; or</li>
    		<li>You’re married filing jointly, have only one job, and your spouse doesn’t work; or</li>
    		<li>Your wages from a second job or your spouse’s wages (or the total of both) are $1,500 or less.</li>
    	</ul>
    </label>
    <div class="col-sm-1">
      <input type="number" name="d" class="form-control form-control-sm" placeholder="D">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-11 col-form-label col-form-label-sm"><strong class="mr-2">E</strong><strong>Child tax credit.</strong> See Pub. 972, Child Tax Credit, for more information.
    	<ul>
    		<li>If your total income will be less than $69,801 ($101,401 if married filing jointly), enter “4” for each eligible child.</li>
    		<li>If your total income will be from $69,801 to $175,550 ($101,401 to $339,000 if married filing jointly), enter “2” for each
eligible child.</li>
    		<li>If your total income will be from $175,551 to $200,000 ($339,001 to $400,000 if married filing jointly), enter “1” for
each eligible child.</li>
			<li>If your total income will be higher than $200,000 ($400,000 if married filing jointly), enter “-0-”</li>
    	</ul>
    </label>
    <div class="col-sm-1">
      <input type="number" name="e" class="form-control form-control-sm" placeholder="E">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-11 col-form-label col-form-label-sm"><strong class="mr-2">F</strong><strong>Credit for other dependents.</strong>
    	<ul>
    		<li>If your total income will be less than $69,801 ($101,401 if married filing jointly), enter “1” for each eligible dependent.</li>
    		<li>If your total income will be from $69,801 to $175,550 ($101,401 to $339,000 if married filing jointly), enter “1” for every
two dependents (for example, “-0-” for one dependent, “1” if you have two or three dependents, and “2” if you have
four dependents).</li>
    		<li>If your total income will be higher than $175,550 ($339,000 if married filing jointly), enter “-0-”</li>
    	</ul>
    </label>
    <div class="col-sm-1">
      <input type="number" name="f" class="form-control form-control-sm" placeholder="F">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-11 col-form-label col-form-label-sm"><strong class="mr-2">G</strong> <strong>Other credits.</strong> If you have other credits, see Worksheet 1-6 of Pub. 505 and enter the amount from that worksheet here</label>
    <div class="col-sm-1">
      <input type="number" name="g" class="form-control form-control-sm" placeholder="G">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-11 col-form-label col-form-label-sm"><strong class="mr-2">H</strong> Add lines A through G and enter the total here</label>
    <div class="col-sm-1">
      <input type="number" name="h" class="form-control form-control-sm" placeholder="H">
    </div>
  </div>
  <legend class="text-center">Deductions, Adjustments, and Additional Income Worksheet</legend>
  <button type="submit" name="add_w4" class="btn btn-danger btn-lg">Submit</button>
</form>



<div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" id="iframepdf" src="../uploads/forms/fw4.pdf"></iframe>
</div>

<?php include("kiosk_footer.php"); ?>