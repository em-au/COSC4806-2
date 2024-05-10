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
    <title>Sign up</title>
  </head>
  <body>

    <h1>Sign Up Form</h1>

    <form action="/validate-signup.php" method="post">
      <label for="username">Username:</label>
      <br>
      <input type="text" id="username" name="username">
      <br>
      <label for="password">Password:</label>
      <br>
      <input type="password" id="password" name="password1">
      <br>
      <label for="password">Confirm Password:</label>
      <br>
      <input type="password" id="password" name="password2">
      <br><br>
      <input type="submit" value="Submit">
      <br><br>
    </form>
  </body>
  
  <!--
  <footer>
    <p><a href="/signup.php">Sign up</p>
  </footer>
  -->

  <footer>
    <?php
      // Display error messages
      if (isset($_SESSION['password_mismatch']) == 1) {
        echo "Passwords do not match";
      }
      else if (isset($_SESSION['password_too_short']) == 1) {
        echo "Password must be at least 8 characters";
      }
    
    session_destroy();
    ?>
  </footer>
</html>


