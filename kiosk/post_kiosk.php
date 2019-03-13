<?php

include("../config.php");
include("check_login.php");

$msg = "";
$css_class = "";

if(isset($_POST['add_candidate_kiosk'])){
    $address = strip_tags(mysqli_real_escape_string($mysqli,$_POST['address']));
    $city = strip_tags(mysqli_real_escape_string($mysqli,$_POST['city']));
    $state = strip_tags(mysqli_real_escape_string($mysqli,$_POST['state']));
    $zip = strip_tags(mysqli_real_escape_string($mysqli,$_POST['zip']));
    $phone = strip_tags(mysqli_real_escape_string($mysqli,$_POST['phone']));
    $phone = preg_replace("/[^0-9]/", '',$phone);
    $email = strip_tags(mysqli_real_escape_string($mysqli,$_POST['email']));
    $social_security = strip_tags(mysqli_real_escape_string($mysqli,$_POST['social_security']));
    $birth_day = strip_tags(mysqli_real_escape_string($mysqli,$_POST['birth_day']));

    mysqli_query($mysqli,"UPDATE candidates SET address = '$address', city = '$city', state = '$state', zip = '$zip', phone = '$phone', birth_day = '$birth_day', social_security = '$social_security' WHERE candidate_id = $session_candidate_id");
    
    $event_description = "Updated Personal Information.";

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'Edit Candidate', event_description = '$event_description', event_created_at = UNIX_TIMESTAMP(), candidate_id = $session_candidate_id");

    $_SESSION['alert_message'] = "Candidate Personal Information Updated";

    header("Location: kiosk_candidate_emergency.php");
}

if(isset($_POST['update_candidate_info'])){
    $address = strip_tags(mysqli_real_escape_string($mysqli,$_POST['address']));
    $city = strip_tags(mysqli_real_escape_string($mysqli,$_POST['city']));
    $state = strip_tags(mysqli_real_escape_string($mysqli,$_POST['state']));
    $zip = strip_tags(mysqli_real_escape_string($mysqli,$_POST['zip']));
    $phone = strip_tags(mysqli_real_escape_string($mysqli,$_POST['phone']));
    $phone = preg_replace("/[^0-9]/", '',$phone);
    $email = strip_tags(mysqli_real_escape_string($mysqli,$_POST['email']));
    $social_security = strip_tags(mysqli_real_escape_string($mysqli,$_POST['social_security']));
    $birth_day = strip_tags(mysqli_real_escape_string($mysqli,$_POST['birth_day']));

    mysqli_query($mysqli,"UPDATE candidates SET address = '$address', city = '$city', state = '$state', zip = '$zip', phone = '$phone', birth_day = '$birth_day', social_security = '$social_security' WHERE candidate_id = $session_candidate_id");
    
    $event_description = "Updated Personal Information.";

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'Edit Candidate', event_description = '$event_description', event_created_at = UNIX_TIMESTAMP(), candidate_id = $session_candidate_id");

    $_SESSION['alert_message'] = "Candidate Personal Information Updated";

    header("Location: kiosk_candidate.php");
}

if(isset($_POST['update_candidate_password'])){
    $current_url = $_POST['current_url'];
    $password = mysqli_real_escape_string($mysqli,$_POST['new_password']);

    $password_passed = 1;  
    if( strlen($password) < 8 ) {
      $_SESSION['alert_message'] = "Password too short!";
      $password_passwd = 0;
    }

    if( !preg_match("#[0-9]+#", $password) ) {
      $_SESSION['alert_message'] =  "Password must include at least one number!";
      $password_passed = 0;
    }

    if( !preg_match("#[a-z]+#", $password) ) {
      $_SESSION['alert_message'] = "Password must include at least one letter!";
      $password_passed = 0;
    }

    if( !preg_match("#[A-Z]+#", $password) ) {
      $_SESSION['alert_message'] = "Password must include at least one CAPITAL letter!";
      $password_passed = 0;

    }

    if( !preg_match("#\W+#", $password) ) {
      $_SESSION['alert_message'] = "Password must include at least one symbol!";
      $password_passed = 0;
    }

    if($password_passed == 1){

        $hash_password = md5($password);

        mysqli_query($mysqli,"UPDATE candidates SET password = '$hash_password' WHERE candidate_id = $session_candidate_id");

        $_SESSION['alert_message'] = "Password Updated";
    }

    $event_description = "Changed Password.";

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'Password Change', event_description = '$event_description', event_created_at = UNIX_TIMESTAMP(), candidate_id = $session_candidate_id");
    
    header("Location: $current_url");
}

if(isset($_POST['add_education_kiosk'])){
    $education_type = strip_tags(mysqli_real_escape_string($mysqli,$_POST['education_type']));
    $education_name = strip_tags(mysqli_real_escape_string($mysqli,$_POST['education_name']));
    $address = strip_tags(mysqli_real_escape_string($mysqli,$_POST['address']));
    $city = strip_tags(mysqli_real_escape_string($mysqli,$_POST['city']));
    $state = strip_tags(mysqli_real_escape_string($mysqli,$_POST['state']));
    $zip = strip_tags(mysqli_real_escape_string($mysqli,$_POST['zip']));
    $date_from = strip_tags(mysqli_real_escape_string($mysqli,$_POST['date_from']));
    $date_to = strip_tags(mysqli_real_escape_string($mysqli,$_POST['date_to']));
    $graduate = strip_tags(mysqli_real_escape_string($mysqli,$_POST['graduate']));
    $major = strip_tags(mysqli_real_escape_string($mysqli,$_POST['major']));

    mysqli_query($mysqli,"INSERT INTO candidate_education SET education_type = '$education_type', education_name = '$education_name', education_address = '$address', education_city = '$city', education_state = '$state', education_zip = '$zip', education_date_from = '$date_from/01/01', education_date_to = '$date_to/01/01', graduate = '$graduate', major = '$major', candidate_id = $session_candidate_id");

    $event_description = "Added new education.";

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'Add Education', event_description = '$event_description', event_created_at = UNIX_TIMESTAMP(), candidate_id = $session_candidate_id");

    $_SESSION['alert_message'] = "Education Added";

    header("Location: kiosk_candidate_education.php");
}

if(isset($_GET['delete_education'])){
    $education_id = intval($_GET['delete_education']);

    mysqli_query($mysqli,"DELETE FROM candidate_education WHERE education_id = $education_id");

    $_SESSION['alert_message'] = "Education Deleted";

    header("Location: kiosk_candidate_education.php");
  
}

if(isset($_POST['add_employment'])){
    $company = strip_tags(mysqli_real_escape_string($mysqli,$_POST['company']));
    $address = strip_tags(mysqli_real_escape_string($mysqli,$_POST['address']));
    $city = strip_tags(mysqli_real_escape_string($mysqli,$_POST['city']));
    $state = strip_tags(mysqli_real_escape_string($mysqli,$_POST['state']));
    $zip = strip_tags(mysqli_real_escape_string($mysqli,$_POST['zip']));
    $phone = strip_tags(mysqli_real_escape_string($mysqli,$_POST['phone']));
    $phone = preg_replace("/[^0-9]/", '',$phone);
    $supervisor = strip_tags(mysqli_real_escape_string($mysqli,$_POST['supervisor']));
    $job_title = strip_tags(mysqli_real_escape_string($mysqli,$_POST['job_title']));
    $starting_salary = strip_tags(mysqli_real_escape_string($mysqli,$_POST['starting_salary']));
    $ending_salary = strip_tags(mysqli_real_escape_string($mysqli,$_POST['ending_salary']));
    $responsibilities = strip_tags(mysqli_real_escape_string($mysqli,$_POST['responsibilities']));
    $date_from = strip_tags(mysqli_real_escape_string($mysqli,$_POST['date_from']));
    $date_to = strip_tags(mysqli_real_escape_string($mysqli,$_POST['date_to']));
    $reason_for_leave = strip_tags(mysqli_real_escape_string($mysqli,$_POST['reason_for_leave']));
    $allow_contact = strip_tags(mysqli_real_escape_string($mysqli,$_POST['allow_contact']));

    mysqli_query($mysqli,"INSERT INTO candidate_employment SET employment_company = '$company', employment_address = '$address', employment_city = '$city', employment_state = '$state', employment_zip = '$zip', employment_phone = '$phone', employment_supervisor = '$supervisor', employment_job_title = '$job_title', employment_starting_salary = '$starting_salary', employment_ending_salary = '$ending_salary', employment_responsibilities = '$responsibilities', employment_date_from = '$date_from', employment_date_to = '$date_to', employment_reason_for_leave = '$reason_for_leave', employment_allow_contact = '$allow_contact', candidate_id = $session_candidate_id");

    $event_description = "Added Employment.";

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'Add Employment', event_description = '$event_description', event_created_at = UNIX_TIMESTAMP(), candidate_id = $session_candidate_id");

    $_SESSION['alert_message'] = "Employment Added";

    header("Location: kiosk_candidate_employment.php");
}

if(isset($_GET['delete_employment'])){
    $employment_id = intval($_GET['delete_employment']);

    mysqli_query($mysqli,"DELETE FROM candidate_employment WHERE employment_id = $employment_id");

    $event_description = "Deleted Employment.";

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'Delete Employment', event_description = '$event_description', event_created_at = UNIX_TIMESTAMP(), candidate_id = $session_candidate_id");

    $_SESSION['alert_message'] = "Employment Deleted";
    
    header("Location: kiosk_candidate_employment.php");
  
}

if(isset($_POST['add_reference'])){
    $name = strip_tags(mysqli_real_escape_string($mysqli,$_POST['name']));
    $relationship = strip_tags(mysqli_real_escape_string($mysqli,$_POST['relationship']));
    $address = strip_tags(mysqli_real_escape_string($mysqli,$_POST['address']));
    $city = strip_tags(mysqli_real_escape_string($mysqli,$_POST['city']));
    $state = strip_tags(mysqli_real_escape_string($mysqli,$_POST['state']));
    $zip = strip_tags(mysqli_real_escape_string($mysqli,$_POST['zip']));
    $company = strip_tags(mysqli_real_escape_string($mysqli,$_POST['company']));
    $phone = strip_tags(mysqli_real_escape_string($mysqli,$_POST['phone']));
    $phone = preg_replace("/[^0-9]/", '',$phone);

    mysqli_query($mysqli,"INSERT INTO candidate_references SET reference_name = '$name', reference_relationship = '$relationship', reference_address = '$address', reference_city = '$city', reference_state = '$state', reference_zip = '$zip', reference_company = '$company', reference_phone = '$phone', candidate_id = $session_candidate_id");

    $event_description = "Added Reference.";

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'Add Reference', event_description = '$event_description', event_created_at = UNIX_TIMESTAMP(), candidate_id = $session_candidate_id");

    $_SESSION['alert_message'] = "Reference Added";
    
    header("Location: kiosk_candidate_references.php");
}

if(isset($_GET['delete_reference'])){
    $reference_id = intval($_GET['delete_reference']);

    mysqli_query($mysqli,"DELETE FROM candidate_references WHERE reference_id = $reference_id");

    $event_description = "Deleted Reference.";

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'Delete Reference', event_description = '$event_description', event_created_at = UNIX_TIMESTAMP(), candidate_id = $session_candidate_id");

    $_SESSION['alert_message'] = "Reference Deleted";
    
    header("Location: kiosk_candidate_references.php");
  
}

if(isset($_POST['add_emergency_contact'])){
    $emergency_contact_name = strip_tags(mysqli_real_escape_string($mysqli,$_POST['emergency_contact_name']));
    $emergency_contact_relationship = strip_tags(mysqli_real_escape_string($mysqli,$_POST['emergency_contact_relationship']));
    $emergency_contact_phone = strip_tags(mysqli_real_escape_string($mysqli,$_POST['emergency_contact_phone']));
    $emergency_contact_phone = preg_replace("/[^0-9]/", '',$emergency_contact_phone);

    mysqli_query($mysqli,"INSERT INTO candidate_emergency_contacts SET emergency_contact_name = '$emergency_contact_name', emergency_contact_relationship = '$emergency_contact_relationship', emergency_contact_phone = '$emergency_contact_phone', candidate_id = $session_candidate_id");

    $event_description = "Emergency Contact $emergency_contact_name Added.";

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'Add Emergency Contact', event_description = '$event_description', event_created_at = UNIX_TIMESTAMP(), candidate_id = $session_candidate_id");

    $_SESSION['alert_message'] = "Emergency Contact Added";
    
    header("Location: kiosk_candidate_emergency.php");
}

if(isset($_GET['delete_emergency_contact'])){
    $emergency_contact_id = intval($_GET['delete_emergency_contact']);

    mysqli_query($mysqli,"DELETE FROM candidate_emergency_contacts WHERE emergency_contact_id = $emergency_contact_id");

    $event_description = "Emergency Contact Deleted.";

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'Delete Emergency Contact', event_description = '$event_description', event_created_at = UNIX_TIMESTAMP(), candidate_id = $session_candidate_id");

    $_SESSION['alert_message'] = "Emergency Contact Deleted";
    
    header("Location: kiosk_candidate_emergency.php");
  
}

if(isset($_POST['cancel_candidate'])){

    mysqli_query($mysqli,"DELETE FROM candidates WHERE candidate_id = $session_candidate_id");
    mysqli_query($mysqli,"DELETE FROM candidate_education WHERE candidate_id = $session_candidate_id");
    mysqli_query($mysqli,"DELETE FROM candidate_employment WHERE candidate_id = $session_candidate_id");
    mysqli_query($mysqli,"DELETE FROM candidate_references WHERE candidate_id = $session_candidate_id");
    rmdir("../uploads/candidate_files/$session_candidate_id");

    $event_description = "Candidate did not Agree to the Agreement.";

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'Did not Agree', event_description = '$event_description', event_created_at = UNIX_TIMESTAMP(), candidate_id = $session_candidate_id");

    $_SESSION['alert_message'] = "Candidate Cancelled";
    
    header("Location: logout.php");
  
}

if(isset($_POST['add_w4'])){
    $box3 = $_POST['box3'];
    $box4 = intval($_POST['box4']);
    $box5 = intval($_POST['box5']);
    $box6 = intval($_POST['box6']);
    $box7 = strip_tags($_POST['box7']);
    $signature = $_POST['signature_image_base64'];
    $todays_date = date('m-d-Y',time());
    $sql = mysqli_query($mysqli,"SELECT * FROM candidates WHERE candidate_id = $session_candidate_id");
    $row = mysqli_fetch_array($sql);

    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $address = $row['address'];
    $city = $row['city'];
    $state = $row['state'];
    $zip = $row['zip'];
    $social_security = $row['social_security'];
    
    //Set the Content Type
    header('Content-type: image/png');

    // Create Image From Existing File
    $image = imagecreatefrompng('../uploads/forms/2018-w4-1.png');
    $sig = imagecreatefrompng($signature);
   
    $sig = imagescale($sig,400,60);

    // Allocate A Color For The Text
    $white = imagecolorallocate($image, 255, 255, 255);
    $grey = imagecolorallocate($image, 128, 128, 128);
    $black = imagecolorallocate($image, 0, 0, 0);
    

    // Set Path to Font File and Font Size
    putenv('GDFONTPATH=' . realpath('.'));
    $font = 'font.ttf';
    $font_size = '19';

    // Print Text On Image
    imagettftext($image, $font_size, 0, 180, 1555, $black, $font, $first_name);
    imagettftext($image, $font_size, 0, 610, 1555, $black, $font, $last_name);
    imagettftext($image, $font_size, 0, 1270, 1555, $black, $font, $social_security);
    imagettftext($image, $font_size, 0, 180, 1625, $black, $font, $address);
    if($box3 == 'Single'){
        imagettftext($image, $font_size, 0, 900, 1595, $black, $font, 'X');
    }elseif($box3 == 'Married'){
        imagettftext($image, $font_size, 0, 1020, 1595, $black, $font, 'X');
    }else{
        imagettftext($image, $font_size, 0, 1160, 1595, $black, $font, 'X');
    }
    imagettftext($image, $font_size, 0, 180, 1695, $black, $font, "$city $state $zip");
    if($box4 == 1){
        imagettftext($image, $font_size, 0, 1570, 1690, $black, $font, 'X');
    }
    imagettftext($image, $font_size, 0, 1450, 1727, $black, $font, $box5);
    imagettftext($image, $font_size, 0, 1450, 1763, $black, $font, $box6);
    imagettftext($image, $font_size, 0, 1280, 1893, $black, $font, $box7);
    //imagecopy($image, $sig, 530, 1935 , 0, 0, 400, 60);
    //imagecolortransparent($sig,imagecolorat($sig,0,0));
    imagecopy($image, $sig, 530, 1935 , 0, 0, 400, 60);
    imagettftext($image, $font_size, 0, 1315, 1995, $black, $font, $todays_date);
    
    imagettftext($image, $font_size, 0, 145, 2095, $black, $font, "$config_company_name - $config_company_address $config_company_city $config_company_state $config_company_zip");

    // Send Image to Browser
    //imagepng($image);

    //Sends Image to File
    $save = "../uploads/candidate_files/$session_candidate_id/w4-candidate-filled.png";
    imagepng($image, $save, 0, NULL);

    // Clear Memory
    imagedestroy($image);

    $event_description = "Candidate Filled out W-4.";

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'Form Filled', event_description = '$event_description', event_created_at = UNIX_TIMESTAMP(), candidate_id = $session_candidate_id");

    $_SESSION['alert_message'] = "Filled Out W-4";

    header("Location: kiosk_candidate_i9.php");

}

if(isset($_POST['add_i9'])){
    $i9_last_name = strip_tags($_POST['i9_last_name']);
    $i9_first_name = strip_tags($_POST['i9_first_name']);
    $i9_middle_initial = strip_tags($_POST['i9_middle_initial']);
    if(empty($i9_middle_initial)){
        $i9_middle_initial = "N/A";
    }
    $i9_other_last_names_used = strip_tags($_POST['i9_other_last_names_used']);
    if(empty($i9_other_last_names_used)){
        $i9_other_last_names_used = "N/A";
    }
    $i9_address = strip_tags($_POST['i9_address']);
    $i9_apt_number = strip_tags($_POST['i9_apt_number']);
    if(empty($i9_apt_number)){
        $i9_apt_number = "N/A";
    }
    $i9_city_or_town = strip_tags($_POST['i9_city_or_town']);
    $i9_state = strip_tags($_POST['i9_state']);
    $i9_zip_code = strip_tags($_POST['i9_zip_code']);
    $i9_date_of_birth = date('m-d-Y',strtotime($_POST['i9_date_of_birth']));
    $i9_us_social_security_number = strip_tags($_POST['i9_us_social_security_number']);
    $i9_employee_email_address = strip_tags($_POST['i9_employee_email_address']);
    if(empty($i9_employee_email_address)){
        $i9_employee_email_address = "N/A";
    }
    $i9_employee_telephone_number = strip_tags($_POST['i9_employee_telephone_number']);
    if(empty($i9_employee_telephone_number)){
        $i9_employee_telephone_number = "N/A";
    }
    $i9_last_name = strip_tags($_POST['i9_last_name']);
    $i9_citizenship_status = intval($_POST['i9_citizenship_status']);
    $i9_used_preparer = intval($_POST['i9_used_preparer']);
    $i9_todays_date = strip_tags($_POST['i9_todays_date']);
    $todays_date = date('m-d-Y',time());
    $signature = $_POST['signature_image_base64'];
    $i9_preparer_last_name = strip_tags($_POST['i9_preparer_last_name']);
    $i9_preparer_first_name = strip_tags($_POST['i9_preparer_first_name']);
    $i9_preparer_address = strip_tags($_POST['i9_preparer_address']);
    $i9_preparer_city_or_town = strip_tags($_POST['i9_preparer_city_or_town']);
    $i9_preparer_state = strip_tags($_POST['i9_preparer_state']);
    $i9_preparer_zip_code = strip_tags($_POST['i9_preparer_zip_code']);

    //Set the Content Type
    header('Content-type: image/png');

    // Create Image From Existing File
    $image = imagecreatefrompng('../uploads/forms/2018-i9-1.png');
    $sig = imagecreatefrompng($signature);
   
    $sig = imagescale($sig,400,60);

    // Allocate A Color For The Text
    $white = imagecolorallocate($image, 255, 255, 255);
    $grey = imagecolorallocate($image, 128, 128, 128);
    $black = imagecolorallocate($image, 0, 0, 0);
    

    // Set Path to Font File and Font Size
    putenv('GDFONTPATH=' . realpath('.'));
    $font = 'font.ttf';
    $font_size = '19';

    // Print Text On Image
    
    imagettftext($image, $font_size, 0, 110, 575, $black, $font, $i9_last_name);
    imagettftext($image, $font_size, 0, 585, 575, $black, $font, $i9_first_name);
    imagettftext($image, $font_size, 0, 1005, 575, $black, $font, $i9_middle_initial);
    imagettftext($image, $font_size, 0, 1175, 575, $black, $font, $i9_other_last_names_used);
    
    imagettftext($image, $font_size, 0, 110, 655, $black, $font, $i9_address);
    imagettftext($image, $font_size, 0, 675, 655, $black, $font, $i9_apt_number);
    imagettftext($image, $font_size, 0, 845, 655, $black, $font, $i9_city_or_town);
    imagettftext($image, $font_size, 0, 1265, 655, $black, $font, $i9_state);
    imagettftext($image, $font_size, 0, 1370, 655, $black, $font, $i9_zip_code);
    
    imagettftext($image, $font_size, 0, 110, 750, $black, $font, $i9_date_of_birth);
    imagettftext($image, $font_size, 0, 440, 750, $black, $font, $i9_us_social_security_number);
    imagettftext($image, $font_size, 0, 750, 750, $black, $font, $i9_employee_email_address);
    imagettftext($image, $font_size, 0, 1230, 750, $black, $font, $i9_employee_telephone_number);

    if($i9_citizenship_status == 1){
        imagettftext($image, $font_size, 0, 115, 930, $black, $font, 'X');
    }elseif($i9_citizenship_status == 2){
        imagettftext($image, $font_size, 0, 115, 980, $black, $font, 'X');
    }elseif($i9_citizenship_status == 3){
        imagettftext($image, $font_size, 0, 115, 1025, $black, $font, 'X');
    }else{
        imagettftext($image, $font_size, 0, 115, 1070, $black, $font, 'X');
    }

    imagecopy($image, $sig, 340, 1450 , 0, 0, 400, 60);
    imagettftext($image, $font_size, 0, 1035, 1505, $black, $font, $todays_date);

    if($i9_used_preparer == 0){
        imagettftext($image, $font_size, 0, 110, 1595, $black, $font, 'X');
    }else{
        imagettftext($image, $font_size, 0, 550, 1595, $black, $font, 'X');
        
        imagettftext($image, $font_size, 0, 1155, 1770, $black, $font, $todays_date);
        
        imagettftext($image, $font_size, 0, 110, 1855, $black, $font, $i9_preparer_last_name);
        imagettftext($image, $font_size, 0, 890, 1855, $black, $font, $i9_preparer_first_name);

        imagettftext($image, $font_size, 0, 110, 1940, $black, $font, $i9_preparer_address);
        imagettftext($image, $font_size, 0, 820, 1940, $black, $font, $i9_preparer_city_or_town);
        imagettftext($image, $font_size, 0, 1260, 1940, $black, $font, $i9_preparer_state);
        imagettftext($image, $font_size, 0, 1370, 1940, $black, $font, $i9_preparer_zip_code);
    }

    // Send Image to Browser
    //imagepng($image);

    //Sends Image to File
    $save = "../uploads/candidate_files/$session_candidate_id/i9-1-candidate-filled.png";
    imagepng($image, $save, 0, NULL);

    // Clear Memory
    imagedestroy($image);

    $image = imagecreatefrompng('../uploads/forms/2018-i9-2.png');

    imagettftext($image, $font_size, 0, 460, 415, $black, $font, $i9_last_name);
    imagettftext($image, $font_size, 0, 875, 415, $black, $font, $i9_first_name);
    imagettftext($image, $font_size, 0, 1210, 415, $black, $font, $i9_middle_initial);
    imagettftext($image, $font_size, 0, 1400, 415, $black, $font, $i9_citizenship_status);

    $save = "../uploads/candidate_files/$session_candidate_id/i9-2-candidate-filled.png";
    imagepng($image, $save, 0, NULL);

    $event_description = "Candidate Filled out i9.";

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'Form Filled', event_description = '$event_description', event_created_at = UNIX_TIMESTAMP(), candidate_id = $session_candidate_id");

    $_SESSION['alert_message'] = "Filled Out i9";

    header("Location: kiosk_candidate_verify.php");

}

if(isset($_POST['verify_candidate'])){
    $signature = $_POST['signature_image_base64'];
    $first_initial = substr("$session_candidate_first_name", 0,1);
    $last_initial = substr("$session_candidate_last_name", 0,1);
    $todays_date = date('m-d-Y',time());

    header('Content-type: image/png');
 
    $sig = imagecreatefrompng($signature);
    $sig = imagescale($sig,400,60);

    // Create Image From Existing File
    $image_1 = imagecreatefrompng('../uploads/forms/2018-kbs-1.png');
    $image_2 = imagecreatefrompng('../uploads/forms/2018-kbs-2.png');
    $image_3 = imagecreatefrompng('../uploads/forms/2018-kbs-3.png');
    $image_4 = imagecreatefrompng('../uploads/forms/2018-kbs-4.png');
    $image_5 = imagecreatefrompng('../uploads/forms/2018-kbs-5.png');

    // Allocate A Color For The Text
    $black_1 = imagecolorallocate($image_1, 0, 0, 0);
    $black_2 = imagecolorallocate($image_2, 0, 0, 0);
    $black_3 = imagecolorallocate($image_3, 0, 0, 0);
    $black_4 = imagecolorallocate($image_4, 0, 0, 0);
    $black_5 = imagecolorallocate($image_5, 0, 0, 0);

    // Set Path to Font File and Font Size
    putenv('GDFONTPATH=' . realpath('.'));
    $font = 'font.ttf';
    $font_size = '19';

    imagettftext($image_1, 40, 0, 1400, 2045, $black_1, $font, "$first_initial$last_initial");
    imagettftext($image_2, 40, 0, 1400, 2020, $black_2, $font, "$first_initial$last_initial");
    imagettftext($image_3, 40, 0, 1400, 2080, $black_3, $font, "$first_initial$last_initial");
    imagettftext($image_4, 40, 0, 1400, 2030, $black_4, $font, "$first_initial$last_initial");

    imagettftext($image_5, 40, 0, 1000, 1745, $black_5, $font, "$session_candidate_first_name $session_candidate_last_name");
    imagecopy($image_5, $sig, 1000, 1840 , 0, 0, 400, 60);
    imagettftext($image_5, 25, 0, 1000, 2025, $black_5, $font, $todays_date);

    // Send Image to Browser
    //imagepng($image_4);

    //Sends Image to File
    $save = "../uploads/candidate_files/$session_candidate_id/kbs-1-candidate-signed.png";
    imagepng($image_1, $save, 0, NULL);
    $save = "../uploads/candidate_files/$session_candidate_id/kbs-2-candidate-signed.png";
    imagepng($image_2, $save, 0, NULL);
    $save = "../uploads/candidate_files/$session_candidate_id/kbs-3-candidate-signed.png";
    imagepng($image_3, $save, 0, NULL);
    $save = "../uploads/candidate_files/$session_candidate_id/kbs-4-candidate-signed.png";
    imagepng($image_4, $save, 0, NULL);
    $save = "../uploads/candidate_files/$session_candidate_id/kbs-5-candidate-signed.png";
    imagepng($image_5, $save, 0, NULL);

    // Clear Memory
    //imagedestroy($image_5);

    mysqli_query($mysqli,"UPDATE candidates SET agree_terms = 1, current_status = 'Pending Interview' WHERE candidate_id = $session_candidate_id");

    $event_description = "Candidate Agreed to the Agreement.";

    mysqli_query($mysqli,"INSERT INTO events SET event_type = 'Agreed', event_description = '$event_description', event_created_at = UNIX_TIMESTAMP(), candidate_id = $session_candidate_id");

    $_SESSION['alert_message'] = "Candidate Agreed";
    
    header("Location: kiosk_thank_you_redirect.php");

}

?>