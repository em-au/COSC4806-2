<?php

require_once('user.php');

// Check if user is authenticated
// If not, redirect to login.php
  if (isset($_SESSION['authenticated']) && ($_SESSION['authenticated']) != 1 || !isset($_SESSION['authenticated'])) {
    header ('location: /login.php');
  }

$user = new User();
$user_list = $user->get_all_users();

echo "<pre>";
print_r($user_list);

$user = new User();
$user->get_password("test");

?>