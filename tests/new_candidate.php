<?php include("header.php"); ?>

<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="candidates.php">Candidates</a></li>
    <li class="breadcrumb-item active">New Candidate</a></li>
  </ol>
</nav>

<form class="border-md p-3" action="post.php" method="post" autocomplete="off">
  <legend>Add Candidate</legend>
  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" name="first_name" required autofocus>
  </div>
  <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" name="last_name" required> 
  </div>
  <div class="form-group">
    <label>Address</label>
    <input type="text" class="form-control" name="address" required> 
  </div>
  <div class="form-group">
    <label>City</label>
    <input type="text" class="form-control" name="city" required> 
  </div>
  <div class="form-group">
    <label>State</label>
    <select class="form-control" name="state" required>
      <option value="">Choose a state...</option>
      <option value="AL">Alabama</option>
      <option value="AK">Alaska</option>
      <option value="AZ">Arizona</option>
      <option value="AR">Arkansas</option>
      <option value="CA">California</option>
      <option value="CO">Colorado</option>
      <option value="CT">Connecticut</option>
      <option value="DE">Delaware</option>
      <option value="DC">District Of Columbia</option>
      <option value="FL">Florida</option>
      <option value="GA">Georgia</option>
      <option value="HI">Hawaii</option>
      <option value="ID">Idaho</option>
      <option value="IL">Illinois</option>
      <option value="IN">Indiana</option>
      <option value="IA">Iowa</option>
      <option value="KS">Kansas</option>
      <option value="KY">Kentucky</option>
      <option value="LA">Louisiana</option>
      <option value="ME">Maine</option>
      <option value="MD">Maryland</option>
      <option value="MA">Massachusetts</option>
      <option value="MI">Michigan</option>
      <option value="MN">Minnesota</option>
      <option value="MS">Mississippi</option>
      <option value="MO">Missouri</option>
      <option value="MT">Montana</option>
      <option value="NE">Nebraska</option>
      <option value="NV">Nevada</option>
      <option value="NH">New Hampshire</option>
      <option value="NJ">New Jersey</option>
      <option value="NM">New Mexico</option>
      <option value="NY">New York</option>
      <option value="NC">North Carolina</option>
      <option value="ND">North Dakota</option>
      <option value="OH">Ohio</option>
      <option value="OK">Oklahoma</option>
      <option value="OR">Oregon</option>
      <option value="PA">Pennsylvania</option>
      <option value="RI">Rhode Island</option>
      <option value="SC">South Carolina</option>
      <option value="SD">South Dakota</option>
      <option value="TN">Tennessee</option>
      <option value="TX">Texas</option>
      <option value="UT">Utah</option>
      <option value="VT">Vermont</option>
      <option value="VA">Virginia</option>
      <option value="WA">Washington</option>
      <option value="WV">West Virginia</option>
      <option value="WI">Wisconsin</option>
      <option value="WY">Wyoming</option>
    </select> 
  </div>
  <div class="form-group">
    <label>Zip</label>
    <input type="text" class="form-control" name="zip" required> 
  </div>
  <div class="form-group">
    <label>Phone</label>
    <input type="text" class="form-control" name="phone" required> 
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" required>
  </div>
  <div class="form-group">
    <label>Social Security #</label>
    <input type="text" class="form-control" name="social_security" required> 
  </div>
  <div class="form-group">
    <label>Birthday</label>
    <input type="date" class="form-control" name="birth_day" required> 
  </div>
  <div class="form-group">
    <label>Status</label>
    <select class="form-control" name="w4" required>
      <option value="">Choose...</option>
      <option>Single</option>
      <option>Married</option>
    </select> 
  </div>
  <button type="submit" name="add_candidate" class="btn btn-primary">Submit</button>
</form>

<?php include("footer.php"); ?>
