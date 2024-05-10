<?php

  session_start();

  $valid_username = "user";
  $valid_password = "1234";

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
?>