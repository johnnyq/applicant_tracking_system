
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>W4 Form</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body class="text-center">






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


<script>
	var form_canvas = document.getElementById("formCanvas");
	var form_context = form_canvas.getContext("2d");
	var swedishflagbg = new Image();
	var fw4_png = new Image();
	fw4_png.src="uploads/forms/fw4-1024px/fw4-1.png";
	fw4_png.onload = function() {
	form_context.drawImage(fw4_png, 0, 0);
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
            <canvas id="signature-pad" class="signature-pad" width=750 height=100></canvas>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" id="save-png">Save as PNG</button>
          <button class="btn btn-secondary" id="save-jpeg">Save as JPEG</button>
          <button class="btn btn-secondary" id="draw">Draw</button>
          <button class="btn btn-danger" id="clear">Clear</button>
        </div>
    </div>
  </div>
</div>
  


      <script src="js/jquery-3.3.1.slim.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="plugins/DataTables/datatables.min.js"></script>
      <script src="plugins/bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js"></script>
      <script src="js/signature_pad.min.js"></script>
      <script src="js/app.js"></script>