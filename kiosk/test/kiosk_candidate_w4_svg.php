<?php include("kiosk_header.php"); ?>
<style>

input {
    background-color: transparent;
    border: 0px solid;
    font-weight: bold;
    background-color: yellow;
   
    
}


  input[type=checkbox] {
    display:none;
    background-color: yellow;
  }
  input[type=checkbox] + label
   {
       background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAAEUlEQVR42mNkIAAYRxWMJAUAE5gAEdz4t9QAAAAASUVORK5CYII=);
       height: 16px;
       width: 16px;
       display:inline-block;
       padding: 0 0 0 0px;
   }
   
   input[type=checkbox]:checked + label
    {
        background-image: url("img/checkbox-on.png");
        height: 16px;
        width: 16px;
        display:inline-block;
        padding: 0 0 0 0px;
    }

</style>

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


<form class="border p-3" action="post_fw4.php" method="post" autocomplete="off">
<div class="container">
  <div class="row justify-content-center align-items-center">
    <object id="fw4-svg" width="934" height="1209" data="../uploads/forms/fw4-svg/1.svg" type="image/svg+xml">
      <img src="yourfallback.jpg" />
    </object>
  </div>
</div>  

  <button type="submit" name="add_w4" class="btn btn-danger">Submit</button>
</form>

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

<script>
var a = document.getElementById("fw4-svg");
a.addEventListener("load",function(){
        var svgDoc = a.contentDocument;
        var delta = svgDoc.getElementById("fname");

        delta.addEventListener("keypress",function(){
          alert('hello world!');
        },false);




},false);






</script>

<script>

$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});

</script>