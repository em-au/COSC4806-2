<?php
  session_start();
  /*
  // Check if user is authenticated (use session variable authenticated)
  // If yes, redirect to index.php
  if (isset($_SESSION['authenticated']) == 1) {
    header ('location: /index.php');
  }
  */
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
  </head>
  <body>

    <h1>Login Form</h1>

    <form action="/validate-login.php" method="post">
      <label for="username">Username:</label>
      <br>
      <input type="text" id="username" name="username">
      <br>
      <label for="password">Password:</label>
      <br>
      <input type="password" id="password" name="password">
      <br><br>
      <input type="submit" value="Submit">
      <br><br>
    </form>
  </body>

  <footer>
    <?php
      // Display error messages
      if ($_SESSION['username_exists'] == 0) {
        echo "Username does not exist";
      }
    ?>
    <!--<p><a href="/signup.php">Sign up</p> -->
  </footer>
</html>


