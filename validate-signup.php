<?php
require_once('user.php');
  session_start();

  $username = $_REQUEST['username'];
  $password1 = $_REQUEST['password1'];
  $password2 = $_REQUEST['password2'];
  $user = new User();

  // Check if username already exists in db
  if ($user->usernameExists($username)) {
    $_SESSION['username_exists'] = 1;
     header ('location: /signup.php');
  }

  // Check if passwords match
  else if ($password1 != $password2) {
    $_SESSION['password_mismatch'] = 1;
    header ('location: /signup.php');
  }

  // Check if passwords meet security standard (minimum 8 characters)
  else if (strlen($password1) < 8) {
    $_SESSION['password_too_short'] = 1;
    header ('location: /signup.php');
  }
    
  else {
    $user->create_user($username, $password1);
    $_SESSION['account_created'] = 1;
    header ('location: /login.php');
  }
?>