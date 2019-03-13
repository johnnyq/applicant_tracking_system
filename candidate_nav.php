<?php

//Badge Counts

$education_count = mysqli_num_rows($sql = mysqli_query($mysqli,"SELECT education_id FROM candidate_education WHERE candidate_id = $candidate_id"));
$employment_count = mysqli_num_rows($sql = mysqli_query($mysqli,"SELECT employment_id FROM candidate_employment WHERE candidate_id = $candidate_id"));
$reference_count = mysqli_num_rows($sql = mysqli_query($mysqli,"SELECT reference_id FROM candidate_references WHERE candidate_id = $candidate_id"));
$work_history_count = mysqli_num_rows($sql = mysqli_query($mysqli,"SELECT work_history_id FROM candidate_work_history WHERE candidate_id = $candidate_id"));
$file_count = mysqli_num_rows($sql = mysqli_query($mysqli,"SELECT file_id FROM files WHERE candidate_id = $candidate_id"));
$note_count = mysqli_num_rows($sql = mysqli_query($mysqli,"SELECT note_id FROM notes WHERE candidate_id = $candidate_id"));

?>


<ul class="nav nav-pills nav-fill bg-light p-3 mb-4 border">
  <li class="nav-item">
    <a class="nav-link <?php if(!isset($_GET['tab']) OR $_GET['tab'] == "education") { echo "active"; } ?>" 
      href="candidate.php?candidate_id=<?php echo "$candidate_id"; ?>&tab=education"><i class="fa fa-graduation-cap"></i><br>Education
       <?php if($education_count > 0) { ?><br><span class="badge badge-pill badge-secondary"><?php echo $education_count; ?></span><?php } ?>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($_GET['tab'] == "employment") { echo "active"; } ?>" 
      href="candidate.php?candidate_id=<?php echo "$candidate_id"; ?>&tab=employment"><i class="fa fa-building"></i><br>Work Experience
      <?php if($employment_count > 0) { ?><br><span class="badge badge-pill badge-secondary"><?php echo $employment_count; ?></span><?php } ?>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($_GET['tab'] == "references") { echo "active"; } ?>"
      href="candidate.php?candidate_id=<?php echo "$candidate_id"; ?>&tab=references"><i class="fa fa-users"></i><br>References
       <?php if($reference_count > 0) { ?><br><span class="badge badge-pill badge-secondary"><?php echo $reference_count; ?></span><?php } ?>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($_GET['tab'] == "work_history") { echo "active"; } ?>" 
      href="candidate.php?candidate_id=<?php echo "$candidate_id"; ?>&tab=work_history"><i class="fa fa-building"></i><br>Work History
      <?php if($work_history_count > 0) { ?><br><span class="badge badge-pill badge-secondary"><?php echo $work_history_count; ?></span><?php } ?>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($_GET['tab'] == "files") { echo "active"; } ?>"
      href="candidate.php?candidate_id=<?php echo "$candidate_id"; ?>&tab=files"><i class="fa fa-file"></i><br>Files
      <?php if($file_count > 0) { ?><br><span class="badge badge-pill badge-secondary"><?php echo $file_count; ?></span><?php } ?>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($_GET['tab'] == "notes") { echo "active"; } ?>" 
      href="candidate.php?candidate_id=<?php echo "$candidate_id"; ?>&tab=notes"><i class="fa fa-edit"></i><br>Notes
      <?php if($note_count > 0){ ?><br><span class="badge badge-pill badge-secondary"><?php echo $note_count; ?></span><?php } ?>
    </a>
  </li>
</ul>