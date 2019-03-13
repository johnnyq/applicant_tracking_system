<?php 

$sql = mysqli_query($mysqli,"SELECT * FROM candidate_education WHERE candidate_id = $candidate_id ORDER BY education_id DESC"); 

if(mysqli_num_rows($sql) > 0){ 

?>

<legend>Education</legend>

<div class="table-responsive">
  <table class="table border">
    <thead class="thead-light">
      <tr>
        <th>School</th>
        <th>Address</th>
        <th>Years</th>
        <th>Major</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row = mysqli_fetch_array($sql)){
        $education_id = $row['education_id'];
        $education_type = $row['education_type'];
        $education_name = $row['education_name'];
        $education_address = $row['education_address'];
        $education_city = $row['education_city'];
        $education_state = $row['education_state'];
        $education_zip = $row['education_zip'];
        $education_date_from = date('Y',strtotime($row['education_date_from']));
        $education_date_to = date('Y',strtotime($row['education_date_to']));
        $graduate = $row['graduate'];
        $major = $row['major'];
      ?>
      <tr>
        <td>
          <strong><?php echo $education_type; ?></strong>
          <br>
          <div class='text-secondary'><?php echo $education_name; ?></div>
        </td>
        <td>
          <?php echo "$education_address"; ?>
          <br>
          <?php echo "$education_city $education_state $education_zip"; ?>
        </td>
        <td><?php echo "$education_date_from<br>$education_date_to"; ?></td>
        <td>
          <?php echo "$major"; ?>
          <div class="text-secondary">Graduate: <?php echo "$graduate"; ?></div>
        </td>
      </tr>
      <?php
      }
      ?>

    </tbody>
  </table>
</div>

<?php

}else{
  echo $config_no_records;
} //ends row count

?>