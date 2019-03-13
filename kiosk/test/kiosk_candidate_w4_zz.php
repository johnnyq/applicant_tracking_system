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
     /* background-color: yellow; */
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
        background-image: url("../mg/checkbox-on.png");
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

  <div style="position:relative;width:1024px;height:1325px">
      <canvas id="formCanvas" width="1024" height="1325"></canvas>
      <input type="text" name="first_name" style="position:absolute;left:60px;top:916px;width:300px; " />

      <input type="text" name="last_name" style="position:absolute;left:362px;top:916px;width:372px; " />

      <input type="text" name="ssn" style="position:absolute;left:736px;top:916px;width:230px; " />

      <input type="text" style="position:absolute;left:60px;top:957px;width:456px; " />

     
      <input type='checkbox' name='thing' value='valuable' id="thing"/><label for="thing" style="position:absolute;left:540px;top:944px;"></label>

      <input type='checkbox' name='thing' value='valuable' id="thing2"/><label for="thing2" style="position:absolute;left:612px;top:944px;"></label>

      <input type='checkbox' name='thing' value='valuable' id="thing3"/><label for="thing3" style="position:absolute;left:696px;top:944px;"></label>





      <img id="fw4_employee_signature" src="img/spacer.png" height="34" width="200" data-toggle="modal" data-target="#signModal" style="position:absolute;left:324px;top:1170px;width:410px;background-color:yellow;" />

      <input type="hidden" id="signature_image_base64" name="signature_image_base64" value=""/>

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
  var form_canvas = document.getElementById("formCanvas");
  var form_context = form_canvas.getContext("2d");
  var x = 0;
  var y = 0;
  var width = 1024;
  var height = 1325; 
 
  var fw4_png = new Image();
  fw4_png.src="../uploads/forms/fw4-svg/1.svg"; 
  fw4_png.onload = function() {
 

   form_context.drawImage(fw4_png,x, y, width, height); 

  }





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