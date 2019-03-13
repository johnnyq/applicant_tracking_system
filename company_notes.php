<?php

$sql = mysqli_query($mysqli,"SELECT * FROM notes, users WHERE user_id = note_created_by AND company_id = $company_id ORDER BY note_id DESC"); 

if(mysqli_num_rows($sql) > 0){

?>

<legend>Notes
  <button type="button" class="btn btn-dark pull-right" data-toggle="modal" data-target="#createNote">
    <i class="fa fa-pencil"></i>
  </button>
</legend>

<ul class="list-unstyled">
  
  <?php
  
  while($row = mysqli_fetch_array($sql)){
    $note_id = $row['note_id'];
    $note = $row['note'];
    $user_id = $row['user_id'];
    $first_name = $row['first_name'];
    $avatar = $row['avatar'];
    $note_created_at = date("$config_date_format $config_time_format",$row['note_created_at']);
  
  ?>
  <li class="media my-4 border p-3">
    <img class="mr-3 rounded-circle" height="64" width="64" src="<?php echo "$avatar"; ?>">
    <div class="media-body">
      <h5 class="mt-0 mb-1"><small><?php echo "$note_created_at"; ?></small></h5>
      <?php echo "$note"; ?>
      <p class="text-secondary mt-1">-<?php echo "$first_name"; ?></p>
    </div>
    <?php if($session_user_id == $user_id or $user_access > 1) { ?>
    <div class="btn-group">
  	  <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#editNoteModal<?php echo $note_id; ?>"><i class="fa fa-edit"></i></button>
      <a href="post.php?delete_company_note=<?php echo "$note_id"; ?>&company_id=<?php echo $company_id; ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
	  </div>
  <?php } ?>
  </li>
  <?php include("edit_company_note_modal.php"); ?>
  <?php
  
  }
  
  ?>

</ul>

<?php 

}else{
  echo $config_no_records;


?>

<button type="button" class="btn btn-dark pull-right" data-toggle="modal" data-target="#createNote">
  <i class="fa fa-pencil"></i>
</button>

<?php 

}

?>

<?php include("add_company_note_modal.php"); ?>