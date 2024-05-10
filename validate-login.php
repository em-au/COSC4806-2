<?php
require_once('user.php');
  session_start();

  $username = $_REQUEST['username'];
  $_SESSION['username'] = $username; // Save username in a session variable
  $password = $_REQUEST['password'];

  // if ($valid_username == $username && $valid_password == $password) {
  //   $_SESSION['authenticated'] = 1;
  //   header ('location: /');
  // }
  // else {
  //   if (!isset($_SESSION['failed_attempts'])) {
  //     $_SESSION['failed_attempts'] = 1;
  //   }
  //   else {
  //     $_SESSION['failed_attempts']++;
  //   }
  //   header ('location: /login.php');
  // }

  // Check is username exists in db
  $user = new User();
  if (!$user->usernameExists($username)) {
    //echo "username doesn't exist";
    $_SESSION['username_exists'] = 0;
    $_SESSION['test'] = 0;

    header ('location: /login.php');
  }

  // INSTRUCTIONS SAY TO HASH THE PASSWORD IN THE LOGIN FORM AND THEN COMPARE so no salt?
  // Check if password is correct
  // if (!password_verify($password, $user->get_password($username))) {
  //   //$hashed = $user->get_password($username);
  //   //echo "correct password:" . $hashed;
  //   $_SESSION['password_incorrect'] = 1;
  //   header ('location: /login.php');
  // }
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  if ($hashed_password == $user->get_password($username)) {
    echo "input password: " . $hashed_password;
    echo "correct password: " . $user->get_password($username);
  }
  else {
    echo "password is incorrect";
  }


  //header ('location: /'); // Redirect to index (should change this to welcome page and logout function)
?>