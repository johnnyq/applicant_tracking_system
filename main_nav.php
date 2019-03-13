<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-1">
  <a class="navbar-brand" href="#"><?php echo $config_company_name; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="candidates.php"><i class="fa fa-users"></i> Candidates</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="companies.php"><i class="fa fa-building-o"></i> Companies</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="jobs.php"><i class="fa fa-briefcase"></i> Jobs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reports.php"><i class="fa fa-bar-chart"></i> Reports</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
          <img height="38" width="38" src="<?php echo "$session_avatar"; ?>" class="img-fluid rounded-circle"> <?php echo "$session_first_name@$session_current_location_name"; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" data-toggle="modal" data-target="#changeAvatarModal" href="#">
            <center>
              <img height="128" width="128" src="<?php echo "$session_avatar"; ?>" class="img-fluid rounded-circle">
              <br>      
              <small class="text-muted"><?php if($session_access == 2){ echo "Admin"; }else{ echo "User"; } ?></small>
            </center>
          </a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changeLocationModal"><i class="fa fa-map-marker"></i> <?php echo "$session_current_location_name"; ?></a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changePasswordModal"><i class="fa fa-lock"></i> Password</a>
          <a class="dropdown-item" href="tickets.php"><i class="fa fa-bug"></i> Report a Bug</a>
          <?php if($session_access == 2){ ?>
          <a class="dropdown-item" href="admin.php?tab=users"><i class="fa fa-cog"></i> Admin</a>
          <?php } ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>