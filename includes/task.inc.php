<?php

// check if there is a data submitted 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $newTask = $_POST["addTask"];

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
} else {
  header("Location: ../index.php");
  die();
}
