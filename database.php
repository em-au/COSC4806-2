<?php

require_once('config.php');

function db_connect() {
  try {
    $db = new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbnamte=' . DB_DATABASE, DB_USER, DB_PASS);
    return $dbh;
  } catch (PDOException $e) {
    // Should set a global variable here so we know that the DB is down
    // session variable?
  }


?>