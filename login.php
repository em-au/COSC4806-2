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
    // Display messages
      if (isset($_SESSION['account_created']) && $_SESSION['account_created'] == 1) {
        echo "Account successfully created. Please login";
      }
      else if (isset($_SESSION['username_exists']) && $_SESSION['username_exists'] == 0) {
        echo "Username does not exist";
      }
      else if (isset($_SESSION['password_incorrect']) && $_SESSION['password_incorrect'] == 1) {
        echo "Password is incorrect";
      }
    //session_destroy();
    unset($_SESSION['username_exists']);
    unset($_SESSION['password_incorrect']);
    ?>
    <p><a href="/signup.php">Click here to sign up</p>
  </footer>
</html>


