<?php
  session_start();

  // Check if user is authenticated
  // If yes, redirect to index.php
  if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == 1) {
    header ('location: /');
}

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

  <footer>
    <?php
      // Display error messages
      if (isset($_SESSION['username_exists']) && $_SESSION['username_exists'] == 1) {
        echo "Username taken";
      }
      else if (isset($_SESSION['password_mismatch']) && $_SESSION['password_mismatch'] == 1) {
        echo "Passwords do not match";
      }
      else if (isset($_SESSION['password_too_short']) && $_SESSION['password_too_short'] == 1) {
        echo "Password must be at least 8 characters";
      }
    
    // Unset variables so error messages don't persist
    unset($_SESSION['username_exists']);
    unset($_SESSION['password_mismatch']);
    unset($_SESSION['password_too_short']);
    ?>
    <p><a href="/login">Click here to login</p>
  </footer>
</html>


