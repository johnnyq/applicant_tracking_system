 <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">






  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signModal">
      <i class="fa fa-pencil"></i> Sign
</button>











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