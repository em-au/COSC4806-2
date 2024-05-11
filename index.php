<?php

require_once('user.php');
session_start();

// Check if user is authenticated
// If not, redirect to login.php
  if ((isset($_SESSION['authenticated']) && ($_SESSION['authenticated']) != 1) || !isset($_SESSION['authenticated'])) {
    header ('location: /login.php');
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Index</title>
  </head>
  <body>

    <h1>Assignment 2</h1>
    <p>Welcome, <?=$_SESSION['username']?></p>
    <p><a href="all-users.php">Click here to see all user info</p>
    <p><a href="/logout.php">Click here to logout</p>
  </body>
</html>
