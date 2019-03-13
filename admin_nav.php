<nav class="nav flex-column nav-pills border p-3 bg-light">
  <h5 class="p-2">Admin Menu</h5>
  <a class="nav-link <?php if($_GET['tab'] == "users") { echo "active"; } ?>" href="admin.php?tab=users"><i class="fa fa-users"></i> Users</a>
  <a class="nav-link <?php if($_GET['tab'] == "locations") { echo "active"; } ?>" href="admin.php?tab=locations"><i class="fa fa-map-marker"></i> Locations</a>
  <a class="nav-link <?php if($_GET['tab'] == "settings") { echo "active"; } ?>" href="admin.php?tab=settings"><i class="fa fa-gears"></i> Settings</a>
  <a class="nav-link <?php if($_GET['tab'] == "user_logs") { echo "active"; } ?>" href="admin.php?tab=user_logs"><i class="fa fa-book"></i> User Logs</a>
  <a class="nav-link <?php if($_GET['tab'] == "candidate_logs") { echo "active"; } ?>" href="admin.php?tab=candidate_logs"><i class="fa fa-book"></i> Candidate Logs</a>
  <a class="nav-link <?php if($_GET['tab'] == "login_attempts") { echo "active"; } ?>" href="admin.php?tab=login_attempts"><i class="fa fa-lock"></i> Login Attempts</a>
</nav>