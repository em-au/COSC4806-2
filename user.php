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
}


?>