<?php

// check if there is a data submitted 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["newTask"])) {
  $newTask = $_POST["newTask"];

  if (empty($newTask)) {
    header("Location: ../index.php");
  } else {
    try {
      require_once "dbh.inc.php";


      // create a query to insert task in the database
      $query = "INSERT INTO tasks (task) VALUES (:newtask)";

      // prepared statement
      $stmt = $pdo->prepare($query);

      // bind parameters
      $stmt->bindParam(':newtask', $newTask);

      $stmt->execute();


      // manually close the statement
      $stmt = null;

      // manually close the connection to the database to free resources
      $pdo = null;

      header("Location: ../index.php");

      exit();
    } catch (PDOException $e) {
      //throw $th;
      die("Query fails: " . $e->getMessage());
    }
  }
} else {
  header("Location: ../index.php");
  die();
}
