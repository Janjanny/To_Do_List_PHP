<?php

// check if there is a post id
if (isset($_POST["id"])) {

  // require db connection
  require_once "dbh.inc.php";

  $id = $_POST["id"];

  // check if empty id
  if (empty($id)) {
    echo "Empty ID";
  } else {

    // create a query to delete the data
    $query = "DELETE FROM tasks WHERE id=:id";

    // prepare the statement
    $stmt = $pdo->prepare($query);

    // bindparams
    $stmt->bindParam(':id', $id);

    // execute the query
    if ($stmt->execute()) {
      echo 'success';
    } else {
      echo 'failed';
    }

    // manually close the statement
    $stmt = null;

    // manually close the connection to the database to free resources
    $pdo = null;
  }
}
