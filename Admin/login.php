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
  <div class="wrapper">

    <form action="includes/login.inc.php" method="post" class="form-container">
      <h1>Admin Login</h1>
      <div class="form-field">
        <label for="username">Phone Number or Email</label>
        <input type="text" id="username" name="uid">
      </div>
      <div class="form-field">
        <label for="password">Password</label>
        <input type="password" id="password" name="pwd">
      </div>
      <div class="form-field center">
        <input type="submit" value="LOG IN">
      </div>
      <div style="text-align:center;">
        <p>Do not have an account? <a href="./signUp.php">Create Account</a></p>
      </div>
      <div class="error-message" style="color:red;text-align: center;font-family: sans-serif;">
        <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "wronglogin") {
            echo "<p>Incorrect Login Information<p>";
          }
          if ($_GET["error"] == "emptyinput") {
            echo "<p>Make sure you filled all fields<p>";
          }
        }

        ?>
      </div>
    </form>
  </div>

</body>

</html>