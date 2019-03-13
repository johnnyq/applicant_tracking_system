<?php include("config.php"); ?>
<?php include("check_login.php"); ?>
<?php include("functions.php"); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/DataTables/datatables.min.css">
    <link rel="stylesheet" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker3.min.css">
    <!-- <link rel="stylesheet" href="css/sb-admin.min.css"> -->
    <link rel="stylesheet" href="css/style.css">

    <title>Contigent Workforce</title>
  </head>
  <body>
  	<?php include("main_nav.php"); ?>
    <div class="container">
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