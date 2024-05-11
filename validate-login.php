<?php
require_once('user.php');
  session_start();

  $username = $_REQUEST['username'];
  $_SESSION['username'] = $username; 
  $password = $_REQUEST['password'];

  // Check if username exists in db
  $user = new User();
  if (!$user->usernameExists($username)) {
    $_SESSION['username_exists'] = 0;
    header ('location: /login.php');
    die();
  }

  // Check if password is correct
  $hashed_password = hash( 'sha256', $password);
  $valid_password = $user->get_password($username);
  if ($hashed_password == $valid_password) {
    $_SESSION['authenticated'] = 1;
    header ('location: /');
  }
  else {
    $_SESSION['password_incorrect'] = 1;
    header ('location: /login.php');
  }
   
?>