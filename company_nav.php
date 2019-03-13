<?php

//Badge Counts

$contact_count = mysqli_num_rows($sql = mysqli_query($mysqli,"SELECT contact_id FROM contacts WHERE company_id = $company_id"));
$candidate_count = mysqli_num_rows($sql = mysqli_query($mysqli,"SELECT work_history_id FROM candidate_work_history WHERE company_id = $company_id"));
$job_count = mysqli_num_rows($sql = mysqli_query($mysqli,"SELECT  job_id FROM jobs WHERE company_id = $company_id"));
$file_count = mysqli_num_rows($sql = mysqli_query($mysqli,"SELECT file_id FROM files WHERE company_id = $company_id"));
$note_count = mysqli_num_rows($sql = mysqli_query($mysqli,"SELECT note_id FROM notes WHERE company_id = $company_id"));

?>

<ul class="nav nav-pills nav-fill bg-light p-3 mb-4 border">
  <li class="nav-item">
    <a class="nav-link <?php if(!isset($_GET['tab']) OR $_GET['tab'] == "contacts") { echo "active"; } ?>" 
      href="company.php?company_id=<?php echo "$company_id"; ?>&tab=contacts"><i class="fa fa-address-book-o"></i> Contacts
      <?php if($contact_count > 0) { ?><span class="badge badge-secondary"><?php echo $contact_count; ?></span><?php } ?>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($_GET['tab'] == "history") { echo "active"; } ?>" href="company.php?company_id=<?php echo "$company_id"; ?>&tab=history"><i class="fa fa-users"></i> Candidates
      <?php if($candidate_count > 0) { ?><span class="badge badge-secondary"><?php echo $candidate_count; ?></span><?php } ?>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($_GET['tab'] == "jobs") { echo "active"; } ?>" href="company.php?company_id=<?php echo "$company_id"; ?>&tab=jobs"><i class="fa fa-briefcase"></i> Jobs
      <?php if($job_count > 0) { ?><span class="badge badge-secondary"><?php echo $job_count; ?></span><?php } ?>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($_GET['tab'] == "files") { echo "active"; } ?>" href="company.php?company_id=<?php echo "$company_id"; ?>&tab=files"><i class="fa fa-file"></i> Files
      <?php if($file_count > 0) { ?><span class="badge badge-secondary"><?php echo $file_count; ?></span><?php } ?>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($_GET['tab'] == "notes") { echo "active"; } ?>" href="company.php?company_id=<?php echo "$company_id"; ?>&tab=notes"><i class="fa fa-edit"></i> Notes
      <?php if($note_count > 0) { ?><span class="badge badge-secondary"><?php echo $note_count; ?></span><?php } ?>
    </a>
  </li>
</ul>