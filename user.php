<?php

require_once('database.php');

Class User {
  public function get_all_users() {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users");
    $statement->execute(); // Executes on filess.io end
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC); // Retrieve the rows from the db; fetch into associative array
    return $rows;
  }

  public function usernameExists($username) {
    $db = db_connect();
    $statement = $db->prepare("SELECT username FROM users WHERE username = '$username'");
    $statement->execute(); 
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    if (isset($row) && !empty($row)) {
        return true;
    }
    else {
      return false;
    }
  }
  
  public function create_user($username) {
    $db = db_connect();
    $statement = $db->prepare("INSERT into users (username) VALUES ('$username')");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows; // Can return rows to make sure it's there
  }
}


?>