<?php include("header.php"); ?>
<?php 

if(isset($_GET['candidate_id'])){
  $candidate_id = intval($_GET['candidate_id']);

  $sql = mysqli_query($mysqli,"SELECT * FROM candidates WHERE candidate_id = $candidate_id");
  $row = mysqli_fetch_array($sql);

  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
 
?>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="candidates.php">Candidates</a></li>
    <li class="breadcrumb-item"><a href="candidate.php?candidate_id=<?php echo $candidate_id; ?>"><?php echo "$first_name $last_name"; ?></a></li>
    <li class="breadcrumb-item active">Forms</li>
    <li class="breadcrumb-item active">W-4</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-5">
    <legend class="text-center border bg-light">Form W-4 Employer Section</legend>
    <form class="border p-3" action="post.php" method="post" autocomplete="off">
      
      <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">

      <div class="form-group">
        <label><strong>First Date of Employment</strong> <small class="text-secondary">Box 9</small></label>
        <input type="date" class="form-control" name="first_date_of_employment">
      </div>

      <div class="form-group">
        <label><strong>Employer Identification Number (EIN)</strong> <small class="text-secondary">Box 10</small></label>
        <input type="text" class="form-control" name="ein" data-inputmask="'mask': '99-9999999'">
      </div>
      <button type="submit" name="add_w4" class="btn btn-primary">Submit Form</button>
    </form>
  </div>
  
  <div class="col-md-7">
    <legend class="text-center border bg-light">Candidate Filled W-4 Form</legend>
    <img class="img-fluid border mb-5" src="uploads/candidate_files/<?php echo $candidate_id; ?>/w4-candidate-filled.png">
    <legend class="text-center border bg-light">Blank W-4 Form <small>for Reference</small></legend>
    <div class="embed-responsive" style="padding-bottom: 141.42%;">
      <object class="embed-responsive-item" data="uploads/forms/fw4.pdf" type="application/pdf" internalinstanceid="9" title="">
          <p>Your browser isn't supporting embedded pdf files. You can download the file
              <a href="/media/post/bootstrap-responsive-embed-aspect-ratio/example.pdf">here</a>.</p>
      </object>
    </div>
  </div>

</div>

<?php 

}

?>

<?php include("footer.php"); ?>