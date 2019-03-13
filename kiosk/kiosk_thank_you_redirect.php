<?php include("kiosk_header.php"); ?>

<?php 

if($session_agree_terms == 0){
  mysqli_query($mysqli,"UPDATE candidates SET current_status = 'Applying - Agreement' WHERE candidate_id = $session_candidate_id");
}

?>

<div class="jumbotron">
  <center>
    <h1>Thank you for registering!</h1>
        <h5>Please have a seat and we will call you up for an interview, if you need to make any modifications you can log back in with the email and password you chosen to make those changes.</h5>
    <h3>In a few moments this page will redirect you back to the candidate login screen...</h3>
  </center>
</div>

<?php include("kiosk_footer.php"); ?>

<script>
    setTimeout('Redirect()', 30000);
    function Redirect() 
    {  
        window.location="logout.php"; 
    } 
</script>