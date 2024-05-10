<?php

require_once('user.php');
session_start();

// Check if user is authenticated
// If not, redirect to login.php
  if (isset($_SESSION['authenticated']) && ($_SESSION['authenticated']) != 1 || !isset($_SESSION['authenticated'])) {
    header ('location: /login.php');
  }
?>

<?php
$user = new User();
$user_list = $user->get_all_users();

echo "<pre>";
print_r($user_list);

$user = new User();
$user->get_password("test");

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Index</title>
  </head>
  <body>

    <h1>Assignment 2</h1>

    <p><a href="/logout.php">Click here to logout</p>
  </body>
</html>
