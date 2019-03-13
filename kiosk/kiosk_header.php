<?php include("../config.php"); ?>
<?php include("check_login.php"); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../plugins/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <title><?php echo $config_company_name; ?> | Candidate Portal</title>
  </head>
  <body>
    <?php include("candidate_nav.php"); ?>
    <div class="container">
      <?php include("candidate_sub_nav.php"); ?>

      <!-- <center><img class="img-fluid p-3"  src="../img/logo.png"></center> -->
      
      <?php 
      if(!empty($_SESSION['alert_message'])){
        ?>
          <div class="alert alert-info">
            <?php echo $_SESSION['alert_message']; ?>
            <button class='close' data-dismiss='alert'>&times;</button>
          </div>
        <?php
        
        $_SESSION['alert_type'] = '';
        $_SESSION['alert_message'] = '';

      }

      ?>