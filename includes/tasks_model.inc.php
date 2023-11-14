<?php

function fetchTasks(object $pdo)
{

  $query = "SELECT task, date_created, is_done FROM tasks";
  $stmt = $pdo->prepare($query);
  $stmt->execute();

  // fetch the tasks as an associative array and store it
  $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $tasks;
}
