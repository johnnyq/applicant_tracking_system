<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-1">
  <a class="navbar-brand" href="#"><?php echo $config_company_name; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
          <img height="38" width="38" src="<?php echo "../$session_candidate_avatar"; ?>" class="img-fluid rounded-circle"> <?php echo "$session_candidate_first_name $session_candidate_last_name"; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <center>
              <img height="128" width="128" src="<?php echo "../$session_candidate_avatar"; ?>" class="img-fluid rounded-circle">
            </center>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changePasswordModal"><i class="fa fa-lock"></i> Password</a>
          <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> Sign Out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>