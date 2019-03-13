<nav>
  <ol class="breadcrumb border bg-light p-3">
    <li class="breadcrumb-item"><a class="<?php if ($_SERVER['REQUEST_URI'] == "/kiosk/kiosk_candidate.php") { echo "text-warning"; }else{ echo "text-secondary"; } ?>" href="kiosk_candidate.php"><i class="fa fa-file"></i> Personal Info</a></li>
    <li class="breadcrumb-item"><a class="<?php if ($_SERVER['REQUEST_URI'] == "/kiosk/kiosk_candidate_emergency.php") { echo "text-warning"; }else{ echo "text-secondary"; } ?>" href="kiosk_candidate_emergency.php"><i class="fa fa-hospital-o"></i> Emergency</a></li>
    <li class="breadcrumb-item"><a class="<?php if ($_SERVER['REQUEST_URI'] == "/kiosk/kiosk_candidate_education.php") { echo "text-warning"; }else{ echo "text-secondary"; } ?>" href="kiosk_candidate_education.php"><i class="fa fa-graduation-cap"></i> Education</a></li>
    <li class="breadcrumb-item"><a class="<?php if ($_SERVER['REQUEST_URI'] == "/kiosk/kiosk_candidate_employment.php") { echo "text-warning"; }else{ echo "text-secondary"; } ?>" href="kiosk_candidate_employment.php"><i class="fa fa-building"></i> Employment</a></li>
    <li class="breadcrumb-item"><a class="<?php if ($_SERVER['REQUEST_URI'] == "/kiosk/kiosk_candidate_references.php") { echo "text-warning"; }else{ echo "text-secondary"; } ?>" href="kiosk_candidate_references.php"><i class="fa fa-users"></i> References</a></li>
    <li class="breadcrumb-item"><a class="<?php if ($_SERVER['REQUEST_URI'] == "/kiosk/kiosk_candidate_w4.php") { echo "text-warning"; }else{ echo "text-secondary"; } ?>" href="kiosk_candidate_w4.php"><i class="fa fa-file"></i> W-4 Form</a></li>
    <li class="breadcrumb-item"><a class="<?php if ($_SERVER['REQUEST_URI'] == "/kiosk/kiosk_candidate_i9.php") { echo "text-warning"; }else{ echo "text-secondary"; } ?>" href="kiosk_candidate_i9.php"><i class="fa fa-file-o"></i> i-9 Form</a></li>
    <li class="breadcrumb-item"><a class="<?php if ($_SERVER['REQUEST_URI'] == "/kiosk/kiosk_candidate_verify.php") { echo "text-warning"; }else{ echo "text-secondary"; } ?>" href="kiosk_candidate_verify.php"><i class="fa fa-check"></i> Agreement</a></li>
  </ol>
</nav>