<?php
require_once('user.php');
  // Username cannot exist in db already
  // Passwords must match
  // Password must meet security standard (eg 8 characters)
  session_start();
  /*
  $username = $_REQUEST['username'];
  $_SESSION['username'] = $username; // Save username in a session variable
  $password = $_REQUEST['password'];

  if ($valid_username == $username && $valid_password == $password) {
    $_SESSION['authenticated'] = 1;
    header ('location: /');
  }
  else {
    if (!isset($_SESSION['failed_attempts'])) {
      $_SESSION['failed_attempts'] = 1;
    }
    else {
      $_SESSION['failed_attempts']++;
    }
    header ('location: /login.php');
  }
  */
  $username = $_REQUEST['username'];
  $password1 = $_REQUEST['password1'];
  $password2 = $_REQUEST['password2'];
  $user = new User();
  if ($user->usernameExists($username)) {
    $_SESSION['username_exists'] = 1;
     header ('location: /signup.php');
  }

  else if ($password1 != $password2) {
    $_SESSION['password_mismatch'] = 1;
    header ('location: /signup.php');
  }

  else if (strlen($password1) < 8) {
    $_SESSION['password_too_short'] = 1;
    header ('location: /signup.php');
  }
    
  else {
    $user->create_user($username, $password1);
    header ('location: /login.php');
  }
?>