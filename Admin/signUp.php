<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Log in</title>
  <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
  <!-- <div id="wrapper">
        <form action="login.inc.php" method="post">
            <input type="text" name="uid" id="user" placeholder="Username/Email....">
            <input type="password" name="pwd" id="pwd" placeholder="password">
            <button type="submit">Log In</button>
        </form>
    </div> -->

  <div class="wrapper">

    <form action="includes/signup.inc.php" method="post" class="form-container">
      <h1>Create New User</h1>
      <div class="form-field">
        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" name="name">
      </div>
      <div class="form-field">
        <label for="Email">Email</label>
        <input type="text" id="Email" name="email">
      </div>
      <div class="form-field">
        <label for="phone">Phone Number</label>
        <input type="text" id="phone" name="phone">
      </div>
      <div class="form-field">
        <label for="pwd">Password</label>
        <input type="password" id="pwd" name="pwd">
      </div>
      <div class="form-field">
        <label for="repeatpwd">Repeat Password</label>
        <input type="password" id="repeatpwd" name="repeatpwd">
      </div>
      <div class="form-field center">
        <input type="submit" value="Create Account">
      </div>
      <div class="error-message">
        <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "invalidemail") {
            echo "<p>You entered an invalid email<p>";
          }
          if ($_GET["error"] == "emptyinput") {
            echo "<p>Make sure you filled all fields<p>";
          }
          if ($_GET["error"] == "passworddontmatch") {
            echo "<p>The passwords do not match<p>";
          }
          if ($_GET["error"] == "passwordisinvalid") {
            echo "<p>Your password must have uppercase, lowercase, numbers and special characters <p>";
          }
          if ($_GET["error"] == "UserExists") {
            echo "<p>This email or phone number already exists<p>";
          }
          if ($_GET["error"] == "none") {
            header("location: ./login.php");
          }
        }

        ?>
      </div>
    </form>
  </div>

</body>

</html>