<?php

$sql = mysqli_query($mysqli,"SELECT * FROM notes, users WHERE user_id = note_created_by AND candidate_id = $candidate_id ORDER BY note_id DESC"); 

?>

<legend>Notes</legend>

<form action="post.php" method="post" autocomplete="off">
  <input type="hidden" name="candidate_id" value="<?php echo "$candidate_id"; ?>">
  <div class="form-group">
    <textarea rows="4" class="form-control" placeholder="Enter a note..." name="note"></textarea>
  </div>
  <button type="submit" name="add_candidate_note" class="btn btn-primary pull-right"> Submit</button>
</form>
<br><br>

<?php
  
  if(mysqli_num_rows($sql) > 0){

?>

<ul class="list-unstyled">
  
  <?php
  
  while($row = mysqli_fetch_array($sql)){
    $note_id = $row['note_id'];
    $note = $row['note'];
    $user_id = $row['user_id'];
    $first_name = $row['first_name'];
    $avatar = $row['avatar'];
    $note_created_at = time_ago($row['note_created_at']);
  
  ?>
  <li class="media my-4 border p-3">
    <img class="mr-3 rounded-circle" height="84" width="84" src="<?php echo $avatar; ?>">
    <div class="media-body">
      <h5 class="mb-3"><?php echo $first_name; ?> <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?php echo $note_created_at; ?></small></h5>
      <p><?php echo "$note"; ?></p>
      <?php if($session_user_id == $user_id OR $session_access > 1){ ?>
      <div class="btn-group pull-right">
        <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#editNote<?php echo $note_id; ?>"><i class="fa fa-edit"></i></button>
        <a href="post.php?delete_candidate_note=<?php echo $note_id; ?>&candidate_id=<?php echo $candidate_id; ?>" class="btn btn-light btn-sm"><i class="fa fa-trash"></i></a>
      </div>
    </div>
    
  <?php } ?>
  </li>
  <?php include("edit_candidate_note_modal.php"); ?>
  
  <?php
  
  }
  
  ?>

</ul>

<?php 

}else{
  echo $config_no_records;

?>

<?php 

}

?>