//Prevents resubmit on refresh or back
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

// Initialize InputMask
$(":input").inputmask();

//Data Tables Options
$('#dt').dataTable( {
    "order": [],
    language: {
        search: '_INPUT_',
        searchPlaceholder: "Enter search...",
        sLengthMenu: "_MENU_",
        sInfo: "<strong>records:</strong> _START_-_END_ of _TOTAL_",
        paginate: {
        	previous: '<i class="fa fa-angle-left"></i>',
            next: '<i class="fa fa-angle-right"></i>'
        }
    }
} );

//Highlight top nav menu item with current page
$(function() {
    // Highlight the active nav link.
    var url = window.location.pathname;
    var filename = url.substr(url.lastIndexOf('/') + 1);
    $('.navbar a[href$="' + filename + '"]').parent().addClass("active");
});

$(function() {
    // Highlight the active nav link.
    var url = window.location.pathname;
    var filename = url.substr(url.lastIndexOf('/') + 1);
    $('.nav a[href$="' + filename + '"]').parent().addClass("active");
});

$('.input-daterange').datepicker({
    format: "yyyy-mm-dd",
    maxViewMode: 2,
    todayHighlight: true
});

$("#show_hide_password button").on('click', function(event) {
    event.preventDefault();
    if($('#show_hide_password input').attr("type") == "text"){
        $('#show_hide_password input').attr('type', 'password');
        $('#show_hide_password i').addClass( "fa-eye-slash" );
        $('#show_hide_password i').removeClass( "fa-eye" );
    }else if($('#show_hide_password input').attr("type") == "password"){
        $('#show_hide_password input').attr('type', 'text');
        $('#show_hide_password i').removeClass( "fa-eye-slash" );
        $('#show_hide_password i').addClass( "fa-eye" );
    }
});

$('#signModal').on('shown.bs.modal', function (e) {
  
  resizeCanvas();
  drawSignature();

});

var canvas = document.getElementById('signature-pad');

// Adjust canvas coordinate space taking into account pixel ratio,
// to make it look crisp on mobile devices.
// This also causes canvas to be cleared.
function resizeCanvas() {
    // When zoomed out to less than 100%, for some very strange reason,
    // some browsers report devicePixelRatio as less than 1
    // and only part of the canvas is cleared then.
    var ratio =  Math.max(window.devicePixelRatio || 1, 1);
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    canvas.getContext("2d").scale(ratio, ratio);
    var ctx = canvas.getContext("2d");
    ctx.fillStyle = 'rgb(255, 255, 255)';
    ctx.fillRect(0, 0, canvas.width, canvas.height); 

   

}

window.onresize = resizeCanvas;
resizeCanvas();


var signaturePad = new SignaturePad(document.getElementById('signature-pad'))

document.getElementById('save-png').addEventListener('click', function () {


  if (signaturePad.isEmpty()) {
      alert("Please provide a signature first.");   
  }else{
    var data = signaturePad.toDataURL('image/png');
    console.log(data);
    //window.open(data);
    $("#fw4_employee_signature").attr("src",data);
    $('#signature_image_base64').val(data);
    $('#signModal').modal('hide');
    signaturePad.clear();
    }
});

document.getElementById('save-jpeg').addEventListener('click', function () {
  if (signaturePad.isEmpty()) {
    return alert("Please provide a signature first.");
  }

  var data = signaturePad.toDataURL('image/jpeg');
  console.log(data);
  window.open(data);
});

document.getElementById('clear').addEventListener('click', function () {
  signaturePad.clear();
});

document.getElementById('draw').addEventListener('click', function () {
  var ctx = canvas.getContext('2d');
  console.log(ctx.globalCompositeOperation);
  ctx.globalCompositeOperation = 'source-over'; // default value

});

document.getElementById('erase').addEventListener('click', function () {
  var ctx = canvas.getContext('2d');
  ctx.globalCompositeOperation = 'destination-out';
});