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
  
  public function create_user($username, $password) {
    $db = db_connect();
    $hashed_password = hash('sha256', $password);
    $statement = $db->prepare("INSERT into users (username, password) VALUES ('$username','$hashed_password')");
    $statement->execute();
    // $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    // return $rows; // Can return rows to make sure it's there
  }

  public function get_password($username) {
    $db = db_connect();
    $statement = $db->prepare("SELECT password FROM users WHERE username = '$username'");
    $statement->execute(); 
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row['password'];
  }
}


?>